// jQuery Alert Dialogs Plugin
//
// Version 1.1
//
// Cory S.N. LaViska
// A Beautiful Site (http://abeautifulsite.net/)
// 14 May 2009
//
// Visit http://abeautifulsite.net/notebook/87 for more information
//
// Usage:
//		jAlert( message, [title, callback] )
//		jConfirm( message, [title, callback] )
//		jPrompt( message, [value, title, callback] )
// 
// History:
//
//		1.00 - Released (29 December 2008)
//
//		1.01 - Fixed bug where unbinding would destroy all resize events
//
// License:
// 
// This plugin is dual-licensed under the GNU General Public License and the MIT License and
// is copyright 2008 A Beautiful Site, LLC. 
//
(function($) {
	
	$.alerts = {
		
		// These properties can be read/written by accessing $.alerts.propertyName from your scripts at any time
		modeIconClass: 'icon',
		modelColor: 'black',
	
		// Public methods
		confirm: function(message, title, callback) {
			if( title == null ) title = 'Confirm';
			$.alerts._show(title, message, null, 'confirm', function(result) {
				if( callback ) callback(result);
			});
		},
		
		warning: function(message, title, callback) {
			if( title == null ) title = 'Warning';
			$.alerts._show(title, message, null, 'warning', function(result) {
				if( callback ) callback(result);
			});
		},
			
		success: function(message, title, callback) {
			if( title == null ) title = 'Success';
			$.alerts._show(title, message, null, 'success', function(result) {
				if( callback ) callback(result);
			});
		},
		
		// success dialog for F060 page
		done: function(message, title, callback) {
			if( title == null ) title = '結果';
			$.alerts._show(title, message, null, 'done', function(result) {
				if( callback ) callback(result);
			});
		},
		
		stop: function(message, title, callback) {
			if( title == null ) title = 'Stop';
			$.alerts._show(title, message, null, 'stop', function(result) {
				if( callback ) callback(result);
			});
		},
		
		error: function(message, title, callback) {
			if( title == null ) title = 'Error';
			$.alerts._show(title, message, null, 'error', function(result) {
				if( callback ) callback(result);
			});
		},
		
		// Private methods
		
		_show: function(title, msg, value, type, callback) {
			$.alerts._hide();
			modeCancelButton = '';
			classMsg = '';
			classButton = 'btn-primary';
			switch( type ) {
			
				case 'confirm':
					classMsg = 'text-primary';
					classButton = 'btn-primary';
					modeCancelButton = '<button type="button" id="btnModelFalse" class="btn btn-default"  >いいえ</button>';
				break;
				
				case 'warning':
					classMsg = 'text-warning';
					classButton = 'btn-warning';
					modeCancelButton = '<button type="button" id="btnModelFalse" class="btn btn-default"  >いいえ</button>';
				break;
				
				case 'success':
					classMsg = 'text-success';
					classButton = 'btn btn-success';
				break;
						
				case 'stop':
					classMsg = 'text-danger';
					classButton = 'btn-danger';
				break;
				
				case 'error':
					classMsg = 'text-danger';
					classButton = 'btn-danger';
				break;
					
			}
            
            $("BODY").append('<div id="overscreen">'
                        +'<div class="box-popup" >'
                            +'<div class="cotent">'
                                +'<div class="msg '+classMsg+' ">'+msg+'</div>'
                                +'  <div class="action text-right">'
                                    + modeCancelButton
                                    +'<button id="btnModelTrue" class="btn '+classButton+' ">はい</button>'
                                +'</div> '
                            +'</div>'
                         +'</div>'
                        +'</div>');
                        
       
            
           	var w_window =  $( window ).width();
    		var w_loading =  $( '.box-popup' ).width();
    		
    		var h_window =  $( window ).height();
    		var h_loading =  $( '.box-popup' ).height();
          
    		$('.box-popup').css({
    			left:((w_window-w_loading)/2),
    			top: ((h_window-h_loading)/2)-100,
    		});
            
            
			$("#btnModelTrue").click( function() {
				$( "#overscreen" ).remove();
				if( callback ) callback(true);
			});
			$("#btnModelFalse").click( function() {
				$( "#overscreen" ).remove();
				if( callback ) callback(false);
			});
            
			//$("#btnModelFalse").focus();
			$("#btnModelTrue, #btnModelFalse").keypress( function(e) {
				if( e.keyCode == 13 ) $("#btnModelTrue").trigger('click');
				if( e.keyCode == 27 ) $("#btnModelFalse").trigger('click');
			});
						
		},

		_hide: function() {
			$("#overscreen").remove();
		},	
		
	};
	
  
    
	// Shortuct functions
	
	jConfirm = function(message, callback) {
		$.alerts.confirm(message, 'title', callback);
	};
	
	jWarning = function(message,  callback) {
		$.alerts.warning(message, 'title', callback);
	};
	
	jSucess = function(message, callback) {
		$.alerts.success(message, 'title', callback);
	};
	
	jStop = function(message, callback) {
		$.alerts.stop(message, 'title', callback);
	};
	
	jError = function(message, callback) {
		$.alerts.error(message, 'title', callback);
	};
	
})(jQuery);