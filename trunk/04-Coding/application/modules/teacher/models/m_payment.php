<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Payment extends CI_Model {
	
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
	
	function findAllPayment($num_row, $from_row) {
		$res = array();
		$this->db->select('t.*,st.sta_name,st.sta_sex,sum(pr.hours) as hours');
        $this->db->from(TABLE_PREFIX . 'teacher_payment t');
		$this->db->join(TABLE_PREFIX . 'staff st', 't.tbl_staff_sta_id = st.sta_id');
		$this->db->join(TABLE_PREFIX . 'teacher_payment_record pr', 't.pay_id = pr.tbl_teacher_payment_pay_id');
		
		if($this->input->post('tbl_staff_sta_id') != '') {
            $this->db->where('t.tbl_staff_sta_id',$this->input->post('tbl_staff_sta_id'));
        }
		$this->db->where('t.pay_status',1);
        $this->db->order_by('t.pay_id', 'desc');
		$this->db->group_by('t.pay_id');
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

    function countAllPayment() {
		$this->db->from(TABLE_PREFIX . 'teacher_payment t');
		
		if($this->input->post('tbl_staff_sta_id') != '') {
            $this->db->where('t.tbl_staff_sta_id',$this->input->post('tbl_staff_sta_id'));
        }
		$this->db->where('t.pay_status',1);
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
	
	function getTeacher(){
		$res = array();
		$sdate = $this->input->post('start_date');
		$edate = $this->input->post('end_date');
		$this->db->select('st.sta_id,st.sta_name');
		$this->db->join(TABLE_PREFIX . 'staff st','t.tbl_staff_sta_id=st.sta_id');
		$this->db->join(TABLE_PREFIX . 'teacher_record tr','tr.tbl_teacher_tea_id=t.tea_id');
		$this->db->where("tr.rec_date BETWEEN '$sdate' AND '$edate'");
		$this->db->group_by('t.tbl_staff_sta_id');
		$query = $this->db->get(TABLE_PREFIX . 'teacher t');
		if($query->num_rows>0){
			foreach($query->result_array() as $row){
				$res[] = $row;
			}
		}
		$query->free_result();
		return $res;
	}
	
	function getPayment(){
		$res = array();
		$id = $this->input->post('id');
		$this->db->select('t.*,st.sta_name,su.sub_name,cl.cla_promotion,sh.shi_id,sh.shi_name,count(*) as hours');
		$this->db->join(TABLE_PREFIX . 'teacher_record tr','tr.tbl_teacher_tea_id=t.tea_id');
		$this->db->join(TABLE_PREFIX . 'staff st','t.tbl_staff_sta_id=st.sta_id');
		$this->db->join(TABLE_PREFIX . 'subject su','t.tbl_subject_sub_id=su.sub_id');
		$this->db->join(TABLE_PREFIX . 'classes cl','t.tbl_classes_cla_id=cl.cla_id');
		$this->db->join(TABLE_PREFIX . 'shift sh','cl.tbl_shift_shi_id=sh.shi_id');
		$this->db->where('t.tbl_staff_sta_id',$id);
		$this->db->group_by('t.tbl_staff_sta_id,t.tbl_subject_sub_id,t.tbl_classes_cla_id,t.tea_year,t.tea_semester');
		$query = $this->db->get(TABLE_PREFIX . 'teacher t');
		if($query->num_rows>0){
			foreach($query->result_array() as $row){
				$res[] = $row;
			}
		}
		$query->free_result();
		return $res;
	}
	
	function getPaymentBy($id){
		$res = array();
		$this->db->join(TABLE_PREFIX . 'teacher_payment_record tpr','tpr.tbl_teacher_payment_pay_id=tp.pay_id');
		$this->db->join(TABLE_PREFIX . 'staff st','tp.tbl_staff_sta_id=st.sta_id');
		$this->db->join(TABLE_PREFIX . 'subject su','tpr.tbl_subject_sub_id=su.sub_id');
		$this->db->join(TABLE_PREFIX . 'shift sh','tpr.tbl_shift_shi_id=sh.shi_id');
		$this->db->where('tp.pay_id',$id);
		$query = $this->db->get(TABLE_PREFIX . 'teacher_payment tp');
		if($query->num_rows>0){
			foreach($query->result_array() as $row){
				$res[] = $row;
			}
		}
		$query->free_result();
		return $res;
	}
	
    /**
     * Add new class
     * @return true/false
     */
	function save() {
		$data['tbl_staff_sta_id'] = $this->input->post('tbl_staff_sta_id');
        $data['start_date'] = $this->input->post('start_date');
		$data['end_date'] = $this->input->post('end_date');
		$data['rate'] = $this->input->post('rate');
		if(!$this->checkExists($data)){
			$return = $this->db->insert(TABLE_PREFIX . 'teacher_payment', $data);
			$pay_id = $this->db->insert_id();
			$res = array();
			if($return){				
				$records = $_POST['records'];
				foreach($records as $record){
					$tmp = array();
					$tmp['tbl_teacher_payment_pay_id'] = $pay_id;
					$tmp['tbl_subject_sub_id'] = $record['subject'];
					$tmp['hours'] = $record['hours'];
					$tmp['tbl_shift_shi_id'] = $record['shift'];
					$tmp['year'] = $record['year'];
					$tmp['promotion'] = $record['promotion'];
					$this->db->insert(TABLE_PREFIX . 'teacher_payment_record', $tmp);
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
		$this->db->where('pay_status',1);
		$query = $this->db->get(TABLE_PREFIX . 'teacher_payment', $data);
		if($query->num_rows>0){
			$res = true;
		}		
		return $res;
	}
	
	function update($id){
		$data = array('pay_status'=>0);
		$this->db->where('pay_id',$id);
		return $this->db->update(TABLE_PREFIX . 'teacher_payment',$data);
	}
	
	function getStaffBy($id){
		$res = array();
		$this->db->where('sta_id',$id);
		$query = $this->db->get(TABLE_PREFIX.'staff');
		if($query->num_rows()>0){
			$res = $query->row();
		}
		$query->free_result();
		
		return $res;
	}
	
	function to_excel($id=0) {
		$staff = $this->getStaffBy($id);
		$filename = $staff->sta_name;
		header('Content-Disposition: attachment; filename='.$filename.'_payment.xls');
		header('Content-type: APPLICATION/force-download');
		header('Content-Transfer-Encoding: binary');
		header('Pragma: public');
		print "\xEF\xBB\xBF"; // UTF-8 BOM
		
		echo '<table>
				<tr>
					<td colspan="5">
						<p style="text-align:center;">
							<img style="margin-left:20px;" src="'.base_url().'images/logo.png" alt="" width="70"/>
							<br><br><br><br>
							សាខាសាកលវិទ្យាល័យគ្រប់គ្រង និងសេដ្ឋកិច្ច<br>
							ខេត្តកំពង់ចាម						
						</p>
					</td>
					<td colspan="5">
						<p style="text-align:center;">
							ព្រះរាជាណាចក្រកម្ពុជា<br>
							ជាតិ សាសនា ព្រះមហាក្សត្រ
						</p>			
					</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align:center;font-size:20pt;">Account Payable of Teacher</td>
				</tr>
			</table>';
		echo br(1);
		$h = array ("No.", "Name of Lecture", "Sex", "Subject", "Hours", "Rate", "Total Amount","Year","Shift","Promotion");
		
		echo '<table border="1"><tr>';
		foreach($h as $key) {
			$key = ucwords($key);
			echo '<th>'.$key.'</th>';
		}
		echo '</tr>';
		
		$data = $this->getPaymentBy($id);
		$indx = 0;
		$total_amount = 0;
		$total_hours = 0;
		$total_rate = 0;
		foreach($data as $row){
			$indx++;
			$hours = $row['hours'];
			$rate = $row['rate'];
			$amount = $hours * $rate;
			$total_hours += $hours;
			$total_amount += $amount;
			$total_rate = $rate;
			echo "<tr>";
				echo $this->writeCol($indx);
				echo $this->writeCol($row['sta_name']);
				echo $this->writeCol($row['sta_sex']=='m'?'Male':'Female');
				echo $this->writeCol($row['sub_name']);
				echo $this->writeCol($hours);
				echo $this->writeCol("$ ".number_format($rate,2));
				echo $this->writeCol("$ ".number_format($amount,2));
				echo $this->writeCol($row['year']);
				echo $this->writeCol($row['shi_name']);
				echo $this->writeCol($row['promotion']);
			echo "</tr>";
		}
		echo '</table>';
		echo br(1);
		echo '<table>
				<tr>
					<td colspan="5">
						<p style="text-align:center;">
							បានឃើញ និងឯកភាព<br>
							អ្នកយល់ព្រម						
						</p>
					</td>
					<td colspan="5">
						<p style="text-align:center;">
							កំពង់ចាម,ថ្ងៃទី.........ខែ...............ឆ្នាំ២០១៤<br>
							អ្នកទទួល
						</p>			
					</td>
				</tr>
			</table>';
	}
	
	function writeCol($txt){
		return "<td>".ucwords($txt)."</td>";
	}
}
