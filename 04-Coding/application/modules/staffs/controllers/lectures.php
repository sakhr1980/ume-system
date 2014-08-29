<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Manipulation of Lecture
 *
 * @author Man Math <manmath4@gmail.com>
 */
class Lectures extends CI_Controller {

	/**
	 * @var array
	 */
	var $data = array('title' => null, 'content' => 'missing_view');

	/**
	 * Constuctor
	 */
	function __construct() {
		parent::__construct();
		$this->load->model(array('staffs/m_lectures'));
	}

	/**
	 * Retrive lecture
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return void
	 */
	function index() {
		$this->data['title'] = 'Manage Lecture Account';
		$this->data['content'] = 'staffs/lectures/index';

		$this->form_validation->set_rules('sta_card_id', '', 'trim');
		$this->form_validation->set_rules('sta_name', '', 'trim');
		$this->form_validation->set_rules('sta_name_kh', '', 'trim');
		$this->form_validation->set_rules('sta_sex', '', 'trim');
		$this->form_validation->set_rules('sta_status', '', 'trim');

		$this->form_validation->run();
		$this->data['data'] = $this->m_lectures->findAllLectures(PAGINGATION_PERPAGE, $this->uri->segment(4));
		pagination_config(base_url() . 'staffs/lectures/index', $this->m_lectures->countAllLectures(), PAGINGATION_PERPAGE);
		$this->load->view(LAYOUT, $this->data);
	}

	/**
	 * Create lecture
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return void
	 */
	function add() {
		$this->data['title'] = 'Add new lecture';
		$this->data['content'] = 'staffs/lectures/add';

		$this->form_validation->set_rules('sta_card_id', 'Card ID', 'required|exact_length[5]|is_unique[' . TABLE_PREFIX . 'staff.sta_card_id]');
		$this->form_validation->set_rules('sta_name', 'Name in latin', 'required|max_length[50]|min_length[3]');
		$this->form_validation->set_rules('sta_name_kh', 'Name in khmer', 'required|max_length[50]|min_length[3]');
		$this->form_validation->set_rules('sta_email', 'Email', 'valid_email|is_unique[tbl_staffs.sta_email]');
		$this->form_validation->set_rules('sta_sex', '', 'trim');
		$this->form_validation->set_rules('sta_address', '', 'trim');
		$this->form_validation->set_rules('sta_status', '', 'trim');
		$this->form_validation->set_select('sta_sex');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view(LAYOUT, $this->data);
		} else {
			if ($this->m_lectures->add()) {
				$this->session->set_flashdata('message', alert("Lecture account has been saved!", 'success'));
				redirect('staffs/lectures');
			} else {
				$this->session->set_flashdata('message', alert("Lecture account cannot be added, please try again", 'danger'));
				redirect('staffs/lectures/add');
			}
		}
	}

	/**
	 * Update lecture
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id lecture id <segment(4)>
	 * @access public
	 * @return void
	 */
	function edit($id = 0) {
		$this->data['title'] = 'Edit Lecture';
		$this->data['content'] = 'staffs/lectures/edit';
		$this->data['data'] = $this->m_lectures->getLectureById($id);

		$this->form_validation->set_rules('sta_card_id', 'Card ID', 'required|exact_length[5]|callback_uniqueExcept[' . TABLE_PREFIX . 'staffs.sta_card_id,sta_id]');
		$this->form_validation->set_rules('sta_name', 'Name in latin', 'required|max_length[50]|min_length[3]');
		$this->form_validation->set_rules('sta_name_kh', 'Name in khmer', 'required|max_length[50]|min_length[3]');
		$this->form_validation->set_rules('sta_email', 'Email', 'required|valid_email|callback_uniqueExcept[' . TABLE_PREFIX . 'staffs.sta_email,sta_id]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view(LAYOUT, $this->data);
		} else {
			if ($this->m_lectures->update()) {
				$this->session->set_flashdata('message', alert("Lecture account has been updated!", 'success'));
				redirect('staffs/lectures/index/' . $this->uri->segment(5));
			} else {
				$this->session->set_flashdata('message', alert("Lecture account cannot be updated, please try again", 'danger'));
				$s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
				redirect('staffs/lectures/edit/' . $this->uri->segment(4) . $s5);
			}
		}
	}

	/**
	 * Discard lecture
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id lecture id <segment(4)>
	 * @access public
	 * @return void
	 */
	function delete($id) {
		if ($this->m_lectures->deleteLectureById($id)) {
			$this->session->set_flashdata('message', alert("Lecture account has been deleted!", 'success'));
			redirect('staffs/lectures/index/' . $this->uri->segment(5));
		} else {
			$this->session->set_flashdata('message', alert("Lecture account cannot be deleted, please try again!", 'danger'));
			redirect('staffs/lectures/index/' . $this->uri->segment(5));
		}
	}

	/**
	 * View lecture profile
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id lecture id <segment(4)>
	 * @access public
	 * @return void
	 */
	function view($id = null) {
		$this->data['title'] = 'View Lecture Profile';
		$this->data['content'] = 'staffs/lectures/view';

		$this->data['data'] = $this->m_lectures->getLectureById($id);
		$this->load->view(LAYOUT, $this->data);
	}

	/**
	 * Validation unique field
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param string $str field to validate
	 * @access public
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
			$this->form_validation->set_message('uniqueExcept', '%s already exist, please enter another one');
			return FALSE;
		} else {
			return TRUE;
		}
	}

}
