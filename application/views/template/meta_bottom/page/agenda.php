<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css';?>">

<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js';?>"></script>

<script>
	$(function(){
		$(".data-activity").DataTable();
	});

	function delete_activity(str){
		id = str.split("#");
		$("#activity_id_delete").val(id[0]);
		$("#activity_name_delete").val(id[1]);
		$(".msg-delete").html('Apakah Anda yakin ingin menghapus Kegiatan IB dengan nama : <b>'+id[1]+'</b>');
	}
</script>