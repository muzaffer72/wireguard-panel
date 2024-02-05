@extends('backend.layouts.form')
@section('title', admin_lang('SMTP'))
@section('section', admin_lang('Settings'))
@section('container', 'container-max-lg')
@section('content')
    <form id="billiongroup-submited-form" action="{{ route('admin.settings.smtp.update') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                {{ admin_lang('SMTP details') }}
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label class="form-label col-12 col-lg-3 col-form-label">{{ admin_lang('Status :') }} </label>
                    <div class="col col-lg-3">
                        <input type="checkbox" name="smtp[status]" data-toggle="toggle"
                            @if ($settings->smtp->status) checked @endif>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-12 col-lg-3 col-form-label">{{ admin_lang('Mail mailer :') }} </label>
                    <div class="col">
                        <select name="smtp[mailer]" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="smtp" @if ($settings->smtp->mailer == 'mail_mailer') selected @endif>
                                {{ admin_lang('SMTP') }}
                            </option>
                            <option value="sendmail" @if ($settings->smtp->mailer == 'sendmail') selected @endif>
                                {{ admin_lang('SENDMAIL') }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-12 col-lg-3 col-form-label">{{ admin_lang('Mail Host :') }} </label>
                    <div class="col">
                        <input type="text" name="smtp[host]" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ demoMode() ? '' : $settings->smtp->host }}"
                            placeholder="{{ admin_lang('Enter mail host') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-12 col-lg-3 col-form-label">{{ admin_lang('Mail Port :') }} </label>
                    <div class="col">
                        <input type="text" name="smtp[port]" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ demoMode() ? '' : $settings->smtp->port }}"
                            placeholder="{{ admin_lang('Enter mail port') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-12 col-lg-3 col-form-label">{{ admin_lang('Mail username :') }} </label>
                    <div class="col">
                        <input type="text" name="smtp[username]" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ demoMode() ? '' : $settings->smtp->username }}"
                            placeholder="{{ admin_lang('Enter username') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-12 col-lg-3 col-form-label">{{ admin_lang('Mail password :') }} </label>
                    <div class="col">
                        <input type="password" name="smtp[password]" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ demoMode() ? '' : $settings->smtp->password }}"
                            placeholder="{{ admin_lang('Enter password') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-12 col-lg-3 col-form-label">{{ admin_lang('Mail encryption :') }} </label>
                    <div class="col">
                        <select name="smtp[encryption]" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="tls" @if ($settings->smtp->encryption == 'tls') selected @endif>
                                {{ admin_lang('TLS') }}
                            </option>
                            <option value="ssl" @if ($settings->smtp->encryption == 'ssl') selected @endif>
                                {{ admin_lang('SSL') }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-12 col-lg-3 col-form-label">{{ admin_lang('From email :') }} </label>
                    <div class="col">
                        <input type="text" name="smtp[from_email]" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ demoMode() ? '' : $settings->smtp->from_email }}"
                            placeholder="{{ admin_lang('Enter from email') }}">
                    </div>
                </div>
                <div class="row">
                    <label class="form-label col-12 col-lg-3 col-form-label">{{ admin_lang('From name :') }} </label>
                    <div class="col">
                        <input type="text" name="smtp[from_name]" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ demoMode() ? '' : $settings->smtp->from_name }}"
                            placeholder="{{ admin_lang('Enter from name') }}">
                    </div>
                </div>
            </div>
        </div>
    </form>
    @if ($settings->smtp->status)
        <div class="card mt-4">
            <div class="card-header">
                {{ admin_lang('Testing') }}
            </div>
            <div class="card-body">
                <form action="{{ route('admin.settings.smtp.test') }}" method="POST">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-lg-auto">
                            <label class="form-label">{{ admin_lang('E-mail Address') }} : <span
                                    class="red">*</span></label>
                        </div>
                        <div class="col">
                            <input type="email" name="email" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john@example.com"
                                value="{{ adminAuthInfo()->email }}">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-success">{{ admin_lang('Send') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection
