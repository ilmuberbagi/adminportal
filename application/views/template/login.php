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
</head>
<body class="hold-transition login">
	<div class="row">
		<div class="col-md-8 hidden-xs hidden-sm hidden-md">
			&nbsp;
		</div>
		<div class="col-md-4 col-xs-12 col-sm-6 bg-white">
			<div class="login-box">
				<div class="login-logo"><a href="<?php echo base_url();?>"><b>PORTAL</b>IBF</a></div>
				<div class="login-box-body">
					<p class="login-box-msg">Silakan masuk untuk menggunakan Layanan Kami</p>
					<?php echo $this->session->flashdata('invalid');?>
					<form action="<?php echo base_url().'auth';?>" method="post">
						<input type="hidden" name="app" value="portal">
						<div class="form-group has-feedback">
							<input type="text" class="form-control" name="username" placeholder="Username atau Email" required>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<div class="checkbox">
									<label><input type="checkbox"> Biarkan saya masuk</label>
								</div>
							</div>
							<div class="col-xs-4">
							  <button type="submit" class="btn btn-danger btn-block btn-flat">Sign In</button>
							</div>
						</div>
					</form>

					<a href="<?php echo base_url().'reset';?>"><i class="fa fa-question-circle"></i> Lupa password?</a><br>
					<a href="<?php echo base_url().'register';?>" class="text-center"><i class="fa fa-bookmark"></i> Daftar Sebagai Member</a>
				</div>
			</div>
		</div>
	</div>

    <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
	
</body>
</html>
