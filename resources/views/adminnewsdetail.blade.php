@extends('adminmenu')
@section('admin_content')
	<section class="content-header">
		  <h1>
			Add and Edit News
			<small>Please edit news.</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Eidtors</a></li>
			<li class="active">Editors</li>
		  </ol>
	</section>
	
	<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
				<?php
						if(isset($news))
							$url = "/uploadnews?id=".$news['id'];
						else
							$url = "/uploadnews";
				?>
            <div class="box-body pad">
				<form class="form-horizontal uploadnewadmin-form"  role = "form" method = "POST" action="<?php echo $url ?>" enctype="multipart/form-data">
							<div class="form-group row">
								<div class="col-sm-3 form-control-label text-muted">News Title</div>
								<div class="col-sm-9"><input id = "title_upload_news" name = "title_upload_news" value="<?php if(isset($news)) echo $news['title'] ?>" class="form-control"></div>
							</div>
							
						<div class="form-group row">
							<div class="col-sm-3 form-control-label text-muted">Upload Images</div>
							<div class="col-sm-9">
								
								<input type = "file" id = "uploadnews_img"  name = "uploadnews_img" value = "<?php if(isset($news)) echo $news['image'] ?>" />
								  
								<br>
								<br>
								
								<!-- The container for the uploaded files -->
								
									<?php if(isset($news)){
									?>	
										<div>
											<p>											
											<img src = "{{$news->image}}" height = "100" width = '100' />
											</p>
										</div>
									<?php	
									} ?>
							</div>
						  </div>
						
							<div class = 'form-group row'>
								<div class="col-sm-3 form-control-label text-muted">Content</div>
								<div class="col-sm-9">
							
									<textarea id="summernote_code" name="summernote_code" rows="10" cols="80">
									
									@if(isset($news))
										{{$news->code}}
									@endif
									
									</textarea>
											
								</div>
							</div>
							
						<div style = "text-align:center">
						  <button id = "uploadnews_save" type="submit" class="btn btn-success btn-lg">SAVE</button> 
						</div> 
						  {{ csrf_field() }}
						</form>
						
           
            </div>
      


	  </div>
          <!-- /.box -->

      
		  
		  
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
	
	<script>
		 CKEDITOR.replace('summernote_code');
	</script>


@stop