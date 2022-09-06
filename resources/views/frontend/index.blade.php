<!DOCTYPE html>
<html lang="">
<head>
<title>Shagi</title>
<link rel="shortcut icon" href="{{ asset('/images/thelogo.png')}}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="{{ asset('layout/styles/layout.css')}}" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- header -->
	@include('frontend.layouts.header')
<!-- endheader -->
<div class="bgded overlay" style="background-image:url('images/demo/backgroundindex.jpg');">
  <div id="pageintro" class="hoc clear"> 
   
    <article>
      <h3 class="heading">Shagi, Hadir Untuk Merekam Jejak Perjalananmu Kemana Saja</h3>
      <p>Lindungi diri dan sekitar dengan mencatat jejak perjalananmu di Shagi selama pandemi Covid-19.</p>
      <footer><a class="btn" href="/rekamjejak">Mulai Rekam</a></footer>
    </article>
   
  </div>
</div>
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
   
    <section id="introblocks">
      <ul class="nospace group btmspace-80 elements elements-four">
        <li class="one_quarter">
          <article><a href="#"><i class="fa fa-male"></i></a>
            <h6 class="heading">Kondisi Tubuh</h6>
            <p>Jangan keluar rumah jika kondisi tubuh tidak fit.</p>
          </article>
        </li>
        <li class="one_quarter">
          <article><a href="#"><i class="fa fa-thermometer-half "></i></a>
            <h6 class="heading">Catat suhu</h6>
            <p>Jangan lupa cek dan catat suhu tubuhmu saat bepergian.</p>
          </article>
        </li>
        <li class="one_quarter">
          <article><a href="#"><i class="fa fa-location-arrow"></i></a>
            <h6 class="heading">Catat Tujuan</h6>
            <p>Catat lokasi kepergianmu kemana saja.</p>
          </article>
        </li>
        <li class="one_quarter">
          <article><a href="#"><i class="fa fa-road"></i></a>
            <h6 class="heading">Keselamatan</h6>
            <p>Utamakan keselamatan saat berada di perjalanan.</p>
          </article>
        </li>
      </ul>
    </section>
   
    <section class="group shout">
      <figure class="one_half first"><img src="images/01.jpg" alt="">
        <!--<figcaption class="heading"><a href="#">Accumsan placerat</a></figcaption>-->
      </figure>
      <figure class="one_half"><img src="images/02.jpg" alt="">
        <!--<figcaption class="heading"><a href="#">Scelerisque etiam</a></figcaption>-->
      </figure>
    </section>
   
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
</div>

<!--footer-->
@include('frontend.layouts.footer')
<!--endfooter-->

<!-- JAVASCRIPTS -->
<script src="{{ asset('layout/scripts/jquery.min.js')}}"></script>
<script src="{{ asset('layout/scripts/jquery.backtotop.js')}}"></script>
<script src="{{ asset('layout/scripts/jquery.mobilemenu.js')}}"></script>
<!-- Homepage specific -->
<script src="{{ asset('layout/scripts/jquery.easypiechart.min.js')}}"></script>
<!-- / Homepage specific -->
</body>
</html>