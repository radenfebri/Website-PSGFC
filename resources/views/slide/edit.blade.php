@extends('layouts.master')

@section('title', 'Edit Slide')

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
						<div class="card-title">Edit Slide</div>
                        <a href="{{ route('slide.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
 					</div>
				</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('slide.update', $slides->id ) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" value="{{ $slides->judul }}" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="body">Deskripsi</label>
                                <input type="text" name="body" value="{{ $slides->body }}" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" value="{{ $slides->link }}" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar Slide</label>
                                <input type="file" name="gambar_slide" class="form-control" >
                                <br>
                                <label for="gambar">Gambar Saat ini</label><br>
                                <img src="{{ asset('storage/'.$slides->gambar_slide) }}" width="100" >
                            </div>
                            <div class="form-group">
                                <label for="nama_button">Nama Button</label>
                                <input type="text" name="nama_button" value="{{ $slides->nama_button }}" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" >
                                    <option value="1" {{ $slides->status == '1' ? 'selected' : '' }}>Publish</option>
                                    <option value="0" {{ $slides->status == '0' ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
</div>

@endsection
