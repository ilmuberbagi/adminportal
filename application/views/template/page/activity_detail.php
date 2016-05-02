<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF Kegiatan <small>Kegiatan</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'activity';?>">Kegiatan</a></li>
			<li class="active">Data Kegiatan</li>
		</ol>
	</section>
	<?php 
		# data activity
	if(!empty($activity)){
		$activity_id 			= $activity[0]['activity_id'];
		$activity_name	 		= $activity[0]['activity_name'];
		$activity_location		= $activity[0]['activity_location'];
		$activity_goadd			= $activity[0]['activity_google_address'];
		$activity_lat			= $activity[0]['activity_lat'];
		$activity_long			= $activity[0]['activity_long'];
		$activity_pic			= $activity[0]['activity_pic'];
		$activity_description 	= $activity[0]['activity_description'];
		$activity_image			= $activity[0]['activity_image'];
		$activity_participant	= $activity[0]['activity_participant'];
		$date_start 			= date('d/m/Y', strtotime($activity[0]['activity_date_start']));
		$time_start 			= date('H:i:s', strtotime($activity[0]['activity_date_start']));
		$date_end 				= date('d/m/Y', strtotime($activity[0]['activity_date_end']));
		$time_end 				= date('H:i:s', strtotime($activity[0]['activity_date_end']));
		
		if ($activity_participant == 1){
			$checked1 	= 'checked';
			$checked2 	= '';
		} else{
			$checked1 	= '';
			$checked2 	= 'checked';
		}
		
		$action = 'update';
	}else{
		$activity_id 			= '';
		$activity_name	 		= '';
		$activity_location		= '';
		$activity_goadd			= '';
		$activity_lat			= '';
		$activity_long			= '';
		$activity_pic			= $this->session->userdata('name');
		$activity_description 	= '';
		$activity_image			= '';
		$date_start 			= date('d/m/Y');
		$time_start 			= date('H:i:s');
		$date_end 				= date('d/m/Y');
		$time_end 				= date('H:i:s');
		$checked1 				= '';
		$checked2 				= '';
		$action = 'insert';
	}
	?>
	<section class="content">
		<form method="POST" action="<?php echo base_url().'activity/'.$action;?>" enctype="multipart/form-data">
			<input type="hidden" name="activity_id" value="<?php echo $activity_id;?>">
			<div class="row">
				<div class="col-md-8">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><i class="fa fa-file-text"></i> &nbsp;<?php echo $title ? $title : 'Buat Kegiatan';?></h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label>Nama Kegiatan</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-tasks"></i></div>
									<input type="text" name="activity_name" class="form-control" placeholder="Ex: Seminar <?php echo $activity_name; ?>" required value="<?php echo $activity_name; ?>">
								</div>
							</div>
							<div class="form-group">
								<label>Lokasi Kegiatan</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-home"></i></div>
									<input type="text" name="activity_location" class="form-control" placeholder="Ex: Rumah IB" required value="<?php echo $activity_location; ?>">
								</div>
							</div>
							
							<div class="form-group">
								<label><b>Google Address</b> <span>*</span></label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
									<input id="googleAddress" type="text" size="50" placeholder="Masukkan Alamat Kota atau Jalan" autocomplete="on" runat="server" class="form-control" required />  
									<input type="hidden" id="city" name="city" value="<?php echo $activity_goadd; ?>"/>
									<input type="hidden" id="lat" name="lat" value="<?php echo $activity_lat; ?>"/>
									<input type="hidden" id="long" name="long" value="<?php echo $activity_long; ?>" />  
								</div>
								<div id="map_canvas" style="width: 690px; height: 200px; text-align:center; border:solid 1px #DDD; font-size:4em; padding-top:20px">
									<p style="color:#BBB;">Google Location</p>
								</div> 
							</div>

							<div class="form-group">
								<label>Keterangan Kegiatan</label>
								<textarea name="activity_description" class="form-control" rows="6" placeholder="Ex: Acaranya untuk umum" required><?php echo $activity_description; ?></textarea>
							</div>
							<div class="form-group">
								<label>Image Cover</label>
								<div class="input-group">
									<div class="input-group-addon" data-toggle="modal" data-target="#modalImages" style="cursor:pointer" onclick="return image_list()"><i class="fa fa-image"></i></div>
									<input type="url" name="activity_image" id="activity_image" class="form-control" value="<?php echo $activity_image;?>" placeholder="Klik pada icon untuk memilih asset gambar">
								</div>
							</div>
							<div id="previewBox">
								<div class="box-tools pull-right">
									<div class="btn btn-box-tool" id="closeButton" data-toggle="tooltip" title="Hapus gambar"><i class="fa fa-times"></i></div>
								</div>
								<img id="image_current" src="<?php echo $activity_image;?>">
							</div>


							<!-- <div class="form-group">
								<label>Gambar/Banner</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-image"></i></div>
									<input type="file" name="activity_image" onchange="imagePreview(this);" class="form-control" value="<?php echo $activity_image; ?>" >
								</div>
									<img id="imgPreview" style="max-width:690px; padding:1px; border:solid 1px #DDD">
								<br>
								<?php if($action == 'update' && !empty($activity_image) ){ ?>
								<div id="current_image">
									<img src="<?php echo base_url().'assets/img/img_activity/'.$activity_image; ?>">
									<caption><?php echo $activity_image; ?></caption>
									<input type="hidden" name="current_image" value="<?php echo $activity_image; ?>" >
								</div>
								<?php } else { ?>
									<p>Tidak ada foto </p>
								<?php }?>
							</div> -->
						</div>
					</div>
				</div>

				<!-- detail author and activity -->
				<div class="col-md-4">
					<div class="box">
						<div class="box-header with-border"></div>
						<div class="box-body">
							<div class="form-group">
								<label>Penganggung Jawab</label>
								<!-- <input type="hidden" name="activity_author" > -->
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-male"></i></div>
									<input type="text" name="activity_pic" class="form-control" placeholder="Ex: <?php echo $activity_pic;?>" required value="<?php echo $activity_pic; ?>">
								</div>
							</div>
							<div class="form-group">
								<label>Tanggal Mulai</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
									<input type="text" name="date_start" class="form-control datepicker" value="<?php echo $date_start;?>" required>
								</div>
							</div>
							<div class="form-group">
								<label>Waktu Mulai</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
									<input type="text" name="time_start" class="form-control" value="<?php echo $time_start;?>" required>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<label>Tanggal Selesai</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
									<input type="text" name="date_end" class="form-control datepicker" value="<?php echo $date_end;?>" required>
								</div>
							</div>
							<div class="form-group">
								<label>Waktu Selesai</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
									<input type="text" name="time_end" class="form-control" value="<?php echo $time_end;?>" required>
								</div>
							</div>
							<div class="form-group">
								<label>Sertakan Formulir Partisipan</label>
								<div class="i-checks">
									<label><input type="radio" name="is_participant" value="1" <?php echo $checked1; ?> > Ya </label>
								</div>
								<div class="i-checks">
									<label><input type="radio" name="is_participant" value="0" <?php echo $checked2; ?> > Tidak </label>
								</div>
							</div>
							<div class="form-action">
								<input type="reset" name="reset" value="Cancel" class="btn btn-default">
								<input type="submit" name="submit" value="Save" class="btn btn-primary">
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>


<!-- modal images -->
<div id="modalImages" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
				<h4 class="modal-title"><i class="fa fa-image"></i> Select Image Asset</h4>
			</div>
			<div class="modal-body" id="image-content">
				<div id="loadingDiv" style="text-align:center"><i class="fa fa-spinner fa-spin fa-3x"></i></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>