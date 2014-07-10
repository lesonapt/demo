<?php

class IndexController extends Zend_Controller_Action
{
	public $model;
	public function init(){
    	$this->model = new Model_DAO();
    }
    
    public function indexAction(){
		//$this->_helper->redirector('index', 'customer', 'client');
        $this->view->title = 'lesonapt';
        $this->view->index_act = 'active';
    }
    
    public function loginAction(){
	    $auth = Zend_Auth::getInstance();
	    if ($auth->hasIdentity()) {
    		$auth->clearIdentity();
	    }
    	$this->_helper->layout()->setlayout('basic');
    	$this->view->backurl = $this->_getParam('backurl');
    }
    

    
    public function signinAction(){
		$this->_helper->viewRenderer->setNoRender();
    	$params = array(
    			$this->_getParam('UserId')
    		,	$this->_getParam('Password')
    	);
    	try{
    		$storage = Zend_Auth::getInstance()->getStorage();
 	    	$res = $this->model->executesp('spc_login', $params);
            if( isset($res[0][0]) ) {
                if(count($res[0][0]) != 0) {
                    $storage = Zend_Auth::getInstance()->getStorage();
                    $dataLogin = array(	
                                        'isLog' => 1	
                                      , 'UserId'=> $res[0][0]['user_id']
     			    		          ,	'Permission'=> $res[0][0]['user_role']);
     			    $storage->write( $dataLogin );
                    echo json_encode( $dataLogin );
                } else {
                    echo json_encode(array('isLog' => 0));
                }
            } else {
                echo json_encode(array('isLog' => 0));
            }	
    	}
    	catch(Exception $ex){
    		echo '-1||Cannot complete request!';
    	}
    	die();
    }
}