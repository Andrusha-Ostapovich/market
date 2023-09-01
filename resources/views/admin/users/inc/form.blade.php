{!! Lte3::text('name') !!}

{!! Lte3::email('email') !!}

{!! Lte3::password('password') !!}
<!-- 
{!! Lte3::file('image', null, [
    'label' => 'Аватар',
 
]) !!} -->


{!! Lte3::mediaFile('avatar', $user ?? null, [
    'label' => 'Аватар',
    'is_image' => true,
]) !!}

{!! Lte3::select2('role', 'user' , [
    'user' => 'user',
    'seller' => 'seller',
    'admin' => 'admin'
], [
    'label' => 'Роль',
]) !!}

{!! Lte3::btnSubmit('Зберегти', null, null, ['add' => 'fixed']) !!}