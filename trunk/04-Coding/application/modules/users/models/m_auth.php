<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_auth
 *
 * @author sochy
 */
class m_auth extends CI_Model{
    //put your code here
    
    /**
     * 
     * @return BOOLEAN
     */
    function isSignin(){
        return (!empty($this->session->userdata('user')))?TRUE:FALSE;
    }
    
    /**
     * 
     * @param int $userid 
     * @param int $groupid
     * @param string $functionname
     * @param string $controllername
     * @param string $modulename
     * @return boolean
     */
    function isAuthorized($userid, $groupid, $functionname, $controllername, $modulename){
        $this->db->from(TABLE_PREFIX.'users');
        $this->db->where('use_id',$userid);
        $this->db->where('gro_id',$groupid);
        $this->db->where('tas_functionname',$functionname);
        $this->db->where('con_controllername',$controllername);
        $this->db->where('mod_foldername',$modulename);
        $this->db->join(TABLE_PREFIX.'user_group','use_id=usegro_userid');
        $this->db->join(TABLE_PREFIX.'groups','gro_id=usegro_groupid');
        $this->db->join(TABLE_PREFIX.'group_task','gro_id=grotas_groupid');
        $this->db->join(TABLE_PREFIX.'tasks','tas_id=grotas_taskid');
        $this->db->join(TABLE_PREFIX.'controllers','con_id=tas_controllerid');
        $this->db->join(TABLE_PREFIX.'modules','mod_id=con_moduleid');
        $data = $this->db->get();
        
        if($data->num_rows() > 0){
            return true;
        }
        return FALSE;
    }
}
