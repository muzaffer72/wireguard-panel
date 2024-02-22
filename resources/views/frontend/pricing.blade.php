@extends('frontend.layouts.single')
@section('title', lang('Pricing', 'pages'))
@section('content')
    {!! ads_other_pages_top() !!}
    <div class="section-header text-center mb-5">
        <h1 class="mb-3">{{ lang('Pricing', 'pages') }}</h1>
        <p class="fw-light text-muted mb-0">
            {{ lang('Pricing description', 'pages') }}
        </p>
    </div>
    @if ($yearlyPlans->count() > 0)
        <div class="d-flex justify-content-center mb-5">
            <div class="plan-switcher">
                <span class="plan-switcher-item active">{{ lang('Monthly', 'plans') }}</span>
                <span class="plan-switcher-item">{{ lang('Yearly', 'plans') }}</span>
            </div>
        </div>
    @endif
    <div class="plans">
        <div class="plans-item active">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center align-items-center g-3">
                @foreach ($monthlyPlans as $plan)
                    <div class="card plan-card p-4 {{ $plan->isFeatured() ? 'bg-primary text-white' : '' }} h-100 me-4">
                        <div class="plan {{ $plan->isFeatured() ? 'pro' : '' }}">
                            <div class="plan-header">
                                <h3 class="text-white">{{ $plan->name }}</h3>
                                <p>{{ $plan->product_id }}</p>
                            </div>
                            <div class="plan-body">
                                <hr/>
                                <div class="plan-price d-flex justify-content-center align-items-center">
                                    @if ($plan->isFree())
                                        <p class="mb-0">{{ lang('Free', 'plans') }}</p>
                                    @else
                                        <p class="mb-0">{{ priceSymbol($plan->price) }}</p>
                                        <span>/{{ formatInterval($plan->interval) }}</span>
                                    @endif
                                </div>
                                <hr/>
                            </div>
                            <div class="plan-footer">
                                {!! planButton($plan) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        @if ($yearlyPlans->count() > 0)
            <div class="plans-item">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center align-items-center g-3">
                    @foreach ($yearlyPlans as $plan)
                        <div class="card plan-card p-4 {{ $plan->isFeatured() ? 'bg-primary text-white' : '' }} h-100 me-4">
                            <div class="plan {{ $plan->isFeatured() ? 'pro' : '' }}">
                                <div class="plan-header">
                                    <h3 class="{{ $plan->isFeatured() ? 'text-white' : '' }}">{{ $plan->name }}</h3>
                                    <p>{{ $plan->product_id }}</p>
                                </div>
                                <div class="plan-body">
                                    <hr/>
                                    <div class="plan-price d-flex justify-content-center align-items-center">
                                        @if ($plan->isFree())
                                            <p class="mb-0">{{ lang('Free', 'plans') }}</p>
                                        @else
                                            <p class="mb-0">{{ priceSymbol($plan->price) }}</p>
                                            <span>/{{ formatInterval($plan->interval) }}</span>
                                        @endif
                                    </div>
                                    <hr/>
                                </div>
                                <div class="plan-footer">
                                    {!! planButton($plan) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
    {!! ads_other_pages_bottom() !!}
@endsection
