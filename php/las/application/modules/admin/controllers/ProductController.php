<?php

class Admin_ProductController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	  $muser= new Model_User;
        $data=$muser->listall();
        echo "<pre>";
        print_r($data);
        echo "</pre>";
 
    }


}

