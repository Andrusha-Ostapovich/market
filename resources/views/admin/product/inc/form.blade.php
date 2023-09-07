{!! Lte3::text('name') !!}
{!! Lte3::text('brand') !!}
{!! Lte3::text('article') !!}
{!! Lte3::number('old_price') !!}
{!! Lte3::number('price') !!}
{!! Lte3::text('slug') !!}
{!! Lte3::textarea('description', null, [
'label' => 'Опис',
'rows' => 3,
]) !!}






{!! Lte3::select2('main_category_id', isset($product) ? $product->main_category_id : null, $categories, [
'label' => 'Категорії:',
'field_name' => 'main_category_id',
'placeholder_value' => 'Title',
]) !!}

{!! Lte3::select2('seller_id', isset($product) ? $product->seller_id : null, $seller, [
'label' => 'Продавець:',
'field_name' => 'seller_id',
'placeholder_value' => 'Title',
]) !!}


{!! Lte3::mediaFile('product_photo', $product ?? null, [
'label' => 'Фото',
'multiple' => true,
'is_image' => true,
]) !!}



{!! Lte3::btnSubmit('Зберегти', null, null, ['add' => 'fixed']) !!}