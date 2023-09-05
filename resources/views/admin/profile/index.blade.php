@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
'page_title' => 'Профіль'
])

<!-- Main content -->
<section class="content">



    <!-- Default box -->
    <div class="card">
        <div class="card-header">

            <div class="card-body">

                <h4>Ім'я: {{ $user->name }}</h4>
                <h4>Емайл: {{ $user->email }}</h4>
                <h4>Пароль: {{ $user->password }}</h4>
                <h4>Роль: {{ $user->role }}</h4>
                <a class="btn btn-danger" href="{{ route('profile.edit') }}">Редагувати</a>
            </div>

        </div>
        <!-- /.card -->

</section>
<!-- /.content -->
@endsection