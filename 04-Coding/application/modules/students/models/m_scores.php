<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_Scores extends CI_Model {

	/**
	 * Filter Score
	 *
	 * @param integer $num_row
	 * @param integer $from_row
	 * @return array
	 */
	function findAllScores($num_row, $from_row) {
		$fields = array(
			'sco.stu_sco_id AS id',
			'CONCAT(stu.stu_en_lastname," ",stu.stu_en_firstname) AS student',
			'gen.gen_title AS generation',
			'maj.maj_abbriviation AS major',
			'shi.shi_name AS shift',
			'cla.cla_name AS class',
			'sco.stu_sco_attendance AS attendance',
			'sco.stu_sco_homework AS homework',
			'sco.stu_sco_midterm_exam AS midterm',
			'sco.stu_sco_final_exam AS final',
			'sco.stu_sco_average AS average',
			'sco.stu_sco_rank AS rank',
			'sco.stu_sco_mention AS mention',
			'sco.stu_sco_gpa AS gpa'
		);
		$this->db->select($fields);
		$this->db->order_by('sco.stu_sco_rank', 'ASC');

		if ($this->input->post('tbl_generation_gen_id') != '') {
			$this->db->where('sco.tbl_generation_gen_id', $this->input->post('tbl_generation_gen_id'));
		}
		if ($this->input->post('tbl_majors_maj_id') != '') {
			$this->db->where('sco.tbl_majors_maj_id', $this->input->post('tbl_majors_maj_id'));
		}
		if ($this->input->post('tbl_shift_shi_id') != '') {
			$this->db->where('sco.tbl_shift_shi_id', $this->input->post('tbl_shift_shi_id'));
		}
		if ($this->input->post('tbl_classes_cla_id') != '') {
			$this->db->where('sco.tbl_classes_cla_id', $this->input->post('tbl_classes_cla_id'));
		}
		if ($this->input->post('stu_name') != '') {
			$this->db->like('stu.stu_en_firstname', $this->input->post('stu_name'));
			$this->db->or_like('stu.stu_kh_firstname', $this->input->post('stu_name'));
			$this->db->or_like('stu.stu_en_lastname', $this->input->post('stu_name'));
			$this->db->or_like('stu.stu_kh_lastname', $this->input->post('stu_name'));
			$this->db->or_like('stu.stu_card_id', $this->input->post('stu_name'));
		}

		$this->db->from(TABLE_PREFIX . 'student_score sco')
			->join(TABLE_PREFIX . 'generation gen', 'gen.gen_id = sco.tbl_generation_gen_id')
			->join(TABLE_PREFIX . 'majors maj', 'maj.maj_id = sco.tbl_majors_maj_id')
			->join(TABLE_PREFIX . 'shift shi', 'shi.shi_id = sco.tbl_shift_shi_id')
			->join(TABLE_PREFIX . 'classes cla', 'cla.cla_id = sco.tbl_classes_cla_id')
			->join(TABLE_PREFIX . 'students stu', 'stu.stu_id = sco.tbl_students_stu_id')
			->limit($num_row, $from_row);
		return $this->db->get();
	}

	/**
	 * Count all scores
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @access public
	 * @return integer
	 */
	function countAllScores() {
		if ($this->input->post('tbl_generation_gen_id') != '') {
			$this->session->set_userdata('tbl_generation_gen_id', $this->input->post('tbl_generation_gen_id'));
		}
		if ($this->input->post('tbl_majors_maj_id') != '') {
			$this->session->set_userdata('tbl_majors_maj_id', $this->input->post('tbl_majors_maj_id'));
		}
		if ($this->input->post('tbl_shift_shi_id') != '') {
			$this->session->set_userdata('tbl_shift_shi_id', $this->input->post('tbl_shift_shi_id'));
		}
		if ($this->input->post('tbl_classes_cla_id') != '') {
			$this->session->set_userdata('tbl_classes_cla_id', $this->input->post('tbl_classes_cla_id'));
		}
		if ($this->input->post('tbl_students_stu_id') != '') {
			$this->session->set_userdata('tbl_students_stu_id', $this->input->post('tbl_students_stu_id'));
		}

		if ($this->input->post('submit') && $this->input->post('tbl_generation_gen_id') == '') {
			$this->session->set_userdata('tbl_generation_gen_id', '');
		}
		if ($this->input->post('submit') && $this->input->post('tbl_majors_maj_id') == '') {
			$this->session->set_userdata('tbl_majors_maj_id', '');
		}
		if ($this->input->post('submit') && $this->input->post('tbl_shift_shi_id') == '') {
			$this->session->set_userdata('tbl_shift_shi_id', '');
		}
		if ($this->input->post('submit') && $this->input->post('tbl_classes_cla_id') == '') {
			$this->session->set_userdata('tbl_classes_cla_id', '');
		}
		if ($this->input->post('submit') && $this->input->post('stu_name') == '') {
			$this->session->set_userdata('stu_name', '');
		}

		if ($this->session->userdata('tbl_generation_gen_id') != '') {
			$this->db->where('tbl_generation_gen_id', $this->session->userdata('tbl_generation_gen_id'));
		}
		if ($this->session->userdata('tbl_majors_sub_id') != '') {
			$this->db->where('tbl_majors_maj_id', $this->session->userdata('tbl_majors_maj_id'));
		}
		if ($this->session->userdata('tbl_shift_shi_id') != '') {
			$this->db->where('tbl_shift_shi_id', $this->session->userdata('tbl_shift_shi_id'));
		}
		if ($this->session->userdata('tbl_classes_cla_id') != '') {
			$this->db->where('tbl_classes_cla_id', $this->session->userdata('tbl_classes_cla_id'));
		}
		if ($this->session->userdata('stu_name') != '') {
			$this->db->where('stu_name', $this->session->userdata('stu_name'));
		}

		$this->db->from(TABLE_PREFIX . 'student_score');
		$this->db->group_by('stu_sco_id');
		$data = $this->db->get();
		return $data->num_rows();
	}

	/**
	 * Import new student to tbl_student_score
	 *
	 * @return boolean
	 */
	function refresh() {
		$fields = array(
			'stu.stu_id AS tbl_students_stu_id',
			'cla.cla_id AS tbl_classes_cla_id',
			'cla.tbl_shift_shi_id AS tbl_shift_shi_id',
			'cla.cla_maj_id AS tbl_majors_maj_id',
			'cla.tbl_generation_gen_id AS tbl_generation_gen_id'
		);
		$this->db->select($fields);
		$this->db->from(TABLE_PREFIX . 'students stu')
			->join(TABLE_PREFIX . 'student_class stuc', 'stuc.tbl_students_stu_id = stu.stu_id')
			->join(TABLE_PREFIX . 'classes cla', 'cla.cla_id = stuc.tbl_class_cla_id')
			->where('stu.stu_score_status', 0);
		$result = $this->db->get();
		if ($result->num_rows() > 0) {
			foreach ($result->result_array() as $row) {
				$data = array(
					'tbl_generation_gen_id' => $row['tbl_generation_gen_id'],
					'tbl_majors_maj_id' => $row['tbl_majors_maj_id'],
					'tbl_shift_shi_id' => $row['tbl_shift_shi_id'],
					'tbl_classes_cla_id' => $row['tbl_classes_cla_id'],
					'tbl_students_stu_id' => $row['tbl_students_stu_id']
				);
				$this->db->set('stu_sco_created', 'NOW()', false);
				$this->db->insert(TABLE_PREFIX . 'student_score', $data);
				unset($data);

				$this->db->set('stu_score_status', 1)
					->where('stu_id', $row['tbl_students_stu_id'])
					->update(TABLE_PREFIX . 'students');
			}
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Update score
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @return boolean
	 */
	function update() {
		$data = $this->input->post();

		// Total average
		$average = array_sum($data) / 4;
		$this->db->set('stu_sco_average', $average);

		// Mention
		if ($average >= 0 && $average < 50) {
			$mention = 'F';
		} elseif ($average >= 50 && $average < 60) {
			$mention = 'E';
		} elseif ($average >= 60 && $average < 70) {
			$mention = 'D';
		} elseif ($average >= 70 && $average < 75) {
			$mention = 'C';
		} elseif ($average >= 75 && $average < 85) {
			$mention = 'B';
		} else {
			$mention = 'A';
		}
		$this->db->set('stu_sco_mention', $mention);

		$this->db->where('stu_sco_id', $this->uri->segment(4));
		$this->db->set('stu_sco_modified', 'NOW()', false);
		return $this->db->update(TABLE_PREFIX . 'student_score', $data) ? TRUE : FALSE;
	}

	/**
	 * Retreive score record by id
	 *
	 * @author Man Math <manmath4@gmail.com>
	 * @param integer $id
	 * @return array/mixed
	 */
	function getScoreById($id) {
		return $this->db->select(array('CONCAT(stu.stu_en_lastname," ",stu.stu_en_firstname) AS student', 'sco.*'))
				->from(TABLE_PREFIX . 'student_score sco')
				->join(TABLE_PREFIX . 'students stu', 'stu.stu_id = sco.tbl_students_stu_id')
				->where('stu_sco_id', $id)
				->get();
	}

}
