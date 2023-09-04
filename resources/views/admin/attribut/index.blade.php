@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
'page_title' => 'Новини',
'url_create' => route('attribut.create')
])

<!-- Main content -->
<section class="content">

    <!-- FILTER -->
    @include('admin.attribut.inc.filter')

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
                        <th style="width: 20%">
                            Категорія
                        </th>

                    </tr>
                </thead>
                <tbody class="sortable-y" data-url="{{ route('lte3.data.save') }}">
                    @foreach($attribut as $attributs)
                    <tr id="{{ $loop->index }}" class="va-center">
                        <td>
                            {{ $attributs->id }}
                        </td>

                        <td>
                            {{ $attributs->name }}
                        </td>
                        <td>
                            {{ $attributs->categories->category_id }}
                        </td>


                        <td class="text-right">
                            <a href="{{ route('attribut.update', $attributs->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('attribut.destroy', $attributs->id) }}" class="btn btn-danger btn-sm js-click-submit" data-method="DELETE" data-confirm="Delete?"><i class="fas fa-trash"></i></a>
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
