<div class="navbar bg-success"></div>
  <nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>

    </form>
    <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{url('storage/'.auth()->user()->img)}}" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->name}}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-title">Logged in 5 min ago</div>
          <a href="#" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <form>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </form>
        </div>
      </li>
    </ul>
  </nav>
