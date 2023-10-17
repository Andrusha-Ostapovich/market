@extends('client.layouts.app') <!-- Підключення макету в залежності від вашого додатку -->

@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{ Breadcrumbs::render('article.show', $article) }}
                <div class="card">
                    @if ($article->hasMedia('photo'))
                        <img src="{{ $article->getFirstMediaUrl('photo') }}" class="card-img-top" alt="{{ $article->name }}">
                    @else
                        <img src="https://www.meme-arsenal.com/memes/b909e44245f9f63523dadbede21661e4.jpg" width="300px"
                            class="img-fluid product-thumbnail">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->name }}</h5>
                        <p class="card-text">{{ $article->content }}</p>
                        <p class="card-text"><small class="text-muted">{{ $article->created_at }}</small></p>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('article.previous', ['slug' => $article->slug]) }}" class="btn btn-primary">Попередня
                        новина</a>
                    <a href="{{ route('article.next', ['slug' => $article->slug]) }}" class="btn btn-primary">Наступна
                        новина</a>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
