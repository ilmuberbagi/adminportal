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
		<div class="row">
			<div class="col-md-12" id="img-content">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-image"></i> Media Asset Ilmu Berbagi</h3>
						<div class="box-tools pull-right">
							<a href="<?php echo base_url().'asset/upload';?>" class="btn btn-default" data-toggle="tooltip" title="Upload Media"><i class="fa fa-cloud-upload"></i> Upload Media</a>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-lg-12">
								<?php if(!empty($images)){ foreach($images as $img){?>
								<div class="col-lg-2 col-md-2 col-xs-6 thumb" data-value="<?php echo $img['asset_url'] ? $img['asset_url']:$img['asset_url_thumb'];?>#<?php echo $img['asset_url_thumb'] ? $img['asset_url_thumb']:$img['asset_url'];?>">
									<div class="thumbnail">
										<img class="img-responsive" src="<?php echo $img['asset_url_thumb'] ? $img['asset_url_thumb']:'http://placehold.it/400x300';?>" alt="">
									</div>
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
						</div>
					</div>
				</div>
			</div>
			<!-- attribut -->
			<div class="col-md-4" id="img-attribut" style="display:none">		
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-list"></i> Image Attribut</h3>
					</div>
					<div class="box-body">					
						<div class="form-group">
							<label>Image URL</label>
							<textarea id="url" class="form-control"></textarea>
						</div>
					
						<div class="form-group">
							<label>Image Thumb URL</label>
							<textarea id="url_thumb" class="form-control"></textarea>
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
