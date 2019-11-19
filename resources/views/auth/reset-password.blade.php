<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password - Pelaporan Kerja Lapangan</title>
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
	<link rel="shortcut icon" href="https://www.nakulasadewa.com/wp-content/uploads/2017/08/KiosK-Mesin-Antrian.png" type="image/x-icon">
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
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="POST" class="login100-form validate-form" action="{{ route('reset') }}"id="validate-form" data-parsley-validate
						data-parsley-errors-messages-disabled>
					@csrf
                    <input type="hidden" name="token" value="{{ $token }}">
					<span class="login100-form-title p-b-48">
						<img class="img-brand" src="{{asset('img/logo-nakulaSadewa.png')}}"></img>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "format email salah">
							<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" autocomplete="off" value="{{$email ?? old('email') }}">
							<span class="focus-input100" data-placeholder="Email"></span>
						</div>
					
						@error('email')
						<div class="error-msg p-b-20">
							<i class="fas fa-exclamation-circle"></i>
							<span>{{$message}}</span>
						</div>
						@enderror
					
					<div class="wrap-input100 validate-input" data-validate = "Kolom tidak boleh kosong">
							<span class="btn-show-pass">
									<i class="zmdi zmdi-eye"></i>
							</span>
							<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" autocomplete="off">
							<span class="focus-input100" data-placeholder="Password Baru"></span>							
						</div>
						
						@error('password')
						<div class="error-msg p-b-20">
							<i class="fas fa-exclamation-circle"></i>
							<span>{{$message}}</span>
						</div>
						@enderror
					
					<div class="wrap-input100 validate-input" data-validate = "Kolom tidak boleh kosong">
							<span class="btn-show-pass">
									<i class="zmdi zmdi-eye"></i>
							</span>
							<input class="input100 @error('password') is-invalid @enderror" type="password" name="password_confirmation" autocomplete="off">
							<span class="focus-input100" data-placeholder="Ulangi Password"></span>
						</div>
						@error('password_confirmation')
						<div class="error-msg p-b-20">
							<i class="fas fa-exclamation-circle"></i>
							<span>{{$message}}</span>
						</div>
						@enderror

							
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button	class="login100-form-btn">
								Reset Password
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	<script>
		// See Docs
		window.ParsleyConfig = {
			successClass: 'info-success'
			, errorClass: 'alert-validate'
			, classHandler: function (el) {
				return el.$element.parent();
			}
		};
	</script>
<!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    <!-- Load jQuery -->
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
	<script type="text/javascript" src="{{asset('demo/demo-reset-password.js')}}"></script>

</body>
</html>