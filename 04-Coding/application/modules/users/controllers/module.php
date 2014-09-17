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

            if ($this->m_module->add()) {
                $this->session->set_flashdata('message', alert("User module has been saved!", 'success'));
                redirect('users/functions');
            } else {
                $this->session->set_flashdata('message', alert("User module cannot be added, please try again", 'danger'));
                redirect('users/module/add');
            }
        }
    }

    function edit() {

        $this->data['title'] = 'Edit Module';
        $this->data['content'] = 'users/module/edit';
        $this->data['data'] = $this->m_module->getModuleById($this->uri->segment(4));

//        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        $this->form_validation->set_rules('gro_name', 'Module Name', 'required|max_length[50]|min_length[2]|callback_uniqueExcept[' . TABLE_PREFIX . 'module.gro_name,gro_id]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view(LAYOUT, $this->data);
        } else {

            if ($this->m_module->update()) {
                $this->session->set_flashdata('message', alert("User module has been updated!", 'success'));
                redirect('users/module/index/' . $this->uri->segment(5));
            } else {
                $this->session->set_flashdata('message', alert("User module cannot be updated, please try again", 'danger'));
                $s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
                redirect('users/module/edit/' . $this->uri->segment(4) . $s5);
            }
        }
    }
}
