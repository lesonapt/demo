<?php
class Admin_IndexController extends Zend_Controller_Action {
	public function init() {
		Zend_Layout::startMvc(array(
				'layoutPath' => APPLICATION_PATH . '/templates/admin/default'
			,	'layout' => 'index'								
		));
	}
	public function indexAction() {
		
	}
}