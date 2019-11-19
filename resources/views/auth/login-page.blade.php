<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - Pelaporan Kerja Lapangan</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-touch-fullscreen" content="yes" />
<!--===============================================================================================-->	
<!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
<!--===============================================================================================-->
	<link type="text/css" href="{{ asset('fonts/font-awesome/css/all.css') }}" rel="stylesheet" />
    <!-- Font Awesome -->

    <link rel="stylesheet" type="text/css" href="{{asset('fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!-- Font Iconic-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/login-util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/login-main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
			@if (session('success'))
			<div class="alert alert-dismissable alert-success">
				<small><span><i class="fa fa-fw fa-check"></i>&nbsp; <strong>Well done! </strong>Silahkan cek Email Anda! </span></small>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			</div>
			@elseif (session('error'))
			<div class="alert alert-dismissable alert-danger">
					<small><span><i class="fa fa-fw fa-exclamation-circle"></i>&nbsp; <strong>Error! </strong> {{ session('error') }}</span></small>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			</div>
			@endif
		<div class="container-login100">
			<div class="wrap-login100">
                <form method="POST" class="login100-form validate-form" action="{{ route('login') }}">
                    @csrf
					<span class="login100-form-title p-b-48">
						<img class="img-brand" src="{{asset('img/logo-nakulaSadewa.png')}}"></img>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" autocomplete="off" value="{{ old('email') }}">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100  @error('password') is-invalid @enderror" type="password" name="password" autocomplete="off">
						<span class="focus-input100" data-placeholder="Password"></span>
                    </div>
                    @error('email')
                    <div class="error-msg p-b-20">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>Email atau password anda salah</span>
                    </div>
                    @enderror
					<label class="container">Remember me
						<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
						<span class="checkmark"></span>
					</label>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button	class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-50">
						<span class="txt1">
							Lupa Password ?
						</span>

						<a class="txt2" href="{{route('password.request')}}">
							Reset
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    <!-- Load jQuery -->
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
	<script type="text/javascript" src="{{asset('demo/login-main.js')}}"></script>

</body>
</html>