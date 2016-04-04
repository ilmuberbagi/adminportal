<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js';?>"></script>
<script>
$(function(){
	$(".data-privilage").DataTable();
});

function privilage(str){
	str = str.split('#');
	var app_id = str[0];
	var uid = str[1];
	var priv = str[2];
	$("#app_id").val(app_id);
	$("#uid").val(uid);
	if(priv == 0)
		$("#block").prop('checked', true);
	else if(priv == 1)
		$("#user").prop('checked', true);
	else if(priv == 2)
		$("#approval").prop('checked', true);
	else 
		$("#admin").prop('checked', true);
}
</script>