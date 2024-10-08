<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="sweetalert2.min.css">
<!-- Bosstrasp core css -->
<div class="lds-dual-ring"></div>
<link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/carousel/">
<nav class="navbar navbar-expand-lg bg-danger sticky-top bg-transparent">
  <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">blogs video</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto">
              @guest
                  <li class="nav-item">
                      <a class="nav-link {{ request()->is('login') ? 'active' : '' }}"
                          href="{{ route('login') }}">Login</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link {{ request()->is('register') ? 'active' : '' }}"
                          href="{{ route('register') }}">Register</a>
                  </li>
              @else
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          {{ Auth::user()->name }}
                      </a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="{{route('home')}}" class="dropdown-item">-Menu</a>
                          </li>
                          <li>
                              <a class="dropdown-item" href="{{ route('posts.index') }}">-Crud</a>
                          </li>
                          <a class="dropdown-item" href="{{ route('posts.create') }}">-Create</a>
                  </li>
                  <li>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" role="button" >-Logout</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST">
                          @csrf
                      </form>
                  </li>
                  <li>
                  </li>
              </ul>
              </li>
          @endguest
          </ul>
      </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>