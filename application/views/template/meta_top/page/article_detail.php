<!-- date time picker -->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2/select2.min.css';?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css';?>">

<script src="<?php echo base_url().'assets/js/tinymce/tinymce.min.js';?>"></script>
<script>
tinymce.init({
    selector: '#content',
	relative_urls : false,
	remove_script_host : false,	
	height:400,
	plugins: [
		'advlist autolink lists link image charmap print preview anchor',
		'searchreplace visualblocks code fullscreen',
		'insertdatetime media table contextmenu paste code'
	],
	toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
});
</script>
