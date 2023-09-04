@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
    'page_title' => 'Створити Новини',
    'url_back' => route('news.index'),
])
<section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Створити</h3>
            </div>
            <div class="card-body">
            {!! Lte3::formOpen(['action' => route('news.store'), 'model' => null, 'method' => 'POST']) !!}
    @include('admin.news.inc.form')
            {!! Lte3::formClose() !!}
            </div>
          
        </div>

        </section>
@endsection