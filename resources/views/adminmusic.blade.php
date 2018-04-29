@extends('adminmenu')
@section('admin_content')

	<section class="content-header">
      <h1>
      	@if($setting['page'] =='browse')
        	Music Management 
        @else
        	FeaturedSong Management 
        @endif
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/adminmusic"><i class="fa fa-user"></i> Musics</a></li>
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
									<th>No</th>
									<th>Song Title</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
								  <tbody>
				<?php  $i = 0; ?>
				 @foreach($songs as $song)
                  <tr class="odd gradeX">
					<td><?php  echo ++$i; ?></td>
                    <td>{{$song->title}}</td>
                    <td class = "status">
						@if($song->status == 0)
							Unpublished
						@else
							Published
						@endif
					</td>
                    <td>


                    @if($song->featured == 0)
						@if($song->status == 0)
							<button class="btn btn-primary btn-xs admin-publish-song" data-id = "{{$song->id}}" data-user-id = "{{$song->artise_id}}">Publish</button>
						@else
							<button class="btn btn-primary btn-xs admin-unpublish-song" data-id = "{{$song->id}}" data-user-id = "{{$song->artise_id}}">Unpublish</button>
						@endif
					@endif	

						<a href = "/deletesong/{{$song->id}}" class="btn btn-danger btn-xs admin-trash-song" data-id = "{{$song->id}}" data-user-id = "{{$song->artise_id}}">Trash</a>
						
		

						@if($song->featured == 0)
							@if($count == 1)
						<button class="btn btn-success btn-xs admin-feature-song disabled" data-id = "{{$song->id}}" data-user-id = "{{$song->artise_id}}">Set Feature</button>
							@else
						<button class="btn btn-success btn-xs admin-feature-song" data-id = "{{$song->id}}" data-user-id = "{{$song->artise_id}}">Set Feature</button>
							@endif

						@else

							@if($count == 1)
						<button class="btn btn-success btn-xs admin-unfeature-song" data-id = "{{$song->id}}" data-user-id = "{{$song->artise_id}}">Unset Feature</button>
							@else
						<button class="btn btn-success btn-xs admin-unfeature-song" data-id = "{{$song->id}}" data-user-id = "{{$song->artise_id}}">Unset Feature</button>
							@endif
						@endif
						
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
		@if(count($songs))
			{{$songs->links()}}
		@endif
	</div>
			
@stop     