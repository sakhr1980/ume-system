<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_Positions extends CI_Model {

	/**
	 * Filter position
	 *
	 * @param integer $num_row
	 * @param integer $from_row
	 * @return array
	 */
	function findAllPositions($num_row, $from_row) {
		$this->db->order_by('sta_pos_id', 'desc');

		if ($this->input->post('sta_pos_title') != '') {
			$this->db->like('sta_pos_title', $this->input->post('sta_pos_title'));
		}
		if ($this->input->post('sta_pos_title_kh') != '') {
			$this->db->like('sta_pos_title_kh', $this->input->post('sta_pos_title_kh'));
		}

		// Keep pagination for filter status
		if ($this->input->post('sta_pos_status') != '') {
			$this->session->set_userdata('sta_pos_status', $this->input->post('sta_pos_status'));
		}
		if ($this->input->post('submit') && $this->input->post('sta_pos_status') == '') {
			$this->session->set_userdata('sta_pos_status', '');
		}
		if ($this->session->userdata('sta_pos_status') != '') {
			$this->db->where('sta_pos_status', $this->session->userdata('sta_pos_status'));
		}

		$this->db->limit($num_row, $from_row);
		$this->db->from(TABLE_PREFIX . 'staff_position');
		$this->db->group_by('sta_pos_id');
		return $this->db->get();
	}

	/**
	 * Count all positions record
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return integer
	 */
	function countAllPositions() {

		// Keep pagination for filter status
		if ($this->input->post('sta_pos_status') != '') {
			$this->session->set_userdata('sta_pos_status', $this->input->post('sta_pos_status'));
		}
		if ($this->input->post('submit') && $this->input->post('sta_pos_status') == '') {
			$this->session->set_userdata('sta_pos_status', '');
		}
		if ($this->session->userdata('sta_pos_status') != '') {
			$this->db->where('sta_pos_status', $this->session->userdata('sta_pos_status'));
		}

		$this->db->from(TABLE_PREFIX . 'staff_position');
		$this->db->group_by('sta_pos_id');
		$data = $this->db->get();
		return $data->num_rows();
	}

	/**
	 * Create position
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return boolean
	 */
	function add() {
		$data = $this->input->post();
		$this->db->set('sta_pos_created', 'NOW()', false);
		$this->db->set('tbl_users_use_id', 1); // TODO: need to be changed
		$result = $this->db->insert(TABLE_PREFIX . 'staff_position', $data);
		return $result;
	}

	/**
	 * Update position
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return boolean
	 */
	function update() {
		$data = $this->input->post();
		$this->db->where('sta_pos_id', $this->uri->segment(4));
		$this->db->set('sta_pos_modified', 'NOW()', false);
		// if checkbox is not checked
		if (empty($data['sta_pos_status'])) {
			$this->db->set('sta_pos_status', 0);
		}
		return $this->db->update(TABLE_PREFIX . 'staff_position', $data);
	}

	/**
	 * Retrive position by id
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id position id
	 * @access public
	 * @return array
	 */
	function getPositionById($id) {
		$this->db->where('sta_pos_id', $id);
		return $this->db->get(TABLE_PREFIX . 'staff_position');
	}

	/**
	 * Discard position
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id position id
	 * @access public
	 * @return boolean
	 */
	function deletePositionById($id = null) {
		$this->db->where('sta_pos_id', $id);
		return $this->db->delete(TABLE_PREFIX . 'staff_position');
	}

}
