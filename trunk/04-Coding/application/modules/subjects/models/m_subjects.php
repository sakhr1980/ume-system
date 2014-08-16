<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Subjects extends CI_Model {

	function getSubjects() {
		$this->db->select('*');
		$this->db->from(TABLE_PREFIX . 'subject');
		$this->db->join(TABLE_PREFIX.'subject_type', TABLE_PREFIX.'subject_type.sub_typ_id = tbl_subject.sub_typ_id', 'left outer');
		return $this->db->get();
	}

	function getSubjectType() {
		$this->db->select('*');
		$this->db->from(TABLE_PREFIX . 'subject_type');
		return $this->db->get();
	}

	function findBySubjectId($sub_id) {
		$this->db->select('*');
		$this->db->where('sub_id', $sub_id);
		$this->db->join(TABLE_PREFIX.'subject_type', TABLE_PREFIX.'subject_type.sub_typ_id = tbl_subject.sub_typ_id', 'left outer');
		$this->db->from(TABLE_PREFIX . 'subject');
		return $this->db->get();
	}

	function addNew($sub_type, $title, $hour, $description, $status) {

		$data = array(
				'sub_typ_id' => $sub_type,
				'sub_name' => $title,
				'sub_hours' => $hour,
				'sub_description' => $description,
				'sub_status' => $status,
		);
		if ($this->db->insert(TABLE_PREFIX . 'subject', $data)) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		return FALSE;
	}

	function updateSubject($title, $hour, $description, $status, $sub_id) {
		$data = array(
				'sub_name' => $title,
				'sub_hours' => $hour,
				'sub_description' => $description,
				'sub_status' => $status,
		);

		$this->db->where('sub_id', $sub_id);
		if ($this->db->update(TABLE_PREFIX . 'subject', $data)) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		return FALSE;
	}

	function deleteSubject($sub_id){
		$this->db->where('sub_id', $sub_id);
		return $this->db->delete(TABLE_PREFIX . 'subject');
	}


}