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
        return $this->db->insert(TABLE_PREFIX . 'controllers', $data);
    }
    
}
