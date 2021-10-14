@extends('layouts.master')

@section('title', 'Edit Sponsor')

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
						<div class="card-title">Edit Sponsor</div>
                        <a href="{{ route('sponsor.index') }}" class="btn btn-warning btn-sm ml-auto">Back</a>
 					</div>
				</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('sponsor.update', $sponsors->id ) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="logo">Gambar Sponsor</label>
                            <input type="file" name="logo" class="form-control"></input>
                            <br>
                            <label for="gambar">Gambar Saat Ini</label><br>
                            <img src="{{ asset('storage/'. $sponsors->logo) }}" width="100">
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" name="link" class="form-control" id="link" value="{{ $sponsors->link }}" placeholder="Enter Link">
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
