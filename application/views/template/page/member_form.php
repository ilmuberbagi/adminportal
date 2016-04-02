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
		<div class="row">
		<form action="<?php echo base_url().'member/proc_update';?>" method="POST">
		<input type="hidden" name="article_id" value="<?php echo $member[0]['member_id'];?>">
			<div class="col-md-12">
				<div class="col-md-4">
					<h5 class="title">Informasi Umum tentang anggota</h5>
					<div class="form-group">
						<label>Nama Lengkap <span>*</span></label>
						<input type="text" name="member_name" class="form-control" placeholder="Member Name" value="<?php echo $member[0]['member_name'];?>" required>
					</div>
					<div class="form-group">
						<label>Tempat Lahir <span>*</span></label>
						<input type="text" name="member_birthplace" class="form-control" placeholder="Ex: Yogyakarta" value="<?php echo $member[0]['member_birthplace'];?>" required>
					</div>				
					<div class="form-group">
						<label>Tanggal Lahir<span>*</span></label>
						<input type="text" name="member_birthdate" class="form-control datepicker" placeholder="Ex: 17/08/1945" value="<?php echo date('d/m/Y', strtotime($member[0]['member_birth_date']));?>" required>
					</div>
					<div class="form-group">
						<label>Jenis Kelamin <span>*</span></label><br/>
						<label><input type="radio" name="member_gender" class="minimal" value="1" <?php echo $member[0]['member_gender'] == 1? 'checked':'';?>></label> Laki-laki
						<label><input type="radio" name="member_gender" class="minimal" value="0" <?php echo $member[0]['member_gender'] == 0? 'checked':'';?>></label> Perempuan
					</div>
					<div class="form-group">
						<label>Pendidikan <span>*</span></label>
						<input type="text" name="member_education" class="form-control" value="<?php echo $member[0]['member_education'];?>" placeholder="Ex: S1 Ilmu Kedokteran">
					</div>
					<div class="form-group">
						<label>Pekerjaan</label>
						<input type="text" name="member_job" class="form-control" placeholder="Ex: Guru/IT Developer dll" value="<?php echo $member[0]['member_job'];?>">
					</div>				
					<div class="form-group">
						<label>Keahlian</label> - <small>Pisahkan keahlian dengan koma</small>
						<input type="text" name="member_skills" class="form-control" data-role="tagsinput" placeholder="Ex: Developer, Marketting, Desainer" value="<?php echo $member[0]['member_skills'];?>">
					</div>
					<div class="form-group">
						<label>Tentang Anda</label>
						<textarea name="member_description" class="form-control" placeholder="Sekilas tentang Anda"><?php echo $member[0]['member_description'];?></textarea>
					</div>
				</div>
				
				<!-- member region and status -->
				<div class="col-md-4">
					<h5 class="title">Status Keanggotaan</h5>
					<div class="form-group">
						<label>Wilayah</label>
						<select name="member_region" class="form-control select2" required>
							<?php if(!empty($region)){ foreach($region as $r){?>
							<option value="<?php echo $r['region_id'];?>" <?php echo $member[0]['member_region'] == $r['region_id']? 'selected':'';?>><?php echo $r['region_name'];?></option>
							<?php }} ?>
						</select>
					</div>
					<div class="form-group">
						<label>Status</label>
						<select name="member_type" class="form-control select2" placeholder="Bisa lebih dari satu" multiple required>
							<?php if(!empty($types)){ foreach($types as $t){?>
							<option value="<?php echo $t['type_id'];?>"><?php echo $t['member_type'];?></option>
							<?php }} ?>
						</select>
					</div>
					<h5 class="title">Informasi Kontak</h5>
					<div class="form-group">
						<label>Nomor HP/Telepon <span>*</span></label>
						<input type="phone" name="member_phone" class="form-control" placeholder="Ex: +6285770427123" value="<?php echo $member[0]['member_phone'];?>" required>
					</div>
					<div class="form-group">
						<label>Email <span>*</span></label>
						<input type="email" name="member_email" class="form-control" placeholder="Ex: member@gmail.com" value="<?php echo $member[0]['member_email'];?>" required>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea name="member_address" class="form-control" placeholder="Ex: Jl. Pandegasiwi Sleman Yogyakarta"><?php echo $member[0]['member_address'];?></textarea>
					</div>
				</div>
				<!-- account -->
				<div class="col-md-4">
					<h5 class="title">Informasi Jejaring Sosial</h5>
					<div class="form-group">
						<label>Facebook</label>
						<input type="url" name="member_fb" class="form-control" placeholder="Ex: http://facebook.com/ilmuberbagi" value="<?php echo $member[0]['member_facebook'];?>">
					</div>
					<div class="form-group">
						<label>Twitter</label>
						<input type="url" name="member_twitter" class="form-control" placeholder="Ex: http://twitter.com/ilmuberbagi" value="<?php echo $member[0]['member_twitter'];?>">
					</div>
					<div class="form-group">
						<label>Website/Blog</label>
						<input type="url" name="member_website" class="form-control" placeholder="Ex: http://ilmuberbagi.or.id" value="<?php echo $member[0]['member_blog'];?>">
					</div>
					<h5 class="title">Informasi Lain</h5>
					<div class="form-group">
						<label>Alasan Berbagung</label>
						<textarea name="member_reason" class="form-control" placeholder="Ex: Deskripsikan secara singkat alasan Anda bergabung dengan Ilmu Berbagi Foundation"><?php echo $member[0]['member_motivation'];?></textarea>
					</div>
					<div class="form-action">
						<input type="reset" name="reset" class="btn btn-default" value="Batal">
						<input type="submit" name="submit" class="btn btn-danger" value="Update">
					</div>
				</div>
			</div>
		</form>
		</div>
	</section>
</div>