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
				<h3 class="box-title">IBF Members</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-member">
				<thead>
					<th>#IBF</th>
					<th>Name</th>
					<th>Email</th>
					<th>Type</th>
					<th>Status</th>
					<th>Since</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php if(!empty($members)){ foreach($members as $m){?>
				<tr>
					<td><?php echo $m['member_ibf_code'];?></td>
					<td><?php echo $m['member_name'];?></td>
					<td align="center"><a href="mailto:<?php echo $m['member_email'];?>"><?php echo $m['member_email'];?></a></td>
					<td align="center"><?php echo $m['member_type'];?></td>
					<td align="center"><?php echo $m['member_status'] == 1? '<span class="text-success"><i class="fa fa-check-circle"></i></span>':'<span class=""></span>';?></td>
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