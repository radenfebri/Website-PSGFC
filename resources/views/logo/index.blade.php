@extends('layouts.master')

@section('title', 'Logo')

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
						<div class="card-title">Logo</div>
 					</div>
				</div>
                <div class="card-body">
                    @forelse ($logos as  $row)
                    <form method="POST" action="{{ route('logo.update', $row ) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" class="form-control" >
                                <br>
                                <label for="gambar">Logo Saat Ini</label><br>
                                <img src="{{ asset('storage/'. $row->logo) }}" width="100">
                            </div>
                            @can('edit')
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                </div>
                            @endcan

                        @endforeach
                    </form>
				</div>
            </div>
        </div>
</div>

@endsection
