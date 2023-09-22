@extends('user.layouts.app') <!-- Підключення макету в залежності від вашого додатку -->

@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img src="{{ $news->getFirstMediaUrl('photo') }}" class="card-img-top" alt="{{ $news->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $news->name }}</h5>
                        <p class="card-text">{{ $news->content }}</p>
                        <p class="card-text"><small class="text-muted">{{ $news->created_at }}</small></p>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('news.previous', ['slug' => $news->slug]) }}" class="btn btn-primary">Попередня
                        новина</a>
                    <a href="{{ route('news.next', ['slug' => $news->slug]) }}" class="btn btn-primary">Наступна новина</a>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
