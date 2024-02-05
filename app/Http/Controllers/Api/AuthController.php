<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use App\Notifications\ForgotPasswordNotification;
use App\Models\UserLog;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * user repository
     *
     * @var UserRepository
     */
    // private UserRepository $userRepository;

    /**
     * setting repository
     *
     * @var SettingRepository
     */
    // private SettingRepository $settingRepository;

    /**
     * emailservice
     *
     * @var EmailService
     */
    // private EmailService $emailService;

    /**
     * file service
     *
     * @var FileService
     */
    // private FileService $fileService;

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->usermodel = new User();
        // $this->userRepository    = new UserRepository;
        // $this->settingRepository = new SettingRepository;
        // $this->emailService      = new EmailService;
        // $this->fileService       = new FileService;
    }

    /**
     * process login
     *
     * @param LoginRequest $request
     * @return Response
     */
    /**
        
    *    @OA\Post(
    *       path="/auth/login",
    *       tags={"login"},
    *       operationId="login",
    *       summary="login",
    *       description="login",
    *       @OA\Response(
    *           response="200",
    *           description="Ok",
    *           @OA\JsonContent
    *           (example={"data":{"name":"cakra budiman","email":"user@email.com","token":null},"message":"Successfully entered the system"}),
    *      ),
    *  )
    */
    public function createAdminNotify($user)
    {
        $title = $user->name . ' ' . admin_lang('has registered');
        $image = asset($user->avatar);
        $link = route('admin.users.edit', $user->id);
        return adminNotify($title, $image, $link);
    }
    public function createLog($user)
    {
        $newLoginLog = new UserLog();
        $newLoginLog->user_id = $user->id;
        $newLoginLog->ip = ipInfo()->ip;
        $newLoginLog->country = ipInfo()->location->country;
        $newLoginLog->country_code = ipInfo()->location->country_code;
        $newLoginLog->timezone = ipInfo()->location->timezone;
        $newLoginLog->location = ipInfo()->location->city . ', ' . ipInfo()->location->country;
        $newLoginLog->latitude = ipInfo()->location->latitude;
        $newLoginLog->longitude = ipInfo()->location->longitude;
        $newLoginLog->browser = ipInfo()->system->browser;
        $newLoginLog->os = ipInfo()->system->os;
        $newLoginLog->save();
    }
    public function login(LoginRequest $request)
    {
        $user = $this->usermodel->where('email', $request->email)->first();
        if (Hash::check($request->password, $user->password)) {
            $this->createLog($user);
            return $this->handleLogin($user, __('Successfully entered the system'));
        }        
        return response422([
            'email' => [__('The email or password entered is incorrect.')]
        ]);
    }

    /**
     * process register
     *
     * @param RegisterRequest $request
     * @return Response
     */
    public function register(RegisterRequest $request)
    {
        $data = array_merge([
            'password' => bcrypt($request->password),
            'api_token' => hash('sha256', Str::random(60)),
            'firstname' => "",
            'lastname' => "",
            'avatar' => "",
            'client_id' => Str::random(10)
        ], $request->only(
            [
                'name', 'email'
            ]
        ));
        
        $user = $this->usermodel->create($data);
                
        $this->createAdminNotify($user);
        $this->createLog($user);
        return $this->handleLogin($user, __('Successfully registered and entered the system'));
    }

    /**
     * process forgot password
     *
     * @param ForgotPasswordRequest $request
     * @return Response
     */
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $this->usermodel->where('email', $request->email)->first();
            $verification_code = rand(100000, 999999);
            $userNew = $user->update([
                'email_token' => Str::random(100),
                'verification_code' => $verification_code
            ]);
            
            // sendmail
            $email = $user->email;
            $subject = "Forgot Password";
            $msg = __('This is your Verification Code: ' . $verification_code);
            \Mail::send([], [], function ($message) use ($msg, $email, $subject) {
                $message->to($email)
                    ->subject($subject)
                    ->html($msg);
            });

            // $this->emailService->forgotPassword($userNew, true);
            DB::commit();
            return response200(null, __('Successfully sent to ' . $request->email));
        } catch (Exception $e) {
            return $e->getMessage();
            DB::rollBack();
            return response500(null, __('Failed to send email, email server is down'));
        }
    }

    /**
     * process verify account
     *
     * @param Request $request
     * @return Response
     */
    public function verify(Request $request)
    {
        $request->validate([
            'email'             => 'required|email|exists:users,email',
            'verification_code' => 'required|min:6|max:6|exists:users,verification_code'
        ]);
        if ($this->settingRepository->loginMustVerified() === false) abort(404);
        $user = $this->userRepository->findByEmail($request->email);
        if ($user === null) {
            abort(404);
        } else if ($user->verification_code !== $request->verification_code) {
            return response422([
                'verification_code' => [__('The verification code entered is incorrect.')]
            ]);
        }
        $userNew = $this->userRepository->update([
            'email_verified_at' => now(),
            'email_token'       => null,
            'verification_code' => null
        ], $user->id);
        return $this->handleLogin($user, __('Successfully verified the account, please log in using your account'));
    }

    /**
     * checkCode
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function checkCode(Request $request)
    {
        $request->validate([
            'email'             => 'required|email|exists:users,email',
            'verification_code' => 'required|min:6|max:6|exists:users,verification_code'
        ]);
        if ($this->settingRepository->loginMustVerified() === false) abort(404);
        $user = $this->userRepository->findByEmail($request->email);
        if ($user === null) {
            abort(404);
        } else if ($user->verification_code !== $request->verification_code || $user->email_token === null) {
            return response422([
                'verification_code' => [__('The verification code entered is incorrect.')]
            ]);
        }
        return response200([
            'status'             => true,
            'verification_token' => $user->email_token
        ], __('Kode verifikasi valid'));
    }

    /**
     * process reset password
     *
     * @param ResetPasswordRequest $request
     * @return Response
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
        DB::beginTransaction();
        try {
            // $user = auth('api')->user();
            $user = $this->usermodel->where('email', $request->email)->first();
            if ($user->verification_code !== $request->verification_code) {
                return response422([
                    'verification_code' => [__('The verification code entered is incorrect.')]
                ]);
            }
            // else if ($user->email_token !== $request->verification_token) {
            //     return response422([
            //         'email_token' => [__('Incorrect verification token entered.')]
            //     ]);
            // }
            $userNew = $user->update([
                'password'          => bcrypt($request->new_password),
                'email_token'       => null,
                'verification_code' => null
            ]);
            DB::commit();
            $user = $this->usermodel->where('email', $request->email)->first();
            return response200($user, __('Password updated successfully'));
        } catch (Exception $e) {
            return response500(null, __('Failed to update password'));
        }
    }

    /**
     * logout from system
     *
     * @return Response
     */
    public function logout()
    {
        $user = auth('api')->user();
        // auth('api')->logout();
        return response200(null, __('Successfully exited the system'));
    }

    /**
     * handleLogin
     *
     * @param User $user
     * @param string $message
     * @return JsonResponse
     */
    private function handleLogin(User $user, string $message)
    {
        $userdata = [
            "name"=> $user->name,
            "email"=> $user->email,
            "token"=> $user->api_token
        ];
        return response200($userdata, $message);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return array
     */
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60
        ];
    }

    /**
     * get profile user
     *
     * @return JsonResponse
     */
    public function profile()
    {
        $user = auth('api')->user();
        $user->subscription = $user->subscription->plan;
        return response200($user, __('Successfully retrieved user data'));
    }

    /**
     * update profile user login
     *
     * @param ProfileRequest $request
     * @return Response
     */
    public function updateProfile(ProfileRequest $request)
    {
        $data = $request->only([
            'name',
            'email'
        ]);
        $user = auth('api')->user();
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $this->fileService->uploadAvatar($request->file('avatar'));
        }
        $newUser = $this->userRepository->updateProfile($data);
        return response200($user, __('Successfully updated profile'));
    }

    /**
     * update profile user login
     *
     * @param ProfileRequest $request
     * @return Response
     */
    public function updatePassword(ProfileRequest $request)
    {
        $oldPassword = auth('api')->user()->password;
        $this->userRepository->updateProfile([
            'password'             => $newPassword = bcrypt($request->new_password),
            'last_password_change' => now(),
        ]);
        return response200(true, __('Successfully updated password'));
    }

    /**
     * logActivities user login
     *
     * @return JsonResponse
     */
    public function logActivities()
    {
        $data = $this->userRepository->getLogActivitiesPaginate(request('perPage'));
        return response200($data, __('Successfully get activity log history'));
    }

    /**
     * get setting
     *
     * @return JsonResponse
     */
    public function settings()
    {
        $data = $this->settingRepository->all();
        return response200($data, __('Successfully got the settings'));
    }

    /**
     * post log
     * 
     * @return JsonResponse
     */
    public function log()
    {
        logLogin();
        return response200(true, __('Successfully insert log'));
    }
}