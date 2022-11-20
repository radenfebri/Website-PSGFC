<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Warung Koloni | @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('storage/'. $logo ) }}" rel="icon">
    <link href="{{ asset('storage/'. $logo ) }}" rel="apple-touch-icon">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend') }}/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ asset('frontend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('frontend') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('frontend') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('frontend') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('frontend') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('frontend') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=6166c25ba68463001264b88e&product=inline-share-buttons' async='async'></script>


  <!-- Template Main CSS File -->
  <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sailor - v4.5.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
    @include('master.header')
  <!-- End Header -->




  <!-- ======= Hero Section ======= -->
    @yield('content')
  <!-- End #main -->

  <!-- ======= Footer ======= -->
@include('master.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@include('master.js')

</body>

</html>
