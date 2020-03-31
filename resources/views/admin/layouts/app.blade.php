<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Icasa</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{ asset('plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/style-responsive.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/theme/default.css') }}" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{ asset('plugins/jquery-jvectormap/jquery-jvectormap.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('plugins/pace/pace.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/favicon.ico/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/favicon.ico/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/favicon.ico/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/favicon.ico/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/favicon.ico/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicon.ico/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/favicon.ico/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/favicon.ico/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon.ico/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/favicon.ico/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.ico/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon.ico/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.ico/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon.ico/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('images/favicon.ico/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    @yield('css')
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="#" class="navbar-brand">
                        <span class="navbar-logo">
                            <img src="{{ asset('images/Logo.png') }}" alt="icasa_logo">
                        </span>
                        {{-- Icasa --}}
                    </a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->

				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="assets/img/user-13.jpg" alt="" />
							<span class="hidden-xs">{{ \Auth::user()->name }}</span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							{{-- <li><a href="javascript:;">Edit Profile</a></li>
							<li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
							<li><a href="javascript:;">Calendar</a></li>
							<li><a href="javascript:;">Setting</a></li>
							<li class="divider"></li> --}}
							<li><a href="{{ route('admin.logout') }}">Cerrar Sesión</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->

		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						{{-- <div class="image">
							<a href="javascript:;"><img src="assets/img/user-13.jpg" alt="" /></a>
						</div> --}}
						<div class="info">
							{{-- {{ \Auth::user()->name }} {{ \Auth::user()->last_name }} --}}
							{{-- <small>Front end developer</small> --}}
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
                    @if (\Auth::user()->isAn('admin'))
                        <li class="{{ $section == "clients" ? "active" : "" }}">
                            <a href="{{ route('clients.index') }}">
                                <i class="fa fa-user"></i> <span>Clientes</span>
                            </a>
                        </li>
                        <li class="{{ $section == "admin_projects" ? "active" : "" }}">
                            <a href="{{ route('admin_projects.index') }}">
                                <i class="fa fa-clipboard"></i> <span>Proyectos</span>
                            </a>
                        </li>
                        <li class="{{ $section == "variables" ? "active" : "" }}">
                            <a href="{{ route('variables.index') }}">
                                <i class="fa fa-money"></i> <span>Variables</span>
                            </a>
                        </li>
                    @endif
                    @if (\Auth::user()->isA('client'))
                        <li class="{{ $section == "projects" ? "active" : "" }}">
                            <a href="{{ route('projects.index') }}">
                                <i class="fa fa-clipboard"></i> <span>Proyectos</span>
                            </a>
                        </li>
                    @endif
                    {{-- @if(\Auth::user()->type_of_user == 1)
                        <li class="{{ $section == "posts" ? "active" : "" }}">
                            <a href="{{ route('post.index') }}">
                                <i class="fa fa-address-book"></i> <span>Posts</span>
                            </a>
                        </li>

                        <li class="{{ $section == "area" ? "active" : "" }}">
                            <a href="{{ route('area.index') }}">
                                <i class="fa fa-map"></i> <span>Areas</span>
                            </a>
                        </li>
                        <li class="{{ $section == "cupons" ? "active" : "" }}">
                            <a href="{{ route('payments.index') }}">
                                <i class="fa fa-money"></i> <span>Payments</span>
                            </a>
                        </li>
                    @endif
                    @if(\Auth::user()->type_of_user == 2 || \Auth::user()->type_of_user == 3)
                        <li class="{{ $section == "complains" ? "active" : "" }}">
                            <a href="{{ route('complains.index') }}">
                                <i class="fa fa-clipboard"></i> <span>Denuncias</span>
                            </a>
                        </li>
                    @endif
                    @if(\Auth::user()->type_of_user == 3)
                        <li class="{{ $section == "owner" ? "active" : "" }}">
                            <a href="{{ route('owner.index') }}">
                                <i class="fa fa-lock"></i> <span>Usuarios</span>
                            </a>
                        </li>
                    @endif --}}
                    {{-- <li class="{{ $section == "payments" ? "active" : "" }}">
                        <a href="">
                            <i class="fa fa-money"></i> <span>Payments</span>
                        </a>
                    </li> --}}

			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->

		<!-- begin #content -->
		<div id="content" class="content">

            @yield('breadcrumb')

			<!-- begin page-header -->
			<h1 class="page-header">@yield('header')</h1>
			<!-- end page-header -->

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')

		</div>
		<!-- end #content -->

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('plugins/jquery/jquery-1.9.1.min.js') }}"></script>
	<script src="{{ asset('plugins/jquery/jquery-migrate-1.1.0.min.js') }}"></script>
	<script src="{{ asset('plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('plugins/parsleyjs/dist/parsley.min.js') }}"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="{{ asset('plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('plugins/jquery-cookie/jquery.cookie.js') }}"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('plugins/sweetalert2/dist/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('plugins/gritter/js/jquery.gritter.js') }}"></script>
	<script src="{{ asset('plugins/flot/jquery.flot.min.js') }}"></script>
	<script src="{{ asset('plugins/flot/jquery.flot.time.min.js') }}"></script>
	<script src="{{ asset('plugins/flot/jquery.flot.resize.min.js') }}"></script>
	<script src="{{ asset('plugins/flot/jquery.flot.pie.min.js') }}"></script>
	<script src="{{ asset('plugins/sparkline/jquery.sparkline.js') }}"></script>
	<script src="{{ asset('plugins/jquery-jvectormap/jquery-jvectormap.min.js') }}"></script>
	<script src="{{ asset('plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('js/dashboard.js') }}"></script>
	<script src="{{ asset('js/apps.min.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/angular/angular.min.js') }}"></script>
    <script src="{{ asset('plugins/angular-animate/angular-animate.min.js') }}"></script>
    @yield('js')
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
			// Dashboard.init();
		});
	</script>
</body>
</html>
