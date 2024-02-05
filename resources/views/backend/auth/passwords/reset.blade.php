@extends('backend.layouts.auth')
@section('title', admin_lang('Reset Password'))
@section('content')
    <h1 class="mb-0 h3">{{ admin_lang('Reset Password') }}</h1>
    <p class="card-text text-muted">{{ admin_lang('Enter the email address and a new password to start using your account.') }}</p>
    <form action="{{ route('admin.password.reset.change') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}" />
        <div class="mb-3">
            <label class="form-label">{{ admin_lang('Email Address') }} : <span class="red">*</span></label>
            <input type="email" name="email" value="{{ $email ?? old('email') }}" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>
        <div class="mb-3">
            <label class="form-label">{{ admin_lang('Password') }} : <span class="red">*</span></label>
            <input type="password" name="password" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-3">
            <label class="form-label">{{ admin_lang('Confirm Password') }} : <span class="red">*</span></label>
            <input type="password" name="password_confirmation" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        {!! display_captcha() !!}
        <button class="btn btn-primary btn-lg d-block w-100">{{ admin_lang('Reset Password') }}</button>
    </form>
    <p class="mb-0 text-center text-muted mt-3">{{ admin_lang('Remember your password') }}? <a
            href="{{ route('admin.login') }}">{{ admin_lang('Login') }}</a></p>
@endsection
