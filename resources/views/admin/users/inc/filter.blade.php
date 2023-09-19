@extends('admin.parts.filter-wrap')

@section('body')
    {!! Lte3::hidden('type', 'projects') !!}
    <div class="row">
        <div class="col-md-3">
            {!! Lte3::text('name', null, ['label' => 'Ім\'я']) !!}
        </div>
        <div class="col-md-3">
            {!! Lte3::text('email', null, ['label' => 'Email']) !!}
        </div>
        <div class="col-md-2">

            {!! Lte3::select2(
                'role',
                $roles,
                \App\Models\User::rolesList('name', 'key'),
                [
                    'label' => 'Ролі',
                    'multiple' => 1,
                ],
            ) !!}
        </div>
        <div class="col-md-2">
            {!! Lte3::datepicker('date', null, [
                'label' => 'Дата',
            ]) !!}
        </div>
    </div>
@stop
