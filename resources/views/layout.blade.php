<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet" >
    <title></title>
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
{{--        <a class="nav-link navButton" href="{{action('AuthController')}}">Sigh in</a>--}}
        <a class="nav-link navButton" href="{{action('AuthController@index')}}">Sigh in</a>
    </nav>

</div>


<div class="container" >

    @yield('content')

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





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>
