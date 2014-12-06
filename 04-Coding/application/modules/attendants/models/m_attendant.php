<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_attendant extends CI_Model {

    public $user;

    public function m_attendant() {
        $this->user = $this->session->userdata('user');
    }

    public function getAttendants() {
        $this->db->from(TABLE_PREFIX . 'attendants');
        $this->db->join(TABLE_PREFIX . 'classes', 'cla_id=att_classid');
        $this->db->join(TABLE_PREFIX . 'generation', 'gen_id=att_genid');
        if($this->input->post('cla_id')){
            $this->db->where('att_classid', $this->input->post('cla_id'));
        }
        return $this->db->get();
    }

    // Get class
    public function getClasses($generation_id = 0) {

        $data = array();
        $this->db->select('cla_id, cla_name');
        $this->db->from(TABLE_PREFIX . 'classes');
        $this->db->where('cla_status', 1);
        $this->db->where('tbl_generation_gen_id', $generation_id);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $data[$row->cla_id] = $row->cla_name;
            }
        }
        return $data;
    }

    public function getStudentsByClassId($classId) {
        $this->db->from(TABLE_PREFIX . 'students');
        $this->db->join(TABLE_PREFIX . 'student_class', 'stu_id=stucla_stu_id');
        $this->db->join(TABLE_PREFIX . 'classes', 'cla_id=stucla_cla_id');
        $this->db->where('cla_status', 1);
        $this->db->where('cla_id', $classId);
        return $this->db->get();
    }

    /**
     * 
     */
    public function getGeneration() {

        $data = array();
        $this->db->select('gen_id, gen_title');
        $this->db->from(TABLE_PREFIX . 'generation');
        $this->db->where('gen_status', 1);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $data[$row->gen_id] = $row->gen_title;
            }
        }
        return $data;
    }

    /**
     * Add new attandants for students
     */
    public function addAttendant() {

        // start transaction
        $this->db->trans_begin();

        $input = $this->input->post();
        $this->db->insert(TABLE_PREFIX . 'attendants', array(
            'att_classid' => $input['class'],
            'att_genid' => $input['academic_year'],
            'att_date' => $input['date'],
            'att_creater' => $this->user['use_id']
        ));
        $attendantid = $this->db->insert_id();

        $data = array();
        foreach ($input['studentid'] as $value) {
            $data[] = array(
                'atd_studentid' => $value,
                'atd_attendant' => (!empty($input['attendant_' . $value])) ? 1 : 0,
                'atd_attendantid' => $attendantid,
                'atd_comment' => $input['comment_' . $value],
            );
        }
        $this->db->insert_batch(TABLE_PREFIX . 'attendant_detail', $data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            // save data
            $this->db->trans_commit();
            return TRUE;
        }
    }

    /**
     * 
     * @param in $id
     * @return dataSet
     */
    public function getAttendantById($id) {
        $this->db->from(TABLE_PREFIX . 'attendants');
        $this->db->join(TABLE_PREFIX . 'attendant_detail', 'att_id=atd_attendantid');
        $this->db->join(TABLE_PREFIX . 'students', 'stu_id=atd_studentid');
        $this->db->join(TABLE_PREFIX . 'classes', 'cla_id=att_classid');
        $this->db->join(TABLE_PREFIX . 'generation', 'gen_id=att_genid');
        $this->db->where('att_id', $id);
        return $this->db->get();
    }

    /**
     * 
     * @return boolean
     */
    public function updateAttendants() {
        
        // start transaction
        $this->db->trans_begin();

        $input = $this->input->post();

        $data = array();
        foreach ($input['atd_id'] as $id) {
            $data[] = array(
                'atd_id' => $id,
                'atd_attendant' => ((!empty($input['attendant_' . $id])) ? 1 : 0),
                'atd_comment' => $input['comment_' . $id],
            );
        }
        // Multi update
        $this->db->update_batch(TABLE_PREFIX . 'attendant_detail', $data,'atd_id');// Where atd_id=?

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            // save data
            $this->db->trans_commit();
            return TRUE;
        }
        
    }
    
    /**
     * 
     * @param int $id attendant id
     * @return boolean
     */
    public function deleteAttendants($id) {
        
        // start transaction
        $this->db->trans_begin();
        $this->db->where('atd_attendantid', $id);
        $this->db->delete(TABLE_PREFIX . 'attendant_detail');
        $this->db->where('att_id', $id);
        $this->db->delete(TABLE_PREFIX . 'attendants');

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            // save data
            $this->db->trans_commit();
            return TRUE;
        }
        
    }

}
