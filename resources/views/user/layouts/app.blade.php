@include('user.layouts.inc.begin')
<div class="wrapper">
    @include('user.layouts.inc.header')

    <div class="content-wrapper">
        @yield('content')
    </div>
    @include('user.layouts.inc.footer')
</div>
@include('user.layouts.inc.end')
