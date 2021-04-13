<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet" >
    <title>Library on Laravel - MANAGEMENT</title>
</head>
<body>

<div class="layout">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="hiderButtons">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{action('BookController@index')}}">Books</a>
                    </li>
                </ul>
            </div>
        </div>

        @include('.auth/include/navAuthLink')

    </nav>

</div>


<div class="container" >

    <h2 class="d-flex justify-content-center p-3">
        "Management" section
    </h2>

    <div class="row">
        <div class="col-2 d-flex justify-content-center">
                <nav class="nav flex-column">
                    <a class="nav-link" href="{{route('manage.books')}}">Books</a>
                    <a class="nav-link" href="{{route('manage.users')}}">Users</a>
                </nav>
        </div>

        <div class="col-10">
            @yield('content')
        </div>
    </div>

</div>


<footer class="footer">
    {{--    <div class="container">--}}
    <div class="row">
        <div class="containerLogo col-sm-7 col-12">
            <p class="siteDesigner">&copy; Сечин Дмитрий 2021</p>
        </div>
        <div class="containerRef col-sm-5 col-12">
            <a href="https://www.facebook.com/manufacture.design/" target="_blank">   <img src='{{ asset('images/facebook1.png') }}' alt=""/></a>
            <a href="https://www.instagram.com/textile_decor_kiev/?hl=uk" target="_blank"><img src='{{ asset('images/inst1.png') }}' alt=""/></a>
        </div>
    </div>
    {{--    </div>--}}
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>
