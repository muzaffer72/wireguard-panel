<header class="billiongroup-page-header">
    <div class="billiongroup-sibebar-icon me-auto">
        <i class="fa fa-bars fa-lg"></i>
    </div>
    <div class="button">
        <a href="{{ url('/') }}" target="_blank" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><i
                class="fa fa-share me-2"></i>{{ admin_lang('Preview') }}</a>
    </div>
    <div class="billiongroup-notifications ms-2" data-dropdown-v2>
        <div class="billiongroup-notifications-title">
        <span style="font-size: 1em; color: white;">
        <i class="far fa-bell"></i>
  </span>
            
            <div class="counter">{{ $unreadAdminNotifications }}</div>
        </div>

        <div class="billiongroup-notifications-menu">
            <div class="billiongroup-notifications-header">
                <p class="billiongroup-notifications-header-title mb-0">
                    {{ admin_lang('Notifications') }} ({{ $unreadAdminNotificationsAll }})</p>
                @if ($unreadAdminNotifications)
                    <a href="{{ route('admin.notifications.readall') }}"
                        class="ms-auto billiongroup-link-confirm">{{ admin_lang('Mark All as Read') }}</a>
                @else
                    <span class="ms-auto text-muted">{{ admin_lang('Mark All as Read') }}</span>
                @endif
            </div>
            <div class="billiongroup-notifications-body">
                @forelse ($adminNotifications as $adminNotification)
                    @if ($adminNotification->link)
                        <a class="billiongroup-notification"
                            href="{{ route('admin.notifications.view', hashid($adminNotification->id)) }}">
                            <div class="billiongroup-notification-image">
                                <img src="{{ $adminNotification->image }}" alt="{{ $adminNotification->title }}">
                            </div>
                            <div class="billiongroup-notification-info">
                                <p
                                    class="billiongroup-notification-title mb-0 d-flex justify-content-between align-items-center">
                                    <span>{{ shortertext($adminNotification->title, 30) }}</span>
                                    @if (!$adminNotification->status)
                                        <span class="unread flashit"><i class="fas fa-circle"></i></span>
                                    @endif
                                </p>
                                <p class="billiongroup-notification-text mb-0">
                                    {{ $adminNotification->created_at->diffforhumans() }}
                                </p>
                            </div>
                        </a>
                    @else
                        <div class="billiongroup-notification">
                            <div class="billiongroup-notification-image">
                                <img src="{{ $adminNotification->image }}" alt="{{ $adminNotification->title }}">
                            </div>
                            <div class="billiongroup-notification-info">
                                <p
                                    class="billiongroup-notification-title mb-0 d-flex justify-content-between align-items-center">
                                    <span>{{ shortertext($adminNotification->title, 30) }}</span>
                                    @if (!$adminNotification->status)
                                        <span class="unread flashit"><i class="fas fa-circle"></i></span>
                                    @endif
                                </p>
                                <p class="billiongroup-notification-text mb-0">
                                    {{ $adminNotification->created_at->diffforhumans() }}
                                </p>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="empty">
                        <small class="text-muted mb-0">{{ admin_lang('No notifications found') }}</small>
                    </div>
                @endforelse
            </div>
            <a class="billiongroup-notifications-footer" href="{{ route('admin.notifications.index') }}">
                {{ admin_lang('View All') }}
            </a>
        </div>
    </div>

    <div class="billiongroup-user-menu">
        <div class="billiongroup-user" id="dropdownMenuButton" data-bs-toggle="dropdown">
            <div class="billiongroup-user-avatar">
                <img src="{{ asset(adminAuthInfo()->avatar) }}" alt="{{ adminAuthInfo()->name }}" />
            </div>
            <div class="billiongroup-user-info d-none d-md-block">
                <p class="billiongroup-user-title mb-0">{{ adminAuthInfo()->name }}</p>
                <p class="billiongroup-user-text mb-0">{{ adminAuthInfo()->email }}</p>
            </div>
        </div>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="{{ route('admin.account.details') }}"><i
                        class="fa fa-user me-2"></i>{{ admin_lang('Personal details') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('admin.account.security') }}"><i
                        class="fas fa-sync me-2"></i>{{ admin_lang('Change password') }}</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item text-danger"><i
                            class="fas fa-sign-out-alt me-2"></i>{{ admin_lang('Logout') }}</button>
                </form>
            </li>
        </ul>
    </div>
</header>
