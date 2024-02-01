@extends('backend.layouts.application')
@section('title', admin_lang('Dashboard'))
@section('access', admin_lang('Quick Access'))
@section('container', 'container-fluid py-4')
@section('content')
   
    @if (!$settings->smtp->status)
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle me-2"></i>
            {{ admin_lang('SMTP is not enabled, set it now to be able to recover the password and use all the features that needs to send an email.') }}
            <a href="{{ route('admin.settings.smtp.index') }}">{{ admin_lang('Take Action') }}</a>
        </div>
    @endif
    <div class="row row-cols-1 row-cols-md-1 row-cols-xl-1 row-cols-xxl-4 g-4 mb-4">
        <div class="col">
            <div class="counter-card v3 c-purple">
                <div class="counter-card-icon">
                    <i class="fas fa-dollar-sign fa-sm"></i>
                </div>
                <div class="counter-card-info">
                    <p class="counter-card-number">{{ priceSymbol($widget['total_earnings']) }}</p>
                    <p class="counter-card-title">{{ admin_lang('Total Earnings') }}</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="counter-card v3 c-purple">
                <div class="counter-card-icon">
                    <i class="fas fa-dollar-sign fa-sm"></i>
                </div>
                <div class="counter-card-info">
                <p class="counter-card-number">{{ priceSymbol($widget['current_month_earnings']) }}</p>
                    <p class="counter-card-title">{{ admin_lang('Current Month Earnings') }}</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="counter-card v3 c-purple">
                <div class="counter-card-icon">
                    <i class="fa fa-users fa-sm"></i>
                </div>
                <div class="counter-card-info">
                    <p class="counter-card-number">{{ number_format($widget['total_users']) }}</p>
                    <p class="counter-card-title">{{ admin_lang('Total Users') }}</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="counter-card v3 c-purple">
                <div class="counter-card-icon">
                    <i class="fas fa-users fa-sm"></i>
                </div>
                <div class="counter-card-info">
                <p class="counter-card-number">{{ number_format($widget['current_month_users']) }}</p>
                    <p class="counter-card-title">{{ admin_lang('Current Month Users') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3 mb-4">
        <div class="col-12 col-lg-4 col-xxl-4">
            <div class="card vhp-460">
                <div class="billiongroup-box v2">
                    <div class="billiongroup-box-header mb-3">
                        <p class="billiongroup-box-header-title large mb-0">{{ admin_lang('Recently transactions') }}</p>
                        <div class="billiongroup-box-header-action ms-auto">
                            <button type="button" class="btn btn-sm rounded-3" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-sm-end">
                                <li><a class="dropdown-item"
                                        href="{{ route('admin.transactions.index') }}">{{ admin_lang('View All') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="billiongroup-box-body">
                        <div class="billiongroup-random-lists">
                            @forelse ($transactions as $transaction)
                                <div class="billiongroup-random-list">
                                    <div class="billiongroup-random-list-cont">
                                        <div class="billiongroup-random-list-info">
                                            <div>
                                                <a class="billiongroup-random-list-title fs-exact-14"
                                                    href="{{ route('admin.transactions.edit', $transaction->id) }}">
                                                    #{{ $transaction->id }}
                                                </a>
                                                <p class="billiongroup-random-list-text mb-0">
                                                    {{ $transaction->created_at->diffforhumans() }}
                                                </p>
                                            </div>
                                            <div class="billiongroup-random-list-action">
                                                <span class="text-success">+
                                                    <strong>{{ priceSymbol($transaction->total) }}</strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                @include('backend.includes.emptysmall')
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8 col-xxl-8">
            <div class="card">
                <div class="billiongroup-box chart-bar">
                    <div class="billiongroup-box-header">
                        <p class="billiongroup-box-header-title large mb-0">
                            {{ admin_lang('Earnings Statistics For This Week') }}
                        </p>
                        <div class="billiongroup-box-header-action ms-auto">
                            <button type="button" class="btn btn-sm rounded-3" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-sm-end">
                                <li><a class="dropdown-item"
                                        href="{{ route('admin.transactions.index') }}">{{ admin_lang('View Transactions') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="billiongroup-box-body">
                        <div class="chart-bar">
                            <canvas height="380" id="billiongroup-earnings-charts"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3 mb-4">
        <div class="col-12 col-lg-8 col-xxl-8">
            <div class="card">
                <div class="billiongroup-box chart-bar">
                    <div class="billiongroup-box-header">
                        <p class="billiongroup-box-header-title large mb-0">{{ admin_lang('Users Statistics For This Week') }}
                        </p>
                        <div class="billiongroup-box-header-action ms-auto">
                            <button type="button" class="btn btn-sm rounded-3" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-sm-end">
                                <li><a class="dropdown-item"
                                        href="{{ route('admin.users.index') }}">{{ admin_lang('View All') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="billiongroup-box-body">
                        <div class="chart-bar">
                            <canvas height="380" id="billiongroup-users-charts"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-xxl-4">
            <div class="card vhp-460">
                <div class="billiongroup-box v2">
                    <div class="billiongroup-box-header mb-3">
                        <p class="billiongroup-box-header-title large mb-0">{{ admin_lang('Recently registered') }}</p>
                        <div class="billiongroup-box-header-action ms-auto">
                            <button type="button" class="btn btn-sm rounded-3" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-sm-end">
                                <li><a class="dropdown-item"
                                        href="{{ route('admin.users.index') }}">{{ admin_lang('View All') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="billiongroup-box-body">
                        <div class="billiongroup-random-lists">
                            @forelse ($users as $user)
                                <div class="billiongroup-random-list">
                                    <div class="billiongroup-random-list-cont">
                                        <a class="billiongroup-random-list-img" href="#">
                                            <img src="{{ asset($user->avatar) }}" />
                                        </a>
                                        <div class="billiongroup-random-list-info">
                                            <div>
                                                <a class="billiongroup-random-list-title fs-exact-14"
                                                    href="{{ route('admin.users.edit', $user->id) }}">
                                                    {{ $user->name }}
                                                </a>
                                                <p class="billiongroup-random-list-text mb-0">
                                                    {{ $user->created_at->diffforhumans() }}
                                                </p>
                                            </div>
                                            <div class="billiongroup-random-list-action d-none d-lg-block">
                                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                @include('backend.includes.emptysmall')
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3">
        <div class="col-lg-4">
            <div class="card">
                <div class="billiongroup-box chart-bar">
                    <div class="billiongroup-box-header">
                        <p class="billiongroup-box-header-title large mb-0">{{ admin_lang('Login Statistics - Browsers') }}
                        </p>
                        <small class="text-muted ms-auto">({{ carbon()->now()->format('F') }})</small>
                    </div>
                    @if ($countUsersLogs)
                        <div class="billiongroup-box-body">
                            <div class="chart-bar">
                                <canvas id="billiongroup-browsers-charts"></canvas>
                            </div>
                        </div>
                    @else
                        <div class="card-body">
                            @include('backend.includes.emptysmall')
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="billiongroup-box chart-bar">
                    <div class="billiongroup-box-header">
                        <p class="billiongroup-box-header-title large mb-0">
                            {{ admin_lang('Login Statistics - Operating Systems') }}
                        </p>
                        <small class="text-muted ms-auto">({{ carbon()->now()->format('F') }})</small>
                    </div>
                    @if ($countUsersLogs)
                        <div class="billiongroup-box-body">
                            <div class="chart-bar">
                                <canvas id="billiongroup-os-charts"></canvas>
                            </div>
                        </div>
                    @else
                        <div class="card-body">
                            @include('backend.includes.emptysmall')
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="billiongroup-box chart-bar">
                    <div class="billiongroup-box-header">
                        <p class="billiongroup-box-header-title large mb-0">{{ admin_lang('Login Statistics - Countries') }}
                        </p>
                        <small class="text-muted ms-auto">({{ carbon()->now()->format('F') }})</small>
                    </div>
                    @if ($countUsersLogs)
                        <div class="billiongroup-box-body">
                            <div class="chart-bar">
                                <canvas id="billiongroup-countries-charts"></canvas>
                            </div>
                        </div>
                    @else
                        <div class="card-body">
                            @include('backend.includes.emptysmall')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @push('top_scripts')
        <script type="text/javascript">
            "use strict";
            const CURRENCY_CODE = "{{ $settings->currency->symbol }}";
            const CURRENCY_POSITION = "{{ $settings->currency->position }}";
        </script>
    @endpush
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/chartjs/chart.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/admin/js/charts.js') }}"></script>
    @endpush
@endsection
