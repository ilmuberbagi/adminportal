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

	<?php
    $meta_page = "default";
    if(isset($page)) $meta_page = $page;
    if(file_exists(APPPATH."views/template/meta_top/{$meta_page}.php")) 
        $this->load->view("template/meta_top/{$meta_page}");
    ?>
</head>
<body class="hold-transition">
	<div class="row">
		<div class="col-md-7 right-bg hidden-xs hidden-sm hidden-md">
			<div class="jargon">
				ILMU BERBAGI FOUNDATION
				<div>Ilmu itu ada, ya untuk berbagi</div>
			</div>
		</div>
		<div class="col-md-5 bg-white">
			<div class="login-box">
				<div class="login-logo"><a href="<?php echo base_url();?>"><b>PORTAL</b>IBF</a></div>
				<div class="login-box-body">
					<p class="login-box-msg">
					Please enter your correct email address. Click reset password and we will send an url to your email address to reset the password! 
					</p>
					<?php echo $this->session->flashdata('invalid');?>
					<form action="<?php echo base_url().'reset';?>" method="post">
						<input type="hidden" name="app" value="portal">
						<div class="form-group has-feedback">
							<input type="email" class="form-control" name="email" placeholder="Enter your email" required>
							<span class="fa fa-envelope form-control-feedback"></span>
						</div>
						<div class="row">
							<div class="col-md-12">
							  <button type="submit" class="btn btn-danger btn-block btn-flat">Reset Password</button>
							</div>
						</div>
					</form>
					<hr/>
					<a href="<?php echo base_url().'login';?>" class="text-center"><i class="fa fa-arrow-circle-left"></i> Back to login page</a><br/>
					<a href="<?php echo base_url().'register';?>" class="text-center"><i class="fa fa-bookmark"></i> Register a new membership</a>
				</div>
			</div>
		</div>
	</div>

    <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
	
</body>
</html>
