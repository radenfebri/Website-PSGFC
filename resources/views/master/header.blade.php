<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <!-- <a href="index.html" class="logonav me-auto"><img src="assets/img/logo/logo.png" alt="" class="img-fluid"></a>
      <h1 class="logo me-auto"><a href="index.html">PSG FC</a></h1> -->
       <!-- Uncomment below if you prefer to use an image logo -->
       <a class="navbar-brand" href="/">
        @foreach ($logo as $item)
            <img alt="/" class="logonav me-auto img-fluid" src="{{ asset('storage/'. $item->logo ) }}" alt="Logo">
        @endforeach

        <span class="logo logoa">Warung Koloni</span>
      </a>


      <nav id="navbar" class="navbar ms-auto">
        <ul>
            <li>
              <a href="/" class="{{request()->is('/') ? 'active' : ''}}">Home</a>
            </li>
                <li class="dropdown">
                    <a href="#"><span>Warung</span><i class="bi bi-chevron-down"></i></a>
            <ul>
            @foreach ($pendaftaran as $item)
                <li>
                    <a href="{{ $item->link }}">Pendaftaran</a>
                </li>
            @endforeach
            <li><a href="{{ route('daftar-anggota') }}" class="{{request()->is('daftar-anggota') ? 'active' : ''}}">Anggota</a></li>
            <li><a href="{{ route('blog') }}" class="{{request()->is('blog') ? 'active' : ''}}">Blog</a></li>
            </ul>
          </li>
          <li><a href="{{ route('jadwal-pertandingan-latihan') }}" class="{{request()->is('jadwal-pertandingan-latihan') ? 'active' : ''}}">Koloni</a></li>
          <li><a href="{{ route('galeri') }}" class="{{request()->is('galeri') ? 'active' : ''}}">Galeri</a></li>
          <li><a href="{{ route('about') }}" class="{{request()->is('about') ? 'active' : ''}}">About Us</a></li>
          <li><a href="{{ route('store') }}" class="{{ request()->is('store') ? 'active' : '' }}">Store</a></li>
          @if (Route::has('login'))
          <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
              @auth
                  <a href="{{ route('dashboard') }}" class="getstarted">Dashboard</a>
              @else
                  <a href="{{ route('login') }}" class="getstarted">Log in</a>
              @endauth
          </div>
      @endif

          {{-- <li><a href="{{ route('login') }}" class="getstarted">Login</a></li> --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
