<div id="share-list" class="m-b" style = "text-align:right">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php	
											
											$display_txt =  urldecode(Request::url());
											echo str_replace(" ","-",$display_txt);
					
					?>" id = "facebook-share" class="btn btn-icon btn-social  btn-social-colored indigo" title="Facebook"  onclick="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=<?php	
											$display_txt =  urldecode(Request::url());
											echo str_replace(" ","-",$display_txt);
					
					?>','',
					  'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
					  return false;">
						<i class="fa fa-facebook"></i>
						<i class="fa fa-facebook"></i>
					</a>
						
						
					
					
					<a href="http://twitter.com/share?url=<?php	
											$display_txt =  urldecode(Request::url());
											echo str_slug($display_txt, '-');
					
					?>" class="btn btn-icon btn-social btn-social-colored light-blue" title="Twitter"  onclick="javascript:window.open('http://twitter.com/share?url=<?php	
											$display_txt =  urldecode(Request::url());
											echo str_slug($display_txt, '-');
					
					?>','',
					  'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
					  return false;">
						<i class="fa fa-twitter"></i>
						<i class="fa fa-twitter"></i>
					</a>
					
					
					<a href="https://plus.google.com/share?url=<?php	
											$display_txt =  urldecode(Request::url());
											echo str_replace(" ","-",$display_txt);
					
					?>" class="btn btn-icon btn-social btn-social-colored red-600" title="Google+"   onclick="javascript:window.open('https://plus.google.com/share?url=<?php echo Request::url()  ?>','',
					  'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
					  return false;">
						<i class="fa fa-google-plus"></i>
						<i class="fa fa-google-plus"></i>
					</a>
				

		  
					<a href="http://pinterest.com/pin/create/button/?url=<?php	
											$display_txt =  urldecode(Request::url());
											echo str_replace(" ","-",$display_txt);
					
					?>" class="btn btn-icon btn-social btn-social-colored red-700" title="Pinterst"  onclick="javascript:window.open('http://pinterest.com/pin/create/button/?url=<?php	
											$display_txt =  urldecode(Request::url());
											echo str_replace(" ","-",$display_txt);
					
					?>','',
					  'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
					  return false;">
						<i class="fa fa-pinterest"></i>
						<i class="fa fa-pinterest"></i>
					</a>
          </div>
       
				