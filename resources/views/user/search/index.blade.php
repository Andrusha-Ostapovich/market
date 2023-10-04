@extends('user.layouts.app')

@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Результати пошуку: {{ $query }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                @if ($products->count() > 0)
                    @foreach ($products as $product)
                        <div class="col-12 col-md-4 col-lg-3 mb-5">
                            <a class="product-item"
                                href="{{ route('products.show', ['categorySlug' => $product->categories->slug, 'productSlug' => $product->slug, 'product' => $product->id]) }}">
                                @if ($product->hasMedia('product_photo'))
                                    <img src="{{ $product->getFirstMediaUrl('product_photo') }}" width="260px">
                                @else
                                    <img src="https://www.meme-arsenal.com/memes/b909e44245f9f63523dadbede21661e4.jpg"
                                        width="300px">
                                @endif
                                <h3 class="product-title">{{ $product->name }}</h3>
                                <strong class="product-price">${{ number_format($product->price, 2) }}</strong>
                                @if (auth()->user())
                                    <form method="POST" action="{{ route('favorite.toggle', $product) }}">
                                        @csrf <!-- Додайте цей токен CSRF для безпеки -->
                                        <button type="submit" style="background: none; border: none;">
                                            @if (\Favorite::isFavorite($product))
                                                <span style="font-size: 3em;" class="d-flex align-items-center flex-column">
                                                    <i class="fas fa-heart text-warning"></i>
                                                </span>
                                            @else
                                                <span style="font-size: 3em;" class="d-flex align-items-center flex-column">
                                                    <i class="far fa-heart text-warning"></i>
                                            @endif
                                        </button>
                                    </form>
                                @endif
                                <form method="POST" action="{{ route('addToCart', $product->slug) }}">
                                    @csrf
                                    <button type="submit" style="background: none; border: none;">
                                        <span class="icon-cross">
                                            <span style="font-size: 32px;" class="d-flex align-items-center flex-column">
                                                <i class="far fa-plus text-white"></i>
                                            </span>
                                        </span>
                                    </button>
                                </form>
                            </a>

                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <p>Нічого не знайдено.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
