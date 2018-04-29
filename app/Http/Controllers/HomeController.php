<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Input, Validator, Auth, Redirect, View;
use App\Songs;
use App\Playlist;
use App\Comment;
use App\Lyrics;
use App\Ads;
use App\News;
use App\Settings;
use DB;
use Mail;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function update(){
		  $user = User::find(Auth::user()->id);
		  $user->name  = $_POST['account_name'];
		  $user->BIO = $_POST['account_bio'];
		  $user->country  = $_POST['account_country'];
		  $user->website  = $_POST['account_website'];
		  $user->phone  = $_POST['account_phone'];
		  $user->fb  = $_POST['account_fanpage'];
		  $user->tw  = $_POST['account_twitter'];
		  $user->ist  = $_POST['account_inst'];
          $user->save();
		return redirect('profile')->with('message', 'Thanks for contacting us!');
	}
	
	public function saveimage(){
	  $msg = "This is a simple message.";
	  
	  $user = User::find(Auth::user()->id);
	  $user->image  ="server/php/files/" . $_POST['filename'];
	  $ret = $user->save();
	  if($ret) $msg = "Setting Success";
	  else     $msg = "Setting failed";
      return response()->json(array('msg'=> $msg, 'status'=> $ret), 200);
	}
	
	
	public function artists(){
		
		if(isset($_GET['sort'])){
			
		}
		else{
			$artists = User::whereRaw("usertype = '1'")->get();
		}
		return view('artist', compact('artists'));
	}
	
	public function showArtiseprofile(){
		$favorite_songs = app('App\Http\Controllers\SongsController')->getFavoirteByUserID(Auth::user()->id);
		$playlist_songs = app('App\Http\Controllers\SongsController')->getPlaylistByUserID(Auth::user()->id);
		$track_songs = app('App\Http\Controllers\SongsController')->getTrackByUserID(Auth::user()->id);
		$playlists = app('App\Http\Controllers\SongsController')->getplaylistsongs();
		$likesongs = app('App\Http\Controllers\SongsController')->getfavoritesongs();
		
		$user_id = Auth::user()->id;
		$favorite_songsbyuser = Playlist::whereRaw("type = '0'  and user_id = '$user_id'")->get();
			
		return view('profile', compact('favorite_songs', 'playlist_songs', 'track_songs', 'playlists', 'likesongs', 'favorite_songsbyuser'));
	}
	
	public function set(){	
	  $msg = "This is a simple message.";
	  $type    = $_POST['type'];
	  $song_id = $_POST['id'];
	  $act     = $_POST['act'];
	  
	  $ret = 0;
	
	  if($act == 0) $ret = $this::additem($type, $song_id);
	  else          $ret = $this::removeitem($type, $song_id);

	  if($ret) $msg = "Setting Success";
	  else     $msg = "Setting failed";
      return response()->json(array('msg'=> $msg, 'status'=> $ret), 200);
	}
	
	public function additem($type, $song_id){
		$user_id = Auth::user()->id;
		$song = Playlist::whereRaw("song_id = '$song_id' and user_id = '$user_id' and type = '$type'")->get();
		
		if(count($song))
		{
			return 1;
		}
		
		$playlist = new Playlist;
		$playlist->song_id = $song_id;
		$playlist->type    = $type;
		$playlist->user_id = Auth::user()->id;
        return $playlist->save();
	}
	
	public function removeitem($type, $song_id){
		return Playlist::whereRaw("type = '$type' and song_id = '$song_id' and user_id = '". Auth::user()->id ."'")->delete();
	}
	
	
	/**********************  admin music   ***********************************************************/
	
	public function browse_admin_song(){
		$songs = Songs::orderBy('created_at', 'DESC')->paginate(10);
		$count = Songs::where('featured','=','1')->count();
		if($count >= 7) $count = 1;
		else            $count = 0;
		$permission_array  = $this->getPermssion();
		$setting = array();
		$setting['page'] = "browse";
		return view('adminmusic', compact('songs','count', 'permission_array', 'setting'));
	}

	public function browse_featured(){
		$songs = Songs::orderBy('created_at', 'DESC')->where('featured','=','1')->paginate(10);
		$count = Songs::where('featured','=','1')->count();
		if($count >= 7) $count = 1;
		else            $count = 0;
		
		$permission_array  = $this->getPermssion();

		$setting = array();
		$setting['page'] = "featured";

		return view('adminmusic', compact('songs','count', 'permission_array','setting'));
	}


	
	public function deletesongitem($id){
		
		Playlist::where('song_id', '=' , $id)->delete();
		$song = Songs::find($id);
		if(count($song))
			$song->delete();
		return redirect()->action('HomeController@showArtiseprofile');
	}
	
	public function deletesong($id){
		
		Playlist::where('song_id', '=' , $id)->delete();
		$song = Songs::find($id);
		if(count($song))
			$song->delete();
		Comment::whereRaw("news_id = '$id' and type = '2'")->delete();
		$songs = Songs::all();
		$count = Songs::where('featured','=','1')->count();
		if($count >= 7) $count = 1;
		else            $count = 0;
		return redirect('adminmusic')->with(array('songs'=> $songs, 'count'=> $count));
	}
	
	/*********************************  admin lyrics *************************************************/
	public function browse_admin_lyric(){
		$lyrics = Lyrics::orderBy('created_at', 'DESC')->paginate(10);
		$permission_array  = $this->getPermssion();
		return view('adminlyrics', compact('lyrics', 'permission_array'));
	}
	
	public function deletelyric($id){
		$lyric = Lyrics::find($id);
		if(count($lyric))
			$lyric->delete();
		$Lyrics = Lyrics::all();
		return redirect('adminlyrics')->with(compact('lyrics'));
	}
	
	
	/**************************** admin manage users ****************************************/
	public function deleteuser($id){
		$user = User::find($id);
		$user_songs = Songs::where('artise_id', '=' , $id)->get();
		
		foreach($user_songs as $song_item){
			Playlist::where('song_id', '=' , $song_item['id'])->delete();
		}
		
		Playlist::where('user_id', '=' , $id)->delete();
		Songs::where('artise_id', '=' , $id)->delete();
		Lyrics::where('artise_id', '=' , $id)->delete();
		
		if(count($user))
			$user->delete();
		return redirect('adminusers');
	}
	
	public function getUsers(){
		$users = User::paginate(15);
		
		foreach($users as $user){
			$user['permission'] = DB::table('permission')->where('user_id', '=', $user['id'])->get();
		}
		$permission_array  = $this->getPermssion();
		
		return view('adminusers', compact('users', 'permission_array'));
	}
	
	public function blockUser(){
		$msg = "This is a simple message.";
		$id = $_POST['id'];
		$act = $_POST['act'];
		
		$user = User::find($id);
		$user->status = $act;
		$ret = $user->save();
		if($ret) {
			$status = 1;
			$msg = "Setting success";
		}
		else{
			$status = 0; 
			$msg = "Setting failed";
		}
		return response()->json(array('msg'=> $msg, 'status'=> $ret), 200);
	}
	
	
	private function getIndex($str, $index){
		for($i = 0; $i < count($str); $i++){
			if($str[$i] == $index) return 1;
		}
		return 0;
	}
	
	public function permission_all($user_id){
		$user = User::find($user_id);
		$user->permission = 0;
		$user->save();
		DB::table('permission')->whereRaw("user_id = '$user_id'")->delete();
		return redirect('adminusers');		
	}
	
	
	public function permission($user_id, $permit){
		//delete
		for($i = 0; $i < 6; $i++){
			$index = strval($i);
			if(strpos($permit, $index) !== false ){
				$row_permission = DB::table('permission')->whereRaw("user_id = '$user_id' and type = '".$permit[strpos($permit, $index)]."'")->first();
				if(count($row_permission)) continue;
				DB::table('permission')->insert([
					['user_id' => $user_id,
					 'type' => $permit[strpos($permit, $index)],
					]
				]);
			}
			else{
				$row_permission = DB::table('permission')->whereRaw("user_id = '$user_id' and type = '".$i."'")->first();
				if(!count($row_permission)) continue;
				DB::table('permission')->whereRaw("user_id = '$user_id' and type = '".$i."'")->delete();
			}
		}
		$user = User::find($user_id);
		
		if($permit != '6'){	
			$user->permission = 1;
		}
		
		
		$index = strval($i);
		if(strpos($permit, $index) !== false ){
			$user->approved = 1;
		}
		else{
			$user->approved = 0;
		}
				
		
		$user->save();
		
		return redirect('adminusers');
	}
	
	/*********************admin dashboard home ***********************/
	public function browse_admin_home(){
		$pending_songs =  Songs::where('status','=','0')->count();
		$total_songs = Songs::all()->count();
		$song_data = array('pendingSong' => $pending_songs, 'totalSong' => $total_songs);
		
		
		$pending_lyrics = Lyrics::where('status','=','0')->count();
		$total_lyric =  Lyrics::all()->count();
		$lyric_data = array('pendingLyric' => $pending_lyrics, 'totalLyric'=> $total_lyric);
		
		
		$pending_news = News::where('status', '=', '0')->count();
		$total_news = News::all()->count();
		$news_data = array('pendingNews'=> $pending_news, 'totalNews' => $total_news);
		
		
		$total_signup = User::whereRaw('usertype != "2"')->count();
		$blocking_user = User::whereRaw('status = "0"')->count();
		$user_data = array('blockingUser'=> $blocking_user, 'totalUser' => $total_signup);
		
		$permission_array  = $this->getPermssion();
		
		return view('adminhome', compact('song_data', 'lyric_data' ,'news_data', 'user_data' ,'permission_array'));
	}

	//http://secondtruth.github.io/startmin/pages/index.html
	
	public function getPermssion(){
		
		$permission['music'] = $this->hasPermission(0) ? 1:0;
		$permission['lyric'] = $this->hasPermission(1) ? 1:0;
		$permission['news']  = $this->hasPermission(2) ? 1:0;
		$permission['ads']   = $this->hasPermission(3) ? 1:0;
		$permission['users'] = $this->hasPermission(4) ? 1:0;
		$permission['comment'] = $this->hasPermission(5) ? 1:0;
		$permission['video'] = $this->hasPermission(6) ? 1:0;
		return $permission;
	}
	
	private function hasPermission($index){
		
		$type = Auth::user()->usertype;
		if($type == 2) return 1;
		
		$user_id = Auth::user()->id;
		$row_permission = DB::table('permission')->whereRaw("user_id = '$user_id' and type = '".$index."'")->first();
		if(count($row_permission)) return 1;
		else return 0;
	}
	
	/*************************  ads **************************************/
	public function admin_ads(){
		$permission_array  = $this->getPermssion();
		$ads = Ads::orderBy('created_at', 'DESC')->get();
		
		foreach($ads as $adsitem){
			
			if($adsitem->status == '0'){
				
				$menu_field = $adsitem->menu;
				$pos_filed  = $adsitem->pos;
				
				$count = Ads::whereRaw("menu = '$menu_field' and pos = '$pos_filed' and status = '1' ")->count();
				
				if($count >= 1) $adsitem['enable'] = 0;
				else           $adsitem['enable'] = 1;
			}
			
			
		}
		
		return view('adminads',compact('ads','permission_array'));
	}
	
	public function adminadsdetail(){
		$permission_array  = $this->getPermssion();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$ads = Ads::find($id);
			return view('adminadsdetail', compact('ads', 'permission_array'));
		}
		else
			return view('adminadsdetail',compact('permission_array'));
	}
	
	public function addads(){
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$ads = Ads::find($id);
		}
		else
			$ads = new Ads;
		$ads->title  = $_POST['ads_title_edit']; 	
		$ads->code   = $_POST['ads_code_edit'];
		$ads->menu   = $_POST['ads_menu_edit'];
		$ads->image  = $_POST['uploadads_img'];
		$ads->url    = $_POST['ads_url_edit'];
		$ads->pos    = $_POST['ads_pos_edit'];
		$ads->type   = $_POST['ads_type_edit'];
		$ads->save();
		  
		return redirect()->action('HomeController@admin_ads')->with('message', 'Suceess!');
		
	}
	
	public function publishAds(){
		// update
		$msg = "This is a simple message.";
		$id = $_POST['id'];
		$act = $_POST['act'];
		
		$ads = Ads::find($id);
		$ads->status  = $act;
		
		$ret = $ads->save();
		if($ret) {
			$status = 1;
			$msg = "Setting success";
		}
		else{
			$status = 0; 
			$msg = "Setting failed";
		}	
		return response()->json(array('msg'=> $msg, 'status'=> $status), 200);
		
	}
	
	//delete ads 
	
	public function deleteads($id){
		$ads = Ads::find($id);
		if(count($ads))
			$ads->delete();
		return redirect()->action('HomeController@admin_ads')->with('message', 'Suceess!');
	}
	
	public function adminsettings(Request $request){
		 
		$setting = array();
		
		if($request->isMethod('post')){
			//
			$token = Settings::where('key', '=', 'autoapprove')->first();
		 
			if($request->approve_enable !== null){
				$token->value = 1;
			}
			else{
				$token->value = 0; 
			}
			$token->save();
		}
		
		$token = Settings::where('key', '=', 'autoapprove')->first();
		$setting['autoapprove'] = $token->value;		
		
		return view('adminsetting', compact('setting'));
	}
}
