@extends('backend.layouts.grid')
@section('title', admin_lang('Users'))
@section('link', route('admin.users.create'))
@section('content')
    <div class="row g-3 mb-4">
        <div class="col-12 col-lg-6 col-xxl-6">
            <div class="counter-card v3 c-purple">
                <div class="counter-card-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="counter-card-info">
                    <p class="counter-card-number">{{ $activeUsersCount }}</p>
                    <p class="counter-card-title">{{ admin_lang('Active Users') }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xxl-6">
            <div class="counter-card v3 c-purple">
                <div class="counter-card-icon">
                    <i class="fa fa-ban"></i>
                </div>
                <div class="counter-card-info">
                    <p class="counter-card-number">{{ $bannedUserscount }}</p>
                    <p class="counter-card-title">{{ admin_lang('Banned Users') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="custom-card card">
        <div class="card-header p-3 border-bottom-small">
            <!-- <form action="{{ request()->url() }}" method="GET">
                    <div class="input-group billiongroup-custom-input-group">
                        <input type="text" name="search" class="bg-dark block w-full p-2 text-white border border-gray-800 rounded-lg bg-gray-500 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ admin_lang('Search on users...') }}" value="{{ request()->input('search') ?? '' }}"
                            required>
                        <button class="btn btn-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">{{ admin_lang('Filter') }}</button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item"
                                    href="{{ request()->url() . '?filter=active' }}">{{ admin_lang('Active') }}</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ request()->url() . '?filter=banned' }}">{{ admin_lang('Banned') }}</a></li>
                        </ul>
                    </div>
                </form> -->

            <!-- <form>
        <div class="flex">
            <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-white-900 bg-dark border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">{{ admin_lang('Filter') }} <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
      </svg></button>
            <div id="dropdown" class="z-10 hidden bg-dark divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-black">
                <ul class="py-2 text-sm text-gray-700 dark:text-white" aria-labelledby="dropdown-button">
                    
                <li><a class="inline-flex w-full px-4 py-2 hover:bg-black-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    href="{{ request()->url() . '?filter=active' }}">{{ admin_lang('Active') }}</a></li>
                            <li><a class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    href="{{ request()->url() . '?filter=banned' }}">{{ admin_lang('Banned') }}</a></li>
                </ul>
            </div>
            <div class="relative w-full">
            <form action="{{ request()->url() }}" method="GET">
                <input type="text" name="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-dark rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="{{ admin_lang('Search on users...') }}" value="{{ request()->input('search') ?? '' }}"
                            required>
                <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
            </form>
        </div>
    </form> -->
            <div class="sm:flex">
                <div class="flex">
                    <span
                        class="inline-flex items-center px-3 text-sm text-white bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                    </span>
                    <form action="{{ request()->url() }}" method="GET">
                        <input type="text" name="search" id="search-dropdown"
                            class="rounded-none rounded-e-lg bg-dark border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Bonnie Green">
                    </form>
                </div>
                <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                @hasSection('link')
                                <a href="@yield('link')" class="relative px-3 py-1.5 transition-all ease-in duration-75 bg-dark dark:bg-gray-900 rounded-md group-hover:bg-opacity-0"><i class="fa fa-plus"> Add User</i></a>
                            @endif

                </div>
            </div>
        </div>
        <div>
            @if ($users->count() > 0)
                <div class="table-responsive">
                    <table class="billiongroup-normal-table table w-100">
                        <thead>
                            <tr>
                                <th class="tb-w-3x">#</th>
                                <th class="tb-w-20x">{{ admin_lang('User details') }}</th>
                                <th class="tb-w-3x text-center">{{ admin_lang('Subscription') }}</th>
                                <th class="tb-w-3x text-center">{{ admin_lang('Email status') }}</th>
                                <th class="tb-w-3x text-center">{{ admin_lang('Account status') }}</th>
                                <th class="tb-w-3x text-center">{{ admin_lang('Registred date') }}</th>
                                <th class="text-end"><i class="fas fa-sliders-h me-1"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <div class="billiongroup-user-box">
                                            <a class="billiongroup-user-avatar"
                                                href="{{ route('admin.users.edit', $user->id) }}">
                                                <img src="{{ asset($user->avatar) }}" alt="User" />
                                            </a>
                                            <div>
                                                <a class="text-reset"
                                                    href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a>
                                                <p class="text-muted mb-0">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if ($user->isSubscribed())
                                            @if ($user->subscription->isCancelled())
                                                <div class="badge bg-lg-7">{{ admin_lang('Canceled') }}</div>
                                            @elseif ($user->subscription->isExpired())
                                                <div class="badge bg-danger">{{ admin_lang('Expired') }}</div>
                                            @else
                                                <span class="badge bg-lg-1">{{ admin_lang('Subscribed') }}</span>
                                            @endif
                                        @else
                                            <span class="badge bg-secondary">{{ admin_lang('Unsubscribed') }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($user->email_verified_at)
                                            <span class="badge bg-girl">{{ admin_lang('Verified') }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ admin_lang('Unverified') }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($user->status)
                                            <span class="badge bg-success">{{ admin_lang('Active') }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ admin_lang('Banned') }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ dateFormat($user->created_at) }}</td>
                                    <td>
                                    
                                        <div class="text-end">
                                            <button type="button" class="btn btn-sm rounded-3" data-bs-toggle="dropdown"
                                                aria-expanded="true">
                                                <i class="fa fa-ellipsis-v fa-sm text-muted"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-sm-end"
                                                data-popper-placement="bottom-end">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.users.edit', $user->id) }}"><i
                                                            class="fas fa-edit me-2"></i>{{ admin_lang('Edit Details') }}</a>
                                                </li>
                                                @if ($user->isSubscribed())
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.subscriptions.edit', $user->subscription->id) }}"><i
                                                                class="far fa-gem me-2"></i>{{ admin_lang('Subscription') }}</a>
                                                    </li>
                                                @endif
                                                <li>
                                                    <hr class="dropdown-divider" />
                                                </li>
                                                <li>
                                                    <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                        method="POST">
                                                        @csrf @method('DELETE')
                                                        <button
                                                            class="billiongroup-able-to-delete dropdown-item text-danger"><i
                                                                class="far fa-trash-alt me-2"></i>{{ admin_lang('Delete') }}</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                @include('backend.includes.empty')
            @endif
        </div>
    </div>
    {{ $users->links() }}
@endsection
