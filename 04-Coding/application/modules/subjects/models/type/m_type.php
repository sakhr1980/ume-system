<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Type extends CI_Model {

	function getTypes() {
		$this->db->select('*');
		$this->db->order_by('sub_typ_id', 'DESC');
		$this->db->from(TABLE_PREFIX . 'subject_type');
		//$this->db->join(TABLE_PREFIX.'marjor_facuty','tbl_subject.mar_fac_id = marjor_facuty','mar_fac_id');
		return $this->db->get();
	}

	function findByTypeId($sub_typ_id) {
		$this->db->select('*');
		$this->db->where('sub_typ_id', $sub_typ_id);
		$this->db->from(TABLE_PREFIX . 'subject_type');
		//$this->db->join(TABLE_PREFIX.'marjor_facuty','tbl_subject.mar_fac_id = marjor_facuty','mar_fac_id');
		return $this->db->get();
	}

	function addNew($title, $description, $status) {
		$data = array(
				'sub_typ_title' => $title,
				'sub_typ_description' => $description,
				'sub_typ_status' => $status,
		);
		if ($this->db->insert(TABLE_PREFIX . 'subject_type', $data)) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		return FALSE;
	}

	function updateType($title, $description, $status, $sub_typ_id) {
		$data = array(
				'sub_typ_title' => $title,
				'sub_typ_description' => $description,
				'sub_typ_status' => $status,
		);

		$this->db->where('sub_typ_id', $sub_typ_id);
		if ($this->db->update(TABLE_PREFIX . 'subject_type', $data)) {
			return TRUE;
		}
		else {
		return FALSE;
		}
		return FALSE;
	}

	function deleteType($sub_typ_id){
		$this->db->where('sub_typ_id', $sub_typ_id);
		return $this->db->delete(TABLE_PREFIX . 'subject_type');
	}
}