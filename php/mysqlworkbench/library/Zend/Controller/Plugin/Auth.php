<?php
class Zend_Controller_Plugin_Auth extends Zend_Controller_Plugin_Abstract{
	public function preDispatch(Zend_Controller_Request_Abstract $request){
		if (!Zend_Auth::getInstance()->hasIdentity() && !$request->isPost()) {
			$request->setModuleName('client');
			$request->setControllerName('index');
			$request->setActionName('login');
			$request->setParam('backurl', $_SERVER['REQUEST_URI']);
		}
	}
}