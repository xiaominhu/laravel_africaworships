@extends('adminmenu')
@section('admin_content')	
	
	<section class="content-header">
      <h1>
        Ads Management 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/adminmusic"><i class="fa fa-user"></i> adminads</a></li>
      </ol>
    </section>
	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
					    <h3 class="box-title"></h3>		
						<a href = '/adminadsdetails' class="btn btn-primary btn-lg pull-right">Add new Ads</a> 
					</div>
					<div class="box-body">
						<table class="table table-hover table-bordered table-striped" style = "text-align: center;">
							<thead>
								<tr>
									<th>No</th>
									<th>Song Title</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($ads as $adsitem)
								<tr class="odd gradeX">
									<td>{{$adsitem->title}}</td>
									<td>						
										@if($adsitem->status == 0)				
											Unpublished					
										@else						
											Published				
										@endif				
									</td>
									<td>{{$adsitem->clicked}}</td>
									
									<td>
										
										@if($adsitem->status == 0)
											<button class="btn btn-primary btn-xs admin-publish-ads <?php if($adsitem->enable == "0") echo 'disabled'; ?>" data-id = "{{$adsitem->id}}">Publish</button>
										@else						
											<button class="btn btn-primary btn-xs admin-unpublish-ads" data-id = "{{$adsitem->id}}">Unpublish</button>
										@endif
												
										<a href = '/adminadsdetails?id={{$adsitem->id}}'  class="btn btn-info btn-xs news-edit-button" data-id = "{{$adsitem->id}}">Edit</a>
										<a href = "/deleteads/{{$adsitem->id}}" class="btn btn-danger btn-xs admin-trash-ads" data-id = "{{$adsitem->id}}">Trash</a>
									</td>  
								</tr>
							   @endforeach		
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
		  
@stop     