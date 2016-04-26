<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF Articles <small>Share knowladges</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'article';?>">Article</a></li>
			<li class="active">Data Article</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-success">
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
						
						<?php if($this->session->userdata('id') == $a['article_author']){?>
						<b><a href="<?php echo base_url().'article/'.$a['article_id'];?>"><?php echo strip_tags($a['article_title']);?></a></b> &nbsp; 
						<?php }else{?>
						<b><a href="<?php echo base_url().'article/'.$a['article_id'];?>"><?php echo strip_tags($a['article_title']);?></a></b> &nbsp; 
						<?php } ?>
						
						<?php echo $a['article_approve'] == 1? '<span class="label label-success">Approved</span>':'<span class="label label-default">Pending</span>';?>
						<div class="content-list">
							<img src="<?php echo set_image($a['article_image'], 'thumb');?>" class="img-thumb"> 
							<?php echo headline($a['article_content']);?>
						</div>
					</td>
					<td><?php echo $a['member_name'];?></td>
					<td><?php echo date('d/m/Y H:i', strtotime($a['article_date_update']));?></td>
					<td>
						<span class="btn-group">
							<a href="<?php echo base_url().'article/'.$a['article_id'];?>" class="btn btn-default btn-sm"><i class="fa fa-search"></i></a>
							<a href="#" class="btn btn-sm <?php echo $a['article_approve'] == 1?'btn-success':'btn-default';?>"><i class="fa fa-flag"></i></a>
							<?php if($this->data['privilage']['app_2'] == 3){?>
							<a href="#" class="btn btn-sm btn-default"  data-toggle="modal" data-target="#modalDelete" onclick="return delete('<?php echo $a['article_id'];?>')"><i class="fa fa-trash"></i></a>
							<?php } ?>
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


<!-- modal delete -->
<div class="modal inmodal" id="modalDelete" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated bounceInDown">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true"><i class="fa fa-remove"></i></span><span class="sr-only">Close</span></button>
				<i class="fa fa-trash modal-icon"></i>
				<h4 class="modal-title">Delete Artikel</h4>
				<div>Hapus artikel selamanya.</div>
			</div>
			<form name="formdelete" action="<?php echo base_url().'article/delete';?>" method="POST">
			<div class="modal-body">
				<input type="hidden" name="article_id" id="article_id">
				<div class="msg"></div>
			</div>
			<div class="modal-footer">
				<input type="reset" name="reset" value="Cancel" class="btn btn-white" data-dismiss="modal">
				<input type="submit" name="move" value="Remove" class="btn btn-danger action">
			</div>
			</form>
		</div>	
	</div>
</div>
