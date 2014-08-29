<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_Staffs extends CI_Model {

	/**
	 * Filter staff
	 *
	 * @param integer $num_row
	 * @param integer $from_row
	 * @return array
	 */
	function findAllStaffs($num_row, $from_row) {
		$this->db->select(array('s.*', 'p.sta_pos_title', 'j.sta_job_title'));
		$this->db->order_by('s.sta_id', 'desc');

		if ($this->input->post('sta_card_id') != '') {
			$this->db->like('s.sta_card_id', $this->input->post('sta_card_id'));
		}
		if ($this->input->post('sta_name') != '') {
			$this->db->like('s.sta_name', $this->input->post('sta_name'));
		}
		if ($this->input->post('sta_name_kh') != '') {
			$this->db->like('s.sta_name_kh', $this->input->post('sta_name_kh'));
		}
		if ($this->input->post('sta_job_type') != '') {
			$this->db->like('s.sta_job_type', $this->input->post('sta_job_type'));
		}

		// Keep pagination for filter status
		if ($this->input->post('sta_status') != '') {
			$this->session->set_userdata('sta_status', $this->input->post('sta_status'));
		}
		if ($this->input->post('submit') && $this->input->post('sta_status') == '') {
			$this->session->set_userdata('sta_status', '');
		}
		if ($this->session->userdata('sta_status') != '') {
			$this->db->where('s.sta_status', $this->session->userdata('sta_status'));
		}

		$this->db->where('s.sta_position !=', 'Teacher');
		$this->db->limit($num_row, $from_row);
		$this->db->from(TABLE_PREFIX . 'staff');
		$this->db->join(TABLE_PREFIX . 'staff_position p', 'p.sta_pos_id = s.sta_position');
		$this->db->join(TABLE_PREFIX . 'staff_job_type j', 'j.sta_job_id = s.sta_job_type');
		$this->db->group_by('s.sta_id');
		return $this->db->get();
	}

	/**
	 * Count all staffs record
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return integer
	 */
	function countAllStaffs() {

		// Keep pagination for filter status
		if ($this->input->post('sta_status') != '') {
			$this->session->set_userdata('sta_status', $this->input->post('sta_tatus'));
		}
		if ($this->input->post('submit') && $this->input->post('sta_status') == '') {
			$this->session->set_userdata('sta_status', '');
		}
		if ($this->session->userdata('sta_status') != '') {
			$this->db->where('sta_status', $this->session->userdata('sta_status'));
		}

		$this->db->where('sta_position !=', 'Teacher');
		$this->db->from(TABLE_PREFIX . 'staff');
		$this->db->group_by('sta_id');
		$data = $this->db->get();
		return $data->num_rows();
	}

	/**
	 * Create staff
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return boolean
	 */
	function add() {
		$data = $this->input->post();
		$this->db->set('sta_created', 'NOW()', false);
		$this->db->set('tbl_users_use_id', 1); // TODO: need to be changed
		$result = $this->db->insert(TABLE_PREFIX . 'staff', $data);
		return $result;
	}

	/**
	 * Update staff
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return boolean
	 */
	function update() {
		$data = $this->input->post();
		$this->db->where('sta_id', $this->uri->segment(4));
		$this->db->set('sta_modified', 'NOW()', false);
		// if checkbox is not checked
		if (empty($data['sta_status'])) {
			$this->db->set('sta_status', 0);
		}
		return $this->db->update(TABLE_PREFIX . 'staff', $data);
	}

	/**
	 * Retrive staffs by id
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id staffs id
	 * @access public
	 * @return array
	 */
	function getStaffById($id) {
		$this->db->select(array('s.*', 'p.sta_pos_title', 'j.sta_job_title'));
		$this->db->from(TABLE_PREFIX . 'staff');
		$this->db->join(TABLE_PREFIX . 'staff_position p', 'p.sta_pos_id = s.sta_position');
		$this->db->join(TABLE_PREFIX . 'staff_job_type j', 'j.sta_job_id = s.sta_job_type');
		$this->db->where('s.sta_id', $id);
		return $this->db->get();
	}

	/**
	 * Discard staff
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id staff id
	 * @access public
	 * @return boolean
	 */
	function deleteStaffById($id = null) {
		$this->db->where('sta_id', $id);
		return $this->db->delete(TABLE_PREFIX . 'staff');
	}

}
