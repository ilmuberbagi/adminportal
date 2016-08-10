<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF donatur <small>Share knowladges</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'donatur';?>">donatur</a></li>
			<li class="active">Data donatur</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-file-text"></i> &nbsp; IBF donatur</h3>
				<div class="box-tools pull-right">
					<!-- <a class="btn btn-default" href="<?php echo base_url().'donation/create';?>"><i class="fa fa-plus-circle"></i></a> -->
					<button class="btn" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-donator">
				<thead>
					<th>Nama </th>
					<!-- <th>Action</th> -->
				</thead>
				<tbody>
				<?php if(!empty($donator)){ foreach($donator as $d){?>
				<tr>
					<td><?php echo $d['donator_name'];?></td>
					<!-- <td>
						<span class="btn-group">
							<a href="<?php echo base_url().'donation/'.$d['donator_id'];?>" class="btn btn-default btn-sm"><i class="fa fa-search"></i></a>
							<a data-toggle="modal" data-target="#modalDelete" class="btn btn-default btn-sm" onclick="return delete_donation('<?php echo $d['donator_id'].'#'.$d['name'];?>')"><i class="fa fa-trash"></i></a>
						</span>
					</td> -->
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
					<h4 class="modal-title">Delete donatur</h4>
					<div>Hapus donatur dari daftar donatur.</div>
				</div>
				<form method="POST" action="<?php echo base_url().'donation/delete';?>">
					<input type="hidden" name="donator_id" id="donator_id_delete">
					<input type="hidden" name="name" id="name_delete">
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