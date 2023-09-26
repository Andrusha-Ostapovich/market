@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', [
        'page_title' => 'Редагувати сторінку',
        'url_back' => route('admin.page.index'),
    ])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Редагувати {{$pages->name }}</h3>
            </div>
            <div class="card-body">
                {!! Lte3::formOpen([
                    'action' => route('admin.page.update',$pages->id),
                    'model' =>$pages,
                    'method' => 'PUT',
                ]) !!}
                @include('admin.page.inc.form', ['pages' =>$pages])
                {!! Lte3::formClose() !!}
            </div>

        </div>

    </section>
@endsection
