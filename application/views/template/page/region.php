<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF Member <small>The awesome peoples</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'member';?>">Member</a></li>
			<li class="active">Wilayah</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-map"></i> IBF Wilayah</h3>
				<div class="box-tools pull-right">
					<button class="btn" data-toggle="modal" data-target="#modalWilayah" title="Wilayah Baru"><i class="fa fa-plus-circle"></i></button>
					<button class="btn" data-widget="collapse" data-tooltip="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn" data-widget="remove" data-tooltip="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-member">
				<thead>
					<th width="20">No.</th>
					<th>Nama Wilayah</th>
					<th width="50">Action</th>
				</thead>
				<tbody>
				<?php if(!empty($region)){ $no=0;  foreach($region as $r){  $no++; ?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $r['region_name'];?>&nbsp;
					<span class="label label-success"><?php echo $this->lib_general->count_member_by_region($r['region_id']);?></span></td>
					<td>
						<span class="btn-group">
							<a href="<?php echo base_url().'member/region/'.$r['region_id'];?>" class="btn btn-default btn-sm"><i class="fa fa-search"></i></a>
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

<!-- modal wilayah -->
<div class="modal inmodal" id="modalWilayah" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated bounceInDown">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true"><i class="fa fa-remove"></i></span><span class="sr-only">Close</span></button>
				<i class="fa fa-map-marker modal-icon"></i>
				<h4 class="modal-title">Member Region</h4>
				<div>Tambahkan wilayah keanggotaan IBF</div>
			</div>
			<form method="POST" action="<?php echo base_url().'member/sv_region';?>">
			<input type="hidden" name="app_id" id="app_id">
			<input type="hidden" name="member_id" id="uid">
			<div class="modal-body">
				<div class="form-group">
					<label>Nama Wilayah</label><br/>
					<input type="text" name="region_name" class="form-control" placeholder="Nama Wilayah" required>
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
