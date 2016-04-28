<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js';?>"></script>
<script>
$(function(){
	$(".data-member").DataTable();
});

function delete_article(id){
	$("#article_id").val(id);
	$(".msg").html("Apakah Anda yakin ingin menghapus artikel ini?");
}
</script>