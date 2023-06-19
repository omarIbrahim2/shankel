<!DOCTYPE html>

<html lang="en" dir="ltr">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="shankal is the most important school management system in jordan">
    <title>@yield('title')</title>
    <!-- fav icon -->
    <link rel="icon" type="image/x-icon" href="assets/images/logo/logo.png">
    <!-- bootstarp 5 -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
    <!-- fontawesome 6 -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/all.min.css">
    <!-- select 2 -->
    <link rel="stylesheet" href="{{asset('assets')}}/css//select2.min.css">
    <!-- swiper js -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/toastr.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/main.css">
    <!-- custom responsive -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/responsive.css">
    <!-- invoice css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/invoices.css">



    @yield('styles')
</head>

<body>

    @yield('main')

    <!-- jquery 3.6 -->
    <script src="{{asset('assets')}}/js/jquery-3.6.0.min.js"></script>
    <!-- bootstrap 5 -->
    <script src="{{asset('assets')}}/js/bootstrap.bundle.min.js"></script>
    <!-- fontawesome 6 -->
    <script src="{{asset('assets')}}/js/all.min.js"></script>
    <!-- select2 -->
    <script src="{{asset('assets')}}/js/select2.min.js"></script>
    <!-- swiper js -->
    <script src="{{asset('assets')}}/js/swiper-bundle.min.js"></script>
    <!-- custom js -->
    <script src="{{asset('assets')}}/js/toastr.min.js"></script>
    <script src="{{asset('assets')}}/js/toastr.js.map"></script>
    <script src="{{asset('assets')}}/js/script.js"></script>

    @yield('scripts')
</body>

</html>
