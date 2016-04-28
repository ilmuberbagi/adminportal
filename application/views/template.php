<!DOCTYPE html>
<html class="ng-scope">
<head>
	<title><?php echo isset($title) ? $title : 'Portal Ilmu Berbagi Foundation';?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/ionicons.min.css';?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datepicker/datepicker3.css';?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/toastr/toastr.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/iCheck/all.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/skins/skin-red.css';?>">
	<?php
    $meta_page = "default";
    if(isset($page)) $meta_page = $page;
    if(file_exists(APPPATH."views/template/meta_top/{$meta_page}.php")) 
        $this->load->view("template/meta_top/{$meta_page}");
    ?>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/animate.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/adminLTE.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/custom.css';?>">
</head>

<body class="hold-transition skin-red sidebar-mini">
	<div class="wrapper">
		<?php $this->load->view("template/header");?>
		<?php
		if (!empty($page))
			if(file_exists(APPPATH."views/template/{$page}.php"))
				$this->load->view("template/".$page);
		?>
		<?php $this->load->view("template/footer");?>

	</div>
	
    <!-- Mainly scripts -->
    <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js';?>"></script>
	<?php
    if(file_exists(APPPATH."views/template/meta_bottom/{$meta_page}.php"))
        $this->load->view("template/meta_bottom/{$meta_page}");
    ?>
	<!-- toastr message -->
	<?php $this->load->view('template/inc/toastr');?>
    <script src="<?php echo base_url().'assets/js/app.min.js';?>"></script>
	
	<!-- GA -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	  ga('create', 'UA-76967486-1', 'auto');
	  ga('send', 'pageview');
	</script>
</body>
</html>