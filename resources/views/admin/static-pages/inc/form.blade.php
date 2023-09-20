{!! Lte3::text('name') !!}
{!! Lte3::text('slug') !!}
{!! Lte3::textarea('content', null, [
    'label' => 'Опис',
    'rows' => 3,
]) !!}
{!! Lte3::textarea('template', null, [
    'label' => 'Шаблон',
    'rows' => 3,
]) !!}



{!! Lte3::btnSubmit('Зберегти', null, null, ['add' => 'fixed']) !!}
