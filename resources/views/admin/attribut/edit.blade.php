@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', [
    'page_title' => 'Редагувати Атрибут',
    'url_back' => route('attribut.index'),
])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Редагувати {{  $attribute->name }}</h3>
            </div>
            <div class="card-body">
            {!! Lte3::formOpen(['action' => route('attribut.update', $attribute->id), 'model' => null, 'method' => 'PUT']) !!}
    @include('admin.attribut.inc.form',compact('categories','attribute'))
            {!! Lte3::formClose() !!}
            </div>

        </div>

        </section>
@endsection
