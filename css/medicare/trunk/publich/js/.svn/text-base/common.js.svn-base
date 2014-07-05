function dialog(obj) {
    if( _requiredValid() ) {
        jConfirm('Do you sure save ?', function(j) {});
    } else { focusError();return false;}
     
                   
     
     //var posion = _getPosion( $(obj));
    // $('.box-popup').addClass('apple');
    // $('.box-popup').css({left: posion.left+'px', top: posion.top+'px'});
    
}

function _requiredValid(  ) {
    var hasErr = 0;
	$('.required').each( function() {
		var value = $(this).val();
		if(value == '') {
			$divpr = $(this).closest('.row').addClass('has-error');
			hasErr++;
		} else {
			$divpr = $(this).closest('.row').removeClass('has-error');
		}
	});
	if( hasErr !=0) {
		return false;
	} return true;
}

function _getPosion( obj ) {
    try {
        //var position = obj.position();
        var position = obj.offset();
        return {'left': position.left, 'top': position.top}
    } catch(e) {
        return {'left': 0, 'top': 0} 
    }
}

/*
* Focus to error input
*/
function focusError() {
	$('.has-error').first().find('input').focus();
    $('.has-error').first().find('label').animate({
        marginRight: '20px',
    },100).animate({
        marginRight: '5px',
    },100).animate({
        marginRight: '20px',
    },100).animate({
        marginRight: '5px',
    },100);
}

/*
* pupup model
*/

function popupModel(){
    $('#overscreen').remove();
    var tr = '';
    for(var i=0; i<20; i++){
        tr+=' <tr>'                                 
                +'<td>0001</td>'
                +'<td>LAS</td>'
                +'<td>Viet Nam</td>'
                +'<td>24</td>'
            +'</tr>'
    }
    $("BODY").append('<div id="overscreen">'
      +'<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1"></div>'
      +'<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">'
        +'<div style="background: white; height: 400px; margin-top: 100px;border: 1px solid #DEDEDE; box-shadow: 0 4px 23px 5px rgba(0, 0, 0, 0.2), 0 2px 6px rgba(0,0,0,0.15);">'
            +'<div style="border-bottom: 1px solid #ddd; padding: 13px 10px 30px 10px;">'
                +'<button type="button" onclick="closePopupModel();" class="close pull-right" style="float: right;" aria-hidden="true">X</button>'
            +'</div>'
            +'<div style="padding: 10px; overflow: auto; height: 330px;">'
                +'<table class="table table-bordered tb-head" style="width: 100%;">'
                            +'<thead>'
                                +'<tr>'
                                    +'<th>ID</th>'
                                    +'<th>Name</th>'
                                    +'<th>Place</th>'
                                    +'<th>Age</th>'
                             +'  </tr>'
                            +'</thead>'
            
    
                              +'  <tbody>'
                                   +tr
                                    
                            +'</tbody>'
                +'</table>'
            +'</div>'
        +' <div>'
      +'</div>'    
      +'<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1"></div>'  
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
}
/*
*
*/
function closePopupModel() {
    $('#overscreen').fadeOut(300);
    
}