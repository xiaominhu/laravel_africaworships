
<?php
    /*Just for your server-side code*/
    header('Content-Type: text/html; charset=ISO-8859-1');
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Africa Worship</title>
  <meta name="description" content="Music, Musician, Bootstrap" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="images/logo.png">
  
  <!-- style -->
  <link href="{{asset('css/animate.css/animate.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('css/glyphicons/glyphicons.css')}}" rel="stylesheet" type="text/css" />
 
  <link href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{asset('css/material-design-icons/material-design-icons.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href=" {{asset('css/bootstrap/dist/css/bootstrap.min.css')}}" type="text/css" />

  
  
  
  <!-- build:css css/styles/app.min.css -->
  <link href="{{asset('css/styles/app.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('css/styles/style.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('css/styles/font.css')}}" rel="stylesheet" type="text/css" />

  
  <link href="{{asset('libs/owl.carousel/dist/assets/owl.carousel.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/owl.carousel/dist/assets/owl.theme.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/mediaelement/build/mediaelementplayer.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/mediaelement/build/mep.css')}}" rel="stylesheet" type="text/css" />



  <link href="{{asset('css/jquery.fileupload.css')}}" rel="stylesheet" type="text/css" />
  <!-- endbuild -->
  
  <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
		
		
		var login =<?php
			if (Auth::check()) echo 1;
			else  echo 0;
		?>;
		
    </script>
  
</head>
<body>
  <div class="app dk" id="app">
<!-- ############ LAYOUT START-->

  <!-- content -->
  <div id="content" class="app-content white bg" role="main">
    <div class="app-header white lt box-shadow-z1">
        <div class="navbar" data-pjax>
              <a data-toggle="collapse" data-target="#navbar" class="navbar-item pull-right hidden-md-up m-r-0 m-l">
                <i class="material-icons">menu</i>
              </a>
              <!-- brand -->
              <a href="/home" class="navbar-brand md">             
				<img src="{{asset('images/logo.png')}}" alt="login">
				
              	<span class="hidden-folded inline">Africa Worships</span>
              </a>
              <!-- / brand -->
      
              <!-- nabar right -->
              <ul class="nav navbar-nav pull-right">
                <li class="nav-item">
                  <a class="nav-link" data-toggle="modal" data-target="#search-modal">
                    <i class="material-icons">search</i>
                  </a>
                </li>
                
			@if (Auth::guest())
				<li class="nav-item">
			
					<div class="dropdown" style = "margin-top: 12px;">
						  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Submit
						  </button>
						  <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item upload_guestbutton">  Song </a>
							<a class="dropdown-item upload_guestbutton"> Lyrics</a>
							<a class="dropdown-item upload_guestbutton"> Video </a>
							<a class="dropdown-item upload_guestbutton"> News </a>
						  </div>
					</div>
				</li>
				
				<li class = "nav-item">
					<a href="{{ url('/login') }}" class="nav-link clear userlogin">
						<span class="avatar">
						  <img src="{{asset('images/login.png')}}" alt="login">
						</span>
					</a>
				</li>
				
				<li class = "nav-item">
					<a href="{{ url('/register') }}" class="nav-link clear">
						<span class="avatar">
						  <img src="{{asset('images/signup.jpg')}}" alt="signup">
						</span>
					</a>
				</li>
				
			@else
				
				
				@if(((Auth::user()->usertype == 1) && (Auth::user()->status == 1)) || (Auth::user()->usertype == 2))
				
				 
				<li class = "nav-item">
					<div class="dropdown" style = "margin-top: 12px;">
						  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Submit
						  </button>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item"  data-toggle="modal" data-target="#upload_song_modal">  Song </a>
							<a class="dropdown-item"  data-toggle="modal"  data-target="#upload_ryric_modal"> Lyrics</a>
							<a class="dropdown-item" data-toggle="modal"  data-target="#upload_video_modal"> Video </a>
							<a class="dropdown-item" data-toggle="modal"  data-target="#upload_news_modal"> News </a>
						  </div>
					</div>
				
				</li>
				@endif
				
				@if(Auth::user()->usertype == 2)
				<li class="nav-item">
					<a class="md-btn md-raised m-b-sm w-xs blue"  href="{{ url('/admin') }}" style = "margin-top: 12px;">
                      <span>admin</span>
                    </a>
				</li>
				@endif
				
				
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link clear" data-toggle="dropdown">
                    <span class="avatar  user-profile-image-span">
					
						@if(Auth::user()->image)
							<img src="{{Auth::user()->image}}" alt="...">
						@else
							<img src="{{asset('images/no_image.jpg') }}" alt="...">
						@endif	
					  
                    </span>
                  </a>
                  <div class="dropdown-menu w dropdown-menu-scale pull-right">
				
				    <a class="dropdown-item" href="{{ url('/profile') }}">
                      <span>Profile</span>
                    </a>
                    <a class="dropdown-item" href="{{ url('/profile?show=track') }}" >
                      <span>Tracks</span>
                    </a>
                    <a class="dropdown-item" href="{{ url('/profile?show=playlist') }}">
                      <span>Playlists</span>
                    </a>
                    <a class="dropdown-item" href="{{ url('/profile?show=like') }}">
                      <span>Likes</span>
                    </a>
                    <div class="dropdown-divider"></div>
                   
					<a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					Sign out
				    </a>

					<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
                  </div>
                </li>
			
				
				
				
			@endif
              </ul>
              <!-- / navbar right -->
      
              <!-- navbar collapse -->
              <div class="collapse navbar-toggleable-sm l-h-0 text-center" id="navbar">
                <!-- link and dropdown -->
                <ul class="nav navbar-nav nav-md inline text-primary-hover" data-ui-nav>
                  <li class="nav-item">
                    <a href="/home" class="nav-link">
                      <span class="nav-text">Discover</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/browse" class="nav-link">
                      <span class="nav-text">Browse</span>
                    </a>
                  </li>
				  
				   <li class="nav-item">
						<a href="/videos" class="nav-link">
						  <span class="nav-text">Videos</span>
						</a>
					</li>
					
					
                  <li class="nav-item dropdown pos-stc">
                    <a href="/chart" class="nav-link">
                      <span class="nav-text">Charts</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/artist" class="nav-link">
                      <span class="nav-text">Artists</span>
                    </a>
                  </li>
				  
				  <li class="nav-item">
                    <a href="/lyrics" class="nav-link">
                      <span class="nav-text">Lyrics</span>
                    </a>
                  </li>
				  
				  <li class="nav-item">
                    <a href="/news" class="nav-link">
                      <span class="nav-text">News</span>
                    </a>
                  </li>
				  
				  
                </ul>
                <!-- / link and dropdown -->
              </div>
              <!-- / navbar collapse -->
        </div>
    </div>
 
   
	@yield('main_content_error');
	
 </div>
  <!-- / -->

 
    <!-- ############ File upload song -->
    <div class="modal white lt fade" id="upload_song_modal" data-backdrop="false">
      <a data-dismiss="modal" class="text-muted text-lg p-x modal-close-btn">&times;</a>
      <div class="row-col">
		
		
	  
        <div class="p-a-lg h-v row-cell">
          <div class="row">
			
			<div class = "col-md-12 modal-title"> 
				<h1 class="display-5">Upload Songs</h1>
			</div>
			
            <div class="col-md-8 offset-md-2 v-m">
				
					<div class="tab-pane" id="profile">
						<form role = "form" method = "POST" action="{{ url('/uploadsong') }}">
							<div class="form-group row">
								<div class="col-sm-3 form-control-label text-muted">Song Title</div>
								<div class="col-sm-9"><input id = "title-upload-song" name = "title_upload_song"value="" class="form-control"></div>
							</div>
							
						    <div class="form-group row">
									<div class="col-sm-3 form-control-label text-muted">Upload Songs</div>
									<div class="col-sm-9">
														
										<span class="btn btn-success fileinput-button">
											<i class="glyphicon glyphicon-plus"></i>
											<span>Add files...</span>
											<!-- The file input field used as target for the file upload widget -->
											<input id="fileupload_song" type="file" name="files" multiple>
										</span>
										
										<br>
										<br>
										<!-- The global progress bar -->
										<div id="progress_song" class="progress">
											<div class="progress-bar progress-bar-success"></div>
										</div>
										<!-- The container for the uploaded files -->
										<div id="files_upload_song" class="files"></div>
										<br>
										
								</div>
							</div>
						  
						  <div class="form-group row">
							<div class="col-sm-3 form-control-label text-muted">Upload Images</div>
							<div class="col-sm-9">
														
							   <!-- <input id = "songname-upload-song" placeholder="" class="form-control">  -->
							   
							    <span class="btn btn-success fileinput-button">
									<i class="glyphicon glyphicon-plus"></i>
									<span>Add files...</span>
									<!-- The file input field used as target for the file upload widget -->
									<input id="fileupload" type="file" name="files" multiple>
								</span>
								
								<br>
								<br>
								<!-- The global progress bar -->
								<div id="progress_image" class="progress">
									<div class="progress-bar progress-bar-success"></div>
								</div>
								<!-- The container for the uploaded files -->
								<div id="files_upload" class="files upload-content"></div>
								<br>
								
							
							</div>
						</div>
						
						<div class = "form-group row">
							<div class = "col-md-12">
								<div class="alert alert-success uploadsong-alert" role="alert" style = "text-align:center; display:none;">
								  <strong>Success!</strong>We email you when your song is apporved.
								</div>
							</div>
						</div>
						
						  
						<?php
						
						echo '<input id = "hidden_token" type = "hidden" value = "'. csrf_token().'" name = "_token">';

						?>	
						  
						  <input type = "hidden" id = "uploadsong_src"  name = "uploadsong_src" />
						  <input type = "hidden" id = "uploadsong_img"  name = "uploadsong_img" />
						
						
						
						<div style = "text-align:center">
						  <button id = "uploadsong_save" type="submit" class="btn btn-lg black p-x-lg" >		Save
						  </button> 
						</div> 
						  
						</form>
					</div>
				
				
			</div>
          </div>
        </div>
      </div>
    </div>
    <!-- ############ FILEUPLOADS END -->
	
	<!-- ############ File upload Lyric -->
    <div class="modal white lt fade" id="upload_ryric_modal" data-backdrop="false">
      <a data-dismiss="modal" class="text-muted text-lg p-x modal-close-btn">&times;</a>
      <div class="row-col">
		
        <div class="p-a-lg h-v row-cell">
          <div class="row">
			
			<div class = "col-md-12 modal-title"> 
				<h1 class="display-5">Upload Lyric</h1>
			</div>
			
            <div class="col-md-8 offset-md-2 v-m">
				
					<div class="tab-pane" id="profile">
						<form role = "form" method = "POST" action="{{ url('/uploadryric') }}">
							<div class="form-group row">
								<div class="col-sm-3 form-control-label text-muted">Lyric Title</div>
								<div class="col-sm-9"><input id = "title-upload-song_riryc" name = "title_upload_song_riryc" value="" class="form-control"></div>
							</div>
							<div class="form-group row">
							  <div class="col-sm-3 form-control-label text-muted">Lyric</div>
							  <div class="col-sm-9">
								<textarea id = "lyrics_content" name = "lyrics_content" class="form-control" rows="5" id="bio"></textarea>
							  </div>
							</div>
				
							<div class="form-group row">
								<div class="col-sm-3 form-control-label text-muted">Artise Name</div>
								<div class="col-sm-9"><input id = "lyrics_artise_name" name = "lyrics_artise_name" value="" class="form-control"></div>
							</div>
							
						  <div class="form-group row">
							<div class="col-sm-3 form-control-label text-muted">Upload Images</div>
							<div class="col-sm-9">
														
							   <!-- <input id = "songname-upload-song" placeholder="" class="form-control">  -->
							   
							    <span class="btn btn-success fileinput-button">
									<i class="glyphicon glyphicon-plus"></i>
									<span>Add files...</span>
									<!-- The file input field used as target for the file upload widget -->
									<input id="fileupload_riryc" type="file" name="files" multiple>
								</span>
								
								<br>
								<br>
								<!-- The global progress bar -->
								<div id="progress_image_riryc" class="progress">
									<div class="progress-bar progress-bar-success"></div>
								</div>
								<!-- The container for the uploaded files -->
								<div id="files_upload_riryc" class="files upload-content"></div>
								<br>
								
							</div>
						  </div>
						
						<div class = "form-group row">
							<div class = "col-md-12">
								<div class="alert alert-success uploadlyric-alert" role="alert" style = "text-align:center; display:none;">
								  <strong>Success!</strong>We email you when your lyric is apporved.
								</div>
							</div>
						</div>
						 
						  
						  
						  
						<?php
						
						echo '<input id = "hidden_token" type = "hidden" value = "'. csrf_token().'" name = "_token">';

						?>	
						  
						  
						  <input type = "hidden" id = "uploadsong_img_riryc"  name = "uploadsong_img_riryc" />
						
						<div style = "text-align:center">
						  <button id = "uploadsong_save_riryc" type="submit" class="btn btn-lg black p-x-lg" >		Save
						  </button> 
						</div> 
						  
						</form>
					</div>
				
				
			</div>
          </div>
        </div>
      </div>
    </div>
    <!-- ############  END -->
	
	
	
	 <!-- ############ SEARCH START -->
    <div class="modal white lt fade" id="search-modal" data-backdrop="false">
      <a data-dismiss="modal" class="text-muted text-lg p-x modal-close-btn">&times;</a>
      <div class="row-col">
        <div class="p-a-lg h-v row-cell v-m">
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <form action="/search" class="m-b-md" method="GET">
                <div class="input-group input-group-lg">
                  <input id ="searchkeyword" name = "searchkeyword" type="text" class="form-control" placeholder="Type keyword" data-ui-toggle-class="hide" data-ui-target="#search-result">
                  <span class="input-group-btn">
                    <button class="btn b-a no-shadow white" type="submit">Search</button>
                  </span>
                </div>
				
				{{ csrf_field() }}
              </form>
            
             
            
			
			
			</div>
          </div>
        </div>
      </div>
    </div>
    <!-- ############ SEARCH END -->
	


<!-- ############ LAYOUT END-->
  </div>


 
<!-- jQuery -->
  <script type="text/javascript" src="{{asset('libs/jquery/dist/jquery.js') }}"></script>
<!-- Bootstrap -->
  <script type="text/javascript" src="{{asset('libs/tether/dist/js/tether.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('libs/bootstrap/dist/js/bootstrap.js') }}"></script>
<!-- core -->
  <script type="text/javascript" src="{{asset('libs/jQuery-Storage-API/jquery.storageapi.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('libs/jquery.stellar/jquery.stellar.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('libs/jscroll/jquery.jscroll.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('libs/PACE/pace.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('libs/jquery-pjax/jquery.pjax.js')}}"></script>
  <script type="text/javascript" src="{{asset('libs/mediaelement/build/mediaelement-and-player.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('libs/mediaelement/build/mep.js')}}"></script>
  

  
  
  <!---------------- custom js  ---------------------->

  <script type="text/javascript" src="{{asset('scripts/upload.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/comment.js')}}"></script>  
  <!-------------------- end custom.js  ---------------->
  
  <script type="text/javascript" src="{{asset('scripts/config.lazyload.js')}}"></script>  
  <script type="text/javascript" src="{{asset('scripts/ui-load.js')}}"></script>  
  <script type="text/javascript" src="{{asset('scripts/ui-jp.js')}}"></script>  
  <script type="text/javascript" src="{{asset('scripts/ui-include.js')}}"></script>  
  <script type="text/javascript" src="{{asset('scripts/ui-device.js')}}"></script>  
  <script type="text/javascript" src="{{asset('scripts/ui-form.js')}}"></script>  
  <script type="text/javascript" src="{{asset('scripts/ui-nav.js')}}"></script>  
  <script type="text/javascript" src="{{asset('scripts/ui-screenfull.js')}}"></script>  
  <script type="text/javascript" src="{{asset('scripts/ui-scroll-to.js')}}"></script>  
  <script type="text/javascript" src="{{asset('scripts/ui-toggle-class.js')}}"></script>  
  <script type="text/javascript" src="{{asset('scripts/ui-taburl.js')}}"></script>  
  <script type="text/javascript" src="{{asset('scripts/app.js')}}"></script>  
  <script type="text/javascript" src="{{asset('scripts/site.js')}}"></script>  
  <script type="text/javascript" src="{{asset('scripts/ajax.js')}}"></script>
  <!----------------for file upload   ----------------->
   <script type="text/javascript" src="{{asset('js/vendor/jquery.ui.widget.js')}}"></script>
   <script type="text/javascript" src="{{asset('//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('js/jquery.iframe-transport.js')}}"></script>
   <script type="text/javascript" src="{{asset('js/jquery.fileupload.js')}}"></script>
   <script type="text/javascript" src="{{asset('js/jquery.fileupload-process.js')}}"></script>
   <script type="text/javascript" src="{{asset('js/jquery.fileupload-image.js')}}"></script>
   <script type="text/javascript" src="{{asset('js/jquery.fileupload-audio.js')}}"></script>
   <script type="text/javascript" src="{{asset('js/jquery.fileupload-validate.js')}}"></script>

<!-- endbuild -->




</body>
</html>
