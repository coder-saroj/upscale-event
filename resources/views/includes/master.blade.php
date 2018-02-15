<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  
  <meta name="keywords" content="@yield('keywords')">
  <meta name="description" content="@yield('description')">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Favicons -->
  <link rel="shortcut icon" href="favicon/favicon.ico">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('public/favicon/apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('public/favicon/apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/favicon/apple-icon-144x144.png') }}">
  
  <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/css/font-awesome.min.css') }}" rel="stylesheet">
  
  <link href="{{ asset('public/css/flaticon.css') }}" rel="stylesheet" >
  <link href="{{ asset('public/css/owl.carousel.css') }}" rel="stylesheet" >
  <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('public/css/responsive.css') }}" rel="stylesheet">
  <script src="{{ asset('public/js/jquery-1.10.2.min.js') }}"></script>
  <script src="{{ asset('public/js/upscale-validation.js') }}"></script>
</head>
<body>
  <div class="main-container">
    <header class="header fixed-top">
        @include('includes.header') 
    </header>
    
    @yield('content')
  
    <footer>
         @include('includes.footer') 
    </footer>
  </div>
  
  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">       
    <ul class="sr1">
    <li class="msc"><input type="text" class="form-control" placeholder="What are you looking for?"></li>
    <li class="srch-dt"><input type="text" class="form-control" placeholder="From Date"></li>
    <li class="srch-dt"><input type="text" class="form-control" placeholder="To Date"></li>
    <li class="srch-c">
    <button class="btn btn-theme srch-btn" type="submit" style="">Search</button></li>    
    </ul>
    <div class="modal-footer">
    </div>    
    </div>
  </div>
  </div>
  </div>



<!--Migrate Js-->
<script src="{{ asset('public/js/jquery-migrate.js') }}"></script>
<!--Popper Js-->
<script src="{{ asset('public/js/popper-1.12.3.min.js') }}"></script>
<!--Bootstrap Js-->
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<!--Owl-Carousel Js-->
<script src="{{ asset('public/js/owl.carousel.min.js') }}"></script>
<!--counter Js-->
<script src="{{ asset('public/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('public/js/waypoints-jquery.js') }}"></script>

<!-- slider js files start -->
<script  src="{{ asset('public/js/index.js') }}"></script>
<!--scrollUp js-->
<script src="{{ asset('public/js/jquery.scrollUp.js') }}"></script>

<!-- template main js file -->
<script src="{{ asset('public/js/main.js') }}"></script> 
</body>
</html>