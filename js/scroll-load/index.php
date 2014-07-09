<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="GallerySoft.info" />
    
	<title>Untitled 1</title>
        <script src="/jquery-1.11.0.min.js"></script>
        <script type="text/javascript">
           
           $(document).ready(function() {
    var track_load = 0; //total loaded record group(s)
    var loading  = false; //to prevents multipal ajax loads
    var total_groups = <?php echo 1; ?>; //total record group(s)
    
    //$('#results').load("autoload_process.php", {'page':track_load}, function() {track_load++;}); //load first group
    
    $(window).scroll(function() { //detect page scroll
        var hi1 = $(window).scrollTop();
        var hi2 = $(window).height();
        var hi3 = $(document).height();
        
        console.log(hi1);
        console.log(hi2);
        console.log(hi3);
        return false;
        if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
        {
     
            if(track_load <= total_groups && loading==false) //there's more data to load
            {
                loading = true; //prevent further ajax loading
                $('.animation_image').show(); //show loading image
                
                //load data from the server using a HTTP POST request
                $.post('autoload_process.php',{'group_no': track_load}, function(data){
                                    
                    $("#results").append(data); //append received data into the element

                    //hide loading image
                    $('.animation_image').hide(); //hide loading image once data is received
                    
                    track_load++; //loaded group increment
                    loading = false; 
                
                }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                    
                    alert(thrownError); //alert with HTTP error
                    $('.animation_image').hide(); //hide loading image
                    loading = false;
                
                });
                
            }
        }
    });
});
           
           function a(){
           console.log('a');
            
            b();
           }
           function b(){
            console.log('b');
           }
           
        </script>
</head>

<body style="height: 1000px;">
    <button onclick="a();">click</button>

</body>
</html>