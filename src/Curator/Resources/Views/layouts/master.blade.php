<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Curator / @yield('title')</title>

        <!-- Start CSS -->
        <link href="css/vendor/curator/material.css" rel="stylesheet">
        <link href="css/vendor/curator/style.css" rel="stylesheet">
        <link href="css/vendor/curator/font-awesome.css" rel="stylesheet">
        <!-- Start CSS -->
    </head>

    <body>
        <!-- Start Navigation -->
        @include('curator::layouts.navigation')
        <!-- End Navigation -->

        <!-- Start Content -->
        <div class="container">
            @yield('content')
        </div>
        <!-- End Content -->

        <!-- Start Footer -->
        @include('curator::layouts.footer')
        <!-- End Footer -->

        <!-- Start JS -->
        <script type="text/javascript" src="js/vendor/curator/jquery-3.0.0.js"></script>
        <script type="text/javascript" src="js/vendor/curator/tether.js"></script>
        <script type="text/javascript" src="js/vendor/curator/bootstrap.js"></script>
        <script type="text/javascript" src="js/vendor/curator/material.js"></script>
        <script type="text/javascript" src="js/vendor/curator/ie10-viewport-bug-workaround.js"></script>
        <!-- End JS -->
    </body>

</html>
