/**
 * +====================================
 | Project: Training
 +====================================
 | > Date started: 27/09/2013 (dd/mm/yyyy)
 | > Author: HoangPT
 | > Last modified: 27/09/2013
 | > Modified By: HoangPT
 | > Version : 1.0.0
 | > Function : Customer Info Editing
 +====================================
 *
 *
 * */

$(document).ready(function() {
	// script for transforming classic table to fixed table
	$("#data-table-2").each(function() {
	    var Id2 = $(this).get(0).id;

	    $("#" + Id2 + " .FixedTables").fixedTable({
	        width: 931,
	        height: fixedTableHeight,
	        fixedColumns: 3,
	        // header style
	        classHeader: "fixedHead",
	        // footer style
	        classFooter: "fixedFoot",
	        // footer style
	        classColumn: "fixedColumn",
	        // the width of fixed column on the left
	        fixedColumnWidth: 292,
	        // table's parent div's id
	        outerId: Id2,
	        arrWidth: [20,60,160,160,160,160,160,160]
	    });
	  });
	
	// a trick to keep fixed table staying in right form
	$('.fixedContainer .fixedHead').css('width','639px');
	$('.fixedContainer .fixedTable').css('overflow-y','scroll');
	$('.fixedColumn').css('height','');
	
	// set number field alignment to right
	$('.staff-id').parent().css('text-align','right');
	
	// init events
	initEvents();
	
	// format input field
	$(".number").textFormat('-9');
	$(".number").ForceNumericOnly();
});

/**
 * Set max height of the fixedtable
 * @private
*/
var fixedTableHeight = 180;

/**
 * Initialize all events in form
 * @public
*/
function initEvents() {
	try {		
		//Add row -> OK
		$('#add-row').click(function() {
			if($('.fixedColumn .fixedTable table tbody').size() == 0){
				$('.fixedColumn .fixedTable table').prepend('<tbody></tbody>');
			}

			$('.fixedColumn .fixedTable table tbody').append(addRowFixedColumn());
			$('.fixedContainer .fixedTable table tbody').append(addRowFixedContainer());

			// a trick to keep fixed table staying in right form
			var newHeight = Math.min($('#table-info').height() + 17, fixedTableHeight);
			$('.fixedColumn .fixedTable').css('height', (newHeight-17) + 'px');
			$('.fixedContainer .fixedTable').css('height', newHeight + 'px');
		});
		
		//Delete multiple rows -> OK
		$('#delete').click(function() {
			if($(".fixedColumn input:checked ").length == 0){
			    var parameter = new Object();
				parameter['icon']     = 'information';
				jQuery.msgBox('No record selected', parameter);
				return;
			}
			var parameter = new Object();
			parameter['icon']     = 'question';
			parameter['button']   = 2;
			parameter['function'] = deleteMultiRowFixedTable;
			jQuery.msgBox('Are you sure you want to delete all selected record(s)?', parameter);
		});
		
		//Insert row -> OK
		$('#insertRow').click(function() {
			if($(".fixedColumn input:checked ").length == 0){
			    var parameter = new Object();
				parameter['icon']     = 'information';
				jQuery.msgBox('No record selected', parameter);
				return;
			}
			var index = $(".fixedColumn input:checked ").parents('tr').index();
			$(".fixedColumn .fixedTable tbody tr:eq(" + index + ")").after(addRowFixedColumn());
			$(".fixedContainer .fixedTable tbody tr:eq(" + index + ")").after(addRowFixedContainer());
			
			// a trick to keep fixed table staying in right form
			$('.fixedColumn .fixedTable').css('height', Math.min($('#table-info').height(), fixedTableHeight - 17) + 'px');
			$('.fixedContainer .fixedTable').css('height', Math.min($('#table-info').height() + 17, fixedTableHeight) + 'px');
		});
		
		//Delete customer -> OK
		$('#deleteCustomer').click(function() {
			var parameter = new Object();
			parameter['icon']     = 'question';
			parameter['button']   = 2;
			parameter['function'] = deleteCustomer;
			jQuery.msgBox('Are you sure you want to delete this customer?', parameter);
		});
		
		//Save -> OK
		$('#save').click(function() {
			var parameter = new Object();
			parameter['icon']     = 'question';
			parameter['button']   = 2;
			parameter['function'] = save;
			jQuery.msgBox('Are you sure you want to save?', parameter);
		});
	}
	catch(e) {
		alert('initEvents '+ e);
	}
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
	var error = 0; // init a flag check if there's at least ONE error format input data in this form
	
	// check if being in edit or add mode
	var mode = _mode;
	
	// saving customer info
	if(checkCustomerId($('#customerId').val())){
		_customerId = $('#customerId').val();
		removeErrorTooltip($('#customerId'));
	}
	else{
		showErrorTooltip($('#customerId'), 'Customer ID must be integer and not larger than 9999!');
		error=1;
	}
	if(checkName($('#customerName').val())){
		name = jQuery.castHtml($('#customerName').val());
		removeErrorTooltip($('#customerName'));
	}
	else{
		showErrorTooltip($('#customerName'), 'Customer name must have at least 3 characters and not include any special character!');
		error=1;
	}

	var kanaName = jQuery.castHtml($('#kanaName').val());
	var shortName = jQuery.castHtml($('#shortName').val());
	var postCode = jQuery.castHtml($('#postCode').val());
	var address1 = jQuery.castHtml($('#address1').val());
	var address2 = jQuery.castHtml($('#address2').val());
	var tel = jQuery.castHtml($('#tel').val());
	var fax = jQuery.castHtml($('#fax').val());
	var customerNote = jQuery.castHtml($('#customer-note').val());
	
	var staffId = '';
	var staffName = '';
	var staffNameKana = '';
	var staffDepartment = '';
	var staffEmail = '';
	var staffPosition = '';
	var staffNote = '';
	var cnt = 0;
	
	// saving customer representative
	if($(".fixedColumn .fixedTable tbody tr").length > 0){
		$(".fixedColumn .fixedTable tbody tr").each(function()
		{
			var isErrorRow = 0; // init a flag check if there's at least ONE error format input data in THIS row
			
			if($(this).find('.staff-id').text() == ''){
				staffId += '0' + String.fromCharCode(9);
			}
			else{
				staffId += $(this).find('.staff-id').text() + String.fromCharCode(9);
			}
			
			if(checkName($(this).find('.staffName').val())){
				staffName += jQuery.castHtml($(this).find('.staffName').val()) + String.fromCharCode(9);
				removeErrorTooltip($(this).find('.staffName'));
			}
			else{
				showErrorTooltip($(this).find('.staffName'), 'Staff name must have at least 3 characters and not include any special character!');
				isErrorRow=1;
			}
			
			var thisRow = $(".fixedContainer .fixedTable tbody tr:eq("+$(this).index()+")");
			
			staffNameKana += jQuery.castHtml(thisRow.find('.staffNameKana').val()) + String.fromCharCode(9);
			staffDepartment += jQuery.castHtml(thisRow.find('.staffDepartment').val()) + String.fromCharCode(9);
			
			if(checkEmailAddress(thisRow.find('.email').val())){
				staffEmail += thisRow.find('.email').val() + String.fromCharCode(9);
				removeErrorTooltip(thisRow.find('.email'));
			}
			else{
				showErrorTooltip(thisRow.find('.email'), 'Invalid email address!');
				isErrorRow=1;
			}

			staffPosition += jQuery.castHtml(thisRow.find('.staffPosition').val()) + String.fromCharCode(9);
			staffNote += jQuery.castHtml(thisRow.find('.note').val()) + String.fromCharCode(9);
			
			if(isErrorRow==1){
				error = 1;
				// remove tooltips of creating & editing info
				thisRow.removeAttr("onmouseout");
				thisRow.removeAttr("onmouseover");
			}
			cnt++;
		});
	}
	
	if(error==0){
		$.post(
				'/customer/save',
			    {
						mode			:	mode
					,	id				:	_customerId
					,	name			:	name
					,	kanaName		:	kanaName
					,	shortName		:	shortName
					,	postCode		:	postCode
					,	address1		:	address1
					,	address2		:	address2
					,	tel				:	tel
					,	fax				:	fax
					,	customerNote	:	customerNote
					,	staffId			:	staffId
					,	staffName		:	staffName
					,	staffNameKana	:	staffNameKana
					,	staffDepartment	:	staffDepartment
					,	staffEmail		:	staffEmail
					,	staffPosition	:	staffPosition
					,	staffNote		:	staffNote
					,	cnt				:	cnt
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
			    		if($("#customerId").val() == result[1]){
			    			showErrorTooltip($("#customerId"), result[2]);
			    		}
			    	    var parameter = new Object();
			    		parameter['icon'] = 'exclamation';
			    		jQuery.msgBox(result[2], parameter);
			    	}
			    }
			);
	}
	else{
	    var parameter = new Object();
		parameter['icon'] = 'exclamation';
		jQuery.msgBox('Check your data!', parameter);
	}
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
function deleteMultiRowFixedTable(btnOK){
	if(!btnOK){
		return;
	}
	$(".fixedColumn input:checked").each(function()
	{
		deleteRowFixedTable(true, $(this).parents('tr').index());
	});
}

/**
 * Create html for new row in fixedcolumn
 * @return {string} html for new row
 * @private
*/
function addRowFixedColumn(){
	try {
		var html = '';
		html += '<tr>';
		html += '<td style="width: 20px; height: 35px; background-color: rgb(255, 255, 255);"><input type="checkbox"></td>';
		html += '<td style="width: 60px; height: 35px; background-color: rgb(255, 255, 255);"><span class="staff-id"></span></td>';
		html += '<td style="width: 160px; height: 35px; background-color: rgb(255, 255, 255);"><input type="text" class="staffName" maxlength="50"></td>';
		html += '</tr>';
		return html;
	}
	catch(e) {
		alert('addrow column:'+e);
	}
}

/**
 * Create html for new row in container
 * @return {string} html for new row
 * @private
*/
function addRowFixedContainer(){
	try {
		var html = '';
		html += '<tr>';
		html += '<td style="width: 160px; height: 35px; background-color: rgb(255, 255, 255);"><input type="text" class="staffNameKana" maxlength="50"></td>';
		html += '<td style="width: 160px; height: 35px; background-color: rgb(255, 255, 255);"><input type="text" class="staffDepartment" maxlength="50"></td>';
		html += '<td style="width: 160px; height: 35px; background-color: rgb(255, 255, 255);"><input type="text" class="email" maxlength="50"></td>';
		html += '<td style="width: 160px; height: 35px; background-color: rgb(255, 255, 255);"><input type="text" class="staffPosition" maxlength="20"></td>';
		html += '<td style="width: 160px; height: 35px; background-color: rgb(255, 255, 255);"><input type="text" class="note" maxlength="20"></td>';
		html += '</tr>';
		return html;
	}
	catch(e) {
		alert('addrow container:'+e);
	}
}

/**
 * Remove row which has the index
 * @param  {bool} true: user click OK, false: user click Cancel
 * @param  {int} row index
 * @private
*/
function deleteRowFixedTable(btnOK, index){
	if(!btnOK){
		return;
	}
	try {
		// remove row from 2 element tables
		$('.fixedColumn .fixedTable table tbody tr:eq(' + index + ')').remove();
		$('.fixedContainer .fixedTable table tbody tr:eq(' + index + ')').remove();
		
		// a trick to keep fixed table staying in right form
		if($('#table-info').height() < fixedTableHeight){
			$('.fixedColumn .fixedTable').css('height', Math.max($('#table-info').height(), 0) + 'px');
			$('.fixedContainer .fixedTable').css('height', Math.max($('#table-info').height() + 17, 17) + 'px');
		}
	}
	catch(e) {
		alert('deleterow:'+e);
	}
}

/**
 * Send POST to execute stored procedure for saving data
 * @param  {bool} true: user click OK, false: user click Cancel
 * @private
*/
function deleteCustomer(btnOK){
	if(!btnOK){
		return;
	}
	try{
		$.post(
				'/customer/delete',
			    {
						list	:	(_customerId + String.fromCharCode(9))
					,	cnt		:	1
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
	catch(e){
		alert('deletecustomer:'+e);
	}
}

/**
 * Reload current page 
 */
function reload(){
	window.location.reload();
}

/**
 * Validate customer id
 * @param {string} input id
 * @return {bool}
 * @private
*/
function checkCustomerId(customerId){
	if(customerId != ''){
		if(jQuery.isInteger(customerId)){
			if(customerId>0 && customerId<10000){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	else{
		return false;
	}
}

/**
 * Validate customer name
 * @param {string} input name
 * @return {bool}
 * @private
*/
function checkName(name){
	if(name.length >= 3 && name.length < 30){
		//return /^[a-zA-Z0-9- ]*$/.test(name);
		return true;
	}
	else{
		return false;
	}
}

/**
 * Validate email address
 * @param {string} input email
 * @return {bool}
 * @private
*/
function checkEmailAddress(emailAddress) {
	if(emailAddress == ''){
		return true;
	}
	else{
	    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
	    return pattern.test(emailAddress);
	}
};