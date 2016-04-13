<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF Activity <small>Aktifitas</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'activity';?>">Activity</a></li>
			<li class="active">Data Activity</li>
		</ol>
	</section>
	<?php 
		# data activity
	if(!empty($activity)){
		$activity_id 			= $activity[0]['activity_id'];
		$activity_name	 		= $activity[0]['activity_name'];
		$activity_location		= $activity[0]['activity_location'];
		$activity_pic			= $activity[0]['activity_pic'];
		$activity_description 	= $activity[0]['activity_description'];
		$activity_image			= $activity[0]['activity_image'];
		$date_start 			= date('d/m/Y', strtotime($activity[0]['activity_date_start']));
		$time_start 			= date('H:i:s', strtotime($activity[0]['activity_date_start']));
		$date_end 				= date('d/m/Y', strtotime($activity[0]['activity_date_end']));
		$time_end 				= date('H:i:s', strtotime($activity[0]['activity_date_end']));
		$action = 'update';
	}else{
		$activity_id 			= '';
		$activity_name	 		= '';
		$activity_location		= '';
		$activity_pic			= $this->session->userdata('name');
		$activity_description 	= '';
		$activity_image			= '';
		$date_start 			= date('d/m/Y');
		$time_start 			= date('H:i:s');
		$date_end 				= date('d/m/Y');
		$time_end 				= date('H:i:s');
		$action = 'insert';
	}
	?>
	<section class="content">
		<form method="POST" action="<?php echo base_url().'activity/'.$action;?>" enctype="multipart/form-data">
		<input type="hidden" name="activity_id" value="<?php echo $activity_id;?>">
			<div class="row">
				<div class="col-md-9">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><i class="fa fa-file-text"></i> &nbsp;<?php echo $title ? $title : 'Buat Aktifitas';?></h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label>Nama Aktifitas</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-tasks"></i></div>
									<input type="text" name="activity_name" class="form-control" placeholder="Ex: Seminar <?php echo $activity_name; ?>" required value="<?php echo $activity_name; ?>">
								</div>
							</div>
							<div class="form-group">
								<label>Lokasi Aktifitas</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
									<input type="text" name="activity_location" class="form-control" placeholder="Ex: Rumah IB" required value="<?php echo $activity_location; ?>">
								</div>
							</div>
							<div class="form-group">
								<label>Keterangan Aktifitas</label>
								<textarea name="activity_description" class="form-control" rows="6" placeholder="Ex: Acaranya untuk umum" required><?php echo $activity_description; ?></textarea>
							</div>
							<div class="form-group">
								<label>Gambar/Banner</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-image"></i></div>
									<input type="file" name="activity_image" class="form-control" value="<?php echo $activity_image; ?>" >
								</div>
								<br>
								<?php if($action != 'insert'){ ?>
									<img src="<?php echo base_url().'assets/img/img_activity/'.$activity_image; ?>">
									<caption><?php echo $activity_image; ?></caption>
									<input type="hidden" name="current_image" value="<?php echo $activity_image; ?>" >
								<?php } ?>
							</div>
						</div>
					</div>
				</div>

				<!-- detail author and activity -->
				<div class="col-md-3">
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