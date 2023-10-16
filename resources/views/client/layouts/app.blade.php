@include('client.layouts.inc.begin')
<div class="wrapper">
    @include('client.layouts.inc.header')

    <div class="content-wrapper">
        {{-- @include('admin.parts.alerts.bootstrap') --}}
        @yield('content')

    </div>
    @include('client.layouts.inc.footer')
</div>
@include('client.layouts.inc.end')
