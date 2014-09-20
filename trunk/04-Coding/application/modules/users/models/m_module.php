<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_module
 *
 * @author sochy
 */
class m_module extends CI_Model{
    //put your code here
    
    /**
     * Add new group
     * @return true/false
     */
    function add() {
        $data = $this->input->post();
        $this->db->set('mod_created', 'NOW()', false);
        return $this->db->insert(TABLE_PREFIX . 'modules', $data);
    }
    
    function update(){
        
        $this->db->where('mod_id', $this->uri->segment(4));
        $data = $this->input->post();
        $data['mod_status'] = (!empty($data['mod_status']))?TRUE:FALSE;
        return $this->db->update(TABLE_PREFIX.'modules',$data);
    }
    
    /**
     * 
     * @param int $id
     * @return data set object
     */
    function getModuleById($id=NULL){
        $this->db->where('mod_id',$id);
        $data = $this->db->get(TABLE_PREFIX.'modules');
        return $data;
    }
    
    function deleteModuleById($id=0){
        $this->db->where('mod_id',$id);
        return $this->db->delete(TABLE_PREFIX.'modules');
    }
}
