@extends('backend.layouts.form')
@section('title', admin_lang('Edit SEO Configuration for ' . $configuration->lang . ' language'))
@section('section', admin_lang('Settings'))
@section('container', 'container-max-lg')
@section('back', route('admin.settings.seo.index'))
@section('content')
    <form id="billiongroup-submited-form" action="{{ route('admin.settings.seo.update', $configuration->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">{{ admin_lang('Language') }} :<span class="red">*</span></label>
                    <select name="lang" class="form-select select2" required>
                        <option></option>
                        @foreach ($languages as $language)
                            <option value="{{ $language->code }}" @if ($configuration->lang == $language->code) selected @endif>
                                {{ $language->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ admin_lang('Site Title') }} :<span class="red">*</span></label>
                    <input type="text" name="title" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Title must be within 70 Characters" value="{{ $configuration->title }}" required>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{ admin_lang('Site Description') }} :<span class="red">*</span></label>
                            <textarea name="description" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" rows="6" placeholder="Description must be within 150 Characters"
                                required>{{ $configuration->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{ admin_lang('Site Keywords') }} : <span class="red">*</span></label>
                            <textarea id="keywords" name="keywords" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" rows="6" placeholder="keyword1, keyword2, keyword3"
                                required>{{ $configuration->keywords }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{ admin_lang('Allow robots to index your website') }}? : <span
                                    class="red">*</span></label>
                            <select name="robots_index" class="form-select" required>
                                <option value="index" @if ($configuration->robots_index == 'index') selected @endif>
                                    {{ admin_lang('Yes') }}</option>
                                <option value="noindex" @if ($configuration->robots_index == 'noindex') selected @endif>
                                    {{ admin_lang('No') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{ admin_lang('Allow robots to follow all links') }}? : <span
                                    class="red">*</span></label>
                            <select name="robots_follow_links" class="form-select" required>
                                <option value="follow" @if ($configuration->robots_follow_links == 'follow') selected @endif>
                                    {{ admin_lang('Yes') }}</option>
                                <option value="nofollow" @if ($configuration->robots_follow_links == 'nofollow') selected @endif>
                                    {{ admin_lang('No') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
