$.fn.tbFixed = function(col) {
    //this.css( "color", "green" );
    $('table.tb-body tr:eq( 0 ) td').each( function(index, obj) {
            var wi = $( this).width();
            if(index !=(col-1) ){
                $("table.tb-head th:eq( "+index+" )").width(wi);
            }
       });
};