<header id="fh5co-header-section" class="sticky-banner">
      <div class="container">
        <div class="nav-header">
          <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
          <h1 id="fh5co-logo"><a href="/"><i class="icon-home"></i>BID.<span>IN</span></a></h1>
          <!-- START #fh5co-menu-wrap -->
          <nav id="fh5co-menu-wrap" role="navigation">
            <ul class="sf-menu" id="fh5co-primary-menu">
              <li><a href="/">Halaman Utama</a></li>
            <li>
                <a href="" class="fh5co-sub-ddown">Daftar Lelang</a>
                <ul class="fh5co-sub-menu">
                  <li><a href="{{ url('/semualelang') }}">Semua Lelang</a></li>
                  <li><a href="{{ url('/rumahtunggal/') }}">Rumah Tunggal</a></li>
                  <li><a href="#">Rumah Tapak</a></li>
                  <li><a href="#">Rumah Toko</a></li>
                  <li><a href="#">Rumah Kantor</a></li>
                  <li><a href="#">Apartemen</a></li>
                </ul>
              </li>
              @if(Auth::user() && Auth::user()->id)
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form></li>
              @else
              <li><a href="/login">Masuk</a></li>
              <li><a href="/register">Daftar</a></li>
              @endif
            </ul>
          </nav>
        </div>
      </div>
    </header>

    <!-- end:header-top -->