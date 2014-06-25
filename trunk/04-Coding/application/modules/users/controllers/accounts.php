<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
class Accounts extends CI_Controller{
    //put your code here
    var $data = array('title'=>null, 'view'=>'missing_view');
    
    function index(){
        $this->data['title'] = 'User Accounts';
        $this->data['view'] = 'users/accounts/index';
        $this->load->view(LAYOUT,  $this->data);
    }
}
