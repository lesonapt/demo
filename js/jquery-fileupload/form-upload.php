<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="laslas" />
    
	<title>Untitled 2</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        function upload(){
            var fd = new FormData();
            var file_data = $('input[type="file"]')[0].files; // for multiple files
            
            for(var i = 0;i<file_data.length;i++){
                fd.append("file_"+i, file_data[i]);
            }
            
            
            
            var other_data = $('form').serializeArray();

            $.each(other_data,function(key,input){
                fd.append(input.name,input.value);

            });
            return false;
            $.ajax({
                url: 'server2.php',
                data: fd,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data){
                    console.log(data);
                    $('.result').text( data );
                }
            });
        }
  	    
    </script>
</head>

<body>

    <form action="server.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file[]" multiple="" />
    </form>
    <button onclick="upload();">Submit</button>
    <div class="result"></div>
</body>
</html>