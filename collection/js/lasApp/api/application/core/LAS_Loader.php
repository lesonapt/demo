<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LAS_Loader extends CI_Loader
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function module($module = '', $params = array())
	{
		$module	= explode('/', $module);
		$method	= array_pop($module);
		$class	= array_pop($module);
		$class	= ucfirst($class);
		$path	= implode('/', $module);
		$path	= APPPATH.'controllers/'.((trim($path) != '')?(trim($path).'/'):'');
		$file 	= $path.strtolower($class).'.php';
		require_once $file;
		//require $file;
		if(is_file($file) && class_exists($class) && method_exists($class, $method))
		{
            //require_once $file;
			$obj = new $class();
			$obj->$method($params);			
		}
		return false;
	}
	
	public function render($view = '', $data = array(), $layout = '')
	{
		if(trim($view) != '' && is_file(APPPATH.'views/'.$layout.'.php'))
		{
			//$data['_js'] = $data['js'];
			//$data['_style'] = $data['style'];
			$data['_contents'] = $this->view($view, $data, true);
			return $this->view($layout, $data);
		}
        return false;
	}
  
	
}