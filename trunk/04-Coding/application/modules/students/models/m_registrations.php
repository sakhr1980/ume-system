<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_registrations extends CI_Model {

    function findAllRegistrations($num_row, $from_row) {
//
//        if ($this->input->post('gro_name') != '') {
//            $this->db->like('gro_name', $this->input->post('gro_name'));
//        }
//        
//        if($this->input->post('gro_status')!=''){
//            $this->session->set_userdata('gro_status', $this->input->post('gro_status'));
//        }
//        
//        // if All status
//        if($this->input->post('submit') && $this->input->post('gro_status')==''){
//            $this->session->set_userdata('gro_status', '');
//        }
//        
//        
//        // Keep pagination for filter
        if ($this->input->post('stu_en_firstname') != '') {
            $this->db->like('stu_en_firstname', $this->input->post('stu_en_firstname'));
        }
        if ($this->input->post('stu_en_lastname') != '') {
            $this->db->like('stu_en_lastname', $this->input->post('stu_en_lastname'));
        }
        if ($this->input->post('cla_name') != '') {
            $this->db->like('cla_name', $this->input->post('cla_name'));
        }

        $this->db->order_by('s.stu_id', 'desc');
        $this->db->limit($num_row, $from_row);
        $this->db->from(TABLE_PREFIX . 'students s');
        $this->db->join(TABLE_PREFIX . 'student_class sc', 's.stu_id = sc.tbl_students_stu_id');
        $this->db->join(TABLE_PREFIX . 'classes cl', 'cl.cla_id = sc.tbl_class_cla_id');
        $this->db->join(TABLE_PREFIX . 'majors ma', 'ma.maj_id = cl.cla_maj_id');
        return $this->db->get();
//        return $this->db->get(TABLE_PREFIX . 'students');
    }

    function countAllRegistrations() {

//        if ($this->input->post('gro_name') != '') {
//            $this->db->like('gro_name', $this->input->post('gro_name'));
//        }
//        // Keep pagination for filter
//        if ($this->session->userdata('gro_status') != '') {
//            $this->db->where('gro_status', $this->session->userdata('gro_status'));
//        }
        $this->db->from(TABLE_PREFIX . 'students s');
        $this->db->join(TABLE_PREFIX . 'student_class sc', 's.stu_id = sc.tbl_students_stu_id');
        $this->db->join(TABLE_PREFIX . 'classes cl', 'cl.cla_id = sc.tbl_class_cla_id');
        $this->db->join(TABLE_PREFIX . 'majors ma', 'ma.maj_id = cl.cla_maj_id');
        $data = $this->db->get();
        return $data->num_rows();
    }

    /**
     * Add new group
     * @return true/false
     */
    function add() {
        $class_id = "";
        //var_dump($this->input->post());die();
        $stu_card_id = "";
        $data = $this->input->post();
        $exp_date = $data['exp_date'];
        $exp_shift = $data['exp_shift'];
        $exp_position = $data['exp_position'];
        $exp_employer_tel = $data['exp_employer_tel'];
        $exp_responsibility = $data['exp_responsibility'];

        unset($data['exp_date']);
        unset($data['exp_shift']);
        unset($data['exp_position']);
        unset($data['exp_employer_tel']);
        unset($data['exp_responsibility']);
        unset($data['stu_image']);

        unset($data['shift']);
        unset($data['major']);
        unset($data['degree']);
        $class_id = $data['class'];
        unset($data['class']);

        //$this->db->set('gro_created', 'NOW()', false);
        //var_dump($data);
        $this->db->insert(TABLE_PREFIX . 'students', $data);
        $stu_id = $this->db->insert_id();
        //Insert data to class of student
        $class_date = array(
            'tbl_students_stu_id' => $stu_id,
            'tbl_class_cla_id' => $class_id
        );

        $this->db->insert(TABLE_PREFIX . 'student_class', $class_date);
        $i = 0;
        foreach ($exp_date as $value) {
            $ext['exp_stu_id'] = $stu_id;
            $ext['exp_date'] = $exp_date[$i];
            $ext['exp_shift'] = $exp_shift[$i];
            $ext['exp_position'] = $exp_position[$i];
            $ext['exp_employer_tel'] = $exp_employer_tel[$i];
            $ext['exp_responsibility'] = $exp_responsibility[$i];
            $this->db->insert('tbl_experiences', $ext);
            $ext = NULL;
        }
        return true;
    }

    /**
     * Edit a group
     * @return true/false
     */
    function update() {
        $data = $this->input->post();
        $stu_id = $this->uri->segment(4);
        $exp_date = $data['exp_date'];
        if ($data['exp_shift'] = !"") {
            $exp_shift = $data['exp_shift'];
        }
        $exp_position = $data['exp_position'];
        $exp_employer_tel = $data['exp_employer_tel'];
        $exp_responsibility = $data['exp_responsibility'];

        unset($data['exp_date']);
        unset($data['exp_shift']);
        unset($data['exp_position']);
        unset($data['exp_employer_tel']);
        unset($data['exp_responsibility']);
        unset($data['stu_image']);

        unset($data['shift']);
        unset($data['major']);
        unset($data['degree']);
        if ($data['class'] = !"") {
            $class_id = $data['class'];
        }

        unset($data['class']);
        $this->db->where('stu_id', $stu_id);
        $this->db->update(TABLE_PREFIX . 'students', $data);
        //$this->db->set('gro_created', 'NOW()', false);
//        $this->db->insert(TABLE_PREFIX . 'students', $data);
//        $stu_id = $this->db->insert_id();
        //Insert data to class of student
        $class_data = array(
            'tbl_students_stu_id' => $stu_id,
            'tbl_class_cla_id' => $class_id
        );
        $where_data = array(
            'tbl_students_stu_id' => $stu_id,
            'tbl_class_cla_id' => $this->session->userdata('stu_class')
        );
        $this->db->where($where_data);
        $this->db->update(TABLE_PREFIX . 'student_class', $class_data);

        $i = 0;
        foreach ($exp_date as $value) {
            $ext['exp_stu_id'] = $stu_id;
            $ext['exp_date'] = $exp_date[$i];
            $ext['exp_shift'] = $exp_shift[$i];
            $ext['exp_position'] = $exp_position[$i];
            $ext['exp_employer_tel'] = $exp_employer_tel[$i];
            $ext['exp_responsibility'] = $exp_responsibility[$i];
            $this->db->where('exp_stu_id', $stu_id);
            $this->db->update(TABLE_PREFIX . 'experiences', $ext);
            $ext = NULL;
        }
//        $this->db->set('gro_modified', 'NOW()', false);
        // if checkbox is not checked

        return true;
    }

    function getStudentById($id = NULL) {
        $this->db->from(TABLE_PREFIX . 'students s');
        $this->db->join(TABLE_PREFIX . 'student_class sc', 's.stu_id = sc.tbl_students_stu_id');
        $this->db->join(TABLE_PREFIX . 'classes cl', 'cl.cla_id = sc.tbl_class_cla_id');
        $this->db->join(TABLE_PREFIX . 'majors ma', 'ma.maj_id = cl.cla_maj_id');
        $this->db->where('s.stu_id', $id);
        return $this->db->get();
    }

    function deleteStudentById($id = null) {
        $this->db->where('stu_id', $id);
        return $this->db->delete(TABLE_PREFIX . 'students');
    }

    // get major
    function getMajorByMasterId($id) {
        $this->db->where('maj_fac_id', $id);
        $this->db->from(TABLE_PREFIX . 'majors');
        $this->db->join(TABLE_PREFIX . 'faculties', 'fac_id=maj_fac_id');
        return $this->db->get();
    }

    function getFaculties() {

        return $this->db->get(TABLE_PREFIX . 'faculties');
    }

    function getClassById($shift = NULL, $generation = NULL, $major = NULL) {
        $array = array('tbl_shift_shi_id' => $shift, 'cla_maj_id' => $major, 'tbl_generation_gen_id' => $generation);
        $this->db->where($array);
        $this->db->select('cl.cla_id,cl.cla_name,count("sc.tbl_students_stu_id") as "studnetNumber"');
        $this->db->from(TABLE_PREFIX . 'classes cl');
        $this->db->join(TABLE_PREFIX . 'student_class sc', 'cl.cla_id=sc.tbl_class_cla_id', 'left');
        $this->db->group_by("sc.tbl_class_cla_id");
        return $this->db->get();
    }

    function getUdateClassById($classId = NULL, $studentId = NULL) {
        $array = array('tbl_shift_shi_id' => $studentId, 'tbl_class_cla_id' => $classId);
        $this->db->where($array);
        $this->db->select('cl.cla_id,cl.cla_name,count("sc.tbl_students_stu_id") as "studnetNumber"');
        $this->db->from(TABLE_PREFIX . 'classes cl');
        $this->db->join(TABLE_PREFIX . 'student_class sc', 'cl.cla_id=sc.tbl_class_cla_id', 'left');
        $this->db->group_by("sc.tbl_class_cla_id");
        return $this->db->get();
    }

}
