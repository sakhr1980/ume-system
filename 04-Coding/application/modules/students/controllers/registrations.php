<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registrations
 *
 * @author sochy.choeun
 */
class Registrations extends CI_Controller {

    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');

    function __construct() {
        parent::__construct();
        $this->load->model(array('students/m_registrations'));
    }

    /**
     * List user group
     */
    function index() {
        $this->data['title'] = 'Student Registration List';
        $this->data['content'] = 'students/registrations/index';

//        $this->form_validation->set_rules('gro_name','','trim');
//        $this->form_validation->set_rules('gro_status','','trim');
//        $this->form_validation->run();
        $this->data['data'] = $this->m_registrations->findAllRegistrations(PAGINGATION_PERPAGE, $this->uri->segment(4));
        pagination_config(base_url() . 'students/registrations/index', $this->m_registrations->countAllRegistrations(), PAGINGATION_PERPAGE);
        

        $this->load->view(LAYOUT, $this->data);
    }

    /**
     * Add new user group
     */
    function add() {
        $this->data['title'] = 'Student registration';
        $this->data['content'] = 'students/registrations/add';

        $this->form_validation->set_rules('stu_kh_lastname', 'គោត្តនាមe', 'required]');
        if ($this->form_validation->run() == FALSE) {
            $this->data['master'] = $this->m_registrations->getMajorByMasterId(6);
            $this->data['bachelor_economic'] = $this->m_registrations->getMajorByMasterId(1);
            $this->data['bachelor_art'] = $this->m_registrations->getMajorByMasterId(2);
            $this->data['bachelor_agriculture'] = $this->m_registrations->getMajorByMasterId(5);
            $this->data['bachelor_it'] = $this->m_registrations->getMajorByMasterId(3);
            $this->data['bachelor_law'] = $this->m_registrations->getMajorByMasterId(4);
            $this->load->view(LAYOUT, $this->data);
        } else {
            
            if ($this->m_registrations->add()) {
                $this->session->set_flashdata('message', alert("Student registration has been saved!", 'success'));
                redirect('students/registrations');
            } else {
                $this->session->set_flashdata('message', alert("Student registration cannot be added, please try again", 'danger'));
                redirect('students/registrations/add');
            }
        }
    }

    function edit() {

        $this->data['title'] = 'Edit Group';
        $this->data['content'] = 'students/registrations/edit';
        $this->data['data'] = $this->m_registrations->getGroupById($this->uri->segment(4));

//        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        $this->form_validation->set_rules('gro_name', 'Group Name', 'required|max_length[50]|min_length[2]|callback_uniqueExcept[' . TABLE_PREFIX . 'registrations.gro_name,gro_id]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view(LAYOUT, $this->data);
        } else {

            if ($this->m_registrations->update()) {
                $this->session->set_flashdata('message', alert("Student registration has been updated!", 'success'));
                redirect('students/registrations/index/' . $this->uri->segment(5));
            } else {
                $this->session->set_flashdata('message', alert("Student registration cannot be updated, please try again", 'danger'));
                $s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
                redirect('students/registrations/edit/' . $this->uri->segment(4) . $s5);
            }
        }
    }

    // $id = segment(4)
    function delete($id) {
        if ($this->m_registrations->deleteGroupById($id)) {
            $this->session->set_flashdata('message', alert("Student registration has been deleted!", 'success'));
            redirect('students/registrations/index/' . $this->uri->segment(5));
        } else {
            $this->session->set_flashdata('message', alert("Student registration cannot be deleted, please try again!", 'danger'));
            redirect('students/registrations/index/' . $this->uri->segment(5));
        }
    }
    
    
    function view($id=null){
        
        $this->data['title'] = 'View User Group';
        $this->data['content'] = 'students/registrations/view';
        
        $this->data['data'] = $this->m_registrations->getGroupById($id);
        $this->load->view(LAYOUT,  $this->data);
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
