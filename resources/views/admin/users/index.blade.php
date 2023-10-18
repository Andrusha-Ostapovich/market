@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', [
        'page_title' => 'Користувачі',
        'url_create' => route('admin.users.create'),
    ])

    <!-- Main content -->
    <section class="content">

        <!-- FILTER -->
        @include('admin.users.inc.filter')

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
                <a href="{{ route('admin.users.index', ['reset_sort' => true]) }}" class="btn btn-success">
                    Прибрати сортування
                 </a>
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
                            <th>
                                <a href="{{ route('admin.users.index', ['sort' => 'name']) }}">Ім'я</a>
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Роль
                            </th>

                            <th>
                                <a href="{{ route('admin.users.index', ['sort' => 'created_at']) }}">Дата реєстрації</a>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="sortable-y" data-url="{{ route('lte3.data.save') }}">
                        @foreach ($users as $user)
                            <tr id="{{ $loop->index }}" class="va-center">
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    @if ($user->hasMedia('avatar'))
                                    <a href="{{ $user->getFirstMediaUrl('avatar') }}" class="js-popup-image">
                                        <img src="{{ $user->getFirstMediaUrl('avatar') }}" width="150px">
                                    </a>
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
                                <td>
                                    {{ $user->created_at->format('Y-m-d') }}
                                </td>


                                <td class="text-right">

                                    <a href="{{ route('admin.users.update', $user->id) }}" class="btn btn-info btn-sm"><i
                                            class="fas fa-pencil-alt"></i></a>

                                    <a href="{{ route('admin.users.destroy', $user->id) }}"
                                        class="btn btn-danger btn-sm js-click-submit" data-method="DELETE"
                                        data-confirm="Delete?"><i class="fas fa-trash"></i></a>
                                    {!! Lte3::formOpen(['action' => route('admin.users.destroy', $user->id), 'model' => null, 'method' => 'DELETE']) !!}

                                    {!! Lte3::formClose() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! Lte3::pagination($users) !!}

            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
