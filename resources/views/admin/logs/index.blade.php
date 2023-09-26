@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Логи застосунку</h1>
        <iframe src="{{ route('admin.logs.index') }}" width="100%" height="500"></iframe>
    </div>
@endsection
