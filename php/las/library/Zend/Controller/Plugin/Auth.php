<?php
/**
 +====================================
 | Project: FreeSale
 +====================================
 | > Date started: 2013/08/12
 | > Author: Pham Tien Hoang
 | > Version : 1.1.0
 | > Modified by : Pham Tien Hoang
 | > Modified Date : 2013/10/08
 +====================================
 */
class Zend_Controller_Plugin_Auth extends Zend_Controller_Plugin_Abstract{
	private $allow = array(
		'pass-reset',
		'pass-reset2',
		'PassReset',
		'refresh-capt',
		'send-mail',
		'pass-reset-send',
		'Pass-Reset',
		'send-mail2',
		'captcha',
		'send',
		'resetpass'
	);
	public function preDispatch(Zend_Controller_Request_Abstract $request){
		$error = false;
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			$error = true;
		}else{
			$user = Zend_Auth::getInstance()->getIdentity();
			if(!isset($user['user_id'])){
				$error = true;
			}
		}
		if( in_array($request->getControllerName(), $this->allow)) {
		    $error = false;
		}
		if($error){
			$request->setModuleName('default');
			$request->setControllerName('login');
			$request->setParam('backurl', $_SERVER['REQUEST_URI']);
		}
	}
}