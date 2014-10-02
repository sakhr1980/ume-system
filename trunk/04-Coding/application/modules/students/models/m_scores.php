<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_Scores extends CI_Model {

	/**
	 * Filter Score by subject
	 *
	 * @param integer $num_row
	 * @param integer $from_row
	 * @return array
	 */
	function findAllScoresBySubject($num_row, $from_row) {
		$fields = array(
			'sco.stu_sco_id AS id',
			'CONCAT(stu.stu_en_lastname," ",stu.stu_en_firstname) AS student',
			'gen.gen_title AS generation',
			'maj.maj_abbriviation AS major',
			'shi.shi_name AS shift',
			'cla.cla_name AS class',
			'sco.stu_sco_semester AS semester',
			'sco.stu_sco_attendance AS attendance',
			'sco.stu_sco_homework AS homework',
			'sco.stu_sco_midterm_exam AS midterm',
			'sco.stu_sco_final_exam AS final',
			'sco.stu_sco_average AS total',
			'sco.stu_sco_rank AS rank',
			'sco.stu_sco_mention AS mention'
		);
		$this->db->select($fields);
		$this->db->order_by('maj.maj_abbriviation ASC, sco.stu_sco_average DESC');

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
		if ($this->input->post('stu_sco_semester')) {
			$this->session->set_userdata('stu_sco_semester', $this->input->post('stu_sco_semester'));
		} else {
			$this->session->set_userdata('stu_sco_semester', 1);
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

		if ($this->session->userdata('tbl_generation_gen_id') && $this->session->userdata('tbl_generation_gen_id') != '') {
			$this->db->where('sco.tbl_generation_gen_id', $this->session->userdata('tbl_generation_gen_id'));
		}
		if ($this->session->userdata('tbl_majors_maj_id') && $this->session->userdata('tbl_majors_maj_id') != '') {
			$this->db->where('sco.tbl_majors_maj_id', $this->session->userdata('tbl_majors_maj_id'));
		}
		if ($this->session->userdata('tbl_shift_shi_id') && $this->session->userdata('tbl_shift_shi_id') != '') {
			$this->db->where('sco.tbl_shift_shi_id', $this->session->userdata('tbl_shift_shi_id'));
		}
		if ($this->session->userdata('tbl_classes_cla_id') && $this->session->userdata('tbl_classes_cla_id') != '') {
			$this->db->where('sco.tbl_classes_cla_id', $this->session->userdata('tbl_classes_cla_id'));
		}
		$this->db->where('sco.stu_sco_semester', $this->session->userdata('stu_sco_semester'));

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
	 * Count all scores by subject
	 *
	 * @return integer
	 */
	function countAllScoresBySubject() {
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
		if ($this->session->userdata('stu_sco_semester') != '') {
			$this->db->where('stu_sco_semester', $this->session->userdata('stu_sco_semester'));
		}

		$this->db->from(TABLE_PREFIX . 'student_score');
		$this->db->group_by('stu_sco_id');
		$data = $this->db->get();
		return $data->num_rows();
	}

	/**
	 * Filter Score by semester
	 *
	 * @param integer $semester
	 * @param integer $num_row
	 * @param integer $from_row
	 * @return array
	 */
	function findAllScoresBySemester($semester, $num_row, $from_row) {
		$fields = array(
			'CONCAT(stu.stu_en_lastname," ",stu.stu_en_firstname) AS student',
			'gen.gen_title AS generation',
			'maj.maj_abbriviation AS major',
			'shi.shi_name AS shift',
			'sco.stu_sco_average AS total',
			'sco.stu_sco_rank AS rank',
			'sco.stu_sco_mention AS mention',
			'sco.stu_sco_gpa AS gpa'
		);
		$this->db->select($fields);
		$this->db->order_by('maj.maj_abbriviation ASC, sco.stu_sco_average DESC');

		if ($this->input->post('tbl_generation_gen_id') != '') {
			$this->session->set_userdata('tbl_generation_gen_id', $this->input->post('tbl_generation_gen_id'));
		}
		if ($this->input->post('tbl_majors_maj_id') != '') {
			$this->session->set_userdata('tbl_majors_maj_id', $this->input->post('tbl_majors_maj_id'));
		}
		if ($this->input->post('tbl_shift_shi_id') != '') {
			$this->session->set_userdata('tbl_shift_shi_id', $this->input->post('tbl_shift_shi_id'));
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

		if ($this->session->userdata('tbl_generation_gen_id') && $this->session->userdata('tbl_generation_gen_id') != '') {
			$this->db->where('sco.tbl_generation_gen_id', $this->session->userdata('tbl_generation_gen_id'));
		}
		if ($this->session->userdata('tbl_majors_maj_id') && $this->session->userdata('tbl_majors_maj_id') != '') {
			$this->db->where('sco.tbl_majors_maj_id', $this->session->userdata('tbl_majors_maj_id'));
		}
		if ($this->session->userdata('tbl_shift_shi_id') && $this->session->userdata('tbl_shift_shi_id') != '') {
			$this->db->where('sco.tbl_shift_shi_id', $this->session->userdata('tbl_shift_shi_id'));
		}

		$this->db->where('sco.stu_sco_semester', $semester);

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
			->join(TABLE_PREFIX . 'students stu', 'stu.stu_id = sco.tbl_students_stu_id')
			->limit($num_row, $from_row);
		return $this->db->get();
	}

	/**
	 * Count all scores by semester
	 *
	 * @param integer $semester
	 * @return integer
	 */
	function countAllScoresBySemester($semester) {

	}

	/**
	 * Filter Score by final
	 *
	 * @param integer $num_row
	 * @param integer $from_row
	 * @return array
	 */
	function findAllScoresByFinal($num_row, $from_row) {

	}

	/**
	 * Count all scores by final
	 *
	 * @return integer
	 */
	function countAllScoresByFinal() {

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
				$this->db->set('stu_sco_semester', 1);
				$this->db->set('stu_sco_created', 'NOW()', false);
				$this->db->insert(TABLE_PREFIX . 'student_score', $data);
				$this->db->set('stu_sco_semester', 2);
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
	 * @return boolean
	 */
	function update() {
		$data = $this->input->post();

// Total average
		$total = array_sum($data) - $this->input->post('stu_sco_semester');
		$this->db->set('stu_sco_average', $total);

// Mention
		if ($total >= 0 && $total < 50) {
			$mention = 'F';
		} elseif ($total >= 50 && $total < 60) {
			$mention = 'E';
		} elseif ($total >= 60 && $total < 70) {
			$mention = 'D';
		} elseif ($total >= 70 && $total < 75) {
			$mention = 'C';
		} elseif ($total >= 75 && $total < 85) {
			$mention = 'B';
		} else {
			$mention = 'A';
		}
		$this->db->set('stu_sco_mention', $mention);

		$this->db->where('stu_sco_id', $this->uri->segment(4));
		$this->db->where('stu_sco_semester', $this->input->post('stu_sco_semester')); // optional
		$this->db->set('stu_sco_modified', 'NOW()', false);
		$this->db->update(TABLE_PREFIX . 'student_score', $data);
// update rank
		$this->updateRank($this->uri->segment(4), $this->input->post('stu_sco_semester'));
		return TRUE;
	}

	public function updateRank($id, $semester) {
// get class id of last edit score
		$fields = array(
			'tbl_generation_gen_id generation',
			'tbl_majors_maj_id AS major',
			'tbl_shift_shi_id AS shift',
			'tbl_classes_cla_id AS class'
		);
		$result = $this->db->select($fields)
			->where('stu_sco_id', $id)
			->where('stu_sco_semester', $semester)
			->limit(1)
			->get(TABLE_PREFIX . 'student_score');
		$result->result_array();
		$data = $result->result_array[0];

// get all averages from class
		$totals = $this->db->select('stu_sco_average')
			->where('tbl_generation_gen_id', $data['generation'])
			->where('tbl_majors_maj_id', $data['major'])
			->where('tbl_shift_shi_id', $data['shift'])
			->where('tbl_classes_cla_id', $data['class'])
			->where('stu_sco_semester', $semester)
			->order_by('stu_sco_average', 'DESC')
			->get(TABLE_PREFIX . 'student_score');

// update rank
		$tmp_average = '';
		$r = 1;
		$k = '';
		foreach ($totals->result() as $avg) {
			if ($r == 1) {
				$k = $r;
				$tmp_average = $avg->stu_sco_average;
			} else {
				if ($tmp_average != $avg->stu_sco_average) {
					$tmp_average = $avg->stu_sco_average;
					$k = $r;
				}
			}

			$this->db->where('tbl_generation_gen_id', $data['generation']);
			$this->db->where('tbl_majors_maj_id', $data['major']);
			$this->db->where('tbl_shift_shi_id', $data['shift']);
			$this->db->where('tbl_classes_cla_id', $data['class']);
			$this->db->where('stu_sco_average', $avg->stu_sco_average);
			$this->db->where('stu_sco_average >', 0);
			$this->db->where('stu_sco_semester', $semester);
			$this->db->set('stu_sco_rank', $k);
			$this->db->update(TABLE_PREFIX . 'student_score');
			$r++;
		}
	}

	public function updateGPA() {

	}

	/**
	 * Retreive score record by id
	 *
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
