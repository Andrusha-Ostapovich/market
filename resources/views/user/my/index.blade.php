@extends('user.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="mb-0 text-center">Профіль користувача {{ $user->name }}</h4>
                    </div>

                    <div class="card-body">
                        <div class="text-center">
                            @if ($user->hasMedia('avatar'))
                                <img src="{{ $user->getFirstMediaUrl('avatar') }}" alt="Аватар користувача"
                                    class="img-fluid rounded-circle mb-3" style="max-width: 300px;">
                            @else
                                <img src="{{ asset('images/default-avatar.png') }}" alt="Аватар користувача"
                                    class="img-fluid rounded-circle mb-3" style="max-width: 300px;">
                            @endif
                        </div>
                        <h3 class="card-title text-center">{{ $user->name }}</h3>
                        <p class="card-text text-center"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="card-text text-center"><strong>Дата реєстрації:</strong>
                            {{ $user->created_at->format('d.m.Y') }}</p>

                        <div class="text-center">
                            <a href="{{ route('my.edit', ['id' => auth()->user()->id]) }}"
                                class="btn btn-primary">Редагувати профіль</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br>
@endsection
