@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <a class='btn btn-info' href="/admin/sitemap.xml"> Карта сайту </a>


                {!! Lte3::formOpen(['action' => route('admin.setting.create'), 'method' => 'PUT']) !!}

                <!-- Відобразіть список телефонів -->
                {!! Lte3::lists('phones', \Variable::getArray('phones'), [
                    'label' => 'Номери телефонів:',
                    'field_name' => 'phone',
                    'placeholder_value' => 'Введіть номер',
                ]) !!}

                <!-- Відобразіть поля для соціальних мереж -->
                {!! Lte3::url('facebook', \Variable::get('facebook'), ['label' => 'Facebook']) !!}
                {!! Lte3::url('twitter', \Variable::get('twitter'), ['label' => 'Twitter']) !!}
                {!! Lte3::url('instagram', \Variable::get('instagram'), ['label' => 'Instagram']) !!}
                {!! Lte3::url('linkedin', \Variable::get('linkedin'), ['label' => 'LinkedIn']) !!}

                <!-- Відобразіть поля для адреси та електронної пошти -->
                {!! Lte3::text('address', \Variable::get('address'), ['label' => 'Адреса']) !!}
                {!! Lte3::text('email', \Variable::get('email'), ['label' => 'Електронна пошта']) !!}

                <!-- Кнопка "Зберегти" -->
                {!! Lte3::btnSubmit('Зберегти', null, null, ['add' => 'fixed']) !!}

                {!! Lte3::formClose() !!}
            </div>
        </div>
    </div>
@endsection

