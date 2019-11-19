<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Avenger Admin Theme</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenger Admin Theme">
    <meta name="author" content="KaijuThemes">

    <link href='http://fonts.googleapis.com/css?family=RobotoDraft:300,400,400italic,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700' rel='stylesheet' type='text/css'>

    <!--[if lt IE 10]>
        <script type="text/javascript" src="assets/js/media.match.min.js"></script>
        <script type="text/javascript" src="assets/js/placeholder.min.js"></script>
    <![endif]-->

	<link type="text/css" href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">        <!-- Font Awesome -->
    <link type="text/css" href="{{asset('css/styles.css')}}" rel="stylesheet">                                     <!-- Core CSS with all styles -->

    <link type="text/css" href="{{asset('plugins/jstree/dist/themes/avenger/style.min.css')}}" rel="stylesheet">    <!-- jsTree -->
    <link type="text/css" href="{{asset('plugins/codeprettifier/prettify.css')}}" rel="stylesheet">                <!-- Code Prettifier -->
    <link type="text/css" href="{{asset('plugins/iCheck/skins/minimal/blue.css')}}" rel="stylesheet">              <!-- iCheck -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
        <link type="text/css" href="assets/css/ie8.css" rel="stylesheet">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
        <script type="text/javascript" src="assets/plugins/charts-flot/excanvas.min.js"></script>
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The following CSS are included as plugins and can be removed if unused-->
    
<link type="text/css" href="{{asset('plugins/form-select2/select2.css')}}" rel="stylesheet">                        <!-- Select2 -->
<link type="text/css" href="{{asset('plugins/form-multiselect/css/multi-select.css')}}" rel="stylesheet">           <!-- Multiselect -->
<link type="text/css" href="{{asset('plugins/form-fseditor/fseditor.css')}}" rel="stylesheet">                      <!-- FullScreen Editor -->
<link type="text/css" href="{{asset('plugins/form-tokenfield/bootstrap-tokenfield.css')}}" rel="stylesheet">        <!-- Tokenfield -->
<link type="text/css" href="{{asset('plugins/switchery/switchery.css')}}" rel="stylesheet">        					<!-- Switchery -->

<link type="text/css" href="{{asset('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet"> <!-- Touchspin -->

<link type="text/css" href="{{asset('js/jqueryui.css')}}" rel="stylesheet">        									<!-- jQuery UI CSS -->

<link type="text/css" href="{{asset('plugins/iCheck/skins/minimal/_all.css')}}" rel="stylesheet">                   <!-- Custom Checkboxes / iCheck -->
<link type="text/css" href="{{asset('plugins/iCheck/skins/flat/_all.css')}}" rel="stylesheet">
<link type="text/css" href="{{asset('plugins/iCheck/skins/square/_all.css')}}" rel="stylesheet">

<link type="text/css" href="{{asset('plugins/card/lib/css/card.css')}}" rel="stylesheet"> 									<!-- Card -->

    </head>

    <body class="infobar-offcanvas">
        
        <div id="headerbar">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-brown">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-pencil"></i></div>
					</div>
					<div class="tile-footer">
						Create Post
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-grape">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-group"></i></div>
						<div class="pull-right"><span class="badge">2</span></div>
					</div>
					<div class="tile-footer">
						Contacts
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-primary">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-envelope-o"></i></div>
						<div class="pull-right"><span class="badge">10</span></div>
					</div>
					<div class="tile-footer">
						Messages
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-inverse">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-camera"></i></div>
						<div class="pull-right"><span class="badge">3</span></div>
					</div>
					<div class="tile-footer">
						Gallery
					</div>
				</a>
			</div>

			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-midnightblue">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-cog"></i></div>
					</div>
					<div class="tile-footer">
						Settings
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-orange">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-wrench"></i></div>
					</div>
					<div class="tile-footer">
						Plugins
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
        <header id="topnav" class="navbar navbar-midnightblue navbar-fixed-top clearfix" role="banner">

	<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
		<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar"><span class="icon-bg"><i class="fa fa-fw fa-bars"></i></span></a>
	</span>

	<a class="navbar-brand" href="index.html">Avenger</a>

	<span id="trigger-infobar" class="toolbar-trigger toolbar-icon-bg">
		<a data-toggle="tooltips" data-placement="left" title="Toggle Infobar"><span class="icon-bg"><i class="fa fa-fw fa-bars"></i></span></a>
	</span>
	
	
	<div class="yamm navbar-left navbar-collapse collapse in">
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Megamenu<span class="caret"></span></a>
				<ul class="dropdown-menu" style="width: 900px;">
					<li>
						<div class="yamm-content container-sm-height">
							<div class="row row-sm-height yamm-col-bordered">
								<div class="col-sm-3 col-sm-height yamm-col">
                                            
                                    <h3 class="yamm-category">Sidebar</h3>
                                    <ul class="list-unstyled mb20">
                                        <li><a href="layout-fixed-sidebars.html">Stretch Sidebars</a></li>
                                        <li><a href="layout-sidebar-scroll.html">Scroll Sidebar</a></li>
                                        <li><a href="layout-static-leftbar.html">Static Sidebar</a></li>
                                        <li><a href="layout-leftbar-widgets.html">Sidebar Widgets</a></li>   
                                    </ul>

                                    <h3 class="yamm-category">Infobar</h3>
                                    <ul class="list-unstyled">
                                        <li><a href="layout-infobar-offcanvas.html">Offcanvas Infobar</a></li>
                                        <li><a href="layout-infobar-overlay.html">Overlay Infobar</a></li>
                                        <li><a href="layout-chatbar-overlay.html">Chatbar</a></li>
                                        <li><a href="layout-rightbar-widgets.html">Infobar Widgets</a></li>   
                                    </ul>
                                    
                                </div>
                                <div class="col-sm-3 col-sm-height yamm-col">
                                    
                                    <h3 class="yamm-category">Page Content</h3>
                                    <ul class="list-unstyled mb20">
                                        <li><a href="layout-breadcrumb-top.html">Breadcrumbs on Top</a></li>
                                        <li><a href="layout-page-tabs.html">Page Tabs</a></li>
                                        <li><a href="layout-fullheight-panel.html">Full-Height Panel</a></li>
                                        <li><a href="layout-fullheight-content.html">Full-Height Content</a></li>
                                    </ul>

                                    <h3 class="yamm-category">Misc</h3>
                                    <ul class="list-unstyled">
                                    	<li><a href="layout-topnav-options.html">Topnav Options</a></li>
                                        <li><a href="layout-horizontal-small.html">Horizontal Small</a></li>
                                        <li><a href="layout-horizontal-large.html">Horizontal Large</a></li>
                                        <li><a href="layout-boxed.html">Boxed</a></li>
                                    </ul>
                                    
                                </div>
                                <div class="col-sm-3 col-sm-height yamm-col">
                                    
                                    <h3 class="yamm-category">Analytics</h3>
                                    <ul class="list-unstyled mb20">
                                        <li><a href="charts-flot.html">Flot</a></li>
                                        <li><a href="charts-sparklines.html">Sparklines</a></li>
                                        <li><a href="charts-morris.html">Morris</a></li>
                                        <li><a href="charts-easypiechart.html">Easy Pie Charts</a></li>
                                    </ul>

                                    <h3 class="yamm-category">Components</h3>
                                    <ul class="list-unstyled">
                                        <li><a href="ui-tiles.html">Tiles</a></li>
                                        <li><a href="custom-knob.html">jQuery Knob</a></li>
                                        <li><a href="custom-jqueryui.html">jQuery Slider</a></li>
                                        <li><a href="custom-ionrange.html">Ion Range Slider</a></li>
                                    </ul>
                                    
                                </div>
                                <div class="col-sm-3 col-sm-height yamm-col">
                                	<h3 class="yamm-category">Rem</h3>
                                    <img src="http://placehold.it/300&text=Placeholder" class="mb20 img-responsive" style="width: 100%;">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium. totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
							</div>
						</div>
					</li>
				</ul>
			</li>
			<li class="dropdown" id="widget-classicmenu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
		</ul>
	</div>

	<ul class="nav navbar-nav toolbar pull-right">
		<li class="dropdown toolbar-icon-bg">
			<a href="#" id="navbar-links-toggle" data-toggle="collapse" data-target="header>.navbar-collapse">
				<span class="icon-bg">
					<i class="fa fa-fw fa-ellipsis-h"></i>
				</span>
			</a>
		</li>

		<li class="dropdown toolbar-icon-bg demo-search-hidden">
			<a href="#" class="dropdown-toggle tooltips" data-toggle="dropdown"><span class="icon-bg"><i class="fa fa-fw fa-search"></i></span></a>
			
			<div class="dropdown-menu dropdown-alternate arrow search dropdown-menu-form">
				<div class="dd-header">
					<span>Search</span>
					<span><a href="#">Advanced search</a></span>
				</div>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="">
					
					<span class="input-group-btn">
						
						<a class="btn btn-primary" href="#">Search</a>
					</span>
				</div>
			</div>
		</li>

		<li class="toolbar-icon-bg demo-headerdrop-hidden">
            <a href="#" id="headerbardropdown"><span class="icon-bg"><i class="fa fa-fw fa-level-down"></i></span></i></a>
        </li>

        <li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen">
            <a href="#" class="toggle-fullscreen"><span class="icon-bg"><i class="fa fa-fw fa-arrows-alt"></i></span></i></a>
        </li>

		
		<li class="dropdown toolbar-icon-bg">
			<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-bell"></i></span><span class="badge badge-info">5</span></a>
			<div class="dropdown-menu dropdown-alternate notifications arrow">
				<div class="dd-header">
					<span>Notifications</span>
					<span><a href="#">Settings</a></span>
				</div>
				<div class="scrollthis scroll-pane">
					<ul class="scroll-content">

						<li class="">
							<a href="#" class="notification-info">
								<div class="notification-icon"><i class="fa fa-user fa-fw"></i></div>
								<div class="notification-content">Profile Page has been updated</div>
								<div class="notification-time">2m</div>
							</a>
						</li>
						<li class="">
							<a href="#" class="notification-success">
								<div class="notification-icon"><i class="fa fa-check fa-fw"></i></div>
								<div class="notification-content">Updates pushed successfully</div>
								<div class="notification-time">12m</div>
							</a>
						</li>
						<li class="">
							<a href="#" class="notification-primary">
								<div class="notification-icon"><i class="fa fa-users fa-fw"></i></div>
								<div class="notification-content">New users request to join</div>
								<div class="notification-time">35m</div>
							</a>
						</li>
						<li class="">
							<a href="#" class="notification-danger">
								<div class="notification-icon"><i class="fa fa-shopping-cart fa-fw"></i></div>
								<div class="notification-content">More orders are pending</div>
								<div class="notification-time">11h</div>
							</a>
						</li>
						<li class="">
							<a href="#" class="notification-primary">
								<div class="notification-icon"><i class="fa fa-arrow-up fa-fw"></i></div>
								<div class="notification-content">Pending Membership approval</div>
								<div class="notification-time">2d</div>
							</a>
						</li>
						<li class="">
							<a href="#" class="notification-info">
								<div class="notification-icon"><i class="fa fa-check fa-fw"></i></div>
								<div class="notification-content">Succesfully updated to version 1.0.1</div>
								<div class="notification-time">40m</div>
							</a>
						</li>
					</ul>
				</div>
				<div class="dd-footer">
					<a href="#">View all notifications</a>
				</div>
			</div>
		</li>

		<li class="dropdown toolbar-icon-bg hidden-xs">
			<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-envelope"></i></span></a>
			<div class="dropdown-menu dropdown-alternate messages arrow">
				<div class="dd-header">
					<span>Messages</span>
					<span><a href="#">Settings</a></span>
				</div>

				<div class="scrollthis scroll-pane">
					<ul class="scroll-content">
						<li class="">
							<a href="#">
								<img class="msg-avatar" src="assets/demo/avatar/avatar_09.png" alt="avatar" />
								<div class="msg-content">
									<span class="name">Steven Shipe</span>
									<span class="msg">Nonummy nibh epismod lorem ipsum</span>
								</div>
								<span class="msg-time">30s</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img class="msg-avatar" src="assets/demo/avatar/avatar_01.png" alt="avatar" />
								<div class="msg-content">
									<span class="name">Roxann Hollingworth <i class="fa fa-paperclip attachment"></i></span>
									<span class="msg">Lorem ipsum dolor sit amet consectetur adipisicing elit</span>
								</div>
								<span class="msg-time">5m</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img class="msg-avatar" src="assets/demo/avatar/avatar_05.png" alt="avatar" />
								<div class="msg-content">
									<span class="name">Diamond Harlands</span>
									<span class="msg">:)</span>
								</div>
								<span class="msg-time">3h</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img class="msg-avatar" src="assets/demo/avatar/avatar_02.png" alt="avatar" />
								<div class="msg-content">
									<span class="name">Michael Serio <i class="fa fa-paperclip attachment"></i></span>
									<span class="msg">Sed distinctio dolores fuga molestiae modi?</span>
								</div>
								<span class="msg-time">12h</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img class="msg-avatar" src="assets/demo/avatar/avatar_03.png" alt="avatar" />
								<div class="msg-content">
									<span class="name">Matt Jones</span>
									<span class="msg">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et mole</span>
								</div>
								<span class="msg-time">2d</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img class="msg-avatar" src="assets/demo/avatar/avatar_07.png" alt="avatar" />
								<div class="msg-content">
									<span class="name">John Doe</span>
									<span class="msg">Neque porro quisquam est qui dolorem</span>
								</div>
								<span class="msg-time">7d</span>
							</a>
						</li>
					</ul>
				</div>

				<div class="dd-footer"><a href="#">View all messages</a></div>
			</div>
		</li>

		

		<li class="dropdown toolbar-icon-bg">
			<a href="#" class="dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-user"></i></span></a>
			<ul class="dropdown-menu userinfo arrow">
				<li><a href="#"><span class="pull-left">Profile</span> <span class="badge badge-info">80%</span></a></li>
				<li><a href="#"><span class="pull-left">Account</span> <i class="pull-right fa fa-user"></i></a></li>
				<li><a href="#"><span class="pull-left">Settings</span> <i class="pull-right fa fa-cog"></i></a></li>
				<li class="divider"></li>
				<li><a href="#"><span class="pull-left">Earnings</span> <i class="pull-right fa fa-line-chart"></i></a></li>
				<li><a href="#"><span class="pull-left">Statement</span> <i class="pull-right fa fa-list-alt"></i></a></li>
				<li><a href="#"><span class="pull-left">Withdrawals</span> <i class="pull-right fa fa-dollar"></i></a></li>
				<li class="divider"></li>
				<li><a href="#"><span class="pull-left">Sign Out</span> <i class="pull-right fa fa-sign-out"></i></a></li>
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
                    <a href="#"><img src="http://placehold.it/300&text=Placeholder" class="avatar"></a>
                </div>
                <div class="tabular-cell welcome-options">
                    <span class="welcome-text">Welcome,</span>
                    <a href="#" class="name">Jonathan Smith</a>
                </div>
            </div>
        </div>
    </div>
	<div class="widget stay-on-collapse" id="widget-sidebar">
        <nav role="navigation" class="widget-body">
	<ul class="acc-menu">
		<li class="nav-separator">Explore</li>
		<li><a href="index.html"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
		<!-- <li><a href="javascript:;"><i class="fa fa-user"></i><span>More Dashboard Pages</span></a>
			<ul class="acc-menu">
				<li><a href="sales-force.html">Sales Force</a></li>
				<li><a href="sales-performance.html">Sales Performance</a></li>
				<li><a href="kpi-dashboard.html">KPI Dashboard</a></li>
				<li><a href="shipping-status.html">Shipping Status</a></li>
				<li><a href="metrics-dashboard.html">Metrics Dashboard</a></li>
			</ul>
		</li> -->
		<li><a href="javascript:;"><i class="fa fa-columns"></i><span>Layouts</span><span class="badge badge-primary">8</span></a>
			<ul class="acc-menu">
				<li><a href="layout-grids.html">Grid Scaffolding</a></li>

				<li><a href="layout-fixed-sidebars.html">Stretch Sidebars</a></li>

				<li><a href="layout-sidebar-scroll.html">Sidebar Scroll</a></li>
				<li><a href="layout-static-leftbar.html">Static Sidebar</a></li>

				<li><a href="layout-infobar-offcanvas.html">Offcanvas Infobar</a></li>
				<li><a href="layout-infobar-overlay.html">Overlay Infobar</a></li>

				<li><a href="layout-page-tabs.html">Page Tabs</a></li>

				<li><a href="layout-fullheight-content.html">Fixed Height Content</a></li>
				<li><a href="layout-fullheight-panel.html">Fixed Height Panel</a></li>

				<li><a href="layout-leftbar-widgets.html">Leftbar Widgets <span class="label label-grape">Cool</span></a></li>
				<li><a href="layout-rightbar-widgets.html">Rightbar Widgets <span class="label label-grape">Cool</span></a></li>
				<li><a href="layout-topnav-options.html">Topnav Options</a></li>

				<li><a href="javascript:;">Horizontal Nav <span class="badge badge-dark">2</span></a>
					<ul class="acc-menu">
						<li><a href="layout-horizontal-small.html">Small Menu</a></li>
						<li><a href="layout-horizontal-large.html">Large Menu</a></li>
					</ul>
				</li>

				<li><a href="layout-chatbar-overlay.html">Chatbar</a></li>
				<li><a href="layout-boxed.html">Boxed</a></li>
				<li><a href="layout-compact.html">Compact Leftbar</a></li>
				
			</ul>
		</li>
		<li><a href="javascript:;"><i class="fa fa-flask"></i><span>Base Styles</span></a>
			<ul class="acc-menu">
				<li><a href="ui-typography.html">Typography</a></li>
				<li><a href="ui-buttons.html">Buttons</a></li>
				<li><a href="ui-tables.html">Tables</a></li>
				<li><a href="ui-forms.html">Forms</a></li>
				<li><a href="ui-images.html">Images</a></li>
				<li><a href="ui-panels.html">Panels</a></li>
				<li><a href="ui-icons.html">Font Icons</a></li>
				<li><a href="ui-helpers.html">Helpers</a></li>
			</ul>
		</li>
		<li><a href="javascript:;"><i class="fa fa-cogs"></i><span>Bootstrap</span><span class="label label-info">UI</span></a>
            <ul class="acc-menu">
                <li><a href="ui-modals.html">Modal Box</a></li>
                <li><a href="ui-progress.html">Progress Bars</a></li>
				<li><a href="ui-paginations.html">Pagers &amp; Paginations</a></li>
				<li><a href="ui-breadcrumbs.html">Breadcrumbs</a></li>
				<li><a href="ui-labelsbadges.html">Labels &amp; Badges</a></li>
                <li><a href="ui-alerts.html">Alerts &amp; Notificiations</a></li>
                <li><a href="ui-tabs.html">Tabs &amp; Accordions</a></li>
                
                <li><a href="ui-carousel.html">Carousel</a></li>
                <li><a href="ui-wells.html">Wells</a></li>
            </ul>
        </li>

		<li class="nav-separator">Plugins</li>
         <li><a href="javascript:;"><i class="fa fa-random"></i><span>Components</span></a>
        	<ul class="acc-menu">
        		<li><a href="ui-tiles.html">Tiles</a></li>
        		<li><a href="custom-skylo.html">Page Progress Bar</a></li>
        		<li><a href="custom-bootbox.html">Bootbox</a></li>
        		<li><a href="custom-datepaginator.html">Date Paginator</a></li>
        		<li><a href="custom-pines.html">Pines Notification</a></li>
        		<li><a href="custom-notific8.html">Notific8 Notification</a></li>
        		<li><a href="custom-pulsate.html">Pulsating Elements</a></li>
				<li><a href="custom-knob.html">jQuery Knob</a></li>
				<li><a href="custom-jqueryui.html">jQueryUI Widgets</a></li>
				<li><a href="custom-ionrange.html">Ion Range Slider</a></li>
				<li><a href="custom-tour.html">Tour</a></li>
				<li><a href="ui-nestable.html">Nestable Lists</a></li>
				<li><a href="custom-jstree.html">Tree View</a></li>
				<li><a href="custom-weather.html">Weather</a></li>
        	</ul>
        </li>
		<li><a href="javascript:;"><i class="fa fa-pencil"></i><span>Forms</span></a>
			<ul class="acc-menu">
				<li><a href="form-components.html">Form Components</a></li>
				<li><a href="form-pickers.html">Pickers</a></li>
				<li><a href="form-wizard.html">Form Wizard</a></li>
				<li><a href="form-validation.html">Form Validation</a></li>
				<li><a href="form-masks.html">Form Masks</a></li>
				<li><a href="form-dropzone.html">Dropzone Uploader</a></li>
				<li><a href="form-ckeditor.html">CKEditor</a></li>
				<li><a href="form-summernote.html">Summernote</a></li>
				<li><a href="form-markdown.html">Markdown Editor</a></li>
				<li><a href="form-xeditable.html">Inline Editor</a></li>
				<li><a href="form-imagecrop.html">Image Cropping</a></li>
				<li><a href="form-gridforms.html">Grid Forms</a></li>
			</ul>
		</li>
		<li><a href="javascript:;"><i class="fa fa-table"></i><span>Tables</span></a>
			<ul class="acc-menu">
				<li><a href="tables-responsive.html">Responsive Tables</a></li>
				<li><a href="tables-editable.html">Editable Tables</a></li>
				<li><a href="tables-data.html">Data Tables</a></li>
				<li><a href="tables-advanceddatatable.html">Advanced Data Tables</a></li>
				<li><a href="tables-fixedheader.html">Fixed Header Tables</a></li>
			</ul>
		</li>
		<li><a href="ui-advancedpanels.html"><i class="fa fa-cog fa-spin"></i><span>Panels</span><span class="label label-alizarin">HOT!</span></a></li>
		<li><a href="javascript:;"><i class="fa fa-bar-chart-o"></i><span>Analytics</span></a>
			<ul class="acc-menu">
				<li><a href="charts-flot.html">Flot</a></li>
				<li><a href="charts-sparklines.html">Sparklines</a></li>
				<li><a href="charts-morris.html">Morris.js</a></li>
				<li><a href="charts-chart.html">Chart.js</a></li>
				<li><a href="charts-easypiechart.html">Easy Pie Chart</a></li>
				<li><a href="charts-nvd3.html">nvd3 <span class="label label-info">New</span></a></li>
				<li><a href="charts-gantt.html">Gantt Chart</a></li>
			</ul>
		</li>
		<li><a href="javascript:;"><i class="fa fa-map-marker"></i><span>Maps</span></a>
			<ul class="acc-menu">
				<li><a href="maps-google.html">Google Maps</a></li>
				<li><a href="maps-vector.html">Vector Maps</a></li>
				<li><a href="maps-mapael.html">Mapael</a></li>
			</ul>
		</li>
		<li><a href="javascript:;"><i class="fa fa-files-o"></i><span>Pages</span></a>
			<ul class="acc-menu">
				<li><a href="extras-messages.html">Messages</a></li>
				<li><a href="extras-profile.html">Profile</a></li>
				<li><a href="extras-calendar.html">Calendar</a></li>
				<li><a href="extras-timeline.html">Timeline</a></li>
				<li><a href="extras-search.html">Search Page</a></li>
				<li><a href="extras-chatroom.html">Chat Room</a></li>
				<li><a href="extras-invoice.html">Invoice</a></li>
				<li><a href="javascript:;">Responsive Email Template</a>
					<ul class="acc-menu">
						<li><a href="responsive-email/basic.html">Basic</a></li>
						<li><a href="responsive-email/hero.html">Hero</a></li>
						<li><a href="responsive-email/sidebar.html">Sidebar</a></li>
						<li><a href="responsive-email/sidebar-hero.html">Sidebar Hero</a></li>
					</ul>
				</li>
				<li><a href="extras-gallery.html">Gallery</a></li>
				<li><a href="coming-soon.html">Coming Soon</a></li>
			</ul>
		</li>
		<li><a href="javascript:;"><i class="fa fa-briefcase"></i><span>Extras</span></a>
			<ul class="acc-menu">
				<li><a href="extras-pricingtable.html">Pricing Tables</a></li>
				<li><a href="extras-faq.html">FAQ</a></li>
				<li><a href="extras-registration.html">Registration</a></li>
				<li><a href="extras-forgotpassword.html">Password Reset</a></li>
				<li><a href="extras-login.html">Login</a></li>
				<li><a href="extras-404.html">404 Page</a></li>
				<li><a href="extras-500.html">500 Page</a></li>
			</ul>
		</li>
		<li><a href="javascript:;"><i class="fa fa-sitemap"></i><span>Multiple Levels</span><span class="badge badge-dark">99</span></a>
			<ul class="acc-menu">
				<li><a href="javascript:;">Menu Item 1</a></li>
				<li><a href="javascript:;">Menu Item 2</a>
					<ul class="acc-menu">
						<li><a href="javascript:;">Menu Item 2.1</a></li>
						<li><a href="javascript:;">Menu Item 2.2</a>
							<ul class="acc-menu">
								<li><a href="javascript:;">Menu Item 2.2.1</a></li>
								<li><a href="javascript:;">Menu Item 2.2.2</a>
									<ul class="acc-menu">
										<li><a href="javascript:;">And deeper yet!</a></li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="disabled-link"><a href="index.html">Disabled Menu Item</a></li>
			</ul>
		</li>

		<li class="nav-separator">Functional Apps</li>
		<li><a href="app-inbox.html"><i class="fa fa-inbox"></i><span>Inbox</span><span class="badge badge-success">3</span></a></li>
		<li><a href="app-tasks.html"><i class="fa fa-tasks"></i><span>Tasks</span><span class="badge badge-info">7</span></a></li>
		<li><a href="app-notes.html"><i class="fa fa-pencil-square-o"></i><span>Notes</span></a></li>
		<li><a href="app-todo.html"><i class="fa fa-check"></i><span>Todo</span><span class="badge badge-dark">10</span></a></li>

		<li class="nav-separator">Templates</li>
		<li><a href="javascript:;"><i class="fa fa-coffee"></i><span>Blog</span></a>
			<ul class="acc-menu">
				<!-- <li><a href="app-blog-dashboard.html">Dashboard</a></li> -->
				<li><a href="app-blog-page-list.html">Page List</a></li>
				<li><a href="app-blog-edit.html">Page Edit</a></li>
				<li><a href="app-blog-comment.html">Comment Moderation</a></li>
				<li><a href="javascript:;">Blog Front</a>
					<ul class="acc-menu">
						<li><a href="app-blogfront-list.html">Blog Page</a></li>
						<li><a href="app-blogfront-page.html">Blog Post</a></li>
						<li><a href="app-blogfront-column.html">Blog Column</a></li>
						<li><a href="app-blogfront-portfolio.html">Porfolio</a></li>
					</ul>
				</li>

				
			</ul>
		</li>
		<li><a href="javascript:;"><i class="fa fa-shopping-cart"></i><span>eCommerce</span></a>
			<ul class="acc-menu">
				<!-- <li><a href="app-ecommerce-dashboard.html">Dashboard</a></li> -->
				<!-- <li><a href="app-ecommerce-order-list.html">Order List</a></li>
				<li><a href="app-ecommerce-order-details.html">Order Details</a></li> -->
				<li><a href="app-ecommerce-product-list.html">Product List</a></li>
				<li><a href="app-ecommerce-product-edit.html">Product Edit</a></li>
				<li><a href="javascript:;">Store Front</a>
					<ul class="acc-menu">
						<li><a href="app-store-product-list.html">Product List</a></li>
						<!-- <li><a href="app-store-product-column.html">Product Column</a></li> -->
						<li><a href="app-store-product-details.html">Product Details</a></li>
						<li><a href="app-store-shoppingcart.html">Shopping Cart</a></li>
						<li><a href="app-store-checkout.html">Checkout</a></li>
					</ul>
				</li>
			</ul>
		</li>
		
	</ul>
</nav>
    </div>
</div>
                    </div>
                </div>
                <div class="static-content-wrapper">
                    <div class="static-content">
                        <div class="page-content">
                            <ol class="breadcrumb">
                                
<li><a href="index.html">Home</a></li>
<li><a href="#">Advanced Forms</a></li>
<li class="active"><a href="ui-forms.html">Form Components</a></li>

                            </ol>
                            <div class="page-heading">            
                                <h1>Form Components</h1>
                                <div class="options">
    <div class="btn-toolbar">
        <a href="#" class="btn btn-default"><i class="fa fa-fw fa-wrench"></i></a>
    </div>
</div>
                            </div>
                            <div class="container-fluid">
                                

<div data-widget-group="group1">

	<div class="panel panel-default" data-widget='{"draggable": "false"}'>
		<div class="panel-heading">
			<h2>Basic Form Elements</h2>
				<div class="panel-ctrls"
					data-actions-container="" 
					data-action-collapse='{"target": ".panel-body"}'
					data-action-expand=''
					data-action-colorpicker=''
				>
				</div>
		</div>
		<div class="panel-editbox" data-widget-controls=""></div>
		<div class="panel-body">
			<form action="" class="form-horizontal row-border">
				<div class="form-group">
					<label class="col-sm-2 control-label">Simplest Input</label>
					<div class="col-sm-8">
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Password Field</label>
					<div class="col-sm-8">
						<input type="password" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Input with Placeholder</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" placeholder="Placeholder">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Disabled Input</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" placeholder="Disabled Input" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Read only field</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" readonly="readonly" value="Read only text goes here">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">With pre-defined value</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" value="http://">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">With max length</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" maxlength="20" placeholder="max 20 characters here">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Popover Input</label>
					<div class="col-sm-8">
						<input type="text" class="form-control popovers" placeholder="Popover Input" data-trigger="hover" data-toggle="popover" data-content="And here's some amazing content. It's very engaging. right?" data-original-title="A Title">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Tooltip Input</label>
					<div class="col-sm-8">
						<input type="text" class="form-control tooltips" data-trigger="hover" data-original-title="Tooltip text goes here. Tooltip text goes here.">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Select Box</label>
					<div class="col-sm-8">
						<select class="form-control" id="source">
							<optgroup label="Alaskan/Hawaiian Time Zone">
								<option value="AK">Alaska</option>
								<option value="HI">Hawaii</option>
							</optgroup>
							<optgroup label="Pacific Time Zone">
								<option value="CA">California</option>
								<option value="NV">Nevada</option>
								<option value="OR">Oregon</option>
								<option value="WA">Washington</option>
							</optgroup>
							<optgroup label="Mountain Time Zone">
								<option value="AZ">Arizona</option>
								<option value="CO">Colorado</option>
								<option value="ID">Idaho</option>
								<option value="MT">Montana</option><option value="NE">Nebraska</option>
								<option value="NM">New Mexico</option>
								<option value="ND">North Dakota</option>
								<option value="UT">Utah</option>
								<option value="WY">Wyoming</option>
							</optgroup>
							<optgroup label="Central Time Zone">
								<option value="AL">Alabama</option>
								<option value="AR">Arkansas</option>
								<option value="IL">Illinois</option>
								<option value="IA">Iowa</option>
								<option value="KS">Kansas</option>
								<option value="KY">Kentucky</option>
								<option value="LA">Louisiana</option>
								<option value="MN">Minnesota</option>
								<option value="MS">Mississippi</option>
								<option value="MO">Missouri</option>
								<option value="OK">Oklahoma</option>
								<option value="SD">South Dakota</option>
								<option value="TX">Texas</option>
								<option value="TN">Tennessee</option>
								<option value="WI">Wisconsin</option>
							</optgroup>
							<optgroup label="Eastern Time Zone">
								<option value="CT">Connecticut</option>
								<option value="DE">Delaware</option>
								<option value="FL">Florida</option>
								<option value="GA">Georgia</option>
								<option value="IN">Indiana</option>
								<option value="ME">Maine</option>
								<option value="MD">Maryland</option>
								<option value="MA">Massachusetts</option>
								<option value="MI">Michigan</option>
								<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
								<option value="NY">New York</option>
								<option value="NC">North Carolina</option>
								<option value="OH">Ohio</option>
								<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
								<option value="VT">Vermont</option><option value="VA">Virginia</option>
								<option value="WV">West Virginia</option>
							</optgroup>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Disabled Dropdown</label>
					<div class="col-sm-8">
						<select class="form-control" disabled placeholder="Disabled Dropdown">
							<option>Alaska</option>
							<option>Lorem ipsum dolor.</option>
							<option>Amet, impedit aperiam?</option>
							<option>Nemo, alias, quasi?</option>
							<option>Inventore, expedita.</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Multi-select Box</label>
					<div class="col-sm-8">
						<select class="form-control" multiple>
							<option>Lorem ipsum dolor.</option>
							<option>Amet, impedit aperiam?</option>
							<option>Nemo, alias, quasi?</option>
							<option>Inventore, expedita.</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Inline Radio</label>
					<div class="col-sm-8">
						<label class="radio-inline icheck">
							<input type="radio" id="inlineradio1" value="option1" name="optionsRadiosInline" > Option 1
						</label>
						<label class="radio-inline icheck">
							<input type="radio" id="inlineradio2" value="option2" name="optionsRadiosInline" > Option 2
						</label>
						<label class="radio-inline icheck">
							<input type="radio" id="inlineradio3" value="option3" name="optionsRadiosInline" > Option 3
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Radio</label>
					<div class="col-sm-8">

						<label class="radio icheck">
							<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
							Option one is this and that
						</label>

						<label class="radio icheck">
							<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
							Option two can be something else
						</label>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Inline Checkbox</label>
					<div class="col-sm-8">
						<label class="checkbox-inline icheck">
							<input type="checkbox" id="inlinecheckbox1" value="option1"> Option 1
						</label>
						<label class="checkbox-inline icheck">
							<input type="checkbox" id="inlinecheckbox2" value="option2"> Option 2
						</label>
						<label class="checkbox-inline icheck">
							<input type="checkbox" id="inlinecheckbox3" value="option3"> Option 3
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Checkbox</label>
					<div class="col-sm-8">

							<label class="checkbox icheck">
								<input type="checkbox" value="">
								Option one is this and that
							</label>
							
							<label class="checkbox icheck">
								<input type="checkbox" value="">
								Option two can be something else
							</label>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Textarea</label>
					<div class="col-sm-8">
						<textarea class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Autogrow Textarea</label>
					<div class="col-sm-8">
						<textarea class="form-control autosize"></textarea>
					</div>
					<div class="col-sm-2"><p class="help-block">Textbox auto grows as you type!</p></div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Fullscreen Textarea</label>
					<div class="col-sm-8">
						<textarea class="form-control fullscreen"></textarea>
					</div>
				</div>
			</form>
			<div class="panel-footer">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<button class="btn-primary btn">Submit</button>
						<button class="btn-default btn">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="panel panel-default demo-icheck" data-widget='{"draggable": "false"}'>
		<div class="panel-heading"><h2>Custom Checkboxes and Radio Buttons</h2>
				<div class="panel-ctrls"
					data-actions-container="" 
					data-action-collapse='{"target": ".panel-body"}'
					data-action-expand=''
					data-action-colorpicker=''
				>
				</div>
		</div>
		<div class="panel-editbox" data-widget-controls=""></div>
		<div class="panel-body">
			
			<div class="alert alert-info">
				<h3>iCheck</h3>
				<p>Super customized checkbox and radio buttons that are backward compatible and appears identical in both desktop and mobile.</p>
			</div>

			<div class="row">
				<div class="col-sm-4">
					<h3>Minimal Skin <small>Default - <em>Customized for Avenger</em></small></h3>
					<div class="row">
						<div class="col-sm-6 icheck-minimal">
							<div class="checkbox red icheck"><label><input type="checkbox" value="" checked>Red</label></div>
							<div class="checkbox green icheck"><label><input type="checkbox" value="" checked>Green</label></div>
							<div class="checkbox aero icheck"><label><input type="checkbox" value="" checked>Aero</label></div>
							<div class="checkbox blue icheck"><label><input type="checkbox" value="" checked>Blue</label></div>
							<div class="checkbox grey icheck"><label><input type="checkbox" value="" checked>Grey</label></div>
							<div class="checkbox orange icheck"><label><input type="checkbox" value="" checked>Orange</label></div>
							<div class="checkbox pink icheck"><label><input type="checkbox" value="" checked>Pink</label></div>
							<div class="checkbox purple icheck"><label><input type="checkbox" value="" checked>Purple</label></div>
							<div class="checkbox yellow icheck"><label><input type="checkbox" value="" checked>Yellow</label></div>
						</div>
						<div class="col-sm-6 icheck-minimal">
							<div class="radio red icheck"><label><input type="radio" name="optionsRadios-minimal" value="option1" checked>Red</label></div>
							<div class="radio green icheck"><label><input type="radio" name="optionsRadios-minimal" value="option2">Green</label></div>
							<div class="radio aero icheck"><label><input type="radio" name="optionsRadios-minimal" value="option2">Aero</label></div>
							<div class="radio blue icheck"><label><input type="radio" name="optionsRadios-minimal" value="option2">Blue</label></div>
							<div class="radio grey icheck"><label><input type="radio" name="optionsRadios-minimal" value="option2">Grey</label></div>
							<div class="radio orange icheck"><label><input type="radio" name="optionsRadios-minimal" value="option2">Orange</label></div>
							<div class="radio pink icheck"><label><input type="radio" name="optionsRadios-minimal" value="option2">Pink</label></div>
							<div class="radio purple icheck"><label><input type="radio" name="optionsRadios-minimal" value="option2">Purple</label></div>
							<div class="radio yellow icheck"><label><input type="radio" name="optionsRadios-minimal" value="option2">Yellow</label></div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<h3>Flat Skin</h3>
					<div class="row">
						<div class="col-sm-6 icheck-flat">
							<div class="checkbox red icheck"><label><input type="checkbox" value="" checked>Red</label></div>
							<div class="checkbox green icheck"><label><input type="checkbox" value="" checked>Green</label></div>
							<div class="checkbox aero icheck"><label><input type="checkbox" value="" checked>Aero</label></div>
							<div class="checkbox blue icheck"><label><input type="checkbox" value="" checked>Blue</label></div>
							<div class="checkbox grey icheck"><label><input type="checkbox" value="" checked>Grey</label></div>
							<div class="checkbox orange icheck"><label><input type="checkbox" value="" checked>Orange</label></div>
							<div class="checkbox pink icheck"><label><input type="checkbox" value="" checked>Pink</label></div>
							<div class="checkbox purple icheck"><label><input type="checkbox" value="" checked>Purple</label></div>
							<div class="checkbox yellow icheck"><label><input type="checkbox" value="" checked>Yellow</label></div>
						</div>
						<div class="col-sm-6 icheck-flat">
							<div class="radio red icheck"><label><input type="radio" name="optionsRadios-flat" value="option1" checked>Red</label></div>
							<div class="radio green icheck"><label><input type="radio" name="optionsRadios-flat" value="option2">Green</label></div>
							<div class="radio aero icheck"><label><input type="radio" name="optionsRadios-flat" value="option2">Aero</label></div>
							<div class="radio blue icheck"><label><input type="radio" name="optionsRadios-flat" value="option2">Blue</label></div>
							<div class="radio grey icheck"><label><input type="radio" name="optionsRadios-flat" value="option2">Grey</label></div>
							<div class="radio orange icheck"><label><input type="radio" name="optionsRadios-flat" value="option2">Orange</label></div>
							<div class="radio pink icheck"><label><input type="radio" name="optionsRadios-flat" value="option2">Pink</label></div>
							<div class="radio purple icheck"><label><input type="radio" name="optionsRadios-flat" value="option2">Purple</label></div>
							<div class="radio yellow icheck"><label><input type="radio" name="optionsRadios-flat" value="option2">Yellow</label></div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<h3>Square Skin</h3>
					<div class="row">
						<div class="col-sm-6 icheck-square">
							<div class="checkbox red icheck"><label><input type="checkbox" value="" checked>Red</label></div>
							<div class="checkbox green icheck"><label><input type="checkbox" value="" checked>Green</label></div>
							<div class="checkbox aero icheck"><label><input type="checkbox" value="" checked>Aero</label></div>
							<div class="checkbox blue icheck"><label><input type="checkbox" value="" checked>Blue</label></div>
							<div class="checkbox grey icheck"><label><input type="checkbox" value="" checked>Grey</label></div>
							<div class="checkbox orange icheck"><label><input type="checkbox" value="" checked>Orange</label></div>
							<div class="checkbox pink icheck"><label><input type="checkbox" value="" checked>Pink</label></div>
							<div class="checkbox purple icheck"><label><input type="checkbox" value="" checked>Purple</label></div>
							<div class="checkbox yellow icheck"><label><input type="checkbox" value="" checked>Yellow</label></div>
						</div>
						<div class="col-sm-6 icheck-square">
							<div class="radio red icheck"><label><input type="radio" name="optionsRadios-square" value="option1" checked>Red</label></div>
							<div class="radio green icheck"><label><input type="radio" name="optionsRadios-square" value="option2">Green</label></div>
							<div class="radio aero icheck"><label><input type="radio" name="optionsRadios-square" value="option2">Aero</label></div>
							<div class="radio blue icheck"><label><input type="radio" name="optionsRadios-square" value="option2">Blue</label></div>
							<div class="radio grey icheck"><label><input type="radio" name="optionsRadios-square" value="option2">Grey</label></div>
							<div class="radio orange icheck"><label><input type="radio" name="optionsRadios-square" value="option2">Orange</label></div>
							<div class="radio pink icheck"><label><input type="radio" name="optionsRadios-square" value="option2">Pink</label></div>
							<div class="radio purple icheck"><label><input type="radio" name="optionsRadios-square" value="option2">Purple</label></div>
							<div class="radio yellow icheck"><label><input type="radio" name="optionsRadios-square" value="option2">Yellow</label></div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="panel panel-default" data-widget='{"draggable": "false"}'>
		<div class="panel-heading"><h2>Bootstrap Switches</h2>
			<div class="panel-ctrls"
				data-actions-container="" 
				data-action-collapse='{"target": ".panel-body"}'
				data-action-expand=''
				data-action-colorpicker=''
			>
			</div>
		</div>
		<div class="panel-editbox" data-widget-controls=""></div>
		<div class="panel-body">
			<form action="" class="form-horizontal row-border">
				<div class="form-group">
					<label class="col-sm-2 control-label label-input-sm" style="font-size: 12px; padding-top: 3px !important; padding-bottom: 3px !important;">Switch Mini</label>
					<div class="col-sm-8">
						<ul class="demo-btns mb-10">
							<li class="mb0"><input class="bootstrap-switch" type="checkbox" checked="false" data-size="mini" data-on-color="success" data-off-color="default" data-on-text="I" data-off-text="O"></li>
						</ul>
					</div>
				</div>
				<div class="form-group pb10">
					<label class="col-sm-2 control-label label-input-sm">Switch Small</label>
					<div class="col-sm-8">
						<ul class="demo-btns mb-10">
							<li><input class="bootstrap-switch" type="checkbox" data-size="small" data-on-color="success" data-off-color="default"></li>
						</ul>
					</div>
				</div>
				<div class="form-group pb10">
					<label class="col-sm-2 control-label">Switch Default</label>
					<div class="col-sm-8">
						<ul class="demo-btns mb-10">
							<li><input class="bootstrap-switch switch-alt" type="checkbox" checked="false" data-on-color="success" data-off-color="default"></li>
						</ul>
					</div>
				</div>
				<div class="form-group pb10">
					<label class="col-sm-2 control-label label-input-lg">Switch Large</label>
					<div class="col-sm-8">
						<ul class="demo-btns mb-10">
							<li><input class="bootstrap-switch" type="checkbox" data-size="large" data-on-color="success" data-off-color="default"></li>
						</ul>
					</div>
				</div>				
				<div class="form-group pb10">
					<label class="col-sm-2 control-label">Default Colors</label>
					<div class="col-sm-8">
						<ul class="demo-btns mb-10">
							<li><input class="bootstrap-switch" type="checkbox" checked="false" data-on-color="default" data-off-color="default"></li>
							<li><input class="bootstrap-switch" type="checkbox" checked="false" data-on-color="primary" data-off-color="default"></li>
							<li><input class="bootstrap-switch" type="checkbox" checked="false" data-on-color="success" data-off-color="default"></li>
							<li><input class="bootstrap-switch" type="checkbox" checked="false" data-on-color="warning" data-off-color="default"></li>
							<li><input class="bootstrap-switch" type="checkbox" checked="false" data-on-color="info" data-off-color="default"></li>
							<li><input class="bootstrap-switch" type="checkbox" checked="false" data-on-color="danger" data-off-color="default"></li>
						</ul>
					</div>
				</div>
				<div class="form-group pb10">
					<label class="col-sm-2 control-label">Disabled States</label>
					<div class="col-sm-8">
						<ul class="demo-btns mb-10">
							<li><input class="bootstrap-switch" type="checkbox" checked="false" disabled="true" data-on-color="default" data-off-color="default"></li>
							<li><input class="bootstrap-switch" type="checkbox" checked="false" disabled="true" data-on-color="primary" data-off-color="default"></li>
							<li><input class="bootstrap-switch" type="checkbox" checked="false" disabled="true" data-on-color="success" data-off-color="default"></li>
							<li><input class="bootstrap-switch" type="checkbox" checked="false" disabled="true" data-on-color="warning" data-off-color="default"></li>
							<li><input class="bootstrap-switch" type="checkbox" checked="false" disabled="true" data-on-color="info" data-off-color="default"></li>
							<li><input class="bootstrap-switch" type="checkbox" checked="false" disabled="true" data-on-color="danger" data-off-color="default"></li>
					</ul>
					</div>
				</div>
				<div class="form-group pb10">
					<label class="col-sm-2 control-label">With Icons</label>
					<div class="col-sm-8">
						<ul class="demo-btns mb-10">
							<li><input class="bootstrap-switch" type="checkbox" data-on-text="<i class='fa fa-check'></i>" data-on-color="success" data-off-text="<i class='fa fa-times'></i>" data-off-color="danger" /></li>
							<li><input class="bootstrap-switch" type="checkbox" data-on-text="<i class='fa fa-glass'></i>" data-on-color="info" data-off-text="<i class='fa fa-beer'></i>" data-off-color="warning" /></li>
							<li><input class="bootstrap-switch" type="checkbox" data-on-text="<i class='fa fa-thumbs-up'></i>" data-on-color="primary" data-off-text="<i class='fa fa-thumbs-down'></i>" data-off-color="primary" /></li>
							<li><input class="bootstrap-switch" type="checkbox" data-on-text="<i class='fa fa-lock'></i>" data-on-color="default" data-off-text="<i class='fa fa-unlock'></i>" data-off-color="default" /></li>
							<li><input class="bootstrap-switch" type="checkbox" data-on-text="1" data-on-color="success" data-off-text="0" data-off-color="danger" /></li>
							<li><input class="bootstrap-switch" type="checkbox" data-on-text="<i class='fa fa-smile-o'></i>" data-on-color="default" data-off-text="<i class='fa fa-frown-o'></i>" data-off-color="default"/> </li>
						</ul>
					</div>
				</div>												
			</form>
		</div>
	</div>
				

	<div class="panel panel-default" data-widget='{"draggable": "false"}'>
		<div class="panel-heading"><h2>Toggle Switches</h2>
			<div class="panel-ctrls"
				data-actions-container="" 
				data-action-collapse='{"target": ".panel-body"}'
				data-action-expand=''
				data-action-colorpicker=''
			>
			</div>
		</div>
		<div class="panel-editbox" data-widget-controls=""></div>
		<div class="panel-body">
			<form action="" class="form-horizontal row-border">
				<div class="form-group pb10">
					<label class="col-sm-2 control-label" style="font-size: 12px; padding-top: 3px !important;" >Switchery Mini</label>
					<div class="col-sm-8">
						<ul class="demo-btns mb-10 xs">
							<li><input type="checkbox" class="js-switch-primary switchery-xs" checked /></li>
							<li><input type="checkbox" class="js-switch-success switchery-xs" checked /></li>
							<li><input type="checkbox" class="js-switch-warning switchery-xs" checked /></li>
							<li><input type="checkbox" class="js-switch-inverse switchery-xs" checked /></li>
							<li><input type="checkbox" class="js-switch-danger switchery-xs" checked /></li>
							<li><input type="checkbox" class="js-switch-info switchery-xs" checked /></li>
						</ul>
					</div>
				</div>
				<div class="form-group pb10">
					<label class="col-sm-2 control-label label-input-sm" >Switchery Small</label>
					<div class="col-sm-8">
						<ul class="demo-btns mb-10 sm">
							<li><input type="checkbox" class="js-switch-primary switchery-sm" checked /></li>
							<li><input type="checkbox" class="js-switch-success switchery-sm" checked /></li>
							<li><input type="checkbox" class="js-switch-warning switchery-sm" checked /></li>
							<li><input type="checkbox" class="js-switch-inverse switchery-sm" checked /></li>
							<li><input type="checkbox" class="js-switch-danger switchery-sm" checked /></li>
							<li><input type="checkbox" class="js-switch-info switchery-sm" checked /></li>
						</ul>
					</div>
				</div>
				<div class="form-group pb10">
					<label class="col-sm-2 control-label" >Switchery Default</label>
					<div class="col-sm-8">
						<ul class="demo-btns mb-10 nm">
							<li><input type="checkbox" class="js-switch-primary" checked /></li>
							<li><input type="checkbox" class="js-switch-success" checked /></li>
							<li><input type="checkbox" class="js-switch-warning" checked /></li>
							<li><input type="checkbox" class="js-switch-inverse" checked /></li>
							<li><input type="checkbox" class="js-switch-danger" checked /></li>
							<li><input type="checkbox" class="js-switch-info" checked /></li>
						</ul>
					</div>
				</div>
			</form>
		</div>
	</div>


	<div class="panel panel-default" data-widget='{"draggable": "false"}'>
		<div class="panel-heading">
			<h2>Input Groups</h2>
				<div class="panel-ctrls"
					data-actions-container="" 
					data-action-collapse='{"target": ".panel-body"}'
					data-action-expand=''
					data-action-colorpicker=''
				>
				</div>
		</div>
		<div class="panel-editbox" data-widget-controls=""></div>
		<div class="panel-body">
			<form action="" class="form-horizontal row-border">
				<div class="form-group">
					<label class="col-sm-2 control-label">Before Text Field</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon">@</span>
							<input type="text" class="form-control" placeholder="Username">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">After Text Field</label>
					<div class="col-sm-8">
						<div class="input-group">
							<input type="text" class="form-control">
							<span class="input-group-addon">.00</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Both</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon">$</span>
							<input type="text" class="form-control">
							<span class="input-group-addon">.00</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Checkbox</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon icheck">
								<input type="checkbox">
							</span>
							<input type="text" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Radio</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon icheck">
								<input type="radio">
							</span>
							<input type="text" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Buttons instead of text</label>
					<div class="col-sm-8">
						<div class="input-group">
							<input type="text" class="form-control">
							<div class="input-group-btn">
								<button type="button" class="btn btn-info">Go!</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Buttons with Dropdowns</label>
					<div class="col-sm-8">
						<div class="input-group">
							<input type="text" class="form-control">
							<div class="input-group-btn">
								<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action <i class="fa fa-angle-down"></i></button>
								<ul class="dropdown-menu pull-right">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li><a href="#">Separated link</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Segmentded Dropdown</label>
					<div class="col-sm-8">
						<div class="input-group">
							<input type="text" class="form-control">
							<div class="input-group-btn">
								<button type="button" class="btn btn-info">Action</button>
								<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"><i class="fa fa-angle-down"></i></button>
								<ul class="dropdown-menu pull-right">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li><a href="#">Separated link</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="panel panel-default" data-widget='{"draggable": "false"}'>
		<div class="panel-heading">
			<h2>Autocomplete</h2>
				<div class="panel-ctrls"
					data-actions-container="" 
					data-action-collapse='{"target": ".panel-body"}'
					data-action-expand=''
					data-action-colorpicker=''
				>
				</div>
		</div>
		<div class="panel-editbox" data-widget-controls=""></div>
		<div class="panel-body">
			<div class="col-12">
				<p>A fast, full-featured, autocomplete library can prefet data, search that data on the client, and then falling back to the server. Powered by Twitter Typeahead.</p>
			</div>
			<form action="" class="form-horizontal row-border">
				<div class="form-group">
					<label class="col-sm-2 control-label">Autocomplete</label>
					<div class="col-sm-8">
						<input type="text" class="form-control typeahead example-countries" placeholder="Enter name of a country...">
						<p class="help-block">Type in a name of a state!</p>
					</div>
				</div>
			</form>
		</div>
	</div>


	<div class="panel panel-default" data-widget='{"draggable": "false"}'>
		<div class="panel-heading">
			<h2>Advanced Select Boxes</h2>
				<div class="panel-ctrls"
					data-actions-container="" 
					data-action-collapse='{"target": ".panel-body"}'
					data-action-expand=''
					data-action-colorpicker=''
				>
				</div>
		</div>
		<div class="panel-editbox" data-widget-controls=""></div>
		<div class="panel-body">
			<form action="" class="form-horizontal row-border">

				<div class="form-group">
					<label class="col-sm-2 control-label">Dropdown with Search</label>
					<div class="col-sm-8">
						<select id="e1" style="width:100% !important" class="populate"></select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Select with Multiple</label>
					<div class="col-sm-8">
						<select id="e2" multiple style="width:100% !important" class="populate"></select>
						<p class="help-block">Select2 also supports multi-value select boxes. The <code>select</code> above is declared with the <code>multiple</code> attribute. Select2 automatially picks up on this</p>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Minimum Input</label>
					<div class="col-sm-8">
						<select id="e3" style="width:100% !important" class="populate"></select>
						<p class="help-block">Supports a minimum input setting which is useful for large remote datasets where short search terms are not very useful</p>
					</div>
				</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Infinite Scroll with Remote Data</label>
						<div class="col-sm-8">
							<input type="hidden" id="e7" style="width:100% !important"/>
							<p class="help-block">The selectbox has AJAX/JSONP support built in. In this example we will search for a movie using Rotten Tomatoes API. When result-list is scrolled to an end, more results are lazy-appended</p>
						</div>
					</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Tagging Support</label>
					<div class="col-sm-8">
						<input type="hidden" id="e12" style="width:100% !important" value="brown, red, green"/>
						<p class="help-block">Quickly set up fields for tagging</p>
					</div>
				</div>
			</form>
		</div>
	</div>


	<div class="panel panel-default" data-widget='{"draggable": "false"}'>
		<div class="panel-heading ">
			<h2>Tokenfield</h2>
				<div class="panel-ctrls"
					data-actions-container="" 
					data-action-collapse='{"target": ".panel-body"}'
					data-action-expand=''
					data-action-colorpicker=''
				>
				</div>
		</div>
		<div class="panel-editbox" data-widget-controls=""></div>
		<div class="panel-body">
			<p>Advanced tagging/tokenizing plugin for input fields with a focus on keyboard and copy-paste support.</p>
			<form action="" class="form-horizontal row-border">

				<div class="form-group">
					<label class="col-sm-2 control-label">Using jQuery UI Autocomplete</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="tokenfield-jQUI" value="red,green,blue" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Using Twitter Typeahead</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="tokenfield-typeahead" value="red,green,blue" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Parse Emails</label>
					<div class="col-sm-8">
						<div class="input-group">
							<input type="text" class="form-control" id="tokenfield-email" value="one@email.com,not an email, another@email.com" />
							<span class="input-group-addon"><span class="fa fa-envelope-o"></span></span>
						</div>

					</div>
				</div>

			</form>
		</div>
	</div>


	<div class="panel panel-default" data-widget='{"draggable": "false"}'>
		<div class="panel-heading">
			<h2>Select Options</h2>
				<div class="panel-ctrls"
					data-actions-container="" 
					data-action-collapse='{"target": ".panel-body"}'
					data-action-expand=''
					data-action-colorpicker=''
				>
				</div>
		</div>
		<div class="panel-editbox" data-widget-controls=""></div>
		<div class="panel-body">
			<div class="alert alert-info">
				<h3>Multi-Select</h3>
				<p>Drop-in replacement for standard <code>select</code> with multiple attribute activated.</p>
			</div>

			<form action="" class="form-horizontal row-border">
				<div class="form-group">
					<label class="col-sm-2 control-label">Multiple Select</label>
					<div class="col-sm-8">
						<select multiple="multiple" id="multi-select2">
							<option>Lorem</option><option>Unde</option><option>Saepe</option><option>Harum</option><option>Enim</option><option>Aliquid</option><option>Recusandae</option><option>Esse</option><option>Laborum</option><option>Quo</option><option>Quo</option><option>Maiores</option><option>Architecto</option><option>Sapiente</option><option>Placeat</option><option>Officiis</option><option>Obcaecati</option><option>Aliquid</option><option>Explicabo</option><option>Aliquam</option><option>Vero</option><option>Voluptates</option><option>Similique</option><option>Minima</option><option>Ipsum</option><option>Nemo</option><option>Omnis</option><option>Fuga</option><option>Iste</option><option>Possimus</option>
						</select>
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-2 control-label">Multiple Select with Search and Group select</label>
					<div class="col-sm-8">
						<select multiple="multiple" id="multi-select">
							<option>Lorem</option><option>Unde</option><option>Saepe</option><option>Harum</option><option>Enim</option><option>Aliquid</option><option>Recusandae</option><option>Esse</option><option>Laborum</option><option>Quo</option><option>Quo</option><option>Maiores</option><option>Architecto</option><option>Sapiente</option><option>Placeat</option><option>Officiis</option><option>Obcaecati</option><option>Aliquid</option><option>Explicabo</option><option>Aliquam</option><option>Vero</option><option>Voluptates</option><option>Similique</option><option>Minima</option><option>Ipsum</option><option>Nemo</option><option>Omnis</option><option>Fuga</option><option>Iste</option><option>Possimus</option>
						</select>
					</div>
				</div>
			</form>

			<hr>

			<div class="alert alert-info">
				<h3>Chained Select Boxes</h3>
				<p>Chained is simple chained <code>select</code>s plugin. Use <i>class based</i> version if you do not want to make external queries. A separate version that supports remote selects from <i>AJAX queries</i> is also included.</p>
			</div>

			<form action="" class="form-horizontal row-border">
				<div class="form-group">
					<label for="#" class="col-sm-2 control-label">Chaining Selects using class</label>
					<div class="col-sm-2">
						<select id="mark" name="mark" class="form-control">
							<option value="">--</option>
							<option value="bmw">BMW</option>
							<option value="audi">Audi</option>
						</select>
					</div>
					<div class="col-sm-2">
						<select id="series" name="series" class="form-control">
							<option value="">--</option>
							<option value="series-3" class="bmw">3 series</option>
							<option value="series-5" class="bmw">5 series</option>
							<option value="series-6" class="bmw">6 series</option>
							<option value="a3" class="audi">A3</option>
							<option value="a4" class="audi">A4</option>
							<option value="a5" class="audi">A5</option>
						</select>
					</div>
					<div class="col-sm-2">
						<select id="model" name="model" class="form-control">
							<option value="">--</option>
							<option value="coupe" class="series-3 series-6 a5">Coupe</option>
							<option value="cabrio" class="series-3 series-6 a3 a5">Cabrio</option>
							<option value="sedan" class="series-3 series-5 a3 a4">Sedan</option>
							<option value="sportback" class="a3 a5">Sportback</option>
						</select>
					</div>
				</div>
			</form>

		</div>
	</div>

	<div class="panel panel-default" data-widget='{"draggable": "false"}'>
		<div class="panel-heading">
			<h2>Card</h2>
				<div class="panel-ctrls"
					data-actions-container="" 
					data-action-collapse='{"target": ".panel-body"}'
					data-action-expand=''
					data-action-colorpicker=''
				>
				</div>
		</div>
		<div class="panel-editbox" data-widget-controls=""></div>
		<div class="panel-body">
			<div class="alert alert-info">
				<h3>Card <small>A better credit card form</small></h3>
				<p>Card will take any credit card form and make it the best part of the checkout process (without you changing anything). Everything is created with pure CSS, HTML, and Javascript — no images required.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<form action="" class="form-horizontal card">
						<div class="form-group">
							<label for="#" class="col-sm-4 control-label">Card Number</label>	
							<div class="col-sm-8">
								<input placeholder="Card number" type="text" name="number" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-4 control-label">Full Name</label>	
							<div class="col-sm-8">
								<input placeholder="Full name" type="text" name="name" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-4 control-label">Expiry</label>	
							<div class="col-sm-8">
								<input placeholder="MM/YY" type="text" name="expiry" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-4 control-label">CVC</label>	
							<div class="col-sm-8">
								<input placeholder="CVC" type="text" name="cvc" class="form-control">
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-6">
					<div class="card-wrapper"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="panel panel-default" data-widget='{"draggable": "false"}'>
		<div class="panel-heading">
			<h2>File Input</h2>
				<div class="panel-ctrls"
					data-actions-container="" 
					data-action-collapse='{"target": ".panel-body"}'
					data-action-expand=''
					data-action-colorpicker=''
				>
				</div>
		</div>
		<div class="panel-editbox" data-widget-controls=""></div>
		<div class="panel-body">
			<form action="" class="form-horizontal row-border">

				<div class="form-group">
					<label class="col-sm-2 control-label">File input group</label>
					<div class="col-sm-8">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="input-group">
								<div class="form-control uneditable-input" data-trigger="fileinput">
									<i class="fa fa-file fileinput-exists"></i>&nbsp;<span class="fileinput-filename"></span>
								</div>
								<span class="input-group-btn">
									<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
									<span class="btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="...">
									</span>
									
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">File input button</label>
					<div class="col-sm-8">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<span class="btn btn-default btn-file">
								<span class="fileinput-new">Select file</span>
								<span class="fileinput-exists">Change</span>
								<input type="file" name="...">
							</span>
							<span class="fileinput-filename"></span>
							<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Image Upload Widgets</label>
					<div class="col-sm-5">
						<div class="fileinput fileinput-new" style="width: 100%;" data-provides="fileinput">
							<div class="fileinput-preview thumbnail mb20" data-trigger="fileinput" style="width: 100%; height: 150px;"></div>
							<div>
								<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								<span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
								
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="alert alert-info">Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead.</div>
					</div>
				</div>

			</form>
		</div>
	</div>

	<div class="panel panel-default" data-widget='{"draggable": "false"}'>
		<div class="panel-heading"><h2>Touchspin</h2>
				<div class="panel-ctrls"
					data-actions-container="" 
					data-action-collapse='{"target": ".panel-body"}'
					data-action-expand=''
					data-action-colorpicker=''
				>
				</div>
		</div>
		<div class="panel-editbox" data-widget-controls=""></div>
		<div class="panel-body">
			<div class="alert alert-info">A mobile and touch friendly input spinner component for Avenger. It supports the mousewheel and the up/down keys. </div>
			<form action="" class="form-horizontal row-border">
				<div class="form-group">
					<label for="" class="control-label col-sm-2">With Postfix</label>
					<div class="col-sm-8">
						<input id="touchspin1" value="4.20">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-sm-2">With Prefix</label>
					<div class="col-sm-8">
						<input id="touchspin2" value="34234">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-sm-2">Vertical Buttons Alignment</label>
					<div class="col-sm-8">
						<input id="touchspin3" value="54">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-sm-2">Vertical Buttons (Custom Icons)</label>
					<div class="col-sm-8">
						<input id="touchspin4" value="872">
					</div>
				</div>
			</form>
		</div>
	</div>


</div>


                            </div> <!-- .container-fluid -->
                        </div> <!-- #page-content -->
                    </div>
                    <footer role="contentinfo">
    <div class="clearfix">
        <ul class="list-unstyled list-inline pull-left">
            <li><h6 style="margin: 0;"> &copy; 2015 Avenger</h6></li>
        </ul>
        <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="fa fa-arrow-up"></i></button>
    </div>
</footer>
                </div>
            </div>
        </div>


        <div class="infobar-wrapper scroll-pane">
            <div class="infobar scroll-content">

    <div id="widgetarea">

        <div class="widget" id="widget-sparkline">
            <div class="widget-heading">
                <a href="javascript:;" data-toggle="collapse" data-target="#sparklinestats"><h4>Sparkline Stats</h4></a>
            </div>
            <div id="sparklinestats" class="collapse in">
                <div class="widget-body">
                    <ul class="sparklinestats">
                        <li>
                            <div class="title">Earnings</div>
                            <div class="stats">$22,500</div>
                            <div class="sparkline" id="infobar-earningsstats" style="100%"></div>
                        </li>
                        <li>
                            <div class="title">Orders</div>
                            <div class="stats">4,750</div>
                            <div class="sparkline" id="infobar-orderstats" style="100%"></div>
                        </li>
                    </ul>
                    <a href="#" class="more">More Sparklines</a>
                </div>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <a href="javascript:;" data-toggle="collapse" data-target="#recentactivity"><h4>Recent Activity</h4></a>
            </div>
            <div id="recentactivity" class="collapse in">
                <div class="widget-body">
                    <ul class="recent-activities">
                        <li>
                            <div class="avatar">
                                <img src="http://placehold.it/300&text=Placeholder" class="img-responsive img-circle">
                            </div>
                            <div class="content">
                                <span class="msg"><a href="#" class="person">Jean Alanis</a> invited 3 unconfirmed members</span>
                                <span class="time">2 mins ago</span>
                                
                            </div>
                        </li>
                        <li>
                            <div class="avatar">
                                <img src="http://placehold.it/300&text=Placeholder" class="img-responsive img-circle">
                            </div>
                            <div class="content">
                                <span class="msg"><a href="#" class="person">Anthony Ware</a> is now following you</span>
                                <span class="time">4 hours ago</span>
                                
                            </div>
                        </li>
                        <li>
                            <div class="avatar">
                                <img src="http://placehold.it/300&text=Placeholder" class="img-responsive img-circle">
                            </div>
                            <div class="content">
                                <span class="msg"><a href="#" class="person">Bruce Ory</a> commented on <a href="#">Dashboard UI</a></span>
                                <span class="time">16 hours ago</span>
                            </div>
                        </li>
                        <li>
                            <div class="avatar">
                                <img src="http://placehold.it/300&text=Placeholder" class="img-responsive img-circle">
                            </div>
                            <div class="content">
                                <span class="msg"><a href="#" class="person">Roxann Hollingworth</a>is now following you</span>
                                <span class="time">Feb 13, 2015</span>
                            </div>
                        </li>
                    </ul>
                    <a href="#" class="more">See all activities</a>
                </div>
            </div>
        </div>

        <div class="widget" >
            <div class="widget-heading">
                <a href="javascript:;" data-toggle="collapse" data-target="#widget-milestones"><h4>Milestones</h4></a>
            </div>
            <div id="widget-milestones" class="collapse in">
                <div class="widget-body">
                    <div class="contextual-progress">
                        <div class="clearfix">
                            <div class="progress-title">UI Design</div>
                            <div class="progress-percentage">12/16</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-lime" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="contextual-progress">
                        <div class="clearfix">
                            <div class="progress-title">UX Design</div>
                            <div class="progress-percentage">8/24</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-orange" style="width: 33.3%"></div>
                        </div>
                    </div>
                    <div class="contextual-progress">
                        <div class="clearfix">
                            <div class="progress-title">Frontend Development</div>
                            <div class="progress-percentage">8/40</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-purple" style="width: 20%"></div>
                        </div>
                    </div>
                    <div class="contextual-progress m0">
                        <div class="clearfix">
                            <div class="progress-title">Backend Development</div>
                            <div class="progress-percentage">24/48</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" style="width: 50%"></div>
                        </div>
                    </div>
                    <a href="#" class="more">See All</a>
                </div>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <a href="javascript:;" data-toggle="collapse" data-target="#widget-contact"><h4>Contacts</h4></a>
            </div>
            <div id="widget-contact" class="collapse in">
                <div class="widget-body">
                    <ul class="contact-list">
                        <li id="contact-1">
                            <a href="javascript:;"><img src="http://placehold.it/300&text=Placeholder" alt=""><span>Jeremy Potter</span></a>
                            <!-- <div class="contact-card contactdetails" data-child-of="contact-1">
                                <div class="avatar">
                                    <img src="http://placehold.it/300&text=Placeholder" class="img-responsive img-circle">
                                </div>
                                <span class="contact-name">Jeremy Potter</span>
                                <span class="contact-status">Client Representative</span>
                                <ul class="details">
                                    <li><a href="#"><i class="fa fa-envelope-o"></i>&nbsp;p.bateman@gmail.com</a></li>
                                    <li><i class="fa fa-phone"></i>&nbsp;+1 234 567 890</li>
                                    <li><i class="fa fa-map-marker"></i>&nbsp;Hollywood Hills, California</li>
                                </ul>
                            </div> -->
                        </li>
                        <li id="contact-2">
                            <a href="javascript:;"><img src="http://placehold.it/300&text=Placeholder" alt=""><span>David Tennant</span></a>
                            <!-- <div class="contact-card contactdetails" data-child-of="contact-2">
                                <div class="avatar">
                                    <img src="http://placehold.it/300&text=Placeholder" class="img-responsive img-circle">
                                </div>
                                <span class="contact-name">David Tennant</span>
                                <span class="contact-status">Client Representative</span>
                                <ul class="details">
                                    <li><a href="#"><i class="fa fa-envelope-o"></i>&nbsp;p.bateman@gmail.com</a></li>
                                    <li><i class="fa fa-phone"></i>&nbsp;+1 234 567 890</li>
                                    <li><i class="fa fa-map-marker"></i>&nbsp;Hollywood Hills, California</li>
                                </ul>
                            </div> -->
                        </li>
                        <li id="contact-3">
                            <a href="javascript:;"><img src="http://placehold.it/300&text=Placeholder" alt=""><span>Anna Johansson</span></a>
                            <!-- <div class="contact-card contactdetails" data-child-of="contact-3">
                                <div class="avatar">
                                    <img src="http://placehold.it/300&text=Placeholder" class="img-responsive img-circle">
                                </div>
                                <span class="contact-name">Anna Johansson</span>
                                <span class="contact-status">Client Representative</span>
                                <ul class="details">
                                    <li><a href="#"><i class="fa fa-envelope-o"></i>&nbsp;p.bateman@gmail.com</a></li>
                                    <li><i class="fa fa-phone"></i>&nbsp;+1 234 567 890</li>
                                    <li><i class="fa fa-map-marker"></i>&nbsp;Hollywood Hills, California</li>
                                </ul>
                            </div> -->
                        </li>
                        <li id="contact-4">
                            <a href="javascript:;"><img src="http://placehold.it/300&text=Placeholder" alt=""><span>Alan Doyle</span></a>
                            <!-- <div class="contact-card contactdetails" data-child-of="contact-4">
                                <div class="avatar">
                                    <img src="http://placehold.it/300&text=Placeholder" class="img-responsive img-circle">
                                </div>
                                <span class="contact-name">Alan Doyle</span>
                                <span class="contact-status">Client Representative</span>
                                <ul class="details">
                                    <li><a href="#"><i class="fa fa-envelope-o"></i>&nbsp;p.bateman@gmail.com</a></li>
                                    <li><i class="fa fa-phone"></i>&nbsp;+1 234 567 890</li>
                                    <li><i class="fa fa-map-marker"></i>&nbsp;Hollywood Hills, California</li>
                                </ul>
                            </div> -->
                        </li>
                        <li id="contact-5">
                            <a href="javascript:;"><img src="http://placehold.it/300&text=Placeholder" alt=""><span>Simon Corbett</span></a>
                            <!-- <div class="contact-card contactdetails" data-child-of="contact-5">
                                <div class="avatar">
                                    <img src="http://placehold.it/300&text=Placeholder" class="img-responsive img-circle">
                                </div>
                                <span class="contact-name">Simon Corbett</span>
                                <span class="contact-status">Client Representative</span>
                                <ul class="details">
                                    <li><a href="#"><i class="fa fa-envelope-o"></i>&nbsp;p.bateman@gmail.com</a></li>
                                    <li><i class="fa fa-phone"></i>&nbsp;+1 234 567 890</li>
                                    <li><i class="fa fa-map-marker"></i>&nbsp;Hollywood Hills, California</li>
                                </ul>
                            </div> -->
                        </li>
                        <li id="contact-6">
                            <a href="javascript:;"><img src="http://placehold.it/300&text=Placeholder" alt=""><span>Polly Paton</span></a>
                            <!-- <div class="contact-card contactdetails" data-child-of="contact-6">
                                <div class="avatar">
                                    <img src="http://placehold.it/300&text=Placeholder" class="img-responsive img-circle">
                                </div>
                                <span class="contact-name">Polly Paton</span>
                                <span class="contact-status">Client Representative</span>
                                <ul class="details">
                                    <li><a href="#"><i class="fa fa-envelope-o"></i>&nbsp;p.bateman@gmail.com</a></li>
                                    <li><i class="fa fa-phone"></i>&nbsp;+1 234 567 890</li>
                                    <li><i class="fa fa-map-marker"></i>&nbsp;Hollywood Hills, California</li>
                                </ul>
                            </div> -->
                        </li>
                    </ul>
                    <a href="#" class="more">See All</a>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>


    
    <!-- Switcher -->
    <div class="demo-options">
        <div class="demo-options-icon"><i class="fa fa-spin fa-fw fa-smile-o"></i></div>
        <div class="demo-heading">Demo Settings</div>

        <div class="demo-body">
            <div class="tabular">
                <div class="tabular-row">
                    <div class="tabular-cell">Fixed Header</div>
                    <div class="tabular-cell demo-switches"><input class="bootstrap-switch" type="checkbox" checked data-size="mini" data-on-color="success" data-off-color="default" name="demo-fixedheader" data-on-text="I" data-off-text="O"></div>
                </div>
                <div class="tabular-row">
                    <div class="tabular-cell">Boxed Layout</div>
                    <div class="tabular-cell demo-switches"><input class="bootstrap-switch" type="checkbox" data-size="mini" data-on-color="success" data-off-color="default" name="demo-boxedlayout" data-on-text="I" data-off-text="O"></div>
                </div>
                <div class="tabular-row">
                    <div class="tabular-cell">Collapse Leftbar</div>
                    <div class="tabular-cell demo-switches"><input class="bootstrap-switch" type="checkbox" data-size="mini" data-on-color="success" data-off-color="default" name="demo-collapseleftbar" data-on-text="I" data-off-text="O"></div>
                </div>
                <div class="tabular-row">
                    <div class="tabular-cell">Collapse Rightbar</div>
                    <div class="tabular-cell demo-switches"><input class="bootstrap-switch" type="checkbox" checked data-size="mini" data-on-color="success" data-off-color="default" name="demo-collapserightbar" data-on-text="I" data-off-text="O"></div>
                </div>
                <div class="tabular-row hide" id="demo-horizicon">
                    <div class="tabular-cell">Horizontal Icons</div>
                    <div class="tabular-cell demo-switches"><input class="bootstrap-switch" type="checkbox" checked data-size="mini" data-on-color="primary" data-off-color="warning" data-on-text="S" data-off-text="L" name="demo-horizicons" ></div>
                </div>
            </div>

        </div>

        <div class="demo-body">
            <div class="option-title">Header Colors</div>
            <ul id="demo-header-color" class="demo-color-list">
                <li><span class="demo-white"></span></li>
                <li><span class="demo-black"></span></li>
                <li><span class="demo-midnightblue"></span></li>
                <li><span class="demo-primary"></span></li>
                <li><span class="demo-info"></span></li>
                <li><span class="demo-alizarin"></span></li>
                <li><span class="demo-green"></span></li>
                <li><span class="demo-violet"></span></li>                
                <li><span class="demo-indigo"></span></li> 
            </ul>
        </div>

        <div class="demo-body">
            <div class="option-title">Sidebar Colors</div>
            <ul id="demo-sidebar-color" class="demo-color-list">
                <li><span class="demo-white"></span></li>
                <li><span class="demo-black"></span></li>
                <li><span class="demo-midnightblue"></span></li>
                <li><span class="demo-primary"></span></li>
                <li><span class="demo-info"></span></li>
                <li><span class="demo-alizarin"></span></li>
                <li><span class="demo-green"></span></li>
                <li><span class="demo-violet"></span></li>                
                <li><span class="demo-indigo"></span></li> 
            </ul>
        </div>

        <div class="demo-body hide" id="demo-boxes">
            <div class="option-title">Boxed Layout Options</div>
            <ul id="demo-boxed-bg" class="demo-color-list">
                <li><span class="pattern-brickwall"></span></li>
                <li><span class="pattern-dark-stripes"></span></li>
                <li><span class="pattern-rockywall"></span></li>
                <li><span class="pattern-subtle-carbon"></span></li>
                <li><span class="pattern-tweed"></span></li>
                <li><span class="pattern-vertical-cloth"></span></li>
                <li><span class="pattern-grey_wash_wall"></span></li>
                <li><span class="pattern-pw_maze_black"></span></li>
                <li><span class="patther-wild_oliva"></span></li>
                <li><span class="pattern-stressed_linen"></span></li>
                <li><span class="pattern-sos"></span></li>
            </ul>
        </div>

    </div>
<!-- /Switcher -->
    <!-- Load site level scripts -->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->

<script type="text/javascript" src="{{asset('js/jquery-1.10.2.min.js')}}"></script> 							<!-- Load jQuery -->
<script type="text/javascript" src="{{asset('js/jqueryui-1.9.2.min.js')}}"></script> 							<!-- Load jQueryUI -->

<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script> 								<!-- Load Bootstrap -->


<script type="text/javascript" src="{{asset('plugins/easypiechart/jquery.easypiechart.js')}}"></script> 		<!-- EasyPieChart-->
<script type="text/javascript" src="{{asset('plugins/sparklines/jquery.sparklines.min.js')}}"></script>  		<!-- Sparkline -->
<script type="text/javascript" src="{{asset('plugins/jstree/dist/jstree.min.js')}}"></script>  				<!-- jsTree -->

<script type="text/javascript" src="{{asset('plugins/codeprettifier/prettify.js')}}"></script> 				<!-- Code Prettifier  -->
<script type="text/javascript" src="{{asset('plugins/bootstrap-switch/bootstrap-switch.js')}}"></script> 		<!-- Swith/Toggle Button -->

<script type="text/javascript" src="{{asset('plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js')}}"></script>  <!-- Bootstrap Tabdrop -->

<script type="text/javascript" src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>     					<!-- iCheck -->

<script type="text/javascript" src="{{asset('js/enquire.min.js')}}"></script> 									<!-- Enquire for Responsiveness -->

<script type="text/javascript" src="{{asset('plugins/bootbox/bootbox.js')}}"></script>							<!-- Bootbox -->

<script type="text/javascript" src="{{asset('plugins/simpleWeather/jquery.simpleWeather.min.js')}}"></script> <!-- Weather plugin-->

<script type="text/javascript" src="{{asset('plugins/nanoScroller/js/jquery.nanoscroller.min.js')}}"></script> <!-- nano scroller -->

<script type="text/javascript" src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.min.js')}}"></script> 	<!-- Mousewheel support needed for jScrollPane -->

<script type="text/javascript" src="{{asset('js/application.js')}}"></script>
<script type="text/javascript" src="{{asset('demo/demo.js')}}"></script>
<script type="text/javascript" src="{{asset('demo/demo-switcher.js')}}"></script>

<!-- End loading site level scripts -->
    
    <!-- Load page level scripts-->
    
<script type="text/javascript" src="{{asset('plugins/form-multiselect/js/jquery.multi-select.min.js')}}"></script>  			<!-- Multiselect Plugin -->
<script type="text/javascript" src="{{asset('plugins/quicksearch/jquery.quicksearch.min.js')}}"></script>           			<!-- Quicksearch to go with Multisearch Plugin -->
<script type="text/javascript" src="{{asset('plugins/form-typeahead/typeahead.bundle.min.js')}}"></script>                 	<!-- Typeahead for Autocomplete -->
<script type="text/javascript" src="{{asset('plugins/form-select2/select2.js')}}"></script>                    			<!-- Advanced Select Boxes -->
<script type="text/javascript" src="{{asset('plugins/form-autosize/jquery.autosize-min.js')}}"></script>            			<!-- Autogrow Text Area -->
<script type="text/javascript" src="{{asset('plugins/form-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script> 			<!-- Color Picker -->

<script type="text/javascript" src="{{asset('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}"></script> <!-- Touchspin -->

<script type="text/javascript" src="{{asset('plugins/form-fseditor/jquery.fseditor-min.js')}}"></script>            			<!-- Fullscreen Editor -->
<script type="text/javascript" src="{{asset('plugins/form-jasnyupload/fileinput.min.js')}}"></script>               			<!-- File Input -->
<script type="text/javascript" src="{{asset('plugins/form-tokenfield/bootstrap-tokenfield.min.js')}}"></script>     			<!-- Tokenfield -->
<script type="text/javascript" src="{{asset('plugins/switchery/switchery.js')}}"></script>     								<!-- Switchery -->

<script type="text/javascript" src="{{asset('plugins/card/lib/js/card.js')}}"></script> 										<!-- Card -->

<!-- <script type="text/javascript" src="assets/plugins/iCheck/icheck.min.js"></script>  -->    							<!-- iCheck // already included on site-level -->
<script type="text/javascript" src="{{asset('plugins/bootstrap-switch/bootstrap-switch.js')}}"></script>     					<!-- BS Switch -->

<script type="text/javascript" src="{{asset('plugins/jquery-chained/jquery.chained.min.js')}}"></script> 						<!-- Chained Select Boxes -->

<script type="text/javascript" src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.min.js')}}"></script> <!-- MouseWheel Support -->

<script type="text/javascript" src="{{asset('demo/demo-formcomponents.js')}}"></script>

<script type="text/javascript" src="{{asset('plugins/wijets/wijets.js')}}"></script>     							<!-- Wijet -->

    <!-- End loading page level scripts-->

    </body>
</html>