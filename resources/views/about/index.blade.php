@extends('layouts.master')

@section('title', 'About')

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
						<div class="card-title">About</div>
 					</div>
				</div>
                <div class="card-body">
                    @forelse ($abouts as  $row)
                    <form method="POST" action="{{ route('about.update', $row ) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="link_fb">link Facebook</label>
                                <input type="text" name="link_fb" value="{{ $row->link_fb }}" class="form-control" placeholder="Enter link Facebook">
                            </div>
                            <div class="form-group">
                                <label for="link_yt">link YouTube</label>
                                <input type="text" name="link_yt" value="{{ $row->link_yt }}" class="form-control" placeholder="Enter link YouTube">
                            </div>
                            <div class="form-group">
                                <label for="link_wa">link WhatsApp</label>
                                <input type="text" name="link_wa" value="{{ $row->link_wa }}" class="form-control" placeholder="Enter link WhatsApp">
                            </div>
                            <div class="form-group">
                                <label for="link_ig">link WhatsApp</label>
                                <input type="text" name="link_ig" value="{{ $row->link_ig }}" class="form-control" placeholder="Enter link WhatsApp">
                            </div>
                            <div class="form-group">
                                <label for="link_embed">link Embed YouTube</label>
                                <input type="text" name="link_embed" value="{{ $row->link_embed }}" class="form-control" placeholder="Enter link WhatsApp">
                            </div>
                            <div class="form-group">
                                <label for="body">Deskripsi</label>
                                <textarea name="body" id="editor1" class="form-control" >{{ $row->body }}</textarea>
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
