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
class Type extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('type/m_type'));
    }

    /**
     * index Type
     */
    function index() {

       $this->listTypes();
    }

	/**
	 *  list Subject Type
	 */
	function listTypes() {
		$data['listTypes'] = $this->m_type->getTypes();
		$data['title'] = 'Manage Subject Type';
		$data['content'] = 'type/index';

		$this->load->view(LAYOUT, $data);
	}

	/**
	 * add Subject Type
	 */
	function  add() {
		$data['title'] = 'Add Subject Type';
		$data['content'] = 'type/add';

		$this->load->view(LAYOUT, $data);
	}

	public function create() {
		$this->session->set_flashdata('message', 'Created successfully');

		if (isset($_POST['btn_save'])) {
			$statusTick = (isset($_POST['sub_typ_status'])) ? 1 : 0;
			$title        = $_POST['sub_typ_title'];
			$description        = $_POST['sub_typ_description'];
			$status  = $statusTick;

			$this->m_type->addNew($title, $description, $status);
		}
		redirect('subjects/type');
	}

	// edit an Subject Type
	public function edit($sub_typ_id = '') {
		$data['listTypes'] = $this->m_type->findByTypeId($sub_typ_id);

		$data['title'] = 'Edit Subject Type';
		$data['content'] = 'type/edit';

		$this->load->view(LAYOUT, $data);
	}

	// view a Subject type
	public function view($sub_id= ''){
		$data['listTypes'] = $this->m_type->findByTypeId($sub_id);

		$data['title'] = 'View Subject Type';
		$data['content'] = 'type/view';

		$this->load->view(LAYOUT, $data);
	}


	// update an Subject Type
	public function update() {
		$this->session->set_flashdata('message', 'Updated successfully');

		if (isset($_POST['btn_update'])) {
			$statusTick = (isset($_POST['sub_typ_status'])) ? 1 : 0;
			$sub_typ_id        = $_POST['sub_typ_id'];
			$title        = $_POST['sub_typ_title'];
			$description        = $_POST['sub_typ_description'];
			$status  = $statusTick;

			$this->m_type->updateType($title, $description, $status, $sub_typ_id);
		}

		redirect('subjects/type');
	}
	// delete an Subject Type
	public function delete($sub_typ_id = '') {

		$this->session->set_flashdata('message', 'Deleted successfully');

		$this->m_type->deleteType($sub_typ_id);
		redirect('subjects/type');
	}

}

