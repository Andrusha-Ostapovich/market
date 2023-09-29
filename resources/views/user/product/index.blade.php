@extends('user.layouts.app')

@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>{!! $category->name !!}</h1>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            {{ Breadcrumbs::render('category.products', $category) }}
            <br>
            @foreach ($subcategories ?? [] as $subcategory)
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="{{ route('category.products', ['slug' => $subcategory->slug]) }}">

                        <h3 class="product-title">{{ $subcategory->name }}</h3>
                    </a>
                </div>
            @endforeach
            <div class="row">

                @foreach ($products ?? [] as $product)
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <a class="product-item d-flex align-items-center flex-column"
                            href="{{ route('products.show', ['categorySlug' => $product->categories->slug, 'productSlug' => $product->slug]) }}">
                            @if ($product->hasMedia('product_photo'))
                                <img src="{{ $product->getFirstMediaUrl('product_photo') }}" width="300px"
                                    class="img-fluid product-thumbnail">
                            @else
                                <img src="https://www.meme-arsenal.com/memes/b909e44245f9f63523dadbede21661e4.jpg"
                                    width="300px" class="img-fluid product-thumbnail">
                            @endif
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <strong class="product-price">${{ number_format($product->price, 2) }}</strong>
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
                            <span class="icon-cross">
                                <img src="{{ asset('images/cross.svg') }}" class="img-fluid">

                            </span>

                        </a>




                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
