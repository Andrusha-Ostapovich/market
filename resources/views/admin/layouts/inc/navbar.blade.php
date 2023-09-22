<!-- Navbar -->
<nav
    class="main-header navbar navbar-expand {{ config('lte3.view.dark_mode') ? 'dark-mode' : 'navbar-white navbar-light' }}">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle"><i class="far fa-clock"></i></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                style="left: 0px; right: inherit;">
                <li><a href="#" class="dropdown-item">UTC: {{ now()->timezone(config('app.timezone')) }} </a></li>
                @if (config('app.timezone_client'))
                    <li><a href="#" class="dropdown-item">{{ config('app.timezone_client') }}:
                            {{ now()->timezone(config('app.timezone_client')) }}</a>
                    </li>
                @endif
            </ul>
        </li>





        <li class="nav-item d-none d-sm-inline-block" data-toggle="tooltip" title="Visit">
            <a href="#" class="nav-link"> <i class="fas fa-chevron-circle-right"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <li class="nav-item">
            <a class="nav-link" href="/"
                role="button">
                <i class="fas fa-users"></i>
            </a>
        </li>


        <!-- Notifications Dropdown Menu -->

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>

        @auth
            @php
                $user = auth()->user();
            @endphp
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    @if ($user->hasMedia('avatar'))
                        <img src="{{ $user->getFirstMediaUrl('avatar') }}" class="user-image img-circle elevation-2" width="50px">
                    @else
                        <p>Аватар не був доданий</p>
                    @endif
                    <span class="d-none d-md-inline">{{ Lte3::user('name') }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        @if ($user->hasMedia('avatar'))
                        <img src="{{ $user->getFirstMediaUrl('avatar') }}" class="img-circle elevation-2" width="50px">
                    @else
                        <p>Аватар не був доданий</p>
                    @endif

                        <p>
                            {{ Lte3::user('name') }}
                            <small>Created {{ Lte3::user('created_at') }}</small>
                        </p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-body">
                        <div class="row">
                            <div class="col-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="/admin/profile" class="btn btn-default btn-flat">Profile</a>
                        <a href="/logout" class="btn btn-default btn-flat float-right js-click-submit"
                            data-confirm="Logout?">Sign out</a>
                    </li>
                </ul>
            </li>
        @else
            <li class="nav-item">
                <a href="/logout" class="nav-link js-click-submit" data-confirm="Logout?" role="button">
                    <i class="fa fa-sign-out-alt"></i>
                </a>
            </li>
        @endauth
    </ul>
</nav>
<!-- /.navbar -->
