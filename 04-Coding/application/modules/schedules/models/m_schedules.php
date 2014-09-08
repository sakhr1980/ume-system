<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Schedules extends CI_Model {
	
	function getClassBy($id=0) {
		$res = array();
        $this->db->from(TABLE_PREFIX . 'classes cl');
		$this->db->join(TABLE_PREFIX . 'majors m', 'cl.cla_maj_id=m.maj_id','left');
		$this->db->join(TABLE_PREFIX . 'shift s', 'cl.tbl_shift_shi_id=s.shi_id','left');
		$this->db->join(TABLE_PREFIX . 'generation g', 'cl.tbl_generation_gen_id=g.gen_id','left');
		$this->db->where('cl.cla_id',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$res = $query->row();
		}
		$query->free_result();
		return $res;
    }
	
	function getDataSchedule($id=0) {
		$res = array();
        $this->db->join(TABLE_PREFIX . 'classes cl', 'sc.tbl_classes_cla_id=cl.cla_id');
		$this->db->join(TABLE_PREFIX . 'majors m', 'cl.cla_maj_id=m.maj_id','left');
		$this->db->join(TABLE_PREFIX . 'shift s', 'cl.tbl_shift_shi_id=s.shi_id','left');
		$this->db->join(TABLE_PREFIX . 'generation g', 'cl.tbl_generation_gen_id=g.gen_id','left');
		$this->db->where('sc.sch_id',$id);
		$query = $this->db->get(TABLE_PREFIX . 'schadule sc');
		$schedule = array();
		if($query->num_rows()>0){
			$schedule = $query->row();			
		}
		$query->free_result();
		$res['header'] = $schedule;
		if($schedule){
			$this->db->join(TABLE_PREFIX . 'staff', 'tbl_staffs_sta_id=sta_id','left');
			$this->db->join(TABLE_PREFIX . 'room', 'tbl_room_rom_id=rom_id','left');
			$this->db->join(TABLE_PREFIX . 'subject', 'tbl_subject_sub_id=sub_id','left');
			$this->db->where('tbl_schadule_sch_id',$schedule->sch_id);
			$query = $this->db->get(TABLE_PREFIX . 'schadule_detail');
			$body = array();
			if($query->num_rows()>0){
				foreach($query->result_array() as $roww){
					$time = $roww['scd_time'];
					$sec = $roww['scd_section'];
					$sday = $roww['scd_day'];
					$body['times'][$sec] = $time;
					
					$tmp = array();
					$tmp['teacher'] = $roww['tbl_staffs_sta_id'];
					$tmp['teacher_name'] = $roww['sta_name'];
					$tmp['room'] = $roww['tbl_room_rom_id'];
					$tmp['room_name'] = $roww['rom_name'];
					$tmp['subject'] = $roww['tbl_subject_sub_id'];
					$tmp['subject_name'] = $roww['sub_name'];
					
					$body['sections'][$sec][$sday] = $tmp;
				}
				$res['body'] = $body;
			}
		}
				
		return $res;
    }
	
	function printDocument($id=0) {
		$res = array();
        $this->db->from(TABLE_PREFIX . 'schadule sc');
		$this->db->join(TABLE_PREFIX . 'classes cl', 'sc.tbl_classes_cla_id=cl.cla_id');
        $this->db->join(TABLE_PREFIX . 'shift sh', 'cl.tbl_shift_shi_id=sh.shi_id','left');
        $this->db->join(TABLE_PREFIX . 'majors m', 'cl.cla_maj_id=m.maj_id','left');
		$this->db->join(TABLE_PREFIX . 'generation g', 'cl.tbl_generation_gen_id=g.gen_id','left');
		
		if($id>0) {
            $this->db->where('sc.sch_id',$id);
        }
		
        if($this->input->post('tbl_classes_cla_id') != '') {
            $this->db->where('sc.tbl_classes_cla_id',$this->input->post('tbl_classes_cla_id'));
        }
		if($this->input->post('cla_maj_id') != '') {
            $this->db->where('cl.cla_maj_id',$this->input->post('cla_maj_id'));
        }
		if($this->input->post('tbl_generation_gen_id') != '') {
            $this->db->where('cl.tbl_generation_gen_id',$this->input->post('tbl_generation_gen_id'));
        }
		if($this->input->post('tbl_shift_shi_id') != '') {
            $this->db->where('cl.tbl_shift_shi_id',$this->input->post('tbl_shift_shi_id'));
        }
		if($this->input->post('sch_year_number') != '') {
            $this->db->where('sc.sch_year_number',$this->input->post('sch_year_number'));
        }
		if($this->input->post('sch_semester') != '') {
            $this->db->where('sc.sch_semester',$this->input->post('sch_year_number'));
        }
		if($this->input->post('sch_academic_year') != '') {
            $this->db->where('sc.sch_academic_year',$this->input->post('sch_academic_year'));
        }
		
        $this->db->order_by('sc.sch_id', 'desc');
		//$this->db->limit($num_row, $from_row);
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

    function findAllSchedule($num_row, $from_row) {
		$res = array();
        $this->db->from(TABLE_PREFIX . 'schadule sc');
		$this->db->join(TABLE_PREFIX . 'classes cl', 'sc.tbl_classes_cla_id=cl.cla_id');
        $this->db->join(TABLE_PREFIX . 'shift sh', 'cl.tbl_shift_shi_id=sh.shi_id','left');
        $this->db->join(TABLE_PREFIX . 'majors m', 'cl.cla_maj_id=m.maj_id','left');
		$this->db->join(TABLE_PREFIX . 'generation g', 'cl.tbl_generation_gen_id=g.gen_id','left');
		
        if($this->input->post('tbl_classes_cla_id') != '') {
            $this->db->where('sc.tbl_classes_cla_id',$this->input->post('tbl_classes_cla_id'));
        }
		if($this->input->post('cla_maj_id') != '') {
            $this->db->where('cl.cla_maj_id',$this->input->post('cla_maj_id'));
        }
		if($this->input->post('tbl_generation_gen_id') != '') {
            $this->db->where('cl.tbl_generation_gen_id',$this->input->post('tbl_generation_gen_id'));
        }
		if($this->input->post('tbl_shift_shi_id') != '') {
            $this->db->where('cl.tbl_shift_shi_id',$this->input->post('tbl_shift_shi_id'));
        }
		if($this->input->post('sch_year_number') != '') {
            $this->db->where('sc.sch_year_number',$this->input->post('sch_year_number'));
        }
		if($this->input->post('sch_semester') != '') {
            $this->db->where('sc.sch_semester',$this->input->post('sch_year_number'));
        }
		if($this->input->post('sch_academic_year') != '') {
            $this->db->where('sc.sch_academic_year',$this->input->post('sch_academic_year'));
        }
		
        $this->db->order_by('sc.sch_id', 'desc');
		//$this->db->limit($num_row, $from_row);
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
        $this->db->from(TABLE_PREFIX . 'schadule sc');
		$this->db->join(TABLE_PREFIX . 'classes cl', 'sc.tbl_classes_cla_id=cl.cla_id');
        $this->db->join(TABLE_PREFIX . 'shift sh', 'cl.tbl_shift_shi_id=sh.shi_id','left');
        $this->db->join(TABLE_PREFIX . 'majors m', 'cl.cla_maj_id=m.maj_id','left');
		$this->db->join(TABLE_PREFIX . 'generation g', 'cl.tbl_generation_gen_id=g.gen_id','left');
		
        if($this->input->post('tbl_classes_cla_id') != '') {
            $this->db->where('sc.tbl_classes_cla_id',$this->input->post('tbl_classes_cla_id'));
        }
		if($this->input->post('cla_maj_id') != '') {
            $this->db->where('cl.cla_maj_id',$this->input->post('cla_maj_id'));
        }
		if($this->input->post('tbl_generation_gen_id') != '') {
            $this->db->where('cl.tbl_generation_gen_id',$this->input->post('tbl_generation_gen_id'));
        }
		if($this->input->post('tbl_shift_shi_id') != '') {
            $this->db->where('cl.tbl_shift_shi_id',$this->input->post('tbl_shift_shi_id'));
        }
		if($this->input->post('sch_year_number') != '') {
            $this->db->where('sc.sch_year_number',$this->input->post('sch_year_number'));
        }
		if($this->input->post('sch_semester') != '') {
            $this->db->where('sc.sch_semester',$this->input->post('sch_year_number'));
        }
		if($this->input->post('sch_academic_year') != '') {
            $this->db->where('sc.sch_academic_year',$this->input->post('sch_academic_year'));
        }
        $query = $this->db->get();
        return $query->num_rows();
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
	
	function getDataScheduleBy($field_wheres,$field_seleted){
		$res = array(0);
		$this->db->from(TABLE_PREFIX . 'schadule sc');
		$this->db->join(TABLE_PREFIX . 'classes cl', 'sc.tbl_classes_cla_id=cl.cla_id');
        $this->db->join(TABLE_PREFIX . 'shift sh', 'cl.tbl_shift_shi_id=sh.shi_id','left');
        $this->db->join(TABLE_PREFIX . 'majors m', 'cl.cla_maj_id=m.maj_id','left');
		$this->db->join(TABLE_PREFIX . 'generation g', 'cl.tbl_generation_gen_id=g.gen_id','left');
		$this->db->join(TABLE_PREFIX . 'schadule_detail scd','sc.sch_id=scd.tbl_schadule_sch_id');
		foreach($field_wheres as $field=>$value){
			$this->db->where($field,$value);
		}
		$query = $this->db->get();
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$data = $row[$field_seleted];
				if($data!=null){
					$res[] = $data;
				}
			}
		}
		$query->free_result();
		return $res;
	}

    /**
     * Add new class
     * @return true/false
     */
    function add() {
        $data['tbl_classes_cla_id'] = $this->input->post('tbl_classes_cla_id');
		$data['sch_academic_year'] = $this->input->post('sch_academic_year');
		$data['sch_semester'] = $this->input->post('sch_semester');
		$data['sch_year_number'] = $this->input->post('sch_year_number');
		if(!$this->checkExists($data)){
			$data['sch_created'] = date('Y-m-d H:i:s');
			$return = $this->db->insert(TABLE_PREFIX . 'schadule', $data);
			$sch_id = $this->db->insert_id();
			$res = array();
			if($return){
				$times = $this->input->post('times');
				$sections = $this->input->post('sections');
				$scd_section = 0;
				foreach($times as $ind=>$time){
					$scd_section++;
					$section = $sections[$ind];
					foreach($section as $day=>$subSect){
						$tmp = array();
						$tmp['tbl_schadule_sch_id'] = $sch_id;
						$tmp['tbl_staffs_sta_id'] = ($subSect['teacher']!=''?$subSect['teacher']:null);
						$tmp['tbl_room_rom_id'] = ($subSect['room']!=''?$subSect['room']:null);
						$tmp['tbl_subject_sub_id'] = ($subSect['subject']!=''?$subSect['subject']:null);
						$tmp['scd_section'] = $scd_section;
						$tmp['scd_time'] = $time;
						$tmp['scd_day'] = $day;
						$this->db->insert(TABLE_PREFIX . 'schadule_detail', $tmp);
					}
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
		$query = $this->db->get(TABLE_PREFIX . 'schadule', $data);
		if($query->num_rows>0){
			$res = true;
		}		
		return $res;
	}

    /**
     * Edit a Class
     * @return true/false
     */
    function update($sch_id=0) {
       $data['tbl_classes_cla_id'] = $this->input->post('tbl_classes_cla_id');
		$data['sch_academic_year'] = $this->input->post('sch_academic_year');
		$data['sch_semester'] = $this->input->post('sch_semester');
		$data['sch_year_number'] = $this->input->post('sch_year_number');
		$data['sch_created'] = date('Y-m-d H:i:s');
		$this->db->where('sch_id',$sch_id);
		$return = $this->db->update(TABLE_PREFIX . 'schadule', $data);
		$res = array();
		if($return){
			//todo delete detail
			$this->db->where('tbl_schadule_sch_id', $sch_id);
			$this->db->delete(TABLE_PREFIX . 'schadule_detail');
			
			//todo add new detail
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
		
			$res = array('result'=>'ok');
		}else{
			$res = array('result'=>'error');
		}
		return $res;
    }

    function getClassById($id) {
        $this->db->where('cla_id', $id);
        return $this->db->get(TABLE_PREFIX . 'classes');
    }
    

    function deleteScheduleById($id = 0) {
		$this->db->where('tbl_schadule_sch_id', $id);
        $res = $this->db->delete(TABLE_PREFIX . 'schadule_detail');
		if($res){
			$this->db->where('sch_id', $id);
			return $this->db->delete(TABLE_PREFIX . 'schadule');
		}
		return $res;
    }

    function selectJoinClass($id) {
        $this->db->where('cla_id', $id);
        $this->db->from(TABLE_PREFIX . 'classes');
        $this->db->join(TABLE_PREFIX . 'majors', 'cla_maj_id=maj_id', 'left');
        $this->db->join(TABLE_PREFIX . 'shift', 'tbl_shift_shi_id=shi_id', 'left');

        return $this->db->get();
    }

}
