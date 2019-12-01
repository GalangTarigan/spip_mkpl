<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-touch-fullscreen" content="yes" />
	<meta name="description" content="Avenger Admin Theme" />
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script>
		window.Laravel = {
			!!json_encode(['csrfToken' => csrf_token()]) !!
		}
	</script>
	@if(!auth()->guest())
	<script>
		window.Laravel.userId = {
			!!auth() - > user() - > id!!
		}
	</script>
	@endif
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

	<link rel="shortcut icon" href="https://www.nakulasadewa.com/wp-content/uploads/2017/08/KiosK-Mesin-Antrian.png" type="image/x-icon">

	<link type="text/css" href="{{ asset('fonts/font-awesome/css/all.css') }}" rel="stylesheet" />
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/iconic/css/material-design-iconic-font.min.css')}}">
	<!-- Font Iconic-->
	<link type="text/css" href="{{ asset('css/styles.css') }}" rel="stylesheet" />
	<!-- Core CSS with all styles -->

	<link type="text/css" href="{{
                asset('plugins/jstree/dist/themes/avenger/style.min.css')
            }}" rel="stylesheet" />
	<!-- jsTree -->
	<link type="text/css" href="{{ asset('plugins/codeprettifier/prettify.css') }}" rel="stylesheet" />
	<!-- Code Prettifier -->

	<link type="text/css" href="{{ asset('css/loading-bar.css') }}" rel="stylesheet" />
	@yield('css')
	<title>Laravel</title>
</head>


<body class="infobar-offcanvas infobar-overlay">
	<header id="topnav" class="navbar navbar-default navbar-fixed-top clearfix" role="banner">
		<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
			<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar"><span class="icon-bg"><i class="fas fa-fw fa-bars"></i></span></a>
		</span>

		<a class="navbar-brand" href="{{route('dashboard')}}">Nakula Sadewa</a>

		<div class="yamm navbar-left navbar-collapse collapse in"></div>
		<ul class="nav navbar-nav toolbar pull-right">
			<li class="dropdown toolbar-icon-bg">
				<a class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i data-count="0	" class="fa fa-fw fa-bell"></i></span><span class="notif-count badge badge-info"></span></a>
				<div class="dropdown-menu dropdown-alternate notifications arrow">
					<div class="dd-header">
						<span>Notifikasi</span>
					</div>
					<div class="scrollthis scroll-pane">
						<ul id="notificationsWrapper" class="scroll-content">
						</ul>
					</div>
					<div class="dd-footer">
						<a href="{{route('notifikasi')}}">Lihat Semua Notifikasi</a>
					</div>
				</div>
			</li>

			<li class="dropdown toolbar-icon-bg" style="padding-right: 8px;">
				<a href="{{ route('profile') }}" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-bg"><i class="fas fa-fw fa-user"></i></span></a>
				<ul class="dropdown-menu userinfo arrow">
					<li>
						<a href="{{ route('profile') }}"><span class="pull-left">Profil</span>
							<i class="pull-right far fa-user"></i></a>
					</li>
					<li class="divider"></li>
					<li><a href="{{route('gantiPassword')}}"><span class="pull-left">Ganti Password</span> <i class="pull-right fas fa-unlock-alt"></i></a>
					</li>

					<li class="divider"></li>
					<li>
						<a href="{{ route('logout') }}" onclick="event.preventDefault();
							$('#logout').submit();"><span class="pull-left">Keluar</span>
							<i class="pull-right fas fa-sign-out-alt"></i></a>
					</li>
				</ul>
			</li>
		</ul>

	</header>

	<div id="wrapper">
		<div id="layout-static">
			<div class="static-sidebar-wrapper sidebar-midnightblue">
				<div class="static-sidebar">
					<div class="sidebar">
						<div class="widget stay-on-collapse" id="widget-welcomebox">
							<div class="widget-body welcome-box tabular">
								<div class="tabular-row">
									<div class="tabular-cell welcome-avatar">
										@if(Auth::user()->photo)
										<a href="{{route('profile')}}">
											<div class="img-circular-small" style="background-image: url({{ asset('storage/'.Auth::user()->photo) }})"></div>
										</a>
										@else
										<a href="{{route('profile')}}">
											<div class="img-circular-small" style="background-image: url(http://placehold.it/300&text=Placeholder)"></div>
										</a>
										@endif
									</div>
									<div class="tabular-cell welcome-options">
										<span class="welcome-text">Welcome,</span>
										<a href="{{route('profile')}}" class="name">{{ Auth::user()->nama_lengkap }}</a>
									</div>
								</div>
							</div>
						</div>
						<div class="widget stay-on-collapse" id="widget-sidebar">
							<nav role="navigation" class="widget-body">
								<ul class="acc-menu">
									<li class="nav-separator">Jelajahi</li>
									<li>
										<a href="{{route('dashboard')}}"><i class="fas fa-home"></i><span>Dashboard</span></a>
									</li>
									<li>
										<a href="{{route('daftar-proyek-instalasi')}}"><i class="fa fa-tasks"></i><span>Daftar
												Proyek
												Instalasi</span></a>
									</li>
									<li class="nav-separator">
										Laporan Instalasi
									</li>
									<li>
										<a href="{{route('showFormInstalasi')}}"><i class="fa fa-file-signature"></i><span>Buat Laporan Baru</span></a>
									</li>
									<li>
										<a href="{{route('showFormBerkala')}}"><i class="fas fa-file-contract"></i><span>Buat Laporan
												Berkala</span></a>
									</li>
									<li>
										<a href="{{route('showFormTraining')}}"><i class="fa fa-chalkboard-teacher"></i><span>Laporan
												Training</span></a>
									</li>
									<li class="nav-separator">
										Laporan Keluhan
									</li>
									<li>
										<a href="/laporan-keluhan">
											<i class="fab fa-teamspeak"></i>
											<span>Buat Laporan Keluhan</span></a>
									</li>
									<li class="nav-separator">Akun</li>
									<li>
										<a href="{{route('profile')}}"><i class="fas fa-user-alt"></i><span>Profil</span></a>
									</li>
									<li>
											<a href="{{route('notifikasi')}}"><i class="far fa-bell"></i><span>Notifikasi</span></a>
										</li>

									<li><a href="{{route('gantiPassword')}}"><i class="fas fa-unlock-alt"></i><span>Ganti Password</span></a></li>
									<li>
										<a onclick="event.preventDefault();
										$('#logout').submit();"><i class="fas fa-sign-out-alt"></i><span>Keluar</span></a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
				<!--CSRF Field for logout-->
				<form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</div>
			<div class="static-content-wrapper">
				@yield('content')
				<footer role="contentinfo">
					<div class="clearfix">
						<ul class="list-unstyled list-inline pull-left">
							<li>
								<h6 style="margin: 0;">
									&copy; 2019 Nakula Sadewa
								</h6>
							</li>
						</ul>
						<button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top">
							<i class="fa fa-arrow-up"></i>
						</button>
					</div>
				</footer>
			</div>
		</div>
	</div>
	<!-- Load site level scripts -->
	<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.js') }}"></script>
	<!-- Load jQuery -->
	<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
	<!-- Load jQueryUI -->
	<script type="text/javascript" src="{{ asset('js/bootstrap (2).js') }}"></script>
	<!-- Load Bootstrap -->
	<script type="text/javascript" src="{{ asset('plugins/jstree/dist/jstree.min.js') }}"></script>
	<!-- jsTree -->
	<script type="text/javascript" src="{{ asset('plugins/codeprettifier/prettify.js') }}"></script>
	<!-- Code Prettifier  -->
	<script type="text/javascript" src="{{ asset('js/enquire.min.js') }}"></script>
	<!-- Enquire for Responsiveness -->
	<script type="text/javascript" src="{{ asset('plugins/bootbox/bootbox.js') }}"></script>
	<!-- Bootbox -->
	<script type="text/javascript" src="{{ asset('plugins/nanoScroller/js/jquery.nanoscroller.min.js')}}"></script>
	<!-- nano scroller -->
	<script type="text/javascript" src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.min.js')}}"></script>
	<!-- Mousewheel support needed for jScrollPane -->
	<script type="text/javascript" src="{{ asset('js/application.js') }}"></script>

	<script type="text/javascript" src="{{ asset('js/loading-bar.js') }}"></script>
	<!-- Loading bar -->

	<script type="text/javascript" src="{{ asset('js/sweetalert2.all.js') }}"></script>
	<!-- sweet alert -->

	<script type="text/javascript" src="{{asset('plugins/moment/moment-with-locales.js')}}"></script>
	<!--Moment JS-->


	<!-- End loading site level scripts -->
	@yield('script')
</body>

</html>