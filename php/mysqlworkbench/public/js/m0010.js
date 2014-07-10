/**
 * +====================================
 | Project: Training
 +====================================
 | > Date started: 27/09/2013 (dd/mm/yyyy)
 | > Author: HoangPT
 | > Last modified: 27/09/2013
 | > Modified By: HoangPT
 | > Version : 1.0.0
 | > Function : User Management
 +====================================
 *
 *
 * */
$(document).ready(function() {
	$(".number").textFormat('-9');
	$(".number").ForceNumericOnly();
	initEvents();
});

/**
 * Storing index of the current editing row
 * @private
*/
var currentRowIndex = -1;

/**
 * Initialize all events in form
 * @public
*/
function initEvents() {
	try {
		
		//Get the index of current editing row
		$('input, select').blur(function(){
			currentRowIndex = $(this).parents('tr').index();
		});
		
		//Add row -> OK
		$('#add-row').click(function() {
			$('#customer-table tbody').prepend(addRow());
			$(".number").textFormat('-9');
			$(".number").ForceNumericOnly();
		});
		
		//Delete multiple rows -> OK
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
			parameter['function'] = deleteMultiRow;
			jQuery.msgBox('Are you sure you want to delete all selected record(s)?', parameter);
			return false;
		});
		
		//Insert row -> OK
		$('#insertRow').click(function() {
			if(currentRowIndex < 0){
			    var parameter = new Object();
				parameter['icon']     = 'information';
				jQuery.msgBox('No record selected', parameter);
				return;
			}
			
			$("#customer-table tbody tr:eq(" + currentRowIndex + ")").after(addRow());
			$(".number").textFormat('-9');
			$(".number").ForceNumericOnly();
		});
		
		//Save
		$('#save').click(function() {
			var parameter = new Object();
			parameter['icon']     = 'question';
			parameter['button']   = 2;
			parameter['function'] = save;
			jQuery.msgBox('Are you sure you want to save?', parameter);
			return false;
		});
	}
	catch(e) {
		alert('initEvents error');
	}
}

function deleteBtnClick(element){
	var index = element.parents('tr').index();
	var parameter = new Object();
	parameter['caption']  = '';
	parameter['icon']     = 'question';
	parameter['button']   = 2;
	parameter['function'] = deleteRow;
	parameter['argument'] = index;
	jQuery.msgBox('Are you sure you want to delete this record?', parameter);
	return false;
}

/**
 * Validate all data inputs, send params to stored procedure for saving data.
 * @param  {bool} true: user click OK, false: user click Cancel
 * @private
*/
function save(btnOK){
	if(!btnOK){
		return;
	}
	var UserId = '';
	var Password = '';
	var PermissionCode = '';
	var PcId = '';
	var PcName = '';
	var Language = '';
	var Cnt = 0;
	var error = 0; // init a flag check if there's at least ONE error format input data in ALL rows
	
	if($("#customer-table tbody tr").length > 0){
		$("#customer-table tbody tr").each(function()
		{
			var isErrorRow = 0; // init a flag check if there's at least ONE error format input data in THIS row
			
			if(checkUserId($(this).find('.userId').val())){
				UserId += $(this).find('.userId').val() + String.fromCharCode(9);
				removeErrorTooltip($(this).find('.userId'));
			}
			else{
				isErrorRow = 1;
				showErrorTooltip($(this).find('.userId'), 'User ID must have at least 3 characters not include special chars');
			}
			
			if(checkPassword($(this).find('.password').val())){
				Password += $(this).find('.password').val() + String.fromCharCode(9);
				removeErrorTooltip($(this).find('.password'));
			}
			else{
				isErrorRow = 1;
				showErrorTooltip($(this).find('.password'), 'Password must have at least 8 characters not include special chars');
			}

			PermissionCode += $(this).find('.permission').val() + String.fromCharCode(9);
			PcId += $(this).find('.pcId').val() + String.fromCharCode(9);
			PcName += $(this).find('.pcName').val() + String.fromCharCode(9);
			Language += $(this).find('select.language option:selected').val() + String.fromCharCode(9);
			Cnt++;
			
			if(isErrorRow==1){
				error = 1;
				// remove tooltips of creating & editing info
				$(this).removeAttr("onmouseout");
				$(this).removeAttr("onmouseover");
			}
		});
	}
	
	if(error==0){
		$.post(
				'/user/save',
			    {
					UserId			:UserId,
					Password		:Password,
					PermissionCode	:PermissionCode,
					PcId			:PcId,
					PcName			:PcName,
					Language		:Language,
					Cnt				:Cnt
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
			    		try{
			    			$(".userId").each(function(){
			    				if($(this).val() == result[1]){
						    		$(this).parents('tr').attr('onmouseout',"hidetip()");
						    		$(this).parents('tr').attr('onmouseover',"showtip('"+result[2]+"')");
						    		$(this).css('background-color', '#c1483d');
			    				}
			    			});
			    		}catch(e){}
			    	    var parameter = new Object();
			    		parameter['icon'] = 'exclamation';
			    		jQuery.msgBox(result[2], parameter);
			    	}
			    }
			);
	}
	else{
	    var parameter = new Object();
		parameter['icon']     = 'exclamation';
		jQuery.msgBox('Check your data!', parameter);
	}
}

/**
 * Reload current page 
 */
function reload(){
	window.location.reload();
}

function showErrorTooltip(element, message){
	element.attr('onmouseout',"hidetip()");
	element.attr('onmouseover',"showtip('"+message+"')");
	element.css('background-color', '#c1483d');
}

function removeErrorTooltip(element){
	element.removeAttr("onmouseout");
	element.removeAttr("onmouseover");
	element.css('background-color', '');
}

/**
 * Loop on the checked inputs, then delete each row selected
 * @param  {bool} true: user click OK, false: user click Cancel
 * @private
*/
function deleteMultiRow(btnOK){
	if(!btnOK){
		return;
	}
	$("#customer-table tbody td input:checked").each(function()
	{
	    deleteRow(true, $(this).parents('tr').index());
	});
}

/**
 * Create html for new row
 * @return {string} html for new row
 * @private
*/
function addRow() {
	try {
		var html = '';
		html += '<tr>';
		html += '<td width="20px"><input type="checkbox" name="checkbox"/></td>';
		html += '<td width="156px"><input type="text" name="userId" class="userId" maxlength="30" style="width:150px;"/></td>';
		html += '<td width="126px"><input type="text" name="password" class="password" maxlength="30" style="width:120px;"/></td>';
		html += '<td width="76px"><input type="text" name="permission" class="permission number" maxlength="2" style="width:70px;"/></td>';
		html += '<td width="126px"><input type="text" name="pcId" class="pcId" maxlength="30" style="width:120px;"/></td>';
		html += '<td width="126px"><input type="text" name="pcName" class="pcName" maxlength="50" style="width:120px;"/></td>';
		html += '<td width="100px"><select name="language" class="language"><option value="1" >Japanese</option><option value="2">English</option></select></td>';
		html += '<td align="center"><button class="delete-button" onclick="deleteBtnClick($(this));"><img src="/templates/client/default/images/Recycle.png"/></button></td>';
		html += '</tr>';
		return html;
	}
	catch(e) {
		alert('initEvents error');
	}
}

/**
 * Remove row which has the index
 * @param  {bool} true: user click OK, false: user click Cancel
 * @param  {int} row index
 * @private
*/
function deleteRow(btnOK, index){
	try {
		if(!btnOK){
			return;
		}
		$('#customer-table tbody tr:eq(' + index + ')').remove();
	}
	catch(e) {
		alert('deleterow '+e);
	}
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

	if(password.length >= 8 && password.length < 30){
		return /^[\w]+$/.test(password);
	}
	else{
		return false;
	}
}