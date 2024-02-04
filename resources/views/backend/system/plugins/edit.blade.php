@extends('backend.layouts.form')
@section('title', admin_lang('Plugins') . ' | ' . $plugin->name)
@section('back', route('admin.system.plugins.index'))
@section('container', 'container-max-lg')
@section('content')
    <form id="billiongroup-submited-form" action="{{ route('admin.system.plugins.update', $plugin->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="billiongroup-file-preview-box bg-light mb-3 p-4 text-center">
                    <div class="file-preview-box mb-3">
                        <img src="{{ $plugin->logo }}" height="100">
                    </div>
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_lang('Name') }} : </label>
                        <input class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $plugin->name }}" readonly>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_lang('Version') }} : </label>
                        <input class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="v{{ $plugin->version }}" readonly>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">{{ admin_lang('Plugin Update Files (Zip)') }} : <span
                                class="red">*</span></label>
                        <input class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="file" name="plugin_files" required>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
