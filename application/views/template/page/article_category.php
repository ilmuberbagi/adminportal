<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF Articles <small>Share knowladges</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'article';?>">Article</a></li>
			<li class="active">Article Categories</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">IBF Article Categories</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-toggle="modal" data-tooltip="tooltip" title="New Category"><i class="fa fa-plus-circle"></i></button>
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-category">
				<thead>
					<th width="20">No.</th>
					<th>Category</th>
					<th width="100">Action</th>
				</thead>
				<tbody>
				<?php if(!empty($categories)){ $no=0; foreach($categories as $a){ $no++;?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $a['category_name'];?> &nbsp;
					<span class="badge badge-default"><?php echo $a['count_article'];?></span></td>
					<td>
						<span class="btn-group">
							<a href="<?php echo base_url().'article/category/'.$a['category_id'];?>" class="btn btn-default btn-sm"><i class="fa fa-search"></i></a>
							<a href="" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></a>
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