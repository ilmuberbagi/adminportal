<script src="<?php echo base_url().'assets/js/bootstrap-filestyle.min.js';?>"></script>

<script type="text/javascript">
	$(function(){
		if($('#name_logo').val() == '' ){$('#previewBox').hide();}  
	});

	function chooseFile(input) {
		$("#company_logo").click();
		$('input[type="file"]').change(function(e){
			var fileName = e.target.files[0].name;
			$("#name_logo").val(fileName);
			readURL(this);
			$('#previewBox').show();
		});
	}

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#image_current').attr('src', e.target.result);
			}			
			reader.readAsDataURL(input.files[0]);
			$('#previewBox').show();

		}
	}

	$('#closeButton').on('click', function(e) { 
		$("#previewBox").hide();
		$("#image_current").attr('src', '');
		$("#company_logo").val("");
		$("#name_logo").val("");
	});
</script>