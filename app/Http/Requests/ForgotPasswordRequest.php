<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class ForgotPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if (Route::is('api.forgotPassword')) {
            return [
                'email_token' => Str::random(100),
                'verification_code' => rand(100000, 999999)
            ];
        }

       // $isGoogleCaptcha = SettingRepository::isGoogleCaptchaLogin();
        return [
            'email_token' => Str::random(100),
            'verification_code' => rand(100000, 999999)
        ];
    }
}
