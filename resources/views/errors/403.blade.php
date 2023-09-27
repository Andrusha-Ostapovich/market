<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Головна</title>
    {{-- CSS Style --}}
    <link href="/client/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="/client/css/tiny-slider.css" rel="stylesheet">
    <link href="/client/css/style.css" rel="stylesheet">
</head>
<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
    <div class="container">
        <a class="navbar-brand" href="/">Furni<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Головна</a>
                </li>
                <li class="nav-item {{ Request::is('catalog') ? 'active' : '' }}">
                    <a class="nav-link" href="/catalog">Каталог</a>
                </li>
                <li class="nav-item {{ Request::is('news') ? 'active' : '' }}">
                    <a class="nav-link" href="/news">Новини</a>
                </li>
                <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}">
                    <a class="nav-link" href="/contacts">Контакти</a>
                </li>
                <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="/about">Про нас</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
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
<br>
<div class="container">
    <h1>Не має доступу 403 </h1>
</div>
