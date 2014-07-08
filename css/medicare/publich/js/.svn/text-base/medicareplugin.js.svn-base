/*
 * Mediacare plugin Vesion 0.1 
 * Author: ANS-asia
 * Date: 07/07/2014
 */  
( function($){
             $.vari = "$.vari-1";
             $.fn.vari = "$.fn.vari-2";
             //$.fn is the object we add our custom functions to
             $.fn.mediacareFlash = function( obj ){
            	$(document).click(function(e) {
            	    if ( $(e.target).closest('.div-select-box button').length === 0 ) {
            	       $('ul.slectbox').fadeOut(250);
            	    } 
            	});
            	
            	/*
            	 * checkbox switch on/off
            	 */
            	$('.sw').click( function() {
                      if ( $( this ).find('.pr').css('margin-left') === '-80px' ) {
                          $( this).find('.pr').css('margin-left', '0px');
                          $( this).find('input').prop('checked', true);
            
                      } else {
                          $( this).find('.pr').css('margin-left', '-80px');
                          $( this).find('input').prop('checked', false);
                      }
                  }); 
            	/*
            	 * checkbox input
            	 */
            	 $('.check-box label.checkbox').click( function() {
                     var checkbox = $( this).find('input[type="checkbox"]');
                     if( checkbox.is(':checked') ) {
                    	 checkbox.prop('checked', false);
                    	 checkbox.parent('label').removeClass('checked');
                     } else {
                    	 checkbox.prop('checked', true);
                    	 checkbox.parent('label').addClass('checked');
                     }
                  });
            	 
            	 $('.check-box input[type="checkbox"]').each( function() {
            		 if( $(this).is(':checked') ) {
            			 $( this).parent('label').addClass('checked');
            		 }
            	 });
            	 
            	 /*
            	  * select box
            	  */
            	 var buttonHtml = '<button class="btn btn-info" style="text-align: left; width: 80%; height: 26px;"></button>'; 
            	 var textCheck = '';
            	 var isSelect = false;
            	 
            	 $('.div-select-box').each( function() {
            		 var ulHtml = '<ul class="slectbox"></ul>';
            		 var liHtml = '';
            		 $(this).find('select option').each( function() {
                		 var name  = $( this).text();
                		 var value = $(this).attr('value');
                		 liHtml+='<li value="'+value+'">'+name+'</li>';
                		 var selected = $(this).attr('selected');
                		 if(selected == 'selected') {
                			 textCheck = name;
                			 isSelect =  true;
                		 }
            		 });
            		/*
            		 * append button + ul
            		 */
                	 $(this).append(buttonHtml).append(ulHtml);
                	 $(this).find('ul.slectbox').html(liHtml);
                	 if( isSelect ) {
                		 $(this).find('button.btn').html('<span class="pull-left" style="color: black;">'+textCheck+'</span><span style="color: black; margin-top: 3px;" class="caret pull-right"></span>');
                	 } else {
                		 var textCheck = $('.div-select-box select option:first').text();
                		 $(this).find('button.btn').text(textCheck);
              
                	 }
            	 });
            	 
            	 $('.div-select-box').each( function() { // get width buton
            		 var wi = $(this).find('button').innerWidth();
            		 $( this).find('ul.slectbox').css('width', wi+'px');
            	 });
            	 
            	 $('.div-select-box .btn').on('click', function() { // click button event
            		var divParent = $( this).parent('.div-select-box');
            		 divParent.find('ul').fadeIn(250).animate({
            			 top: '30px'
        			  }, 250 );
            	 });
            	 
            	 $('ul.slectbox li').click( function() { //take value when click li
            		 var name = $( this ).text();
            		 var value = $( this ).attr('value');
            		 var divParent = $(this).parents('.div-select-box');
            		 
            		 $(divParent).find('button').html('<span class="pull-left" style="color: black;">'+name+'</span><span style="color: black; margin-top: 7px;" class="caret pull-right"></span>');
            		 $(divParent ).find('select').val(value);
            		 $(this).parent().fadeOut(250);
            	 });
            	 
            	 /*
            	  * Theme select event
            	  */
            	 $('.color-item').click( function() {
            			var theme = $(this).attr('theme');
            			$.loadTheme("publich/css/theme/"+theme+".css", "css");
            			setCookie("theme", theme, 30);
            	 }); 
            };
            
            /*
             * radio input
             */
            $.fn.radioBox = function( radioName) {
            	$('.div-radio label.'+radioName).click( function() {
            		var groupRadio = $("input[name = '"+radioName+"']");
            		var labelParent = $(groupRadio).parent('label');
            		labelParent.removeClass('act');
            		$(this).addClass('act');
            		$(labelParent).find('i').each( function() {
            			$(this).addClass('fa-circle-o').removeClass('fa-dot-circle-o'); 			
            		});
            		$(this).find('i').removeClass('fa-circle-o').addClass('fa-dot-circle-o');
            		var radio = $(this).find("input").prop("checked", true)// take value for radio
            		return false;
                 });	
            };
           
          
  })(jQuery);  

/*
 * Load theme
 */
$.loadTheme = function(filename, filetype) {
	if (filetype=="js"){ //if filename is a external JavaScript file
		  var fileref=document.createElement('script')
		  fileref.setAttribute("type","text/javascript")
		  fileref.setAttribute("src", filename)
	} else if (filetype=="css"){ //if filename is an external CSS file
		  var fileref=document.createElement("link")
		  fileref.setAttribute("rel", "stylesheet")
		  fileref.setAttribute("type", "text/css")
		  fileref.setAttribute("href", filename)
	}
	if (typeof fileref!="undefined") document.getElementsByTagName("head")[0].appendChild(fileref);
	 
};

 /*
 * Theme Cookie 
 */
function setCookie(cname,cvalue,exdays) {
	    var d = new Date();
	    d.setTime(d.getTime() + (exdays*24*60*60*1000));
	    var expires = "expires=" + d.toGMTString();
	    document.cookie = cname+"="+cvalue+"; "+expires;
}

function getCookie(cname) {
	    var name = cname + "=";
	    var ca = document.cookie.split(';');
	    for(var i=0; i<ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') c = c.substring(1);
	        if (c.indexOf(name) != -1) {
	            return c.substring(name.length, c.length);
	        }
	    }
	    return "";
}

$.checkCookie = function() {
   var theme = getCookie("theme");
   if (theme != "") {
       $.loadTheme("publich/css/theme/"+theme+".css", "css");
   } 
}


/*
 * Media => Run()
 */
$(document).ready(function(){
	  $("*").mediacareFlash( 1);
	  $.checkCookie();
});



