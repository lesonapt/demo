<?php
//if(isset($lang)){echo $lang;}
if(isset($data)){var_dump($data->result());}

//$this->load->module('home/md_new',array('id' => 'new001'));
$this->load->module('home/md_cats', array('id' => 'cat001'));
?>