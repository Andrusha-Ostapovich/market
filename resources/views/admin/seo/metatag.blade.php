@php($collapsed = isset($collapsed) ? $collapsed : !request()->has('_f'))
{!! Lte3::formOpen(['action' => Request::fullUrl(), 'method' => 'GET']) !!}
<div class="card @if ($collapsed) collapsed-card @endif">
    <div class="card-header">
        <h3 class="card-title lte-pointer" data-card-widget="collapse">Метатеги<i class="fas fa-angle-down"></i></h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                @if ($collapsed)
                    <i class="fas fa-plus"></i>
                @else
                    <i class="fas fa-minus"></i>
                @endif
            </button>
        </div>
    </div>
    <div class="card-body" @if ($collapsed) style="display: none" @endif>
        <input type="hidden" name="_f" value="1">
        {!! Lte3::text('title') !!}
        {!! Lte3::text('keywords') !!}
        {!! Lte3::text('description') !!}

    </div>
    <div class="card-footer text-right">

        {!! Lte3::btnSubmit('Змінити') !!}
    </div>
    {!! Lte3::formClose() !!}
</div>
