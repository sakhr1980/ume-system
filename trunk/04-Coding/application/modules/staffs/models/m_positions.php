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
		$this->db->order_by('pos_id', 'desc');

		if ($this->input->post('pos_title_en') != '') {
			$this->db->like('pos_title_en', $this->input->post('pos_title_en'));
		}
		if ($this->input->post('pos_title_kh') != '') {
			$this->db->like('pos_title_kh', $this->input->post('pos_title_kh'));
		}

		// Keep pagination for filter status
		if ($this->input->post('pos_status') != '') {
			$this->session->set_userdata('pos_status', $this->input->post('pos_status'));
		}
		if ($this->input->post('submit') && $this->input->post('pos_status') == '') {
			$this->session->set_userdata('pos_status', '');
		}
		if ($this->session->userdata('pos_status') != '') {
			$this->db->where('pos_status', $this->session->userdata('pos_status'));
		}

		$this->db->limit($num_row, $from_row);
		$this->db->from(TABLE_PREFIX . 'staff_position');
		$this->db->group_by('pos_id');
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
		if ($this->input->post('pos_status') != '') {
			$this->session->set_userdata('pos_status', $this->input->post('pos_status'));
		}
		if ($this->input->post('submit') && $this->input->post('pos_status') == '') {
			$this->session->set_userdata('pos_status', '');
		}
		if ($this->session->userdata('pos_status') != '') {
			$this->db->where('pos_status', $this->session->userdata('pos_status'));
		}

		$this->db->from(TABLE_PREFIX . 'staff_position');
		$this->db->group_by('pos_id');
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
		$this->db->set('pos_created', 'NOW()', false);
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
		$this->db->where('pos_id', $this->uri->segment(4));
		$this->db->set('pos_modified', 'NOW()', false);
		// if checkbox is not checked
		if (empty($data['pos_status'])) {
			$this->db->set('pos_status', 0);
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
		$this->db->where('pos_id', $id);
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
		$this->db->where('pos_id', $id);
		return $this->db->delete(TABLE_PREFIX . 'staff_position');
	}

}
