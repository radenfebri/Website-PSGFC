@extends('layouts.app')

@section('title', 'Login')

@section('content')


    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                  {{-- <img src="{{ asset('image/login.png') }}" alt="" class="loginimage"> --}}

                </div>
                <div class="col-lg-6 mt-5 pt-4">
                    <form method="POST" action="{{ route('login') }}">
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
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div>
                    <div class="mb-3">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a><span>
                        @endif
                         |
                        @if (Route::has('password.request'))
                            </span> <a href="{{ route('password.request') }}">Forgot Password</a>
                        @endif

                    </div>
                    <button type="submit" class="btn btn-primary">Masuk</button>
                  </form>
                </div>
            </div>
        </div>
    </section>


@endsection
