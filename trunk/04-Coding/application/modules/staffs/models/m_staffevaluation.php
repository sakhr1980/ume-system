<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_Staffevaluation extends CI_Model {
	
	function findAllEvaluations($num_row, $from_row) {
		$this->db->order_by('sta_eva_id', 'desc');

		if ($this->input->post('sta_name') != '') {
			$this->db->like('sta_name', $this->input->post('sta_name'));
		}

		$this->db->select(TABLE_PREFIX . 'staff_evaluation.*, sta_name,' .
							'((sta_eva_ability_a + sta_eva_characteristic_a + sta_eva_attendant_a + sta_eva_idea_a) / 4) AS total_a,' .
							'((sta_eva_ability_b + sta_eva_characteristic_b + sta_eva_attendant_b + sta_eva_idea_b) / 4) AS total_b,' .
							'((sta_eva_ability_c + sta_eva_characteristic_c + sta_eva_attendant_c + sta_eva_idea_c) / 4) AS total_c,' .
							'((sta_eva_ability_d + sta_eva_characteristic_d + sta_eva_attendant_d + sta_eva_idea_d) / 4) AS total_d,' .
							'((sta_eva_ability_e + sta_eva_characteristic_e + sta_eva_attendant_e + sta_eva_idea_e) / 4) AS total_e'
		);
		$this->db->limit($num_row, $from_row);
		$this->db->from(TABLE_PREFIX . 'staff_evaluation');
		$this->db->join(TABLE_PREFIX . 'staffs', TABLE_PREFIX . 'staffs.sta_id = ' . TABLE_PREFIX . 'staff_evaluation.sta_id');
		$this->db->group_by('sta_eva_id');
		return $this->db->get();
	}
	
	function countAllEvaluations() {

		// Keep pagination for filter status
		if ($this->input->post('sta_name') != '') {
			$this->db->like('sta_name', $this->input->post('sta_name'));
		}

		$this->db->select(TABLE_PREFIX . 'staff_evaluation.*, sta_name,' .
							'((sta_eva_ability_a + sta_eva_characteristic_a + sta_eva_attendant_a + sta_eva_idea_a) / 4) AS total_a,' .
							'((sta_eva_ability_b + sta_eva_characteristic_b + sta_eva_attendant_b + sta_eva_idea_b) / 4) AS total_b,' .
							'((sta_eva_ability_c + sta_eva_characteristic_c + sta_eva_attendant_c + sta_eva_idea_c) / 4) AS total_c,' .
							'((sta_eva_ability_d + sta_eva_characteristic_d + sta_eva_attendant_d + sta_eva_idea_d) / 4) AS total_d,' .
							'((sta_eva_ability_e + sta_eva_characteristic_e + sta_eva_attendant_e + sta_eva_idea_e) / 4) AS total_e'
		);
		$this->db->from(TABLE_PREFIX . 'staff_evaluation');
		$this->db->join(TABLE_PREFIX . 'staffs', TABLE_PREFIX . 'staffs.sta_id = ' . TABLE_PREFIX . 'staff_evaluation.sta_id');
		$this->db->group_by('sta_eva_id');
		$data = $this->db->get();
		return $data->num_rows();
	}
	
	function add() {
		$data = $this->input->post();
		$this->db->set('sta_eva_created', 'NOW()', false);
		$this->db->set('user_process', 1); // TODO: need to be changed
		$result = $this->db->insert(TABLE_PREFIX . 'staff_evaluation', $data);
		return $result;
	}
	
	function update() {
		$data = $this->input->post();
		$this->db->where('sta_eva_id', $this->uri->segment(4));
		$this->db->set('sta_eva_modified', 'NOW()', false);
		return $this->db->update(TABLE_PREFIX . 'staff_evaluation', $data);
	}
	
	function getEvaluationById($id) {
		//$this->db->select(TABLE_PREFIX . 'staff_evaluation.*, sta_name');
		$this->db->select(TABLE_PREFIX . 'staff_evaluation.*, sta_name,' .
							'((sta_eva_ability_a + sta_eva_characteristic_a + sta_eva_attendant_a + sta_eva_idea_a) / 4) AS total_a,' .
							'((sta_eva_ability_b + sta_eva_characteristic_b + sta_eva_attendant_b + sta_eva_idea_b) / 4) AS total_b,' .
							'((sta_eva_ability_c + sta_eva_characteristic_c + sta_eva_attendant_c + sta_eva_idea_c) / 4) AS total_c,' .
							'((sta_eva_ability_d + sta_eva_characteristic_d + sta_eva_attendant_d + sta_eva_idea_d) / 4) AS total_d,' .
							'((sta_eva_ability_e + sta_eva_characteristic_e + sta_eva_attendant_e + sta_eva_idea_e) / 4) AS total_e'
		);
		$this->db->join(TABLE_PREFIX . 'staffs', TABLE_PREFIX . 'staffs.sta_id = ' . TABLE_PREFIX . 'staff_evaluation.sta_id');
		$this->db->where('sta_eva_id', $id);
		return $this->db->get(TABLE_PREFIX . 'staff_evaluation');
	}
	
	function deleteEvaluationById($id = null) {
		$this->db->where('sta_eva_id', $id);
		return $this->db->delete(TABLE_PREFIX . 'staff_evaluation');
	}
	
	function getStaffList(){
		$result = $this->db->select('sta_id, sta_name')->get(TABLE_PREFIX . 'staffs');
		$arr = array(''=>'');
		foreach($result->result_array() as $row){
			$arr[$row['sta_id']] = $row['sta_name'];
		}
		return $arr;
	}

}
