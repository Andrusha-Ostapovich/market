@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
'page_title' => 'Товари',
'url_back' => route('product.index'),
])

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Редагувати {{ $product->name }}</h3>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-body">
            {!! Lte3::formOpen(['action' => route('product.update', $product), 'model' => $product, 'method' => 'PUT']) !!}
            @include('admin.product.inc.form', ['product' => $product])
            {!! Lte3::formClose() !!}
        </div>

    </div>

</section>
@endsection