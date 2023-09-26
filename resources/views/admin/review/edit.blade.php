@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', [
        'page_title' => 'Редагувати сторінку',
        'url_back' => route('admin.review.index'),
    ])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Редагувати {{$reviews->name }}</h3>
            </div>
            <div class="card-body">
                {!! Lte3::formOpen([
                    'action' => route('admin.review.update',$reviews->id),
                    'model' =>$reviews,
                    'method' => 'PUT',
                ]) !!}
                @include('admin.review.inc.form', ['reviews' =>$reviews])
                {!! Lte3::formClose() !!}
            </div>

        </div>

    </section>
@endsection
