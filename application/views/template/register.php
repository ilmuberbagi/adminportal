<!DOCTYPE html>
<html class="ng-scope">
<head>
	<title><?php echo isset($title) ? $title : 'Portal Ilmu Berbagi Foundation';?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/ionicons.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/AdminLTE.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/skins/skin-red.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/custom.css';?>">
    <?php $this->load->view("template/meta_top/register");?>

</head>
<body class="hold-transition login">
	<div class="row">
		<div class="col-md-3 hidden-xs hidden-sm hidden-md">
			&nbsp;
		</div>
		<div class="col-md-12 col-xs-12 col-sm-12 col-lg-10 bg-white">
			<?php if($this->session->flashdata('success') != ''){?>
				<div class="callout callout-success">
					<h4>Success</h4>
					<p><?php echo $this->session->flashdata('success');?></p>
				</div>
			<?php } ?>
			<form action="<?php echo base_url().'login/proc_register';?>" method="POST">
				<div class="row">
					<div class="col-md-12">
						<div class="login-logo"><a href="<?php echo base_url();?>"><b>PORTAL</b>IBF</a></div>
						<p class="login-box-msg">Register Member Ilmu Berbagi Foundation</p>
						<div class="col-md-4">
							<h5 class="title">Informasi Umum tentang anggota</h5>
							<div class="form-group">
								<label>Nama Lengkap <span>*</span></label>
								<input type="text" name="member_name" class="form-control" placeholder="Member Name" required>
							</div>
							<div class="form-group">
								<label>Tempat Lahir <span>*</span></label>
								<input type="text" name="member_birthplace" class="form-control" placeholder="Ex: Yogyakarta" required>
							</div>				
							<div class="form-group">
								<label>Tanggal Lahir<span>*</span></label>
								<input type="text" name="member_birthdate" class="form-control datepicker" placeholder="Ex: 17/08/1945" required>
							</div>
							<div class="form-group">
								<label>Jenis Kelamin <span>*</span></label><br/>
								<label><input type="radio" name="member_gender" class="minimal" value="1" checked></label> Laki-laki
								<label><input type="radio" name="member_gender" class="minimal" value="0"></label> Perempuan
							</div>
							<div class="form-group">
								<label>Pendidikan <span>*</span></label>
								<input type="text" name="member_education" class="form-control" placeholder="Ex: S1 Ilmu Kedokteran">
							</div>
							<div class="form-group">
								<label>Pekerjaan</label>
								<input type="text" name="member_job" class="form-control" placeholder="Ex: Guru/IT Developer dll">
							</div>				
							<div class="form-group">
								<label>Keahlian</label> - <small>Pisahkan keahlian dengan koma</small>
								<input type="text" name="member_skills" class="form-control" data-role="tagsinput" placeholder="Ex: Developer, Marketting, Desainer">
							</div>
							<div class="form-group">
								<label>Tentang Anda</label>
								<textarea name="member_description" class="form-control" placeholder="Sekilas tentang Anda"></textarea>
							</div>
						</div>
						
						<!-- sosial media -->
						<div class="col-md-4">
							<h5 class="title">Status Keanggotaan</h5>
							<div class="form-group">
								<label>Wilayah</label>
								<select name="member_region" class="form-control select2" required>
									<?php if(!empty($region)){ foreach($region as $r){?>
									<option value="<?php echo $r['region_id'];?>"><?php echo $r['region_name'];?></option>
									<?php }} ?>
								</select>
							</div>
							<div class="form-group">
								<label>Status</label>
								<select name="member_type" class="form-control select2" placeholder="Bisa lebih dari satu" multiple required>
									<?php if(!empty($types)){ foreach($types as $t){?>
									<option value="<?php echo $t['type_id'];?>"><?php echo $t['member_type'];?></option>
									<?php }} ?>
								</select>
							</div>
							<h5 class="title">Informasi Kontak</h5>
							<div class="form-group">
								<label>Nomor HP/Telepon <span>*</span></label>
								<input type="phone" name="member_phone" class="form-control" placeholder="Ex: +6285770427123" required>
							</div>
							<div class="form-group">
								<label>Email <span>*</span></label>
								<input type="email" name="member_email" class="form-control" placeholder="Ex: member@gmail.com" required>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea name="member_address" class="form-control" placeholder="Ex: Jl. Pandegasiwi Sleman Yogyakarta"></textarea>
							</div>
							<h5 class="title">Informasi Jejaring Sosial</h5>
							<div class="form-group">
								<label>Facebook</label>
								<input type="url" name="member_fb" class="form-control" placeholder="Ex: http://facebook.com/ilmuberbagi">
							</div>
							<div class="form-group">
								<label>Twitter</label>
								<input type="url" name="member_twitter" class="form-control" placeholder="Ex: http://twitter.com/ilmuberbagi">
							</div>
							<div class="form-group">
								<label>Website/Blog</label>
								<input type="url" name="member_website" class="form-control" placeholder="Ex: http://ilmuberbagi.or.id">
							</div>
						</div>
						<!-- account -->
						<div class="col-md-4">
							<h5 class="title">Informasi Lain</h5>
							<div class="form-group">
								<label>Alasan Berbagung</label>
								<textarea name="member_reason" class="form-control" placeholder="Ex: Deskripsikan secara singkat alasan Anda bergabung dengan Ilmu Berbagi Foundation"></textarea>
							</div>
							<h5 class="title">Informasi Akun</h5>
							<div class="form-group">
								<label>Username <span>*</span></label>
								<input type="text" name="member_username" class="form-control" placeholder="username">
							</div>
							<div class="form-group">
								<label>Password <span>*</span></label>
								<input type="password" name="member_password" class="form-control" placeholder="8 - 12 digit" min="8" max="12">
							</div>
							<div class="form-group">
								<label>Ulangi Password</label>
								<input type="password" name="member_repassword" class="form-control" placeholder="**********">
							</div>
							<div class="form-action">
								<input type="reset" name="reset" class="btn btn-default" value="Batal">
								<input type="submit" name="submit" class="btn btn-danger" value="Register">
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

    <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <?php $this->load->view("template/meta_bottom/register");?>

</body>
</html>
