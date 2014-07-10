<?php

class CustomerController extends Zend_Controller_Action
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
    	$this->view->title = "Customer Management";
        $this->view->customer_act = 'active';
    	$keyword = $this->_getParam('keyword');
    	if(!isset($keyword))
    		$keyword = '';
    	$this->view->keyword = $keyword;
    	$data = $this->model->executesp('m0020_inq100', array());
    	if($this->model->dataSetCheck($data, 0)){
    		$this->view->data = $data[0];
    	}
        //var_dump($data[0]);die();
    }
    
    public function editAction(){
    	$this->view->title = "Customer Info Editing";
    	$id = $this->_getParam('id');
    	if($this->_getParam('keyword') != '')
    		$this->view->keyword = $this->_getParam('keyword');
    	if($id != '' && intval($id) > 0){
    		$data = $this->model->executesp('m0020_inq101', array($id));
	    	if($this->model->dataSetCheck($data, 0)){
	    		$this->view->data = $data[0];
		    	$staffs = $this->model->executesp('m0021_inq100', array($id));
		    	if($this->model->dataSetCheck($staffs, 0)){
		    		$this->view->staffs = $staffs[0];
		    	}
		    	$this->view->customerId = $id;
	    		$this->view->mode = 'edit';
	    	}else{
    			$this->view->mode = 'add';
	    	}
    	}else{
    		$this->view->mode = 'add';
    	}
    }
    
    public function deleteAction(){
		$this->_helper->viewRenderer->setNoRender();
		$params = array(
				$this->_getParam('list')
			,	$this->_getParam('cnt')
    		,	$this->user['UserId']
    		,	$_SERVER['REMOTE_ADDR']
		);
		try{
			$res = $this->model->executesp('m0020_del100', $params);
	    	if($this->model->dataSetCheck($res, 0)){
	    		echo $res[0][0]['Code'].'|'.$res[0][0]['Data'].'|'.$res[0][0]['Message'];
	    	}else{
	    		echo '0|0|0';
	    	}
		}catch(Exception $ex){
    		echo '1||Cannot complete request!';
    	}
    	die;
    }
    
    public function saveAction(){
		$this->_helper->viewRenderer->setNoRender();
    	$params = array(
    			$this->_getParam('mode')
    		,	$this->_getParam('id')
    		,	$this->_getParam('name')
    		,	$this->_getParam('kanaName')
    		,	$this->_getParam('shortName')
    		,	$this->_getParam('postCode')
    		,	$this->_getParam('address1')
    		,	$this->_getParam('address2')
    		,	$this->_getParam('tel')
    		,	$this->_getParam('fax')
    		,	$this->_getParam('customerNote')
    		,	$this->_getParam('staffId')
    		,	$this->_getParam('staffName')
    		,	$this->_getParam('staffNameKana')
    		,	$this->_getParam('staffDepartment')
    		,	$this->_getParam('staffEmail')
    		,	$this->_getParam('staffPosition')
    		,	$this->_getParam('staffNote')
    		,	$this->_getParam('cnt')
    		,	$this->user['UserId']
    		,	$_SERVER['REMOTE_ADDR']
    	);
		try{
			$res = $this->model->executesp('m0020_act100', $params);
	    	if($this->model->dataSetCheck($res, 0)){
	    		echo $res[0][0]['Code'].'|'.$res[0][0]['Data'].'|'.$res[0][0]['Message'];
	    	}else{
	    		echo '0|0|0';
	    	}
		}catch(Exception $ex){
    		echo '1||Cannot complete request!';
    	}
    	die;
    }
}