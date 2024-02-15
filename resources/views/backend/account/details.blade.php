@extends('backend.layouts.form')
@section('section', admin_lang('Account'))
@section('title', admin_lang('Personal details'))
@section('container', 'container-xxl flex-grow-1 container-p-y')
@section('content')
    <form id="billiongroup-submited-form" action="{{ route('admin.account.details.update') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="avatar text-center py-4">
                    <img id="filePreview" src="{{ asset(adminAuthInfo()->avatar) }}" alt="{{ adminAuthInfo()->name }}"
                        class="h-auto max-w-lg mx-auto" width="120px" height="120px">
                    <button id="selectFileBtn" type="button"
                        class="btn btn-secondary d-flex m-auto">{{ admin_lang('Choose Image') }}</button>
                    <input id="selectedFileInput" type="file" name="avatar" accept="image/png, image/jpg, image/jpeg"
                        hidden>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{ admin_lang('First Name') }} : <span class="text-danger">*</span></label>
                            <input type="firstname" class="form-control" name="firstname"
                                value="{{ adminAuthInfo()->firstname }}" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{ admin_lang('Last Name') }} : <span class="text-danger">*</span></label>
                            <input type="lastname" class="form-control" name="lastname"
                                value="{{ adminAuthInfo()->lastname }}" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ admin_lang('Email Address') }} : <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email"
                        value="{{ adminAuthInfo()->email }}" required>
                </div>
            </div>
        </div>
    </form>
@endsection
