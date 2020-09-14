<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    @yield('title')
    </title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            <li class="nav-item">
                <a class="nav-link" href="{{route('book.create')}}">Add Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('book.list')}}">All Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('cate.list')}}">All Category</a>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

            @guest

            <li class="nav-item">
                <a class="nav-link" href="{{route('auth.register')}}">Register</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('auth.login')}}">Login</a>
            </li>

            @endguest


            @auth

            <li class="nav-item">
                <a class="nav-link disabled" href="#">{{ Auth::user()->name}}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('auth.logout')}}">Logout</a>
            </li>


            @endauth



        </ul>

    </div>
</nav>



    @yield('content')



    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstarp.min.js')}}"></script>
</body>
</html>
