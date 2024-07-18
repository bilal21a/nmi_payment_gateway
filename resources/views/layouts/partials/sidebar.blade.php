<div id="nav" class="nav-container d-flex" data-vertical-unpinned="10000" data-vertical-mobile="600"
    data-disable-pinning="true">


    <div class="nav-content d-flex">
        <!-- Logo Start -->
        <div class="logo position-relative w-100">
            <a class="w-100" href="Dashboards.Default.html w-100">
                <!-- Logo can be added directly -->
                <img src="{{ asset('acron/img/logo/small-logo.svg') }}" alt="logo" class="logo_small w-auto">

                <!-- Or added via css to provide different ones for different color themes -->
                <div class="img w-100 logo_large" style="display: none"></div>
            </a>
        </div>
        <!-- Logo End -->
        @php
            $user_name = auth()->user()->name;
            $background = 'ECF5FF';
            $text = '1ea8e7';
            $avatar = 'https://ui-avatars.com/api/?background=' . $background . '&color=' . $text . '&name=' . $user_name;

        @endphp
        <!-- User Menu Start -->
        <div class="user-container d-flex">
            <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <img src="{{ $avatar }}" class="img-fluid rounded-xl profile" alt="thumb" id="contactImage">
                <div class="name mt-1">{{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-end user-menu wide">
                <div class="row mb-1 ms-0 me-0">
                    <div class="col-6">
                        <ul class="list-unstyled">
                            <li>
                                <a href="{{ route('logout') }}">
                                    <i data-acorn-icon="logout" class="me-1" data-acorn-size="17"></i>
                                    <span class="align-middle">logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- User Menu End -->

        <!-- Icons Menu Start -->
        <ul class="list-unstyled list-inline text-center menu-icons">
            <li class="list-inline-item">
                <a href="#" id="colorButton">
                    <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                    <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
                </a>
            </li>
        </ul>

        <!-- Menu Start -->
        <div class="menu-container flex-grow-1">
            <ul id="menu" class="menu">
                    @include('layouts.partials.roles_sidebars.admin_sidebar')
                <li>
                    <a class="" href="{{ route('logout') }}">
                        <i data-acorn-icon="logout" class="d-inline-block"></i>
                        <span class="label">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="mobile-buttons-container">
            <!-- Scrollspy Mobile Button Start -->
            <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
                <i data-acorn-icon="menu-dropdown"></i>
            </a>
            <!-- Scrollspy Mobile Button End -->

            <!-- Scrollspy Mobile Dropdown Start -->
            <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
            <!-- Scrollspy Mobile Dropdown End -->

            <!-- Menu Button Start -->
            <a href="#" id="mobileMenuButton" class="menu-button">
                <i data-acorn-icon="menu"></i>
            </a>
            <!-- Menu Button End -->
        </div>
        <!-- Menu End -->

        <!-- Mobile Buttons Start -->
        <!-- Mobile Buttons End -->
    </div>
    <div class="nav-shadow"></div>
</div>
