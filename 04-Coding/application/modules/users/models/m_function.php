<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_function extends CI_Model {

    function findAllFunctions($num_row, $from_row) {

        $this->db->order_by('tas_name', 'asc');

        if ($this->input->post('tas_functionname') != '') {
            $this->db->like('tas_functionname', $this->input->post('tas_functionname'));
        }

        // Keep pagination for filter status
        rememberFilter(array('tas_status', 'con_id', 'mod_id'), $this->db);
        //-----------------------

        $this->db->limit($num_row, $from_row);
        $this->db->from(TABLE_PREFIX . 'modules');
        $this->db->join(TABLE_PREFIX . 'controllers', 'mod_id=con_moduleid','left');
        $this->db->join(TABLE_PREFIX . 'tasks', 'con_id=tas_controllerid','left');
        return $this->db->get();
    }

    function countAllFunctions() {

        if ($this->input->post('tas_functionname') != '') {
            $this->db->like('tas_functionname', $this->input->post('tas_functionname'));
        }

        // Keep pagination for filter status
        rememberFilter(array('tas_status', 'con_id', 'mod_id'), $this->db);
        //-----------------------

        $this->db->from(TABLE_PREFIX . 'modules');
        $this->db->join(TABLE_PREFIX . 'controllers', 'mod_id=con_moduleid','left');
        $this->db->join(TABLE_PREFIX . 'tasks', 'con_id=tas_controllerid','left');
        return $this->db->get()->num_rows();
    }

    

}
