<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('login') }}">Attendance App</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('login') }}">AtApp</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-gauge"></i> <span>Dashboard</span></a>
      </li>
      <li class="menu-header">User Management</li>
      <li class="{{ Request::is('users') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users-gear"></i>
          <span>Users</span></a>
      </li>
      <li class="menu-header">Company Management</li>
      <li class="{{ Request::is('companies') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('companies.index') }}"><i class="fas fa-building"></i>
          <span>Company</span></a>
      </li>
      <li class="menu-header">Presence Data</li>
      <li class="{{ Request::is('attendances') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('attendances.index') }}"><i class="fas fa-business-time"></i>
          <span>Attendance</span></a>
      </li>
      {{-- <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        <ul class="dropdown-menu">
          <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
            <a class="nav-link" href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
          </li>
          <li class="{{ Request::is('dashboard-ecommerce-dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('dashboard-ecommerce-dashboard') }}">Ecommerce Dashboard</a>
          </li>
        </ul>
      </li> --}}
      {{-- <li class="menu-header">Starter</li>
      <li class="nav-item dropdown {{ $type_menu === 'layout' ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
          <span>Layout</span></a>
        <ul class="dropdown-menu">
          <li class="{{ Request::is('layout-default-layout') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('layout-default-layout') }}">Default Layout</a>
          </li>
          <li class="{{ Request::is('transparent-sidebar') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('transparent-sidebar') }}">Transparent Sidebar</a>
          </li>
          <li class="{{ Request::is('layout-top-navigation') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('layout-top-navigation') }}">Top Navigation</a>
          </li>
        </ul>
      </li> --}}
      <li class="cursor-pointer">
        <a href="#" class="nav-link text-danger"
          onclick="event.preventDefault();document.getElementById('logout-form').submit()">
          <i class="fas fa-sign-out-alt"></i><span>Logout</span>
        </a>
        <form id='logout-form' action="{{ route('logout') }}" method="post">
          @csrf
        </form>
      </li>
    </ul>

    {{-- <div class="hide-sidebar-mini mt-4 mb-4 p-3">
      <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Documentation
      </a>
    </div> --}}
  </aside>
</div>
