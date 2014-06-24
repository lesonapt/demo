<?php
    if( isset($_FILES) ) {
       
        //var_dump($_FILES) ;
        $tmp =   $_FILES['file_0']['tmp_name']; 
        //var_dump($_FILES);
        $csv = array_map('str_getcsv', file( $tmp ));
        var_dump( $csv );
    } else {
        die (1);
    } 
    
