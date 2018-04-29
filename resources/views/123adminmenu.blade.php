
@if(((Auth::user()->usertype == 1) && (Auth::user()->status == 1)&& (Auth::user()->permission == 1)) || (Auth::user()->usertype == 2))
<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; charset=windows-1252" http-equiv="content-type">
    <title>AfricaWorship</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css"
      rel="stylesheet"
      media="screen">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!----- summernote  -->
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
	
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/stats.css" rel="stylesheet">
	
	<link rel="stylesheet" href="css/jquery.fileupload.css">
	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
		
	<script src="js/summernote.min.js"></script>

  </head>
  <body>
    <div class="header">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <!-- Logo -->
            <div class="logo">
              <h1><a href="/home">Africa Worships</a></h1>
            </div>
          </div>
        
          <div class="col-md-5">
            <div class="navbar navbar-inverse" role="banner">
              <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right"
                role="navigation">
                <ul class="nav navbar-nav">
                  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      Account </a>
                    <ul class="dropdown-menu animated fadeInUp">
                      <li><a href="/home">Go to Front End</a></li>
                      <li><a href="{{ url('/logout') }}" >Logout</a></li>
					
					
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-content" style = "min-height: 640px;">
      <div class="row">
        <div class="col-md-2">
          <div class="sidebar content-box" style="display: block;">
            <ul class="nav">
              <!-- Main menu -->
			  
				
                <li{!! (Request::url() == url('/adminhome')) ? ' class="current"' : '' !!}><a class="current" href="/adminhome"> Dashboard</a></li>
				
				
				<?php if($permission_array['music'] == 1) {?>
     			<li{!! (Request::url() == url('/adminmusic')) ? ' class="current"' : '' !!}><a href="/adminmusic"> Music</a></li>
				<?php
					}
				?>
				
				<?php if($permission_array['video'] == 1) {?>
     			<li{!! (Request::url() == url('/adminvideo')) ? ' class="current"' : '' !!}><a href="/adminvideo"> Video</a></li>
				<?php
					}
				?>
				
				
				
				<?php if($permission_array['lyric'] == 1) {?>
                <li{!! (Request::url() == url('/adminlyrics')) ? ' class="current"' : '' !!}><a href="/adminlyrics"> Lyrics </a></li>
			   	<?php
					}
				?>
			   
			   <?php if($permission_array['news'] == 1) {?>
				<li{!! (Request::url() == url('/adminnews')) ? ' class="current"' : '' !!}><a href="/adminnews"> News</a></li>
			   	<?php
					}
				?>
			   
			   <?php if($permission_array['comment'] == 1) {?>
               <li{!! (Request::url() == url('/admincomments')) ? ' class="current"' : '' !!}><a href="/admincomments"> Comments</a></li>
			   	<?php
					}
				?>
			   
			   <?php if($permission_array['ads'] == 1) {?>
               <li{!! (Request::url() == url('/adminads')) ? ' class="current"' : '' !!}><a href="/adminads"> Ads</a></li>
			   	<?php
					}
				?>
			   
			   <?php if($permission_array['users'] == 1) {?>
               <li{!! (Request::url() == url('/adminusers')) ? ' class="current"' : '' !!}><a href="/adminusers"> Users</a></li>
			   	<?php
					}
				?>
				
				
            </ul>
          </div>
        </div>
       
	   <?php
						
		echo '<input id = "hidden_token" type = "hidden" value = "'. csrf_token().'" name = "_token">';

		?>	
	   
	   @yield('admin_content');
      </div>
    </div>
    <footer>
      <div class="container">
        <div class="copy text-center"> Copyright 2016 <a href="#">Website</a> </div>
      </div>
    </footer>
    
    <link rel="stylesheet" href="vendors/morris/morris.css">
	
<!-----------------------for file upload -------------->
	<script src="js/vendor/jquery.ui.widget.js"></script>
	<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
	<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <script src="js/jquery.iframe-transport.js"></script>
	<script src="js/jquery.fileupload.js"></script>
	<script src="js/jquery.fileupload-process.js"></script>
	<script src="js/jquery.fileupload-image.js"></script>
	<script src="js/jquery.fileupload-audio.js"></script>
	<script src="js/jquery.fileupload-validate.js"></script>
	

	<script src="scripts/upload.js"></script>

    <script src="js/custom.js"></script>
	
  </body>
</html>
@endif