@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')


    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                  {{-- <img src="{{ asset('image/login.png') }}" alt="" class="loginimage"> --}}
                </div>
                <div class="col-lg-6 mt-5 pt-4">
                    <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-3 form-group">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input id="email" type="email" readonly class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="mb-3 form-group">
                      <label for="exampleInputPassword1" class="form-label">New Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="confirm-password" class="form-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                  </form>
                </div>
            </div>
        </div>
    </section>


@endsection
