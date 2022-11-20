@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')


    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                  {{-- <img src="{{ asset('image/reset.png') }}" alt="" class="loginimage"> --}}

                </div>
                <div class="col-lg-6 mt-5 pt-5">
                    <br>
                    <br>
                    <br>
                    <br>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Password Reset Link</button>
                  </form>
                </div>
            </div>
        </div>
    </section>


@endsection
