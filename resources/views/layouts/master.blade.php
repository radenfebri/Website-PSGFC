
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Halaman | @yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('template') }}/img/icon.ico" type="image/x-icon"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	<!-- Fonts and icons -->
	<script src="{{ asset('template') }}/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset('template') }}/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
    <link rel="stylesheet" href="sweetalert2.min.css">
	<link rel="stylesheet" href="{{ asset('template') }}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('template') }}/css/atlantis.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('template') }}/css/demo.css">
</head>
<body>

	<div class="wrapper">

        @include('includes.header')

		<!-- Sidebar -->
        @include('includes.sidebar')

		<!-- End Sidebar -->


		<div class="main-panel">

			<div class="content">
                @if (session('resent'))
                <main class="py-4">
                        <div class="row">
                            <div class="col-md">
                                <div class="alert alert-success text-center" role="alert">
                                    {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                                </div>
                            </div>
                        </div>
                </main>
                @endif


                @yield('content')



			</div>

            {{-- @include('includes.footer') --}}

		</div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
    @include('includes.js')
    @include('sweetalert::alert')
</body>
</html>
