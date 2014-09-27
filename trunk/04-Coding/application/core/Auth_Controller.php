<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth_Controller
 *
 * @author sochy
 */
class Auth_Controller extends CI_Controller{
    //put your code here
    
    var $module = null;
    var $controller = null;
    var $function = null;
    var $user = null;
    var $userid = null;
    var $groupid = null;
    
    
    
    function __construct(){
        parent::__construct();
        $this->load->model(array('users/m_auth'));
        if($this->m_auth->isSignin()){
            $this->user = $this->user = $this->session->userdata('user');
            $this->userid = $this->user['use_id'];
            $this->groupid = $this->user['usegro_groupid'];
            $this->module = $this->uri->segment(1);
            $this->controller = ($this->uri->segment(2)=='')?$this->uri->segment(1):$this->uri->segment(2);
            $this->function = ($this->uri->segment(3)=='')?'index':$this->uri->segment(3); 
            $this->getAuthorize();
        }
        else{
            redirect('users/auth/signin');
        }
    }
    
    function getAuthorize(){
        
        if(!$this->m_auth->isAuthorized($this->userid, $this->groupid, $this->function, $this->controller, $this->module)){
            redirect('users/auth/index');
        }
    }
}
