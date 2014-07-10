<?php

class UserController extends Zend_Controller_Action
{
	public $model;
	public $user;
	public function init(){
    	$this->model = new Model_DAO();
	    $auth = Zend_Auth::getInstance();
	    $this->user = $auth->getIdentity();
    	$this->view->user = $this->user;
    }
    
    public function indexAction(){
    	$this->view->user_act = 'active';
    	if($this->user['Permission'] >= 90){
	    	$this->view->title = "User Management";
	    	$data = $this->model->executesp('m0010_inq100');
	    	if($this->model->dataSetCheck($data, 0)){
	    		$this->view->data = $data[0];
	    	}
    	}else{
			$this->_helper->redirector('index', 'customer', 'client');
    	}
    }
    
    public function saveAction(){
		$this->_helper->viewRenderer->setNoRender();
    	$params = array(
    			$this->_getParam('UserId')
    		,	$this->_getParam('Password')
    		,	$this->_getParam('PermissionCode')
    		,	$this->_getParam('PcId')
    		,	$this->_getParam('PcName')
    		,	$this->_getParam('Language')
    		,	$this->_getParam('Cnt')
    		,	$this->user['UserId']
    		,	$_SERVER['REMOTE_ADDR']
    	);
    	try{
	    	$res = $this->model->executesp('m0010_act100', $params);
	    	if($this->model->dataSetCheck($res, 0)){
	    		echo $res[0][0]['Code'].'|'.$res[0][0]['Data'].'|'.$res[0][0]['Message'];
	    	}else{
	    		echo '0|0|0';
	    	}
    	}
    	catch(Exception $ex){
    		echo '1||Cannot complete request!';
    	}
    	die;
    }
}