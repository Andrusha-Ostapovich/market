@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
    'page_title' => 'Створити Новини',
    'url_back' => route('static-pages.store'),
])
<section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Створити</h3>
            </div>
            <div class="card-body">
            {!! Lte3::formOpen(['action' => route('static-pages.store'), 'model' => null, 'method' => 'POST']) !!}
    @include('admin.static-pages.inc.form')
            {!! Lte3::formClose() !!}
            </div>

        </div>

        </section>
@endsection
