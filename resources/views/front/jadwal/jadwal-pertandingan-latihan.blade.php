@extends('layouts.front')

@section('title', 'Jadwal')

@section('content')



<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container pt-5">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Jadwal</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>Jadwal</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- Jadwal Section -->
    <section id="jadwal-pertandingan" class="jadwal">
        <div class="container table-responsive">
            <h3 class="jadwal">Jadwal Pertandingan</h3>
            <table class="table table-striped table-hover">
                <thead>
                  <tr class="">
                    <th scope="col"></th>
                    <th scope="col">Team</th>
                    <th scope="col"></th>
                    <th scope="col">Team</th>
                    <th scope="col"></th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($pertandingan as $item)
                    <tr>
                        <td><img src="{{ asset('storage/'. $item->gambar_team1) }}" alt="" class="jadwallogo"></td>
                        <td class="listjadwal">{{ $item->nama_team1 }}</td>
                        <td>Vs</td>
                        <td>{{ $item->nama_team2 }}</td>
                        <td><img src="{{ asset('storage/'. $item->gambar_team2) }}" class="jadwallogo" alt=""></td>
                        <td>{{date('d F Y',strtotime($item->tanggal_waktu))}}</td>
                        <td>{{date('H:i A',strtotime($item->tanggal_waktu))}}</td>
                    </tr>
                    @empty
                    <p>Data Pertandingan Kosong</p>
                    @endforelse

                </tbody>
              </table>
        </div>
    </section>

    <!-- Jadwal Latihan Section -->
<section id="jadwal-latihan" class="jadwal">
    <div class="container jadwallatihan table-responsive">
        <h3 class="jadwal">Jadwal Latihan</h3>
        <table class="table table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tempat</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($latihan as $index => $item)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $item->tempat }}</td>
                    <td>{{date('d F Y',strtotime($item->tanggal_waktu))}}</td>
                    <td>{{date('H:i A',strtotime($item->tanggal_waktu))}}</td>
                </tr>
                @empty
                <p>Data Latihan masih Kosong</p>
                @endforelse

            </tbody>
          </table>
    </div>


</section>

    </main>



@endsection
