
@extends('menu')
@section('main_content')

<div class="app-body" id="view">

<!-- ############ PAGE START-->

<div class="page-content">
  <div class="row-col">
    <div class="col-lg-9 b-r no-border-md">
      <div class="padding">
        <div class="page-title m-b">
          <h1 class="inline m-a-0">{{$news->title}}</h1>
        </div>
		  @include('share')
        <div data-ui-jp="jscroll" class="jscroll-loading-center" data-ui-options="{
            autoTrigger: true,
            loadingHtml: '<i class=\'fa fa-refresh fa-spin text-md text-muted\'></i>',
            padding: 50,
            nextSelector: 'a.jscroll-next:last'
          }">
      		<div class="row-col">
			
				<div class="col-xs-4 col-sm-4 col-md-3">
					<div class="item r" data-id="{{$news->id}}">
						
						
						<div class="col-md-12" style = "height:300px;">
							<img width = "400" class="item-media-content" style = "height:300px;" src="<?php echo asset($news['image']) ?>" />
							
							<br>
						</div>
						<div class="col-md-12">
							
							<?php 
							
								echo str_replace("\'","'",$news['code']);
								
							?>
							
								
						</div>
					</div>
      			</div>
			
      			    
      		</div>
	
        </div>

      </div>
    
	
	 <div class="padding">
		 <h5 class="m-b">Comments</h5>
			    <div class="streamline m-b m-l">
					@foreach($comments as $comment)	
					  <div class="sl-item">
						<div class="sl-left">
						
						  <img src="<?php 
						  
							
							if (strpos($comment->image,"http") !== false) {
								echo $comment->image;
							}
							else         echo asset($comment->image);
						  
						  ?>" class="img-circle">
						
						  
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
	
	
	@include('like')
	
  </div>
  
</div>

<!-- ############ PAGE END-->

</div>
 
@stop