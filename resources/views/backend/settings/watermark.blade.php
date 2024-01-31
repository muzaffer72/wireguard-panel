@extends('backend.layouts.form')
@section('section', admin_lang('Settings'))
@section('title', admin_lang('Watermark'))
@section('container', 'container-max-lg')
@section('content')
    <form id="vironeer-submited-form" action="{{ route('admin.settings.watermark.update') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body p-4">
                <div class="vironeer-file-preview-box mb-3 bg-light py-4 text-center">
                    <div class="file-preview-box mb-3">
                        <img id="filePreview" src="{{ asset($settings->watermark->logo) }}" class="rounded-3"
                            width="{{ $settings->watermark->width }}px" height="{{ $settings->watermark->height }}px">
                    </div>
                    <button id="selectFileBtn" type="button"
                        class="btn btn-secondary mb-2">{{ admin_lang('Choose Image') }}</button>
                    <input id="selectedFileInput" type="file" name="watermark[logo]" accept="image/png" hidden>
                    <small class="text-muted d-block">{{ admin_lang('Image must be PNG format') }}</small>
                </div>
                <div class="col-lg-3 mb-3">
                    <label class="form-label">{{ admin_lang('Status') }} :</label>
                    <input type="checkbox" name="watermark[status]" data-toggle="toggle"
                        {{ $settings->watermark->status ? 'checked' : '' }}>
                </div>
                <div class="row g-3">
                    <div class="col-lg-12">
                        <label class="form-label">{{ admin_lang('Position') }} : <span class="red">*</span></label>
                        <select name="watermark[position]" class="form-select" required>
                            @foreach (\App\Models\Settings::WATERMARK_POSITIONS as $key => $value)
                                <option value="{{ $key }}"
                                    {{ $settings->watermark->position == $key ? 'selected' : '' }}>{{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_lang('Width') }} : <span class="red">*</span></label>
                        <input type="number" name="watermark[width]" class="form-control" min="25" max="1000"
                            value="{{ $settings->watermark->width }}" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_lang('Height') }} : <span class="red">*</span></label>
                        <input type="number" name="watermark[height]" class="form-control" min="25" max="1000"
                            value="{{ $settings->watermark->height }}" required>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
