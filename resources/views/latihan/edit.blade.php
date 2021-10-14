@extends('layouts.master')

@section('title', 'Edit Jadwal')

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
						<div class="card-title">Edit Latihan</div>
                        <a href="{{ route('latihan.index') }}" class="btn btn-warning btn-sm ml-auto">Back</a>
 					</div>
				</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('latihan.update', $latihans->id ) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="tempat">Tempat</label>
                            <input type="text" name="tempat" class="form-control" id="tempat" value="{{ $latihans->tempat }}" placeholder="Enter Tempat Latihan">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_waktu">Jam & Tanggal</label>
                            <input type="datetime-local" name="tanggal_waktu" id="tanggal_waktu" value="{{ $latihans->tanggal_waktu }}" class="form-control" required></input>
                        </div>
                        <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">Save</button>
                        </div>
                    </form>
				</div>
            </div>
        </div>
</div>

@endsection
