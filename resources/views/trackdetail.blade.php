@extends('menu')
@section('main_content')

@if(Auth::check())
	@include('function')
@endif


   <div class="app-body" id="view">

	<!-- ############ PAGE START-->
	<div class="pos-rlt">
	  <div class="page-bg" data-stellar-ratio="2" style="background-image: 'url(<?php echo asset($song['image']) ?>)'"></div>

	</div>
	<div class="page-content">
	  <div class="padding b-b">
		<div class="row-col">
			<div class="col-sm w w-auto-xs m-b">
			  <div class="item w r">
				<div class="item-media">
				  <div class="item-media-content" style="background-image: url('<?php echo asset($song['image']) ?>')"></div>

				</div>
			  </div>
			</div>
			<div class="col-sm">
			  <div class="p-l-md no-padding-xs">
				<div class="page-title">
				  <h1 class="inline">{{$song->title}}</h1>
				</div>
			
				<div class="item-action m-b">
				  <button class="btn-playpause text-primary m-r-sm"></button> 
				
				  
					<div class="inline dropdown m-l-xs">
						<a class="btn btn-icon rounded btn-more" data-toggle="dropdown" data-downloadsrc = "{{$song->source}}" data-id="{{$song->id}}"><i class="fa fa-ellipsis-h"></i></a>
						<div class="dropdown-menu pull-right black lt"></div>
					</div>
				</div>
				
				
				  @include('share')
				
			  </div>
			</div>
		</div>
	  </div>

	  <div class="row-col">
		<div class="col-lg-9 b-r no-border-md">
		  <div class="padding">

			  <h6 class="m-b">
				<span class="text-muted">by</span> 
				<a href="/artistdetail/<?php
									$display_txt = $track_user->name;
									echo str_slug($display_txt, '-');
						 
						 ?>/{{$track_user->id}}" data-pjax class="item-author _600">{{$track_user->name}}</a> 
				<span class="text-muted text-sm">- <?php  echo count($user_songs); ?> song</span>
			  </h6>
				<div id="tracks" class="row item-list item-list-xs item-list-li m-b">
					@foreach($user_songs as $song_item)
						@if($song_item->id == $song->id)
					
					<div class="col-xs-12">
						<div class="item r" data-id="{{$song_item->id}}" data-src="<?php echo asset($song_item['source']) ?>" data-downloadsrc = "{{$song_item->source}}">
							<div class="item-media ">
								
								<a href="/trackdetail/{{str_slug($song_item->title, '-')}}/{{$song_item->id}}" class="item-media-content" style="background-image: url('{{$song_item->image}}');"></a>
																
								<div class="item-overlay center">
									<button  class="btn-playpause">Play</button>
								</div>
							</div>
							<div class="item-info">
								<div class="item-overlay bottom text-right">
									<a href="#" class="btn-favorite <?php  		
										if(Auth::check()){
											$ret_val = find_favorite($favorite_songsbyuser, $song_item->id);
											if($ret_val) echo 'is-like';
										}
		
		
	?>"><i class="fa fa-heart-o"></i></a>
									<a href="#" class="btn-more" data-toggle="dropdown" data-downloadsrc = "{{$song_item->source}}" data-id="{{$song_item->id}}"><i class="fa fa-ellipsis-h"></i></a>
									<div class="dropdown-menu pull-right black lt"></div>
								</div>
								<div class="item-title text-ellipsis">
									<a  href="/trackdetail/{{str_slug($song_item->title, '-')}}/{{$song_item->id}}" >{{$song_item->title}}</a>
									
								</div>
							</div>
						</div>
					</div>
					@endif					
					@endforeach
					
					@foreach($user_songs as $song_item)
						@if($song_item->id != $song->id)
					
					<div class="col-xs-12">
						<div class="item r" data-id="{{$song_item->id}}" data-src="<?php echo asset($song_item['source']) ?>" data-downloadsrc = "{{$song_item->source}}">
							<div class="item-media ">
								
								<a href="/trackdetail/{{str_slug($song_item->title, '-')}}/{{$song_item->id}}" class="item-media-content" style="background-image: url('{{$song_item->image}}');"></a>
								
								
								<div class="item-overlay center">
									<button  class="btn-playpause">Play</button>
								</div>
							</div>
							<div class="item-info">
								<div class="item-overlay bottom text-right">
									<a href="#" class="btn-favorite <?php  		
										if(Auth::check()){
											$ret_val = find_favorite($favorite_songsbyuser, $song_item->id);
											if($ret_val) echo 'is-like';
										}
		
		
	?>"><i class="fa fa-heart-o"></i></a>
									<a href="#" class="btn-more" data-toggle="dropdown" data-downloadsrc = "{{$song_item->source}}" data-id="{{$song_item->id}}"><i class="fa fa-ellipsis-h"></i></a>
									<div class="dropdown-menu pull-right black lt"></div>
								</div>
								<div class="item-title text-ellipsis">
									<a  href="/trackdetail/{{str_slug($song_item->title, '-')}}/{{$song_item->id}}" >{{$song_item->title}}</a>
									
								</div>
							</div>
						</div>
					</div>
					@endif					
					@endforeach
					
					
					
					
				</div>
			  <h5 class="m-b">From {{$track_user->name}}</h5>
			    <div class="row m-b">
					
				@foreach($user_songs as $song_item)
				
					<div class="col-xs-6 col-sm-6 col-md-3">
						
						<div class="item r" data-id="{{$song_item->id}}" data-src="<?php echo asset($song_item['source']) ?>" >
						
							<div class="item-media ">
								 <a href="/trackdetail/{{str_slug($song_item->title, '-')}}/{{$song_item->id}}" class="item-media-content" style="background-image: url('<?php echo asset($song_item['image']) ?>')"></a>
								 
								<div class="item-overlay center">
									<button  class="btn-playpause">Play</button>
								</div>
							</div>
							<div class="item-info">
								<div class="item-overlay bottom text-right">
									<a href="#" class="btn-favorite <?php  		
										if(Auth::check()){
											$ret_val = find_favorite($favorite_songsbyuser, $song_item->id);
											if($ret_val) echo 'is-like';
										}
		
	?>"><i class="fa fa-heart-o"></i></a>
									<a href="#" class="btn-more" data-toggle="dropdown" data-downloadsrc = "{{$song_item->source}}" data-id="{{$song_item->id}}"><i class="fa fa-ellipsis-h"></i></a>
									<div class="dropdown-menu pull-right black lt"></div>
								</div>
								<div class="item-title text-ellipsis">
									<a href="/trackdetail/{{str_slug($song_item->title, '-')}}/{{$song_item->id}}" >{{$song_item->title}}</a>
								</div>
							
				
				
							</div>
						</div>
					</div>
			   
					@endforeach

			   </div>
			  <h5 class="m-b">Comments</h5>
			    <div class="streamline m-b m-l">
					@foreach($comments as $comment)	
					  <div class="sl-item">
						<div class="sl-left">
						
						  <img src="{{$comment->image}}" class="img-circle">
						
						  
						</div>
						<div class="sl-content">
						  
						  <div class="sl-author m-b-0">
							<a href="#">{{$comment->name}}</a>
							<span class="sl-date text-muted">
								<?php
				
					$date = new DateTime($comment->updated_at);
					$time_diff = time() - $date->getTimestamp();
					$min_diff = 60;
					$hour_diff = 3600;
					$day_diff = 86400;
					$week_diff  = 604800;
					$month_diff = 2592000;
					$year_diff = 31536000;
				
					$ret_val = floor($time_diff/$year_diff);
					if($ret_val) echo $ret_val.' years ago';
					else{
						$ret_val = floor($time_diff/$month_diff);
						if($ret_val) echo $ret_val.' months ago';
						else{
							$ret_val = floor($time_diff/$week_diff);
							if($ret_val) echo $ret_val.' weeks ago';
							else{
								$ret_val = floor($time_diff/$day_diff);
								if($ret_val) echo $ret_val.' days ago';
								else{
									$ret_val = floor($time_diff/$hour_diff);
									if($ret_val) echo $ret_val.' hours ago';
									else{
										$ret_val = floor($time_diff/$min_diff);
										if($ret_val) echo $ret_val.' mins ago';
										else
											echo $ret_val.' seconds ago';
									}
								}
							}
						}
					}
					
				?>
							</span>
						  </div>
						  <div>
							<p> {{$comment->content}} </p>
						  </div>
						  
						</div>
					  </div>
					
					 @endforeach
				</div>
			  
			  
			
			  <div id="disqus_thread"></div>
					<script>

					/**
					*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
					*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
					/**/
					var disqus_config = function () {
					this.page.url = "<?php	
											
											$display_txt =  urldecode(Request::url());
											echo str_replace(" ","-",$display_txt);
					
					?>";  // Replace PAGE_URL with your page's canonical URL variable
					this.page.identifier = "<?php	
											
											$display_txt =  Request::segment(1).'/'.Request::segment(2).'/'.Request::segment(3);
											echo str_replace(" ","-",$display_txt);
					
					?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
					};
					
					(function() { // DON'T EDIT BELOW THIS LINE
					var d = document, s = d.createElement('script');
					s.src = '//africaworship.disqus.com/embed.js';
					s.setAttribute('data-timestamp', +new Date());
					(d.head || d.body).appendChild(s);
					})();
					</script>
					<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	

		  </div>
		</div>
		
		
		   @include('like')

	 </div>
	</div>

	<!-- ############ PAGE END-->
		
 
    </div>
 @stop 