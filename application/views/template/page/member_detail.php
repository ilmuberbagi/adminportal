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
			<div class="col-md-3">
				<div class="box box-danger">
					<div class="box-body box-profile">
						<img class="profile-user-img img-responsive img-circle" src="<?php echo image_url($member[0]['member_image_profile']);?>" alt="User profile picture" height="100" width="100">
						<h3 class="profile-username text-center"><?php echo $member[0]['member_name'];?></h3>
						<p class="text-muted text-center">
							<?php 
								if($member[0]['member_type'] !== ""){
									$mt = json_decode($member[0]['member_type']);
									for($a=0; $a<count($mt); $a++){
										echo "<i class='fa fa-arrow-circle-right'></i> ".$mt[$a]."<br/>";
									}
								}
							?>
						</p>
						<ul class="list-group list-group-unbordered">
							<li class="list-group-item"><b>Article</b><span class="badge badge-primary pull-right"><?php echo $this->lib_general->count_article_by_user($member[0]['member_id']);?></span></li>
							<li class="list-group-item"><b>Quote</b> <span class="badge badge-primary pull-right"><?php echo $this->lib_general->count_article_by_user($member[0]['member_id']);?></span></li>
							<li class="list-group-item"><b>Komentar</b> <span class="badge badge-primary pull-right"><?php echo $this->lib_general->count_article_by_user($member[0]['member_id']);?></span></li>
						</ul>
						<?php if($this->session->userdata('id') == $member[0]['member_id']){?>
							<a href="<?php echo base_url().'member/edit/'.$member[0]['member_ibf_code'];?>" class="btn btn-primary btn-block"><b><i class="fa fa-edit"></i> Perbaharui</b></a>
						<?php } ?>
					</div>
				</div>
			</div>
			
			<div class="col-md-9">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#biodata" data-toggle="tab">Biodata</a></li>
						<li><a href="#article" data-toggle="tab">Artikel</a></li>
						<li><a href="#quote" data-toggle="tab">Quote</a></li>
					</ul>
					<div class="tab-content">
						<!-- biodata / detail member -->
						<div class="active tab-pane" id="biodata">
							<div class="row">
								<div class="col-md-6">
									<table class="table table-striped">
									<tr><td><b><i class="fa fa-book"></i> Pendidikan:</b><br/><?php echo $member[0]['member_education'];?></td></tr>
									<tr><td><b><i class="fa fa-building"></i> Pekerjaan:</b><br/><?php echo $member[0]['member_job'];?></td></tr>
									<tr><td><b><i class="fa fa-pencil"></i> Keahlian:</b><br/>
									<?php 
											if($member[0]['member_skills'] !== ""){
												$label = array('primary','info','success','warning','danger');
												$skills = explode(',',$member[0]['member_skills']);
												for($a=0; $a<count($skills); $a++){
													$str = $a > 4 ? $label[rand(0,4)]: $label[$a];
													echo '<span style="margin:2px" class="label label-'.$str.'">'.$skills[$a].'</span>';
												}
											}else{
												echo '-----';
											}
										?></td></tr>
									</table>
								</div>
								<div class="col-md-6">
									
								</div>
							</div>
						</div>

						<!-- artikel member -->
						<div class="tab-pane" id="article">  
							<?php if(!empty($articles)){ foreach($articles as $ar){?>
							<div class="">
								<label><a href="<?php echo base_url().'article/'.$ar['article_id'];?>"><?php echo $ar['article_title'];?></a></label>
								<div class=""><?php echo get_image_from_content($ar['article_content']).' '.headline($ar['article_content']);?></div>
							</div>
							<?php }}else{ echo "Belum ada artikel yang dapat ditampilkan."; } ?>
						</div>

						<div class="tab-pane" id="quote">                
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
</div>