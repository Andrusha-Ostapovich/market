@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
'page_title' => 'Профіль',
'url_back' => route('admin.profile')
])

<!-- Main content -->
<section class="content">



    <!-- Default box -->
    <div class="card">
        <div class="card-header">

            <div class="card-body">
                {!! Lte3::formOpen(['action' => route('profile.update', $user->id), 'model' => $user, 'method' => 'PUT']) !!}
                {!! Lte3::text('name') !!}

                {!! Lte3::email('email') !!}

                {!! Lte3::password('password') !!}

                {!! Lte3::mediaFile('avatar', $user ?? null, [
                'label' => 'Аватар',
                'is_image' => true,
                ]) !!}

                {!! Lte3::select2('role', 'user' , [
                'user' => 'user',
                'seller' => 'seller',
                'admin' => 'admin'
                ], [
                'label' => 'Роль',
                ]) !!}

                {!! Lte3::btnSubmit('Зберегти', null, null, ['add' => 'fixed']) !!}
                {!! Lte3::formClose() !!}
            </div>

        </div>
        <!-- /.card -->

</section>
<!-- /.content -->
@endsection