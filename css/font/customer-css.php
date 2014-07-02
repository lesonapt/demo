<!DOCTYPE HTML>
<html>
<head>

	<meta name="author" content="GallerySoft.info" />
	<title>Customer-css</title>
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/flat-ui.css" rel="stylesheet" />
    <script src="/jquery-1.11.0.min.js"></script>
    <style>
        .div-radio label{
            margin-right: 20px;
            position: relative;
        }
        .div-radio label i{
            font-size: 20px;
        }
        .div-radio label input, .div-radio label i{ 
            position: absolute;
            left: 0px;
        }
        .div-radio label input[type="radio"] {
            opacity: 0;
        }
        .div-radio span.span-label {
            margin-left: 18px;
        }
        .email-address:before {
           content: "Full name: ";
        }
        .div-radio label:hover i:before{
           content: "\f192";
        }
        
        label,i, span {
            transition: color 1s;
        }
        label i,  span{
            color: #bdc3c7 ;
        }
        label.act span, label.act i.fa { color: #1ABC9C;}
        

        .sw {
            background: red;
            border-radius: 10px;
            width: 100px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }
        .sw .pr {
            width: 200px;
            position: relative;
            transition: all 0.5s;
        }
        .sw input{
            position: absolute;
        }
        .sw .switch-left, .sw .switch-right{
            position: relative;
            width: 100px;
            float: left!important;
        }
        .sw .switch-left {
            background: green;          
        }
        .sw .switch-right {
            background: black;
        }
        .clr {
            clear: both;
        }
        .login {
            width: 100px;
            height: 200px;
            background: #eee;
            border-radius: 10px;
            margin: auto;
        }
        .login:before {
            
            position: absolute;
            content:'';
            left: -24px;
            border: 12px solid;
            border-color: transparent #eee transparent transparent;
        }
        
    </style>
    <script type="text/javascript">
        ( function($){
             $.vari = "$.vari-1";
             $.fn.vari = "$.fn.vari-2";
             //$.fn is the object we add our custom functions to
            $.fn.DoSomethingLocal = function( las ){
                alert( las );
                return this.each(function()
                {
                    alert(this.vari); // would output `undefined`
                    alert($(this).vari); // would output `$.fn.vari`
                });
            };
        })(jQuery);
      
        // $ is the main jQuery object, we can attach a global function to it
        $.DoSomethingGlobal = function()
        {
             //$.variq  = 'asd';
             alert("Do Something Globally, where `this.vari` = " + this.vari);
        };
        
    
        $( function() {
            $.DoSomethingGlobal();
        });
        //$(document).ready(function(){
//            $(".div-radio").DoSomethingLocal( 1);
//            //$.DoSomethingGlobal();
//            //$(".div-radio").DoSomethingGlobal();
//        });
                
        
        
        
        $( function() {
            init();
        });
        function init() {
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
             // check box
             $('.sw').click( function() {
                
                if ( $( this ).find('.pr').css('margin-left') === '-100px' ) {
                    $( this).find('.pr').css('margin-left', '0px');
                    $( this).find('input').prop('checked', true);
      
                } else {
                    $( this).find('.pr').css('margin-left', '-100px');
                    $( this).find('input').prop('checked', false);
                }
    
             });
               
        }
    </script> 
</head>
<style>

</style>
<body>

   <div>
        <div style="background: red; width: 200px; float: left; margin-left: -100px; position: relative;">asds</div>
        <div style="background: blue; width: 200px; float: left; position: relative;">asds</div>
        <div class="clr"></div>
   </div>
   
    <div class="form-group">
	        	<input type="text" value="" placeholder="Inactive" class="form-control">
        	</div>
    
    <div class="div-radio"> 
        <label class="act">
            <input type="radio" name="sex" />
            <i class="fa fa-dot-circle-o "></i><span class="span-label">Male</span>
        </label>
        <label>
            <input type="radio" name="sex" />
            <i class="fa fa-circle-o"></i><span class="span-label">Fmale</span>
        </label>
        <label>
            <input type="radio" name="sex" />
            <i class="fa fa-circle-o"></i><span class="span-label">Other</span>
        </label>
    </div>
    <div>
    
        <div class="sw"> 
            <input type="checkbox" checked="" >
            <div class="pr">
                <div class="switch-left">
                    <span>ON</span><span><i class="fa fa-circle"></i> </span>
                </div>
                <div class="switch-right">
                    <span><i class="fa fa-circle"></i></span><span>OFF</span>
                </div>
                <div class="clr"></div> 
            </div>
        </div>
    </div>
    <div style="position: relative;">
        <div class="login">
            asdasd
        </div>
    </div>

</body>
</html>