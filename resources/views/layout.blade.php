<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
    <link href="/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    @yield('style')
    @yield('title')
</head>

<body>

    @section('cart')
        @include('cart.includes._cart_counter')
    @endsection

    <main class="super_container">
        @include('includes._header')
        @yield('content')
        @include('includes._footer')
    </main>


    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/styles/bootstrap4/popper.js"></script>
    <script src="/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="/plugins/greensock/TweenMax.min.js"></script>
    <script src="/plugins/greensock/TimelineMax.min.js"></script>
    <script src="/plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="/plugins/greensock/animation.gsap.min.js"></script>
    <script src="/plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="/plugins/easing/easing.js"></script>
    
    @yield('javascript')
</body>
</html>
