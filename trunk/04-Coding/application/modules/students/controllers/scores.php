<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Manipulation of Scores
 *
 * @author Man Math <manmath4@gmail.com>
 */
class Scores extends CI_Controller {

	/**
	 * @var array
	 */
	var $data = array('title' => null, 'content' => 'missing_view');

	/**
	 * Constuctor
	 */
	function __construct() {
		parent::__construct();
		$this->load->model(array('students/m_scores'));
	}

	/**
	 * Retrive Score
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return void
	 */
	function index() {
		$this->data['title'] = 'Manage Scores';
		$this->data['content'] = 'students/scores/index';

		$this->form_validation->set_rules('tbl_generation_gen_id', '', 'trim');
		$this->form_validation->set_rules('tbl_majors_maj_id', '', 'trim');
		$this->form_validation->set_rules('tbl_shift_shi_id', '', 'trim');
		$this->form_validation->set_rules('tbl_classes_cla_id', '', 'trim');
		$this->form_validation->set_rules('tbl_student_stu_id', '', 'trim');

		$this->form_validation->run();
		$this->data['data'] = $this->m_scores->findAllScores(PAGINGATION_PERPAGE, $this->uri->segment(4));
		$this->data['generations'] = $this->m_global->getDataArray(TABLE_PREFIX . 'generation', 'gen_id', 'gen_title', 'gen_status');
		$this->data['majors'] = $this->m_global->getDataArray(TABLE_PREFIX . 'majors', 'maj_id', 'maj_abbriviation', 'maj_status');
		$this->data['shifts'] = $this->m_global->getDataArray(TABLE_PREFIX . 'shift', 'shi_id', 'shi_name', 'shi_status');
		$this->data['classes'] = $this->m_global->getDataArray(TABLE_PREFIX . 'classes', 'cla_id', 'cla_name', 'cla_status');
		pagination_config(base_url() . 'studets/scores/index', $this->m_scores->countAllScores(), PAGINGATION_PERPAGE);
		$this->load->view(LAYOUT, $this->data);
	}

	/**
	 * Import new student to tbl_student_score
	 */
	function refresh() {
		if ($this->m_scores->refresh()) {
			$this->session->set_flashdata('message', alert("New students are available for inputing score!", 'success'));
		} else {
			$this->session->set_flashdata('message', alert("Students are up to date!", 'warning'));
		}
		redirect('students/scores');
	}

	function edit($id = 0) {
		$this->data['title'] = 'Input Score';
		$this->data['content'] = 'students/scores/edit';
		$this->data['data'] = $this->m_scores->getScoreById($id);

		$this->form_validation->set_rules('stu_sco_attendance', 'Attendance', 'trim|max_length[5]|numeric');
		$this->form_validation->set_rules('stu_sco_homework', 'Homework/Quiz', 'trim|max_length[5]|numeric');
		$this->form_validation->set_rules('stu_sco_midterm_exam', 'Midterm/Assignment', 'trim|max_length[5]|numeric');
		$this->form_validation->set_rules('stu_sco_final_exam', 'Final Exam', 'trim|max_length[5]|numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view(LAYOUT, $this->data);
		} else {
			if ($this->m_scores->update()) {
				$this->session->set_flashdata('message', alert("Score has been updated!", 'success'));
				redirect('students/scores/index/' . $this->uri->segment(5));
			} else {
				$this->session->set_flashdata('message', alert("Score cannot be updated, please try again", 'danger'));
				$s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
				redirect('students/scores/edit/' . $this->uri->segment(4) . $s5);
			}
		}
	}

}
