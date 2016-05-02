<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js';?>"></script>
<script>
	$(function(){
		$(".data-member").DataTable();
	});

	function confirm_del(id){
		$("#del").attr("href", "<?php echo base_url()?>partner/delete/"+id);
	}
</script>