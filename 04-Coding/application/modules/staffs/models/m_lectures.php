<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_Lectures extends CI_Model {

	/**
	 * Filter lecture
	 *
	 * @param integer $num_row
	 * @param integer $from_row
	 * @return array
	 */
	function findAllLectures($num_row, $from_row) {
		$this->db->order_by('sta_id', 'desc');

		if ($this->input->post('sta_card_id') != '') {
			$this->db->like('sta_card_id', $this->input->post('sta_card_id'));
		}
		if ($this->input->post('sta_name') != '') {
			$this->db->like('sta_name', $this->input->post('sta_name'));
		}
		if ($this->input->post('sta_name_kh') != '') {
			$this->db->like('sta_name_kh', $this->input->post('sta_name_kh'));
		}
		if ($this->input->post('sta_email') != '') {
			$this->db->like('sta_email', $this->input->post('sta_email'));
		}
		if ($this->input->post('sta_sex') != '') {
			$this->db->like('sta_sex', $this->input->post('sta_sex'));
		}

		// Keep pagination for filter status
		if ($this->input->post('sta_status') != '') {
			$this->session->set_userdata('sta_status', $this->input->post('sta_status'));
		}
		if ($this->input->post('submit') && $this->input->post('sta_status') == '') {
			$this->session->set_userdata('sta_status', '');
		}
		if ($this->session->userdata('sta_status') != '') {
			$this->db->where('sta_status', $this->session->userdata('sta_status'));
		}

		$this->db->limit($num_row, $from_row);
		$this->db->from(TABLE_PREFIX . 'staffs');
		$this->db->group_by('sta_id');
		return $this->db->get();
	}

	/**
	 * Count all lectures record
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return integer
	 */
	function countAllLectures() {

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

		$this->db->from(TABLE_PREFIX . 'staffs');
		$this->db->group_by('sta_id');
		$data = $this->db->get();
		return $data->num_rows();
	}

	/**
	 * Create lecture
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return boolean
	 */
	function add() {
		$data = $this->input->post();
		$this->db->set('sta_created', 'NOW()', false);
		$result = $this->db->insert(TABLE_PREFIX . 'staffs', $data);
		return $result;
	}

	/**
	 * Update lecture
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
		return $this->db->update(TABLE_PREFIX . 'staffs', $data);
	}

	/**
	 * Retrive lecture by id
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id lecture id
	 * @access public
	 * @return array
	 */
	function getLectureById($id) {
		$this->db->where('sta_id', $id);
		return $this->db->get(TABLE_PREFIX . 'staffs');
	}

	/**
	 * Discard lecture
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id lecture id
	 * @access public
	 * @return boolean
	 */
	function deleteLectureById($id = null) {
		$this->db->where('sta_id', $id);
		return $this->db->delete(TABLE_PREFIX . 'staffs');
	}

}
