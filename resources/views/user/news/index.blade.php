@extends('user.layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            {{ Breadcrumbs::render('news.index') }}
            @foreach ($news as $new)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ $new->getFirstMediaUrl('photo') }}" class="card-img-top" alt="{{ $new->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $new->name }}</h5>
                            <p class="card-text">{{ Str::limit($new->content, 100) }}</p>
                            <a href="{{ route('news.show', $new->slug) }}" class="stretched-link"></a>
                            <p class="card-text"><small class="text-muted">{{ $new->created_at->format('Y-m-d') }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {!! Lte3::pagination($news) !!}
    </div>
@endsection
