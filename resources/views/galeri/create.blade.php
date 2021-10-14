@extends('layouts.master')

@section('title', 'Create Galeri')

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
						<div class="card-title">Gambar Galeri</div>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
 					</div>
				</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('galeri.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="gambar">Gambar Galeri</label>
                                <input type="file" name="gambar_galeri" class="form-control" >
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
