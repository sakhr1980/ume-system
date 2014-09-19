<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of module
 *
 * @author sochy
 */
class module extends CI_Controller {
    //put your code here
    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');

    function __construct() {
        parent::__construct();
        $this->load->model(array('users/m_module'));
    }
    /**
     * Add new user module
     */
    function add() {
        $this->data['title'] = 'Add new module';
        $this->data['content'] = 'users/module/add';

        $this->form_validation->set_rules('mod_name', 'Module name', 'required|max_length[50]|min_length[2]');
        $this->form_validation->set_rules('mod_foldername', 'Folder name', 'required|max_length[50]|min_length[2]|is_unique['.TABLE_PREFIX.'modules.mod_foldername]');
        $this->form_validation->set_rules('mod_status', 'Status', 'trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view(LAYOUT, $this->data);
        } else {
            // keep pagination
            $s5=($this->uri->segment(4)) ? '/' . $this->uri->segment(4) : ''; // for pagination
            if ($this->m_module->add()) {
                $this->session->set_flashdata('message', alert("Module module has been saved!", 'success'));
                redirect('users/functions/'.$s5);
            } else {
                $this->session->set_flashdata('message', alert("Module module cannot be added, please try again", 'danger'));
                redirect('users/module/add');
            }
        }
    }

    function edit() {

        $this->data['title'] = 'Edit Module';
        $this->data['content'] = 'users/module/edit';
        

        $this->form_validation->set_rules('mod_name', 'Module name', 'required|max_length[50]|min_length[2]');
        $this->form_validation->set_rules('mod_foldername', 'Folder name', 'required|max_length[50]|min_length[2]|callback_uniqueExcept['.TABLE_PREFIX.'modules.mod_foldername.mod_id]');
        $this->form_validation->set_rules('mod_status', 'Status', 'trim');    
        
        if ($this->form_validation->run() == FALSE) {
            $this->data['data'] = $this->m_module->getModuleById($this->uri->segment(4));
            $this->load->view(LAYOUT, $this->data);
        } else {
            // keep pagination
            $s5=($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
            if ($this->m_module->update()) {
                $this->session->set_flashdata('message', alert("Module has been updated!", 'success'));
                redirect('users/functions/index' . $s5);
            } else {
                $this->session->set_flashdata('message', alert("Module cannot be updated, please try again", 'danger'));
                redirect('users/module/edit/' . $this->uri->segment(4) . $s5);
            }
        }
    }
    
    
    
    /**
     * Validation
     * @param type $str
     * @return boolean
     * @param usage callback_uniqueExcept[tablename.fieldname.field_primary_key]
     */
    function uniqueExcept($str, $table_field) {

        $param = explode('.', $table_field);
        $this->db->where($param[1], $str);
        $this->db->where($param[2] . " !=", $this->uri->segment(4));
        $data = $this->db->get($param[0]);
        if ($data->num_rows() > 0) {
            $this->form_validation->set_message('uniqueExcept', '%s already exist, please another one');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
