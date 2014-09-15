<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users
 *
 * @author sochy.choeun
 */

class Auth extends CI_Controller {

    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');

    function __construct() {
        parent::__construct();
    }
    
    
    function index(){
        $this->data['title'] = 'No permission';
        $this->data['content'] = 'users/auth/index';
        $this->load->view(LAYOUT, $this->data);
    }
}
