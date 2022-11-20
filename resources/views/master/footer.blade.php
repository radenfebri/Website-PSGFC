<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">


    @foreach ($footer as $item )
          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Warung Koloni</h3>
              <p>
                {{ $item->alamat }}
                <br><br>
                <strong>Phone:</strong> {{ $item->no_hp }}<br>
                <strong>Email:</strong> {{ $item->email }}<br>
              </p>
              <div class="social-links mt-3">
                <a href="{{ $item->link_fb }}" class=""><i class="bx bxl-facebook"></i></a>
                <a href="{{ $item->link_yt }}" class=""><i class="bx bxl-youtube"></i></a>
                <a href="{{ $item->link_wa }}" class=""><i class="bx bxl-whatsapp"></i></a>
                <a href="{{ $item->link_ig }}" class=""><i class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>
    @endforeach


          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Warung Koloni</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('jadwal-pertandingan-latihan') }}">Koloni</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('store') }}">Store</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('about') }}">About US</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Link Lainnya</h4>
            <ul>
                @foreach ($pendaftaran as $item)
                <li><i class="bx bx-chevron-right"></i> <a href="{{ $item->link}}">Media</a></li>
                @endforeach
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('daftar-anggota') }}">Anggota</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('jadwal-pertandingan-latihan') }}">Koloni</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('galeri') }}">Galeri</a></li>
            </ul>
          </div>
          @foreach ($logo as $item)
          <div class="col-lg-4 col-md-6 footer-links">
            <img src="{{ asset('storage/'. $item->logo) }}" class="logofooter" alt="">
          </div>
          @endforeach

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>PSG FC</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
      </div>
    </div>
    <!-- <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Sailor</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <! All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div> -->
  </footer>
