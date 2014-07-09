<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Classes extends CI_Model {

    function findAllClass($num_row, $from_row) {
        $this->db->order_by('cla_id', 'desc');

        if ($this->input->post('cla_namel') != '') {
            $this->db->like('cla_name', $this->input->post('cla_name'));
        }

//         Keep pagination for filter status
        if ($this->input->post('cla_status') != '') {
            $this->session->set_userdata('cla_status', $this->input->post('cla_status'));
        }
        if ($this->input->post('submit') && $this->input->post('cla_status') == '') {
            $this->session->set_userdata('cla_status', '');
        }
        if ($this->session->userdata('cla_status') != '') {
            $this->db->where('cla_status', $this->session->userdata('cla_status'));
        }
        // Keep pagination for filter group
        if ($this->input->post('tbl_major_maj_id') && $this->input->post('tbl_major_maj_id') != '') {
            $this->session->set_userdata('tbl_major_maj_id', $this->input->post('tbl_major_maj_id'));
        }
        if ($this->input->post('submit') && $this->input->post('tbl_major_maj_id') == '') {
            $this->session->set_userdata('tbl_major_maj_id', '');
        }
        if ($this->session->userdata('tbl_major_maj_id') && $this->session->userdata('tbl_major_maj_id') != '') {
            $this->db->where('tbl_major_maj_id', $this->session->userdata('tbl_major_maj_id'));
        }
        //-----------------------

        $this->db->limit($num_row, $from_row);
        $this->db->from(TABLE_PREFIX . 'classes');
        $this->db->join(TABLE_PREFIX . 'shift', 'tbl_shift_shi_id=shi_id', 'left');
        $this->db->join(TABLE_PREFIX . 'majors', 'tbl_major_maj_id=maj_id', 'left');
//        $this->db->join(TABLE_PREFIX . 'faculties', 'maj_id = tbl_faculties_fac_id', 'left');
//        $this->db->group_by('cla_id');
        return $this->db->get();
    }

    function countAllClass() {

        // Keep pagination for filter status
        if ($this->input->post('cla_status') != '') {
            $this->session->set_userdata('cla_status', $this->input->post('cla_status'));
        }
        if ($this->input->post('submit') && $this->input->post('cla_status') == '') {
            $this->session->set_userdata('cla_status', '');
        }
        if ($this->session->userdata('cla_status') != '') {
            $this->db->where('cla_status', $this->session->userdata('cla_status'));
        }
        // Keep pagination for filter group
        if ($this->input->post('tbl_major_maj_id') && $this->input->post('tbl_major_maj_id') != '') {
            $this->session->set_userdata('tbl_major_maj_id', $this->input->post('tbl_major_maj_id'));
        }
        if ($this->input->post('submit') && $this->input->post('tbl_major_maj_id') == '') {
            $this->session->set_userdata('tbl_major_maj_id', '');
        }
        if ($this->session->userdata('tbl_major_maj_id') && $this->session->userdata('tbl_major_maj_id') != '') {
            $this->db->where('tbl_major_maj_id', $this->session->userdata('tbl_major_maj_id'));
        }
        //-----------------------

        $this->db->from(TABLE_PREFIX . 'classes');
        $this->db->join(TABLE_PREFIX . 'shift', 'tbl_shift_shi_id=shi_id', 'left');
        $this->db->join(TABLE_PREFIX . 'majors', 'cla_id=tbl_major_maj_id', 'left');
//        $this->db->join(TABLE_PREFIX . 'faculties', 'maj_id = tbl_faculties_fac_id', 'left');
//        $this->db->group_by('cla_id');
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
        unset($data['fac_id']);

        $this->db->where('cla_id', $this->uri->segment(4));
//        $this->db->set('use_modified', 'NOW()', false);
        // if checkbox is not checked
//        if (empty($data['use_status'])) {
//            $this->db->set('use_status', 0);
//        }
        return $this->db->update(TABLE_PREFIX . 'classes', $data);
    }

    function getClassById($id) {
        $this->db->where('cla_id', $id);
        return $this->db->get(TABLE_PREFIX . 'classes');
    }

    function deleteGroupById($id = null) {
        $this->db->where('use_id', $id);
        return $this->db->delete(TABLE_PREFIX . 'users');
    }

    function selectJoinClass($id) {
        $this->db->where('cla_id', $id);
        $this->db->from(TABLE_PREFIX . 'classes');
        $this->db->join(TABLE_PREFIX . 'majors', 'tbl_major_maj_id=maj_id', 'left');

        return $this->db->get();
    }

}
