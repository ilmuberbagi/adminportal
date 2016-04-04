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
		<div class="box">
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
					<th>Aktif</th>
					<th>Tahun</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php if(!empty($members)){ foreach($members as $m){?>
				<tr>
					<td><?php echo $m['member_ibf_code'];?></td>
					<td><?php echo $m['member_name'];?></td>
					<td><a href="mailto:<?php echo $m['member_email'];?>"><?php echo $m['member_email'];?></a></td>
					<td><?php echo $m['member_region'];?></td>
					<td align="center"><?php echo $m['member_status'] == 1? '<span class="label label-success">aktif</span>':'<span class="label label-default">pending</span>';?></td>
					<td align="center"><?php echo $m['member_reg_year'];?></td>
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