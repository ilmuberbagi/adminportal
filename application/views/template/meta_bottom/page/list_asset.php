<script>
$(function(){
	$(".thumb").click(function(){
		var image = $(this).attr('data-value');
		var img = image.split('#');
		$("#url").val(img[0]);
		$("#url_thumb").val(img[1]);
		$(".copy").fadeIn();
	});
});
</script>