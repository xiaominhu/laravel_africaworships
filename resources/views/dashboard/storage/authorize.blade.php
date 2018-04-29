
@extends('adminmenu')
@section('admin_content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Drop Box
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">authorize</li>
      </ol>
    </section>
				@if(session('status'))
				<div class="alert alert-success col-md-8 col-md-offset-2" style = "text-align: center;">
					<strong>Success!</strong>  {{ session('status') }}
				</div>
			@endif

			
    <!-- Main content -->
    <section class="content">
      <div class="row">
       
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Get the authorize key.</h3>
            </div>
			
				
				
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method = "post" action="/storage/token/change" >
              <div class="box-body">
             
				<div class="form-group row">
					<div class="col-sm-2 form-control-label text-muted">Enter Code</div>
					<div class="col-sm-7"><input id = "authorize_key" name = "authorize_key" value="<?php
						if(isset($token_value))
							echo $token_value;
					?>" class="form-control"></div>
					<div class = "col-sm-3">
						<a class="btn btn-primary btn-sm" href = "/storage/getAccesstoken" target="_blank">Get the Code</a>
					</div>						
				</div>		
									
				{{ csrf_field() }}
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
         
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@stop
