<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF Partner <small>Share knowladges</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'partner';?>">Partner</a></li>
			<li class="active">Data Partner</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-file-text"></i> &nbsp; IBF Partner</h3>
				<div class="box-tools pull-right">
					<a class="btn btn-default" href="<?php echo base_url().'partner/create';?>"><i class="fa fa-plus-circle"></i></a>
					<button class="btn" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-member">
					<thead>
						<th>Partner</th>
						<th>Asal</th>
						<th>Telepon</th>
						<th>Email</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php if(!empty($partner)){ foreach($partner as $a){?>
						<tr>
							<td><?php echo $a['partner_name'];?></td>
							<td><?php echo $a['company'];?></td>
							<td><?php echo $a['phone'];?></td>
							<td><?php echo $a['email'];?></td>
							<td>
								<span class="btn-group">
									<a href="<?php echo base_url().'partner/'.$a['partner_id'];?>" class="btn btn-default btn-sm"><i class="fa fa-search"></i></a>
									<div class="btn btn-default btn-sm" id="<?php echo $a['partner_id'];?>" style="cursor:pointer" data-toggle="modal" data-target="#modalConfirm" onclick="confirm_del(this.id)"><i class="fa fa-trash"></i></div>
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

<!-- modal confirm -->
<div id="modalConfirm" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
				<h4 class="modal-title"><i class="fa fa-warning"></i> Hapus data Partner</h4>
			</div>
			<div class="modal-body">
				Anda yakin ingin menghapus data partner ini ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<a href="" id="del" class="btn btn-default btn-sm">Hapus</a>
			</div>
		</div>
	</div>
</div>