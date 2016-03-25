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
				<h3 class="box-title">IBF Members</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-member">
				<thead>
					<th>Article</th>
					<th>Author</th>
					<th>Date Input</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php if(!empty($articles)){ foreach($articles as $a){?>
				<tr>
					<td width="50%">
						<b><a href="<?php echo base_url().'article/'.$a['article_id'];?>"><?php echo strip_tags($a['article_title']);?></a></b><br/>
						<?php echo substr(trim(strip_tags($a['article_content'])),0,200);?>
					</td>
					<td><?php echo $a['member_name'];?></td>
					<td><?php echo $a['article_date_input'];?></td>
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