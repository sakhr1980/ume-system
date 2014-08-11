<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Manipulation of Rooms
 *
 * @author Man Math <manmath4@gmail.com>
 */
class Rooms extends CI_Controller {

	/**
	 * @var array
	 */
	var $data = array('title' => null, 'content' => 'missing_view');

	/**
	 * Constuctor
	 */
	function __construct() {
		parent::__construct();
		$this->load->model(array('rooms/m_rooms'));
	}

	/**
	 * Retrive room
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return void
	 */
	function index() {
		$this->data['title'] = 'Manage Rooms';
		$this->data['content'] = 'rooms/rooms/index';

		$this->form_validation->set_rules('rom_name', '', 'trim');
		$this->form_validation->set_rules('rom_building', '', 'trim');
		$this->form_validation->set_rules('rom_floor', '', 'trim');
		$this->form_validation->set_rules('tbl_room_type_rom_typ_id', '', 'trim');
		$this->form_validation->set_rules('rom_status', '', 'trim');

		$this->form_validation->run();
		$this->data['data'] = $this->m_rooms->findAllRooms(PAGINGATION_PERPAGE, $this->uri->segment(4));
		$this->data['types'] = $this->m_global->getDataArray(TABLE_PREFIX . 'room_type', 'rom_typ_id', 'rom_typ_name', 'rom_typ_status');
		pagination_config(base_url() . 'rooms/rooms/index', $this->m_rooms->countAllRooms(), PAGINGATION_PERPAGE);
		$this->load->view(LAYOUT, $this->data);
	}

	/**
	 * Create room
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return void
	 */
	function add() {
		$this->data['title'] = 'Add New Room';
		$this->data['content'] = 'rooms/rooms/add';

		$this->form_validation->set_rules('rom_name', 'Name', 'required|trim|max_length[50]|min_length[2]|is_unique[' . TABLE_PREFIX . 'room.rom_name]');
		$this->form_validation->set_rules('rom_building', 'Building', 'required|trim|max_length[50]|min_length[1]');
		$this->form_validation->set_rules('rom_floor', 'Floor', 'required|trim|max_length[3]|min_length[1]');
		$this->form_validation->set_rules('rom_available_people', 'Amount of People', 'required|trim|max_length[4]|min_length[1]');
		$this->form_validation->set_rules('tbl_room_type_rom_typ_id', '', 'trim');
		$this->form_validation->set_rules('rom_status', '', 'trim');
		$this->form_validation->set_select('tbl_room_type_rom_typ_id');
		$this->form_validation->set_checkbox('rom_status');
		if ($this->form_validation->run() == FALSE) {
			$this->data['types'] = $this->m_global->getDataArray(TABLE_PREFIX . 'room_type', 'rom_typ_id', 'rom_typ_name', 'rom_typ_status');
			$this->load->view(LAYOUT, $this->data);
		} else {
			if ($this->m_rooms->add()) {
				$this->session->set_flashdata('message', alert("Room has been saved!", 'success'));
				redirect('rooms/rooms');
			} else {
				$this->session->set_flashdata('message', alert("Room cannot be added, please try again", 'danger'));
				redirect('rooms/rooms/add');
			}
		}
	}

	/**
	 * Update Room
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id room id <segment(4)>
	 * @access public
	 * @return void
	 */
	function edit($id = 0) {
		$this->data['title'] = 'Edit Room';
		$this->data['content'] = 'rooms/rooms/edit';
		$this->data['data'] = $this->m_rooms->getRoomById($id);

		$this->form_validation->set_rules('rom_name', 'Name', 'required|trim|min_length[2]|max_length[50]|callback_uniqueExcept[' . TABLE_PREFIX . 'room.rom_name,rom_id]');
		$this->form_validation->set_rules('rom_building', 'Building', 'required|trim|max_length[50]|min_length[1]');
		$this->form_validation->set_rules('rom_floor', 'Floor', 'required|trim|max_length[3]|min_length[1]');
		$this->form_validation->set_rules('rom_available_people', 'Amount of People', 'required|trim|max_length[4]|min_length[1]');
		$this->form_validation->set_rules('tbl_room_type_rom_typ_id', '', 'trim');
		$this->form_validation->set_rules('rom_status', '', 'trim');
		$this->form_validation->set_select('tbl_room_type_rom_typ_id');
		$this->form_validation->set_checkbox('rom_status');
		if ($this->form_validation->run() == FALSE) {
			$this->data['types'] = $this->m_global->getDataArray(TABLE_PREFIX . 'room_type', 'rom_typ_id', 'rom_typ_name', 'rom_typ_status');
			$this->load->view(LAYOUT, $this->data);
		} else {
			if ($this->m_rooms->update()) {
				$this->session->set_flashdata('message', alert("Room has been updated!", 'success'));
				redirect('rooms/rooms/index/' . $this->uri->segment(5));
			} else {
				$this->session->set_flashdata('message', alert("Room cannot be updated, please try again", 'danger'));
				$s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
				redirect('rooms/rooms/edit/' . $this->uri->segment(4) . $s5);
			}
		}
	}

	/**
	 * Discard room
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id room id <segment(4)>
	 * @access public
	 * @return void
	 */
	function delete($id) {
		if ($this->m_rooms->deleteRoomById($id)) {
			$this->session->set_flashdata('message', alert("Room has been deleted!", 'success'));
			redirect('rooms/rooms/index/' . $this->uri->segment(5));
		} else {
			$this->session->set_flashdata('message', alert("Room cannot be deleted, please try again!", 'danger'));
			redirect('rooms/rooms/index/' . $this->uri->segment(5));
		}
	}

	/**
	 * View room
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id room id <segment(4)>
	 * @access public
	 * @return void
	 */
	function view($id = null) {
		$this->data['title'] = 'View Room';
		$this->data['content'] = 'rooms/rooms/view';

		$this->data['data'] = $this->m_rooms->getRoomById($id);
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
