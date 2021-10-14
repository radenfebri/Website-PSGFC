@extends('layouts.master')

@section('title', 'Edit Anggota')

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
						<div class="card-title">Create Anggota</div>
                        <a href="{{ route('anggota.index') }}" class="btn btn-warning btn-sm ml-auto">Back</a>
 					</div>
				</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('anggota.update', $anggotas->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Anggota</label>
                            <input type="text" name="nama" class="form-control" value="{{ $anggotas->nama }}" id="text" placeholder="Enter Nama Anggota">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" id="text" value="{{ $anggotas->jabatan }}" placeholder="Enter Jabatan Anggota">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="body" id="text" class="form-control"  placeholder="Isi dengan biodata anda">{{ $anggotas->body }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto Anggota</label>
                            <input type="file" name="foto_anggota" class="form-control"></input>
                            <br>
                            <label for="gambar">Foto Saat Ini</label><br>
                            <img src="{{ asset('storage/'. $anggotas->foto_anggota) }}" width="100">
                        </div>
                        <div class="form-group">
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
