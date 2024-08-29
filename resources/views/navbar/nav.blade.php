<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('auth.layouts')
    
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

</body>
</html>