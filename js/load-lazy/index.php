<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="GallerySoft.info" />

	<title>Lazy load</title>
    <script src="/jquery-1.11.0.min.js"></script>
    
    <script type="text/javascript">
       function lazyload() {
            var scriptTag = document.createElement('script'); 
            scriptTag.src = "las1.js"; // set the src attribute
            scriptTag.type = 'text/javascript'; // if you have an HTML5 website you may want to comment this line out
            scriptTag.async = true; // the HTML5 async attribute
            var headTag = document.getElementsByTagName('head')[0];
            headTag.appendChild(scriptTag);
        }
    </script>
</head>

<body onload="lazyload()">



</body>
</html>