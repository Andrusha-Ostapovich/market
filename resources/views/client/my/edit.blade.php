@extends('client.layouts.app')
@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    {!! Lte3::formOpen(['action' => route('my.update', $user->id), 'model' => $user, 'method' => 'PUT']) !!}


                    <div class="card-header">Профіль користувача {{ $user->name }}</div>
                    <div class="card-body">

                        {!! Lte3::text('name') !!}

                        {!! Lte3::email('email') !!}

                        {!! Lte3::text('phone') !!}

                        {!! Lte3::password('password') !!}


                        <br>
                        {!! Lte3::mediaFile('avatar', $user ?? null, [
                            'label' => 'Аватар',
                            'is_image' => true,
                        ]) !!}

                        <br>

                        {!! Lte3::btnSubmit('Зберегти', null, null) !!}

                        {!! Lte3::formClose() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
