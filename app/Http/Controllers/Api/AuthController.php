<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
// use App\Http\Requests\ProfileRequest;
use App\Http\Requests\RegisterRequest;
// use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
// use App\Repositories\SettingRepository;
// use App\Repositories\UserRepository;
// use App\Services\EmailService;
// use App\Services\FileService;
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
    public function login(LoginRequest $request)
    {
        $user = $this->usermodel->where('email', $request->email)->first();
        if (Hash::check($request->password, $user->password)) {
            // if ($user->email_verified_at === null) {
            //     return response422([
            //         'email' => [__('Email has not been verified.')]
            //     ]);
            // }
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
            'avatar' => ""
        ], $request->only(
            [
                'name', 'email'
            ]
        ));
        
        $user = $usermodel->create($data);
                
        // $user->update([
        //     'email_token'       => Str::random(150),
        //     'verification_code' => rand(100000, 999999)
        // ]);
        // $this->emailService->verifyAccount($user, true);
        // return response200($user, __('Check your email inbox to verify your account first'));
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
        if ($this->settingRepository->isForgotPasswordSendToEmail() === false) abort(404);
        DB::beginTransaction();
        try {
            $user = $this->userRepository->findByEmail($request->email);
            $userNew = $this->userRepository->update([
                'email_token' => Str::random(100),
                'verification_code' => rand(100000, 999999)
            ], $user->id);
            $this->emailService->forgotPassword($userNew, true);
            logForgotPassword($user, $userNew);
            DB::commit();
            return response200($user, __('Successfully sent to ' . $request->email));
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
        logExecute(__('Verifikasi Akun'), UPDATE, $user, $userNew);
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
        if ($this->settingRepository->isForgotPasswordSendToEmail() === false) abort(404);
        DB::beginTransaction();
        try {
            $user = $this->userRepository->findByEmail($request->email);
            if ($user->verification_code !== $request->verification_code) {
                return response422([
                    'verification_code' => [__('The verification code entered is incorrect.')]
                ]);
            } else if ($user->email_token !== $request->verification_token) {
                return response422([
                    'email_token' => [__('Incorrect verification token entered.')]
                ]);
            }
            $userNew = $this->userRepository->update([
                'password'          => bcrypt($request->new_password),
                'email_token'       => null,
                'verification_code' => null
            ], $user->id);
            logExecute(__('Reset Kata Sandi'), UPDATE, $user->password, $userNew->password);
            DB::commit();
            return response200(true, __('Password updated successfully'));
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
        logLogout($user);
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
        $user->load(['roles.permissions']);
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
        logUpdate('User Profile', $user, $newUser);
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
        logUpdate('Password', $oldPassword, $newPassword);
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
}