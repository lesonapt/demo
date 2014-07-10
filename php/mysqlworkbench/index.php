<?php
defined('APPLICATION_PATH') 
	||	define('APPLICATION_PATH', realpath(dirname(__FILE__).'/application'));
defined('APPLICATION_ENV') 
	||	define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'developer'));
defined('TEMPLATES_PATH')
    || define('TEMPLATES_PATH', realpath(dirname(__FILE__) . '/templates/client'));
$templateName = 'default';
defined('TEMPLATE_FOLDER')
    || define('TEMPLATE_FOLDER', TEMPLATES_PATH . '/' . $templateName);
defined('TEMPLATE_URL')
    || define('TEMPLATE_URL', '/templates/client/' . $templateName);
set_include_path(implode(
				PATH_SEPARATOR, array(
				realpath(APPLICATION_PATH . '/../library'),
				realpath(APPLICATION_PATH . '/models'),
				get_include_path(),
				)));
require_once 'Zend/Application.php';
$environment = APPLICATION_ENV;
$options = APPLICATION_PATH . '/configs/application.ini';
$appliction = new Zend_Application($environment, $options);
$appliction->bootstrap()->run();