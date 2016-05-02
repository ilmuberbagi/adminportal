<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF Partner <small>Partner</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'partner';?>">Partner</a></li>
			<li class="active">Data Partner</li>
		</ol>
	</section>
	<?php 
		# data partner
	if(!empty($partner)){
		$partner_id 			= $partner[0]['partner_id'];
		$partner_name	 		= $partner[0]['partner_name'];
		$company		 		= $partner[0]['company'];
		$company_logo	 		= $partner[0]['company_logo'];
		$phone 			 		= $partner[0]['phone'];
		$email 			 		= $partner[0]['email'];
		$action = 'update';
	}else{
		$partner_id 			= '';
		$partner_name	 		= '';
		$company		 		= '';
		$company_logo	 		= '';
		$phone 			 		= '';
		$email 			 		= '';
		$action = 'insert';
	}
	?>
	<section class="content">
		<form method="POST" action="<?php echo base_url().'partner/'.$action;?>" enctype="multipart/form-data">
			<input type="hidden" name="partner_id" value="<?php echo $partner_id;?>">
			<div class="row">
				<div class="col-md-8">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><i class="fa fa-file-text"></i> &nbsp;<?php echo $title ? $title : 'Buat Partner';?></h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label>Nama Partner</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-user"></i></div>
									<input type="text" name="partner_name" class="form-control" placeholder="Ex: Ilmu Berbagi Jogja" required value="<?php echo $partner_name; ?>">
								</div>
							</div>
							<div class="form-group">
								<label>Instansi</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-home"></i></div>
									<input type="text" name="company" class="form-control" placeholder="Ex: Ilmu Berbagi Foundation" required value="<?php echo $company; ?>">
								</div>
							</div>
							<div class="form-group">
								<label>Logo Instansi</label>
								<div class="input-group">
									<div class="input-group-addon" onclick="chooseFile();"><i class="fa fa-image"></i></div>
									<input type="file" id="company_logo" name="company_logo" style="display:none;" >
									<input type="text" id="name_logo" name="name_logo" class="form-control" placeholder="Klik pada icon untuk menambahkan gambar" readonly value="<?php echo $company_logo;?>">
								</div>
							</div>
							<div id="previewBox">
								<div class="box-tools pull-right">
									<div class="btn btn-box-tool" id="closeButton" data-toggle="tooltip" title="Hapus gambar"><i class="fa fa-times"></i></div>
								</div>
								<img id="image_current" src="<?php echo base_url()?>assets/img/partner/<?php echo $company_logo;?>">
							</div>
						</div>
					</div>
				</div>

				<!-- detail author and partner -->
				<div class="col-md-4">
					<div class="box">
						<div class="box-header with-border"></div>
						<div class="box-body">
							<div class="form-group">
								<label>Telepon/Hp</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-phone"></i></div>
									<input type="phone" name="phone" class="form-control" placeholder="Ex: +6285770427123" required value="<?php echo $phone; ?>">
								</div>
							</div>
							<div class="form-group">
								<label>Email</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
									<input type="email" name="email" class="form-control" placeholder="Ex: member@gmail.com" required value="<?php echo $email; ?>">
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