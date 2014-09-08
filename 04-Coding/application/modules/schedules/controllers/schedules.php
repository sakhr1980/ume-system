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
        $this->form_validation->set_rules('sch_academic_year', '', 'trim');
     
		$this->data['class'] = $this->m_global->getDataArray(TABLE_PREFIX . 'classes', 'cla_id', 'cla_name', 'cla_status');
        $this->data['major'] = $this->m_global->getDataArray(TABLE_PREFIX . 'majors', 'maj_id', 'maj_name', 'maj_status');
        $this->data['shift'] = $this->m_global->getDataArray(TABLE_PREFIX . 'shift', 'shi_id', 'shi_name', 'shi_status');
        $res = array();
		$num = 0;
		if ($this->form_validation->run() == true) {
			$res = $this->m_schedules->findAllSchedule(PAGINGATION_PERPAGE, $this->uri->segment(4));
			$num = $this->m_schedules->countAllSchedule();
		}
		$this->data['data'] = $res;
		//pagination_config(site_url('schedules/index'),$num , PAGINGATION_PERPAGE);
        $this->load->view(LAYOUT, $this->data);
    }
	
	function do_print($id=0){
		$data['title'] = 'កាលវិភាគ';
		$data['data'] = $this->m_schedules->printDocument($id);
		$this->load->view('schedules/print',$data);
	}

    /**
     * Add new user account
     */
    function add() {
        $this->data['title'] = 'បង្កើតកាលវិភាគ';
        $this->data['content'] = 'schedules/add';
		$this->data['class'] = $this->m_global->getDataArray(TABLE_PREFIX . 'classes', 'cla_id', 'cla_name', 'cla_status');
		$this->load->view(LAYOUT, $this->data);        
    }
	
	function ajaxSave(){
		$res = $this->m_schedules->add();
		echo json_encode($res);
	}
	
	function ajaxTeacher(){
		$fselecteds = array('sta_id as id','sta_name as name');
		$fselected = 'tbl_staffs_sta_id';
		$fwhere = 'sta_id';
		$data = $this->m_schedules->getAjaxData('staff',$fselecteds,$fwhere,$fselected);
		echo json_encode($data);
	}
	
	function ajaxRoom(){
		$fselecteds = array('rom_id as id','rom_name as name');
		$fselected = 'tbl_room_rom_id';
		$fwhere = 'rom_id';
		$data = $this->m_schedules->getAjaxData('room',$fselecteds,$fwhere,$fselected);
		echo json_encode($data);
	}
	
	function ajaxSubject(){		
		$fselecteds = array('sub_id as id','sub_name as name');
		$fselected = 'tbl_subject_sub_id';
		$fwhere = 'sub_id';
		$data = $this->m_schedules->getAjaxData('subject',$fselecteds,$fwhere,$fselected);
		echo json_encode($data);
	}
	
	function ajaxClass($id=0){
		$data = $this->m_schedules->getClassBy($id);
		echo json_encode($data);
	}

    function edit($id=0) {
        $this->data['title'] = 'កែប្រែកាលវិភាគ';
        $this->data['content'] = 'schedules/edit';
		$this->data['data'] = $this->m_schedules->getDataSchedule($id);
		$this->data['class'] = $this->m_global->getDataArray(TABLE_PREFIX . 'classes', 'cla_id', 'cla_name', 'cla_status');
		$this->load->view(LAYOUT, $this->data);
    }
	
	function ajaxUpdate($id=0){
		$res = $this->m_schedules->update($id);
		echo json_encode($res);
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

