<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playlist;
use App\Songs;
use Input, Validator, Auth, Redirect, View, DB, App, URL;
use App\User;
use App\Ads;
use App\Video;
class PlaylistController extends Controller
{
    public function index(){
      $msg = "This is a simple message.";
      return response()->json(array('msg'=> $msg), 200);
   }
	
	public function artists(){
		if(isset($_GET['sort'])){
			
		}
		else{
			$counts = Songs::select('artise_id', DB::raw('count(artise_id) as item_count'))->whereRaw('status = 1')->groupBy('artise_id')->get();
			$artists = User::whereRaw("usertype = '1'")->orderBy('created_at', 'DESC')->get();
		}
		$ads = Ads::whereRaw('menu = "3" and status = "1"')->get();
		
		return view('artist', array('artists'=> $artists, 'counts' => $counts, 'likesongs'=>app('App\Http\Controllers\SongsController')->getfavoritesongs(),  'playlists' => app('App\Http\Controllers\SongsController')->getplaylistsongs(), 'ads' => $ads));
	}
	
	public function artist($name, $id){
		
		if (Auth::check()){
			$user_id = Auth::user()->id;
			$favorite_songsbyuser = Playlist::whereRaw("type = '0'  and user_id = '$user_id'")->get();
		}
		
		
		$artist = User::whereRaw("usertype != '0' and id = '$id'")->first();
		
		$user_songs = Songs::whereRaw("artise_id = '$id' and status = '1'")->get();
		
		foreach($user_songs as $song){
			$song_id = $song->id;
			$song['fav_count'] = Playlist::whereRaw("type = '0' and song_id = '$song_id'")->count();
		}
		
		//$ads = Ads::whereRaw('menu = "3" and status = "1"')->get();
		
		if (Auth::check())
			return view( 'artistdetail' ,array('artist' => $artist, 'user_songs' => $user_songs, "favorite_songsbyuser" => $favorite_songsbyuser, 'likesongs'=>app('App\Http\Controllers\SongsController')->getfavoritesongs(), 'playlists' => app('App\Http\Controllers\SongsController')->getplaylistsongs()));	
		
		else
			return view( 'artistdetail' ,array('artist' => $artist, 'user_songs' => $user_songs, 'likesongs'=>app('App\Http\Controllers\SongsController')->getfavoritesongs(), 'playlists' => app('App\Http\Controllers\SongsController')->getplaylistsongs()));	
	}
	
	
	public function downloadsong(){
		$file = $_GET['file'];	
		$file = str_replace("%20"," ", $file);
		$file = str_replace("%28","(", $file);
		$file = str_replace("%29",")", $file);
		
		//set downloaded 
		$id = $_GET['id'];
		$song = Songs::find($id);
		$downloaded = $song->downloaded;
		$downloaded += 1;
		$song->downloaded = $downloaded;
        $song->save();
		return response()->download($file);
	}
	
	//search the song
	public function search(){
		$songs =  Songs::select('song.*', 'users.name')->leftJoin('users', 'song.artise_id', '=', 'users.id')->where('song.title', 'like', '%'. $_GET['searchkeyword'] .'%')->where('song.status', '=', '1')->orderBy(DB::raw("LOCATE('s', `title`)"))->get();
		return view('search', array('songs'=> $songs, 'keyword' => $_GET['searchkeyword'], 'playlists' => app('App\Http\Controllers\SongsController')->getplaylistsongs()));
	}
	
	public function search_in(){
		$songs =  Songs::select('song.*', 'users.name')->leftJoin('users', 'song.artise_id', '=', 'users.id')->where('song.title', 'like', '%'. $_GET['searchkeyword_in'] .'%')->where('song.status', '=', '1')->orderBy(DB::raw("LOCATE('s', `title`)"))->get();
		return view('search', array('songs'=> $songs, 'keyword' => $_GET['searchkeyword_in']));
	}

	public function musicfeed(){
		
		// create new feed
		$feed = App::make("feed");
	//	$feed->setCache(60, 'laravelFeedKey');

		if (!$feed->isCached())
		{
		   // creating rss feed with our most recent 20 posts
		   $posts = DB::table('song')->where('status', '=', '1')->orderBy('created_at', 'desc')->take(20)->get();
	
		   // set your feed's title, description, link, pubdate and language
		   $feed->title = 'Download Latest African Gospel Music';
		   $feed->description = 'Africaworships.com is Africa’s foremost online platform for Christian music from the continent of Africa and from Africans everywhere.';
		   $feed->logo = 'http://africaworships.com/images/logo.png';
		   $feed->link = url('musicfeed');
		   $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
		   $feed->pubdate = $posts[0]->created_at;
		   $feed->lang = 'en';
		   $feed->setShortening(true); // true or false
		   $feed->setTextLimit(100); // maximum length of description text

		   foreach ($posts as $post)
		   {
				$url = "trackdetail/". str_slug($post->title, '-') ."/" . $post->id;
			  
				$enclosure = ['url'=> 'http://africaworships.com/server/php/files/'.$post->image,'type'=>'image/jpeg'];
				
				
				$feed->add($post->title, 'africaworship',  URL::to($url), $post->created_at, $post->title, $post->title, $enclosure );
				



		   }

		}
		return $feed->render('rss');
	}
	public function lyricsfeed(){
		
		// create new feed
		$feed = App::make("feed");
	//	$feed->setCache(60, 'laravelFeedKey');
		if (!$feed->isCached())
		{
		   $posts = DB::table('lyrics')->where('status', '=', '1')->orderBy('created_at', 'desc')->take(20)->get();
		   $feed->title = 'Latest African Gospel Music Lyrics';
		   $feed->description = 'Africaworships.com is Africa’s foremost online platform for Christian music from the continent of Africa and from Africans everywhere.';
		   $feed->logo = 'https://africaworships.com/images/logo.png';
		   $feed->link = url('lyricsfeed');
		   $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
		   $feed->pubdate = $posts[0]->created_at;
		   $feed->lang = 'en';
		   $feed->setShortening(true); // true or false
		   $feed->setTextLimit(100); // maximum length of description text

		   foreach ($posts as $post)
		   {
				$url = "lyric-detail/". str_slug($post->title, '-') ."/" . $post->id;
				$enclosure = ['url'=> 'https://africaworships.com/server/php/files/'.$post->image,'type'=>'image/jpeg'];
				
			    $feed->add($post->title, 'africaworship',  URL::to($url), $post->created_at, $post->content, $post->title, $enclosure);
		   }
		}
		return $feed->render('rss');
		
	}
	public function newsfeed(){
		
		// create new feed
		$feed = App::make("feed");
	//	$feed->setCache(60, 'laravelFeedKey');
		if (!$feed->isCached())
		{
		   $posts = DB::table('news')->where('status', '=', '1')->orderBy('created_at', 'desc')->take(20)->get();
		   $feed->title = 'Christian News on Africaworships.com';
		   $feed->description = 'Africaworships.com is Africa’s foremost online platform for Christian music from the continent of Africa and from Africans everywhere.';
		   $feed->logo = 'https://africaworships.com/images/logo.png';
		   $feed->link = url('newsfeed');
		   $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
		   $feed->pubdate = $posts[0]->created_at;
		   $feed->lang = 'en';
		   $feed->setShortening(true); // true or false
		   $feed->setTextLimit(100); // maximum length of description text

		   foreach ($posts as $post)
		   {
				$url = "full-post/". str_slug($post->title, '-') ."/" . $post->id;
				$enclosure = ['url'=> 'https://africaworships.com/server/php/files/'.$post->image,'type'=>'image/jpeg'];
				
			    $feed->add($post->title, 'africaworship',  URL::to($url), $post->created_at, $post->content, $post->title, $enclosure);
		   }
		}
		return $feed->render('rss');
		
	}

	public function videofeed(){
		
		// create new feed
		$feed = App::make("feed");
	//	$feed->setCache(60, 'laravelFeedKey');
		if (!$feed->isCached())
		{
		   $posts = DB::table('video')->where('status', '=', '1')->orderBy('created_at', 'desc')->take(20)->get();
		   $feed->title = 'Christian News on Africaworships.com';
		   $feed->description = 'Africaworships.com is Africa’s foremost online platform for Christian music from the continent of Africa and from Africans everywhere.';
		   $feed->logo = 'https://africaworships.com/images/logo.png';
		   $feed->link = url('videofeed');
		   $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
		   $feed->pubdate = $posts[0]->created_at;
		   $feed->lang = 'en';
		   $feed->setShortening(true); // true or false
		   $feed->setTextLimit(100); // maximum length of description text

		   foreach ($posts as $post)
		   {
				$url = "video-detail/". str_slug($post->title, '-') ."/" . $post->id;
				$enclosure = ['url'=> 'https://africaworships.com/server/php/files/'.$post->image,'type'=>'image/jpeg'];
				
			    $feed->add($post->title, 'africaworship',  URL::to($url), $post->created_at, $post->description, $post->title, $enclosure);
		   }
		}
		return $feed->render('rss');
		
	}

}
