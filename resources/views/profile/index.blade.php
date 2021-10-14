@extends('layouts.master')

@section('title', 'My Profile')

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
						<div class="card-title">My Profile</div>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
 					</div>
				</div>
                    <div class="card-body">
                        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                            <div class="card p-4">
                                <div class=" image d-flex flex-column justify-content-center align-items-center">
                                    <img src="{{ asset('storage/'. Auth::user()->foto) }}" height="200" width="200" />
                                </button>
                                <span class="name mt-3"><b>{{ Auth::user()->name }}</b>
                                    @if(Auth::check() && !Auth::user()->email_verified_at)
                                        <i class="fas fa-user-check"></i>
                                    @else
                                        <i class="fas fa-user-check"></i>
                                    @endif
                                </span>

                                <span class="idd">{{ Auth::user()->email }}</span>
                                <br>
                                    <div class=" d-flex mt-2">
                                        <a href="{{ route('profile.edit', Auth::user()->id) }}" class="btn btn-primary btn-sm">Edit Profile</a>
                                    </div>
                                    <br>
                                    {{-- <div class="text mt-3">
                                        <a href="" class="btn btn-secondary btn-sm"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{ Auth::user()->instagram }}" class="btn btn-secondary btn-sm"><i class="fab fa-instagram"></i></a>
                                        <a href="" class="btn btn-secondary btn-sm"><i class="fab fa-twitter"></i></a>
                                        <a href="" class="btn btn-secondary btn-sm"><i class="fab fa-whatsapp"></i></a>
                                    <div class=" px-2 rounded mt-4 date "> --}}
                                        <span class="join">Join, {{ Auth::user()->created_at->format('d F Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
</div>

@endsection
