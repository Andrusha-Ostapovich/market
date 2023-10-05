@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', [
        'review_title' => 'Статичні сторінки',
        'url_create' => route('admin.review.create'),
    ])

    <!-- Main content -->
    <section class="content">


        <!-- Default box -->
        <div class="card">

            <div class="card-body">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                №
                            </th>
                            <th style="width: 20%">
                                Ім'я користувача
                            </th>
                            <th>
                                Назва продукту
                            </th>
                            <th>
                                Комент
                            </th>
                            <th>
                                Оцінка
                            </th>
                        </tr>
                    </thead>

                    <tbody class="sortable-y" data-url="{{ route('lte3.data.save') }}">
                        @foreach ($reviews as $review)
                            <tr id="{{ $loop->index }}" class="va-center">

                                <td style="width: 1%">
                                    {{ $review->id }}
                                </td>
                                <td style="width: 20%">
                                    {{ $review->user->name }}
                                </td>
                                <td style="width: 20%">
                                    {{ $review->product->name }}
                                </td>

                                <td>
                                    {{ $review->content }}
                                </td>
                                <td>
                                    {{ $review->rating }}
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('admin.review.edit', $review->id) }}" class="btn btn-info btn-sm"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('admin.review.destroy', $review->id) }}"
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
        {!! Lte3::pagination($reviews) !!}
    </section>
    <!-- /.content -->
@endsection
