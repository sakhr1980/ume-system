<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Manipulation of Job Types
 *
 * @author Man Math <manmath4@gmail.com>
 */
class Jobtypes extends CI_Controller {

	/**
	 * @var array
	 */
	var $data = array('title' => null, 'content' => 'missing_view');

	/**
	 * Constuctor
	 */
	function __construct() {
		parent::__construct();
		$this->load->model(array('staffs/m_jobtypes'));
	}

	/**
	 * Retrive job type
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return void
	 */
	function index() {
		$this->data['title'] = 'Manage Staffs Job Type';
		$this->data['content'] = 'staffs/jobtypes/index';

		$this->form_validation->set_rules('sta_job_title', '', 'trim');
		$this->form_validation->set_rules('sta_job_title_kh', '', 'trim');
		$this->form_validation->set_rules('sta_job_status', '', 'trim');

		$this->form_validation->run();
		$this->data['data'] = $this->m_jobtypes->findAllJobtypes(PAGINGATION_PERPAGE, $this->uri->segment(4));
		pagination_config(base_url() . 'staffs/jobtypes/index', $this->m_jobtypes->countAllJobtypes(), PAGINGATION_PERPAGE);
		$this->load->view(LAYOUT, $this->data);
	}

	/**
	 * Create job type
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return void
	 */
	function add() {
		$this->data['title'] = 'Add New Job Type';
		$this->data['content'] = 'staffs/jobtypes/add';

		$this->form_validation->set_rules('sta_job_title', 'Title in Latin', 'required|max_length[50]|min_length[2]|is_unique[' . TABLE_PREFIX . 'staff_job_type.sta_job_title]');
		$this->form_validation->set_rules('sta_job_title_kh', 'Title in Khmer', 'max_length[50]|min_length[2]|is_unique[' . TABLE_PREFIX . 'staff_job_type.sta_job_title_kh]');
		$this->form_validation->set_rules('sta_job_description', 'Description', 'trim|max_length[250]');
		$this->form_validation->set_rules('sta_job_status', '', 'trim');
		$this->form_validation->set_checkbox('sta_job_status');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view(LAYOUT, $this->data);
		} else {
			if ($this->m_jobtypes->add()) {
				$this->session->set_flashdata('message', alert("Job type has been saved!", 'success'));
				redirect('staffs/jobtypes');
			} else {
				$this->session->set_flashdata('message', alert("Job type cannot be added, please try again", 'danger'));
				redirect('staffs/jobtypes/add');
			}
		}
	}

	/**
	 * Update Job type
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id jobtype id <segment(4)>
	 * @access public
	 * @return void
	 */
	function edit($id = 0) {
		$this->data['title'] = 'Edit Job Type';
		$this->data['content'] = 'staffs/jobtypes/edit';
		$this->data['data'] = $this->m_jobtypes->getJobtypeById($id);

		$this->form_validation->set_rules('sta_job_title', 'Title in Latin', 'required|min_length[2]|max_length[50]|callback_uniqueExcept[' . TABLE_PREFIX . 'staff_job_type.sta_job_title,sta_job_id]');
		$this->form_validation->set_rules('sta_job_title_kh', 'Title in Khmer', 'min_length[2]|max_length[50]|callback_uniqueExcept[' . TABLE_PREFIX . 'staff_job_type.sta_job_title_kh,sta_job_id]');
		$this->form_validation->set_rules('sta_job_description', 'Description', 'trim|max_length[250]');
		$this->form_validation->set_rules('sta_job_status', '', 'trim');
		$this->form_validation->set_checkbox('sta_job_status');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view(LAYOUT, $this->data);
		} else {
			if ($this->m_jobtypes->update()) {
				$this->session->set_flashdata('message', alert("Job type has been updated!", 'success'));
				redirect('staffs/jobtypes/index/' . $this->uri->segment(5));
			} else {
				$this->session->set_flashdata('message', alert("Job type cannot be updated, please try again", 'danger'));
				$s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
				redirect('staffs/jobtypes/edit/' . $this->uri->segment(4) . $s5);
			}
		}
	}

	/**
	 * Discard job type
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id jobtype id <segment(4)>
	 * @access public
	 * @return void
	 */
	function delete($id) {
		if ($this->m_jobtypes->deleteJobtypeById($id)) {
			$this->session->set_flashdata('message', alert("Job type has been deleted!", 'success'));
			redirect('staffs/jobtypes/index/' . $this->uri->segment(5));
		} else {
			$this->session->set_flashdata('message', alert("Job type cannot be deleted, please try again!", 'danger'));
			redirect('staffs/jobtypes/index/' . $this->uri->segment(5));
		}
	}

	/**
	 * View job type
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id jobtype id <segment(4)>
	 * @access public
	 * @return void
	 */
	function view($id = null) {
		$this->data['title'] = 'View Position';
		$this->data['content'] = 'staffs/jobtypes/view';

		$this->data['data'] = $this->m_jobtypes->getJobtypeById($id);
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
			$this->form_validation->set_message('uniqueExcept', $str . ' already exist, please enter another one');
			return FALSE;
		} else {
			return TRUE;
		}
	}

}
