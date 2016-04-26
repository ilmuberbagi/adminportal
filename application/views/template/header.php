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
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i><span class="label label-success">0</span></a>
						<ul class="dropdown-menu">
							<li class="header">Belum ada pesan masuk</li>
							<li class="footer"><a href="#">Lihat semua pesan</a></li>
						</ul>
					</li>

					<li class="dropdown notifications-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-users"></i>
							<span class="label label-warning">0</span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">Belum ada member baru</li>
							<li class="footer"><a href="#">Lihat semua member</a></li>
						</ul>
					</li>
					
					<li class="dropdown tasks-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-flag-o"></i>
							<span class="label label-danger">0</span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">Belum ada artikel baru</li>
							<li class="footer"><a href="#">Lihat semua artikel</a></li>
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
								<p><?php echo $this->session->userdata('name').' - '.$this->session->userdata('type');?> <small>Member since : <?php echo $this->session->userdata('year');?></small></p>
							</li>
							<li class="user-body">
								<a href="<?php echo base_url().'member/changepassword';?>" class="btn"><i class="fa fa-key"></i> Change Password</a>
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
	<?php $this->load->view('template/inc/menu');?>
