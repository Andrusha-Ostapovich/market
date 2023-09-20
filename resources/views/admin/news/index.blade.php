@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
'page_title' => 'Новини',
'url_create' => route('news.create')
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
                        <th style="width: 20%">
                            Фото
                        </th>

                        <th style="width: 30%">
                            Опис
                        </th>
                        <th >
                            Час створення
                        </th>
                    </tr>
                </thead>
                <tbody class="sortable-y" data-url="{{ route('lte3.data.save') }}">
                    @foreach($news as $new)
                    <tr id="{{ $loop->index }}" class="va-center">
                        <td>
                            {{ $new->id }}
                        </td>

                        <td>
                            {{ $new->name}}
                        </td>
                        <td>
                        @if($new->hasMedia('photo'))
                            <img src="{{ $new->getFirstMediaUrl('photo') }}" width="150px">
                            @else
                            <p>Фото не було додано</p>
                            @endif
                        </td>
                        <td>
                            {{ $new->content }}
                        </td>
                        <td>
                            {{ $new->created_at }}
                        </td>

                        <td class="text-right">
                            <a href="{{ route('news.update', $new->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('news.destroy', $new->id) }}" class="btn btn-danger btn-sm js-click-submit" data-method="DELETE" data-confirm="Delete?"><i class="fas fa-trash"></i></a>
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
