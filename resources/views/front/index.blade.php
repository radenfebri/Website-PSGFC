@extends('layouts.front')

@section('title', 'Home')

@section('content')



  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">
        <!-- Slide  -->
        @php
            $i = 1;
        @endphp

        @foreach ($slide as $row)
        <div class="carousel-item {{ $i == '1' ? 'active' : '' }} ">
            @php
                $i++;
            @endphp
            <img src="{{ asset('storage/'. $row->gambar_slide ) }}" class="backgroundimg" alt="gambar_slide">
            <div class="carousel-container">
            <div class="container">
                <h2 class="animate_animated animate_fadeInDown">{{ $row->judul }}</span></h2>
                <p class="animate_animated animate_fadeInUp">{{ $row->body }}</p>
                <a href="{{ $row->link }}" class="btn-get-started animate_animated animate_fadeInUp scrollto">{{ $row->nama_button }}</a>
            </div>
            </div>
        </div>
        @endforeach

    </div>



      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
            @foreach ($logo as $item)
            <div class="col-lg-6">
                <img src="{{ asset('storage/'. $item->logo) }}" class="logosection" alt="">
              </div>
            @endforeach

          <div class="col-lg-6 pt-4 pt-lg-0 textabout">
              @foreach ($about as $item)
            <p>
              {!! $item->body !!}
            </p>
            @endforeach

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row justify-content-center">

        @foreach ($sponsor as $item)
          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <a href="{{ $item->link }}"><img src="{{ asset('storage/'. $item->logo ) }}" class="img-fluid" alt=""></a>
          </div>
        @endforeach


        </div>

      </div>
    </section>
    <!-- End Clients Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row portfolio-container">

            @foreach ($galeri as $row)
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                    <img src="{{ asset('storage/'. $row->gambar_galeri) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <div class="portfolio-links">
                        <a href="{{ asset('storage/'. $row->gambar_galeri) }}" data-gallery="portfolioGallery" class="portfolio-lightbox"><i class="bx bx-plus"></i></a>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach


        </div>

      </div>
    </section>
    <!-- End Portfolio Section -->

  </main>
  <!-- End #main -->



  @endsection
