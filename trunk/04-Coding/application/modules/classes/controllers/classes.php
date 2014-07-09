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
class Classes extends CI_Controller {

    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');

    function __construct() {
        parent::__construct();
        $this->load->model(array('classes/m_classes'));
    }

    /**
     * List classees
     */
    function index() {
        $this->data['title'] = 'Manage Class';
        $this->data['content'] = 'classes/index';

//        $this->form_validation->set_rules('use_name', '', 'trim');
//        $this->form_validation->set_rules('use_status', '', 'trim');
//        $this->form_validation->set_rules('use_email', '', 'trim|valid_email');
//
//        $this->form_validation->run();
        $this->data['data'] = $this->m_classes->findAllClass(PAGINGATION_PERPAGE, $this->uri->segment(4));
        pagination_config(base_url() . 'classes/classes/index', $this->m_classes->countAllClass(), PAGINGATION_PERPAGE);
        $this->load->view(LAYOUT, $this->data);
    }

    /**
     * Add new user account
     */
    function add() {
        $this->data['title'] = 'Add new classt';
        $this->data['content'] = 'classes/add';

//
        $this->form_validation->set_rules('cla_name', 'Classname', 'required|max_length[50]|min_length[3]');
        $this->form_validation->set_rules('cla_capacity', 'Capacity', 'required|max_length[3]');
        $this->form_validation->set_rules('tbl_major_mar_id', 'major', 'trim');

        if ($this->form_validation->run() == FALSE) {
           $this->data['major'] = $this->m_global->getDataArray(TABLE_PREFIX . 'majors', 'maj_id', 'maj_name', 'maj_status');
            $this->data['faculty'] = $this->m_global->getDataArray(TABLE_PREFIX . 'faculties', 'fac_id', 'fac_name', 'fac_status');
            $this->data['shift'] = $this->m_global->getDataArray(TABLE_PREFIX . 'shift', 'shi_id', 'shi_name', 'shi_status');
          $this->load->view(LAYOUT, $this->data);
        }else{
            if ($this->m_classes->add()) {
                $this->session->set_flashdata('message', alert("New class has been saved!", 'success'));
                redirect('classes');
            } else {
                $this->session->set_flashdata('message', alert("Class cannot be added, please try again", 'danger'));
                redirect('classes/add');
            }
        }
    }

    function edit() {

        $this->data['title'] = 'Updat class';
        $this->data['content'] = 'classes/edit';
        $this->data['data'] = $this->m_classes->selectJoinClass($this->uri->segment(4));
        
        if ($this->data['data']->num_rows() > 0) {
            foreach ($this->data['data']->result_array() as $row) {
                $this->session->set_userdata('tbl_major_maj_id',$row['tbl_major_maj_id']);
                $this->session->set_userdata('tbl_shift_shi_id',$row['tbl_shift_shi_id']);
//                $this->session->set_userdata('fac_id',$row['fac_id']);
            }
        }
        
               
        $this->form_validation->set_rules('cla_name', 'Classname', 'required|max_length[50]|min_length[3]');
        $this->form_validation->set_rules('cla_capacity', 'Capacity', 'required|max_length[3]');
        $this->form_validation->set_rules('tbl_major_mar_id', 'major', 'trim');

        if ($this->form_validation->run() == FALSE) {
           $this->data['major'] = $this->m_global->getDataArray(TABLE_PREFIX . 'majors', 'maj_id', 'maj_name', 'maj_status');
            $this->data['faculty'] = $this->m_global->getDataArray(TABLE_PREFIX . 'faculties', 'fac_id', 'fac_name', 'fac_status');
            $this->data['shift'] = $this->m_global->getDataArray(TABLE_PREFIX . 'shift', 'shi_id', 'shi_name', 'shi_status');
          $this->load->view(LAYOUT, $this->data);
        }else{
            if ($this->m_classes->update()) {
                $this->session->set_flashdata('message', alert("New class has been saved!", 'success'));
            } else {
                $this->session->set_flashdata('message', alert("Class cannot be added, please try again", 'danger'));
            }
             $s5=($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
                redirect('classes/classes/index/' . $s5);
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

