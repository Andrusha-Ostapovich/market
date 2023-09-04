{!! Lte3::text('name') !!}

{!! Lte3::select2('main_category_id', isset($product) ? $product->main_category_id : null, $categories, [
    'label' => 'Категорії:',
    'field_name' => 'main_category_id',
    'placeholder_value' => 'Title',
]) !!}

{!! Lte3::select2('main_category_id', isset($product) ? $product->main_category_id : null, $categories, [
    'label' => 'Категорії:',
    'field_name' => 'main_category_id',
    'placeholder_value' => 'Title',
]) !!}


{!! Lte3::btnSubmit('Зберегти', null, null, ['add' => 'fixed']) !!}