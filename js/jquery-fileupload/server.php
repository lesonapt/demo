
<?php
    
    print_r($_FILES);
    //print_r($_POST);

   // if( isset($_FILES['file']) ) {
//        if ($_FILES["file"]["error"] > 0) {
//          echo "Error: " . $_FILES["file"]["error"] . "<br>";
//        } else {
//          echo "Upload: " . $_FILES["file"]["name"] . "<br>";
//          echo "Type: " . $_FILES["file"]["type"] . "<br>";
//          echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
//          echo "Stored in: " . $_FILES["file"]["tmp_name"];
//          
//          $csv = array_map('str_getcsv', file( $_FILES["file"]["tmp_name"] ));
//          var_dump( $csv );
//          
//        }
//    } else {
//        
    
?>
    <!--
    <form action="server.php" method="post"
        enctype="multipart/form-data">
        <label for="file">Filename:</label>
        <input type="file" name="file" id="file"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    ->
<?php //} ?>