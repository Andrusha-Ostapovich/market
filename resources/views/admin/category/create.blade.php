@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
    'page_title' => 'Створити Категорію',
    'url_back' => route('category.index'),
])
<section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Створити</h3>
            </div>
            <div class="card-body">
            {!! Lte3::formOpen(['action' => route('category.store'), 'model' => null, 'method' => 'POST']) !!}
    @include('admin.category.inc.form')
            {!! Lte3::formClose() !!}
            </div>
          
        </div>

        </section>
@endsection