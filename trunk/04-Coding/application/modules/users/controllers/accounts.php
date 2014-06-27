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
class Accounts extends CI_Controller {

    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');

    function __construct() {
        parent::__construct();
        $this->load->model(array('users/m_accounts'));
    }

    /**
     * List user account
     */
    function index() {
        $this->data['title'] = 'Manage User Account';
        $this->data['content'] = 'users/accounts/index';

        $this->form_validation->set_rules('use_name', '', 'trim');
        $this->form_validation->set_rules('use_status', '', 'trim');
        $this->form_validation->set_rules('use_email', '', 'trim|valid_email');

        $this->form_validation->run();
        $this->data['data'] = $this->m_accounts->findAllAccounts(PAGINGATION_PERPAGE, $this->uri->segment(4));
        $this->data['groups'] = $this->m_global->getDataArray(TABLE_PREFIX . 'groups', 'gro_id', 'gro_name', 'gro_status');
        pagination_config(base_url() . 'users/accounts/index', $this->m_accounts->countAllAccounts(), PAGINGATION_PERPAGE);
        $this->load->view(LAYOUT, $this->data);
    }

    /**
     * Add new user account
     */
    function add() {
        $this->data['title'] = 'Add new user account';
        $this->data['content'] = 'users/accounts/add';


        $this->form_validation->set_rules('use_name', 'Username', 'required|max_length[50]|min_length[3]|is_unique[tbl_users.use_name]');
        $this->form_validation->set_rules('use_email', 'Email', 'required|is_unique[tbl_users.use_email]');
        $this->form_validation->set_rules('use_pass', 'Password', 'required|max_length[50]|min_length[6]');
        $this->form_validation->set_rules('use_passc', 'Confirm Password', 'matches[use_pass]');
        $this->form_validation->set_rules('use_email', 'Email', 'required|valid_email|is_unique[tbl_users.use_name]');
        $this->form_validation->set_rules('groups[]', 'Group', 'trim');
//        if ($this->input->post('groups')) {
//            $groups = $this->input->post('groups');
//            foreach ($groups as $key => $value) {
//                $this->form_validation->set_rules('groups['.$value.']', 'Group', 'trim');
//            }
//        }
        if ($this->form_validation->run() == FALSE) {
            $this->data['groups'] = $this->m_global->getDataArray(TABLE_PREFIX . 'groups', 'gro_id', 'gro_name', 'gro_status');
            $this->load->view(LAYOUT, $this->data);
        } else {

            if ($this->m_accounts->add()) {
                $this->session->set_flashdata('message', alert("User account has been saved!", 'success'));
                redirect('users/accounts');
            } else {
                $this->session->set_flashdata('message', alert("User account cannot be added, please try again", 'danger'));
                redirect('users/accounts/add');
            }
        }
    }

    function edit() {

        $this->data['title'] = 'Edit Group';
        $this->data['content'] = 'users/accounts/edit';
        $this->data['data'] = $this->m_accounts->getGroupById($this->uri->segment(4));

//        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        $this->form_validation->set_rules('use_name', 'Group Name', 'required|max_length[50]|min_length[2]|callback_uniqueExcept[' . TABLE_PREFIX . 'accounts.use_name,use_id]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view(LAYOUT, $this->data);
        } else {

            if ($this->m_accounts->update()) {
                $this->session->set_flashdata('message', alert("User account has been updated!", 'success'));
                redirect('users/accounts/index/' . $this->uri->segment(5));
            } else {
                $this->session->set_flashdata('message', alert("User account cannot be updated, please try again", 'danger'));
                $s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
                redirect('users/accounts/edit/' . $this->uri->segment(4) . $s5);
            }
        }
    }

    // $id = segment(4)
    function delete($id) {
        if ($this->m_accounts->deleteGroupById($id)) {
            $this->session->set_flashdata('message', alert("User account has been deleted!", 'success'));
            redirect('users/accounts/index/' . $this->uri->segment(5));
        } else {
            $this->session->set_flashdata('message', alert("User account cannot be deleted, please try again!", 'danger'));
            redirect('users/accounts/index/' . $this->uri->segment(5));
        }
    }

    function view($id = null) {

        $this->data['title'] = 'View User Group';
        $this->data['content'] = 'users/accounts/view';

        $this->data['data'] = $this->m_accounts->getGroupById($id);
        $this->load->view(LAYOUT, $this->data);
    }

    //====================== validation
    /**
     * 
     * @param type $str
     * @return boolean
     */
    function uniqueExcept($str, $table_field) {
        // $f1[0] : table name
        // $f1[1] : field to insert
        // $tf[1] : field id
        $tf = explode(',', $table_field);
        $f1 = explode('.', $tf[0]);
        $this->db->where($f1[1], $str);
        $this->db->where($tf[1] . " !=", $this->uri->segment(4));
        $data = $this->db->get($f1[0]);
        if ($data->num_rows() > 0) {
            $this->form_validation->set_message('uniqueExcept', '%s already exist, please another one');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
