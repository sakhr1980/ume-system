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
class schedules extends CI_Controller {

    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');

    function __construct() {
        parent::__construct();
        $this->load->model(array('schedules/m_schedules'));
    }

    /**
     * List classees
     */
    function index() {
        $this->data['title'] = 'កាលវិភាគ';
        $this->data['content'] = 'schedules/index';

        $this->form_validation->set_rules('sch_title', '', 'trim');
        $this->form_validation->set_rules('sch_academic_year', '', 'trim');
     
		
        $this->data['major'] = $this->m_global->getDataArray(TABLE_PREFIX . 'majors', 'maj_id', 'maj_name', 'maj_status');
        $this->data['shift'] = $this->m_global->getDataArray(TABLE_PREFIX . 'shift', 'shi_id', 'shi_name', 'shi_status');
        $this->data['data'] = array();
		if ($this->form_validation->run() == true) {
			$this->data['data'] = $this->m_schedules->findAllSchedule(PAGINGATION_PERPAGE, $this->uri->segment(4));
			pagination_config(site_url('schedules/index'), $this->m_schedules->countAllSchedule(), PAGINGATION_PERPAGE);
		}
        $this->load->view(LAYOUT, $this->data);
    }

    /**
     * Add new user account
     */
    function add() {
        $this->data['title'] = 'បង្កើតកាលវិភាគ';
        $this->data['content'] = 'schedules/add';
		
		$this->form_validation->set_rules('sch_title', 'title', 'required');
        $this->form_validation->set_rules('tbl_majors_maj_id', 'major', 'required');
        $this->form_validation->set_rules('tbl_shift_shi_id', 'shift', 'required');
        $this->form_validation->set_rules('sch_semester', 'semester', 'required');
		$this->form_validation->set_rules('sch_year_number', 'year', 'required');
        $this->form_validation->set_rules('sch_academic_year', 'academic year', 'required|max_length[50]|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
			$this->data['major'] = $this->m_global->getDataArray(TABLE_PREFIX . 'majors', 'maj_id', 'maj_name', 'maj_status');
            $this->data['shift'] = $this->m_global->getDataArray(TABLE_PREFIX . 'shift', 'shi_id', 'shi_name', 'shi_status');
			$this->load->view(LAYOUT, $this->data);
        }else{
            if($this->m_schedules->add()) {
                $this->session->set_flashdata('message', alert("New schedule has been saved!", 'success'));
                redirect('schedules');
            } else {
                $this->session->set_flashdata('message', alert("Schedule cannot be added, please try again", 'danger'));
                redirect('schedules/add');
            }
        }
    }
	
	function ajaxTeacher(){
		$data = $this->m_schedules->getAjaxData('staff',array('sta_id as id','sta_name as name'));
		echo json_encode($data);
	}
	
	function ajaxRoom(){
		$data = $this->m_schedules->getAjaxData('room',array('rom_id as id','rom_name as name'));
		echo json_encode($data);
	}
	
	function ajaxSubject(){
		$data = $this->m_schedules->getAjaxData('subject',array('sub_id as id','sub_name as name'));
		echo json_encode($data);
	}

    function edit($id=0) {
        $this->data['title'] = 'កែប្រែកាលវិភាគ';
        $this->data['content'] = 'schedules/edit';
		$this->data['data'] = $this->m_schedules->getDataSchedule($id);
		
		$this->form_validation->set_rules('sch_title', 'title', 'required');
        $this->form_validation->set_rules('tbl_majors_maj_id', 'major', 'required');
        $this->form_validation->set_rules('tbl_shift_shi_id', 'shift', 'required');
        $this->form_validation->set_rules('sch_semester', 'semester', 'required');
		$this->form_validation->set_rules('sch_year_number', 'year', 'required');
        $this->form_validation->set_rules('sch_academic_year', 'academic year', 'required|max_length[50]|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
			$this->data['major'] = $this->m_global->getDataArray(TABLE_PREFIX . 'majors', 'maj_id', 'maj_name', 'maj_status');
            $this->data['shift'] = $this->m_global->getDataArray(TABLE_PREFIX . 'shift', 'shi_id', 'shi_name', 'shi_status');
			$this->load->view(LAYOUT, $this->data);
        }else{
            if($this->m_schedules->update()) {
                $this->session->set_flashdata('message', alert("schedule has been saved!", 'success'));
                redirect('schedules');
            } else {
                $this->session->set_flashdata('message', alert("Schedule cannot be updated, please try again", 'danger'));
                redirect('schedules/edit');
            }
        }
    }

    // $id = segment(4)
    function delete($id=0) {
        echo $this->m_schedules->deleteScheduleById($id);
    }

    // view a Schedule
	function view($id = null) {
		$this->data['title'] = 'View Schedule';
		$this->data['content'] = 'schedules/view';

		$this->data['data'] = $this->m_schedules->selectJoinSchedule($id);
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

