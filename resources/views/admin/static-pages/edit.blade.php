@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', [
        'page_title' => 'Редагувати сторінку',
        'url_back' => route('static-pages.index'),
    ])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Редагувати {{ $staticPages->name }}</h3>
            </div>
            <div class="card-body">
                {!! Lte3::formOpen([
                    'action' => route('static-pages.update', $staticPages->id),
                    'model' => $staticPages,
                    'method' => 'PUT',
                ]) !!}
                @include('admin.static-pages.inc.form', ['staticPages' => $staticPages])
                {!! Lte3::formClose() !!}
            </div>

        </div>

    </section>
@endsection
