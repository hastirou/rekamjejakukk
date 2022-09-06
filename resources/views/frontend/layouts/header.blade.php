<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <div id="logo" class="fl_left"> 
     
      <h1 class="logoname"><a href="/"><span>|Shagi</span></a></h1>
    </div>
    <nav id="mainav" class="fl_right"> 
     
      <ul class="clear">
        <li><a href="/">Home</a></li>
        <li><a href="/rekamjejak">Rekam Jejak</a></li>
        <!--<li><a class="drop" href="#">Pages</a>
          <ul>
            <li><a href="pages/gallery.html">Gallery</a></li>
            <li><a href="pages/full-width.html">Full Width</a></li>
            <li><a href="pages/sidebar-left.html">Sidebar Left</a></li>
            <li><a href="pages/sidebar-right.html">Sidebar Right</a></li>
            <li><a href="pages/basic-grid.html">Basic Grid</a></li>
            <li><a href="pages/font-icons.html">Font Icons</a></li>
          </ul>
        </li>
        <li><a class="drop" href="#">Dropdown</a>
          <ul>
            <li><a href="#">Level 2</a></li>
            <li><a class="drop" href="#">Level 2 + Drop</a>
              <ul>
                <li><a href="#">Level 3</a></li>
                <li><a href="#">Level 3</a></li>
                <li><a href="#">Level 3</a></li>
              </ul>
            </li>
            <li><a href="#">Level 2</a></li>
          </ul>
        </li>-->
         @if(Auth::user() && Auth::user()->id)
              @if(Auth::user()->roleid != '1')
              <li><a href="/admin">Admin Panel</a></li>
              @endif
              <li><a href="/tentangakun">Tentang Akun</a></li>
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
  </header>
</div>
