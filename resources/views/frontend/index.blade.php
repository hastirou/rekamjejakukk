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
  <style type="text/css">
      .text{
      white-space: nowarp;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  </style>
  <body>
    <div id="fh5co-wrapper">
    <div id="fh5co-page">

@include('frontend.layouts.header')

    <aside id="fh5co-hero" class="js-fullheight">
      <div class="flexslider js-fullheight">
        <ul class="slides">
          <li style="background-image: url(images/img_bg_1.jpg);">
            
          </li>
          </ul>
        </div>
    </aside>

    <div id="fh5co-features">
      <div class="container">
        <div class="row">

          <div class="col-md-4 animate-box">
            <div class="feature-left">
              <span class="icon">
                <i class="icon-map"></i>
              </span>
              <div class="feature-copy">
                <h3>Khusus Daerah Jawa Timur</h3>
                <p>Untuk pelayanan yang lebih maksimal, kami hanya akan melakukan lelang khusus rumah yang berdaerah di Jawa Timur.</p>
              </div>
            </div>
          </div>

          <div class="col-md-4 animate-box">
            <div class="feature-left">
              <span class="icon">
                <i class="icon-mail"></i>
              </span>
              <div class="feature-copy">
                <h3>Pelayanan 24 Jam</h3>
                <p>Kami akan secepat mungkin menjawab serta memberikan solusi untuk pelanggan yang bertanya atau mendapatkan sebuah kendala, khususnya di pagi sampai sore hari.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 animate-box">
            <div class="feature-left">
              <span class="icon">
                <i class="icon-wallet"></i>
              </span>
              <div class="feature-copy">
                <h3>Harga Relatif Murah</h3>
                <p>Kami sebisa mungkin akan melakukan lelang dengan harga di bawah pasaran.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div id="fh5co-properties" class="fh5co-section-gray">
      <div class="container">
        <div class="row">

          <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
            <h3>Rekomendasi Lelang</h3>
          </div>

          @foreach($lelang as $lel)
          @if($lel->Status == 'STA')
          <div class="col-md-4 animate-box">
            <div class="property">
              <a href="{{ url('/lelang/detail/'.$lel->KodeLelang)}}" class="fh5co-property" class="col-md-4">
                <img src="{{ asset('/data_properti/'.$lel->File)}}" style="width:100%; height:100%;">
                <span class="status">Dimulai</span>
                <ul class="list-details">
                  <li>{{$lel->LuasTanah}}</li>
                  <li>{{$lel->KamarTidur}} Kamar Tidur</li>
                  <li>{{$lel->KamarMandi}} Kamar Mandi</li>
                  <li>{{$lel->JumlahGarasi}} Garasi</li>
                </ul>
              </a>
              <div class="property-details">
                <h3>{{$lel->NamaProperti}}</h3>
                <span class="price">Rp.{{number_format($lel->OpenBid)}} .-</span>
                <p>Lelang akan berakhir pada {{$lel->TanggalSelesai}}</p>
                <span class="address"><i class="icon-map"></i>{{$lel->Lokasi}}</span>
              </div>
            </div>
          </div>

          @elseif($lel->Status == 'OPN')
          <div class="col-md-4 animate-box">
            <div class="property">
              <a href="{{ url('/lelang/belumdimulai/'.$lel->KodeLelang)}}" class="fh5co-property" class="col-md-4">
                <img src="{{ asset('/data_properti/'.$lel->File)}}" style="width:100%; height:100%;">
                <span class="status">Belum Dimulai</span>
                <ul class="list-details">
                  <li>{{$lel->LuasTanah}}</li>
                  <li>{{$lel->KamarTidur}} Kamar Tidur</li>
                  <li>{{$lel->KamarMandi}} Kamar Mandi</li>
                  <li>{{$lel->JumlahGarasi}} Garasi</li>
                </ul>
              </a>
              <div class="property-details">
                <h3>{{$lel->NamaProperti}}</h3>
                <span class="price">Rp.{{number_format($lel->OpenBid)}}</span>
                <p>Lelang akan dimulai pada {{$lel->TanggalMulai}}</p>
                <span class="address"><i class="icon-map"></i>{{$lel->Lokasi}}</span>
              </div>
            </div>
          </div>
          @endif
          @endforeach
        </div>
      </div>
    </div>

  @include('frontend.layouts.footer')  

  </div>
  <!-- END fh5co-page -->

  </div>
  <!-- END fh5co-wrapper -->

  <!-- jQuery -->


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
  @stack('scripts')
  </body>
  @push('script')
  <script>
  function number_format(number, decimals, decPoint, thousandsSep) {
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
        var n = !isFinite(+number) ? 0 : +number
        var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
        var sep = (typeof thousandsSep === 'undefined') ? '.' : thousandsSep
        var dec = (typeof decPoint === 'undefined') ? ',' : decPoint
        var s = ''

        var toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec)
            return '' + (Math.round(n * k) / k)
                .toFixed(prec)
        }

        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || ''
            s[1] += new Array(prec - s[1].length + 1).join('0')
        }

        return s.join(dec)
    }
    </script>
    @endpush
</html>

