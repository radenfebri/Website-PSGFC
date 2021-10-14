@extends('layouts.master')

@section('title', 'Create Slide')

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
						<div class="card-title">Create Slide</div>
                        <a href="{{ route('slide.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
 					</div>
				</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('slide.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="body">Deskripsi</label>
                                <input type="text" name="body" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar Slide</label>
                                <input type="file" name="gambar_slide" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="nama_button">Nama Button</label>
                                <input type="text" name="nama_button" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" >
                                    <option value="1">Publish</option>
                                    <option value="0">Draft</option>
                                </select>
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
