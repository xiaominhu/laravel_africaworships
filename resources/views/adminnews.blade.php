@extends('adminmenu')
@section('admin_content') 

	<section class="content-header">
		  <h1>
			News Management 
			<small></small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="/adminmusic"><i class="fa fa-user"></i> News</a></li>
		  </ol>
	</section>

	<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title"></h3>		
								<a href = '/adminnewsdetail' class="btn btn-primary btn-lg pull-right">Add new Post</a>    
							</div>
							<div class="box-body">
								<table class="table table-hover table-bordered table-striped" style = "text-align: center;">
									 <thead>           
										  <tr>                  
										  <th>News Title</th>     
										  <th>Status</th>       
										  <th>Action</th>           
										  </tr>        
									</thead>         
											<?php  $i = 0; ?>
											<tbody>
											 @foreach($news as $newsitem)	                
											<tr class="odd gradeX">                 
												  <td>{{$newsitem->title}}</td>          
												  <td>						
													@if($newsitem->status == 0)				
													  Unpublished					
												  @else						
													  Published				
												  @endif	
												  </td>                
													<td>				
													  @if($newsitem->status == 0)				
													  <button class="btn btn-primary btn-xs admin-publish-news" data-id = "{{$newsitem->id}}">Publish</button>						@else						
														  <button class="btn btn-primary btn-xs admin-unpublish-news" data-id = "{{$newsitem->id}}">Unpublish</button>						
													  @endif											
													  <a href = '/adminnewsdetail?id={{$newsitem->id}}' class="btn btn-info btn-xs news-edit-button" data-id = "{{$newsitem->id}}">Edit</a>	
													  
													  <a class="btn btn-danger btn-xs admin-trash-news"  href = "/deletenews/{{$newsitem->id}}">Trash</a>
													  
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
		
	  	<div class = "col-xs-12" style = "text-align:center;">
			@if(count($news))
				{{$news->links()}}
			@endif
		</div>

		
@stop     