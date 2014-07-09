/**
 +====================================
 | Project: Jam Shopping A18
 +====================================
 | > Date started: 2014/06/11
 | > Author: tuannq
 | > Version : 1.0.0
 | > Modified by : 
 | > Modified Date : 
 +====================================
 */
var _view = 1;
var _isSearched = false;
var _checked = 0;
$(document).ready(function() {
	initSearch();
	initialize();
	
});

/**
 * init function
 * @param null
 * @return null
 */
function initialize() {
	try {
		//load back button
		if(sessionStorage.flag == 'back_simple'){
			sessionStorage.flag = '';
			if(sessionStorage.conditionHtml != ''){
				$('#search-area').html(sessionStorage.conditionHtml);
				
				$( "#order_date_from, #order_date_to, #detail_order_date_from, #detail_order_date_to, #shipping_date_from, #shipping_date_to, #appointed_date_from, #appointed_date_to" ).datepicker( { dateFormat: 'yy/mm/dd' } );
				//check seletced after back button
				$('#order_status option').each(function(){
					if($(this).val() == sessionStorage.order_status){
						$(this).attr('selected',true);
					}
				});
				//goi lai search de view ketqua
				/*var order_number_from = sessionStorage.order_number_from;
				var order_number_to = sessionStorage.order_number_to;
				var order_status = sessionStorage.order_status;
				var order_date_from = sessionStorage.order_date_from;
				var order_date_to = sessionStorage.order_date_to;
				var shipping_name = sessionStorage.shipping_name;
				var shipping_mailaddress = sessionStorage.shipping_mailaddress;
				var shop_list = sessionStorage.shop_list;*/
				
				initSearch();
				//load_after_back(order_number_from,order_number_to,order_status,order_date_from,order_date_to,shipping_name,shipping_mailaddress,shop_list);
			}
		}else{
			sessionStorage.conditionHtml = '';
			sessionStorage.order_number_from = '';
			sessionStorage.order_number_to = '';
			sessionStorage.order_status = '';
			sessionStorage.order_date_from = '';
			sessionStorage.order_date_to = '';
			sessionStorage.shipping_name = '';
			sessionStorage.shipping_mailaddress = '';
			sessionStorage.shop_list = '';
		}
		
		if(sessionStorage.flag == 'back_detail'){
			
			$('.sw-view').hide();
			$('.searchAdvanceView').show();
			$('.searchSimpleView-bt').show();
			$('#detail_order_number_from').focus();
			sessionStorage.flag = '';
			if(sessionStorage.conditionHtml1 != ''){
				$('#search-area').html(sessionStorage.conditionHtml1);
				$( "#order_date_from, #order_date_to, #detail_order_date_from, #detail_order_date_to, #shipping_date_from, #shipping_date_to, #appointed_date_from, #appointed_date_to" ).datepicker( { dateFormat: 'yy/mm/dd' } );
				//goi lai search de view ketqua
				//$('#btn-detail-search').trigger('click');
				detail_load_after_back();
				
				
			}
		}else{
			sessionStorage.conditionHtml1 = '';
			sessionStorage.detail_order_number_from = '';
			sessionStorage.detail_order_number_to = '';
			sessionStorage.detail_order_date_from = '';
			sessionStorage.detail_order_date_to = '';
			sessionStorage.shipping_date_from = '';
			sessionStorage.shipping_date_to = '';
			sessionStorage.order_total_from = '';
			sessionStorage.order_total_to = '';
			sessionStorage.appointed_date_from = '';
			sessionStorage.appointed_date_to = '';
			sessionStorage.appoint_time = '';
			sessionStorage.purchaser_name = '';
			sessionStorage.purchaser_phone_number = '';
			sessionStorage.purchaser_zipcode = '';
			sessionStorage.name_purchaser_address = '';
			sessionStorage.purchaser_mailaddress = '';
			sessionStorage.shipping_read_name = '';
			sessionStorage.shipping_phone_number = '';
			sessionStorage.shipping_zipcode = '';
			sessionStorage.name_shipping_address = '';
			sessionStorage.shipping_mailaddress = '';
			sessionStorage.detail_order_status = '';
			sessionStorage.return_status = '';
			sessionStorage.payment_method = '';
			sessionStorage.purchase_category = '';
			sessionStorage.shop_list = '';
		}
		
		// end load back
		$('#order_number_from').focus();
		
		$( "#order_date_from, #order_date_to, #detail_order_date_from, #detail_order_date_to, #shipping_date_from, #shipping_date_to, #appointed_date_from, #appointed_date_to" ).datepicker( { dateFormat: 'yy/mm/dd' } );
		$('.search-conditions').find('input, select').change(function(){
			_isSearched = false;
		});
		
		$('.date').change(function(){
			if (!_validateYyyyMmDd($(this).val())) {
				$(this).val('');
			}
			else {
				var string = $(this).val();
				var reg1 = /^[0-9]{8}$/;
				var reg2 = /^[0-9]{4}[\/.][0-9]{2}[\/.][0-9]{2}$/;
				if (string.match(reg1)){
					$(this).val(string.substring(0,4) + '/' + string.substring(4,6) + '/' + string.substring(6));
				}else if(string.match(reg2)){
					$(this).val(string);
				}
			}
		});
		
		//Enter search
		$('.inputSearch').keypress(function(event){
			if (event.which == 13) {
				//if (_validate($('.search-conditions'))) {
					_isSearched = true;
					search();
				//}
		    }
		});
		
		//simple search
		$('#btn-search').click(function(){
			_clearErrors();
			if (_validate($('.search-conditions'))) {
				_isSearched = true;
				search();
			}
		});
		
		
		$('.inputDetailSearch').keypress(function(event){
			if (event.which == 13) {
				//if (_validate($('.search-conditions'))) {
					_isSearched = true;
					detailSearch();
				//}
		    }
		});
		$('#btn-detail-search').click(function(){
			_clearErrors();
			if (_validate($('.search-conditions'))) {
				detailSearch();
			}
		});
		
		//button 1
		$('#btn-upload').click(function(){
			jConfirm('????????????????????', function(r) {
					if( r ) {
						$('.overscreen').show();
					   	var w_window =  $( window ).width();
						var w_loading =  $( '.dialog-box' ).width();
						
//						var h_window =  $( window ).height();
//						var h_loading =  $( '.dialog-box' ).height();
	
						$('.dialog-box').css({
							left: (w_window-w_loading)/2,
							//top: (h_window-h_loading)/2
					        top: 100
						});
						$('#text_area').hide();
					}
					/*
					$( "#dialog_selection" ).dialog({ position: { my: "center left",  of: $(this) } });
					$( "#dialog_selection" ).dialog({ resizable: false });
					$("#dialog_selection").draggable({disabled:true}); 
					$( "#dialog_selection" ).dialog({ height: 540, width: 1050 });
					$( "#dialog_selection" ).dialog();*/
				});
            });
		
		$('#upload1').change(function(){
			$('#path1').val($(this).val().replace(/^.*[\\\/]/, ''));
		});
		
		$('#btn-upload1').click(function(){
			if((getFileExtension($('#path1').val()) != 'csv') && (getFileExtension($('#path1').val())!='CSV'))
			{
				jStop('????????????????????????????', function(r) {
					if (r) {
						$('#text_area').hide();
					}
				});
			}
			else {
				$('#frm-upload-file1').submit();
			}
		});
		
		$('#btn-close-dialog').click(function() {
			//$('#dialog_selection').dialog('close');
			$('#path1').val('');
			$('.overscreen').hide();
		});
		//end 1st button 
		
		//button 2
		$('#btn-download-csv-all').click(function(){
			jConfirm('?????CSV???????????????????', function(r) {
				if (r) {
					_isSearched = true;
					_checked = 0;
					downloadCsv();
				}		
					//}
//					else {
//						jWarning('Please select one row', function(j){
//							return false;
//						});
//					}
				//}
//				else {
//					jWarning('????????????????????????', function(j){
//						return false;
//					});
//				}
				//_isSearched = false;
            });
		});
		//end 2nd button
		
		//button 3
		$('#btn-download-csv-check').click(function(){
			jConfirm('??????????????????????????????????', function(r) {
				if (r) {
					_isSearched = true;
					_checked = 1;
					if (validateDownLoadCheck()) {
						downloadCsv();
					}
					else {
						jStop('?????????????', function(r) {
							
						});
					}
				}
			});
					
				//}
//				else {
//					jWarning('????????????????????????', function(j){
//						return false;
//					});
//				}
				//_isSearched = false;
		});
		//end 3rd button
		
		//button 4
		$('#btn-download-send').click(function(){
			jConfirm('[?????]??????CSV???????????????????', function(r) {
				if (r) {
					$('.overscreen-1').show();
				   	var w_window =  $( window ).width();
					var w_loading =  $( '.dialog-box' ).width();
					
					//var h_window =  $( window ).height();
					//var h_loading =  $( '.dialog-box' ).height();

					$('.dialog-box').css({
						left: (w_window-w_loading)/2,
						//top: (h_window-h_loading)/2
				        top: 100
					});
					$('#shipping_date_dialog').focus();
//					$( "#dialog_selection-2" ).dialog({ position: { my: "center top", at: "center bottom", of: $(this) } });
//					//$( "#dialog_selection" ).dialog({ resizable: false });
//					$( "#dialog_selection-2" ).dialog({ height: 540, width: 1050 });
//					$( "#dialog_selection-2" ).dialog();
				}
            });
		});
		$('#shipping_date_dialog').datepicker( { dateFormat: 'yy/mm/dd' } );
		$('#btn-download-send-dialog').click(function () {
			if (validateDowloadSend()) {
				downloadSend();
			}	
			else {
				jStop('??????????????????????????', function(r) {
					if (r) {
						$('#shipping_date_dialog').focus();
					}
				});
			}
		});
		$('#btn-close-dialog-2').click(function() {
			$('#shipping_date_dialog').val('');
			$('#shop_list_dialog').val($("#shop_list_dialog option:first").val());
			$('.overscreen-1').hide();
		});
		//end 4th button
		
		//button 5 Pending
		$('#btn-import-csv').click(function(){
			jConfirm('????? ]???CSV?????????? ????????', function(r) {
               // sendAll();
            });
		});
		
		
		//checkbox all
		$(document).on('click', '#check_all', function(){
			var checkboxes = this.checked;
			$('#table-data-2 tbody :checkbox').prop('checked', checkboxes);
		});
		
		
		
		
	}
	catch(e) {
		alert('init');
	}
 }

/**
 * When all row is checked => Checkbox 'checkall' will be set checked.
 * @param obj this checkbox.
 */
function changeCheck(obj) {
	if ($('#table-data-2 tbody input[type=checkbox]:checked').length == $('#table-data-2 tbody input:checkbox').length) {
		$('#check_all').prop('checked', true);
	} else {
		$('#check_all').prop('checked', false);
	}
}


/**
 * validate email
 * @param null
 * @return null
 */
function validateEmail(elem) {
	var regexp = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
	if(regexp.test(elem) || elem == ''){
		return true;
	}
	else{
		return false;
	}
	
}
/*
 * Toggle Search Advance and Simple
 */

function switchSearch( view ) {
	_view = view;
	$('.search-results').html('');
	$('.sw-view').hide();
	if( view == 1 ) { //simple
		$('.searchSimpleView').show();
		$('.searchAdvanceView-bt').show(); //long words
		$('#btn-search').trigger('click');
		$( "#order_date_from, #order_date_to, #detail_order_date_from, #detail_order_date_to, #shipping_date_from, #shipping_date_to, #appointed_date_from, #appointed_date_to" ).datepicker( { dateFormat: 'yy/mm/dd' } );
	} else { //detail
		$('.searchAdvanceView').show();
		$('.searchSimpleView-bt').show(); //short words
		$('#detail_order_number_from').focus();
		$( "#order_date_from, #order_date_to, #detail_order_date_from, #detail_order_date_to, #shipping_date_from, #shipping_date_to, #appointed_date_from, #appointed_date_to" ).datepicker( { dateFormat: 'yy/mm/dd' } );
		$('#btn-detail-search').trigger('click');
	}
}

/**
 * search
 * @param null
 * @return null
 */
function search () {
	try {
		var shop_list = [];
		var i = 0;
		$('div.checkbox-shop input[type="checkbox"]').each(function() {
			try {
				if( $(this).is(':checked') ) {
					shop_list[i] = $(this).attr('shop_id');
					i++;
				}
			} catch (e) {
				alert('div.checkbox input[type="checkbox"] each');
			}
		});
		var order_number_from 	= $('#order_number_from').val();
		var order_number_to 	= $('#order_number_to').val();
		var order_status 		= $('#order_status').val();
		var order_status_name 	= $('#order_status :selected').text();
		var order_date_from 	= $('#order_date_from').val();
		var order_date_to 		= $('#order_date_to').val();
		var shipping_name 		= $('#shipping_name').val();
		var shipping_mailaddress = $('#shipping_mailaddress').val();
		
		//save sesiónStorge
		if(typeof(Storage)!=="undefined")
		  {
			$('#search-area').find('select option:selected').attr('selected', true);
			$('#search-area').find('input').each(function() {
				if( $(this).is('[type="text"]') ) {
					$(this).attr('value', $(this).val());
				}
				else if( $(this).is('[type="checkbox"]') ) {
					if( $(this).is(':checked') ) {
						$(this).attr('checked', true);
					} else {
						$(this).removeAttr('checked');
					}
				}
			});
			sessionStorage.conditionHtml 				=   $('#search-area').html();
			sessionStorage.order_number_from			=	order_number_from;
			sessionStorage.order_number_to				=	order_number_to;
			sessionStorage.order_status					=	order_status;
			sessionStorage.order_date_from				=	order_date_from;
			sessionStorage.order_date_to				=	order_date_to;
			sessionStorage.shipping_name				=	shipping_name;
			sessionStorage.shipping_mailaddress			=	shipping_mailaddress;
			sessionStorage.shop_list					=	shop_list;
			sessionStorage.type_search 					=	'simple'; 	
		  }
		else
		  {
		  // Sorry! No Web Storage support..
			alert('web brower old!!!!!');
		  }
		$.post(
			'/Order-List/search',
			{
				order_number_from 	: $('#order_number_from').val(),
				order_number_to 	: $('#order_number_to').val(),
				order_status 		: $('#order_status').val(),
				order_status_name 	: order_status_name,
				order_date_from 	: $('#order_date_from').val(),
				order_date_to 		: $('#order_date_to').val(),
				shipping_name 		: $('#shipping_name').val(),
				shipping_mailaddress : $('#shipping_mailaddress').val(),
				shop_list 			: shop_list
			},
			function (res) {
				$('.search-results').html(res);
			}
		);
	}
	catch (e) {
		
	}
}

/**
 * Detail search
 * @param null
 * @return null
 */
function detailSearch () {
	try {
		var detail_order_status = [];
		var return_status = [];
		var payment_method = [];
		var purchase_category = [];
		var shop_list = [];
		var i = 0;
		
		
		var detail_order_number_from 	= $('#detail_order_number_from').val();
		var detail_order_number_to 		= $('#detail_order_number_to').val();
		var detail_order_date_from 		= $('#detail_order_date_from').val();
		var detail_order_date_to 		= $('#detail_order_date_to').val();
		var shipping_date_from 			= $('#shipping_date_from').val();
		var shipping_date_to 			= $('#shipping_date_to').val();
		var order_total_from 			= $('#order_total_from').val().replace(/\D/g,'');
		var order_total_to 				= $('#order_total_to').val().replace(/\D/g,'');
		var appointed_date_from 		= $('#appointed_date_from').val();
		var appointed_date_to 			= $('#appointed_date_to').val();
		var appoint_time				= $('#appoint_time').val();
		
		//???
		var purchaser_name 				= $('#purchaser_name').val();
		var purchaser_phone_number 		= $('#purchaser_phone_number').val();
		var purchaser_zipcode 			= $('#purchaser_zipcode').val();
		var name_purchaser_address 		= $('#name_purchaser_address').val();
		var purchaser_mailaddress 		= $('#purchaser_mailaddress').val();
		
		//???
		var shipping_read_name 			= $('#shipping_read_name').val();
		var shipping_phone_number 		= $('#shipping_phone_number').val();
		var shipping_zipcode 			= $('#shipping_zipcode').val();
		var name_shipping_address 		= $('#name_shipping_address').val();
		var shipping_mailaddress 		= $('#detail_shipping_mailaddress').val();
		
	
		//process checkboxes
		$('div.detail-order-status input[type="checkbox"]').each(function() {
			try {
				if( $(this).is(':checked') ) {
					detail_order_status[i] = $(this).attr('status_id');
					i++;
				}
			} catch (e) {
				alert('div.detail-order-status input[type="checkbox"] each');
			}
		});
		
		i = 0;
		$('div.return-status input[type="checkbox"]').each(function() {
			try {
				if( $(this).is(':checked') ) {
					return_status[i] = $(this).attr('return_status_id');
					i++;
				}
			} catch (e) {
				alert('div.return-status input[type="checkbox"] each');
			}
		});
		
		i = 0;
		$('div.payment-method input[type="checkbox"]').each(function() {
			try {
				if( $(this).is(':checked') ) {
					payment_method[i] = $(this).attr('method_id');
					i++;
				}
			} catch (e) {
				alert('div.payment-method input[type="checkbox"] each');
			}
		});
		
		i = 0;
		$('div.checkbox-purchase-category input[type="checkbox"]').each(function() {
			try {
				if( $(this).is(':checked') ) {
					purchase_category[i] = $(this).attr('category_id');
					i++;
				}
			} catch (e) {
				alert('div.checkbox-purchase-category input[type="checkbox"] each');
			}
		});
		
		i = 0;
		$('div.checkbox-shop input[type="checkbox"]').each(function() {
			try {
				if( $(this).is(':checked') ) {
					shop_list[i] = $(this).attr('shop_id');
					i++;
				}
			} catch (e) {
				alert('div.checkbox input[type="checkbox"] each');
			}
		});
		
		//save sesiónStorge
		if(typeof(Storage)!=="undefined")
		  {
			$('#search-area').find('select option:selected').attr('selected', true);
			$('#search-area').find('input').each(function() {
				if( $(this).is('[type="text"]') ) {
					$(this).attr('value', $(this).val());
				}
				else if( $(this).is('[type="checkbox"]') ) {
					if( $(this).is(':checked') ) {
						$(this).attr('checked', true);
					} else {
						$(this).removeAttr('checked');
					}
				}
			});
			$('#search-area').find('.searchSimpleView').addClass('collapse');
			sessionStorage.conditionHtml1 				=   $('#search-area').html();
			//alert(sessionStorage.conditionHtml1);
			sessionStorage.detail_order_number_from		=	detail_order_number_from;
			sessionStorage.detail_order_number_to		=	detail_order_number_to;
			sessionStorage.detail_order_date_from		=	detail_order_date_from;
			sessionStorage.detail_order_date_to			=	detail_order_date_to;
			sessionStorage.shipping_date_from			=	shipping_date_from;
			sessionStorage.shipping_date_to				=	shipping_date_to;
			sessionStorage.order_total_from				=	order_total_from;
			sessionStorage.order_total_to				=	order_total_to;
			sessionStorage.appointed_date_from			=	appointed_date_from;
			sessionStorage.appointed_date_to			=	appointed_date_to;
			sessionStorage.appoint_time					=	appoint_time;
			sessionStorage.purchaser_name				=	purchaser_name;
			sessionStorage.purchaser_phone_number		=	purchaser_phone_number;
			sessionStorage.purchaser_zipcode			=	purchaser_zipcode;
			sessionStorage.name_purchaser_address		=	name_purchaser_address;
			sessionStorage.purchaser_mailaddress		=	purchaser_mailaddress;
			sessionStorage.shipping_read_name			=	shipping_read_name;
			sessionStorage.shipping_phone_number		=	shipping_phone_number;
			sessionStorage.shipping_zipcode				=	shipping_zipcode;
			sessionStorage.name_shipping_address		=	name_shipping_address;
			sessionStorage.shipping_mailaddress			=	shipping_mailaddress;
			sessionStorage.detail_order_status			=	detail_order_status;
			sessionStorage.return_status				=	return_status;
			sessionStorage.payment_method				=	payment_method;
			sessionStorage.purchase_category			=	purchase_category;
			sessionStorage.shop_list					=	shop_list;
			sessionStorage.type_search 					=	'detail'; 	
		  }
		else
		  {
		  // Sorry! No Web Storage support..
			alert('web brower old!!!!!');
		  }
		
		$.post(
			'/Order-List/detailsearch',
			{
				detail_order_number_from 	: $('#detail_order_number_from').val(),
				detail_order_number_to 		: $('#detail_order_number_to').val(),
				detail_order_date_from 		: $('#detail_order_date_from').val(),
				detail_order_date_to 		: $('#detail_order_date_to').val(),
				shipping_date_from 			: $('#shipping_date_from').val(),
				shipping_date_to 			: $('#shipping_date_to').val(),
				order_total_from 			: $('#order_total_from').val().replace(/\D/g,''),
				order_total_to 				: $('#order_total_to').val().replace(/\D/g,''),
				appointed_date_from 		: $('#appointed_date_from').val(),
				appointed_date_to 			: $('#appointed_date_to').val(),
				appoint_time 				: $('#appoint_time').val(),
				
				//???
				purchaser_name 				: $('#purchaser_name').val(),
				purchaser_phone_number 		: $('#purchaser_phone_number').val(),
				purchaser_zipcode 			: $('#purchaser_zipcode').val(),
				name_purchaser_address 		: $('#name_purchaser_address').val(),
				purchaser_mailaddress 		: $('#purchaser_mailaddress').val(),
				
				//???
				shipping_read_name 			: $('#shipping_read_name').val(),
				shipping_phone_number 		: $('#shipping_phone_number').val(),
				shipping_zipcode 			: $('#shipping_zipcode').val(),
				name_shipping_address 		: $('#name_shipping_address').val(),
				shipping_mailaddress 		: $('#detail_shipping_mailaddress').val(),
				
				//checkboxes
				detail_order_status 		: detail_order_status,
				return_status 				: return_status,
				payment_method 				: payment_method,
				purchase_category			: purchase_category,
				shop_list 					: shop_list
				
			},
			function (res) {
				$('.search-results').html(res);
			}
			
		);
	}
	catch (e) {
		
	}
}

/**
 * get file extension
 * @param fileName string
 * @returns string
 */
function getFileExtension(fileName)
{
	return fileName.substr((Math.max(0, fileName.lastIndexOf(".")) || Infinity) + 1);
}


/**
 * downloadCsv
 * @param null
 * @return null
 */
function downloadCsv() {
	try {
		var shop_list = [];
		var i = 0;
		$('div.checkbox-shop input[type="checkbox"]').each(function() {
			try {
				if( $(this).is(':checked') ) {
					shop_list[i] = $(this).attr('shop_id');
					i++;
				}
			} catch (e) {
				alert('div.checkbox input[type="checkbox"] each');
			}
		});
		var row_checked = [];
		var order_id_list = [];
		i = 0;
		$('#table-data-2 tbody tr').each(function() {
			if (_checked == 0) {
				order_id_list[i] = $(this).find('.order_id').val();
				i++;
			}
			else if (_checked == 1) {
				if ($(this).find('td:eq(0) input[type="checkbox"]').prop('checked')) {
					row_checked[i] = $(this).index();
					order_id_list[i] = $(this).find('.order_id').val();
					i++;
				}
			}
		});
		var order_number_from = $('#order_number_from').val();
		var order_number_to = $('#order_number_to').val();
		var order_status = $('#order_status').val();
		var order_date_from = $('#order_date_from').val();
		var order_date_to = $('#order_date_to').val();
		var shipping_name = $('#shipping_name').val();
		var shipping_mailaddress = $('#shipping_mailaddress').val();
		//var shop_list = shop_list;
		var txt = '';
		txt += '<form id="export-frm" action="/Order-List/exportcsv" style="display:none" method="post" >';
		txt += '<input type="text" name="order_number_from" value="'+ order_number_from +'">';
		txt += '<input type="text" name="order_number_to" value="'+ order_number_to+'">';
		txt += '<input type="text" name="order_status" value="'+ order_status+'">';
		txt += '<input type="text" name="order_date_from" value="'+ order_date_from+'">';
		txt += '<input type="text" name="order_date_to" value="'+ order_date_to+'">';
		txt += '<input type="text" name="shipping_name" value="'+ shipping_name+'">';
		txt += '<input type="text" name="shipping_mailaddress" value="'+ shipping_mailaddress+'">';
		txt += '<input type="text" name="shop_list" value="'+ shop_list +'">';
		txt += '<input type="text" name="checked" value="'+ _checked +'">';
		txt += '<input type="text" name="row_checked" value="'+ row_checked +'">';
		txt += '<input type="text" name="order_id_list" value="'+ order_id_list +'">';
		txt += '</form>';
		$('#table-data-2').append(txt);
		$('#export-frm').submit();
		$('#export-frm').remove();
		return true;
	}
	catch (e) {
		alert(e);
	}
}

/**
 * download csv for 4th button
 */
function downloadSend() {
	try {
		var shipping_date_dialog = $('#shipping_date_dialog').val();
		var shop_list_dialog  = $('#shop_list_dialog :selected').text();
		var txt = '';
		txt += '<form id="export-frm" action="/Order-List/downloadsend" style="display:none" method="post" >';
		txt += '<input type="text" name="shipping_date_dialog" value="'+ shipping_date_dialog +'">';
		txt += '<input type="text" name="shop_list_dialog" value="'+ shop_list_dialog+'">';
		txt += '</form>';
		$('#table-data-2').append(txt);
		$('#export-frm').submit();
		$('#export-frm').remove();
	}
	catch(e) {
		alert('download csv 4');
	}
}


/**
 * validate
 * @param null
 * @return null
 */
function validate() {
	try {
		var error = 0;
		_clearErrors();
		if(!_validate($('.search-conditions'))){
			error++;
		}
		if (error > 0) {
//			_showErrorBar('????????');
//			$('.has-error:first').focus();
			return false;
		}
		else {
			return true;
		}
	}
	catch (e) {
		alert('validate');
	}
}
/**
 * load_after_back
 * @param null
 * @return null
 */
function initSearch(){
	try{
		var shop_list = [];
		var i = 0;
		$('div.checkbox-shop input[type="checkbox"]').each(function() {
			try {
				if( $(this).is(':checked') ) {
					shop_list[i] = $(this).attr('shop_id');
					i++;
				}
			} catch (e) {
				alert('div.checkbox input[type="checkbox"] each');
			}
		});
		$.post(
				'/Order-List/search',
				{
					order_number_from 	: $('#order_number_from').val(),
					order_number_to 	: $('#order_number_to').val(),
					order_status 		:	 $('#order_status').val(),
					order_status_name 	: $('#order_status :selected').text(),
					order_date_from 	: $('#order_date_from').val(),
					order_date_to 		: $('#order_date_to').val(),
					shipping_name 		: $('#shipping_name').val(),
					shipping_mailaddress : $('#shipping_mailaddress').val(),
					shop_list 			: shop_list
				},
				function (res) {
					$('.search-results').html(res);
					
				}
			);
	}catch(e){
		alert('load_after_back function');
	}
}



/**
 * load_after_back of detail search
 * @param null
 * @return null
 */
function detail_load_after_back()
{
	try{
		var detail_order_status = [];
		var return_status = [];
		var payment_method = [];
		var purchase_category = [];
		var shop_list = [];
		var i = 0;
		
		$('div.detail-order-status input[type="checkbox"]').each(function() {
			try {
				if( $(this).is(':checked') ) {
					detail_order_status[i] = $(this).attr('status_id');
					i++;
				}
			} catch (e) {
				alert('div.detail-order-status input[type="checkbox"] each');
			}
		});
		
		i = 0;
		$('div.return-status input[type="checkbox"]').each(function() {
			try {
				if( $(this).is(':checked') ) {
					return_status[i] = $(this).attr('return_status_id');
					i++;
				}
			} catch (e) {
				alert('div.return-status input[type="checkbox"] each');
			}
		});
		
		i = 0;
		$('div.payment-method input[type="checkbox"]').each(function() {
			try {
				if( $(this).is(':checked') ) {
					payment_method[i] = $(this).attr('method_id');
					i++;
				}
			} catch (e) {
				alert('div.payment-method input[type="checkbox"] each');
			}
		});
		
		i = 0;
		$('div.checkbox-purchase-category input[type="checkbox"]').each(function() {
			try {
				if( $(this).is(':checked') ) {
					purchase_category[i] = $(this).attr('category_id');
					i++;
				}
			} catch (e) {
				alert('div.checkbox-purchase-category input[type="checkbox"] each');
			}
		});
		
		i = 0;
		$('div.checkbox-shop input[type="checkbox"]').each(function() {
			try {
				if( $(this).is(':checked') ) {
					shop_list[i] = $(this).attr('shop_id');
					i++;
				}
			} catch (e) {
				alert('div.checkbox input[type="checkbox"] each');
			}
		});
		
		$.post(
				'/Order-List/detailsearch',
				{
					detail_order_number_from 	: $('#detail_order_number_from').val(),
					detail_order_number_to 		: $('#detail_order_number_to').val(),
					detail_order_date_from 		: $('#detail_order_date_from').val(),
					detail_order_date_to 		: $('#detail_order_date_to').val(),
					shipping_date_from 			: $('#shipping_date_from').val(),
					shipping_date_to 			: $('#shipping_date_to').val(),
					order_total_from 			: $('#order_total_from').val().replace(/\D/g,''),
					order_total_to 				: $('#order_total_to').val().replace(/\D/g,''),
					appointed_date_from 		: $('#appointed_date_from').val(),
					appointed_date_to 			: $('#appointed_date_to').val(),
					appoint_time 				: $('#appoint_time').val(),
					
					//???
					purchaser_name 				: $('#purchaser_name').val(),
					purchaser_phone_number 		: $('#purchaser_phone_number').val(),
					purchaser_zipcode 			: $('#purchaser_zipcode').val(),
					name_purchaser_address 		: $('#name_purchaser_address').val(),
					purchaser_mailaddress 		: $('#purchaser_mailaddress').val(),
					
					//???
					shipping_read_name 			: $('#shipping_read_name').val(),
					shipping_phone_number 		: $('#shipping_phone_number').val(),
					shipping_zipcode 			: $('#shipping_zipcode').val(),
					name_shipping_address 		: $('#name_shipping_address').val(),
					shipping_mailaddress 		: $('#detail_shipping_mailaddress').val(),
					
					//checkboxes
					detail_order_status 		: detail_order_status,
					return_status 				: return_status,
					payment_method 				: payment_method,
					purchase_category 			: purchase_category,
					shop_list 					: shop_list
					
				},
				function (res) {
					$('.search-results').html(res);
				}
				
			);
	}catch(e){
		alert('load_after_back function');
	}
}

/**
 * validate in dialog of 4th button
 * @returns {Boolean}
 */
function validateDowloadSend() {
	try {
		var error = 0;
		
		if ($('#shipping_date_dialog').val() == '') {
			$('#shipping_date_dialog').addClass('has-error');
			
			error++;
		}
		else {
			$('#shipping_date_dialog').removeClass('has-error');
		}
		if (error > 0) {
			return false;
		}
		return true;
	}
	catch(e) {
		alert(e);
	}
}
/**
 * validate check download
 * @returns {Boolean}
 */
function validateDownLoadCheck() {
	try {
		var checked = 0;
		$('#table-data-2 tbody tr').each(function() {
			if($(this).find('td:eq(0) input[type=checkbox]').prop('checked')){
				checked++;
			};
		});
		if (checked == 0) {
			return false;
		}
		else {
			return true;
		}
	}
	catch(e) {
		alert(e);
	}
}
