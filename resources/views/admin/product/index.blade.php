@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', [
        'page_title' => 'Товари',
        'url_create' => route('product.create'),
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
                            <th>
                                Фото
                            </th>
                            <th>
                                Атрибут
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
                        @foreach ($products as $productes)
                            <tr id="{{ $loop->index }}" class="va-center">
                                <td>
                                    {{ $productes->id }}
                                </td>
                                <td>
                                    {{ $productes->categories->name }}
                                </td>
                                <td>
                                    {{ $productes->brand }}
                                </td>
                                <td>
                                    {{ $productes->name }}
                                </td>
                                <td>
                                    @if ($productes->hasMedia('product_photo'))
                                        <img src="{{ $productes->getFirstMediaUrl('product_photo') }}" width="150px">
                                    @else
                                        <p>Фото не було додано</p>
                                    @endif
                                </td>
                                <td>

                                    @foreach ($productes->properties as $property)
                                        {{ $attributs[$property->attribute_id] }}: {{ $property->values }}
                                    @endforeach


                                </td>
                                <td>
                                    {{ $productes->price }}
                                </td>
                                <td>
                                    {{ $productes->old_price }}
                                </td>
                                <td>
                                    {{ $productes->seller->user->name }}
                                </td>
                                <td>
                                    {{ $productes->article }}
                                </td>



                                <td class="text-right">
                                    <a href="{{ route('product.update', $productes->id) }}" class="btn btn-info btn-sm"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('product.destroy', $productes->id) }}"
                                        class="btn btn-danger btn-sm js-click-submit" data-method="DELETE"
                                        data-confirm="Delete?"><i class="fas fa-trash"></i></a>
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
