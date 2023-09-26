@extends('user.layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            {{ Breadcrumbs::render('catalog') }}
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <a href="{{ route('category.products', ['slug' => $category->slug]) }}">
                                Перейти до товарів
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
