
@extends('menu')
@section('main_content')

	@include('function')
	
	
  <!-- content -->
  <div class="app-body" id="view">
	<!-- ############ PAGE START-->
	<div class="page-content">
		
		<div class="row-col">
    <div class="col-lg-9 b-r no-border-md">
      <div class="padding">        
        <div class="page-title m-b">
          <h1 class="inline m-a-0">News</h1>
          <div class="dropdown inline">
            <button class="btn btn-sm no-bg h4 m-y-0 v-b dropdown-toggle text-primary" data-toggle="dropdown">
			
				<?php
					if(isset($_REQUEST['sort'])){
						echo strtoupper($_REQUEST['sort']);
					}
					else echo 'All the time';
				?>
			
			</button>
            <div class="dropdown-menu">
              <a href="/news?sort=week" class="dropdown-item active">
                Last week
              </a>
              <a href="/news?sort=month" class="dropdown-item">
                Last month
              </a>
              <a href="/news?sort=year" class="dropdown-item">
                Last year
              </a>
              <a href="/news" class="dropdown-item">
                All the time
              </a>
            </div>
          </div>
        </div>
        <div class="row item-list item-list-md item-list-li m-b">
		
		@foreach($news as $newsitem)
            <div class="col-xs-12">
              	<div class="item r" data-id="{{$newsitem->id}}">
          			<div class="item-media ">
          				<a href="/full-post/<?php
									$display_txt = $newsitem->title;
									echo str_slug($display_txt, '-');
							
							?>/{{$newsitem->id}}" class="item-media-content" style="background-image: url('<?php 
							
							echo $newsitem['image'];
						
						?>');"></a>
						
          			</div>
          			<div class="item-info">
          				
          				<div class="item-title text-ellipsis">
          					<a href="/full-post/<?php
									$display_txt = $newsitem->title;
									echo str_slug($display_txt, '-');
							
							?>/{{$newsitem->id}}">{{$newsitem->title}}</a>
          				</div>
						
						
						<div class="text-sm text-ellipsis ">
          					
          				</div>
						
          				
          				<div class="item-meta text-sm text-muted">
							<span class="item-meta-stats text-xs  item-meta-right glyphicon glyphicon-eye-open">
								{{$newsitem->viewed}}
							</span>
          		        </div>
						
          			</div>
          		</div>
          	</div>
		
		@endforeach	
		
		</div>

		 <div class = "row">
			
				<?php
					if(isset($ads)){
						$adsitem = getAds($ads, '1');
						
						if($adsitem) {
							if($adsitem->type == "0"){
							?>	
							<div class = "col-md-12" style = "text-align: center;">
								<?php
									echo $adsitem->code;
								?>	
							</div>
							
							<?php
							
							}
							else{
				?>
							<div class = "col-md-12" style = "text-align: center; height : 90px; margin: 10px auto;">
								<a href="<?php 
									echo  $adsitem->url;
								?>" class="item-media-content" style="background-image: url('{{$adsitem->image}}'); height : 90px; width:970px; margin: 0 auto;"></a>
							</div>
							
				<?php	
							
							
							}
						}
					}
					
				?>
				
			
		</div>
		
      </div>
    </div>
    
	@include('like')
	
  </div>

		
	</div>

	<!-- ############ PAGE END-->
    </div>
  
@stop
  
