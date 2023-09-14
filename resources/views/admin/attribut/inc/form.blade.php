@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Lte3::text('name') !!}


{!! Lte3::select2('categories', 'new', $categories, [
    'label' => 'Категорії',
    'multiple' => 1,
    'id' => 'categories',
]) !!}






{!! Lte3::btnSubmit('Зберегти', null, null, ['add' => 'fixed']) !!}
