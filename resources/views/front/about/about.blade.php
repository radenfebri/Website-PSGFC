@extends('layouts.front')

@section('title', 'About Us')

@section('content')


    
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container pt-5">

        <div class="d-flex justify-content-between align-items-center">
          <h2>About US</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>About US</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    @foreach ($about as $item)
    <section>
        <div class="container">
            <div class="tentang text-center">
                <h2>Tentang Kami</h2>
                <p>Warung Koloni</p>
            </div>
            <div class=" row textabout">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                <p>{!! $item->body !!}</p>
            </div>
            <div class="col-lg-2"></div>
            </div>
        </div>
    </section>
    <section id="services" class="services">
        <div class="container">

          <div class="text-center socialmedia" data-aos="fade-up">
            <h2>Follow Social Media Kami</h2>
            <p>Untuk mendapatkan informasi atau berita terbaru tentang kami</p>
          </div>
          <div class="row socialmedia">

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="bx bxl-youtube"></i></div>
                <h4 class="title"><a href="{{ $item->link_yt }}">Subscribe</a></h4>
                <p class="description">Subscribe channel youtube kami untuk mendapatkan notifikasi video baru tentang kami</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                <div class="icon"><i class="bx bxl-facebook"></i></div>
                <h4 class="title"><a href="{{ $item->link_fb }}">Follow</a></h4>
                <p class="description">Follow facebook kami untuk mendapatkan berita terbaru tentang kami</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                <div class="icon"><i class="bx bxl-whatsapp"></i></div>
                <h4 class="title"><a href="{{ $item->link_wa }}">Hubungi Kami</a></h4>
                <p class="description">Hubungi kami melalui whatsapp bila ada pertanyaan seputar PSG FC</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="bx bxl-instagram"></i></div>
                <h4 class="title"><a href="{{ $item->link_ig }}">Subscribe</a></h4>
                <p class="description">Follow instagram kami agar mendapatkan informasi baru tentang kami</p>
              </div>
            </div>


        </div>
      </section><!-- End Services Section -->
      <section>
        <div class="container">

          <div class="text-center textvideo" data-aos="fade-up">
            <h2>Warung Koloni</h2>
            <p>Subscribe channel Warung Koloni</p>
          </div>

          <div class="video text-center">
            <iframe width="560" height="315" src="{{ $item->link_embed }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>

        </div>
      </section>
      @endforeach



@endsection
