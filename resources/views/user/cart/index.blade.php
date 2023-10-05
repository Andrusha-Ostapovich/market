@extends('user.layouts.app')
@section('content')
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">
                <a href="/order-history">
                    <h4><i class="fas fa-archive text-primary">
                            Історія замовлень
                        </i></h4>
                </a>
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Фото</th>
                                    <th class="product-name">Назва</th>
                                    <th class="product-price">Ціна</th>
                                    <th class="product-quantity">Кількість</th>
                                    <th class="product-total">Сума</th>
                                    <th class="product-remove">Видалити</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $cartItem)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ $cartItem->product->getFirstMediaUrl('product_photo') }}"
                                                width="150px">
                                        </td>
                                        <td class="product-name">
                                            {{ $cartItem->product->name }}
                                        </td>
                                        <td class="product-price">
                                            {{ $cartItem->product->price }}
                                        </td>
                                        <td class="product-quantity">
                                            {{ $cartItem->quantity }}
                                        </td>
                                        <td class="product-total">
                                            {{ $cartItem->product->price * $cartItem->quantity }}
                                        </td>
                                        <td class="product-remove">
                                            <a href="{{ route('cart.remove', $cartItem) }}" class="text-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <a href="/catalog">
                                <button class="btn btn-outline-black btn-sm btn-block">Продовжити покупки</button>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Загальна сума</h3>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Сума</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{ number_format(\Cart::total($cartItems), 2) }}</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="/checkout">
                                        <button class="btn btn-black btn-lg py-3 btn-block">
                                            Оплатити
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
