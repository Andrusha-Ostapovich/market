@extends('user.layouts.app')

@section('content')
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <h2>Обрані продукти</h2>
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Фото</th>
                                    <th class="product-name">Назва</th>
                                    <th class="product-price">Ціна</th>
                                    <th class="product-remove">Видалити</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ $product->model->getFirstMediaUrl('product_photo') }}"
                                                width="150px">
                                        </td>
                                        <td class="product-name">
                                            {{ $product->model->name }}
                                        </td>
                                        <td class="product-price">
                                            {{ $product->model->price }}
                                        </td>
                                        <td class="product-remove">
                                            <form method="POST" action="{{ route('favorite.toggle', $product->model) }}">
                                                @csrf
                                                <button type="submit" style="background: none; border: none;">
                                                    <span style="font-size: 2em;"
                                                        class="d-flex align-items-center flex-column">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2>Обрані статті</h2>
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="article-title">Заголовок</th>
                                    <th class="article-date">Дата</th>
                                    <th class="article-remove">Видалити</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr>

                                        <td class="article-title">
                                            {{ $article->model->name }}
                                        </td>
                                        <td class="article-date">
                                            {{ $article->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="article-remove">

                                            <form method="POST" action="{{ route('favorites.articles.toggle', $article->model) }}">
                                                @csrf
                                                <button type="submit" style="background: none; border: none;">
                                                    <span style="font-size: 2em;"
                                                        class="d-flex align-items-center flex-column">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
