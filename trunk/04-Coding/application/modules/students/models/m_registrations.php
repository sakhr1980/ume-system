<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_registrations extends CI_Model {

    function findAllRegistrations($num_row, $from_row) {
//        $this->db->order_by('gro_id', 'desc');
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
//        if ($this->session->userdata('gro_status') != '') {
//            $this->db->where('gro_status', $this->session->userdata('gro_status'));
//        }
//
//        $this->db->limit($num_row, $from_row);
//        return $this->db->get(TABLE_PREFIX . 'groups');
        return $this->db->get(TABLE_PREFIX.'students');
    }

    function countAllRegistrations() {

//        if ($this->input->post('gro_name') != '') {
//            $this->db->like('gro_name', $this->input->post('gro_name'));
//        }
//        // Keep pagination for filter
//        if ($this->session->userdata('gro_status') != '') {
//            $this->db->where('gro_status', $this->session->userdata('gro_status'));
//        }
 
        $data = $this->db->get(TABLE_PREFIX . 'students');
        return $data->num_rows();
    }

    /**
     * Add new group
     * @return true/false
     */
    function add() {
        //var_dump($this->input->post());die();
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
        //$this->db->set('gro_created', 'NOW()', false);
        
        //var_dump($data);
        $this->db->insert(TABLE_PREFIX . 'students', $data);
        $stu_id = $this->db->insert_id();
        
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
        $this->db->where('gro_id', $this->uri->segment(4));
        $this->db->set('gro_modified', 'NOW()', false);
        // if checkbox is not checked
        if (empty($data['gro_status'])) {
            $this->db->set('gro_status', 0);
        }
        return $this->db->update(TABLE_PREFIX . 'groups', $data);
    }

    function getRegistrationById($id) {
        $this->db->where('gro_id', $id);
        return $this->db->get(TABLE_PREFIX . 'groups');
    }

    function deleteRegistrationById($id = null) {
        $this->db->where('gro_id', $id);
        return $this->db->delete(TABLE_PREFIX . 'groups');
    }
    
    // get major
    function getMajorByMasterId($id){
        $this->db->where('maj_fac_id', $id);
        $this->db->from(TABLE_PREFIX.'majors');
        $this->db->join(TABLE_PREFIX.'faculties', 'fac_id=maj_fac_id');
        return $this->db->get();
    }
    
    function getFaculties(){
        
        return $this->db->get(TABLE_PREFIX.'faculties');
    }

}
