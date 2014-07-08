<?php

class Admin_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        include 'LAS.php';
        $las = new LAS();
        $string = $las->returnString();
        echo $string;
    }


}

