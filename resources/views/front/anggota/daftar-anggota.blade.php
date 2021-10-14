@extends('layouts.front')

@section('title', 'Daftar Anggota')

@section('content')



   <!-- ======= Breadcrumbs ======= -->
   <section id="breadcrumbs" class="breadcrumbs">
    <div class="container pt-5">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Anggota</h2>
        <ol>
          <li><a href="/">Home</a></li>
          <li>Anggota</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Team Section ======= -->
  <section id="team" class="team ">
    <div class="container">

      <div class="row">


        @foreach ($anggota as $item)
        <div class="col-lg-6 mt-4">
            <div class="member mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="{{asset('storage/'. $item->foto_anggota)}}" class="img-fluid rounded-circle anggotaimg" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body anggotatext">
                    <h5 class="card-title judul">{{ $item->nama }}</h5>
                    <p class="card-text judul">{{ $item->jabatan }}</p>
                    <p class="card-text">{{ $item->body }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach



      </div>

    </div>
  </section><!-- End Team Section -->

</main><!-- End #main -->



@endsection
