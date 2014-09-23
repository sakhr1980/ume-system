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
class Teacher extends CI_Controller {
    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');

    function __construct() {
        parent::__construct();
        $this->load->model(array('teacher/m_teacher'));
    }

    /**
     * List classees
     */
    function index() {
        $this->data['title'] = 'Teacher Record';
        $this->data['content'] = 'teacher/index';
        
		$this->data['staff'] = $this->m_teacher->getStaff();
		$this->data['class'] = $this->m_global->getDataArray(TABLE_PREFIX . 'classes', 'cla_id', 'cla_name', 'cla_status');
        $this->data['major'] = $this->m_global->getDataArray(TABLE_PREFIX . 'majors', 'maj_id', 'maj_name', 'maj_status');
		
		$this->data['data'] = $this->m_teacher->findAllTeacher(1, $this->uri->segment(3));
		
		$num = $this->m_teacher->countAllTeacher();
		pagination_config(site_url('teacher/index'),$num , 1);
		
		$this->load->view(LAYOUT, $this->data);
    }

    /**
     * Add new user account
     */
    function add() {
        $this->data['title'] = 'បង្កើតកាលវិភាគ';
        $this->data['content'] = 'teacher/add';
		$this->data['staff'] = $this->m_teacher->getStaff();
		$this->data['subject'] = $this->m_global->getDataArray(TABLE_PREFIX . 'majors', 'maj_id', 'maj_name', 'maj_status');
		$this->data['class'] = $this->m_global->getDataArray(TABLE_PREFIX . 'classes', 'cla_id', 'cla_name', 'cla_status');
		$this->load->view(LAYOUT, $this->data);        
    }
	
	function ajaxSave(){
		$res = $this->m_teacher->saveOrUpdate();
		echo json_encode($res);
	}
	
	function ajaxFilter(){
		$data['tbl_staff_sta_id'] = $this->input->post('tbl_staff_sta_id');
        $data['tbl_majors_maj_id'] = $this->input->post('tbl_majors_maj_id');
		$data['tbl_classes_cla_id'] = $this->input->post('tbl_classes_cla_id');
		$data['tea_academic_year'] = $this->input->post('tea_academic_year');
		$data['tea_semester'] = $this->input->post('tea_semester');
		$data['tea_year'] = $this->input->post('tea_year');
		$res = $this->m_teacher->getDataFilter($data);
		echo json_encode($res);
	}
	
    // view a Schedule
	function view($id = null) {
		$this->data['title'] = 'View Schedule';
		$this->data['content'] = 'teacher/view';

		$this->data['data'] = $this->m_teacher->selectJoinSchedule($id);
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

