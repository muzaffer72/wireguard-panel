@extends('backend.layouts.form')
@section('title', admin_lang('Add New'))
@section('container', 'container-max-lg')
@section('back', route('admin.faqs.index'))
@section('content')
    <form id="billiongroup-submited-form" action="{{ route('admin.faqs.store') }}" method="POST">
        @csrf
        <div class="card p-2 mb-3">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">{{ admin_lang('Language') }} :<span class="red">*</span></label>
                    <select name="lang" class="form-select select2" required>
                        <option></option>
                        @foreach ($adminLanguages as $adminLanguage)
                            <option value="{{ $adminLanguage->code }}" @if (old('lang') == $adminLanguage->code) selected @endif>
                                {{ $adminLanguage->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ admin_lang('Title') }} : <span class="red">*</span></label>
                    <input type="text" name="title" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('title') }}" required
                        autofocus />
                </div>
                <div class="mb-2">
                    <label class="form-label">{{ admin_lang('Content') }} :
                        <span class="red">*</span></label>
                    <textarea name="content" class="ckeditor">{{ old('content') }}</textarea>
                </div>
            </div>
        </div>
    </form>
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/ckeditor/plugins/uploadAdapterPlugin.js') }}"></script>
    @endpush
@endsection
