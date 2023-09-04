@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
    'page_title' => 'Редагувати Категорію',
    'url_back' => route('category.index'),
])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Редагувати {{  $category->name }}</h3>
            </div>
            <div class="card-body">
            {!! Lte3::formOpen(['action' => route('category.update', $category->id), 'model' => $category, 'method' => 'PUT']) !!}
    @include('admin.category.inc.form', ['category' => $category])
            {!! Lte3::formClose() !!}
            </div>
          
        </div>

        </section>
@endsection