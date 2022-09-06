<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BID.In</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
  <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
  <meta name="author" content="FREEHTML5.CO" />

  <meta property="og:title" content=""/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <link rel="shortcut icon" href="{{ asset('/images/logonih.png')}}">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,300' rel='stylesheet' type='text/css'>
  
  <!-- Animate.css -->
  <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="{{ asset('css/icomoon.css')}}">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
  <!-- Superfish -->
  <link rel="stylesheet" href="{{ asset('css/superfish.css')}}">
  <!-- Flexslider  -->
  <link rel="stylesheet" href="{{ asset('css/flexslider.css')}}">
  <!-- Magnific Popup -->
  <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css')}}">
  <!-- CS Select -->
  <link rel="stylesheet" href="{{ asset('css/cs-select.css')}}">
  <link rel="stylesheet" href="{{ asset('css/cs-skin-border.css')}}">
  
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">


  <!-- Modernizr JS -->
  <script src="{{ asset('js/modernizr-2.6.2.min.js')}}"></script>
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->


  </head>
  <body>
    
<header id="fh5co-header-section" class="sticky-banner">
      <div class="container">
        <div class="nav-header">
          <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
          <h1 id="fh5co-logo"><a href="/"><i class="icon-home"></i>BID.<span>IN</span></a></h1>
          <!-- START #fh5co-menu-wrap -->
          <nav id="fh5co-menu-wrap" role="navigation">
            <ul class="sf-menu" id="fh5co-primary-menu">
              <li><a href="/">Home</a></li>
              <li><a href="/login">Login</a></li>
              <li><a href="/register">Daftar</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>

    <!-- end:header-top -->
            <br/><br/><br/><br/>
    @yield('content')
    <br/><br/><br/><br/>
    @include('frontend.layouts.footer')

  <script src="{{ asset('js/jquery.min.js')}}"></script>
  <!-- jQuery Easing -->
  <script src="{{ asset('js/jquery.easing.1.3.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
  <!-- Waypoints -->
  <script src="{{ asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset('js/sticky.js')}}"></script>
  <!-- Superfish -->
  <script src="{{ asset('js/hoverIntent.js')}}"></script>
  <script src="{{ asset('js/superfish.js')}}"></script>
  <!-- Flexslider -->
  <script src="{{ asset('js/jquery.flexslider-min.js')}}"></script>
  <!-- Date Picker -->
  <script src="{{ asset('js/bootstrap-datepicker.min.js')}}"></script>
  <!-- CS Select -->
  <script src="{{ asset('js/classie.js')}}"></script>
  <script src="{{ asset('js/selectFx.js')}}"></script>

  
  <!-- Main JS -->
  <script src="{{ asset('js/main.js')}}"></script>

  </body>
</html>