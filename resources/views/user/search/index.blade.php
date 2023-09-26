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
                                    <img src="{{ $product->getFirstMediaUrl('product_photo') }}" width="300px">
                                @else
                                    <img src="https://www.meme-arsenal.com/memes/b909e44245f9f63523dadbede21661e4.jpg"
                                        width="300px">
                                @endif
                                <h3 class="product-title">{{ $product->name }}</h3>
                                <strong class="product-price">${{ number_format($product->price, 2) }}</strong>
                                <span class="icon-cross">
                                    <img src="{{ asset('images/cross.svg') }}" class="img-fluid">
                                </span>
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
