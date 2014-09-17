<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of functions
 *
 * @author sochy
 */
class Functions extends CI_Controller{
    //put your code here
    
    function __construct(){
        
        parent::__construct();
        $this->load->model(array('m_function'));
    }
    
    public function index(){
        $this->data['title'] = 'Function';
        $this->data['content'] = 'users/functions/index';

        $this->form_validation->set_rules('tas_name', '', 'trim|required');
        $this->form_validation->set_rules('tas_function', '', 'trim|required');

        $this->form_validation->run();
        $this->data['data'] = $this->m_function->findAllFunctions(PAGINGATION_PERPAGE, $this->uri->segment(4));
        $this->data['controllers'] = $this->m_global->getDataArray(TABLE_PREFIX . 'controllers', 'con_id', 'con_name');
        $this->data['modules'] = $this->m_global->getDataArray(TABLE_PREFIX . 'modules', 'mod_id', 'mod_name');
        pagination_config(base_url() . $this->data['content'], (int)$this->m_function->countAllFunctions(), (int)PAGINGATION_PERPAGE);
        $this->load->view(LAYOUT, $this->data);
    
    }
}
