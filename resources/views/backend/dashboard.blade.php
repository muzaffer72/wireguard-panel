@extends('backend.layouts.application')
@section('title', admin_lang('Dashboard'))
@section('access', admin_lang('Quick Access'))
@section('container', 'container-fluid py-4')
@section('content')

    @if (!$settings->smtp->status)
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">
                    {{ admin_lang('SMTP is not enabled, set it now to be able to recover the password and use all the features that needs to send an email.') }}</span>
                <a href="{{ route('admin.settings.smtp.index') }}">{{ admin_lang('Take Action') }}</a>
            </div>
        </div>
    @endif
    <div class="row g-3 mb-4">
        <div class="col-12 col-lg-4 col-xxl-4">
            <div class="w-full h-full bg-dark rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="grid grid-cols-2">
                    <dl class="flex items-center">
                        <dt class="text-white dark:text-gray-400 text-sm font-normal me-1">
                            <h5 class="leading-none text-1xl font-bold text-white dark:text-white pb-2">
                                {{ admin_lang('Recently transactions') }}</h5>
                        </dt>
                    </dl>
                    <dl class="flex items-center justify-end">
                        <div class="flex-shrink-0">
                            <a href="{{ route('admin.transactions.index') }}"
                                class="text-sm font-medium text-white hover:bg-cyan-600 rounded-lg p-2">{{ admin_lang('View All') }}</a>
                        </div>

                    </dl>
                </div>
                @forelse ($transactions as $transaction)
                    <table class="w-full divide-y divide-gray-50">
                        <thead class="bg-dark-50">
                            <tr>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Transaction
                                </th>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Date & Time
                                </th>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Amount
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-dark">
                            <tr>
                                <td class="p-4 whitespace-nowrap text-sm font-normal text-white-900 ">
                                    <a href="{{ route('admin.transactions.edit', $transaction->id) }}">
                                        {{ $transaction->user->name }}
                                    </a>
                                </td>
                                <td class="p-4 whitespace-nowrap text-sm font-normal text-white-500">
                                    {{ $transaction->created_at->diffforhumans() }}
                                </td>
                                <td class="p-4 whitespace-nowrap text-sm font-semibold text-green-500">
                                    <strong>{{ priceSymbol($transaction->total) }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @empty
                    @include('backend.includes.emptysmall')
                @endforelse

            </div>
        </div>
        <div class="col-12 col-lg-8 col-xxl-8">

            <div class="w-full h-full bg-dark rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="grid grid-cols-2">
                    <dl class="flex items-center">
                        <dt class="text-white dark:text-gray-400 text-sm font-normal me-1">
                            <h5 class="leading-none text-1xl font-bold text-white dark:text-white pb-2">
                                {{ admin_lang('Recently transactions') }}</h5>
                        </dt>
                    </dl>
                    <dl class="flex items-center justify-end">
                        <div class="flex-shrink-0">
                            <a href="{{ route('admin.transactions.index') }}"
                                class="text-sm font-medium text-white hover:bg-cyan-600 rounded-lg p-2">{{ admin_lang('View All') }}</a>
                        </div>

                    </dl>
                
                </div>

                <div id="revenue-chart"></div>

            </div>

    
        </div>
    </div>
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
        <div class="col-12 col-lg-8 col-xxl-8">

            <div class="max-w-full min-h-full bg-dark rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between">
                    <div>
                        <h5 class="leading-none text-1xl font-bold text-white dark:text-white pb-2">
                            {{ admin_lang('Users Statistics For This Week') }}</h5>
                    </div>

                </div>
                <div id="area-chart"></div>
                <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">

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

            <div class="w-full bg-dark rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between items-start w-full">
                    @if ($countUsersLogs)
                        <div class="flex-col items-center">
                            <div class="flex items-center mb-1">
                                <h5 class="text-xl font-bold leading-none text-white dark:text-white me-1">
                                    {{ admin_lang('Login Statistics - Browsers') }}</h5>
                            </div>
                        </div>
                        <div class="flex justify-end items-center">
                            <small class="text-muted ms-auto">({{ carbon()->now()->format('F') }})</small>
                        </div>
                    @else
                        <div class="card-body">
                            @include('backend.includes.emptysmall')
                        </div>
                    @endif
                </div>
                <div class="py-6" id="pie-browsers"></div>
            </div>

        </div>

        <div class="col-lg-4">

            <div class="w-full bg-dark rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between items-start w-full">
                    @if ($countUsersLogs)
                        <div class="flex-col items-center">
                            <div class="flex items-center mb-1">
                                <h5 class="text-xl font-bold leading-none text-white dark:text-white me-1">
                                    {{ admin_lang('Login Statistics - Browsers') }}</h5>
                            </div>
                        </div>
                        <div class="flex justify-end items-center">
                            <small class="text-muted ms-auto">({{ carbon()->now()->format('F') }})</small>
                        </div>
                    @else
                        <div class="card-body">
                            @include('backend.includes.emptysmall')
                        </div>
                    @endif
                </div>
                <div class="py-6" id="pie-os"></div>
            </div>

        </div>

        <div class="col-lg-4">
            <div class="w-full bg-dark rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between items-start w-full">
                    @if ($countUsersLogs)
                        <div class="flex-col items-center">
                            <div class="flex items-center mb-1">
                                <h5 class="text-xl font-bold leading-none text-white dark:text-white me-1">
                                    {{ admin_lang('Login Statistics - Browsers') }}</h5>
                            </div>
                        </div>
                        <div class="flex justify-end items-center">
                            <small class="text-muted ms-auto">({{ carbon()->now()->format('F') }})</small>
                        </div>
                    @else
                        <div class="card-body">
                            @include('backend.includes.emptysmall')
                        </div>
                    @endif
                </div>
                <div class="py-6" id="pie-country"></div>
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
            <script src="{{ asset('assets/js/charts.js') }}"></script>
        @endpush
    @endsection
