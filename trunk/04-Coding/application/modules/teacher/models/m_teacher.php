<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Teacher extends CI_Model {
	
    function getStaff(){
		$res = array();
        $this->db->from(TABLE_PREFIX . 'staff');
		$this->db->where('sta_status',1);
		$this->db->where('sta_position','teacher');
		
        $this->db->order_by('sta_id', 'desc');
		//$this->db->limit($num_row, $from_row);
        $query = $this->db->get();
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$res[$row['sta_id']] = $row['sta_name'];
			}			
		}		
		$query->free_result();		
		return $res;
	}
	
	function teacherFilter() {
		$res = array();
        $this->db->from(TABLE_PREFIX . 'teacher t');
		$this->db->join(TABLE_PREFIX . 'staff st', 't.tbl_staff_sta_id = st.sta_id');
		$this->db->join(TABLE_PREFIX . 'classes cl', 't.tbl_classes_cla_id = cl.cla_id');
        $this->db->join(TABLE_PREFIX . 'subject s', 't.tbl_subject_sub_id = s.sub_id');
		
		if($this->input->post('tbl_staff_sta_id') != '') {
            $this->db->where('t.tbl_staff_sta_id',$this->input->post('tbl_staff_sta_id'));
        }
		if($this->input->post('tbl_classes_cla_id') != '') {
            $this->db->where('t.tbl_classes_cla_id',$this->input->post('tbl_classes_cla_id'));
        }
		if($this->input->post('tbl_subject_sub_id') != '') {
            $this->db->where('t.tbl_subject_sub_id',$this->input->post('tbl_subject_sub_id'));
        }
		
		if($this->input->post('tea_year') != '') {
            $this->db->where('t.tea_year',$this->input->post('tea_year'));
        }
		if($this->input->post('tea_semester') != '') {
            $this->db->where('t.tea_semester',$this->input->post('tea_semester'));
        }
		
		if($this->input->post('tea_academic_year') != '') {
            $this->db->where('t.tea_academic_year',$this->input->post('tea_academic_year'));
        }
		
        $query = $this->db->get();
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$res[] = $row;
			}			
		}		
		$query->free_result();		
		return $res;
    }
	
	function findAllTeacher($num_row, $from_row) {
		$res = array();
        $this->db->from(TABLE_PREFIX . 'teacher t');
		$this->db->join(TABLE_PREFIX . 'staff st', 't.tbl_staff_sta_id = st.sta_id');
		$this->db->join(TABLE_PREFIX . 'classes cl', 't.tbl_classes_cla_id = cl.cla_id');
        $this->db->join(TABLE_PREFIX . 'subject s', 't.tbl_subject_sub_id = s.sub_id');
		
		if($this->input->post('tbl_staff_sta_id') != '') {
            $this->db->where('t.tbl_staff_sta_id',$this->input->post('tbl_staff_sta_id'));
        }
		if($this->input->post('tbl_classes_cla_id') != '') {
            $this->db->where('t.tbl_classes_cla_id',$this->input->post('tbl_classes_cla_id'));
        }
		if($this->input->post('tbl_subject_sub_id') != '') {
            $this->db->where('t.tbl_subject_sub_id',$this->input->post('tbl_subject_sub_id'));
        }
		
		if($this->input->post('tea_year') != '') {
            $this->db->where('t.tea_year',$this->input->post('tea_year'));
        }
		if($this->input->post('tea_semester') != '') {
            $this->db->where('t.tea_semester',$this->input->post('tea_semester'));
        }
		
		if($this->input->post('tea_academic_year') != '') {
            $this->db->where('t.tea_academic_year',$this->input->post('tea_academic_year'));
        }
		
        $this->db->order_by('t.tea_id', 'desc');
		$this->db->limit($num_row, $from_row);
        $query = $this->db->get();
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$res[] = $row;
			}			
		}		
		$query->free_result();		
		return $res;
    }

    function countAllTeacher() {
        $this->db->from(TABLE_PREFIX . 'teacher t');
		$this->db->join(TABLE_PREFIX . 'staff st', 't.tbl_staff_sta_id = st.sta_id');
		$this->db->join(TABLE_PREFIX . 'classes cl', 't.tbl_classes_cla_id = cl.cla_id');
        $this->db->join(TABLE_PREFIX . 'subject s', 't.tbl_subject_sub_id = s.sub_id');
		
		if($this->input->post('tbl_staff_sta_id') != '') {
            $this->db->where('t.tbl_staff_sta_id',$this->input->post('tbl_staff_sta_id'));
        }
		if($this->input->post('tbl_classes_cla_id') != '') {
            $this->db->where('t.tbl_classes_cla_id',$this->input->post('tbl_classes_cla_id'));
        }
		if($this->input->post('tbl_subject_sub_id') != '') {
            $this->db->where('t.tbl_subject_sub_id',$this->input->post('tbl_subject_sub_id'));
        }
		
		if($this->input->post('tea_year') != '') {
            $this->db->where('t.tea_year',$this->input->post('tea_year'));
        }
		if($this->input->post('tea_semester') != '') {
            $this->db->where('t.tea_semester',$this->input->post('tea_semester'));
        }
		
		if($this->input->post('tea_academic_year') != '') {
            $this->db->where('t.tea_academic_year',$this->input->post('tea_academic_year'));
        }
		
        $query = $this->db->get();
        return $query->num_rows();
    }
	
	public function get_text_search($txtsearch){
		$result ='';
		//replace special character from url
		$tmp = str_replace('%20',' ',$txtsearch);
		$result = mysql_real_escape_string(trim($tmp));
		return $result;
	}
	
	
	function getAjaxData($tbl,$field_selecteds=array(),$fwhere='',$fselected='') {
		$res = array();		
		//$field_wheres['tbl_classes_cla_id'] = $_POST['cla_id'];
		$field_wheres['sch_year_number'] = $_POST['year'];
		$field_wheres['sch_semester'] = $_POST['semester'];
		$field_wheres['sch_academic_year'] = $_POST['academic'];
		
		$field_wheres['scd_day'] = $_POST['sday'];
		$field_wheres['scd_time'] = $_POST['stime'];
		$field_wheres['scd_section'] = $_POST['ssection'];
		
		$data = $this->getDataScheduleBy($field_wheres,$fselected);
		
		$select = '';
		foreach($field_selecteds as $field){
			if($select!='') $select .= ','; 
			$select .= $field; 
		}
		if($select=='') $select = '*';
		$this->db->select($select);
		
		$this->db->where_not_in($fwhere,$data);
		
		$query = $this->db->get(TABLE_PREFIX . $tbl);
		foreach($query->result_array() as $row){
			$res[] = $row;
		}
		$query->free_result();
		
		return $res;
    }
	
	function getDataFilter($data){
		$res = array();
		foreach($data as $field=>$value){
			$this->db->where($field,$value);
		}
		$query = $this->db->get(TABLE_PREFIX . 'teacher');
		if($query->num_rows>0){
			$row = $query->row();
			$res = $this->getDataBy($row->tea_id);
		}
		$query->free_result();
		return $res;
	}
	function getDataBy($id){
		$res = array();
		$this->db->where('tbl_teacher_tea_id',$id);
		$query = $this->db->get(TABLE_PREFIX . 'teacher_record');
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
    function saveOrUpdate() {
		$id = $this->input->post('hidden_id');
		$res = array();
		if($id>0){
			$res = $this->update($id);
		}else{
			$res = $this->save();
		}
		return $res;
    }
	
	function save() {
		$data['tbl_staff_sta_id'] = $this->input->post('tbl_staff_sta_id');
        $data['tbl_subject_sub_id'] = $this->input->post('tbl_subject_sub_id');
		$data['tbl_classes_cla_id'] = $this->input->post('tbl_classes_cla_id');
		$data['tea_academic_year'] = $this->input->post('tea_academic_year');
		$data['tea_semester'] = $this->input->post('tea_semester');
		$data['tea_year'] = $this->input->post('tea_year');
		if(!$this->checkExists($data)){
			$return = $this->db->insert(TABLE_PREFIX . 'teacher', $data);
			$tea_id = $this->db->insert_id();
			$res = array();
			if($return){				
				$records = $_POST['records'];
				foreach($records as $record){
					$tmp = array();
					$tmp['tbl_teacher_tea_id'] = $tea_id;
					$tmp['rec_date'] = $record['date'];
					$tmp['rec_time'] = $record['time'];
					$tmp['rec_desc'] = $record['desc'];
					$tmp['rec_student'] = $record['student'];
					$tmp['rec_absent'] = $record['absent'];
					$tmp['rec_other'] = $record['other'];
					$this->db->insert(TABLE_PREFIX . 'teacher_record', $tmp);
				}						
				$res = array('result'=>'ok');
			}else{
				$res = array('result'=>'error');
			}
		}else{
			$res = array('result'=>'exists');
		}
		return $res;
    }
	
	function checkExists($data){
		$res = false;
		foreach($data as $field=>$value){
			$this->db->where($field,$value);
		}
		$query = $this->db->get(TABLE_PREFIX . 'teacher', $data);
		if($query->num_rows>0){
			$res = true;
		}		
		return $res;
	}

    /**
     * Edit a Class
     * @return true/false
     */
    function update($tea_id=0) {
		$data['tbl_staff_sta_id'] = $this->input->post('tbl_staff_sta_id');
        $data['tbl_subject_sub_id'] = $this->input->post('tbl_subject_sub_id');
		$data['tbl_classes_cla_id'] = $this->input->post('tbl_classes_cla_id');
		$data['tea_academic_year'] = $this->input->post('tea_academic_year');
		$data['tea_semester'] = $this->input->post('tea_semester');
		$data['tea_year'] = $this->input->post('tea_year');
		
		$this->db->where('tea_id',$tea_id);
		$return = $this->db->update(TABLE_PREFIX . 'teacher', $data);
		$res = array();		
		if($return){
			//todo delete detail
			$this->db->where('tbl_teacher_tea_id', $tea_id);
			$this->db->delete(TABLE_PREFIX . 'teacher_record');
			
			//todo add new detail
			$records = $_POST['records'];
			foreach($records as $record){
				$tmp = array();
				$tmp['tbl_teacher_tea_id'] = $tea_id;
				$tmp['rec_date'] = $record['date'];
				$tmp['rec_time'] = $record['time'];
				$tmp['rec_desc'] = $record['desc'];
				$tmp['rec_student'] = $record['student'];
				$tmp['rec_absent'] = $record['absent'];
				$tmp['rec_other'] = $record['other'];
				$this->db->insert(TABLE_PREFIX . 'teacher_record', $tmp);
			}
			$res = array('result'=>'ok');
		}else{
			$res = array('result'=>'error');
		}
		return $res;
    }

}
