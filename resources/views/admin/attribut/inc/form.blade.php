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

{!! Lte3::select2('category_id', isset($attributs) ? $attributs->category_id : null, $category, [
    'label' => 'Категорії:',
    'field_name' => 'category_id',
    'placeholder_value' => 'Title',
]) !!}




{!! Lte3::btnSubmit('Зберегти', null, null, ['add' => 'fixed']) !!}