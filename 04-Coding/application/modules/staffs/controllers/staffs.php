<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Manipulation of Staffs
 *
 * @author Man Math <manmath4@gmail.com>
 */
class Staffs extends CI_Controller {

	/**
	 * @var array
	 */
	var $data = array('title' => null, 'content' => 'missing_view');

	/**
	 * Constuctor
	 */
	function __construct() {
		parent::__construct();
		$this->load->model(array('staffs/m_staffs'));
	}

	/**
	 * Retrive staff
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return void
	 */
	function index() {
		$this->data['title'] = 'Manage Staffs Account';
		$this->data['content'] = 'staffs/staffs/index';

		$this->form_validation->set_rules('sta_card_id', '', 'trim');
		$this->form_validation->set_rules('sta_name', '', 'trim');
		$this->form_validation->set_rules('sta_name_kh', '', 'trim');
		$this->form_validation->set_rules('sta_job_type', '', 'trim');
		$this->form_validation->set_rules('sta_status', '', 'trim');

		$this->form_validation->run();
		$this->data['jobtypes'] = $this->m_global->getDataArray(TABLE_PREFIX . 'staff_job_type', 'sta_job_id', 'sta_job_title', 'sta_job_status');
		$this->data['data'] = $this->m_staffs->findAllStaffs(PAGINGATION_PERPAGE, $this->uri->segment(4));
		pagination_config(base_url() . 'staffs/staffs/index', $this->m_staffs->countAllStaffs(), PAGINGATION_PERPAGE);
		$this->load->view(LAYOUT, $this->data);
	}

	/**
	 * Create staff
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return void
	 */
	function add() {
		$this->data['title'] = 'Add New Staff';
		$this->data['content'] = 'staffs/staffs/add';

		$config = array(
			array(
				'field' => 'sta_card_id',
				'label' => 'Card ID',
				'rules' => 'trim|required|exact_length[5]|is_unique[tbl_staff.sta_card_id]'
			),
			array(
				'field' => 'sta_name',
				'label' => 'Name in latin',
				'rules' => 'trim|required|max_length[50]|min_length[3]'
			),
			array(
				'field' => 'sta_name_kh',
				'label' => 'Name in khmer',
				'rules' => 'trim|max_length[50]|min_length[3]'
			),
			array(
				'field' => 'sta_phone',
				'label' => 'Mobile Phone',
				'rules' => 'trim|min_length[9]|max_length[30]'
			),
			array(
				'field' => 'sta_email',
				'label' => 'Email',
				'rules' => 'trim|valid_email|is_unique[tbl_staff.sta_email]'
			),
			array(
				'field' => 'sta_sex',
				'label' => 'Email',
				'rules' => 'trim'
			),
			array(
				'field' => 'sta_address',
				'label' => '',
				'rules' => 'trim'
			),
			array(
				'field' => 'sta_position',
				'label' => '',
				'rules' => 'trim'
			),
			array(
				'field' => 'sta_job_type',
				'label' => '',
				'rules' => 'trim'
			),
			array(
				'field' => 'sta_start_date',
				'label' => 'Start Date',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'sta_status',
				'label' => '',
				'rules' => 'trim'
			)
		);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_select('sta_position');
		$this->form_validation->set_select('sta_job_type');
		$this->form_validation->set_select('sta_sex');
		$this->form_validation->set_checkbox('sta_status');
		if ($this->form_validation->run() == FALSE) {
			$this->data['positions'] = $this->m_global->getDataArray(TABLE_PREFIX . 'staff_position', 'sta_pos_id', 'sta_pos_title', 'sta_pos_status');
			$this->data['jobtypes'] = $this->m_global->getDataArray(TABLE_PREFIX . 'staff_job_type', 'sta_job_id', 'sta_job_title', 'sta_job_status');
			$this->load->view(LAYOUT, $this->data);
		} else {
			if ($this->m_staffs->add()) {
				$this->session->set_flashdata('message', alert("Staff account has been saved!", 'success'));
				redirect('staffs/staffs');
			} else {
				$this->session->set_flashdata('message', alert("Staff account cannot be added, please try again", 'danger'));
				redirect('staffs/staffs/add');
			}
		}
	}

	/**
	 * Update staff
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id staff id <segment(4)>
	 * @access public
	 * @return void
	 */
	function edit($id = 0) {
		$this->data['title'] = 'Edit Staff';
		$this->data['content'] = 'staffs/staffs/edit';
		$this->data['data'] = $this->m_staffs->getStaffById($id);
		$config = array(
			array(
				'field' => 'sta_name',
				'label' => 'Name in latin',
				'rules' => 'trim|required|max_length[50]|min_length[3]'
			),
			array(
				'field' => 'sta_name_kh',
				'label' => 'Name in khmer',
				'rules' => 'trim|max_length[50]|min_length[3]'
			),
			array(
				'field' => 'sta_phone',
				'label' => 'Mobile Phone',
				'rules' => 'trim|min_length[9]|max_length[30]'
			),
			array(
				'field' => 'sta_email',
				'label' => 'Email',
				'rules' => 'trim|valid_email|callback_uniqueExcept[' . TABLE_PREFIX . 'staff.sta_email,sta_id]'
			),
			array(
				'field' => 'sta_sex',
				'label' => 'Email',
				'rules' => 'trim'
			),
			array(
				'field' => 'sta_address',
				'label' => '',
				'rules' => 'trim'
			),
			array(
				'field' => 'sta_position',
				'label' => '',
				'rules' => 'trim'
			),
			array(
				'field' => 'sta_job_type',
				'label' => '',
				'rules' => 'trim'
			),
			array(
				'field' => 'sta_start_date',
				'label' => 'Start Date',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'sta_status',
				'label' => '',
				'rules' => 'trim'
			)
		);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_select('sta_position');
		$this->form_validation->set_select('sta_job_type');
		$this->form_validation->set_select('sta_sex');
		$this->form_validation->set_checkbox('sta_status');
		if ($this->form_validation->run() == FALSE) {
			$this->data['positions'] = $this->m_global->getDataArray(TABLE_PREFIX . 'staff_position', 'sta_pos_id', 'sta_pos_title', 'sta_pos_status');
			$this->data['jobtypes'] = $this->m_global->getDataArray(TABLE_PREFIX . 'staff_job_type', 'sta_job_id', 'sta_job_title', 'sta_job_status');
			$this->load->view(LAYOUT, $this->data);
		} else {
			if ($this->m_staffs->update()) {
				$this->session->set_flashdata('message', alert("Staff account has been updated!", 'success'));
				redirect('staffs/staffs/index/' . $this->uri->segment(5));
			} else {
				$this->session->set_flashdata('message', alert("Staff account cannot be updated, please try again", 'danger'));
				$s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
				redirect('staffs/staffs/edit/' . $this->uri->segment(4) . $s5);
			}
		}
	}

	/**
	 * Discard staff
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id staff id <segment(4)>
	 * @access public
	 * @return void
	 */
	function delete($id) {
		if ($this->m_staffs->deleteStaffById($id)) {
			$this->session->set_flashdata('message', alert("Staff account has been deleted!", 'success'));
			redirect('staffs/staffs/index/' . $this->uri->segment(5));
		} else {
			$this->session->set_flashdata('message', alert("Staff account cannot be deleted, please try again!", 'danger'));
			redirect('staffs/staffs/index/' . $this->uri->segment(5));
		}
	}

	/**
	 * View staff profile
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id staff id <segment(4)>
	 * @access public
	 * @return void
	 */
	function view($id = null) {
		$this->data['title'] = 'View Staff Profile';
		$this->data['content'] = 'staffs/staffs/view';

		$this->data['data'] = $this->m_staffs->getStaffById($id);
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

	/**
	 * Export staffs to csv file
	 */
	public function exportcsv() {
		$result = $this->m_staffs->exportcsv();
		if (query_to_csv($result, TRUE, 'STAFF-' . date('Y-m-d', time()) . '.csv')) {
			redirect('staffs/staffs/index/');
		}
	}

}
