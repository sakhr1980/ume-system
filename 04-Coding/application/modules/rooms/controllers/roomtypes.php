<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Manipulation of Room Types
 *
 * @author Man Math <manmath4@gmail.com>
 */
class Roomtypes extends CI_Controller {

	/**
	 * @var array
	 */
	var $data = array('title' => null, 'content' => 'missing_view');

	/**
	 * Constuctor
	 */
	function __construct() {
		parent::__construct();
		$this->load->model(array('rooms/m_roomtypes'));
	}

	/**
	 * Retrive job type
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return void
	 */
	function index() {
		$this->data['title'] = 'Manage Rooms Job Type';
		$this->data['content'] = 'rooms/roomtypes/index';

		$this->form_validation->set_rules('rom_typ_name', '', 'trim');
		$this->form_validation->set_rules('rom_typ_status', '', 'trim');

		$this->form_validation->run();
		$this->data['data'] = $this->m_roomtypes->findAllRoomtypes(PAGINGATION_PERPAGE, $this->uri->segment(4));
		pagination_config(base_url() . 'rooms/roomtypes/index', $this->m_roomtypes->countAllRoomtypes(), PAGINGATION_PERPAGE);
		$this->load->view(LAYOUT, $this->data);
	}

	/**
	 * Create room type
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return void
	 */
	function add() {
		$this->data['title'] = 'Add New Room Type';
		$this->data['content'] = 'rooms/roomtypes/add';

		$this->form_validation->set_rules('rom_typ_name', 'Name', 'required|trim|max_length[50]|min_length[2]|is_unique[' . TABLE_PREFIX . 'room_type.rom_typ_name]');
		$this->form_validation->set_rules('rom_typ_description', 'Description', 'trim|max_length[250]');
		$this->form_validation->set_rules('rom_typ_status', '', 'trim');
		$this->form_validation->set_checkbox('rom_typ_status');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view(LAYOUT, $this->data);
		} else {
			if ($this->m_roomtypes->add()) {
				$this->session->set_flashdata('message', alert("Room type has been saved!", 'success'));
				redirect('rooms/roomtypes');
			} else {
				$this->session->set_flashdata('message', alert("Room type cannot be added, please try again", 'danger'));
				redirect('rooms/roomtypes/add');
			}
		}
	}

	/**
	 * Update room type
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id roomtype id <segment(4)>
	 * @access public
	 * @return void
	 */
	function edit($id = 0) {
		$this->data['title'] = 'Edit Job Type';
		$this->data['content'] = 'rooms/roomtypes/edit';
		$this->data['data'] = $this->m_roomtypes->getRoomtypeById($id);

		$this->form_validation->set_rules('rom_typ_name', 'Name', 'trim|required|min_length[2]|max_length[50]|callback_uniqueExcept[' . TABLE_PREFIX . 'room_type.rom_typ_name,rom_typ_id]');
		$this->form_validation->set_rules('rom_typ_description', 'Description', 'trim|max_length[250]');
		$this->form_validation->set_rules('rom_typ_status', '', 'trim');
		$this->form_validation->set_checkbox('rom_ty_status');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view(LAYOUT, $this->data);
		} else {
			if ($this->m_roomtypes->update()) {
				$this->session->set_flashdata('message', alert("Room type has been updated!", 'success'));
				redirect('rooms/roomtypes/index/' . $this->uri->segment(5));
			} else {
				$this->session->set_flashdata('message', alert("Room type cannot be updated, please try again", 'danger'));
				$s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
				redirect('rooms/roomtypes/edit/' . $this->uri->segment(4) . $s5);
			}
		}
	}

	/**
	 * Discard room type
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id roomtype id <segment(4)>
	 * @access public
	 * @return void
	 */
	function delete($id) {
		if ($this->m_roomtypes->deleteRoomtypeById($id)) {
			$this->session->set_flashdata('message', alert("Room type has been deleted!", 'success'));
			redirect('rooms/roomtypes/index/' . $this->uri->segment(5));
		} else {
			$this->session->set_flashdata('message', alert("Room type cannot be deleted, please try again!", 'danger'));
			redirect('rooms/roomtypes/index/' . $this->uri->segment(5));
		}
	}

	/**
	 * View room type
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id roomtype id <segment(4)>
	 * @access public
	 * @return void
	 */
	function view($id = null) {
		$this->data['title'] = 'View Room Type';
		$this->data['content'] = 'rooms/roomtypes/view';

		$this->data['data'] = $this->m_roomtypes->getRoomtypeById($id);
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
