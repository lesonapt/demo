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
            	
            	
            	$('.div-radio label').click( function() {
                    var divParent = $(this).parent('.div-radio');
                    divParent.find('label').removeClass('act');
                    $(this).addClass('act');
                    //divParent.hide();
                    var currentRadio = divParent.find('i.fa-dot-circle-o').removeClass('fa-dot-circle-o').addClass('fa-circle-o');
                    var radio = $(this).find('input[type="radio"]');
                    var icon = $(this).find('i');
                    icon.removeClass('fa-circle-o').addClass('fa-dot-circle-o');
                 });	
            	 $('.sw').click( function() {
                      if ( $( this ).find('.pr').css('margin-left') === '-80px' ) {
                          $( this).find('.pr').css('margin-left', '0px');
                          $( this).find('input').prop('checked', true);
            
                      } else {
                          $( this).find('.pr').css('margin-left', '-80px');
                          $( this).find('input').prop('checked', false);
                      }
          
                  }); 
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
            	 /*select box*/
            	 
            	 var buttonHtml = '<button class="btn btn-info" style="text-align: left; width: 80%; height: 31px;"></button>'; 
            	 
            	 
            
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
            		//append button + ul
                	 $(this).append(buttonHtml).append(ulHtml);
                	 $(this).find('ul.slectbox').html(liHtml);
                	 if( isSelect ) {
                		 $(this).find('button.btn').html('<span class="pull-left" style="color: black;">'+textCheck+'</span><span style="color: black; margin-top: 7px;" class="caret pull-right"></span>');
                	 } else {
                		 var textCheck = $('.div-select-box select option:first').text();
                		 $(this).find('button.btn').text(textCheck);
              
                	 }
            	 });
            	 
            	
            	 
            	
            	// get width buton
            	 $('.div-select-box').each( function() {
            		 var wi = $(this).find('button').innerWidth();
            		 $( this).find('ul.slectbox').css('width', wi+'px');
            	 });
            	 
            	 
            	
            	
            	 $('.div-select-box .btn').on('click', function() {// click button event
            		var divParent = $( this).parent('.div-select-box');
            		 divParent.find('ul').fadeIn(250).animate({
            			 top: '30px'
        			  }, 250 );
            	 });
            	 //take value when click li
            	 
            	 $('ul.slectbox li').click( function() {
            		 var name = $( this ).text();
            		 var value = $( this ).attr('value');
            		 var divParent = $(this).parents('.div-select-box');
            		 
            		 $(divParent).find('button').html('<span class="pull-left" style="color: black;">'+name+'</span><span style="color: black; margin-top: 7px;" class="caret pull-right"></span>');
            		 $(divParent ).find('select').val(value);
            		 $(this).parent().fadeOut(250);
            	 });
            };
  })(jQuery);  

  
  $(document).ready(function(){
	  $("*").mediacareFlash( 1);
  });



