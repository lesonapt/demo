$(document).ready(function() {
	$('#UserId').focus();
    
});

$(document).on('click', '.close', function(e) {
    $(this).parent().hide();
});
/**
 * Trigger login
 * @param {Object} trigger info
 * @public
*/
function keyDown(e){
	if (e.keyCode == 13) {
		// Enter key pressed
		login();
    }
}

/**
 * Goto URL with param to search
 * @public
*/
function login(){
	var error = false;
	removeErrorTooltip($('#UserId'));
	removeErrorTooltip($('#Password'));
	if(!checkUserId($('#UserId').val())){
		showErrorTooltip($('#UserId'), 'User ID must have at least 3 characters not include special chars');
		$('#UserId').focus();
		error = true;
	}else if(!checkPassword($('#Password').val())){
		showErrorTooltip($('#Password'), 'Password must have at least 8 characters not include special chars');
		$('#Password').focus();
		error = true;
	}
	if(!error){
		try{
			$.post('/index/signin',{
					UserId		:	$('#UserId').val()
				,	Password	:	$('#Password').val()
			},function(res){
			 var data = JSON.parse(res);
             if(data['isLog'] == 0 ) {
                $('.alert-danger').show();
             } else {
            	window.location.href= '/index';
             }
             
		    	//var result = res.split('|');
//		    	if(result[0]==0){
//		    		window.location.href=(_backurl == '')?'/index':_backurl;
//		    	}else if(result[0]==1){
//		    		showErrorTooltip($('#UserId'), result[2]);
//		    		$('#UserId').focus();
//		    	}else if(result[0]==2){
//		    		showErrorTooltip($('#Password'), result[2]);
//		    		$('#Password').focus();
//		    	}

			});
		}catch(e){}
	}
}

function showErrorTooltip(element, message){
    //$('#UserId').tooltip();
	element.attr('onmouseout',"hidetip()");
	element.attr('onmouseover',"showtip('"+message+"')");
	element.css('background-color', '#c1483d');
    //element.addClass('has-error');
    
}

function removeErrorTooltip(element){
    $('#UserId').tooltip('hide');
	element.removeAttr("onmouseout");
	element.removeAttr("onmouseover");
	element.css('background-color', '');
}

/**
 * Validate user id
 * @return {bool}
 * @private
*/
function checkUserId(userId){
	if(userId.length >= 3 && userId.length < 30){
		return /^[\w]+$/.test(userId);
	}
	else{
		return false;
	}
}

/**
 * Validate password
 * @return {bool}
 * @private
*/
function checkPassword(password){

	if(password.length >= 3 && password.length < 30){
		return /^[\w]+$/.test(password);
	}
	else{
		return false;
	}
}