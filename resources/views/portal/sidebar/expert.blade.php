<div class="sidebar-wrapper" data-sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper">
            <a href="dashboard">
                <img class="max-w-full h-[50px] for-light" src="{{ asset('assets/images/logo/logo.png') }}" alt=""
                    style="height: 50px;" />
                <img class="max-w-full h-auto for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}"
                    alt="" /></a>
            <div class="back-btn"><i class="fa-solid fa-angle-left"></i></div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="grid">
                </i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="#"><img class="max-w-full h-auto" src="{{ asset('assets/images/logo/logo-icon.png') }}"
                    alt="" /></a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="#"><img class="max-w-full h-auto"
                                src="{{ asset('assets/images/logo/logo-icon.png') }}" alt="" /></a>
                        <div class="mobile-back text-end">
                            <span>Back</span><i class="fa-solid fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i>
                        <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-email') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-email') }}"></use>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i><a
                            class="sidebar-link sidebar-title link-nav {{ request()->routeIs('expert.training-form.*') ? 'active' : '' }}"
                            href="{{ route('expert.expert.index') }}"><svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-email') }}"></use>
                            </svg><svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-email') }}"></use>
                            </svg><span>My Details</span></a>
                    </li>
                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i><a
                            class="sidebar-link sidebar-title link-nav {{ request()->routeIs('expert.profile.*') ? 'active' : '' }}"
                            href="{{ route('expert.profile.index') }}"><svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-email') }}"></use>
                            </svg><svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-email') }}"></use>
                            </svg><span>Profile</span></a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </nav>
    </div>
</div>
