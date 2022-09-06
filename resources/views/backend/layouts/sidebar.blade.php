<nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/rekamdata" class="nav-link {{ Request::is('admin/rekamdata') ? 'active' : '' }}">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Rekam Data
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/manajemenuser" class="nav-link {{ Request::is('admin/manajemenuser') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Manajemen User
              </p>
            </a>
          </li>
          @if(Auth::user()->roleid == '3')
          <li class="nav-item">
            <a href="/admin/userbackend" class="nav-link {{ Request::is('admin/userbackend') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Backend
              </p>
            </a>
          </li>
          @endif