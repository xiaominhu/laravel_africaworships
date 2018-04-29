
@extends('menu')
@section('main_content')

<?php
	$code_content = $video->URL;
	
	if($video->type == "0")
	{
		$token = substr($code_content, strlen("https://www.youtube.com/watch?v="), strlen($code_content) - 1) ;
		$code_content = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $token  .'" frameborder="0" allowfullscreen></iframe>';	
	}
	else if($video->type == "1"){
		
		$token = substr($code_content, strlen("https://vimeo.com/"), strlen($code_content) - 1) ;
		$code_content = '<iframe src="https://player.vimeo.com/video/'. $token .'" width="640" height="362" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	}
	else{
		
		$code_content = '<iframe src="https://www.facebook.com/plugins/video.php?href='.$code_content .'&width=500&show_text=false&height=280" width="500" height="280" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>';
		
	}
?>





<div class="app-body" id="view">

<!-- ############ PAGE START-->

<div class="page-content">
  <div class="row-col">
    <div class="col-lg-9 b-r no-border-md">
      <div class="padding">
        

        <div class="page-title m-b">
          <h1 class="inline m-a-0">{{$video->title}}</h1>
        </div>
		
							
        <div data-ui-jp="jscroll" class="jscroll-loading-center" data-ui-options="{
            autoTrigger: true,
            loadingHtml: '<i class=\'fa fa-refresh fa-spin text-md text-muted\'></i>',
            padding: 50,
            nextSelector: 'a.jscroll-next:last'
          }">
      		<div class="row-col">
				<div class="col-xs-4 col-sm-4 col-md-3">
					<div class="item r" data-id="{{$video->id}}">
						
						
						  @include('share')
						  
						<div class="col-md-12" style = "text-align:center">
							
							
							<?php  echo $code_content; ?>
							
						
							
						
						

						</div>
						
						<div class="col-md-12">
						
						
							<?php
								$display_txt = $video->description;
								echo str_replace("\n","<br />",$display_txt);
						    ?>
							
							
							
							

							
						</div>						
					</div>
      			</div>
      		</div>
		<?php
		if(0){
		?>
          <div class="text-center">
			
  		      <a href="scroll.item.html" class="btn btn-sm white rounded jscroll-next">Show More</a>
          </div>
		<?php 
		}
		?>
        </div>

      </div>
   
		<div class = "padding">
			
			  <h5 class="m-b">Comments</h5>
			   
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