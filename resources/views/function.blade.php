<?php

	function find_favorite($favorite_songsbyuser, $song_id){
		foreach($favorite_songsbyuser as $fav_item){
			
			if($song_id == $fav_item['song_id'])
				return 1;
			
		}
		return 0;
	}
	
	function getAds($ads, $pos){
		foreach($ads as $adsitem){
			
			if($adsitem->pos == $pos)
				return $adsitem;
			
		}
		return 0;
	}
	
	
	
	
?>