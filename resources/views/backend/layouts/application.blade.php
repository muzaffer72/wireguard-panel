<!DOCTYPE html>
<html lang="{{ getLang() }}">

<head>
    @include('backend.includes.head')
    @include('backend.includes.styles')
    @vite('resources/css/app.css')
</head>

<body=->
    @include('backend.includes.sidebar')
    <div class="billiongroup-page-content">
        @include('backend.includes.header')
        <div class="container @yield('container')">
            <div class="billiongroup-page-body">
                <div class="py-4 g-4">
                    <div class="row align-items-center">
                       
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
        @include('backend.includes.footer')
    </div>
    @include('backend.includes.scripts')
</body>

</html>
