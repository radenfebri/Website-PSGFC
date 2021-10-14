@extends('layouts.master')

@section('title', 'Create Jadwal')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>

			</div>
			<div class="ml-md-auto py-2 py-md-0">
			</div>
		</div>
	</div>
</div>

<div class="page-inner mt--5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Create Pertandingan</div>
                        <a href="{{ route('pertandingan.index') }}" class="btn btn-warning btn-sm ml-auto">Back</a>
 					</div>
				</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pertandingan.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="gambar">Gambar Team 1</label>
                            <input type="file" name="gambar_team1" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar Team 2</label>
                            <input type="file" name="gambar_team2" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label for="nama_team1">Nama Team 1</label>
                            <input type="text" name="nama_team1" class="form-control" id="nama_team1" placeholder="Enter Nama Team 1">
                        </div>
                        <div class="form-group">
                            <label for="nama_team1]2">Nama Team 2</label>
                            <input type="text" name="nama_team2" class="form-control" id="nama_team2" placeholder="Enter Nama Team 2">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_waktu">Jam & Tanggal</label>
                            <input type="datetime-local" name="tanggal_waktu" id="tanggal_waktu" class="form-control" required></input>
                        </div>
                        <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">Save</button>
                        <button class="btn btn-danger btn-sm" type="reset">Reset</button>
                        </div>
                    </form>
				</div>
            </div>
        </div>
</div>

@endsection
