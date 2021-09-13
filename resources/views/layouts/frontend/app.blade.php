<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ config('app.name') }} | @yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('template-blog/frontend/css/styles.css') }}" rel="stylesheet" />
        @stack('css-external')
    </head>
    <body>
        <!-- Responsive navbar-->
        @include('layouts.frontend.nav')
        <!-- Page content-->
        @yield('content')
        <!-- Footer-->
        <footer class="py-5 bg-dark mt-5">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        @stack('js-external')
        <script src="js/scripts.js"></script>
    </body>
</html>
