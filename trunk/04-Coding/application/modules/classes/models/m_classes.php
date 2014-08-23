<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Classes extends CI_Model {

    function findAllClass($num_row, $from_row) {
        $this->db->order_by('cla_id', 'desc');

//        if ($this->input->post('cla_namel') != '') {
//            $this->db->like('cla_name', $this->input->post('cla_name'));
//        }
//
//         Keep pagination for filter status
        if ($this->input->post('cla_name') != '') {
            $this->session->set_userdata('cla_name', $this->input->post('cla_name'));
        }
        if ($this->input->post('submit') && $this->input->post('cla_name') == '') {
            $this->session->set_userdata('cla_name', '');
        }
        if ($this->session->userdata('cla_name') != '') {
            $this->db->where('cla_name', $this->session->userdata('cla_name'));
        }
//        // Keep pagination for filter group
//        if ($this->input->post('cla_maj_id') && $this->input->post('cla_maj_id') != '') {
//            $this->session->set_userdata('cla_maj_id', $this->input->post('cla_maj_id'));
//        }
//        if ($this->input->post('submit') && $this->input->post('cla_maj_id') == '') {
//            $this->session->set_userdata('cla_maj_id', '');
//        }
//        if ($this->session->userdata('cla_maj_id') && $this->session->userdata('cla_maj_id') != '') {
//            $this->db->where('cla_maj_id', $this->session->userdata('cla_maj_id'));
//        }
        //-----------------------
        $this->db->where('cla_status',1);
        $this->db->limit($num_row, $from_row);
        $this->db->from(TABLE_PREFIX . 'classes');
        $this->db->join(TABLE_PREFIX . 'shift', 'tbl_shift_shi_id=shi_id');
        $this->db->join(TABLE_PREFIX . 'majors', 'cla_maj_id=maj_id');
//        $this->db->join(TABLE_PREFIX . 'faculties', 'maj_id = tbl_faculties_fac_id', 'left');
        $this->db->group_by('cla_id');
        return $this->db->get();
    }

    function countAllClass() {

        // Keep pagination for filter name
        if ($this->input->post('cla_name') != '') {
            $this->session->set_userdata('cla_name', $this->input->post('cla_name'));
        }
        if ($this->input->post('submit') && $this->input->post('cla_name') == '') {
            $this->session->set_userdata('cla_name', '');
        }
        if ($this->session->userdata('cla_name') != '') {
            $this->db->where('cla_name', $this->session->userdata('cla_name'));
        }
        // Keep pagination for filter group
//        if ($this->input->post('cla_maj_id') && $this->input->post('cla_maj_id') != '') {
//            $this->session->set_userdata('cla_maj_id', $this->input->post('cla_maj_id'));
//        }
//        if ($this->input->post('submit') && $this->input->post('cla_maj_id') == '') {
//            $this->session->set_userdata('cla_maj_id', '');
//        }
//        if ($this->session->userdata('cla_maj_id') && $this->session->userdata('cla_maj_id') != '') {
//            $this->db->where('cla_maj_id', $this->session->userdata('cla_maj_id'));
//        }
        //-----------------------
        $this->db->where('cla_status',1);
        $this->db->from(TABLE_PREFIX . 'classes');
        $this->db->join(TABLE_PREFIX . 'shift', 'tbl_shift_shi_id=shi_id');
        $this->db->join(TABLE_PREFIX . 'majors', 'cla_maj_id=maj_id');
//        $this->db->join(TABLE_PREFIX . 'faculties', 'maj_id = tbl_faculties_fac_id', 'left');
        $this->db->group_by('cla_id');
        $data = $this->db->get();
        return $data->num_rows();
    }

    /**
     * Add new class
     * @return true/false
     */
    function add() {
        $data = $this->input->post();
        unset($data['fac_id']);
        $result = $this->db->insert(TABLE_PREFIX . 'classes', $data);

        return $result;
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
