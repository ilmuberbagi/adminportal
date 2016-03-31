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
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">IBF Members</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-member">
				<thead>
					<th width="20">No.</th>
					<th>Nama Wilayah</th>
					<th>Jumlah Member</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php if(!empty($region)){ $no=0;  foreach($region as $r){  $no++; ?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $r['region_name'];?></td>
					<td><?php echo $this->lib_general->count_member_by_region($r['region_id']);?></td>
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