<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF Member <small>The awesome peoples</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'member';?>">Member</a></li>
			<li class="active">Privilages</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-key"></i> IBF Privilages</h3>
				<div class="box-tools pull-right">
					<button class="btn" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-privilage">
				<thead>
					<th>IBF</th>
					<th>Name</th>
					<?php foreach($apps as $ap){?>
					<th><?php echo $ap['app_name'];?></th>
					<?php } ?>
					<th>Action</th>
				</thead>
				<tbody>
				<?php if(!empty($members)){ $no=0; foreach($members as $m){ $no++; ?>
				<tr>
					<td><?php echo $m['member_ibf_code'];?></td>
					<td><?php echo $m['member_name'];?></td>
					<?php foreach($apps as $ap){?>
					<td align="center"><?php echo label_privilage($m['member_id'], $ap['app_id'], $m['app_'.$ap['app_id']]);?></td>
					<?php } ?>
					<td>
						<span class="btn-group">
							<a href="<?php echo base_url().'member/'.$m['member_ibf_code'];?>" class="btn btn-default btn-sm"><i class="fa fa-search"></i></a>
							<a href="" class="btn btn-default btn-sm"><i class="fa fa-ban"></i></a>
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

<!-- modal privilage setting -->
<div class="modal inmodal" id="modalPriv" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated bounceInDown">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true"><i class="fa fa-remove"></i></span><span class="sr-only">Close</span></button>
				<i class="fa fa-key modal-icon"></i>
				<h4 class="modal-title">Member Privilage</h4>
				<div>Setting member privilage</div>
			</div>
			<form method="POST" action="<?php echo base_url().'member/change_privilage';?>">
			<input type="hidden" name="app_id" id="app_id">
			<input type="hidden" name="member_id" id="uid">
			<div class="modal-body">
				<div class="form-group">
					<div class="i-checks">
						<label><input type="radio" name="priv" class="priv" id="block" value="0"> Blokir</label>
					</div>
					<div class="i-checks">
						<label><input type="radio" name="priv" class="priv" id="user" value="1"> User </label>
					</div>
					<div class="i-checks">
						<label><input type="radio" name="priv" class="priv" id="approval" value="2"> Artikel Reviewer </label>
					</div>
					<div class="i-checks">
						<label><input type="radio" name="priv" class="priv" id="admin" value="3"> Administator</label>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-danger" value="Simpan">
			</div>
			</form>
		</div>
	</div>
</div>