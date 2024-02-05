@extends('backend.layouts.form')
@section('title', admin_lang('Mail Templates') . ' | ' . $mailTemplate->name)
@section('section', admin_lang('Settings'))
@section('back', route('admin.settings.mailtemplates.index'))
@section('container', 'container-max-lg')
@section('content')
    <form id="billiongroup-submited-form" action="{{ route('admin.settings.mailtemplates.update', $mailTemplate->id) }}"
        method="POST">
        @csrf
        <div class="card">
            <div class="card-header bg-lg-3 text-white">{{ admin_lang('Template') }}</div>
            <div class="card-body">
                <div class="row g-3 mb-4">
                    <div class="{{ $mailTemplate->undisable() ? 'col-lg-12' : 'col-lg-8' }}">
                        <label class="form-label">{{ admin_lang('Subject') }} : <span class="red">*</span></label>
                        <input type="text" name="subject" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $mailTemplate->subject }}"
                            required>
                    </div>
                    @if (!$mailTemplate->undisable())
                        <div class="col-lg-4">
                            <label class="form-label">{{ admin_lang('Status') }} :</label>
                            <input type="checkbox" name="status" data-toggle="toggle"
                                {{ $mailTemplate->status ? 'checked' : '' }}>
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ admin_lang('Body') }} : <span class="red">*</span></label>
                    <textarea name="body" class="ckeditor">{{ $mailTemplate->body }}</textarea>
                </div>
                <div class="alert alert-secondary mb-0">
                    <p class="mb-0"><strong>{{ admin_lang('Short Codes') }}</strong></p>
                    @foreach ($mailTemplate->shortcodes as $key => $value)
                        <li class="mt-2"><strong>@php echo "{{". $key ."}}"  @endphp</strong> : {{ $value }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </form>
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/ckeditor/plugins/uploadAdapterPlugin.js') }}"></script>
    @endpush
@endsection
