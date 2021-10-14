@extends('layouts.master')

@section('title', 'Change Password')

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
        @if (session('error'))
        <div class="aeler alet-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
                <div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Change Password</div>
                        <a href="{{ route('profile.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
 					</div>
				</div>
                <form method="POST" action="{{ route('password.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="current_password" class="required col-md-4 col-form-label text-md-right">Old Password</label>
                        <div class="col-md-6">
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" placeholder="Old Password" >
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="required col-md-4 col-form-label text-md-right">New Password</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="New Password">
                            @error('passwod')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password_confirmation" class="required col-md-4 col-form-label text-md-right">Confirm Password</label>
                        <div class="col-md-6">
                            <input id="password_confirmation" type="password" class="form-control @error('password_cofirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirm Password" >
                            @error('password_confirmation')
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
