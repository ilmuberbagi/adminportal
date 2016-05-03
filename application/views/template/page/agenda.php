<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF Agenda <small>Share knowladges</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'activity';?>">Kegiatan</a></li>
			<li class="active">Data Agenda</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-file-text"></i> &nbsp; IBF Agenda</h3>
				<div class="box-tools pull-right">
					<a class="btn btn-default" href="<?php echo base_url().'activity/create';?>"><i class="fa fa-plus-circle"></i></a>
					<button class="btn" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
				<div class="box-body">
				<table  class="table table-striped table-hover data-activity">
				<thead>
					<th>Aktifitas</th>
					<th>Lokasi</th>
					<th>Penanggung Jawab</th>
					<th>Tanggal Mulai</th>
					<th>Tanggal Selesai</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php if(!empty($activity)){ foreach($activity as $a){?>
				<tr>
					<td><?php echo $a['activity_name'];?></td>
					<td><?php echo $a['activity_location'];?></td>
					<td><?php echo $a['activity_pic'];?></td>
					<td><?php echo date('d/m/Y H:i:s', strtotime($a['activity_date_start']));?></td>
					<td><?php echo date('d/m/Y H:i:s', strtotime($a['activity_date_end']));?></td>
					<td>
						<span class="btn-group">
							<a href="<?php echo base_url().'activity/'.$a['activity_id'];?>" class="btn btn-default btn-sm"><i class="fa fa-search"></i></a>
							<!-- <a href="<?php echo base_url().'activity/delete/'.$a['activity_id'];?>" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></a> -->
							<a data-toggle="modal" data-target="#modalDelete" class="btn btn-default btn-sm" onclick="return delete_activity('<?php echo $a['activity_id'].'#'.$a['activity_name'];?>')"><i class="fa fa-trash"></i></a>
						</span>
					</td>
				</tr>
				<?php }}?>
				</tbody>
				</table>
			</div>
		</div>
	</section>
</div>


<!-- modal delete -->
<div class="modal inmodal" id="modalDelete" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated bounceInDown">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true"><i class="fa fa-remove"></i></span><span class="sr-only">Close</span></button>
					<i class="fa fa-user-times modal-icon"></i>
					<h4 class="modal-title">Delete kegiatan</h4>
					<div>Hapus kegiatan dari daftar kegiatan.</div>
				</div>
				<form method="POST" action="<?php echo base_url().'activity/delete';?>">
					<input type="hidden" name="activity_id" id="activity_id_delete">
					<input type="hidden" name="activity_name" id="activity_name_delete">
					<div class="modal-body msg-delete">

					</div>
					<div class="modal-footer">
						<input type="reset" name="reset" value="Cancel" class="btn btn-white" data-dismiss="modal">
						<input type="submit" name="move" value="Remove" class="btn btn-danger action">
					</div>
				</form>
			</div>	
		</div>
	</div>
