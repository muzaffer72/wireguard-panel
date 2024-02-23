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
          <div class="hero-text-box text-center mb-4">
            <h1 class="text-primary hero-title display-6 fw-bold">{{ lang('Wireguard VPN', 'home page') }}</h1>
            <h2 class="hero-sub-title h6 mb-4 pb-1">
              {{ lang('Trusted by 3oo,ooo,ooo users.', 'home page') }}
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
          <div id="heroDashboardAnimation" class="hero-animation-img">
            <a href="#" target="_blank">
              <div id="heroAnimationImg" class="position-relative hero-dashboard-img">
                <img
                  src="{{ asset('assets/img/front-pages/landing-page/hero-dashboard-light.jpg') }}"
                  alt="hero dashboard"
                  class="animation-img"
                  data-app-light-img="front-pages/landing-page/hero-dashboard-light.jpg"
                  data-app-dark-img="front-pages/landing-page/hero-dashboard-dark.jpg" />
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="landing-hero-blank"></div>
    </section>
    {!! ads_home_page_center() !!}
    @include('frontend.includes.fact')
    @include('frontend.includes.faqs')
    @include('frontend.includes.articles')
  </div>
    @push('styles_libs')
    @endpush
      {!! ads_home_page_bottom() !!}
    @push('scripts_libs')
    @endpush
@endsection
