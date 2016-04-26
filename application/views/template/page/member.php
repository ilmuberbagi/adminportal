<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF Member <small>The awesome peoples</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'member';?>">Member</a></li>
			<li class="active">Data Member</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-users"></i> IBF Members</h3>
				<div class="box-tools pull-right">
					<button class="btn" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-member">
				<thead>
					<th>#IBF</th>
					<th>Nama Lengkap</th>
					<th>Email</th>
					<th>Wilayah</th>
					<th>Status</th>
					<th>Tahun</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php if(!empty($members)){ foreach($members as $m){?>
				<tr>
					<td><?php echo $m['member_ibf_code'];?></td>
					<td><?php echo $m['member_name'];?></td>
					<td><a href="mailto:<?php echo $m['member_email'];?>"><?php echo $m['member_email'];?></a></td>
					<td><?php echo $m['region_name'];?></td>
					<td align="center">
						<?php echo gen_member_status($m['member_status']);?></td>
					<td align="center"><?php echo $m['member_reg_year'];?></td>
					<td>
						<span class="btn-group">
							<a href="<?php echo base_url().'member/'.$m['member_ibf_code'];?>" class="btn btn-default btn-sm"><i class="fa fa-search"></i></a>
							<?php $priv = $this->session->userdata('privilage'); if($priv['app_1'] == 3){?>
							<a data-toggle="modal" data-target="#modalStatus" class="btn btn-default btn-sm" onclick="return change_status('<?php echo $m['member_id'].'#'.$m['member_status'].'#'.$m['member_name'];?>')"><i class="fa fa-ban"></i></a>
							<a data-toggle="modal" data-target="#modalDelete" class="btn btn-default btn-sm" onclick="return delete_member('<?php echo $m['member_id'].'#'.$m['member_name'];?>')"><i class="fa fa-trash"></i></a>
							<?php } ?>
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

<!-- modal status -->
<div class="modal inmodal" id="modalStatus" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated bounceInDown">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true"><i class="fa fa-remove"></i></span><span class="sr-only">Close</span></button>
				<i class="fa fa-cog modal-icon"></i>
				<h4 class="modal-title">Status Member</h4>
				<div>Aktifkan atau blokir member.</div>
			</div>
			<form method="POST" action="<?php echo base_url().'member/change_member_status';?>">
			<input type="hidden" name="member_id" id="member_id">
			<input type="hidden" name="member_status" id="member_status">
			<input type="hidden" name="member_name" id="member_name">
			<div class="modal-body msg">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-danger btnaction">
			</div>
			</form>
		</div>
	</div>
</div>

<!-- modal delete -->
<div class="modal inmodal" id="modalDelete" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated bounceInDown">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true"><i class="fa fa-remove"></i></span><span class="sr-only">Close</span></button>
				<i class="fa fa-user-times modal-icon"></i>
				<h4 class="modal-title">Delete Member</h4>
				<div>Hapus member dari daftar member.</div>
			</div>
			<form method="POST" action="<?php echo base_url().'member/delete';?>">
			<input type="hidden" name="member_id" id="member_id_delete">
			<input type="hidden" name="member_name" id="member_name_delete">
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