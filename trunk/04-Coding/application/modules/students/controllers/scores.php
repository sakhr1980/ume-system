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
		$this->form_validation->set_rules('stu_sco_semester', '', 'trim');
		$this->form_validation->set_rules('tbl_majors_maj_id', '', 'trim');
		$this->form_validation->set_rules('tbl_shift_shi_id', '', 'trim');
		$this->form_validation->set_rules('tbl_classes_cla_id', '', 'trim');
		$this->form_validation->set_rules('tbl_student_stu_id', '', 'trim');
		$this->form_validation->run();

		$this->data['generations'] = $this->m_global->getDataArray(TABLE_PREFIX . 'generation', 'gen_id', 'gen_title', 'gen_status');
		$this->data['majors'] = $this->m_global->getDataArray(TABLE_PREFIX . 'majors', 'maj_id', 'maj_abbriviation', 'maj_status');
		$this->data['shifts'] = $this->m_global->getDataArray(TABLE_PREFIX . 'shift', 'shi_id', 'shi_name', 'shi_status');
		$this->data['classes'] = $this->m_global->getDataArray(TABLE_PREFIX . 'classes', 'cla_id', 'cla_name', 'cla_status');

		$this->data['data_subject'] = $this->resultBySubjects();
		//$this->data['data_subject_label1'] = $this->m_scores->subjectLabelBySemester(1);
		$this->data['data_semester1'] = $this->resultBySemester(1);
		//$this->data['data_subject_label2'] = $this->m_scores->subjectLabelBySemester(2);
		$this->data['data_semester2'] = $this->resultBySemester(2);
		$this->data['data_final'] = $this->resultByFinal();

		$this->load->view(LAYOUT, $this->data);
	}

	function resultBySubjects() {
		pagination_config(base_url() . 'studets/scores/index', $this->m_scores->countAllScoresBySubject(), PAGINGATION_PERPAGE);
		return $this->m_scores->findAllScoresBySubject(PAGINGATION_PERPAGE, $this->uri->segment(4));
	}

	function resultBySemester($semester) {
		pagination_config(base_url() . 'studets/scores/index', $this->m_scores->countAllScoresBySemester($semester), PAGINGATION_PERPAGE);
		return $this->m_scores->findAllScoresBySemester($semester, PAGINGATION_PERPAGE, $this->uri->segment(4));
	}

	function resultByFinal() {
		pagination_config(base_url() . 'studets/scores/index', $this->m_scores->countAllScoresByFinal(), PAGINGATION_PERPAGE);
		return $this->m_scores->findAllScoresByFinal(PAGINGATION_PERPAGE, $this->uri->segment(4));
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

		$this->form_validation->set_rules('stu_sco_attendance', 'Attendance', 'trim|max_length[5]|numeric|less_or_equal[10]');
		$this->form_validation->set_rules('stu_sco_homework', 'Homework/Quiz', 'trim|max_length[5]|numeric|less_or_equal[15]');
		$this->form_validation->set_rules('stu_sco_midterm_exam', 'Midterm/Assignment', 'trim|max_length[5]|numeric|less_or_equal[25]');
		$this->form_validation->set_rules('stu_sco_final_exam', 'Final Exam', 'trim|max_length[5]|numeric|less_or_equal[50]');
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
