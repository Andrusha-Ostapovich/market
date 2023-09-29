@extends('user.layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            {{ Breadcrumbs::render('article.index') }}
            @foreach ($articles as $article)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <a href="{{ route('article.show', $article->slug) }}">
                            <img src="{{ $article->getFirstMediaUrl('photo') }}" class="card-img-top"
                                alt="{{ $article->name }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->name }}</h5>
                            <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                            <p class="card-text"><small
                                    class="text-muted">{{ $article->created_at->format('Y-m-d') }}</small>
                            </p>

                            <form method="POST" action="{{ route('favorites.articles.toggle', $article) }}">
                                @csrf <!-- Додайте цей токен CSRF для безпеки -->
                                <button type="submit"
                                    style="background: none; border: none; position: absolute; bottom: 0; right: 0;">
                                    @if (\Favorite::isFavorite($article))
                                        <span style="font-size: 2em;">
                                            <i class="fas fa-heart text-danger"></i>
                                        </span>
                                    @else
                                        <span style="font-size: 2em;">
                                            <i class="far fa-heart text-danger"></i>
                                        </span>
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {!! Lte3::pagination($articles) !!}
    </div>
@endsection
