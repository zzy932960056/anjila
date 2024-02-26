<?php
	@session_start();
?>
<div class="header navbar navbar-inverse navbar-fixed-top">

		<!-- BEGIN TOP NAVIGATION BAR -->

		
		<div class="navbar-inner">

			<div class="container-fluid">

				<!-- BEGIN LOGO -->

				<a class="brand" href="/admin/adminindex">

				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp安吉拉网站后台

				</a>

				<!-- END LOGO -->

				<!-- BEGIN RESPONSIVE MENU TOGGLER -->

				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

				<img src="{{ URL::asset('/image/menu-toggler.png') }}" alt="" />

				</a>          

				<!-- END RESPONSIVE MENU TOGGLER -->            

				<!-- BEGIN TOP NAVIGATION MENU -->              

				<ul class="nav pull-right">




					<!-- BEGIN USER LOGIN DROPDOWN -->

					<li class="dropdown user">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<img alt="" src="{{ URL::asset('/image/avatar1_small.jpg') }}" />

						<span class="username">{{$_SESSION['admin_name']}}</span>

						<i class="icon-angle-down"></i>

						</a>

						<ul class="dropdown-menu">

							<li><a href="/admin/update"><i class="icon-user"></i> 设置 </a></li>

							<li><a href="/admin/lock"><i class="icon-lock"></i> 锁屏 </a></li>

							<li><a href="/admin/logout"><i class="icon-key"></i> 登出 </a></li>

						</ul>

					</li>

					<!-- END USER LOGIN DROPDOWN -->

				</ul>

				<!-- END TOP NAVIGATION MENU --> 

			</div>

		</div>

		<!-- END TOP NAVIGATION BAR -->

	</div>