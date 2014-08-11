<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_Rooms extends CI_Model {

	/**
	 * Filter room
	 *
	 * @param integer $num_row
	 * @param integer $from_row
	 * @return array
	 */
	function findAllRooms($num_row, $from_row) {
		$this->db->select(array('t.rom_typ_name', 'r.*'));
		$this->db->order_by('rom_id', 'desc');

		if ($this->input->post('rom_name') != '') {
			$this->db->like('rom_name', $this->input->post('rom_name'));
		}
		if ($this->input->post('rom_building') != '') {
			$this->db->like('rom_building', $this->input->post('rom_building'));
		}
		if ($this->input->post('rom_floor') != '') {
			$this->db->like('rom_floor', $this->input->post('rom_floor'));
		}
		if ($this->input->post('tbl_room_type_rom_typ_id') != '') {
			$this->db->like('tbl_room_type_rom_typ_id', $this->input->post('tbl_room_type_rom_typ_id'));
		}

		// Keep pagination for filter status
		if ($this->input->post('rom_status') != '') {
			$this->session->set_userdata('rom_status', $this->input->post('rom_status'));
		}
		if ($this->input->post('submit') && $this->input->post('rom_status') == '') {
			$this->session->set_userdata('rom_status', '');
		}
		if ($this->session->userdata('rom_status') != '') {
			$this->db->where('rom_status', $this->session->userdata('rom_status'));
		}

		$this->db->limit($num_row, $from_row);
		$this->db->from(TABLE_PREFIX . 'room r');
		$this->db->join(TABLE_PREFIX . 'room_type t', 't.rom_typ_id = r.tbl_room_type_rom_typ_id');
		$this->db->group_by('rom_id');
		return $this->db->get();
	}

	/**
	 * Count all positions record
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return integer
	 */
	function countAllRooms() {

		// Keep pagination for filter status
		if ($this->input->post('rom_status') != '') {
			$this->session->set_userdata('rom_status', $this->input->post('rom_status'));
		}
		if ($this->input->post('submit') && $this->input->post('rom_status') == '') {
			$this->session->set_userdata('rom_status', '');
		}
		if ($this->session->userdata('rom_status') != '') {
			$this->db->where('rom_status', $this->session->userdata('rom_status'));
		}

		$this->db->from(TABLE_PREFIX . 'room');
		$this->db->group_by('rom_id');
		$data = $this->db->get();
		return $data->num_rows();
	}

	/**
	 * Create room
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return boolean
	 */
	function add() {
		$data = $this->input->post();
		$this->db->set('rom_created', 'NOW()', false);
		$result = $this->db->insert(TABLE_PREFIX . 'room', $data);
		return $result;
	}

	/**
	 * Update room
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return boolean
	 */
	function update() {
		$data = $this->input->post();
		$this->db->where('rom_id', $this->uri->segment(4));
		$this->db->set('rom_modified', 'NOW()', false);
		// if checkbox is not checked
		if (empty($data['rom_status'])) {
			$this->db->set('rom_status', 0);
		}
		return $this->db->update(TABLE_PREFIX . 'room', $data);
	}

	/**
	 * Retrive room by id
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id room id
	 * @access public
	 * @return array
	 */
	function getRoomById($id) {
		return $this->db->select(array('t.rom_typ_name', 'r.*'))
				->from(TABLE_PREFIX . 'room r')
				->join(TABLE_PREFIX . 'room_type t', 't.rom_typ_id = r.tbl_room_type_rom_typ_id')
				->where('rom_id', $id)
				->get();
	}

	/**
	 * Discard room
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id room id
	 * @access public
	 * @return boolean
	 */
	function deleteRoomById($id = null) {
		$this->db->where('rom_id', $id);
		return $this->db->delete(TABLE_PREFIX . 'room');
	}

}
