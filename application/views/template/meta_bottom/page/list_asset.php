<script>
$(function(){
	$(".thumb").click(function(){
		var image = $(this).attr('data-value');
		var img = image.split('/');
		var thumb = image.replace()
		$("#url").val(image);
		$(".copy").fadeIn();
	});
});
</script>