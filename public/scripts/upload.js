(function ($) {

$(window).load(function() {
	$(".upload_guestbutton").click(function(){
		$(".userlogin").trigger("click");	
	});
		
	$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    
	$(document).on("click", ".upload-profileimage", function(){
		$(".uploadimage-form").show();
	});
	
	//validation proecessing
	init();
	function init(){
		
		$("#title-upload-song").val("");
		$("#uploadsong_src").val("");
		$("#uploadsong_img").val("");
		$("#title-upload-song_riryc").val("");
		$("#lyrics_content").val("");
		$("#lyrics_artise_name").val("");
		$("#uploadsong_img_riryc").val("");
		
		$("#uploadsong_img_video").val('');
		$("#uploadnews_img").val('');
		
		$("#videotype").val('');
	}
	
	$("#uploadsong_save").click(function(event){
		remove_alert();
		var msg = "";
		
		event.preventDefault();
		var error  = 0;
		if($("#title-upload-song").val() == "") error  = 1;
		if(!error && $("#uploadsong_src").val() == "") error = 2;
		if(!error && $("#uploadsong_img").val() == "") error = 3;
		
		if(error){
			switch(error){
				case 1: msg = "Please insert the song title";  break;
				case 2: msg = "Please upload the song.";       break;
				case 3: msg = "Please upload the cover image"; break;
			}
			
			$(".uploadsong-alert-warn").show();
			$(".uploadsong-alert-warn-content").html(msg);
			
			
		}
		else{
			
			$(".uploadsong-form").submit();
			
		}
		
	});
	

	/***************upload ryric  ******************************/
	$("#uploadsong_save_riryc").click(function(event){
		remove_alert();
		var msg = "";
		event.preventDefault();
		var error  = 0;
		if($("#title-upload-song_riryc").val() == "")        error  = 1;
		if(!error && $("#lyrics_content").val() == "")       error  = 2;
		if(!error && $("#lyrics_artise_name").val() == "")   error  = 3;
		if(!error && $("#uploadsong_img_riryc").val() == "") error  = 4;
		
		if(error){
			switch(error){
				case 1: msg = "Please insert the lyric title"; break;
				case 2: msg = "Please input the lyric.";       break;
				case 3: msg = "Please input the artise name";  break;
				case 4: msg = "Please upload the cover image"; break;
			}
			//event.preventDefault();
			$(".uploadlyric-alert-warn").show();
			$(".uploadlyric-alert-warn-content").html(msg);			
		}
		else{			
			$(".uploadlyric-form").submit();
		}
	});
	
	

	/***************upload news ******************************/
	//fileupload_riryc  :  fileupload_news
	//progress_image_riryc : progress_image_news
	//uploadsong_img_riryc  :  uploadnews_img
	//files_upload_riryc    :  files_upload_news
		
});
	
   //uploadnews_save
	
	$("#uploadnews_save").click(function(event){
		var error  = 0;
		if($("#title_upload_news").val() == "")        error  = 1;
		if(!error && $("#uploadnews_img").val() == "")   error  = 3;
		if($('#summernote_code').val == '') error = 5;
		return;
		
		if(error){
			switch(error){
				case 1: alert("Please insert the news title."); break;
				case 3: alert("Please upload the cover image"); break;
				case 5: alert('Please insert the content');  break;
				/**/
			}
			event.preventDefault();
		}
		
	});
	
	
	$(document).on("click",".modal-close-btn", function(){
		$(".form-control").val('');
		$(".alert-success").hide();
		$(".alert-warning").hide();
		
		$(".form-control").val('');
		$('.progress-bar').css(
			'width', "0%"
		);
		$('.upload-content').html("");
	});
	
	/**************** save ads ********************************/
	$("#ads_save").click(function(event){
		var error  = 0;
		
		if($("#ads_type_edit").val() == '0'){
			if($("#ads_title_edit").val() == "")        error  = 1;
			if(!error && $("#ads_code_edit").val() == "")       error  = 2;
			
		}
		else{
			
			if($("#uploadads_img").val() == "") error = 5;
			if($("#ads_url_edit").val() == "") error = 6;
			
		}
		
		if(!error && $("#ads_menu_edit").val() == '-1') error  = 3;
		if(!error && $("#ads_pos_edit").val() == '-1') error  = 4;			
		
		
		if(error){
			switch(error){
				case 1: alert("Please insert the ads title"); break;
				case 2: alert("Please input the code."); break;
				case 3: alert("Please select the menu."); break;
				case 4: alert("Please select the position"); break;
				case 5: alert("Please upload the image"); break;
				case 6: alert("Please input the url. "); break;
			}
			event.preventDefault();
		}
	});
		
});


/********************video processing *************************/

	$("#uploadvideo_save").click(function(event){
		event.preventDefault();
		
		remove_alert();
		var msg = "";
		
		var error  = 0;
		if($("#title-upload-video").val() == "")        error  = 1;
		if(!error && $("#video_url").val() == "")       error  = 2;
		if(!error && $("#video_content").val() == "")   error  = 3;
		if(!error && $("#uploadsong_img_video").val() == "") error  = 4;
		
		if(!error && !validateVideoUrl($("#video_url").val())) error  = 5;
	
		var type = validateVideoUrl($("#video_url").val())-1;
		
		if(error){
			switch(error){
				
				case 1:  msg = "Please input the titile";       break;
				case 2:  msg = "Please input the URL.";         break;
				case 3:  msg ="Please input the content.";      break;
				case 4:  msg ="Please upload the cover image."; break;
				case 5:  msg ="Please input the correct url."; break;
			}
			
			
			$(".uploadvideo-alert-warn").show();
			$(".uploadvideo-alert-warn-content").html(msg);
		}
		else{
			$("#videotype").val(type);
			$(".uploadvideo-form").submit();
		}
	});


	function validateVideoUrl(str){
		if(str.substr(0, 23) == "https://www.youtube.com") return 1;
		else if(str.substr(0, 17) == "https://vimeo.com")  return 2;
		else if(str.substr(0, 24) == "https://www.facebook.com")  return 3;
		else return 0;
	}
	
	
	/**************************  News Processing  ******************************/
	$("#uploadnews_img_front").val('');	
	$("#uploadnews_img_front").val('');	
	$("#uploadnews_save_front").click(function(event){
		event.preventDefault();
		//remove all alert
		remove_alert();
		var error  = 0;
		var msg = "";
		if($("#title_upload_news").val() == "")        error  = 1;
		if(!error && $("#uploadnews_img_front").val() == "")   error  = 3;
		
		
		var markupStr = $('#summernote').summernote('code');
		if(markupStr == '') error = 5;
		$("#summernote_code").val(markupStr);
		
		if(error){
			switch(error){
				case 1: msg = "Please insert the news title";   break;
				case 3: msg = "Please upload the cover image."; break;
				case 5: msg = 'Please insert the content';      break;
			}
			$(".uploadnews-alert-warn").show();
			$(".uploadnews-alert-warn-content").html(msg);
			
		}
		else{
			$(".uploanewsfront-form").submit();
		}	
	});
	
	function remove_alert(){
		$(".alert-success").hide();
		$(".alert-warning").hide();
	}


})(jQuery);
