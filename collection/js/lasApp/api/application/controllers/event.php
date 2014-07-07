<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Event extends CI_Controller {
	public function __construct()
	{
       echo 'event';
       $this->load->model('mod_spend');  
	}
    function ll(){
        echo 'lll';
    }
    function get(){
        $data = array(
        	array("user_id" =>1, "name" =>"do home work","date" =>"10-11-2013", "status" => 1),
        	array("user_id" =>1, "name" =>"clean bathroom","date" =>"5-01-2013", "status" => 0),
        	array("user_id" =>2, "name" =>"Go sleep","date" =>"10-11-2013", "status" => 1),
        	array("user_id" =>1, "name" =>"Breakfirst","date" =>"10-11-2012", "status" => 1),
        	array("user_id" =>3, "name" =>"cook","date" =>"10-11-2013", "status" => 1),
        	array("user_id" =>4, "name" =>"Swming","date" =>"10-11-2013", "status" => 1),
        	array("user_id" =>2, "name" =>"Fuck","date" =>"10-11-2013", "status" => 1),
        	array("user_id" =>5, "name" =>"Get out","date" =>"10-09-2013", "status" => 1),
        	array("user_id" =>6, "name" =>"Wake up","date" =>"10-11-2013", "status" => 1),
          );
    	echo json_encode($data);
    }
    function remove($id) {
       echo $id;
    }
    
    function update($id){
        var_dump($this->lang_app);
    }
    function clean(){
        $this->session->unset_userdata('is_load_modules');
        $this->session->unset_userdata('lang');
        $this->session->unset_userdata('is_load_lang_system');
    }
    function la() {
        $data['lang'] = $this->lang;
        $data['data'] = $this->modules;	                  
	    $this->load->render('frontend/pages/home',$data,'frontend/las_layout');
    }
    
    function md_cats($params){
        $data['md_setting'] = $this->md_setting('md_cats');
        //$data['params'] = $params;
        $this->load->view('frontend/modules/md_cats',$data);
    }
    function md_new($params){
        echo 'md_new';
        //$this->load->view('modules/md_new');
    }
    
    function test() {
        redirect(site_url().'admin/login');
   	   // $this->load->view('welcome_message');
    }

}
