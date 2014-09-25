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
class m_controller extends CI_Model{
    //put your code here
    
    /**
     * Add new group
     * @return boolean
     */
    function add() {
        $data = $this->input->post();
        $this->db->set('con_created', 'NOW()', false);
        $data['con_status'] = (!empty($data['con_status']))?1:0;
        return $this->db->insert(TABLE_PREFIX . 'controllers', $data);
    }
    
    function update(){
        
        $this->db->where('con_id', $this->uri->segment(4));
        $data = $this->input->post();
        $data['con_status'] = (!empty($data['con_status']))?1:0;
        $this->db->set('con_modified', 'NOW()', false);
        return $this->db->update(TABLE_PREFIX.'controllers',$data);
    }
    
    /**
     * 
     * @param int $id
     * @return typeTableObject
     */
    function getControllerById($id=NULL){
        $this->db->from(TABLE_PREFIX.'controllers');
        $this->db->where('con_id',$id);
        $this->db->join(TABLE_PREFIX.'modules','mod_id=con_moduleid');
        return $this->db->get();
    }
    
    /**
     * 
     * @param int $id
     * @return dataTableObject
     */
    function getControllerByModuleId($id=NULL){
        
        $this->db->where('con_moduleid',$id);
        return $this->db->get(TABLE_PREFIX.'controllers');
    }
    
    function deleteControllerById($id=0){
        $this->db->where('con_id',$id);
        return $this->db->delete(TABLE_PREFIX.'controllers');
    }
    
}
