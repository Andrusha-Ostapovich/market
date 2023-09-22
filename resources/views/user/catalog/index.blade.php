@extends('user.layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>

                            <a  class="btn btn-primary">
                                Перейти до товарів
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
