/**
 * +====================================
 | Project: Training
 +====================================
 | > Date started: 27/09/2013 (dd/mm/yyyy)
 | > Author: HoangPT
 | > Last modified: 27/09/2013
 | > Modified By: HoangPT
 | > Version : 1.0.0
 | > Function : Customer Search
 +====================================
 *
 *
 * */

$(document).ready(function() {
	document.getElementById("search-input").focus();
	initEvents();
});

/**
 * Initialize all events in form
 * @public
*/
function initEvents() {
	try {
		//Search
		$('#search').click(function() {
			search();
		});
		//Delete multiple rows
		$('#delete').click(function() {
			// check if any checkboxes was checked. if NO, then do not active this button
			if($("#customer-table input:checked ").length == 0){
			    var parameter = new Object();
				parameter['icon']     = 'information';
				jQuery.msgBox('No record selected', parameter);
				return;
			}
			
			var parameter = new Object();
			parameter['icon']     = 'question';
			parameter['button']   = 2;
			parameter['function'] = deleteMulti;
			jQuery.msgBox('Are you sure you want to delete all selected record(s)?', parameter);
		});
	}
	catch(e) {
		alert('initEvents error');
	}
}


/**
 * Trigger search
 * @param {Object} trigger info
 * @public
*/
function keyDown(e){
	if (e.keyCode == 13) {
		// Enter key pressed
		search();
    }
}

/**
 * Goto URL with param to search
 * @public
*/
function search(){
	if($('#search-input').val().length>0){
		window.location.replace("/customer/index/keyword/"+jQuery.castHtml($('#search-input').val()));
	}
	else{
		window.location.replace("/customer/");
	}
}

/**
 * Reload current page 
 */
function reload(){
	window.location.reload();
}

/**
 * Loop on the checked inputs, then delete each row selected
 * @param  {bool} true: user click OK, false: user click Cancel
 * @private
*/
function deleteMulti(btnOK){
	if(!btnOK){
		return;
	}
	
	var list = '';
	var cnt = 0;
	$("#customer-table input:checked ").each(function(){
		list += $.trim($(this).parent().next().text()) + String.fromCharCode(9);
		cnt++;
	});
	if(list.length>0){
		$.post(
				'/customer/delete',
			    {
						list	:	list
					,	cnt		:	cnt
				},
			    function(res) {
			    	var result = res.split('|');
			    	if(result[0]==0){
			    		// no error
			    	    var parameter = new Object();
			    		parameter['icon'] = 'information';
			    		parameter['function'] = reload;
			    		jQuery.msgBox('Saved.', parameter);
			    	}
			    	else{
			    		if(result[1]==''){
				    	    var parameter = new Object();
				    		parameter['icon'] = 'worning';
				    		jQuery.msgBox(result[2], parameter);
			    		}
			    	}
			    }
			);
	}
}