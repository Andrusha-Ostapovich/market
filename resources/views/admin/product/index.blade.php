@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
'page_title' => 'Товари',
'url_create' => route('product.create')
])

<!-- Main content -->
<section class="content">

    <!-- FILTER -->
    @include('admin.product.inc.filter')

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>

            <div class="card-tools">

            </div>
        </div>
        <div class="card-body">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            №
                        </th>
                        <th>
                            Категорія
                        </th>
                        <th>
                            Бренд
                        </th>
                        <th style="width: 10%">
                            Назва
                        </th>
                        <th >
                            Фото
                        </th>
                        <th style="width: 20%">
                            Опис
                        </th>
                        <th>
                            Ціна
                        </th>
                        <th>
                            Стара ціна
                        </th>

                        <th>
                            Продавець
                        </th>

                        <th>
                            Артикул
                        </th>

                    </tr>
                </thead>
                <tbody class="sortable-y" data-url="{{ route('lte3.data.save') }}">
                    @foreach($product as $product)
                    <tr id="{{ $loop->index }}" class="va-center">
                        <td>
                            {{ $product->id }}
                        </td>
                        <td>
                            {{ $product->mainCategory->name }}
                        </td>
                        <td>
                            {{ $product->brand }}
                        </td>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>
                            @if($product->hasMedia('product_photo'))
                            <img src="{{ $product->getFirstMediaUrl('product_photo') }}" width="150px">
                            @else
                            <p>Фото не було додано</p>
                            @endif
                        </td>
                        <td>
                            {{ $product->description }}
                        </td>
                        <td>
                            {{ $product->price }}
                        </td>
                        <td>
                            {{ $product->old_price }}
                        </td>
                        <td>
                            {{ $product->seller_id }}
                        </td>
                        <td>
                            {{ $product->article }}
                        </td>



                        <td class="text-right">
                            <a href="{{ route('product.update', $product->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('product.destroy', $product->id) }}" class="btn btn-danger btn-sm js-click-submit" data-method="DELETE" data-confirm="Delete?"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>

    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection