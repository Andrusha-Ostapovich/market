<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
    <div class="container">
        <a class="navbar-brand" href="/">Furni<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Головна</a>
                </li>
                <li class="nav-item {{ Request::is('catalog') ? 'active' : '' }}">
                    <a class="nav-link" href="/catalog">Каталог</a>
                </li>
                <li class="nav-item {{ Request::is('article') ? 'active' : '' }}">
                    <a class="nav-link" href="/article">Новини</a>
                </li>
                <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}">
                    <a class="nav-link" href="/contacts">Контакти</a>
                </li>
                <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="/about">Про нас</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form action="{{ route('products.search') }}" method="GET">
                        <input type="text" name="query" placeholder="Пошук товарів">
                        <button type="submit">Пошук</button>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart">
                        <i class="fas fa-shopping-cart fa-lg text-white"></i>
                    </a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/my/favorites/products">
                                <i class="fas fa-heart fa-lg text-white"></i>

                            </a>
                        </li>
                        @if (auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a href="{{ url('admin') }}" class="nav-link">
                                    <i class="fas fa-font fa-lg text-white"></i>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ url('my') }}" class="nav-link">
                                <i class="fas fa-user fa-lg text-white"></i>
                                {{ auth()->user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="#" class="nav-link"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fas fa-sign-out fa-lg text-white"></i>
                                </a>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Логін</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Реєстрація</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
