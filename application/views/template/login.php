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
					<p class="login-box-msg">Sign in to start your session</p>
					<?php echo $this->session->flashdata('invalid');?>
					<form action="<?php echo base_url().'auth';?>" method="post">
						<div class="form-group has-feedback">
							<input type="text" class="form-control" name="username" placeholder="Username or Email" required>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<div class="checkbox">
									<label><input type="checkbox"> Remember Me</label>
								</div>
							</div>
							<div class="col-xs-4">
							  <button type="submit" class="btn btn-danger btn-block btn-flat">Sign In</button>
							</div>
						</div>
					</form>

					<a href="#">I forgot my password</a><br>
					<a href="register.html" class="text-center">Register a new membership</a>
				</div>
			</div>
		</div>
	</div>

    <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
	
</body>
</html>
