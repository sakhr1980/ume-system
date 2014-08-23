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

        $this->form_validation->set_rules('cla_name', '', 'trim');
        $this->form_validation->set_rules('cla_status', '', 'trim');
        $this->form_validation->set_rules('cla_capacity', '', 'trim');
        
        $this->form_validation->run();
        
        $this->data['data'] = $this->m_classes->findAllClass(PAGINGATION_PERPAGE, $this->uri->segment(4));
        pagination_config(base_url() . 'classes/classes/index', $this->m_classes->countAllClass(), PAGINGATION_PERPAGE);
        $this->load->view(LAYOUT, $this->data);
    }

    /**
     * Add new user account
     */
    function add() {
        $this->data['title'] = 'Add new class';
        $this->data['content'] = 'classes/add';

//
        $this->form_validation->set_rules('cla_name', 'Classname', 'required|max_length[50]|min_length[2]');
        $this->form_validation->set_rules('cla_capacity', 'Capacity', 'required|max_length[3]');
        $this->form_validation->set_rules('cla_maj_id', 'major', 'trim');

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

    function edit($id=0) {

        $this->data['title'] = 'Updat class';
        $this->data['content'] = 'classes/edit';
        $this->data['data'] = $this->m_classes->selectJoinClass($id);
        
        $this->form_validation->set_rules('cla_name', 'Classname', 'required|max_length[50]|min_length[3]');
        $this->form_validation->set_rules('cla_capacity', 'Capacity', 'trim');
        $this->form_validation->set_rules('cla_maj_id', 'cla_maj_id', 'trim');

        if ($this->form_validation->run() == FALSE) {
           $this->data['major'] = $this->m_global->getDataArray(TABLE_PREFIX . 'majors', 'maj_id', 'maj_name', 'maj_status');
            $this->data['faculty'] = $this->m_global->getDataArray(TABLE_PREFIX . 'faculties', 'fac_id', 'fac_name', 'fac_status');
            $this->data['shift'] = $this->m_global->getDataArray(TABLE_PREFIX . 'shift', 'shi_id', 'shi_name', 'shi_status');
          $this->load->view(LAYOUT, $this->data);
//            echo "not good";
        }else{
            if ($this->m_classes->update()) {
                $this->session->set_flashdata('message', alert("New class has been saved!", 'success'));
                redirect('classes/index/' . $this->uri->segment(5));
//                echo "Updated";
            } else {
                echo "Error";
                $this->session->set_flashdata('message', alert("Class cannot be added, please try again", 'danger'));
                $s5=($this->uri->segment(5)) ? '/' . $this->uri->segment(4) : ''; // for pagination
//                redirect('classes/index/' . $s5);
            }
//             
        }
    }

    // $id = segment(4)
    function delete($id) {
        if ($this->m_classes->deleteClassById($id)) {
            $this->session->set_flashdata('message', alert("User account has been deleted!", 'success'));
            redirect('classes/classes/index/' . $this->uri->segment(5));
        } else {
            $this->session->set_flashdata('message', alert("User account cannot be deleted, please try again!", 'danger'));
            redirect('classes/classes/index/' . $this->uri->segment(5));
        }
    }

    // view a Class
	function view($id = null) {
		$this->data['title'] = 'View Class';
		$this->data['content'] = 'classes/view';

		$this->data['data'] = $this->m_classes->selectJoinClass($id);
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

