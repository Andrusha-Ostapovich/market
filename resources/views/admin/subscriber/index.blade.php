@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', [
        'page_title' => 'Розсилка',
        'url_create' => route('subscriber.create'),
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
                            <th>
                                Емейл
                            </th>
                        </tr>
                    </thead>
                    <tbody class="sortable-y" data-url="{{ route('lte3.data.save') }}">
                        @foreach ($subscriber as $subscribers)
                            <tr id="{{ $loop->index }}" class="va-center">
                                <td>
                                    {{ $subscribers->id }}
                                </td>
                                <td>
                                    {{ $subscribers->email }}
                                </td>


                                <td class="text-right">

                                    <a href="{{ route('subscriber.destroy', $subscribers->id) }}"
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