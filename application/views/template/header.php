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
							<img class="user-image" src="<?php echo image_url($this->session->userdata('avatar'));?>" alt="">
							<span class="hidden-xs"><?php echo $this->session->userdata('name');?></span>
						</a>
						<ul class="dropdown-menu">
							<li class="user-header">
								<img class="img-circle" src="<?php echo image_url($this->session->userdata('avatar'));?>" alt="">
								<p><?php echo $this->session->userdata('name').' - '.$this->session->userdata('type');?> <small>Member since : <?php echo date('M Y');?></small></p>
							</li>
							<li class="user-body">
								<a href="#" class="btn btn-success btn-flat">Change Password</a>
							</li>
							<li class="user-footer">
								<div class="pull-left"><a href="<?php echo base_url().'member/'.$this->session->userdata('ibf_code');?>" class="btn btn-default btn-flat">Profile</a></div>
								<div class="pull-right"><a href="<?php echo base_url().'login/signout';?>" class="btn btn-default btn-flat">Sign out</a></div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	  
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<section class="sidebar">
			<div class="user-panel">
				<div class="pull-left image">
					<img class="img-circle" src="<?php echo image_url($this->session->userdata('avatar'));?>" alt="" style="width:120px; height:50px">
				</div>
				<div class="pull-left info">
					<p><?php echo $this->session->userdata('name');?></p>
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
								
				<li class="treeview <?php echo $this->uri->segment(1) == 'member'? 'active':'';?>">
					<a href="#"><i class="fa fa-users"></i> <span>Member</span> <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url().'member';?>"><i class="fa fa-arrow-circle-right"></i> Daftar Member</a></li>
						<li><a href="<?php echo base_url().'member/region';?>"><i class="fa fa-arrow-circle-right"></i>  Wilayah</a></li>
						<li><a href="<?php echo base_url().'member/privilage';?>"><i class="fa fa-arrow-circle-right"></i>  Hak Akses</a></li>
						<li><a href="<?php echo base_url().'member/type';?>"><i class="fa fa-arrow-circle-right"></i>  Status Member</i></a></li>
					</ul>
				</li>
				
				<li class="treeview <?php echo $this->uri->segment(1) == 'article'? 'active':'';?>">
					<a href="#"><i class="fa fa-file-text"></i> <span>Artikel</span> <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url().'article';?>"><i class="fa fa-arrow-circle-right"></i> Data Artikel</a></li>
						<li><a href="<?php echo base_url().'article/category';?>"><i class="fa fa-arrow-circle-right"></i>  Kategori Artikel</a></li>
						<li><a href="<?php echo base_url().'article/image';?>"><i class="fa fa-arrow-circle-right"></i>  Aset Images</i></a></li>
					</ul>
				</li>

				
				<li><a href="#"><i class="fa fa-book"></i> <span>Journal</span></a></li>
				<li><a href="#"><i class="fa fa-comments"></i> <span>Quote</span></a></li>
				<li><a href="#"><i class="fa fa-shopping-cart"></i> <span>Market IB</span></a></li>
			</ul>
        </section>
	</aside>

