<!-- Sidebar -->
<ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
      <div class="sidebar-brand-icon">
        <i class="fas fa-medkit"></i>
      </div>
      <div class="sidebar-brand-text mx-3">RC Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link"  href="{{ route('dashboard') }}">
          <i class="fas fa-fw fa-list-alt"></i>
          <span>Dashboard</span></a>
      </li>
    
    <!-- Divider -->
    <div>
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Menu Covid
      </div>
      <li class="nav-item
      {{ request()->routeIs(
        'kategori-covid.index*','kategori-covid.create*', 'kategori-covid.edit*', 'kategori-covid.show*'
        ) ? 'active' : ''
      }}">
        <a class="nav-link" href="{{ route('kategori-covid.index') }}">
          <i class="fas fa-fw fa-book"></i>
          <span>Kategori Covid</span>
        </a>
      </li>

      <li class="nav-item 
        {{ request()->routeIs(
          'gejala-covid.index*', 'gejala-covid.create*',  'gejala-covid.edit*'
          ) ? 'active' : '' 
        }}">
        <a class="nav-link" href="{{ route('gejala-covid.index') }}">
          <i class="fas fa-fw fa-medkit"></i>
          <span>Gejala Covid</span>
        </a>
      </li>

      <li class="nav-item 
        {{ request()->routeIs(
          'kasus-covid.index*', 'kasus-covid.create*',  'kasus-covid.edit*'
          ) ? 'active' : '' 
        }}">
        <a class="nav-link" href="{{ route('kasus-covid.index') }}">
          <i class="fas fa-fw fa-exclamation-circle"></i>
          <span>Kasus Covid</span>
        </a>
      </li>

      <li class="nav-item 
        {{ request()->routeIs(
          'dampak-covid.index*', 'dampak-covid.create*',  'dampak-covid.edit*'
          ) ? 'active' : '' 
        }}">
        <a class="nav-link" href="{{ route('dampak-covid.index') }}">
          <i class="fas fa-fw fa-info"></i>
          <span>Dampak Covid</span>
        </a>
      </li>
    </div>

    
    <hr class="sidebar-divider d-none d-md-block">
    
    @if (Auth::user()->roles === 1)
    <div>
      <div class="sidebar-heading">
        Menu Admin
      </div>
      <li class="nav-item
      {{ request()->routeIs(
          'user.index*', 'user.edit*'
          ) ? 'active' : ''
        }}">
          <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">
    </div>
    @endif
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none_Pd-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    

  </ul>
  <!-- End of Sidebar -->