<?php

    header('Content-Type: text/html; charset=ISO-8859-1');
	$url = Request::url();
	$img_url = asset("images/logo.png");
	$description = "Africaworships.com is Africa’s foremost online platform for Christian music from the continent of Africa and from Africans everywhere.";
	$title = "Africa’s foremost online platform for Christian music";
	
	if (strpos($url, 'home') !== false ) {
		$title = "Africa’s foremost online platform for Christian music";
	}elseif (strpos($url, 'browse')  !== false) {
		$title = "Africaworships - Browse and download new songs and lyrcis ";
	}elseif (strpos($url, 'chart') ) {
		$title = "Top Download and Played Songs on Africa Worships";
	}elseif (strpos($url, 'artist') !== false ) {
		$title = "Profiles and Bios of African Gosple Artist";
	}elseif ( strpos($url, 'lyrics') !== false ) {
		$title = "Gosple lyrics on Africaworships";
	}elseif ( strpos($url, 'news')  !== false) {
		$title = "News and Devotional Messages on Africa Worships";
	}elseif ( strpos($url, 'full-post') !== false ) {
		$title = "$news->title";
		$description = "$news->title";
		$img_url = asset($news['image']);
	}elseif ( strpos($url, 'lyric-detail') !== false) {
		$title = "$lyric->title"." by " . $lyric->artise_name;
		$description = "$lyric->title"." by " . $lyric->artise_name;
		$img_url =  asset($lyric->image);
	}elseif ( strpos($url, 'profile-details') !== false ) {
		$title = "$artist->name"."'s". " Profile - BIO";
		$description = "$artist->BIO";
		$img_url = $artist->image;
	}elseif ( strpos($url, 'trackdetail')!== false ) {
		$title = "$song->title";
		$description = "$song->title" ." by"." $track_user->name";
		$img_url = asset($song_item->image);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?= $title ?></title>
	<meta name="description" content="<?= $description ?>">
	<!-- Google Plus -->
	<!-- Update your html tag to include the itemscope and itemtype attributes. -->
	<itemtype="http://schema.org/blog">
	<meta itemprop="name" content="<?= $title; ?>">
	
	<meta itemprop="description" content="<?= $description ?>">
	<meta itemprop="image" content="<?=  $img_url; ?>">
	
	<!-- Twitter -->
	<meta name="twitter:card" content="<?= $description ?>">
	<meta name="twitter:site" content="@africaworships">
	<meta name="twitter:title" content="<?= $title ?>">
	<meta name="twitter:description" content="<?= $description ?>">
	<meta name="twitter:creator" content="@africaworships">
	<meta name="twitter:image:src" content="<?=  $img_url; ?>">
	
	<!-- Open Graph General (Facebook & Pinterest) -->
	<meta property="og:url" content="<?= $url ?>">
	<meta property="og:title" content="<?= $title ?>">
	<meta property="og:description" content="<?= $description ?>">
	<meta property="og:site_name" content="<?= $title ?>">
	<meta property="og:image" content="<?=  $img_url; ?>">
	<meta property="fb:admins" content="100004080360665">
	<meta property="fb:app_id" content="1607181296244314">
	<meta property="og:type" content="article">
	<meta property="og:locale" content="en_US">
	
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
<!----- summernote  -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
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
  
  
	<!-- jQuery -->
    <script type="text/javascript" src="{{asset('libs/jquery/dist/jquery.js') }}"></script>
	
	<!-- Bootstrap -->
     
    <script type="text/javascript" src="{{asset('libs/tether/dist/js/tether.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('libs/bootstrap/dist/js/bootstrap.js') }}"></script>		
	  
	<script src="{{asset('js/summernote.min.js')}}"></script>
  
  
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
				
				
				@if(((Auth::user()->usertype == 1) && (Auth::user()->status == 1)&& (Auth::user()->permission == 1)) || (Auth::user()->usertype == 2))
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
							<img src="{{asset('images/profile.png') }}" alt="...">
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
    
	   
				
				<?php
					if(isset($ads)){
						$adsitem = getAds($ads, '0');
						
						if($adsitem) {
							if($adsitem->type == "0"){
							?>	
							<div class = "col-md-12" style = "text-align: center;">
								<?php
									echo $adsitem->code;
								?>	
							</div>
							
							<?php
							
							}
							else{
				?>
							<div class = "col-md-12" style = "text-align: center; height : 90px; margin: 10px auto;">
								<a href="<?php 
									echo  $adsitem->url;
								?>" class="item-media-content" style="background-image: url('{{$adsitem->image}}'); height : 90px; width:970px; margin: 0 auto;"></a>
							</div>
							
				<?php	
							
							
							}
						}
					}
					
				?>
				
				
				
		
	
	
	</div>
    <div class="app-footer app-player grey bg">
      <div class="playlist" style="width:100%"></div>
    </div>
   	@yield('main_content');
	</div>
  <!-- / -->

  <!-- ############ SWITHCHER START-->
    <div id="switcher">
      <div class="switcher white" id="sw-theme">
        <a href="#" data-ui-toggle-class="active" data-ui-target="#sw-theme" class="white sw-btn">
          <i class="fa fa-gear text-muted"></i>
        </a>
        <div class="box-header">
          <strong>Theme Switcher</strong>
        </div>
        <div class="box-divider"></div>
        <div class="box-body">
          <p id="settingLayout" class="hidden-md-down">
            <label class="md-check m-y-xs" data-target="container">
              <input type="checkbox">
              <i class="green"></i>
              <span>Boxed Layout</span>
            </label>
            <label class="m-y-xs pointer" data-ui-fullscreen data-target="fullscreen">
              <span class="fa fa-expand fa-fw m-r-xs"></span>
              <span>Fullscreen Mode</span>
            </label>
          </p>
          <p>Colors:</p>
          <p data-target="color">
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="primary">
              <i class="primary"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="accent">
              <i class="accent"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="warn">
              <i class="warn"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="success">
              <i class="success"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="info">
              <i class="info"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="blue">
              <i class="blue"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="warning">
              <i class="warning"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="danger">
              <i class="danger"></i>
            </label>
          </p>
          <p>Themes:</p>
          <div data-target="bg" class="text-u-c text-center _600 clearfix">
            <label class="p-a col-xs-3 light pointer m-a-0">
              <input type="radio" name="theme" value="" hidden>
              <i class="active-checked fa fa-check"></i>
            </label>
            <label class="p-a col-xs-3 grey pointer m-a-0">
              <input type="radio" name="theme" value="grey" hidden>
              <i class="active-checked fa fa-check"></i>
            </label>
            <label class="p-a col-xs-3 dark pointer m-a-0">
              <input type="radio" name="theme" value="dark" hidden>
              <i class="active-checked fa fa-check"></i>
            </label>
            <label class="p-a col-xs-3 black pointer m-a-0">
              <input type="radio" name="theme" value="black" hidden>
              <i class="active-checked fa fa-check"></i>
            </label>
          </div>
        </div>
      </div>
    </div>
  <!-- ############ SWITHCHER END-->

    <!-- ############ File upload song -->
    <div class="modal white lt fade" id="upload_song_modal" data-backdrop="false">
      <a data-dismiss="modal" class="text-muted text-lg p-x modal-close-btn">&times;</a>
      <div class="row-col">
		
        <div class="p-a-lg h-v row-cell">
          <div class="row">
			
			<div class = "col-md-12 modal-title"> 
				<h1 class="display-5">Song</h1>
			</div>
			
            <div class="col-md-8 offset-md-2 v-m">
				
					<div class="tab-pane" id="profile">
						<form action="/uploadsong"  class="form-horizontal uploadsong-form" method = "post"  enctype="multipart/form-data">
						<div class="form-group row h4">
							<div class="col-sm-3 form-control-label text-muted">Song Title</div>
							<div class="col-sm-9"><input id = "title-upload-song" name = "title_upload_song"value="" class="form-control"></div>
						</div>
						<br>
						<br>
						<br>
						    <div class="form-group row h4">
								<div class="col-sm-3 form-control-label text-muted">Upload Songs</div>
								<div class="col-sm-9">				
							<input type = "file" id = "uploadsong_src"  name = "uploadsong_src" />			
								</div>
							</div>
						  
						  <br>
						  <br>
						  <br>
						  <br>
						  
						<div class="form-group row h4 " >
							<div class="col-sm-3 form-control-label text-muted">Upload Images</div>
							<div class="col-sm-9">
								
								<input type = "file" id = "uploadsong_img"  name = "uploadsong_img" />
							
							</div>
						</div>
						
						<br>
						<br>
						
						<div class = "form-group row">
							<div class = "col-md-12">
								@if (count($errors) > 0)
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
							</div>
							
							<div class = "col-md-12">
								<div class="alert alert-success uploadsong-alert" role="alert" style = "text-align:center; display:none;">
								  <strong>Success!</strong>We email you when your song is apporved.
								</div>
								
								<div class="alert  alert-warning uploadsong-alert-warn" role="alert" style = "text-align:center; display:none;">
								  <strong>Warning!</strong>  <span class = "uploadsong-alert-warn-content"> We email you when your video is apporved </span>.
								</div>
								
								
							</div>
						</div>
						
						<?php
						echo '<input id = "hidden_token" type = "hidden" value = "'. csrf_token().'" name = "_token">';
						?>	
						
						<div style = "text-align:center">
						  <button id = "uploadsong_save" class="btn btn-lg black p-x-lg" >		Save
						  </button> 
						</div> 						  
						
						 {{ csrf_field() }}
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
				<h1 class="display-5">Lyric</h1>
			</div>
			
            <div class="col-md-8 offset-md-2 v-m">
				
					<div class="tab-pane" id="profile">
					
					<form action="/uploadlyric"  class="form-horizontal uploadlyric-form" method = "post"  enctype="multipart/form-data">
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
									<!-- The container for the uploaded files -->
									<input type = "file" id = "uploadsong_img_riryc"  name = "uploadsong_img_riryc" />
								</div>
							</div>
							
							<div class = "form-group row">
								<div class = "col-md-12">
									<div class="alert alert-success uploadlyric-alert" role="alert" style = "text-align:center; display:none;">
									  <strong>Success!</strong>We email you when your lyric is apporved.
									</div>
									
									<div class="alert  alert-warning uploadlyric-alert-warn" role="alert" style = "text-align:center; display:none;">
									  <strong>Warning!</strong>  <span class = "uploadlyric-alert-warn-content"> We email you when your video is apporved </span>.
									</div>
									
									
								</div>
							</div>
							
						
						{{ csrf_field() }}
						
						<div style = "text-align:center">
						  <button id = "uploadsong_save_riryc" class="btn btn-lg black p-x-lg" >		Save
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
	
	
	
	<!-- ############ File upload video -->
    <div class="modal white lt fade" id="upload_video_modal" data-backdrop="false">
      <a data-dismiss="modal" class="text-muted text-lg p-x modal-close-btn">&times;</a>
      <div class="row-col">
		
        <div class="p-a-lg h-v row-cell">
          <div class="row">
			
			<div class = "col-md-12 modal-title"> 
				<h1 class="display-5">Video</h1>
			</div>
			
            <div class="col-md-8 offset-md-2 v-m">
				
					<div class="tab-pane" id="profile">
					<form action="/uploadvideo"  class="form-horizontal uploadvideo-form" method = "post"  enctype="multipart/form-data">
							<div class="form-group row">
								<div class="col-sm-3 form-control-label text-muted">Video Title</div>
								<div class="col-sm-9"><input id = "title-upload-video" name = "title_upload_video" value="" class="form-control"></div>
							</div>
							
							
							<div class="form-group row">
								<div class="col-sm-3 form-control-label text-muted">Video URL</div>
								<div class="col-sm-9"><input id = "video_url" name = "video_url" value="" class="form-control"></div>
							</div>
							
							
							<div class="form-group row">
							  <div class="col-sm-3 form-control-label text-muted">Video  Description</div>
							  <div class="col-sm-9">
								<textarea id = "video_content" name = "video_content" class="form-control" rows="5" id="bio"></textarea>
							  </div>
							</div>
				
							
							
						  <div class="form-group row">
							<div class="col-sm-3 form-control-label text-muted">Video Images</div>
							<div class="col-sm-9">
							    <input type = "file" id = "uploadsong_img_video"  name = "uploadsong_img_video" />
							</div>
						  </div>
							
							<input type = "hidden" name = "videotype" id = "videotype" >
						
						
							<div class = "form-group row">
								<div class = "col-md-12">
									<div class="alert alert-success uploadvideo-alert" role="alert" style = "text-align:center; display:none;">
									  <strong>Success!</strong>We email you when your video is apporved.
									</div>
									
									<div class="alert  alert-warning uploadvideo-alert-warn" role="alert" style = "text-align:center; display:none;">
									  <strong>Warning!</strong>  <span class = "uploadvideo-alert-warn-content"> We email you when your video is apporved </span>.
									</div>
								</div>
							</div>
							<div style = "text-align:center">
							  <button id = "uploadvideo_save" type="submit" class="btn btn-lg black p-x-lg" >		Save
							  </button> 
							</div> 
							
								{{ csrf_field() }}
					</form>
					
					</div>	
					
			</div>
          </div>
        </div>
      </div>
    </div>
    <!-- ############  END -->
	
	
	
	<!-- ############ File News  -->
    <div class="modal white lt fade" id="upload_news_modal" data-backdrop="false">
      <a data-dismiss="modal" class="text-muted text-lg p-x modal-close-btn">&times;</a>
      <div class="row-col">
		
		<style>
			.note-editor.note-frame {
				border: 1px solid #a9a9a9 !important;
			}
		</style>
		
        <div class="p-a-lg h-v row-cell">
          <div class="row">
			
			<div class = "col-md-12 modal-title"> 
				<h1 class="display-5">News</h1>
			</div>
			
            <div class="col-md-8 offset-md-2 v-m">
				
					<div class="tab-pane" id="profile">
						
						<form action="/uploadnewsFront"  class="form-horizontal uploanewsfront-form" method = "post"  enctype="multipart/form-data">	
							<div class="form-group row">
								<div class="col-sm-3 form-control-label text-muted">News Title</div>
								<div class="col-sm-9"><input id = "title_upload_news" name = "title_upload_news" class="form-control"></div>
							</div>
							
							<div class="form-group row">
								<div class="col-sm-3 form-control-label text-muted">Upload Images</div>
								<div class="col-sm-9">
								<input type = "file" id = "uploadnews_img_front"  name = "uploadnews_img_front"/>
							
								</div>
							</div>
						  
						    <div class = 'form-group row'>								
								<div class="col-sm-3 form-control-label text-muted">Content</div>
								<div class="col-sm-9">
									
											<div id="summernote" name = "summernote"></div> 
											<script>								
												$('#summernote').summernote({
													height: 300,                 // set editor height
													minHeight: null,             // set minimum height of editor
													maxHeight: null,             // set maximum height of editor
													focus: true                  // set focus to editable area after initializing summernote
												});
											
											</script>
										<input type = 'hidden' id = 'summernote_code' name = 'summernote_code' />							
								</div>
							</div>
								
							<div class = "form-group row">
								
								<div class = "col-md-12">
									<div class="alert alert-success uploadnews-alert" role="alert" style = "text-align:center; display:none;">
									  <strong>Success!</strong>We email you when your video is apporved.
									</div>
									
									<div class="alert  alert-warning uploadnews-alert-warn" role="alert" style = "text-align:center; display:none;">
									  <strong>Warning!</strong>  <span class = "uploadnews-alert-warn-content"> We email you when your video is apporved </span>.
									</div>
									
								</div>
							</div>
						
							<div style = "text-align:center">
							  <button id = "uploadnews_save_front"  class="btn btn-lg black p-x-lg" >		Save
							  </button> 
							</div> 
							{{ csrf_field() }}
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

<!-- build:js scripts/app.min.js -->
    
	<script>
		var playlists = <?php echo json_encode($playlists)  ?>;
	</script>

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
  <script type="text/javascript" src="{{asset('scripts/player.js')}}"></script>
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