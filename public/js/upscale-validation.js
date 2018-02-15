//local.
var hostname = $(location).attr('origin')+"/upscale-event";
//Server
//var hostname = $(location).attr('origin');


//This function is for phone number validation
//onKeyUp="validatephone(this);" 
function validatephone(ph) {
	var maintainplus = '';
 	var numval = ph.value
 	if ( numval.charAt(0)=='+' ){ var maintainplus = '+';}
 	curphonevar = numval.replace(/[\\A-Za-z!"£$%^&*+_={};:'@#~,.¦\/<>?|`¬\]\[]/g,'');
 	ph.value = maintainplus + curphonevar;
 	var maintainplus = '';
 	ph.focus;
}


function validatePrice(e) {
	var maintainplus = '';
 	var numval = e.value
 	curphonevar = numval.replace(/[\\A-Za-z!"£$%^&*+_={};:'@#~,¦\/<>?|`¬\]\[]/g,'');
 	e.value = maintainplus + curphonevar;
 	var maintainplus = '';
 	e.focus;
}
//This function is for username  validation.space special character not allowed
//onKeyUp="checkUserName(this);"
function checkUserName(evt) {
	var maintainplus = '';
 	var numval = evt.value
 	if ( numval.charAt(0)=='+' ){ var maintainplus = '+';}
 	curuservar = numval.replace(/[^a-zA-Z0-9]/g,'');
 	evt.value = maintainplus + curuservar;
 	var maintainplus = '';
 	evt.focus;
}

//This function is for password  validation.space some special character are not allowed
//onKeyUp="checkPassword(this);"
function checkPassword(evt) {
	var maintainplus = '';
 	var numval = evt.value
 	if ( numval.charAt(0)=='+' ){ var maintainplus = '+';}
 	curuservar = numval.replace(/[^a-zA-Z0-9!@#$]/g,'');
 	evt.value = maintainplus + curuservar;
 	var maintainplus = '';
 	evt.focus;
}


function chk_xss(xss){
	var maintainplus = '';
	var numval = xss.value
	curphonevar = numval.replace(/[\\!"£$%^&*+_={};:'#~,.¦\/<>?|`¬\]\[]/g,'');
	xss.value = maintainplus + curphonevar;
	var maintainplus = '';
	xss.focus;
}


function newsletterValidation(){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if($("#news_ltr_email").val()==''){
		$("#news_ltr_email").addClass('error_class');
		$("#news_ltr_email").focus();
		return false;
	}else{
		$("#news_ltr_email").removeClass('error_class');
	}
	if(!($("#news_ltr_email").val()).match(emailExp)){
		$("#news_ltr_email").addClass('error_class');
		$("#news_ltr_email").focus();
		return false;
	}else{
		$("#news_ltr_email").focus();
	}
	postNewsLetterData();
}

//Show user login pop up
function postNewsLetterData(){
	var url = hostname + "/save-nl-data";
	$.ajax({
		type: "GET",
		cache: false,
		url: url, // success.php
		data: {'news_ltr_email':$('#news_ltr_email').val()},
		success: function (data) {
			console.log(data);
			if(data==0){
				$("#nl_msg").css('color','red').html('Please enter valid email address.');
			}
			if(data==1){
				$("#nl_msg").css('color','red').html('You have already sybscribed to our news letter.');
			}
			if(data=='success'){
				("#news_ltr_email").val('');
				$("#nl_msg").css('color','green').html('You have subscribed to our newsletter successfully.');
			}
	  }
  });
}