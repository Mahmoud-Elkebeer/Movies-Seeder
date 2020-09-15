<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>

    <!--favicon -->
    <link rel="icon" href="{{url('')}}/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--app.css css-->
    <link rel="stylesheet" href="{{ url('assets/css/admin.app.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style-ar.css') }}">



</head>

<body class="{{ auth()->user() ? 'app':'bg-colour bg-primary' }}">

<!--Header Style -->
<div class="wave -three"></div>

<!--loader -->
<div id="spinner"></div>

<!--app open-->
<div id="app" class="page">
    <div class="main-wrapper">

        <!--nav open-->
        <nav class="navbar  navbar-expand-lg main-navbar mynav">
        </nav>
        <!--nav closed-->

        <!--aside open-->

    <!--aside closed-->

    @yield('content')



    <!--Footer-->
        <footer class="main-footer">
            <div class="text-center"></div>
        </footer>
        <!--/Footer-->

    </div>
</div>
<!--app closed-->

<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- Popup-chat -->
<a href="#" id="addClass"><i class="ti-comment"></i></a>

<script src="{{ url('assets/js/admin.app.js') }}"></script>

@yield('scripts')
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAndFqevHboVWDN156vJqXk1Y1-D7QR7BE&libraries=places&callback=initAutocomplete"
    async defer></script>
</body>

</html>
