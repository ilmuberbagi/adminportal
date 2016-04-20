<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF Articles <small>Share knowladges</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'article';?>">Article</a></li>
			<li class="active">Data Article</li>
		</ol>
	</section>
	<?php 
		# data article
		if(!empty($article)){
			$id = $article[0]['article_id'];
			$article_category = $article[0]['article_category'];
			$title = $article[0]['article_title'];
			$member_name = $article[0]['member_name'];
			$article_image = $article[0]['article_image'];
			$author = $article[0]['article_author'];
			$approve = $article[0]['article_approve'];
			$content = $article[0]['article_content'];
			$tags = $article[0]['article_tags'] ? implode(',', json_decode($article[0]['article_tags'])) : '';
			$date_input = date('d/m/Y', strtotime($article[0]['article_date_input']));
			$time_input = date('H:i:s', strtotime($article[0]['article_date_input']));
			$action = 'update';
		}else{
			$id = '';
			$title = '';
			$article_category = '';
			$approve = 0;
			$article_image = '';
			$member_name = $this->session->userdata('name');
			$author = $this->session->userdata('id');
			$content = '';
			$tags = '';
			$date_input = date('d/m/Y');
			$time_input = date('H:i:s');
			$action = 'insert';
		}
	?>
	<section class="content">
		<form action="<?php echo base_url().'article/'.$action;?>" method="POST">
		<input type="hidden" name="article_id" value="<?php echo $id;?>">
		<div class="row">
			<div class="col-md-9">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-file-text"></i> &nbsp;<?php echo $title ? $title : 'Buat Artikel';?></h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
							<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Judul</label>
							<input type="text" name="article_title" class="form-control" value='<?php echo $title;?>'>
						</div>
						<div class="form-group">
							<label>Konten Artikel</label>
							<textarea name="article_content" class="form-control content-article" rows="15"><?php echo $content;?></textarea>
						</div>
						<div class="form-group">
							<label>Image Cover</label>
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-image"></i></div>
								<input type="url" name="article_image" class="form-control" value="<?php echo $article_image;?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- detail author and article -->
			<div class="col-md-3">
				<div class="box">
					<div class="box-header with-border"></div>
					<div class="box-body">
						<div class="form-group">
							<label>Author</label>
						<?php $priv = $this->session->userdata('privilage'); if($priv['app_2'] < 2){?>
							<input type="hidden" name="article_author" value="<?php echo $author;?>">
							<input type="text" name="member_name" class="form-control" value="<?php echo $member_name;?>" readonly>
						<?php }else{?>
							<select name="article_author" class="select2 form-control">
							<?php foreach($members as $m){?>
								<option value="<?php echo $m['member_id'];?>" <?php echo $m['member_id'] == $author ? 'selected':'';?>><?php echo $m['member_name'];?></option>
							<?php }?>
							</select>
						<?php } ?>
						</div>
						<div class="form-group">
							<label>Tanggal dibuat</label>
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
								<input type="text" name="article_date" value="<?php echo $date_input;?>" class="form-control datepicker">
							</div>
						</div>
						<div class="form-group">
							<label>Waktu</label>
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
								<input type="text" name="article_time" class="form-control timepicker" value="<?php echo $time_input;?>">
							</div>
						</div>
						<div class="form-group">
							<label>Kategori <span>*</span></label>
							<select name="article_category" class="select2 form-control" width="100%">
								<?php if(!empty($categories)){ foreach($categories as $cat){?>
								<option value="<?php echo $cat['category_id'];?>" <?php echo $cat['category_id'] == $article_category ? 'selected':'';?>><?php echo $cat['category_name'];?></option>
								<?php } } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Tags </label><small> - Separate word with a comma</small>
							<input type="text" class="form-control" data-role="tagsinput" name="tags" value="<?php echo $tags;?>">
						</div>
						<?php $priv = $this->session->userdata('privilage'); if($priv['app_2'] > 1){?>
						<div class="form-group">
							<div class="i-checks">
								<label><input type="checkbox" name="article_approve" value="1" <?php echo $approve == 1?'checked':'';?>> &nbsp;Lolos Review</label>
							</div>
						</div>
						<?php } ?>
						<div class="form-action">
							<input type="reset" name="reset" value="Cancel" class="btn btn-default">
							<input type="submit" name="submit" value="Save" class="btn btn-primary">
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>
	</section>
</div>