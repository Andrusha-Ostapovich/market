{!! Lte3::text('name') !!}

{!! Lte3::email('email') !!}

{!! Lte3::password('password') !!}



{!! Lte3::mediaFile('avatar', $user ?? null, [
    'label' => 'Аватар',
    'is_image' => true,
]) !!}

{!! Lte3::select2('role', 'user', \App\Models\User::rolesList('name', 'key'), [
    'label' => 'Роль',
]) !!}

{!! Lte3::btnSubmit('Зберегти', null, null, ['add' => 'fixed']) !!}
