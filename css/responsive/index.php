<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="laslas" />

	<title>table fixed header</title>
</head>
<!--
<link rel="stylesheet" type="text/css"  href="bootstrap.css"/>
<link rel="stylesheet" type="text/css"  href="bootstrap-theme.css"/>
-->
<style>
@charset "utf-8";
/* CSS Document */



h1, {
    font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
    font-size: 1.625em;     
}

h2 {
    font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
    font-size: 1.25em;  
}

h3 {
    font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
    font-size: 1.1em;  
}

#blog {
	width:1020px;
	margin:0 auto;
	padding:10px;
	background-color:#D2EEEB;
}

#blog .article {
	width:800px;
	float:right;
	padding:5px;
	background-color:#E3FDF8;
	
}

#blog .aside {
	width:180px;
	float:left;
	padding:5px;
	background-color:#A5F1EA;
}

#blog p {
	font-family:Georgia, "Times New Roman", Times, serif;
	font-size:14px;
}
	

#blog_rwd {
	width:60.714285714285714285714285714286%; /*Assume the native width of browser window is 1680px */
	margin:0 auto;
	padding:0.98039215686274509803921568627451%;
	background-color:#D2EEEB;
}

#blog_rwd .article_rwd {
	width: 78.431372549019607843137254901961%;
	float:right;
	padding-right:0.49019607843137254901960784313725%;
	background-color:#E3FDF8;
	
}

#blog_rwd .aside_rwd {
	width:17.647058823529411764705882352941%;
	float:left;
	padding-left:0.49019607843137254901960784313725%;
	background-color:#A5F1EA;
}

#blog_rwd p {
	font-family:Georgia, "Times New Roman", Times, serif;
	font-size:.875em;
}

@media screen and (max-width:480px) {
    #blog_rwd {
        float: none;
        width: 92.431372549019607843137254901961%;
        background-color:#FFB3B3;
    }
    body {
        background: red;
    }
}


@media (min-width:481px) and (max-width:830px) {
    #blog_rwd .aside_rwd{
        float: left;
        width: 98%;
        background-color:#95C9E8;
        margin-top:5px;
    }
    body {
        background: green!important;
    }
}

@media (min-width:831px) and (max-width:1200px) {
    #blog_rwd .article_rwd{
        float: left;
        width: 98%;
        background-color:#B0E6C6;
        margin-top:10px;
    }
    body {
        background: blue!important;
    }
}
@media screen and (min-width:1201px) {
    #blog_rwd {
        float: none;
        width: 92.431372549019607843137254901961%;
        background-color:#FFB3B3;
    }
    body {
        background: black;
    }
}


</style>

<body>

    <div class="container-fluid table-responsive" style="margin-top: 100px;">
        
        <table class="table table-bordered tb-head">
            <thead>
                <tr>
                    <th>header1</th>
                    <th>header2</th>
                    <th>header3</th>
                    <th>header4</th>
                    <th>header5</th>
                </tr>
            </thead>
        </table>
        <div class="las">
            <table class="table table-bordered tb-body">
                <tbody>

                    
                            <?php for($i=0; $i<10; $i++): ?>
                            <tr>
                                <td>td1 anh yeu em </td>
                                <td>an yeu em </td>
                                <td>nhieu alm </td>
                                <td>em co biet ko</td>
                                <td>ha me ye</td>
                            </tr>
                            <?php endfor; ?>
                
                    
                </tr>
                
            </tbody>
            </table>
        </div>
            
        </table>
    </div>



</body>

<script src="jquery-1.11.0.min.js"></script>
<script src="las-plugin.js"></script>
<script type="text/javascript">
    $( function (){
       $( "table" ).tbFixed(5); 
    });
    $( window ).resize(function() {
       $( "table" ).tbFixed(5); 
    });
    function getwidth() {
        
    }
</script>
</html