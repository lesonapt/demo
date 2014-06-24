<?php

# dequi option

	function dequi($prid, $data, $string='', $space='', $aa){
	    $arr = array();
        $n=0;
		foreach($data as $key=>$row){	    
			if($row['parent_id'] == $prid){
			   // $n = $prid;
                //echo $n.'<br>';
                $aa++;
                $n++;
               
                echo '<li>'.$row['name'].'--'.$n.'-'.$aa.'</li>';
                //$arr[$aa] = $row;
                //echo $row['name'];die;
                //$arr[$key] = $row;
              //  $string.='<li value="'.$row['id'].'">['.$row['id'].']'.$space.$row['name'].'</li>';
                //var_dump($row);
                $lo[$aa] = dequi($row['id'], $data, $string, $space.'--&nbsp', $aa);
                //$arr = $row;
			}
		}
	
       //return $lo;
		
	}
$data = array(
        array('id'=> 1, 'name' => 'Apple', 'parent_id' => 0), 
        array('id'=> 2, 'name' => 'Iphone', 'parent_id' => 1), 
        array('id'=> 3, 'name' => 'Ipad', 'parent_id' => 1),
        array('id'=> 4, 'name' => 'Samsung', 'parent_id' => 0),
        array('id'=> 5, 'name' => 'Ipod', 'parent_id' => 1),
        array('id'=> 6, 'name' => 'Mac', 'parent_id' => 1), 
         
   
    );
    echo '<ul>';
    $las = dequi(0, $data, '', '', 0);
    echo '</ul>';
//var_dump($las);

