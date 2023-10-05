@extends('user.layouts.app')
@section('content')
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Номер</th>
                                    <th class="product-price">Загальна ціна</th>
                                    <th class="product-quantity">Статус</th>
                                    <th class="product-quantity">Дата та час</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="product-name">
                                            {{ $order->id }}
                                        </td>
                                        <td class="product-price">
                                            {{ $order->total_amount }}
                                        </td>
                                        <td class="product-quantity">
                                            {{ $order->status }}
                                        </td>
                                        <td class="product-total">
                                            {{ $order->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
