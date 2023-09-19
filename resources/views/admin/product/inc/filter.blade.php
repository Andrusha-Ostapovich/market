@extends('admin.parts.filter-wrap')

@section('body')
    {!! Lte3::hidden('type', 'projects') !!}
    <div class="row">
        <div class="col-md-4">
            {!! Lte3::text('name', null, ['label' => 'Назва']) !!}
        </div>
        <div class="col-md-2">
            {!! Lte3::text('min_price', null, ['label' => 'Мінімальна Ціна']) !!}
        </div>
        <div class="col-md-2">
            {!! Lte3::text('max_price', null, ['label' => 'Максимальна Ціна']) !!}
        </div>

        {!! Lte3::select2('categories', $categoryFilter, $categories, [
            'label' => 'Категорії',
            'multiple' => 1,
            'id' => 'categories',
        ]) !!}

        {!! Lte3::checkbox('with_photo', null, ['label' => 'Тільки з фото']) !!}

    </div>
@stop
