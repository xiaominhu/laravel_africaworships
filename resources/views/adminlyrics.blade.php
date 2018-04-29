@extends('adminmenu')
@section('admin_content')
		
		<section class="content-header">
		  <h1>
			Lyrics Management 
			<small></small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="/adminmusic"><i class="fa fa-user"></i> Lyrics </a></li>
		  </ol>
		</section>

		
		<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title"></h3>			  
							</div>
							<div class="box-body">
								<table class="table table-hover table-bordered table-striped" style = "text-align: center;">
									<thead>
										<tr>
											<th> No </th>
											<th>Song Title</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
										<?php  $i = 0; ?>
										  <tbody>
											 @foreach($lyrics as $lyric)
											  <tr class="odd gradeX">
												<td><?php  echo ++$i; ?></td>
												<td>{{$lyric->title}}</td>
												<td class = "status">
													@if($lyric->status == 0)
														Unpublished
													@else
														Published
													@endif
												</td>
												<td>							
													@if($lyric->status == 0)
														<button class="btn btn-primary btn-xs admin-publish-lyric" data-id = "{{$lyric->id}}" data-user-id = "{{$lyric->artise_id}}" >Publish</button>
													@else
														<button class="btn btn-primary btn-xs admin-unpublish-lyric" data-id = "{{$lyric->id}}" data-user-id = "{{$lyric->artise_id}}">Unpublish</button>
													@endif
													
													
													<a class="btn btn-danger btn-xs admin-untrash-lyric"  href = "/deletelyric/{{$lyric->id}}">Trash</a>
													
												
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
			@if(count($lyrics))
				{{$lyrics->links()}}
			@endif
		</div>
	@stop