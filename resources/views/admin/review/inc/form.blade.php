{!! Lte3::select2('product_id', isset($reviews) ? $reviews->product_id : null, $products, [
    'label' => 'Продукт:',
    'field_name' => 'product_id',
    'placeholder_value' => 'Title',
]) !!}
<div class="col-md-2">
    {!! Lte3::range('rating', isset($reviews) ? $reviews->rating : null, ['min' => 1, 'max' => 5, 'step' => 1]) !!}
</div>
{!! Lte3::textarea('content', null, [
    'label' => 'Контент',
    'rows' => 3,
]) !!}


{!! Lte3::btnSubmit('Зберегти', null, null, ['add' => 'fixed']) !!}
