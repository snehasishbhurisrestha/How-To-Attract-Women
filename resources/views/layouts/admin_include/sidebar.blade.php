<nav>
    <div class="app-logo">
        <a class="logo d-inline-block" href="{{ route('dashboard') }}">
            <h1>Dashboard</h1>
        </a>

        <span class="bg-light-primary toggle-semi-nav d-flex-center">
            <i class="ti ti-chevron-right"></i>
        </span>
    </div>
    <div class="app-nav" id="app-simple-bar">
        <ul class="main-nav p-0 mt-2">

            <!-- Main -->
            <li class="menu-title">
                <span>Main</span>
            </li>

            <li class="no-sub">
                <a href="{{ route('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12l-2 0l9 -9l9 9l-2 0"/>
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"/>
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"/>
                    </svg>
                    Dashboard
                </a>
            </li>

            <li class="no-sub">
                <a href="{{ route('admin.orders.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 3h14v18l-2-1-2 1-2-1-2 1-2-1-2 1V3z"/>
                        <path d="M9 7h6"/>
                        <path d="M9 11h6"/>
                        <path d="M9 15h4"/>
                    </svg>
                    Orders
                </a>
            </li>

            <li class="no-sub">
                <a href="{{ route('settings.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 
                                1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 
                                1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 
                                1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09a1.65 1.65 0 0 0 1.51-1 
                                1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33h.01
                                a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51
                                1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06
                                a1.65 1.65 0 0 0-.33 1.82v.01a1.65 1.65 0 0 0 1.51 1H21
                                a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z">
                        </path>
                    </svg>
                    Settings
                </a>
            </li>
            

            <!-- Account -->
            <li class="menu-title">
                <span>Account</span>
            </li>

            <li class="no-sub">
                <a href="{{ route('profile.edit') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="7" r="4"/>
                        <path d="M5.5 21a6.5 6.5 0 0 1 13 0"/>
                    </svg>
                    Profile
                </a>
            </li>

            <li class="no-sub">
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 8V6a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2v-2"/>
                        <path d="M3 12h13"/>
                        <path d="M7 16l-4 -4l4 -4"/>
                    </svg>
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

        </ul>
    </div>

    <div class="menu-navs">
        <span class="menu-previous"><i class="ti ti-chevron-left"></i></span>
        <span class="menu-next"><i class="ti ti-chevron-right"></i></span>
    </div>

</nav>