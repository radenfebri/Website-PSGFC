@extends('layouts.front')

@section('title', 'Galeri')

@section('content')



<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container pt-5">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Galeri</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>Galeri</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Galeri Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row portfolio-container">
            @foreach ($galeri as $item)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <img src="{{ asset('storage/'. $item->gambar_galeri) }}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <div class="portfolio-links">
                      <a href="{{ asset('storage/'. $item->gambar_galeri) }}" data-gallery="portfolioGallery" class="portfolio-lightbox"><i class="bx bx-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->



@endsection
