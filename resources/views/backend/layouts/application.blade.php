<!DOCTYPE html>
<html lang="{{ getLang() }}">

<head>
    @include('backend.includes.head')
    @include('backend.includes.styles')
    @vite('resources/css/app.css')
</head>

<body>
    @include('backend.includes.sidebar')
    <div class="billiongroup-page-content">
        @include('backend.includes.header')
        <div class="container @yield('container')">
            <div class="billiongroup-page-body">
                <div class="py-4 g-4">
                    <div class="row align-items-center">
                        <div class="col">
                            @include('backend.includes.breadcrumb')
                        </div>
                        <div class="col-auto">
                            @hasSection('back')
                                <a href="@yield('back')" class="btn btn-secondary"><i
                                        class="fas fa-arrow-left me-2"></i>{{ admin_lang('Back') }}</a>
                            @endif
                            
                            @if (request()->routeIs('admin.system.index'))
                                <a href="{{ $system->profile }}" target="_blank" class="btn btn-secondary btn-lg"><i
                                        class="far fa-question-circle me-2"></i>{{ admin_lang('Get Help') }}</a>
                            @endif
                        </div>
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
