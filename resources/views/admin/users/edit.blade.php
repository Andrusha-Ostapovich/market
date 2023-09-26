@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
    'page_title' => 'Користувачі',
    'url_back' => route('admin.users.index'),
])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Редагувати {{  $user->name }}</h3>
            </div>
            <div class="card-body">
            {!! Lte3::formOpen(['action' => route('admin.users.update', $user->id), 'model' => $user, 'method' => 'PUT']) !!}
    @include('admin.users.inc.form', ['user' => $user])
            {!! Lte3::formClose() !!}
            </div>

        </div>

        </section>
@endsection
