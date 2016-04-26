<div class="content-wrapper">
	<section class="content-header">
		<h1>Dashboard <small>IBF Online Features</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		</ol>
	</section>

	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-globe"></i> Layanan Online</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<!-- member -->
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3><?php echo number_format($count_member);?></h3>
								<p>Member</p>
							</div>
							<div class="icon">
								<i class="fa fa-users"></i>
							</div>
							<a href="<?php echo base_url().'member';?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- articles -->
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-green">
							<div class="inner">
								<h3><?php echo number_format($count_article);?></h3>
								<?php if($this->data['privilage']['app_2'] > 1){?>
								<p>Semua Artikel</p>
								<?php }else{?>
								<p>Artikel Anda</p>
								<?php } ?>
							</div>
							<div class="icon">
								<i class="fa fa-file-text"></i>
							</div>
							<a href="<?php echo base_url().'article';?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- quotes -->
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-yellow">
							<div class="inner">
								<h3>0</h3>
								<p>Aktivitas</p>
							</div>
							<div class="icon">
								<i class="fa fa-comments"></i>
							</div>
							<a href="<?php echo base_url().'activity';?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>

					<!-- journal -->
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-red">
							<div class="inner">
								<h3>0</h3>
								<p>Agenda</p>
							</div>
							<div class="icon">
								<i class="fa fa-book"></i>
							</div>
							<a href="<?php echo base_url().'activity';?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>