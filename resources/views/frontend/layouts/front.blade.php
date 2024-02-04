<!DOCTYPE html>
<html lang="{{ getLang() }}">

<head>
    @include('frontend.global.head')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
        
    @endpush
    @include('frontend.global.styles')
    {!! head_code() !!}
</head>

<body>
    @include('frontend.includes.navbar')
    @yield('content')
    @include('frontend.includes.footer')
    @push('scripts')
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
    @endpush
    @include('frontend.configurations.config')
    @include('frontend.configurations.widgets')
    @include('frontend.global.scripts')
</body>

</html>
