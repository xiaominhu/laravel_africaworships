@extends('adminmenu')
@section('admin_content')


	<section class="content-header">
		  <h1>
			Add and Edit Ads
			<small>Please edit ads.</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Ads</a></li>
			<li class="active">ads</li>
		  </ol>
	</section>
	
	  <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<?php
						if(isset($ads))
							$url = "/addads?id=".$ads['id'];
						else
							$url = "/addads";
						
					?>
					<div class="box-body pad">
						<form role = "form" method = "POST" action="<?php echo $url ?>">
							<div class="form-group">
								
								<label for = "ads_title_edit"> News Title </label>
								<input id = "ads_title_edit" name = "ads_title_edit" value="<?php if(isset($ads)) echo $ads['title']; ?>" class="form-control">
							</div>
							
							<div class="form-group">
								<label for = "ads_type_edit"> Type </label>
								<select class="form-control" id = "ads_type_edit"   name = "ads_type_edit">
									<option value = "-1"  <?php if(!isset($ads)) {?> selected = "selected" <?php }?>>-select the Type-</option>
									<option value = "0" <?php  
										if(isset($ads)){
											if($ads['type'] == '0')  echo 'selected = "selected"';
										}
										
									
									?>>Code</option>
									<option value = "1" <?php  
										if(isset($ads)){
											if($ads['type'] == '1')  echo 'selected = "selected"';
										}									
									?>>Image</option>
								</select>
							</div>
							
							
							<div class="form-group code-ads-edit-div">
								<label for = "ads_code_edit"> Code </label>
								<input id = "ads_code_edit" name = "ads_code_edit" value='<?php if(isset($ads)) echo $ads['code']; ?>' class="form-control">
							</div>
							
							
							<div class="form-group image-ads-edit-div">
									<label for = "progress_image_ads"> Upload Images </label>
									<br/>
									<span class="btn btn-success fileinput-button">
										<i class="glyphicon glyphicon-plus"></i>
										<span>Add files...</span>
										<!-- The file input field used as target for the file upload widget -->
										<input id="fileupload_ads" type="file" name="files" multiple>
									</span>
									
									<br>
									<br>
									<!-- The global progress bar -->
									<div id="progress_image_ads" class="progress">
										<div class="progress-bar progress-bar-success"></div>
									</div>
									<!-- The container for the uploaded files -->
									<div id="files_upload_ads" class="files">

										<?php if(isset($ads)){
											
											if($ads['image'] != null){
											
										?>	
											<div>
												<p>											
												<img src = "server/php/files/{{$ads->image}}" height = "100" width = '100' />
													<br>
													<span><?php echo $ads['image'] ?></span>
												</p>
											</div>
										<?php	
										}
										}
										?>
									
									</div>
									<br>
									
								
							</div>
							
						    <input type = "hidden" id = "uploadads_img"  name = "uploadads_img" value = "<?php if(isset($ads)) echo $ads['image'] ?>" />
						
							
							
							<div class = "form-group image-ads-edit-div">
								<label for = "ads_url_edit"> URL </label>
								<input id = "ads_url_edit" name = "ads_url_edit" value='<?php if(isset($ads)) echo $ads['url']; ?>' class="form-control">
							</div>
							
							
							
							<div class="form-group">
								<label for = "ads_menu_edit"> Menu </label>
									<select class="form-control" id = "ads_menu_edit"   name = "ads_menu_edit">
										<option value = "-1" <?php if(!isset($ads)) {?> selected = "selected" <?php }?> >-select the Menu-</option>
										<option value = "0"<?php  
											if(isset($ads)){
												if($ads['menu'] == '0') echo 'selected = "selected"';
											}
											
										
										?>>Home</option>
										<option value = "1" <?php  
											if(isset($ads)){
												if($ads['menu'] == '1') echo 'selected = "selected"';
											}
											
										
										?>>Browse</option>
										<option value = "2" <?php  
											if(isset($ads)){
												if($ads['menu'] == '2') echo 'selected = "selected"';
											}
											
										
										?>>Chart</option>
										<option value = "3" <?php  
											if(isset($ads)){
												if($ads['menu'] == '3') echo 'selected = "selected"';
											}
											
										
										?>>Artists</option>
										<option value = "4" <?php  
											if(isset($ads)){
												if($ads['menu'] == '4') echo 'selected = "selected"';
											}
											
										
										?>>Lyrics</option>
										<option value = "5" <?php  
											if(isset($ads)){
												if($ads['menu'] == '5') echo 'selected = "selected"';
											}
											
										
										?>>News</option>
									</select>
							</div>
							
							<div class="form-group">
								<label for = "ads_pos_edit"> Position </label>
								<select class="form-control" id = "ads_pos_edit"   name = "ads_pos_edit">
									<option value = "-1"  <?php if(!isset($ads)) {?> selected = "selected" <?php }?>>-select the page position-</option>
									<option value = "0" <?php  
										if(isset($ads)){
											if($ads['pos'] == '0') echo 'selected = "selected"';
										}
										
									
									?>>Header</option>
									<option value = "1" <?php  
										if(isset($ads)){
											if($ads['pos'] == '1') echo 'selected = "selected"';
										}
										
									
									?>>Footer</option>
									<option value = "2" <?php  
										if(isset($ads)){
											if($ads['pos'] == '2') echo 'selected = "selected"';
										}
										
									
									?>>Sidebar</option>
								</select>
							</div>
							
						<?php
						echo '<input id = "hidden_token" type = "hidden" value = "'. csrf_token().'" name = "_token">';

						?>	
						  
						
						
						<div style = "text-align:center">
						  <button id = "ads_save" type="submit" class="btn btn-success btn-lg" >		SAVE
						  </button> 
						</div> 
						
						<?php 
						if(isset($ads)) {
							if($ads['type'] == '0'){?> 
							<script>
								$(".image-ads-edit-div").hide();
								$(".code-ads-edit-div").show();
							</script>
							<?php
							} 
							else{?> 
							<script>
								$(".image-ads-edit-div").show();
								$(".code-ads-edit-div").hide();	
							</script>
							<?php }
						}
						
						//https://github.com/yannisg/Google-Drive-Uploader-PHP/blob/master/gdrive_token.php
						?>
						
						</form>
					</div>
				</div>
			<!-- /.box -->
			</div>
        <!-- /.col-->
		</div>
      <!-- ./row -->
    </section>
@stop
