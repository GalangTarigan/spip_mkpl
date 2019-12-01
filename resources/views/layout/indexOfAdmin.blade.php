<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name="csrf-token" content="{{csrf_token()}}"/>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="description" content="Avenger Admin Theme">

	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

	<link rel="shortcut icon" href="https://www.nakulasadewa.com/wp-content/uploads/2017/08/KiosK-Mesin-Antrian.png" type="image/x-icon">
	<link type="text/css" href="{{asset('fonts/font-awesome/css/all.css')}}" rel="stylesheet">
	<!-- Font Awesome -->

	<link rel="stylesheet" type="text/css" href="{{asset('fonts/iconic/css/material-design-iconic-font.min.css')}}">
	<!-- Font Iconic-->
	
	<link type="text/css" href="{{asset('css/styles.css')}}" rel="stylesheet"> <!-- Core CSS with all styles -->

	<link type="text/css" href="{{asset('plugins/jstree/dist/themes/avenger/style.min.css')}}" rel="stylesheet">
	<!-- jsTree -->
	<link type="text/css" href="{{asset('plugins/codeprettifier/prettify.css')}}" rel="stylesheet">
	<!-- Code Prettifier -->
	<script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!}
    </script>
    @if(!auth()->guest())
        <script>
            window.Laravel.userId = {!! auth()->user()->id !!}
        </script>
    @endif
	@yield('css')
	<title>Laravel</title>

</head>

<body class="infobar-overlay">
	<input id="id-admin" type="hidden" value="{{Auth::user()->id}}">
	<header id="topnav" class="navbar navbar-default navbar-fixed-top clearfix" role="banner">

		<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
			<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar"><span class="icon-bg"><i
						class="fa fa-fw fa-bars"></i></span></a>
		</span>

		<a class="navbar-brand" href="/">Avenger</a>

		<ul class="nav navbar-nav toolbar pull-right">
		<li  class="dropdown toolbar-icon-bg">
						<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i data-count="0	" class="fa fa-fw fa-bell"></i></span><span class="notif-count badge badge-info"></span></a>
						<div class="dropdown-menu dropdown-alternate notifications arrow">
							<div class="dd-header">
								<span>Notifikasi</span>
							</div>
							<div class="scrollthis scroll-pane">
								<ul id="notificationsWrapper" class="scroll-content">
								</ul>
							</div>
							<div class="dd-footer">
								<a href="{{route('notifikasiAdmin')}}">Lihat Semua Notifikasi</a>
							</div>
						</div>
					</li>

				<li class="dropdown toolbar-icon-bg" style="padding-right: 8px;">
						<a href="" class="dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i
									class="fas fa-fw fa-user"></i></span></a>
						<ul class="dropdown-menu userinfo arrow">
							<li><a href="{{route('profileAdmin')}}"><span class="pull-left">Profil</span> <i class="pull-right fa fa-user"></i></a>
							</li>
					<li class="divider"></li>
							<li><a href="{{route('gantiPassword')}}"><span class="pull-left">Ganti Password</span> <i class="pull-right fas fa-unlock-alt"></i></a>
							</li>
							
					<li class="divider"></li>
					<li><a href="{{route('logoutAdmin') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="pull-left">Keluar</span>
						 			<i class="pull-right fa fa-sign-out-alt"></i></a>
								<form id="logout-form" action="{{route('logoutAdmin')}}" method="POST" style="display: none;">
									@csrf
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
											<a href="{{route('profileAdmin')}}">
												<div class="img-circular-small" style="background-image: url({{ asset('storage/'.Auth::user()->photo) }})"></div>
											</a>	
											@else
											<a href="/profile">
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
									<li class="nav-separator"></li>
									<li><a href="{{route('dashboardAdmin')}}"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
									<li class="nav-separator">Proyek</li>
									<li><a href="{{route('daftar-proyek-instalasi-admin')}}"><i class="fa fa-tasks"></i><span>Daftar Proyek Instalasi</span></a></li>
									<li><a href="{{route('tambah-instansi-form')}}"><i class="far fa-building"></i><span>Instansi</span></a></a></li>
									</li>
									<li><a href="{{route('listKeluhan')}}"><i class="fab fa-teamspeak"></i><span>Keluhan</span></a>
									</li>
									<li class="nav-separator"></li>
									<li><a href="javascript:;"><i class="fa fa-chart-line"></i><span>Statistik</span><span class="badge badge-primary"></span></a>
                                        <ul class="acc-menu">
										<li><a href="{{route('proyek')}}">Proyek</a></li>
										<li><a href="{{route('teknisi')}}">Teknisi</a></li>
										<li><a href="{{route('keluhan-proyek')}}">Keluhan Proyek</a></li>
                                        </ul>
										</li>
									<li class="nav-separator">Manajemen</li>
                                    <li><a href="javascript:;"><i class="fa fa-users"></i><span>Teknisi</span><span class="badge badge-primary"></span></a>
                                    <ul class="acc-menu">
									<li><a href="{{route('daftar-teknisi')}}">Daftar Teknisi</a></li>
									<li><a href="{{route('formAddTeknisi')}}">Tambah Teknisi</a></li>
									</ul>
									</li>
									<li><a href="{{route('list-kategori')}}"><i class="fa fa-tasks"></i>Kategori Instansi</a></li>
									<li><a href="{{route('subjek-keluhan')}}"><i class="far fa-sun"></i>Subject Keluhan</a></li>
									<li class="nav-separator">Akun</li>
									<li><a href="{{route('profileAdmin')}}"><i class="fa fa-user"></i><span>Profil</span></a></li>
									<li><a href="{{route('gantiPasswordAdmin')}}"><i class="fas fa-unlock-alt"></i><span>Ganti Password</span></a></li>
									<li><a href="{{route('notifikasiAdmin')}}"><i class="far fa-bell"></i><span>Notifikasi</span></a></li>
									<li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt"></i><span>Keluar</span></a>
										<form id="logout-form" action="{{route('logoutAdmin')}}" method="POST" style="display: none;">
											@csrf
										</form>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="static-content-wrapper">
				@yield('content')
				<footer role="contentinfo">
					<div class="clearfix">
						<ul class="list-unstyled list-inline pull-left">
							<li>
								<h6 style="margin: 0;"> &copy; 2019 NAKULA SADEWA</h6>
							</li>
						</ul>
						<button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i
								class="fa fa-arrow-up"></i></button>
					</div>
				</footer>
			</div>
		</div>
	</div>
	<!-- Load site level scripts -->
	<script type="text/javascript" src="{{asset('js/jquery-3.4.1.js')}}"></script>		<!-- Load jQuery -->
	<script type="text/javascript" src="{{asset('js/jquery-ui.js')}}"></script> 	<!-- Load jQueryUI -->
    <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script> 		<!-- Load Bootstrap -->
	<script type="text/javascript" src="{{asset('plugins/jstree/dist/jstree.min.js')}}"></script>		 <!-- jsTree -->
	<script type="text/javascript" src="{{asset('plugins/codeprettifier/prettify.js')}}"></script>		<!-- Code Prettifier  -->
	<script type="text/javascript" src="{{asset('plugins/bootstrap-switch/bootstrap-switch.js')}}"></script>	<!-- Swith/Toggle Button -->
	<script type="text/javascript" src="{{asset('plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js')}}"></script>	<!-- Bootstrap Tabdrop -->
	<script type="text/javascript" src="{{asset('js/enquire.min.js')}}"></script>		 <!-- Enquire for Responsiveness -->
	<script type="text/javascript" src="{{asset('plugins/bootbox/bootbox.js')}}"></script> 		<!-- Bootbox -->
	<script type="text/javascript" src="{{asset('plugins/nanoScroller/js/jquery.nanoscroller.min.js')}}"></script>		<!-- nano scroller for multiple level-->
	<script type="text/javascript" src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.min.js')}}"></script>	<!-- Mousewheel support needed for jScrollPane -->
	<script type="text/javascript" src="{{asset('js/application.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
	<!--notifications prequisite script-->
	<script type="text/javascript" src="{{ asset('demo/notifications-alert-admin.js') }}"></script>
	<!-- notifications -->
	<script type="text/javascript" src="{{ asset('js/sweetalert2.all.js') }}"></script>
	<script type="text/javascript" src="{{asset('plugins/moment/moment-with-locales.js')}}"></script>
	<!--Moment JS-->							
	@yield('script')

	

</body>

</html>