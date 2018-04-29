<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PricesClass;
use Input, Validator, Auth, Redirect, View;
use App\Settings;
use App\Songs;
use App\Playlist;
use App\Lyrics;
use App\News;

class StorageController extends Controller
{
    //
	public function getAccesstoken(){
		$auth_class = new PricesClass();
		return Redirect::to($auth_class->getOauthURI());
	}
	public function Accesstoken(){
		$token = Settings::where('key', '=', 'dropboxTokenKey')->first();
		$token_value = $token->value;
		return view('dashboard/storage/authorize', compact('token_value'));
	}
	
	public function savechange(){
		$token = Settings::where('key', '=', 'dropboxTokenKey')->first();
		if(isset($token)){
			$code =  $_POST['authorize_key'];
			$abc  = new PricesClass();
			$token->value = $abc->getAccessToken($code);
			$token->save();
			return redirect('storage/authorize')->with('status', 'Save the authorize key!');
		}
		else{
			return redirect('storage/authorize')->with('status', 'Fail!');
		}
	}
	
	// parameter
	
	//  path: localpath, pos: pos, type:type,  
	
	public function UploadFile(){

	//	$songName =  "abcedefg.mpga";
		$songName =  public_path(). "/images/a1.jpg";
		$ext = pathinfo($songName, PATHINFO_EXTENSION);
	
		echo $ext;
			$songName = preg_replace('"\.jpg$"', '.abcde', $songName);
		
		echo $songName;
		
		
		exit;
			
		$sourcePath  =storage_path() . "/app/images/4729c21df6dcd79e4c44d0d3c855929a.jpeg";
		$dropboxPath = '/song/a1.jpg';
		$token = Settings::where('key', '=', 'dropboxTokenKey')->first();
		$accesstoken  = $token->value;
			
		$abc = new PricesClass();
		$path = $abc->UploadFile($accesstoken, $dropboxPath, $sourcePath);
	//	unlink($sourcePath);
	
		$msg = "success";
		return response()->json(array('msg'=> $msg, 'status'=> 1, 'path'=> $accesstoken), 200);
	}
	
}
