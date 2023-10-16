@extends('client.layouts.app')

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
                                <p class="card-text"><strong>Оцінка:</strong>
                                    {{ number_format($rating, 1) }}</p>
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
                    <div class="container">
                        <form
                            action="{{ route('review.create', [
                                'productSlug' => $currentProduct->slug,
                            ]) }}"
                            method="POST">
                            @csrf
                            @method('POST')
                            <h4>Вже спробував? Відгукнись</h4>
                            <div class="col-md-2">
                                {!! Lte3::range('rating', '5', ['min' => 1, 'max' => 5, 'step' => 1]) !!}
                            </div>
                            <div class="form-group">
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Відправити відгук</button>
                            <br>
                            <br>
                        </form>
                    </div>
                    <br>
                    @foreach ($reviews ?? [] as $review)
                        <div class="review">
                            <div class="user">
                                <i class="fas fa-user"></i> {{ $review->user->name }}
                            </div>
                            <div class="rating">
                                <i class="fas fa-star"></i> Рейтинг: {{ $review->rating }}
                            </div>
                            <div class="content">
                                {{ $review->content }}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <br>
    <style>
        .review {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
        }

        .user,
        .rating {
            margin-bottom: 5px;
        }

        .user i,
        .rating i {
            margin-right: 5px;
        }

        .content {
            font-size: 16px;
            line-height: 1.4;
        }
    </style>
@endsection
