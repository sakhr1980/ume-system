<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of studnets
 *
 * @author sochy
 */
class Students extends CI_Controller{
    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');
    public function __construct(){
        parent::__construct();
        $this->load->model(array('m_attendant'));
        
    }
    
    /**
     * Access defult module
     */
    public function index(){
        redirect('attendants/students/lists');
    }
    
    /**
     * List attendants
     */
    public function lists(){
        $this->data['title'] = 'Manage student attendant';
        $this->data['content'] = 'attendants/students/index';
        
        
        $this->load->view(LAYOUT, $this->data);
    }
    
    /**
     * Add student attendants 
     */
    public function add(){
        $this->data['title'] = 'Add student attendant';
        $this->data['content'] = 'attendants/students/add';
        
        $this->data['classes'] = $this->m_attendant->getClasses();
        $this->load->view(LAYOUT, $this->data);
    }
}
