<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class m_attendant extends CI_Model{
    
    
    public function getClasses(){
        
        $data = array();
        $this->db->select('cla_id, cla_name');
        $this->db->from(TABLE_PREFIX.'classes');
        $this->db->where('cla_status',1);
        $result = $this->db->get();
        if($result->num_rows() > 0){
            foreach($result->result() as $row){
                $data[$row->cla_id] = $row->cla_name;
            }
        }
        return $data;
    }
}