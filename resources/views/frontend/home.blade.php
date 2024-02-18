@extends('frontend.layouts.front')
@section('title', $SeoConfiguration->title ?? '')
@section('content')
  {!! ads_home_page_top() !!}
  <!-- Sections:Start -->
  <div data-bs-spy="scroll" class="scrollspy-example">
    <!-- Hero: Start -->
    <section id="hero-animation">
      <div id="landingHero" class="section-py landing-hero position-relative">
        <img
          src="{{ asset('assets/img/front-pages/backgrounds/hero-bg.png') }}"
          alt="hero background"
          class="position-absolute top-0 start-50 translate-middle-x object-fit-contain w-100 h-100"
          data-speed="1" />
        <div class="container">
          <div class="hero-text-box text-center">
            <h1 class="text-primary hero-title display-6 fw-bold">{{ lang('AI Image Generator', 'home page') }}</h1>
            <h2 class="hero-sub-title h6 mb-4 pb-1">
              {{ lang('Create stunning and unique images with ease using our AI image generation.', 'home page') }}
            </h2>
            <div class="landing-hero-btn d-inline-block position-relative">
              @if (subscription())
                @if (subscription()->is_subscribed)
                  <a href="{{ route('user.settings.index') }}"
                    class="btn btn-primary btn-lg">{{ lang('Button When subscribed', 'home page') }}</a>
                @else
                  <a href="{{ route('user.settings.index') }}"
                    class="btn btn-primary btn-lg">{{ lang('Button When expired', 'home page') }}</a>
                @endif
              @else
                <a href="{{ route('login') }}"
                  class="btn btn-primary btn-lg">{{ lang('Start Generating', 'home page') }}</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
    
    {!! ads_home_page_center() !!}
  
    @include('frontend.includes.faqs')
    @include('frontend.includes.articles')
    @push('styles_libs')
    @endpush
    {!! ads_home_page_bottom() !!}
    @push('scripts_libs')
    @endpush
@endsection
