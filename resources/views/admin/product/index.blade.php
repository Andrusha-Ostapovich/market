@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', [
        'page_title' => 'Товари',
        'url_create' => route('admin.product.create'),
    ])

    <!-- Main content -->
    <section class="content">
        @include('admin.seo.metatag')

        <!-- FILTER -->
        @include('admin.product.inc.filter')

        <!-- Default box -->
        <div class="card">
            <div class="card-header">



                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.product.export') }}" class="btn btn-success">
                        <i class="fas fa-file-excel"></i> Експорт
                    </a>
                    <form action="{{ route('admin.product.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="import_file" class="d-none" id="import_file">
                        <label for="import_file" class="btn btn-warning">Виберіть файл</label>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-file-import"></i> Імпорт</button>

                    </form>
                    <a href="{{ route('admin.product.index', ['reset_sort' => true]) }}" class="btn btn-success">
                        Прибрати сортування
                    </a>
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
                                <a
                                    href="{{ route('admin.product.index', ['sort_field' => 'name', 'sort_direction' => 'asc']) }}">Назва</a>
                            </th>
                            <th>
                                Фото
                            </th>
                            <th>
                                Атрибут
                            </th>
                            <th>
                                <a
                                    href="{{ route('admin.product.index', ['sort_field' => 'price', 'sort_direction' => 'asc']) }}">Ціна</a>
                            </th>
                            <th>
                                <a
                                    href="{{ route('admin.product.index', ['sort_field' => 'old_price', 'sort_direction' => 'asc']) }}">Стара
                                    ціна</a>
                            </th>
                            <th>
                                Продавець
                            </th>
                            <th>
                                <a
                                    href="{{ route('admin.product.index', ['sort_field' => 'article', 'sort_direction' => 'asc']) }}">Артикул</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="sortable-y" data-url="{{ route('lte3.data.save') }}">

                        @foreach ($products as $product)
                            <tr id="{{ $loop->index }}" class="va-center">
                                <td>
                                    {{ $product->id }}
                                </td>
                                <td>
                                    @if ($product->categories)
                                        {{ $product->categories->name }}
                                    @else
                                        Не додано
                                    @endif
                                </td>
                                <td>
                                    {{ $product->brand }}
                                </td>
                                <td>
                                    {{ $product->name }}
                                </td>
                                <td>
                                    @if ($product->hasMedia('product_photo'))
                                        <img src="{{ $product->getFirstMediaUrl('product_photo') }}" width="150px">
                                    @else
                                        <p>Фото не було додано</p>
                                    @endif
                                </td>
                                <td>

                                    @foreach ($product->properties as $property)
                                        {{ $attributes[$property->attribute_id] }}: {{ $property->value }}
                                    @endforeach


                                </td>
                                <td>
                                    {{ $product->price }}
                                </td>
                                <td>
                                    {{ $product->old_price }}
                                </td>
                                <td>
                                    {{ $product->seller->user->name }}
                                </td>
                                <td>
                                    {{ $product->article }}
                                </td>



                                <td class="text-right">
                                    <a href="{{ route('admin.product.update', $product->id) }}"
                                        class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('admin.product.destroy', $product->id) }}"
                                        class="btn btn-danger btn-sm js-click-submit" data-method="DELETE"
                                        data-confirm="Delete?"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! Lte3::pagination($products) !!}

            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
