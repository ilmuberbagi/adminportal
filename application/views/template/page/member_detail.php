<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF Member <small>The awesome peoples</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'member';?>">Member</a></li>
			<li class="active"><?php echo $member[0]['member_name'];?></li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-4">
				<div class="box box-danger">
					<div class="box-body box-profile">
						<img class="profile-user-img img-responsive img-circle" src="<?php echo image_url($member[0]['member_image_profile']);?>" alt="User profile picture" height="100" width="100">
						<h3 class="profile-username text-center"><?php echo $member[0]['member_name'];?></h3>
						<p class="text-muted text-center"><?php echo $member[0]['member_job'];?></p>
						<ul class="list-group list-group-unbordered">
							<li class="list-group-item"><b>Article</b> <a class="pull-right">1,322</a></li>
							<li class="list-group-item"><b>Comments</b> <a class="pull-right">13,287</a></li>
							<li class="list-group-item"><b>Quote</b> <a class="pull-right">543</a></li>
						</ul>
						<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
					</div>
				</div>
				<!-- About Me Box -->
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Detail Member</h3>
					</div>
					<div class="box-body">
						<strong><i class="fa fa-book margin-r-5"></i> Education</strong>
						<p class="text-muted">
							<?php echo $member[0]['member_education'] ? $member[0]['member_education']:'-----';?>
						</p>
						<hr>
						
						<strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
						<p class="text-muted"><?php echo $member[0]['member_address']? $member[0]['member_address']:'-----';?></p>
						<hr>
						<strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
						<p>
							<?php 
								if($member[0]['member_skills'] !== ""){
									$label = array('primary','info','success','warning','danger');
									$skills = explode(',',$member[0]['member_skills']);
									for($a=0; $a<count($skills); $a++){
										echo '<span class="label label-'.$label[$a].'">'.$skills[$a].'</span> ';
									}
								}else{
									echo '-----';
								}
							?>
						</p>
						<hr>
						<strong><i class="fa fa-file-text-o margin-r-5"></i> Note</strong>
						<p><?php echo $member[0]['member_description'];?></p>
					</div>
				</div>
			</div>
			
			<!-- /.col -->
			<div class="col-md-8">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#activity" data-toggle="tab">Articles</a></li>
						<li><a href="#timeline" data-toggle="tab">Comments</a></li>
						<li><a href="#settings" data-toggle="tab">Settings</a></li>
					</ul>
					
					<div class="tab-content">
						<div class="active tab-pane" id="activity">
							<?php if(!empty($articles)){ foreach($articles as $ar){?>
							<div class="">
								<label><a href="<?php echo base_url().'article/'.$ar['article_id'];?>"><?php echo $ar['article_title'];?></a></label>
								<div class=""><?php echo headline($ar['article_content']);?></div>
							</div>
							<?php }}else{ echo "No article can be display."; } ?>
						</div>
					</div>
					
					<div class="tab-pane" id="timeline">
					
					</div>

					<div class="tab-pane" id="settings">
					
					</div>
					
				</div>
			</div>
		</div>
	</section>
</div>