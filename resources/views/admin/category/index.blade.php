@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', [
        'page_title' => 'Категорії',
        'url_create' => route('category.create'),
    ])


    <!-- Main content -->
    <section class="content">
        <div class="container">
           <a class="btn btn-success" href="{{ route('tree') }}">Дерево</a>

        </div><br>
        <!-- FILTER -->
        @include('admin.category.inc.filter')

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
                            <th style="width: 20%">
                                Назва
                            </th>
                        </tr>
                    </thead>
                    <tbody class="sortable-y" data-url="{{ route('lte3.data.save') }}">
                        @foreach ($category as $categor)
                            <tr id="{{ $loop->index }}" class="va-center">
                                <td>
                                    {{ $categor->id }}
                                </td>

                                <td>
                                    {{ $categor->name }}
                                </td>

                                <td class="text-right">
                                    <a href="{{ route('category.update', $categor->id) }}" class="btn btn-info btn-sm"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('category.destroy', $categor->id) }}"
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
