$(function() {
	
	$("#mod_poll_btn_vote").click(function(){
		if(validate_mod_poll_form()){
			var theForm = $("#mod_poll_form");
			submitFormAjax(theForm, ".ajax-loading-img", "", "counter_mod_poll_form");	
		}//end if
	}).css('cursor','pointer');//end 
	
	$("#mod_poll_btn_result").live("click", function(){
		var mod_poll_id = $("#mod_poll_id").val();
		//onPopDiv("");
		//onOverlayDiv();
		var URL = "/module_poll/ajax_graph/param/mod_poll_id="+mod_poll_id;
		var counterDiv = $("#div-poll-chart");
		var loadingDiv = "";
		//var counterDiv = $("#popDiv");
		//var loadingDiv = "";div-poll-chart
		AJAX_HTML(URL, counterDiv, loadingDiv);
		
	}).css('cursor','pointer');//end 
		
});

function validate_mod_poll_form(){
	
	if(validateIsRadioChecked("mod_poll_answer")){
		//alert("Had checked form");
		return true;
	}
	return false;
}//end function

function counter_mod_poll_form(data){
	var jdata = jQuery.parseJSON(data);
	//alert(jdata.html);
	//var decodeHTML = $('<div/>').html(jdata.html).text();
	//alert(decode);
	if(jdata.success){
		$("#mod_poll_btn_vote").hide();
		$("#mod_poll_table").html("Answer had submited. <br> Thank You.");
	}//end if
};
	
