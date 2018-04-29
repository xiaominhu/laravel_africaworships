
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Wifoot</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css')}}">
  
  
   <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <!-- bootstrap wysihtml5 - text editor -->
  
  <!----- summernote  -->
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
	<!-- jQuery 2.2.3 -->
	<script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
	<!-- CK Editor -->
	<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
	<script src="{{asset('js/summernote.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

 <!-- Pace style -->
  <link rel="stylesheet" href="{{asset('plugins/pace/pace.min.css')}}">
  
  <!--            File Upload JS                ------------------>
  <link href="{{asset('css/jquery.fileupload.css')}}" rel="stylesheet" type="text/css" />
  
 
</head>
<body class="hold-transition skin-blue sidebar-mini">


<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Song</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Africa</b>Song</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
         
		
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			
		
			
					@if(Auth::user()->image)
						<img src="{{Auth::user()->image}}" class="user-image" alt="User Image">
					@else
						<img src="{{asset('images/no_image.jpg') }}" class="user-image" alt="User Image">
					@endif	
						
					
			
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{Auth::user()->image}}" class="img-circle" alt="User Image">

                <p>
                {{Auth::user()->name}} 
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
               
				   <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  class="btn btn-default btn-flat">
						Sign out
					</a>

					<form id="logout-form" action="{{ url('/logout') }}" method="POST"
						  style="display: none;">
						{{ csrf_field() }}
					</form>
									
				  
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{Auth::user()->image}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}} </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="/adminhome">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
		
        
		<li class="treeview">
			<a href="#">
				<i class="fa fa-user"></i>
				<span>Music Management</span>
				<span class="pull-right-container">
				    <i class="fa fa-angle-left pull-right"></i>
				</span>
			
			</a>
			
			<ul class="treeview-menu">
				<li><a href="/adminmusic"><i class="fa fa-circle-o"></i> Musics</a></li>
        <li><a href="/featured"><i class="fa fa-circle-o"></i> Featured Song</a></li>
			</ul>
        </li>
		
		<li class="treeview">
			<a href="#">
				<i class="fa fa-credit-card"></i>
				<span>Video</span>
				<span class="pull-right-container">
				    <i class="fa fa-angle-left pull-right"></i>
				</span>
			
			</a>
			
			<ul class="treeview-menu">
				<li><a href="/adminvideo"><i class="fa fa-circle-o"></i> Vidoe Management</a></li>
			</ul>
        </li>
		
		<li class="treeview">
			<a href="#">
				<i class="fa fa-soccer-ball-o"></i>
				<span>Lyrics Management</span>
				<span class="pull-right-container">
				    <i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="/adminlyrics"><i class="fa fa-circle-o"></i> Lyrics </a></li>
			</ul>
        </li>
	   
		<li class="treeview">
			<a href="#">
				<i class="fa fa-database"></i>
				<span>News Management</span>
				<span class="pull-right-container">
				    <i class="fa fa-angle-left pull-right"></i>
				</span>
			
			</a>
			
			<ul class="treeview-menu">
				<li><a href="/adminnews"><i class="fa fa-circle-o"></i> News</a></li>
			</ul>
        </li>
		
		
		<li class="treeview">
			<a href="#">
				<i class="fa fa-balance-scale"></i>
				<span>Ads Management</span>
				<span class="pull-right-container">
				    <i class="fa fa-angle-left pull-right"></i>
				</span>
			
			</a>
			
			<ul class="treeview-menu">
				<li><a href="/adminads"><i class="fa fa-circle-o"></i> Ads</a></li>
				
			</ul>
        </li>
		
		<li class="treeview">
			<a href="#">
				<i class="fa fa-balance-scale"></i>
				<span>Storage Management</span>
				<span class="pull-right-container">
				    <i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="/storage/authorize"><i class="fa fa-circle-o"></i> Authorize</a></li>
			</ul>
        </li>
	   
		<li class="treeview">
			<a href="#">
				<i class="fa fa-users"></i>
				<span>User Permissions</span>
				<span class="pull-right-container">
				    <i class="fa fa-angle-left pull-right"></i>
				</span>
			
			</a>
			
			<ul class="treeview-menu">
				<li><a href="/adminusers"><i class="fa fa-circle-o"></i> Users </a></li>
			</ul>
        </li>
		
		<li class="">
          <a href="/adminsettings">
            <i class="fa fa-dashboard"></i> <span> Settings </span>
          </a>
        </li>
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">	 
    @yield('admin_content')
  </div>
  
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.2
    </div>
    <strong>Copyright &copy; 2017 <a href="https://africaworships.com"> Africa Worships</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
    <button type="button" class="btn btn-default btn-flat bg-yellow league_alertmodal_button" data-toggle="modal" data-target="#league_alertmodal" data-whatever="@mdo" style = "display:none;"></button> 
	<div class="modal fade" id="league_alertmodal" tabindex="-1" role="dialog" aria-labelledby="league_alertmodal_Label">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="league_alertmodal_Label">Warning</h4>
			  </div>
			  <div class="modal-body">
				<form action="/setting/language/addnewkey"  class="form-horizontal languagekey-form" method = "post"  >
					<div class="form-group league_alertmodal_content" style = "text-align: center;">
					</div>
					
				</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
			  </div>
			</div>
		  </div>
		</div>


<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('plugins/morris/morris.min.js')}}"></script>



<!-- Sparkline -->
<script src="{{asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>


<!-- datepicker -->
<script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!--  App -->
<script src="{{asset('dist/js/app.min.js')}}"></script>
<!--  dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!--  for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

	<!-- Page Script -->

	 <?php
						
		echo '<input id = "hidden_token" type = "hidden" value = "'. csrf_token().'" name = "_token">';

		?>	
	
	<!---------   Image  Upload ------------------->
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
   

<!---  Admin for dash board  --->

	<script type="text/javascript" src="{{asset('scripts/upload.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
</body>
</html>

