@extends('layouts.app')

@section('title', 'Verifikasi')

@section('content')


<center>
    <div class="col-lg-6">
        <img src="{{ asset('image/register.png') }}" alt="" class="loginimage">
    </div>
</center>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    {{ __('Silahkan Verifikasi Email anda') }}

                    <div>
                        {{ Auth::user()->email }}
                    </div>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </div>
                    @endif

                    {{ __('Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi,') }}
                    {{ __('Jika Anda tidak menerima email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Klik disini untuk memverifikasi') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
