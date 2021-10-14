@extends('layouts.master')

@section('title', 'Blog Edit')

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
						<div class="card-title">Blog Site</div>
                        <a href="{{ route('blog.index') }}" class="btn btn-warning btn-sm ml-auto">Back</a>
 					</div>
				</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('blog.update', $blogs->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="judul">Judul Artikel</label>
                            <input type="text" name="judul" value="{{ $blogs->judul }}" class="form-control" placeholder="Enter Judul">
                        </div>
                        <div class="form-group">
                            <label for="body">Deskripsi</label>
                            <textarea name="body" id="editor1" class="form-control" >{{ $blogs->body }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="is_active" class="form-control" >
                                <option value="1" {{ $blogs->is_active == '1' ? 'selected' : '' }}>Publish</option>
                                <option value="0" {{ $blogs->is_active == '0' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar artikel</label>
                            <input type="file" name="gambar_artikel" class="form-control" >
                            <br>
                            <label for="gambar">Gambar Saat Ini</label><br>
                            <img src="{{ asset('storage/'. $blogs->gambar_artikel) }}" width="100">
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
