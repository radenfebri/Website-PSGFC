@extends('layouts.master')

@section('title', 'Edit Store')

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
						<div class="card-title">Judul Store</div>
                        <a href="{{ route('store.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
 					</div>
				</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store.update', $stores->id ) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="judul">Judul Store</label>
                            <input type="text" name="judul" class="form-control" id="text" value="{{ $stores->judul }}">
                        </div>
                        <div class="form-group">
                            <label for="judul">Link Stores</label>
                            <input type="text" name="link" class="form-control" id="text" value="{{ $stores->link }}">
                        </div>
                        <div class="form-group">
                            <label for="body">Deskripsi Produk</label>
                            <textarea type="text" name="body" class="form-control" id="text">{{ $stores->body }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar Store</label>
                            <input type="file" name="gambar_store" class="form-control" >
                            <br>
                            <label for="gambar">Gambar Saat Ini</label><br>
                            <img src="{{ asset('storage/'. $stores->gambar_store) }}" width="100">
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
