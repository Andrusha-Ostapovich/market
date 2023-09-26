@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
    'page_title' => 'Створити сторінку',
    'url_back' => route('admin.page.store'),
])
<section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Створити</h3>
            </div>
            <div class="card-body">
            {!! Lte3::formOpen(['action' => route('admin.page.store'), 'model' => null, 'method' => 'POST']) !!}
    @include('admin.page.inc.form')
            {!! Lte3::formClose() !!}
            </div>

        </div>

        </section>
@endsection
