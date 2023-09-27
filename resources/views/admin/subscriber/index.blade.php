@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', [
        'page_title' => 'Розсилка',
        'url_create' => route('admin.subscriber.create'),
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
                        @foreach ($subscribers as $subscriber)
                            <tr id="{{ $loop->index }}" class="va-center">
                                <td>
                                    {{ $subscriber->id }}
                                </td>
                                <td>
                                    {{ $subscriber->email }}
                                </td>


                                <td class="text-right">

                                    <a href="{{ route('admin.subscriber.destroy', $subscriber->id) }}"
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
        {!! Lte3::pagination($subscribers) !!}
    </section>
    <!-- /.content -->
@endsection
