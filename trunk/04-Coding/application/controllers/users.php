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
class users extends CI_Controller{
    //put your code here
    var $data = null;
    
    function index(){
        $this->data['title'] = 'Welcome to SNSMS';
        $this->load->view('layout',  $this->data);
    }
    
    function ajax(){
        echo json_encode(array(
            array(1,2,3),
            array('Sochy','Vongkol'),
        ));
    }
}
