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

        {!! Lte3::url('facebook', \Variable::get('facebook')) !!}
        {!! Lte3::url('twitter', \Variable::get('twitter')) !!}
        {!! Lte3::url('instagram', \Variable::get('instagram')) !!}
        {!! Lte3::url('linkedin', \Variable::get('linkedin')) !!}
        {!! Lte3::text('address', \Variable::get('address')) !!}
        {!! Lte3::text('email', \Variable::get('email')) !!}



        {!! Lte3::btnSubmit('Зберегти', null, null, ['add' => 'fixed']) !!}
        <br>
        <br>
        {!! Lte3::formClose() !!}
    </div>
@endsection
