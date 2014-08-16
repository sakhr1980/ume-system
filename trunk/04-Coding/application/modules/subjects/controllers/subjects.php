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
 * @author SINA Chhum
 */
class Subjects extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('subjects/m_subjects'));
    }

    /**
     * index subjects
     */
    function index() {

       $this->listSubjects();
    }

	/**
	 *  list subjects
	 */
	function listSubjects() {
		$data['listSubjects'] = $this->m_subjects->getSubjects();
		$data['title'] = 'Manage Subject';
		$data['content'] = 'subjects/index';

		$this->load->view(LAYOUT, $data);
	}


	/**
	 * add Subject Type
	 */
	function  add() {
		$data['getTypes'] = $this->m_subjects->getSubjectType();

		$data['title'] = 'Add Subject';
		$data['content'] = 'add';

		$this->load->view(LAYOUT, $data);
	}

	public function create() {
		$this->session->set_flashdata('message', 'Created successfully');

		if (isset($_POST['btn_save'])) {
			$statusTick = (isset($_POST['sub_status'])) ? 1 : 0;
			$sub_type       = $_POST['sub_typ_id'];
			$title        = $_POST['sub_name'];
			$hour        = $_POST['sub_hours'];
			$description        = $_POST['sub_description'];
			$status  = $statusTick;
			$this->m_subjects->addNew($sub_type, $title, $hour, $description, $status);
		}
		redirect('subjects/');
	}

	// edit an Subject
	public function edit($sub_id = '') {

		$data['getTypes'] = $this->m_subjects->getSubjectType();
		$data['listSubjects'] = $this->m_subjects->findBySubjectId($sub_id);

		$data['title'] = 'Edit Subject';
		$data['content'] = 'edit';

		$this->load->view(LAYOUT, $data);
	}

	// update a Subject
	public function update() {
		$this->session->set_flashdata('message', 'Updated successfully');

		if (isset($_POST['btn_update'])) {
			$statusTick = (isset($_POST['sub_status'])) ? 1 : 0;
			$sub_id        = $_POST['sub_id'];
			$title        = $_POST['sub_name'];
			$hour       = $_POST['sub_hours'];
			$description        = $_POST['sub_description'];
			$status  = $statusTick;

			$this->m_subjects->updateSubject($title, $hour, $description, $status, $sub_id);
		}

		redirect('subjects/');
	}
	// delete a Subject
	public function delete($sub_id = '') {
		$this->session->set_flashdata('message', 'Daleted successfully');

		$this->m_subjects->deleteSubject($sub_id);
		redirect('subjects/');
	}

	// view a Subject
	public function view($sub_id= ''){
		$data['listSubject'] = $this->m_subjects->findBySubjectId($sub_id);

		$data['title'] = 'View Subject';
		$data['content'] = 'view';

		$this->load->view(LAYOUT, $data);
	}

}

