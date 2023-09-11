@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Lte3::text('title') !!}
{!! Lte3::textarea('description') !!}





{!! Lte3::btnSubmit('Зберегти', null, null, ['add' => 'fixed']) !!}
