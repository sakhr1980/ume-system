<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_Jobtypes extends CI_Model {

	/**
	 * Filter job type
	 *
	 * @param integer $num_row
	 * @param integer $from_row
	 * @return array
	 */
	function findAllJobtypes($num_row, $from_row) {
		$this->db->order_by('job_id', 'desc');

		if ($this->input->post('job_title_en') != '') {
			$this->db->like('job_title_en', $this->input->post('job_title_en'));
		}
		if ($this->input->post('job_title_kh') != '') {
			$this->db->like('job_title_kh', $this->input->post('job_title_kh'));
		}

		// Keep pagination for filter status
		if ($this->input->post('job_status') != '') {
			$this->session->set_userdata('job_status', $this->input->post('job_status'));
		}
		if ($this->input->post('submit') && $this->input->post('job_status') == '') {
			$this->session->set_userdata('job_status', '');
		}
		if ($this->session->userdata('job_status') != '') {
			$this->db->where('job_status', $this->session->userdata('job_status'));
		}

		$this->db->limit($num_row, $from_row);
		$this->db->from(TABLE_PREFIX . 'staff_job_type');
		$this->db->group_by('job_id');
		return $this->db->get();
	}

	/**
	 * Count all jobtype record
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return integer
	 */
	function countAllJobtypes() {

		// Keep pagination for filter status
		if ($this->input->post('job_status') != '') {
			$this->session->set_userdata('job_status', $this->input->post('job_status'));
		}
		if ($this->input->post('submit') && $this->input->post('job_status') == '') {
			$this->session->set_userdata('job_status', '');
		}
		if ($this->session->userdata('job_status') != '') {
			$this->db->where('job_status', $this->session->userdata('job_status'));
		}

		$this->db->from(TABLE_PREFIX . 'staff_job_type');
		$this->db->group_by('job_id');
		$data = $this->db->get();
		return $data->num_rows();
	}

	/**
	 * Create jobtype
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return boolean
	 */
	function add() {
		$data = $this->input->post();
		$this->db->set('job_created', 'NOW()', false);
		$this->db->set('tbl_users_use_id', 1); // TODO: need to be changed
		$result = $this->db->insert(TABLE_PREFIX . 'staff_job_type', $data);
		return $result;
	}

	/**
	 * Update jobtype
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return boolean
	 */
	function update() {
		$data = $this->input->post();
		$this->db->where('job_id', $this->uri->segment(4));
		$this->db->set('job_modified', 'NOW()', false);
		// if checkbox is not checked
		if (empty($data['job_status'])) {
			$this->db->set('job_status', 0);
		}
		return $this->db->update(TABLE_PREFIX . 'staff_job_type', $data);
	}

	/**
	 * Retrive jobtype by id
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id position id
	 * @access public
	 * @return array
	 */
	function getJobtypeById($id) {
		$this->db->where('job_id', $id);
		return $this->db->get(TABLE_PREFIX . 'staff_job_type');
	}

	/**
	 * Discard jobtype
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id position id
	 * @access public
	 * @return boolean
	 */
	function deleteJobtypeById($id = null) {
		$this->db->where('job_id', $id);
		return $this->db->delete(TABLE_PREFIX . 'staff_job_type');
	}

}
