@extends('layouts.master')

@section('title', 'Edit Profile')

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
						<div class="card-title">Edit Profile</div>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
 					</div>
				</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update', Auth::user()->id ) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="required col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('email', Auth::user()->name) }}" >
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="required col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', Auth::user()->email) }}" >

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label for="facebook" class="required col-md-4 col-form-label text-md-right">Facebook</label>
                                <div class="col-md-6">
                                    <input id="facebook" type="text" class="form-control name="facebook" value="{{ old('facebook', Auth::user()->facebook) }}" placeholder="https://facebookk.com/contoh">
                                </div>
                            </div> --}}
                            {{-- <div class="form-group row">
                                <label for="instagram" class="required col-md-4 col-form-label text-md-right">Instagram</label>
                                <div class="col-md-6">
                                    <input id="instagram" type="text" class="form-control name="instagram" value="{{ old('instagram', Auth::user()->instagram) }}" placeholder="https://instagram.com/contoh">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="twitter" class="required col-md-4 col-form-label text-md-right">Twitter</label>
                                <div class="col-md-6">
                                    <input id="twitter" type="text" class="form-control name="twitter" value="{{ old('twitter', Auth::user()->twitter) }}" placeholder="https://twitter.com/contoh" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="wa" class="required col-md-4 col-form-label text-md-right">No.WhatsApp</label>
                                <div class="col-md-6">
                                    <input id="wa" type="text" class="form-control name="wa" value="{{ old('wa', Auth::user()->wa) }}" placeholder="08213624831">
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label for="foto" class="required col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="foto" class="form-control" >
                                    <br>
                                    <label for="foto">Gambar Saat Ini</label><br>
                                    <img src="{{ asset('storage/'. Auth::user()->foto) }}"width="50" height="50"  class="rounded-circle">

                                    @error('foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
</div>

@endsection
