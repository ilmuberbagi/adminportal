	<header class="main-header">
		<a href="index2.html" class="logo">
			<span class="logo-mini"><b>I</b>BF</span>
			<span class="logo-lg"><b>Portal</b>IBF</span>
		</a>

		<nav class="navbar navbar-static-top" role="navigation">
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>
          
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
				
					<li class="dropdown messages-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i><span class="label label-success">4</span></a>
						<ul class="dropdown-menu">
							<li class="header">You have 4 messages</li>
							<li>
								<ul class="menu">
									<li>
										<a href="#">
											<div class="pull-left"><img src="<?php echo base_url().'assets/img/admin.jpg';?>" class="img-circle" alt="User Image"></div>
											<h4>Support Team <small><i class="fa fa-clock-o"></i> 5 mins</small></h4>
											<p>Why not buy a new awesome theme?</p>
										</a>
									</li>
								</ul>
							</li>
							<li class="footer"><a href="#">See All Messages</a></li>
						</ul>
					</li>

					<li class="dropdown notifications-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-bell-o"></i>
							<span class="label label-warning">10</span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">You have 10 notifications</li>
							<li>
								<ul class="menu">
									<li><a href="#"><i class="fa fa-users text-aqua"></i> 5 new members joined today</a></li>
								</ul>
							</li>
							<li class="footer"><a href="#">View all</a></li>
						</ul>
					</li>
					
					<li class="dropdown tasks-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-flag-o"></i>
							<span class="label label-danger">9</span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">You have 9 tasks</li>
							<li>
								<ul class="menu">
								<li>
									<a href="#">
										<h3>Design some buttons <small class="pull-right">20%</small></h3>
										<div class="progress xs">
											<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">20% Complete</span>
											</div>
										</div>
									</a>
								</li>
								</ul>
							</li>
							<li class="footer"><a href="#">View all tasks</a></li>
						</ul>
					</li>

					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo base_url().'assets/img/admin.jpg';?>" class="user-image" alt="User Image">
							<span class="hidden-xs">Sabbana Azmi</span>
						</a>
						<ul class="dropdown-menu">
							<li class="user-header">
								<img src="<?php echo base_url().'assets/img/admin.jpg';?>" class="img-circle" alt="User Image">
								<p>Sabbana Azmi - Web Developer <small>Member since Nov. 2012</small></p>
							</li>
							<li class="user-body">
								<div class="col-xs-4 text-center"><a href="#">Followers</a></div>
								<div class="col-xs-4 text-center"><a href="#">Sales</a></div>
								<div class="col-xs-4 text-center"><a href="#">Friends</a></div>
							</li>
							<li class="user-footer">
								<div class="pull-left"><a href="#" class="btn btn-default btn-flat">Profile</a></div>
								<div class="pull-right"><a href="<?php echo base_url().'login/signout';?>" class="btn btn-default btn-flat">Sign out</a></div>
							</li>
						</ul>
					</li>
					<!-- Setting Control -->
					<li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li>
				</ul>
			</div>
		</nav>
	</header>
	  
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<section class="sidebar">
			<div class="user-panel">
				<div class="pull-left image">
					<img src="<?php echo base_url().'assets/img/admin.jpg';?>" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p>Sabbana Azmi</p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>

			<!-- search form (Optional) -->
			<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
          
			<!-- Sidebar Menu -->
			<ul class="sidebar-menu">
				<li class="header">MAIN MENU</li>
				<li class="<?php echo $this->uri->segment(1) == ''? 'active':'';?>"><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
				
				<li class="<?php echo $this->uri->segment(1) == 'member'? 'active':'';?>"><a href="<?php echo base_url().'member';?>"><i class="fa fa-users"></i> <span>Directory Member</span></a></li>
				
				<li class="<?php echo $this->uri->segment(1) == 'artikel'? 'active':'';?>"><a href="<?php echo base_url().'artikel';?>"><i class="fa fa-file-text"></i> <span>Artikel</span></a></li>
				
				<li><a href="#"><i class="fa fa-book"></i> <span>Jurnal</span></a></li>
				<li><a href="#"><i class="fa fa-shopping-cart"></i> <span>Market IB</span></a></li>
				<li><a href="#"><i class="fa fa-comments"></i> <span>Quote Berbagi</span></a></li>
				<li class="treeview">
					<a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="#">Link in level 2</a></li>
						<li><a href="#">Link in level 2</a></li>
					</ul>
				</li>
			</ul>
        </section>
	</aside>

