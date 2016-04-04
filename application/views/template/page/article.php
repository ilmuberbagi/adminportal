<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF Articles <small>Share knowladges</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'member';?>">Article</a></li>
			<li class="active">Data Article</li>
		</ol>
	</section>

	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-file-text"></i> &nbsp; IBF Artikel</h3>
				<div class="box-tools pull-right">
					<a class="btn btn-default" href="<?php echo base_url().'article/create';?>"><i class="fa fa-plus-circle"></i></a>
					<button class="btn" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-member">
				<thead>
					<th>Artikel</th>
					<th>Author</th>
					<th>Update Terakhir</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php if(!empty($articles)){ foreach($articles as $a){?>
				<tr>
					<td width="50%">
						<b><a href="<?php echo base_url().'article/'.$a['article_id'];?>"><?php echo strip_tags($a['article_title']);?></a></b><br/>
						<?php echo headline($a['article_content']);?>
					</td>
					<td><?php echo $a['member_name'];?></td>
					<td><?php echo date('d/m/Y H:i', strtotime($a['article_date_update']));?></td>
					<td>
						<span class="btn-group">
							<a href="<?php echo base_url().'article/'.$a['article_id'];?>" class="btn btn-default btn-sm"><i class="fa fa-search"></i></a>
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