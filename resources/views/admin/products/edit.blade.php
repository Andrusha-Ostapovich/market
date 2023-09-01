@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
    'page_title' => 'Користувачі',
    'url_back' => route('products.index'),
])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Редагувати {{  $products->title }}</h3>
            </div>
            <div class="card-body">
            {!! Lte3::formOpen(['action' => route('products.update', $products->id), 'model' => $products, 'method' => 'PUT']) !!}
    @include('admin.products.inc.form', ['products' => $products])
            {!! Lte3::formClose() !!}
            </div>
          
        </div>

        </section>
@endsection