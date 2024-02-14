@extends('frontend.layouts.front')
@section('title', $SeoConfiguration->title ?? '')
@section('content')
    {!! ads_home_page_top() !!}
    <header class="header">
        <div class="wrapper">
            <div class="container">
                <div class="wrapper-content">
                    <div class="wrapper-container">
                        <h1 class="title mb-3">{{ lang('AI Image Generator', 'home page') }}</h1>
                        <p class="mb-0 text-muted">
                            {{ lang('Create stunning and unique images with ease using our AI image generation.', 'home page') }}
                        </p>
                        @if (subscription())
                            @if (subscription()->is_subscribed)
                                <form id="generator" action="{{ route('images.generator') }}" method="POST">
                                    <div class="card-v mt-5">
                                        <div class="generator-search v2">
                                            @if ($apiProvider)
                                                <div class="row g-3">
                                                    <div class="col-lg-8">
                                                        <input type="text" name="prompt" class="form-control"
                                                            placeholder="{{ lang('What do you want to generate?', 'home page') }}"
                                                            value="{{ request('prompt') ?? '' }}" required />
                                                    </div>
                                                    <div class="col col-lg-2">
                                                        <button type="button" id="generator-options-btn"
                                                            class="btn btn-light px-4 w-100"><i
                                                                class="fa fa-cog me-1"></i>{{ lang('Options', 'home page') }}</button>
                                                    </div>
                                                    <div class="col col-lg-2">
                                                        <button id="generate-button" class="btn btn-primary px-4 w-100"><i
                                                                class="fa-solid fa-rotate me-2"></i>{{ lang('Generate', 'home page') }}</button>
                                                    </div>
                                                </div>
                                                <div class="generator-options d-none">
                                                    <div class="row g-3">
                                                        @if ($apiProvider->supportNegativePrompt())
                                                            <div class="col-12">
                                                                <label
                                                                    class="form-label">{{ lang('Negative Prompt', 'home page') }}</label>
                                                                <input type="text" name="negative_prompt"
                                                                    class="form-control"
                                                                    placeholder="{{ lang('What you want to avoid generating?', 'home page') }}" />
                                                            </div>
                                                        @endif
                                                        @if ($apiProvider->hasModels())
                                                            <div class="col-12 col-lg-4">
                                                                <label
                                                                    class="form-label">{{ lang('Model', 'home page') }}</label>
                                                                <select name="model" class="form-select w-100">
                                                                    @foreach ($apiProvider->models as $key => $model)
                                                                        <option value="{{ $key }}">
                                                                            {{ $model->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        @endif
                                                        @if ($apiProvider->hasStyles())
                                                            <div class="col-12 col-lg">
                                                                <label
                                                                    class="form-label">{{ lang('Style', 'home page') }}</label>
                                                                <select name="style" class="form-select w-100">
                                                                    @foreach ($apiProvider->styles as $key => $value)
                                                                        <option value="{{ $key }}">
                                                                            {{ $value }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        @endif
                                                        @if (subscription()->plan->max_images > 1)
                                                            <div class="col-12 col-lg">
                                                                <label class="form-label">
                                                                    {{ lang('Samples', 'home page') }}</label>
                                                                <select name="samples" class="form-select w-100" required>
                                                                    @for ($i = 1; $i <= subscription()->plan->max_images; $i++)
                                                                        <option value="{{ $i }}">
                                                                            {{ $i }}
                                                                        </option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        @else
                                                            <input type="hidden" name="samples" value="1">
                                                        @endif
                                                        <div class="col-12 col-lg">
                                                            <label
                                                                class="form-label">{{ lang('Image Size', 'home page') }}</label>
                                                            <select name="size" class="form-select w-100" required>
                                                                @foreach (subscription()->plan->sizes as $size)
                                                                    <option value="{{ $size }}">
                                                                        {{ $size }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @if (auth()->user())
                                                            <div class="col-12 col-lg">
                                                                <label class="form-label">
                                                                    {{ lang('Visibility', 'home page') }}</label>
                                                                <select name="visibility" class="form-select w-100"
                                                                    required>
                                                                    <option value="1">
                                                                        {{ lang('Public', 'home page') }}</option>
                                                                    <option value="0">
                                                                        {{ lang('Private', 'home page') }}</option>
                                                                </select>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @else
                                                <div class="alert alert-warning mb-0">
                                                    {{ lang('API provider not enabled', 'home page') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                                <div class="processing d-none mt-5">
                                    <div class="spinner-border text-primary mb-3" role="status">
                                        <span class="visually-hidden"></span>
                                    </div>
                                    <h5 class="mb-0">{{ lang('Generating...', 'home page') }}</h5>
                                </div>
                            @else
                                <div class="alert alert-warning mt-4">
                                    <i class="fa-regular fa-circle-question me-1"></i>
                                    {{ lang('You need to have an active subscription to start generating the images', 'home page') }}
                                </div>
                            @endif
                        @else
                            <a href="{{ route('login') }}"
                                class="btn btn-primary btn-lg mt-4">{{ lang('Start Generating', 'home page') }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
    {!! ads_home_page_center() !!}
  
    @include('frontend.includes.faqs')
    @include('frontend.includes.articles')
    @push('styles_libs')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/aos/aos.min.css') }}">
    @endpush
    {!! ads_home_page_bottom() !!}
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/aos/aos.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/jquery/jquery.lazy.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/clipboard/clipboard.min.js') }}"></script>
    @endpush
@endsection
