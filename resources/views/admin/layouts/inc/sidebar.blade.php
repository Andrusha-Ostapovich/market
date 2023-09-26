  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->

      <a href="{{ url(config('lte3.dashboard_slug')) }}" class="brand-link">
          <img src="/vendor/adminlte/dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">{!! config('lte3.logo') !!}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          @auth
          @php
          $user = auth()->user();
          @endphp
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                  @if($user->hasMedia('avatar'))
                  <img src="{{ $user->getFirstMediaUrl('avatar') }}" class="img-circle elevation-2" width="150px">
                  @else
                  <p>Аватар не був доданий</p>
                  @endif

              <div class="info">
                  <a href="/admin/profile" class="d-block"> {{ Lte3::user('name') }} </a>
              </div>
          </div>
          @endauth


          @include('admin.layouts.inc.sidebar-menu.example')

      </div>
      <!-- /.sidebar -->
  </aside>
