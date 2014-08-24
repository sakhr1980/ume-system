<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Manipulation of Staff Evaluation
 *
 * @author Dany CHUN
 */
class Staffevaluation extends CI_Controller {

	/**
	 * @var array
	 */
	var $data = array('title' => null, 'content' => 'missing_view');

	/**
	 * Constuctor
	 */
	function __construct() {
		parent::__construct();
		$this->load->model(array('staffs/m_staffevaluation'));
	}
	
	function index() {
		$this->data['title'] = 'Manage Staffs Evaluation';
		$this->data['content'] = 'staffs/staffevaluation/index';

		$this->form_validation->set_rules('sta_name', '', 'trim');

		$this->form_validation->run();
		$this->data['data'] = $this->m_staffevaluation->findAllEvaluations(PAGINGATION_PERPAGE, $this->uri->segment(4));
		pagination_config(base_url() . 'staffs/staffevaluation/index', $this->m_staffevaluation->countAllEvaluations(), PAGINGATION_PERPAGE);
		$this->load->view(LAYOUT, $this->data);
	}
	
	function add() {
		$this->data['title'] = 'Add New Evaluation';
		$this->data['content'] = 'staffs/staffevaluation/add';
		$this->data['staffList'] = $this->m_staffevaluation->getStaffList();

		$this->form_validation->set_rules('sta_id', 'Staff Name', 'required|max_length[10]');
		$this->form_validation->set_rules('sta_eva_ability_a', 'Ability A', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_ability_b', 'Ability B', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_ability_c', 'Ability C', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_ability_d', 'Ability D', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_ability_e', 'Ability E', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_characteristic_a', 'Characteristic A', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_characteristic_b', 'Characteristic B', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_characteristic_c', 'Characteristic C', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_characteristic_d', 'Characteristic D', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_characteristic_e', 'Characteristic E', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_attendant_a', 'Attendant A', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_attendant_b', 'Attendant B', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_attendant_c', 'Attendant C', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_attendant_d', 'Attendant D', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_attendant_e', 'Attendant E', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_idea_a', 'Course Idea A', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_idea_b', 'Course Idea B', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_idea_c', 'Course Idea C', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_idea_d', 'Course Idea D', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_idea_e', 'Course Idea E', 'trim|required|numeric|max_length[10]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view(LAYOUT, $this->data);
		} else {
			if ($this->m_staffevaluation->add()) {
				$this->session->set_flashdata('message', alert("Evaluation has been saved!", 'success'));
				redirect('staffs/staffevaluation');
			} else {
				$this->session->set_flashdata('message', alert("Evaluation cannot be added, please try again", 'danger'));
				redirect('staffs/staffevaluation/add');
			}
		}
	}
	
	function edit($id = 0) {
		$this->data['title'] = 'Edit Evaluation';
		$this->data['content'] = 'staffs/staffevaluation/edit';
		$this->data['data'] = $this->m_staffevaluation->getEvaluationById($id);
		$this->data['staffList'] = $this->m_staffevaluation->getStaffList();

		$this->form_validation->set_rules('sta_id', 'Staff Name', 'required|max_length[10]');
		$this->form_validation->set_rules('sta_eva_ability_a', 'Ability A', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_ability_b', 'Ability B', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_ability_c', 'Ability C', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_ability_d', 'Ability D', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_ability_e', 'Ability E', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_characteristic_a', 'Characteristic A', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_characteristic_b', 'Characteristic B', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_characteristic_c', 'Characteristic C', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_characteristic_d', 'Characteristic D', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_characteristic_e', 'Characteristic E', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_attendant_a', 'Attendant A', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_attendant_b', 'Attendant B', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_attendant_c', 'Attendant C', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_attendant_d', 'Attendant D', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_attendant_e', 'Attendant E', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_idea_a', 'Course Idea A', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_idea_b', 'Course Idea B', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_idea_c', 'Course Idea C', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_idea_d', 'Course Idea D', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('sta_eva_idea_e', 'Course Idea E', 'trim|required|numeric|max_length[10]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view(LAYOUT, $this->data);
		} else {
			if ($this->m_staffevaluation->update()) {
				$this->session->set_flashdata('message', alert("Evaluation has been updated!", 'success'));
				redirect('staffs/staffevaluation/index/' . $this->uri->segment(5));
			} else {
				$this->session->set_flashdata('message', alert("Evaluation cannot be updated, please try again", 'danger'));
				$s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
				redirect('staffs/staffevaluation/edit/' . $this->uri->segment(4) . $s5);
			}
		}
	}
	
	function delete($id) {
		if ($this->m_staffevaluation->deleteEvaluationById($id)) {
			$this->session->set_flashdata('message', alert("Evaluation has been deleted!", 'success'));
			redirect('staffs/staffevaluation/index/' . $this->uri->segment(5));
		} else {
			$this->session->set_flashdata('message', alert("Evaluation cannot be deleted, please try again!", 'danger'));
			redirect('staffs/staffevaluation/index/' . $this->uri->segment(5));
		}
	}

	function view($id = null) {
		$this->data['title'] = 'View Evaluation';
		$this->data['content'] = 'staffs/staffevaluation/view';

		$this->data['data'] = $this->m_staffevaluation->getEvaluationById($id);
		$this->load->view(LAYOUT, $this->data);
	}
}
