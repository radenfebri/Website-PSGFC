@extends('layouts.front')

@section('title', 'Store')

@section('content')



<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container pt-5">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Store</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>Store</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section class="team">
        <div class="container">
            <div class="barang">
            <div class="row">
                @foreach ($store as $item)
                <div class="col-lg-4 mt-5">
                    <div class="card member" style="width: 100%;">
                        <img src="{{ asset('storage/'. $item->gambar_store) }}" class="card-img-top storeimg" alt="...">
                        <br>
                        <p><b>{{ $item->judul }}</b></p>
                        <div class="card-body">
                          <p class="card-text">{{ $item->body }}.</p>
                          <a href="{{ $item->link }}" class="btn btn-primary text-align-center mt-4">Pesan</a>
                        </div>
                      </div>
                </div>
                @endforeach
            </div>
        </div>

        </div>
    </section>




@endsection
