

<aside class="billiongroup-sidebar">
    <div class="overlay"></div>
    <div class="billiongroup-sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="billiongroup-sidebar-logo">
            <img src="{{ asset($settings->media->light_logo) }}" alt="{{ $settings->general->site_name }}" />
        </a>
    </div>
    <div class="billiongroup-sidebar-menu" data-simplebar>
        <div class="billiongroup-sidebar-links">
            <div class="billiongroup-sidebar-links-cont">
                <a href="{{ route('admin.dashboard') }}"
                    class="billiongroup-sidebar-link {{ request()->segment(2) == 'dashboard' ? 'current' : '' }}">
                    <p class="billiongroup-sidebar-link-title">
                        <span><i class="fas fa-th-large"></i>{{ admin_lang('Dashboard') }}</span>
                    </p>
                </a>
                <a href="{{ route('admin.users.index') }}"
                    class="billiongroup-sidebar-link {{ request()->segment(2) == 'users' ? 'current' : '' }}">
                    <p class="billiongroup-sidebar-link-title">
                        <span><i class="fa fa-users"></i>{{ admin_lang('Manage Users') }}</span>
                        @if ($unviewedUsersCount)
                            <span class="counter">{{ $unviewedUsersCount }}</span>
                        @endif
                    </p>
                </a>
               
                <a href="{{ route('admin.subscriptions.index') }}"
                    class="billiongroup-sidebar-link {{ request()->segment(2) == 'subscriptions' ? 'current' : '' }}">
                    <p class="billiongroup-sidebar-link-title">
                        <span><i class="far fa-gem"></i>{{ admin_lang('Subscriptions') }}</span>
                        @if ($unviewedSubscriptions)
                            <span class="counter">{{ $unviewedSubscriptions }}</span>
                        @endif
                    </p>
                </a>
                <a href="{{ route('admin.transactions.index') }}"
                    class="billiongroup-sidebar-link {{ request()->segment(2) == 'transactions' ? 'current' : '' }}">
                    <p class="billiongroup-sidebar-link-title">
                        <span><i class="fas fa-exchange-alt"></i>{{ admin_lang('Transactions') }}</span>
                        @if ($unviewedTransactionsCount)
                            <span class="counter">{{ $unviewedTransactionsCount }}</span>
                        @endif
                    </p>
                </a>
                <a href="{{ route('admin.plans.index') }}"
                    class="billiongroup-sidebar-link {{ request()->segment(2) == 'plans' ? 'current' : '' }}">
                    <p class="billiongroup-sidebar-link-title">
                        <span><i class="fas fa-tags"></i>{{ admin_lang('Pricing Plans') }}</span>
                    </p>
                </a>
                <a href="{{ route('admin.coupons.index') }}"
                    class="billiongroup-sidebar-link {{ request()->segment(2) == 'coupons' ? 'current' : '' }}">
                    <p class="billiongroup-sidebar-link-title">
                        <span><i class="fas fa-percent"></i>{{ admin_lang('Coupon Codes') }}</span>
                    </p>
                </a>
                <a href="{{ route('admin.advertisements.index') }}"
                    class="billiongroup-sidebar-link {{ request()->segment(2) == 'advertisements' ? 'current' : '' }}">
                    <p class="billiongroup-sidebar-link-title">
                        <span><i class="fas fa-ad"></i>{{ admin_lang('Advertisements') }}</span>
                    </p>
                </a>
            </div>
            <div class="billiongroup-sidebar-links-cont">
                <div class="billiongroup-sidebar-link {{ request()->segment(2) == 'navigation' ? 'active' : '' }}"
                    data-dropdown>
                    <p class="billiongroup-sidebar-link-title">
                        <span><i class="fas fa-bars"></i>{{ admin_lang('Navigation') }}</span>
                        <span class="arrow"><i class="fas fa-chevron-right fa-sm"></i></span>
                    </p>
                    <div class="billiongroup-sidebar-link-menu">
                        <a href="{{ route('admin.navbarMenu.index') }}"
                            class="billiongroup-sidebar-link {{ request()->segment(3) == 'navbarMenu' ? 'current' : '' }}">
                            <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('Navbar Menu') }}</span></p>
                        </a>
                        <a href="{{ route('admin.footerMenu.index') }}"
                            class="billiongroup-sidebar-link {{ request()->segment(3) == 'footerMenu' ? 'current' : '' }}">
                            <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('Footer Menu') }}</span></p>
                        </a>
                    </div>
                </div>
                @if ($settings->actions->blog_status)
                    <div class="billiongroup-sidebar-link  {{ request()->segment(2) == 'blog' ? 'active' : '' }}"
                        data-dropdown>
                        <p class="billiongroup-sidebar-link-title">
                            <span><i class="fas fa-rss"></i>{{ admin_lang('Blog') }}</span>
                            <span class="arrow"><i class="fas fa-chevron-right fa-sm"></i></span>
                        </p>
                        <div class="billiongroup-sidebar-link-menu">
                            <a href="{{ route('articles.index') }}"
                                class="billiongroup-sidebar-link {{ request()->segment(3) == 'articles' ? 'current' : '' }}">
                                <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('Articles') }}</span></p>
                            </a>
                            <a href="{{ route('categories.index') }}"
                                class="billiongroup-sidebar-link  {{ request()->segment(3) == 'categories' ? 'current' : '' }}">
                                <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('Categories') }}</span></p>
                            </a>
                            <a href="{{ route('comments.index') }}"
                                class="billiongroup-sidebar-link {{ request()->segment(3) == 'comments' ? 'current' : '' }}">
                                <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('Comments') }}</span>
                                    @if ($commentsNeedsAction)
                                        <span class="counter">{{ $commentsNeedsAction }}</span>
                                    @endif
                                </p>
                            </a>
                        </div>
                    </div>
                @endif
                <div class="billiongroup-sidebar-link {{ request()->segment(2) == 'settings' ? 'active' : '' }}"
                    data-dropdown>
                    <p class="billiongroup-sidebar-link-title">
                        <span><i class="fa fa-cog"></i>{{ admin_lang('Settings') }}</span>
                        <span class="arrow"><i class="fas fa-chevron-right fa-sm"></i></span>
                    </p>
                    <div class="billiongroup-sidebar-link-menu">
                        <a href="{{ route('admin.settings.general') }}"
                            class="billiongroup-sidebar-link {{ request()->segment(3) == 'general' ? 'current' : '' }}">
                            <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('General') }}</span>
                            </p>
                        </a>
                        
                        <a href="{{ route('admin.settings.smtp.index') }}"
                            class="billiongroup-sidebar-link {{ request()->segment(3) == 'smtp' ? 'current' : '' }}">
                            <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('SMTP') }}</span>
                            </p>
                        </a>
                        <a href="{{ route('admin.settings.pages.index') }}"
                            class="billiongroup-sidebar-link {{ request()->segment(3) == 'pages' ? 'current' : '' }}">
                            <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('Pages') }}</span></p>
                        </a>
                        <a href="{{ route('admin.settings.admins.index') }}"
                            class="billiongroup-sidebar-link {{ request()->segment(3) == 'admins' ? 'current' : '' }}">
                            <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('Admins') }}</span></p>
                        </a>
                        <a href="{{ route('admin.settings.extensions.index') }}"
                            class="billiongroup-sidebar-link {{ request()->segment(3) == 'extensions' ? 'current' : '' }}">
                            <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('Extensions') }}</span></p>
                        </a>
                        <a href="{{ route('admin.settings.languages.index') }}"
                            class="billiongroup-sidebar-link {{ request()->segment(3) == 'languages' ? 'current' : '' }}">
                            <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('Languages') }}</span></p>
                        </a>
                        <a href="{{ route('admin.settings.mailtemplates.index') }}"
                            class="billiongroup-sidebar-link {{ request()->segment(3) == 'mailtemplates' ? 'current' : '' }}">
                            <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('Mail Templates') }}</span></p>
                        </a>
                        <a href="{{ route('admin.settings.seo.index') }}"
                            class="billiongroup-sidebar-link {{ request()->segment(3) == 'seo' ? 'current' : '' }}">
                            <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('SEO Configurations') }}</span>
                            </p>
                        </a>
                        <a href="{{ route('admin.settings.gateways.index') }}"
                            class="billiongroup-sidebar-link {{ request()->segment(3) == 'gateways' ? 'current' : '' }}">
                            <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('Payment Gateways') }}</span>
                            </p>
                        </a>
                        <a href="{{ route('admin.settings.taxes.index') }}"
                            class="billiongroup-sidebar-link {{ request()->segment(3) == 'taxes' ? 'current' : '' }}">
                            <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('Taxes') }}</span>
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="billiongroup-sidebar-links-cont">
                <div class="billiongroup-sidebar-link {{ request()->segment(2) == 'others' ? 'active' : '' }}"
                    data-dropdown>
                    <p class="billiongroup-sidebar-link-title">
                        <span><i class="fas fa-layer-group"></i>{{ admin_lang('Manage sections') }}</span>
                        <span class="arrow"><i class="fas fa-chevron-right fa-sm"></i></span>
                    </p>
                    <div class="billiongroup-sidebar-link-menu">
                        <a href="{{ route('admin.features.index') }}"
                            class="billiongroup-sidebar-link {{ request()->segment(3) == 'features' ? 'current' : '' }}">
                            <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('Home Features') }}</span></p>
                        </a>
                        <a href="{{ route('admin.faqs.index') }}"
                            class="billiongroup-sidebar-link {{ request()->segment(3) == 'faqs' ? 'current' : '' }}">
                            <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('FAQs') }}</span></p>
                        </a>
                    </div>
                </div>
                <div class="billiongroup-sidebar-link {{ request()->segment(2) == 'extra' ? 'active' : '' }}"
                    data-dropdown>
                    <p class="billiongroup-sidebar-link-title">
                        <span><i class="fas fa-plus-square"></i>{{ admin_lang('Extra Features') }}</span>
                        <span class="arrow"><i class="fas fa-chevron-right fa-sm"></i></span>
                    </p>
                    <div class="billiongroup-sidebar-link-menu">
                        <a href="{{ route('admin.extra.notice') }}"
                            class="billiongroup-sidebar-link {{ request()->segment(3) == 'popup-notice' ? 'current' : '' }}">
                            <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('PopUp Notice') }}</span></p>
                        </a>
                        <a href="{{ route('admin.extra.css') }}"
                            class="billiongroup-sidebar-link {{ request()->segment(3) == 'custom-css' ? 'current' : '' }}">
                            <p class="billiongroup-sidebar-link-title"><span>{{ admin_lang('Custom CSS') }}</span></p>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</aside>
