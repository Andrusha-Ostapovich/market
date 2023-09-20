@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
'page_title' => 'Статичні сторінки',
'url_create' => route('static-pages.create')
])

<!-- Main content -->
<section class="content">


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
                        <th>
                            Опис
                        </th>

                    </tr>
                </thead>
                <tbody class="sortable-y" data-url="{{ route('lte3.data.save') }}">
                    @foreach($staticPages as $staticPage)
                    <tr id="{{ $loop->index }}" class="va-center">

                        <td style="width: 1%">
                            {{ $staticPage->id }}
                        </td>
                        <td style="width: 20%">
                            {{ $staticPage->name }}
                        </td>
                        <td>
                            {{ $staticPage->content }}
                        </td>
                        <td class="text-right">
                            <a href="{{ route('static-pages.edit', $staticPage->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('static-pages.destroy', $staticPage->id) }}" class="btn btn-danger btn-sm js-click-submit" data-method="DELETE" data-confirm="Delete?"><i class="fas fa-trash"></i></a>
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
