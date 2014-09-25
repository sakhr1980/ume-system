<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_function extends CI_Model {

    function findAllFunctions($num_row, $from_row) {

        $this->db->order_by('mod_foldername', 'asc');
        $this->db->order_by('con_controllername', 'asc');
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

    
    /**
     * Add new function
     * @return boolean
     */
    function add() {
        $data = $this->input->post();
        $this->db->set('tas_created', 'NOW()', false);
        $data['tas_status'] = (!empty($data['tas_status']))?1:0;
        unset($data['tas_moduleid']);
        return $this->db->insert(TABLE_PREFIX . 'tasks', $data);
    }
    
    /**
     * 
     * @return boolean
     */
    function update(){
        
        $this->db->where('tas_id', $this->uri->segment(4));
        $data = $this->input->post();
        $data['tas_status'] = (!empty($data['tas_status']))?1:0;
        $this->db->set('tas_modified', 'NOW()', false);
        unset($data['tas_moduleid']);
        return $this->db->update(TABLE_PREFIX.'tasks',$data);
    }
    
    /**
     * 
     * @param in $id
     * @return DataObject
     */
    function deleteFunctionById($id=0){
        
        $this->db->where('tas_id',$id);
        return $this->db->delete(TABLE_PREFIX.'tasks');
    }
    
    function getFunctionById($id=0){
        $this->db->where('tas_id',$id);
        
        $this->db->from(TABLE_PREFIX . 'modules');
        $this->db->join(TABLE_PREFIX . 'controllers', 'mod_id=con_moduleid','left');
        $this->db->join(TABLE_PREFIX . 'tasks', 'con_id=tas_controllerid','left');
        return $this->db->get();
    }
    

}
