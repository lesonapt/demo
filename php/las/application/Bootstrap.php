<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	public function _initAutoload(){
	
		$front = Zend_Controller_Front::getInstance();
		$front->registerPlugin(new Zend_Controller_Plugin_ErrorHandler(array(
				'module'     => 'error',
				'controller' => 'error',
				'action'     => 'error'
		)));
		
		$autoloader = new Zend_Application_Module_Autoloader(array(
				'namespace' => '',
				'basePath' => dirname(__FILE__),
		));
		return $autoloader;
		
	}
	
	protected function _initDatabase() {
		$db = $this->getPluginResource('db')->getDbAdapter();
		Zend_Registry::set('db', $db);
	}
	/*
	 * load plugin from boostrap if no load form application.ini
	 */
	protected function _initLoadPlugin() {
		$front = Zend_Controller_Front::getInstance();
		$front->registerPlugin(new Plugins_Myplugin() );	
	}
	
}

