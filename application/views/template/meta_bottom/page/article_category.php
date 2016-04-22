<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js';?>"></script>
<script>
$(function(){
	$(".data-category").DataTable();
});

function edit_category(str){
	var url = '<?php echo site_url()."article/upd_category";?>';
	id = str.split('#');
	$("#cat_id").val(id[0]);
	$("#cat_name").val(id[1]);
	$("#form-category").attr('action', url);
}
</script>