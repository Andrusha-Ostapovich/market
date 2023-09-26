@extends('user.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{ Breadcrumbs::render('products.show', $currentProduct) }}
                    @if ($currentProduct->hasMedia('product_photo'))
                        <img src="{{ $currentProduct->getFirstMediaUrl('product_photo') }}" class="card-img-top"
                            alt="{{ $currentProduct->name }}">
                    @else
                        <img src="https://www.meme-arsenal.com/memes/b909e44245f9f63523dadbede21661e4.jpg"
                            class="card-img-top" alt="{{ $currentProduct->name }}">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $currentProduct->name }}</h5>
                        <p class="card-text">{{ $currentProduct->article }}</p>
                        <p class="card-text">{!! $currentProduct->description !!}</p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="card-text"><strong>Бренд:</strong> {{ $currentProduct->brand }}</p>
                                <p class="card-text"><strong>Продавець:</strong> {{ $currentProduct->seller->store_name }}
                                </p>
                            </div>
                            <div>
                                <strong class="product-price h4">${{ number_format($currentProduct->price, 2) }}</strong>
                                @if ($currentProduct->old_price)
                                    <del class="text-muted">${{ number_format($currentProduct->old_price, 2) }}</del>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
