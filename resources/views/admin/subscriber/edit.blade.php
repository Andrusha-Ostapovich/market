@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
    'page_title' => 'Редагувати Емайл',
    'url_back' => route('admin.subscriber.index'),
])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Редагувати {{  $subscriber->name }}</h3>
            </div>
            <div class="card-body">
            {!! Lte3::formOpen(['action' => route('admin.subscriber.update', $subscriber->id), 'model' => $subscriber, 'method' => 'PUT']) !!}
    @include('admin.subscriber.inc.form', ['subscriber' => $subscriber])
            {!! Lte3::formClose() !!}
            </div>

        </div>

        </section>
@endsection
