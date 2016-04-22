<aside class="main-sidebar">
		<section class="sidebar">
			<div class="user-panel">
				<div class="pull-left image">
					<img class="img-circle" src="<?php echo image_url($this->session->userdata('avatar'));?>" alt="">
				</div>
				<div class="pull-left info">
					<p><?php echo $this->session->userdata('name');?></p>
					<p></p><i class="fa fa-circle text-success"></i> Online<p></p>
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
				<li class="header"><marquee><i class="fa fa-flag"></i> MAIN MENU</marquee></li>
				<li class="<?php echo $this->uri->segment(1) == ''? 'active':'';?>"><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
								
				<li class="treeview <?php echo $this->uri->segment(1) == 'member'? 'active':'';?>">
					<a href="#"><i class="fa fa-users"></i> <span>Member</span> <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url().'member';?>"><i class="fa fa-arrow-circle-right"></i> Daftar Member</a></li>
						<li><a href="<?php echo base_url().'member/region';?>"><i class="fa fa-arrow-circle-right"></i>  Wilayah</a></li>
						<?php if($this->data['privilage']['app_1'] == 3){?>
						<li><a href="<?php echo base_url().'member/privilage';?>"><i class="fa fa-arrow-circle-right"></i>  Hak Akses</a></li>
						<?php } ?>
						<li><a href="<?php echo base_url().'member/type';?>"><i class="fa fa-arrow-circle-right"></i>  Status Member</i></a></li>
					</ul>
				</li>
				
				<li class="treeview <?php echo $this->uri->segment(1) == 'article'? 'active':'';?>">
					<a href="#"><i class="fa fa-file-text"></i> <span>Artikel</span> <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url().'article';?>"><i class="fa fa-arrow-circle-right"></i> Data Artikel</a></li>
						<li><a href="<?php echo base_url().'article/category';?>"><i class="fa fa-arrow-circle-right"></i>  Kategori Artikel</a></li>
					</ul>
				</li>
				
				<li class="<?php echo $this->uri->segment(1) == 'asset'? 'active':'';?>"><a href="<?php echo base_url().'asset';?>"><i class="fa fa-image"></i> <span>Aset Images</span></a></li>

				<li class="treeview <?php echo $this->uri->segment(1) == 'activity'? 'active':'';?>">
					<a href="#"><i class="fa fa-file-text"></i> <span>aktivitas</span> <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url().'activity';?>"><i class="fa fa-arrow-circle-right"></i> Data aktivitas</a></li>
					</ul>
				</li>

				
				<li><a href="#"><i class="fa fa-book"></i> <span>Journal</span></a></li>
				<li><a href="#"><i class="fa fa-comments"></i> <span>Quote</span></a></li>
				<li><a href="#"><i class="fa fa-shopping-cart"></i> <span>Market IB</span></a></li>
			</ul>
        </section>
	</aside>
	<?php #print_r($this->session->all_userdata());?>
