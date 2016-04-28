<script src="<?php echo base_url().'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/select2/select2.full.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js';?>"></script>
<script>
	$(function(){
		$('.datepicker').datepicker({
			autoclose: true,
			format:'dd/mm/yyyy'
		});
		$('.timepicker').timepicker({});
		$(".content-article").wysihtml5();
		$(".select2").select2();
	});
	
	var $loading = $('#loadingDiv').hide();
	$(document).ajaxStart(function (){$loading.show();}).ajaxStop(function () {$loading.hide();});
	
	function image_list(){
		$.ajax({
			type:'GET',
			url: '<?php echo site_url()."asset/get_all_asset";?>',
			success: function(data){
				$("#image-content").html(data);
			}, error: function(){
				alert('Error connection... \nPlease check your internet connection!');
			}
		});
	}
	
	function choose(url){
		$("#article_image").val(url);
	}
	
</script>