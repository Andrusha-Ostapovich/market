@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
'page_title' => 'Користувачі',
'url_create' => route('users.create')
])

<!-- Main content -->
<section class="content">

    <!-- FILTER -->
    @include('admin.examples.inc.filter')

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
                            Фото
                        </th>
                        <th style="width: 20%">
                            Ім'я
                        </th>

                        <th style="width: 20%">
                            Email
                        </th>
                        <th>
                            Роль
                        </th>

                    </tr>
                </thead>
                <tbody class="sortable-y" data-url="{{ route('lte3.data.save') }}">
                    @foreach($users as $user)
                    <tr id="{{ $loop->index }}" class="va-center">
                        <td>
                            {{ $user->id }}
                        </td>
                        <td>
                            @if($user->hasMedia('avatar'))
                            <img src="{{ $user->getFirstMediaUrl('avatar') }}" width="150px">
                            @else
                            <p>Аватар не був доданий</p>
                            @endif
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->role }}
                        </td>


                        <td class="text-right">
                            
                            <a href="{{ route('users.update',$user->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>

                            <a href="{{ route('users.destroy',$user->id) }}" class="btn btn-danger btn-sm js-click-submit" data-method="DELETE" data-confirm="Delete?"><i class="fas fa-trash"></i></a>
                            {!! Lte3::formOpen(['action' => route('users.destroy', $user->id), 'model' => null, 'method' => 'DELETE']) !!}

                            {!! Lte3::formClose() !!}
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