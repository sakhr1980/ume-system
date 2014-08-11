<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Manipulation of Positions
 *
 * @author Man Math <manmath4@gmail.com>
 */
class Positions extends CI_Controller {

	/**
	 * @var array
	 */
	var $data = array('title' => null, 'content' => 'missing_view');

	/**
	 * Constuctor
	 */
	function __construct() {
		parent::__construct();
		$this->load->model(array('staffs/m_positions'));
	}

	/**
	 * Retrive position
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return void
	 */
	function index() {
		$this->data['title'] = 'Manage Staffs Position';
		$this->data['content'] = 'staffs/positions/index';

		$this->form_validation->set_rules('pos_title_en', '', 'trim');
		$this->form_validation->set_rules('pos_title_kh', '', 'trim');
		$this->form_validation->set_rules('pos_status', '', 'trim');

		$this->form_validation->run();
		$this->data['data'] = $this->m_positions->findAllPositions(PAGINGATION_PERPAGE, $this->uri->segment(4));
		pagination_config(base_url() . 'staffs/positions/index', $this->m_positions->countAllPositions(), PAGINGATION_PERPAGE);
		$this->load->view(LAYOUT, $this->data);
	}

	/**
	 * Create position
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return void
	 */
	function add() {
		$this->data['title'] = 'Add New Position';
		$this->data['content'] = 'staffs/positions/add';

		$this->form_validation->set_rules('pos_title_en', 'Title in Latin', 'required|max_length[50]|min_length[2]|is_unique[' . TABLE_PREFIX . 'staff_position.pos_title_en]');
		$this->form_validation->set_rules('pos_title_kh', 'Title in Khmer', 'max_length[50]|min_length[2]|is_unique[' . TABLE_PREFIX . 'staff_position.pos_title_kh]');
		$this->form_validation->set_rules('pos_description', 'Description', 'trim|max_length[250]');
		$this->form_validation->set_rules('pos_status', '', 'trim');
		$this->form_validation->set_checkbox('pos_status');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view(LAYOUT, $this->data);
		} else {
			if ($this->m_positions->add()) {
				$this->session->set_flashdata('message', alert("Position has been saved!", 'success'));
				redirect('staffs/positions');
			} else {
				$this->session->set_flashdata('message', alert("Position cannot be added, please try again", 'danger'));
				redirect('staffs/positions/add');
			}
		}
	}

	/**
	 * Update Position
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id position id <segment(4)>
	 * @access public
	 * @return void
	 */
	function edit($id = 0) {
		$this->data['title'] = 'Edit Position';
		$this->data['content'] = 'staffs/positions/edit';
		$this->data['data'] = $this->m_positions->getPositionById($id);

		$this->form_validation->set_rules('pos_title_en', 'Title in Latin', 'required|min_length[2]|max_length[50]|callback_uniqueExcept[' . TABLE_PREFIX . 'staff_position.pos_title_en,pos_id]');
		$this->form_validation->set_rules('pos_title_kh', 'Title in Khmer', 'min_length[2]|max_length[50]|callback_uniqueExcept[' . TABLE_PREFIX . 'staff_position.pos_title_kh,pos_id]');
		$this->form_validation->set_rules('pos_description', 'Description', 'trim|max_length[250]');
		$this->form_validation->set_rules('pos_status', '', 'trim');
		$this->form_validation->set_checkbox('pos_status');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view(LAYOUT, $this->data);
		} else {
			if ($this->m_positions->update()) {
				$this->session->set_flashdata('message', alert("Position has been updated!", 'success'));
				redirect('staffs/positions/index/' . $this->uri->segment(5));
			} else {
				$this->session->set_flashdata('message', alert("Position cannot be updated, please try again", 'danger'));
				$s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
				redirect('staffs/positions/edit/' . $this->uri->segment(4) . $s5);
			}
		}
	}

	/**
	 * Discard position
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id position id <segment(4)>
	 * @access public
	 * @return void
	 */
	function delete($id) {
		if ($this->m_positions->deletePositionById($id)) {
			$this->session->set_flashdata('message', alert("Position has been deleted!", 'success'));
			redirect('staffs/positions/index/' . $this->uri->segment(5));
		} else {
			$this->session->set_flashdata('message', alert("Position cannot be deleted, please try again!", 'danger'));
			redirect('staffs/positions/index/' . $this->uri->segment(5));
		}
	}

	/**
	 * View position
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id position id <segment(4)>
	 * @access public
	 * @return void
	 */
	function view($id = null) {
		$this->data['title'] = 'View Position';
		$this->data['content'] = 'staffs/positions/view';

		$this->data['data'] = $this->m_positions->getPositionById($id);
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
