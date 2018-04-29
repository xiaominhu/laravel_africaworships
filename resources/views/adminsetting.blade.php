 
@extends('adminmenu')
@section('admin_content')

 <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

	 <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"></h3>		
			</div>
			<div class="box-body">
				<form  action="{{URL::to('/adminsettings')}}" method="post" class="card">
					{{csrf_field()}}
					<div class="form-group row">
						<div class="col-sm-2 form-control-label text-muted">Enable Auto Approve</div>
						<div class="col-sm-7">
							<input <?php 
								if($setting['autoapprove']) echo "checked";
							?> name = "approve_enable" data-toggle="toggle" type="checkbox"  onchange="this.form.submit()" >
						</div>
					</div>
				</form>
			</div>
		</div>
       
      </div>
      <!-- /.row -->
      <!-- Main row -->
     
    </section>
    <!-- /.content -->

@stop     
