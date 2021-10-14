@extends('layouts.master')

@section('title', 'Edit Iklan')

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
						<div class="card-title">Iklan</div>
                        <a href="{{ route('iklan.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
 					</div>
				</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('iklan.update', $iklan->id ) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="judul">Judul Iklan</label>
                            <input type="text" name="judul" class="form-control" id="text" value="{{ $iklan->judul }}">
                        </div>
                        <div class="form-group">
                            <label for="judul">Link Iklan</label>
                            <input type="text" name="link" class="form-control" id="text" value="{{ $iklan->link }}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" >
                                <option value="1" {{ $iklan->status == '1' ? 'selected' : '' }}>Publish</option>
                                <option value="0" {{ $iklan->status == '0' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar Iklan</label>
                            <input type="file" name="gambar_iklan" class="form-control" >
                            <br>
                            <label for="gambar">Gambar Saat Ini</label><br>
                            <img src="{{ asset('storage/'. $iklan->gambar_iklan) }}" width="100">
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
