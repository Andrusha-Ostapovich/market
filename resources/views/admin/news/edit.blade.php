@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
    'page_title' => 'Редагувати Новину',
    'url_back' => route('news.index'),
])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Редагувати {{  $news->title }}</h3>
            </div>
            <div class="card-body">
            {!! Lte3::formOpen(['action' => route('news.update', $news->id), 'model' => $news, 'method' => 'PUT']) !!}
    @include('admin.news.inc.form', ['news' => $news])
            {!! Lte3::formClose() !!}
            </div>
          
        </div>

        </section>
@endsection