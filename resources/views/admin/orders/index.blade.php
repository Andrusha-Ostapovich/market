@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', [
        'page_title' => 'Замовлення',
    ])
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="card">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                №
                            </th>
                            <th style="width: 20%">
                                Загальна ціна
                            </th>

                            <th style="width: 20%">
                                Статус
                            </th>
                            <th style="width: 20%">
                                Дата та час
                            </th>
                        </tr>
                    </thead>
                    <tbody class="sortable-y" data-url="{{ route('lte3.data.save') }}">
                        @foreach ($orders as $order)
                            <tr id="{{ $loop->index }}" class="va-center">
                                <td>
                                    {{ $order->id }}
                                </td>

                                <td>
                                    {{ $order->total_amount }}
                                </td>
                                <td>
                                    {{ $order->status }}
                                </td>
                                <td>
                                    {{ $order->created_at }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

        </div>

        {!! Lte3::pagination($orders) !!}
        </div>

    </section>
    <!-- /.content -->
@endsection
