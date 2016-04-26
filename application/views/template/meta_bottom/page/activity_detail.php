<script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.js';?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url().'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js';?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url().'assets/plugins/select2/select2.full.min.js';?>"></script>
<!-- bootstrap taginput -->
<script src="<?php echo base_url().'assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js';?>"></script>
<script>
	$(function(){
		$('.datepicker').datepicker({
			autoclose: true,
			format:'dd/mm/yyyy'
		});
		$('.timepicker').timepicker({
			showInputs: true,
		});
		$(".content-article").wysihtml5();
		$(".select2").select2();

		if($('#activity_image').val() == '' ){$('#previewBox').hide();}  
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
		$("#activity_image").val(url);
		$("#previewBox").show();
		$("#image_current").attr('src', url);
	}

	$('#closeButton').on('click', function(e) { 
		$("#previewBox").hide();
		$("#image_current").attr('src', '');
		$("#activity_image").val('');
    });

	</script>