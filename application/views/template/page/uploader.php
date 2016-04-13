<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF Assets <small>Media </small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'asset';?>">Assets</a></li>
			<li class="active">Upload</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-image"></i> IBF Asset</h3>
				<div class="box-tools pull-right">
					<a href="<?php echo base_url().'asset/upload';?>" class="btn btn-default" data-toggle="tooltip" title="Upload Media"><i class="fa fa-cloud-upload"></i></a>
					<button class="btn" data-widget="collapse" data-tooltip="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn" data-widget="remove" data-tooltip="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<!-- uploader -->
				<form id="fileupload" action="<?php echo base_url().'asset/do_upload'?>" method="POST" enctype="multipart/form-data">
					<div class="row fileupload-buttonbar">
						<div class="col-lg-12">
							<span class="btn btn-success fileinput-button">
								<i class="fa fa-plus"></i>
								<span>Add Image files to upload</span>
								<input type="file" id="userfile" name="userfile" multiple>
							</span>
							<button type="submit" class="btn btn-primary start">
								<i class="fa fa-cloud-upload"></i>
								<span>Start upload</span>
							</button>
							<button type="reset" class="btn btn-warning cancel cancel-all">
								<i class="fa fa-ban"></i>
								<span>Cancel upload</span>
							</button>
							<!-- The global file processing state -->
							<span class="fileupload-process"></span>
						</div>
						
						<!-- The global progress state -->
						<div class="col-lg-12 fileupload-progress fade">
							<!-- The global progress bar -->
							<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
								<div class="progress-bar progress-bar-success" style="width:0%;"></div>
							</div>
							<!-- The extended global progress state -->
							<div class="progress-extended">&nbsp;</div>
						</div>
					</div>
					<!-- Drop zone -->
					<div>  </div>
					<!-- The table listing the files available for upload/download -->
					<table role="presentation" class="table"><tbody class="files"></tbody></table>
				</form>
			</div>
		</div>
	</section>
</div>

			<!-- The template to display files available for upload -->
			<script id="template-upload" type="text/x-tmpl">
			{% for (var i=0, file; file=o.files[i]; i++) { %}
			    <tr class="template-upload fade">
			        <td>
			            <span class="preview"></span>
			        </td>
			        <td class="vam">
			            <p class="name">{%=file.name%}</p>
			            <strong class="error text-danger"></strong>
			        </td>
			        <td>
			            <p class="size">Processing...</p>
			            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
			        </td>
			        <td class="vam">
			            {% if (!i && !o.options.autoUpload) { %}
			                <button class="btn btn-primary start" disabled>
			                    <i class="glyphicon glyphicon-upload"></i>
			                    <span>Start</span>
			                </button>
			            {% } %}
			            {% if (!i) { %}
			                <button class="btn btn-warning cancel cancel-one {%=file.lastModified%}">
			                    <i class="glyphicon glyphicon-ban-circle"></i>
			                    <span>Cancel</span>
			                </button>
			            {% } %}
			        </td>
			    </tr>
			{% } %}
			</script>

			<!-- The template to display files available for download -->
			<script id="template-download" type="text/x-tmpl">
			{% for (var i=0, file; file=o.files[i]; i++) { %}
			    <tr class="template-download fade {%=file.refid%}">
			        <td>
			            <span class="preview">
			                {% if (file.thumbnailUrl) { %}
			                    <!--<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>-->
								<!--<video src="{%=file.url%}" controls=""></video>-->
			                {% } %}
			            </span>
			        </td>
			        <td class="vab">
			            <p class="name">
			                {% if (file.url) { %}
			                    {%=file.name%}
			                {% } else { %}
			                    <span>{%=file.name%}</span>
			                {% } %}
			            </p>
			        </td>
			        <td class="vam">
						{% if (file.error) { %}
			                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
						{% } else { %}
							<div><span class="label label-success"><i class="glyphicon glyphicon-ok"></i> Upload success</span></div>
			            {% } %}
			        </td>
			        <td class="vam">
						{% if (file.url) { %}
							<a class="btn btn-inverse btn-edit-upload" href="#">
			                    <i class="fa fa-edit"></i>
			                    <span>Edit File</span>
			                </a>
						{% } %}
			        </td>
			    </tr>
			{% } %}
			</script>
