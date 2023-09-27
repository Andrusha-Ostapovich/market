@extends('admin.layouts.app')
@section('content')
    <br>
    <div class="container">
        {!! Lte3::formOpen(['action' => route('admin.setting.create'), 'method' => 'PUT']) !!}

        {!! Lte3::lists('phones', \Variable::getArray('phones'), [
            'label' => 'Номери:',
            'field_name' => 'phone',
            'placeholder_value' => 'Title',
        ]) !!}
        @foreach ($values as $variable)
            @if ($variable->key === 'phones')
            @break

        @elseif ($variable->key === 'email')
            {!! Lte3::text($variable->key, $variable->value) !!}
        @elseif ($variable->key === 'address')
            {!! Lte3::text($variable->key, $variable->value) !!}
        @else
            {!! Lte3::url($variable->key, $variable->value) !!}
        @endif
    @endforeach


    {!! Lte3::btnSubmit('Зберегти', null, null, ['add' => 'fixed']) !!}
    <br>
    <br>
    {!! Lte3::formClose() !!}
</div>
@endsection
