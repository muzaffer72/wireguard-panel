@extends('backend.layouts.form')
@section('section', admin_lang('Account'))
@section('title', admin_lang('Change password'))
@section('container', 'container-max-lg')
@section('content')
    <form id="billiongroup-submited-form" action="{{ route('admin.account.security.update') }}" method="POST">
        @csrf
        <div class="card p-2">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">{{ admin_lang('Password') }} : <span class="red">*</span></label>
                    <input type="password" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="current-password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ admin_lang('New Password') }} : <span class="red">*</span></label>
                    <input type="password" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="new-password" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">{{ admin_lang('Confirm New Password') }} : <span class="red">*</span></label>
                    <input type="password" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="new-password_confirmation" required>
                </div>
            </div>
        </div>
    </form>
@endsection
