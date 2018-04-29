<?php
Route::get('/', 'SongsController@index');
Route::get('/home', 'SongsController@index');

Route::get('/browse', 'SongsController@browse');
Route::get('/chart', 'SongsController@chartssong');
Route::get('/artist', 'PlaylistController@artists');

Route::get('/lyrics', 'LyricsController@browse');
Route::get('/lyric-detail/{name}/{id}', 'LyricsController@getLyric');

Route::get('/news','NewsController@browse');
Route::get('/full-post/{name}/{id}', 'NewsController@newsdetail');

/************  track detail.html for browse ********/
Route::get('/trackdetail/{name}/{id}', 'SongsController@trackdetail');
Route::get('/profile', 'HomeController@showArtiseprofile');
Route::POST('/updateprofile', 'HomeController@update');

Auth::routes();
Route::POST('/setplaylist', 'HomeController@set');

Route::POST('/publishSong','SongsController@publishSong');
Route::POST('/setfeaturedSong','SongsController@setfeaturedSong');
Route::POST('/publishLyric','LyricsController@publishLyric');

//comments
Route::POST('/leavecomment','CommentController@leavecomment');
Route::get('/admincomments','HomeController@browse_admin_comment');
Route::get('/deletecomment/{id}','HomeController@deletecomment');
Route::POST('/publishComments','CommentController@publishComments');



Route::get('/sendemail', 'SongsController@sendemail');



// search the 
Route::GET('/search','PlaylistController@search');
Route::GET('/search_in','PlaylistController@search_in');


Route::get('musicfeed', 'PlaylistController@musicfeed');
Route::get('lyricsfeed', 'PlaylistController@lyricsfeed');
Route::get('newsfeed', 'PlaylistController@newsfeed');

Route::get('videofeed', 'PlaylistController@videofeed');
//
Route::get('/profile-details/{name}/{id}', 'PlaylistController@artist');

Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('email/verify/confirm/{confirmationCode}', 'Auth\SocialAuthController@verifyemailconfirm');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

	//video processing

	Route::group(['middleware' => ['auth']] , function (){
		
		//download song
		Route::get('/downloadsong','PlaylistController@downloadsong');
		 
		Route::POST('/uploadsong', 'SongsController@uploadsong');
		Route::POST('/uploadlyric', 'LyricsController@uploadlyric');
		Route::POST('/uploadvideo', 'VideoController@uploadvideo');
				
		/*****************************  menu *********************/
		//news
		Route::get('/adminnews', 'NewsController@browse_admin');
		Route::POST('/uploadnews', 'NewsController@uploadnews');
		Route::get('/adminnewsdetail','NewsController@adminnewsdetail');
		Route::POST('/publishNews','NewsController@publishNews');
		Route::POST('/uploadnewsFront', 'NewsController@uploadnewsFront');
		//upload  image
		Route::post('/saveimage', 'HomeController@saveimage');

		// artist profile
		Route::post('/uploadprofile/images', 'SongsController@uploadprofileimage');
		
	});

	Route::group(['middleware' => ['auth','admin']] , function (){
		
		// video 
		Route::get('/adminvideo','VideoController@browse_admin_video');
		Route::get('/deletevideo/{id}', 'VideoController@deletevideo');		
		Route::post('/publishVideo','VideoController@publishVideo');
		
		
		Route::get('/adminusers','HomeController@getUsers');
		Route::get('/deleteuser/{id}','HomeController@deleteuser');
		Route::post('/blockUser','HomeController@blockUser');
		Route::get('/permission/{user_id}/{permit}','HomeController@permission');
		Route::get('/permission/{user_id}','HomeController@permission_all');
		
		
		
		//admin 
		Route::get('/admin','HomeController@browse_admin_home');
		Route::get('/adminhome','HomeController@browse_admin_home');

		//admin song
		Route::get('/adminmusic','HomeController@browse_admin_song');
		Route::get('/featured','HomeController@browse_featured');

		Route::get('/deletesong/{id}', 'HomeController@deletesong');
		Route::get('/deletesongitem/{id}', 'HomeController@deletesongitem');

		//admin lyric
		Route::get('/adminlyrics', 'HomeController@browse_admin_lyric');
		Route::get('/deletelyric/{id}', 'HomeController@deletelyric');
		
		// delete news 
		Route::get('/deletenews/{id}','NewsController@deletenews');
				
				
		// ads
		Route::get('/adminads','HomeController@admin_ads');
		Route::get('/adminadsdetails','HomeController@adminadsdetail');
		Route::post('/addads', 'HomeController@addads');
		Route::post('/publishAds', 'HomeController@publishAds');
		Route::get('/deleteads/{id}', 'HomeController@deleteads');

		// storage management
		Route::get('/storage/getAccesstoken', 'StorageController@getAccesstoken');
		Route::get('/storage/authorize', 'StorageController@Accesstoken');
		Route::post('/storage/token/change', 'StorageController@savechange');
		
		Route::get('/storage/UploadFile', 'StorageController@UploadFile');
		
		Route::get('/adminsettings', 'HomeController@adminsettings');
		Route::post('/adminsettings', 'HomeController@adminsettings');
	});
	
	Route::get('/videos', 'VideoController@browse');
	Route::get('/video-detail/{name}/{id}', 'VideoController@getVideo');
	

?>