<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF Kegiatan <small>Share knowladges</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'activity';?>">Kegiatan</a></li>
			<li class="active">Data Kegiatan</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-file-text"></i> &nbsp; IBF Kegiatan</h3>
				<div class="box-tools pull-right">
					<a class="btn btn-default" href="<?php echo base_url().'activity/create';?>"><i class="fa fa-plus-circle"></i></a>
					<button class="btn" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-member">
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
							<a href="<?php echo base_url().'activity/delete/'.$a['activity_id'];?>" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></a>
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