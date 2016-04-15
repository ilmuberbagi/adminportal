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
	});


	function imagePreview(input) {
		if(input.files && input.files[0]){
			var filerd = new FileReader();
			filerd.onload = function(e){
				$('#imgPreview').attr('src', e.target.result);
				$('#current_image').remove();
			};
			filerd.readAsDataURL(input.files[0]);
		}
	}
</script>