{!! Lte3::text('name') !!}
{!! Lte3::text('slug') !!}
{!! Lte3::textarea('content', null, [
    'label' => 'Контент',
    'rows' => 3,
]) !!}

{!! Lte3::select2('template', null, \App\Models\Page::templatesList('name', 'key'), [
    'label' => 'Шаблон',
]) !!}



{!! Lte3::btnSubmit('Зберегти', null, null, ['add' => 'fixed']) !!}
