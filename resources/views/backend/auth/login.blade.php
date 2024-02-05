@extends('backend.layouts.auth')
@section('title', admin_lang('Login'))
@section('content')
   
    <form action="{{ route('admin.login.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">{{ admin_lang('Email Address') }} : <span class="red">*</span></label>
            <input type="email" name="email" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('email') }}" required />
        </div>
        <div class="mb-3">
            <label class="form-label">{{ admin_lang('Password') }} : <span class="red">*</span></label>
            <input type="password" name="password" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="row mb-3">
            <div class="col-auto">
                <label class="form-check mb-0">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                        class="form-check-input">
                    <span class="form-check-label">{{ admin_lang('Remember me') }}</span>
                </label>
            </div>
            <div class="col-auto ms-auto">
            <p class="text-md font-medium text-white dark:text-white"><a href="{{ route('admin.password.reset') }}">{{ admin_lang('Forgot password') }}?</a></p>
                
            </div>
        </div>
        {!! display_captcha() !!}
        
        <button class="btn btn-primary btn-lg d-block w-100 text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">{{ admin_lang('Login') }}</button>
    </form>
@endsection
