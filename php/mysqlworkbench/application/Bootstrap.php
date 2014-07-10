<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
	protected function _initAutoload() {
		$resourceLoader = new Zend_Loader_Autoloader_Resource(array(
				'basePath' => APPLICATION_PATH,
				'namespace' => '',
				'resourceTypes' => array(
						'form' => array(
								'path' => 'forms/',
								'namespace' => 'Form_'
						),
						'model' => array(
								'path' => 'models/',
								'namespace' => 'Model_'
						)
				)
		));
		Zend_Session::start();
		Zend_Layout::startMvc();
	}
	protected function _initDatabase(){
		$db = $this->getPluginResource('db')->getDbAdapter();
		Zend_Registry::set('db', $db);
	}
	
}