@extends('layouts.master')

@section('title', 'Dashboard')

@section('Dashboard', 'active')


@section('content')

<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white op-2 fw-bold">

                    <?php
                    //ubah timezone menjadi jakarta
                    date_default_timezone_set("Asia/Jakarta");

                    //ambil jam dan menit
                    $jam = date('H:i');

                    //ambil nama
                    $user_name = Auth::user()->name;

                    //atur salam menggunakan IF
                    if ($jam > '05:30' && $jam < '10:00') {
                        $salam = 'Selamat Pagi';
                    } elseif ($jam >= '10:00' && $jam < '15:00') {
                        $salam = 'Selamat Siang';
                    } elseif ($jam < '18:00') {
                        $salam = 'Selamat Sore';
                    } else {
                        $salam = 'Selamat Malam';
                    }

                    //tampilkan pesan
                    echo $salam.', '.$user_name;

                    ?>
                </h2>

			</div>
			<div class="ml-md-auto py-2 py-md-0">
				{{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
				<a href="#" class="btn btn-secondary btn-round">Add Customer</a> --}}
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body ">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-primary bubble-shadow-small">
								<i class="fas fa-users"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category"><b>Total User</b></p>
								<h4 class="card-title">{{ Auth::user()->count() }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-info bubble-shadow-small">
								<i class="far fa-newspaper"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category"><b>Blog Artikel</b></p>
								<h4 class="card-title">{{ $blogs->count() }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-success bubble-shadow-small">
								<i class="fas fa-photo-video"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category"><b>Galeri</b></p>
								<h4 class="card-title">{{ $galeris->count() }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-secondary bubble-shadow-small">
								<i class="fas fa-calendar-alt"></i>

							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category"><b>Jadwal Pertandingan</b></p>
								<h4 class="card-title">{{ $pertandingans->count() }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title"><b>TanggL & Waktu</b></div>
					</div>
				</div>
				<div class="card-body">
                    <br>
                    <br>
                    <br>
                    <b>
                        <center>
                            <?php
                            echo date('d F Y | H:i:A');
                            echo "<br/>";
                            ?>
                        </center>
                    </b>

				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title"><b>Produk Terbaru</b></div>
					</div>
				</div>
				<div class="card-body">
                    @foreach ($stores as $row)
                    <center>
                        <label class="center"><b>{{ $row->judul }}</b></label>
                        <br>
                        <img src="{{ asset('storage/'. $row->gambar_store) }}" width="100px" class="mr-3"  alt="..." >
                        <br>
                        <p>
                            Apabila anda berminat dengan gambar ini, anda bisa langsung klik link dibawah ini, atau langsung
                            <a href="{{ $row->link }}" class="read-more" style="text-decoration:  none">Kunjungi</a>
                        </p>
                    </center>
                    @endforeach
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title"><b>Iklan Terbaru</b></div>
					</div>
				</div>
				<div class="card-body">
                    @foreach ($iklans as $row)
                    <center>
                        <label class="center"><b>{{ $row->judul }}</b></label>
                        <br>
                        <img src="{{ asset('storage/'. $row->gambar_iklan) }}" width="100px" class="mr-3"  alt="..." >
                        <br>
                        <p>
                            Apabila anda berminat dengan iklan ini, anda bisa langsung klik link dibawah ini, atau langsung
                            <a href="{{ $row->link }}" class="read-more" style="text-decoration:  none">Kunjungi</a>
                        </p>
                    </center>
                    @endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title"><b>Artikel Terbaru</b></div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
                        <div class="row">
                            @foreach ($postinganTerbaru as $row)
                                <div class="col-md-4">
                                    <div class="card full-height">
                                        <div class="card-header">
                                            <div class="card-head-row">
                                                <div class="card-title">{{ $row->judul }}</div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{ asset('storage/'. $row->gambar_artikel) }}" width="70px" class="mr-3" alt="...">
                                            <p>
                                                {!! \Illuminate\Support\Str::words($row->body, 10,'....') !!}
                                            </p>
                                            <a href="{{ route('detail', $row->slug ) }}" class="read-more" style="text-decoration:  none">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection
