$(document).ready(function() {
   getHeightNavLeft();
  // setPositionMsg();     
});


function screenPosition() {
    
    //var w=window.innerWidth;
//    var h=window.innerHeight;
//    $('#screen').css({
//        height : '109px',
//        width  : w+'px'
//    });
}



//function popup(popup_name){
//   	$('.div-popup').css({
//		left:($(window).width()-$('.'+popup_name).innerWidth())/2+'px',
//		top :($(window).height()-$('.'+popup_name).innerWidth())/2+'px'       
//	});
//}

function popup(popup_name){
   	$('.div-popup').css({
		left:(window.innerWidth-$('.'+popup_name).innerWidth())/2+'px',
		top :(window.innerHeight-$('.'+popup_name).innerWidth())/2+'px'       
	});
}

function confirmPopup() {
    $('.div-popup').css({
		left:(window.innerWidth  - $('.div-popup').innerWidth())/2+'px',
		top :(window.innerHeight - $('.div-popup').innerWidth())/2+'px'       
	});
 
}

function setPositionMsg() {
    $('#msg_popup').css({
		left:($(window).width()-$('#msg_popup').innerWidth())/2+'px',
		top :'50px'       
	});
}
function getHeightNavLeft() {
    hi = $(window).height();
    var w=window.innerWidth;
    var h=window.innerHeight;
    n = h-50;
    $('.las-home-body-left').css('height',n+'px');
}

function msgTimeout(text) {
    $('.msg-popup').css({
		left:(window.innerWidth  - $('.msg-popup').innerWidth())/2+'px',
		top :'50px'      
	});
    $('.msg-popup').html(text);
    $('.msg-popup').fadeIn(1000);
    var timer =  setTimeout(function(){
        $('.msg-popup').fadeOut(1000);
        clearTimeout(timer);
    }, 3000);
}

function msgLoading(text) {
    $('.msg-popup').html(text);
    $('.msg-popup').fadeIn(0);
    $('.msg-popup').css({
		left:(window.innerWidth  - $('.msg-popup').innerWidth())/2+'px',
		top :'50px'      
	});
}

function msgEndloading(text) {
    $('.msg-popup').html(text);
    var timer =  setTimeout(function(){
        $('.msg-popup').fadeOut(500);
        clearTimeout(timer);
    }, 3000);
}





