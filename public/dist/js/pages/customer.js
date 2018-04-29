/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/

$(function () {

	$('#datepicker').datepicker({
			dateFormat: 'yy-mm-dd',
			autoclose: true,
		    useCurrent: false //Important! See issue #1075
	});
	
	function init(){
		if($("#customer_user_block_option").val() == "1"){
			$(".customer_user_block_datepicker").hide();
		}
		else{
			$(".customer_user_block_datepicker").show();
		}
	}
	init();
	$('#customer_user_block_option').on('change', function (e) {
		//var optionSelected = $("option:selected", this);
		var valueSelected = this.value;
		if(this.value == "1"){
			$(".customer_user_block_datepicker").hide();
		}
		else{
			$(".customer_user_block_datepicker").show();
		}
		
	});
	
	$(document).on("click", ".customer_user_block_item", function(){
		
		var url = "/customer/action/" + $(this). closest('tr') .data("row")  + "/disable";
		$("#userblock_form").attr('action', url);
		
	});
	
	$(".blockuser-savechanges").click(function(){
		
		var error = 0;
		var msg = '';

		if($("#customer_user_block_option").val() == '0'){
			if(!error && $("#datepicker").val() == "")     				error  = 1;
		}
		
		
		if(!error && ($("#customer_user_block_text").val() == ""))   error  = 2;
	
		if(error){
			switch(error){
				case 1:  msg = "Please input the date.";          break;
				case 2:  msg ="Please input the reason.";         break;
			}
			$(".league_alertmodal_content").html(msg);
			$(".league_alertmodal_button").trigger('click');
			
		}
		else{
			$("#userblock_form").submit();
		}
		
		
		
	});
	
});
