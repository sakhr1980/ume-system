<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_Roomtypes extends CI_Model {

	/**
	 * Filter room type
	 *
	 * @param integer $num_row
	 * @param integer $from_row
	 * @return array
	 */
	function findAllRoomtypes($num_row, $from_row) {
		$this->db->order_by('rom_typ_id', 'desc');

		if ($this->input->post('rom_typ_name') != '') {
			$this->db->like('rom_typ_name', $this->input->post('rom_typ_name'));
		}

		// Keep pagination for filter status
		if ($this->input->post('rom_typ_status') != '') {
			$this->session->set_userdata('rom_typ_status', $this->input->post('rom_typ_status'));
		}
		if ($this->input->post('submit') && $this->input->post('rom_typ_status') == '') {
			$this->session->set_userdata('rom_typ_status', '');
		}
		if ($this->session->userdata('rom_typ_status') != '') {
			$this->db->where('rom_typ_status', $this->session->userdata('rom_typ_status'));
		}

		$this->db->limit($num_row, $from_row);
		$this->db->from(TABLE_PREFIX . 'room_type');
		$this->db->group_by('rom_typ_id');
		return $this->db->get();
	}

	/**
	 * Count all roomtype record
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return integer
	 */
	function countAllRoomtypes() {

		// Keep pagination for filter status
		if ($this->input->post('rom_typ_status') != '') {
			$this->session->set_userdata('rom_typ_status', $this->input->post('rom_typ_status'));
		}
		if ($this->input->post('submit') && $this->input->post('rom_typ_status') == '') {
			$this->session->set_userdata('rom_typ_status', '');
		}
		if ($this->session->userdata('rom_typ_status') != '') {
			$this->db->where('rom_typ_status', $this->session->userdata('rom_typ_status'));
		}

		$this->db->from(TABLE_PREFIX . 'room_type');
		$this->db->group_by('rom_typ_id');
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
		$this->db->set('rom_typ_created', 'NOW()', false);
		$result = $this->db->insert(TABLE_PREFIX . 'room_type', $data);
		return $result;
	}

	/**
	 * Update roomtype
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return boolean
	 */
	function update() {
		$data = $this->input->post();
		$this->db->where('rom_typ_id', $this->uri->segment(4));
		$this->db->set('rom_typ_modified', 'NOW()', false);
		// if checkbox is not checked
		if (empty($data['rom_typ_status'])) {
			$this->db->set('rom_typ_status', 0);
		}
		return $this->db->update(TABLE_PREFIX . 'room_type', $data);
	}

	/**
	 * Retrive roomtype by id
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id room type id
	 * @access public
	 * @return array
	 */
	function getRoomtypeById($id) {
		$this->db->where('rom_typ_id', $id);
		return $this->db->get(TABLE_PREFIX . 'room_type');
	}

	/**
	 * Discard roomtype
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id room type id
	 * @access public
	 * @return boolean
	 */
	function deleteRoomtypeById($id = null) {
		$this->db->where('rom_typ_id', $id);
		return $this->db->delete(TABLE_PREFIX . 'room_type');
	}

}
