<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF Assets <small>Media </small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'asset';?>">Assets</a></li>
			<li class="active">Images</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-image"></i> IBF Asset</h3>
				<div class="box-tools pull-right">
					<a href="<?php echo base_url().'asset/upload';?>" class="btn btn-default" data-toggle="tooltip" title="Upload Media"><i class="fa fa-cloud-upload"></i></a>
					<button class="btn" data-widget="collapse" data-tooltip="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn" data-widget="remove" data-tooltip="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<?php if(!empty($images)){ foreach($images as $img){?>
					<div class="col-lg-2 col-md-2 col-xs-6 thumb" data-value="<?php echo $img['asset_url'] ? $img['asset_url']:$img['asset_url_thumb'];?>">
						<a class="thumbnail">
							<img class="img-responsive" src="<?php echo $img['asset_url_thumb'] ? $img['asset_url_thumb']:'http://placehold.it/400x300';?>" alt="">
						</a>
					</div>
					<?php }?>
					<div class="col-lg-12">
						<?php echo $paging;?>
					</div>
					<?php }else{?>
					<div class="col-lg-12">
						<div class="callout">
							<div class="text-bold">Ups!</div>
							<p>Belum ada asset (images) yang dapat ditampilkan...</p>
						</div>
					</div>
					<?php }?>
				</div>
				<hr/>
				<div class="row copy" style="display:none">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Image URL</label>
							<input type="text" id="url" class="form-control">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Image Thumb URL</label>
							<input type="text" id="url_thumb" class="form-control">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- modal wilayah -->
<div id="modalWilayah" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-map"></i> Wilayah</h4>
			</div>
			<form method="POST" action="<?php echo base_url().'member/sv_region';?>">
			<input type="hidden" name="app_id" id="app_id">
			<input type="hidden" name="member_id" id="uid">
			<div class="modal-body">
				<div class="form-group">
					<label>Nama Wilayah</label><br/>
					<input type="text" name="region_name" class="form-control" placeholder="Nama Wilayah" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-danger" value="Simpan">
			</div>
			</form>
		</div>
	</div>
</div>
