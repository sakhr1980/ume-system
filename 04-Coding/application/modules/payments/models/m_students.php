<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_Students extends CI_Model {

	/**
	 * Select all student payment
	 * @param integer $num_row
	 * @param integer $from_row
	 *
	 * @return array
	 */
	function findAllStudentPayments($num_row, $from_row) {

		$this->db->select('sp_id, tbl_students_stu_id, tbl_subjects_sub_id, sp_date_pay, sp_amounce,sp_year, sp_status,stu_gender, stu_kh_firstname, stu_kh_lastname,stu_en_firstname, stu_en_lastname, sub_id, sub_name, maj_id, maj_name');
		$this->db->from(TABLE_PREFIX . 'student_payments');
		$this->db->join(TABLE_PREFIX . 'students', 'tbl_students_stu_id = stu_id');
		$this->db->join(TABLE_PREFIX . 'subject', 'sub_id = tbl_subjects_sub_id');
		$this->db->join(TABLE_PREFIX . 'majors', 'maj_id = tbl_majors_maj_id ');
		$this->db->limit($num_row, $from_row);

		$this->db->order_by('sp_id');
		if ($this->input->post('stu_id') != '') {
			$this->db->like('tbl_students_stu_id', $this->input->post('stu_id'));
		}
		if ($this->input->post('stu_name') != '') {
			$this->db->like('stu_en_firstname', $this->input->post('stu_name'));
			$this->db->or_like('stu_en_lastname', $this->input->post('stu_name'));
		}
		if ($this->input->post('stu_kh_name') != '') {
			$this->db->like('stu_kh_firstname', $this->input->post('stu_kh_name'));
			$this->db->or_like('stu_kh_lastname', $this->input->post('stu_kh_name'));
		}
		if ($this->input->post('sp_year') != '') {
			$this->db->like('sp_year', $this->input->post('sp_year'));
		}

		// Keep pagination for filter status
		if ($this->input->post('sp_status') != '') {
			$this->session->set_userdata('sp_status', $this->input->post('sp_status'));
		}
		if ($this->input->post('submit') && $this->input->post('sp_status') == '') {
			$this->session->set_userdata('sp_status', '');
		}
		if ($this->session->userdata('sp_status') != '') {
			$this->db->where('sp_status', $this->session->userdata('sp_status'));
		}
		return $this->db->get();
	}

	/**
	 * Count all student payments record
	 *
	 * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
	 * @access public
	 * @return integer
	 */
	function countAll() {

		// Keep pagination for filter status
		if ($this->input->post('sp_status') != '') {
			$this->session->set_userdata('sp_status', $this->input->post('sp_status'));
		}
		if ($this->input->post('submit') && $this->input->post('sp_status') == '') {
			$this->session->set_userdata('sp_status', '');
		}
		if ($this->session->userdata('sp_status') != '') {
			$this->db->where('sp_status', $this->session->userdata('sp_status'));
		}

		$this->db->from(TABLE_PREFIX . 'student_payments');
		$this->db->group_by('sp_status');
		$data = $this->db->get();
		return $data->num_rows();
	}

	/**
	 * Create student Payments
	 *
	 * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
	 * @access public
	 * @return boolean
	 */
	function add() {
		$data = array(
			'tbl_students_stu_id' => $this->input->post('tbl_students_stu_id'),
			'tbl_subjects_sub_id' => $this->input->post('tbl_subjects_sub_id'),
			'tbl_majors_maj_id' => $this->input->post('tbl_majors_maj_id'),
			'sp_year' => $this->input->post('sp_year'),
			'sp_date_pay' => $this->input->post('sp_date_pay'),
			'sp_amounce' => $this->input->post('sp_amounce'),
			'sp_status' => $this->input->post('sp_status')
		);
		$result = $this->db->insert(TABLE_PREFIX . 'student_payments', $data);
		return $result;
	}

	/**
	 * Update room
	 *
	 * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
	 * @access public
	 * @return boolean
	 */
	function update() {
		$data = array(
			'tbl_students_stu_id' => $this->input->post('tbl_students_stu_id'),
			'tbl_subjects_sub_id' => $this->input->post('tbl_subjects_sub_id'),
			'tbl_majors_maj_id' => $this->input->post('tbl_majors_maj_id'),
			'sp_year' => $this->input->post('sp_year'),
			'sp_date_pay' => $this->input->post('sp_date_pay'),
			'sp_amounce' => $this->input->post('sp_amounce'),
			'sp_status' => $this->input->post('sp_status')
		);
		$this->db->where('sp_id', $this->uri->segment(4));
		return $this->db->update(TABLE_PREFIX . 'student_payments', $data);
	}

	/**
	 * Discard room
	 *
	 * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
	 * @param integer $id student id
	 * @access public
	 * @return boolean
	 */
	function deleteStudentPaymentsByID($id = null) {
		$this->db->where('sp_id', $id);
		return $this->db->delete(TABLE_PREFIX . 'student_payments');
	}

	/**
	 * Select student by id
	 * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
	 * @access public
	 * @return object
	 */
	function findStudentByID($id) {
		$this->db->select('stu_en_firstname, stu_en_lastname, stu_kh_firstname, stu_kh_lastname, stu_gender');
		$this->db->where('stu_id', $id);
		$this->db->from( TABLE_PREFIX . 'students');
		return $this->db->get();
	}

	/**
	 * Select student payments by id
	 *
	 * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
	 * @param integer $id sp_id
	 * @access public
	 * @return array
	 */
	function getStudentPaymentByID($id) {
		$this->db->select('sp_id, tbl_students_stu_id, tbl_subjects_sub_id, tbl_majors_maj_id, sp_date_pay, sp_amounce,sp_year, sp_status, stu_kh_firstname, stu_kh_lastname,stu_gender, stu_en_firstname, stu_en_lastname, sub_id, sub_name, maj_id, maj_name');
		$this->db->from(TABLE_PREFIX . 'student_payments');
		$this->db->join(TABLE_PREFIX . 'students', 'tbl_students_stu_id = stu_id');
		$this->db->join(TABLE_PREFIX . 'subject', 'sub_id = tbl_subjects_sub_id');
		$this->db->join(TABLE_PREFIX . 'majors', 'maj_id = tbl_majors_maj_id ');
		$this->db->order_by('sp_id');
		$this->db->where('sp_id', $id, 'desc');
		return $this->db->get();
	}
}
