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
					<button class="btn" data-toggle="modal" data-target="#modalCategory" title="Kategori Baru"><i class="fa fa-plus-circle"></i></button>
					<button class="btn" data-widget="collapse" data-tooltip="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn" data-widget="remove" data-tooltip="tooltip" title="Remove"><i class="fa fa-times"></i></button>
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
					<span class="label label-danger"><?php echo $a['count_article'];?></span></td>
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
<!-- modal wilayah -->
<div id="modalCategory" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-list"></i> Kategori Artikel</h4>
			</div>
			<form method="POST" action="<?php echo base_url().'article/sv_category';?>">
			<input type="hidden" name="category_id" id="cat_id">
			<div class="modal-body">
				<div class="form-group">
					<label>Nama Kategori</label><br/>
					<input type="text" name="category_name" class="form-control" placeholder="Nama Kategori" required>
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
