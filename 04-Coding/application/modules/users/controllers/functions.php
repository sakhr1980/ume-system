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
    
    function add($pagination='') {
        $this->data['title'] = 'Add new functions';
        $this->data['content'] = 'users/functions/add';

        $this->form_validation->set_rules('tas_name', 'Module name', 'required|max_length[50]|min_length[2]');
        $this->form_validation->set_rules('tas_functionname', 'Function name', 'required|max_length[50]|min_length[2]|callback_uniqueAdd');
        $this->form_validation->set_rules('tas_controllerid', 'Controller', 'trim|required');
          $this->form_validation->set_rules('tas_moduleid', 'Status', 'trim');  
          $this->form_validation->set_rules('tas_status', 'Status', 'trim');  
        if ($this->form_validation->run() == FALSE) {
            $this->data['modules'] = $this->m_global->getDataArray(TABLE_PREFIX.'modules','mod_id','mod_foldername');
            $this->data['controllers'] = $this->m_global->getDataArray(TABLE_PREFIX.'controllers','con_id','con_controllername');
            $this->load->view(LAYOUT, $this->data);
        } else {

            
            if ($this->m_function->add()) {
                $this->session->set_flashdata('message', alert("Function has been saved!", 'success'));
                redirect('users/functions/index/'.$pagination);
            } else {
                $this->session->set_flashdata('message', alert("Function cannot be added, please try again", 'danger'));
                redirect('users/controllers/add/'.$pagination);
            }
        }
    }
    function edit($id=0,$pagination='') {
        $this->data['title'] = 'Edit functions';
        $this->data['content'] = 'users/functions/edit';

        $this->form_validation->set_rules('tas_name', 'Module name', 'required|max_length[50]|min_length[2]');
        $this->form_validation->set_rules('tas_functionname', 'Function name', 'required|max_length[50]|min_length[2]|callback_uniqueEdit');
        $this->form_validation->set_rules('tas_controllerid', 'Controller', 'trim|required');
          $this->form_validation->set_rules('tas_moduleid', 'Status', 'trim');  
          $this->form_validation->set_rules('tas_status', 'Status', 'trim');  
        if ($this->form_validation->run() == FALSE) {
            $this->data['data'] = $this->m_function->getFunctionById($id);
            $this->data['modules'] = $this->m_global->getDataArray(TABLE_PREFIX.'modules','mod_id','mod_foldername');
            $this->data['controllers'] = $this->m_global->getDataArray(TABLE_PREFIX.'controllers','con_id','con_controllername');
            $this->load->view(LAYOUT, $this->data);
        } else {

            if ($this->m_function->update()) {
                $this->session->set_flashdata('message', alert("Function has been changed!", 'success'));
                redirect('users/functions/index/'.$pagination);
            } else {
                $this->session->set_flashdata('message', alert("Function cannot be edit, please try again", 'danger'));
                redirect('users/controllers/edit/'. $id.'/'.$pagination);
            }
        }
    }
    
    function delete($id = 0, $pagination = '') {
        if ($id != 0) {
            if ($this->m_function->deleteFunctionById($id)) {
                $this->session->set_flashdata('message', alert("Function has been deleted.", 'success'));
                redirect('users/functions/index/' . $pagination);
            }
        } else {
            $this->session->set_flashdata('message', alert("Function cannot be deleted, please try again", 'danger'));
            redirect('users/functions/index/'.$pagination);
        }
    }
    
    /**
     * Validation
     * @param type $str
     * @return boolean
     * @param usage callback_uniqueAdd
     */
    function uniqueAdd($str) {

        $this->db->where('tas_functionname', $str);
        $this->db->where('tas_controllerid',  $this->input->post('tas_controllerid'));
        $data = $this->db->get('tasks');
        if ($data->num_rows() > 0) {
            $this->form_validation->set_message('uniqueAdd', '%s already exist, please another one');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    /**
     * Validation
     * @param type $str
     * @return boolean
     * @param usage callback_uniqueEdit
     */
    function uniqueEdit($str) {

        $this->db->where('tas_functionname', $str);
        $this->db->where("tas_id !=", $this->uri->segment(4));
        $this->db->where('tas_controllerid',  $this->input->post('tas_controllerid'));
        $data = $this->db->get(TABLE_PREFIX.'tasks');
        if ($data->num_rows() > 0) {
            $this->form_validation->set_message('uniqueEdit', '%s already exist, please another one');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
