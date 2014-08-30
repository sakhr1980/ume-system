<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Schedules extends CI_Model {

    function findAllSchedule($num_row, $from_row) {
		$res = array();
        $this->db->from(TABLE_PREFIX . 'schadule');
        $this->db->join(TABLE_PREFIX . 'shift', 'tbl_shift_shi_id=shi_id');
        $this->db->join(TABLE_PREFIX . 'majors', 'tbl_majors_maj_id=maj_id');
		
        if($this->input->post('sch_title') != '') {
            $this->db->where('sch_title',$this->input->post('sch_title'));
        }
		if($this->input->post('tbl_majors_maj_id') != '') {
            $this->db->where('tbl_majors_maj_id',$this->input->post('tbl_majors_maj_id'));
        }
		if($this->input->post('tbl_shift_shi_id') != '') {
            $this->db->where('tbl_shift_shi_id',$this->input->post('tbl_shift_shi_id'));
        }
		if($this->input->post('sch_year_number') != '') {
            $this->db->where('sch_year_number',$this->input->post('sch_year_number'));
        }
		if($this->input->post('sch_semester') != '') {
            $this->db->where('sch_semester',$this->input->post('sch_year_number'));
        }
		if($this->input->post('sch_academic_year') != '') {
            $this->db->where('sch_academic_year',$this->input->post('sch_academic_year'));
        }
		
        $this->db->order_by('sch_id', 'desc');
		$this->db->limit($num_row, $from_row);
        $query = $this->db->get();
		$data = array();
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$data[] = $row;
			}			
		}
		$ind = 0;
		foreach($data as $item){
			$ind++;
			$res[$ind]['header'] = $item;
			
			$this->db->from(TABLE_PREFIX . 'schadule_detail');
			$this->db->join(TABLE_PREFIX . 'staff', 'tbl_staffs_sta_id=sta_id','left');
			$this->db->join(TABLE_PREFIX . 'room', 'tbl_room_rom_id=rom_id','left');
			$this->db->join(TABLE_PREFIX . 'subject', 'tbl_subject_sub_id=sub_id','left');
			$this->db->where('tbl_schadule_sch_id',$item['sch_id']);
			$query = $this->db->get();
			$body = array();
			if($query->num_rows()>0){
				foreach($query->result_array() as $roww){
					$time = $roww['scd_time'];
					$sec = $roww['scd_section'];
					$sday = $roww['scd_day'];
					$body['times'][$sec] = $time; 
					$body['sections'][$sec][$sday]['teacher'] = $roww['sta_name'];
					$body['sections'][$sec][$sday]['room'] = $roww['rom_name'];
					$body['sections'][$sec][$sday]['subject'] = $roww['sub_name'];
				}
			}
			$res[$ind]['body'] = $body;
		}
		$query->free_result();		
		return $res;
    }

    function countAllSchedule() {
        $this->db->from(TABLE_PREFIX . 'schadule');
        $this->db->join(TABLE_PREFIX . 'shift', 'tbl_shift_shi_id=shi_id');
        $this->db->join(TABLE_PREFIX . 'majors', 'tbl_majors_maj_id=maj_id');
		
        if($this->input->post('sch_title') != '') {
            $this->db->where('sch_title',$this->input->post('sch_title'));
        }
		if($this->input->post('tbl_majors_maj_id') != '') {
            $this->db->where('tbl_majors_maj_id',$this->input->post('tbl_majors_maj_id'));
        }
		if($this->input->post('tbl_shift_shi_id') != '') {
            $this->db->where('tbl_shift_shi_id',$this->input->post('tbl_shift_shi_id'));
        }
		if($this->input->post('sch_year_number') != '') {
            $this->db->where('sch_year_number',$this->input->post('sch_year_number'));
        }
		if($this->input->post('sch_semester') != '') {
            $this->db->where('sch_semester',$this->input->post('sch_year_number'));
        }
		if($this->input->post('sch_academic_year') != '') {
            $this->db->where('sch_academic_year',$this->input->post('sch_academic_year'));
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
	
	function getAjaxData($tbl,$fields=array()) {
		$res = array();
		$select = '';
		foreach($fields as $field){
			if($select!='') $select .= ','; 
			$select .= $field; 
		}
		if($select=='') $select = '*';		
		$this->db->select($select);
        $query = $this->db->get(TABLE_PREFIX . $tbl);
        foreach($query->result_array() as $row){
			$res[] = $row;
		}
		$query->free_result();
		return $res;
    }

    /**
     * Add new class
     * @return true/false
     */
    function add() {
        $data['sch_title'] = $this->input->post('sch_title');
		$data['tbl_majors_maj_id'] = $this->input->post('tbl_majors_maj_id');
		$data['tbl_shift_shi_id'] = $this->input->post('tbl_shift_shi_id');
		$data['sch_academic_year'] = $this->input->post('sch_academic_year');
		$data['sch_semester'] = $this->input->post('sch_semester');
		$data['sch_year_number'] = $this->input->post('sch_year_number');
		$data['sch_created'] = date('Y-m-d H:i:s');
		$return = $this->db->insert(TABLE_PREFIX . 'schadule', $data);
		$sch_id = $this->db->insert_id();
		
		$times = $this->input->post('times');
		$sections = $this->input->post('sections');
		foreach($times as $ind=>$time){
			$section = $sections[$ind];
			foreach($section as $day=>$subSect){
				$tmp = array();
				$tmp['tbl_schadule_sch_id'] = $sch_id;
				$tmp['tbl_staffs_sta_id'] = ($subSect['teacher']!=''?$subSect['teacher']:null);
				$tmp['tbl_room_rom_id'] = ($subSect['room']!=''?$subSect['room']:null);
				$tmp['tbl_subject_sub_id'] = ($subSect['subject']!=''?$subSect['subject']:null);
				$tmp['scd_section'] = $ind;
				$tmp['scd_time'] = $time;
				$tmp['scd_day'] = $day;
				$this->db->insert(TABLE_PREFIX . 'schadule_detail', $tmp);
			}
		}		
		return $return;
    }

    /**
     * Edit a Class
     * @return true/false
     */
    function update() {
        $data = $this->input->post();
//        unset($data['fac_id']);

        $this->db->where('cla_id', $this->uri->segment(3));
        $this->db->set('cla_modified_date', 'NOW()', false);
//         if checkbox is not checked
        if (empty($data['cla_status'])) {
            $this->db->set('cla_status', 0);
        }
        return $this->db->update(TABLE_PREFIX . 'classes', $data);
    }

    function getClassById($id) {
        $this->db->where('cla_id', $id);
        return $this->db->get(TABLE_PREFIX . 'classes');
    }
    

    function deleteClassById($id = null) {
//        $this->db->where('use_id', $id);
//        return $this->db->delete(TABLE_PREFIX . 'users');
   

        $this->db->where('cla_id', $id);
        $this->db->set('cla_modified_date', 'NOW()', false);
//         if checkbox is not checked
  
            $this->db->set('cla_status', 0,false);
        
        return $this->db->update(TABLE_PREFIX . 'classes');
    }

    function selectJoinClass($id) {
        $this->db->where('cla_id', $id);
        $this->db->from(TABLE_PREFIX . 'classes');
        $this->db->join(TABLE_PREFIX . 'majors', 'cla_maj_id=maj_id', 'left');
        $this->db->join(TABLE_PREFIX . 'shift', 'tbl_shift_shi_id=shi_id', 'left');

        return $this->db->get();
    }

}
