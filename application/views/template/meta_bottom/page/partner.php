<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js';?>"></script>
<script>
	$(function(){
		$(".data-partner").DataTable();
	});

	function delete_partner(str){
		id = str.split("#");
		$("#partner_id_delete").val(id[0]);
		$("#partner_name_delete").val(id[1]);
		$(".msg-delete").html('Apakah Anda yakin ingin menghapus Partner IB dengan nama : <b>'+id[1]+'</b>');
	}

</script>