<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_groups extends CI_Model {

    function findAllGroups($num_row, $from_row) {
        $this->db->order_by('gro_id', 'desc');

        if ($this->input->post('gro_name') != '') {
            $this->db->like('gro_name', $this->input->post('gro_name'));
        }

        if ($this->input->post('gro_status') != '') {
            $this->session->set_userdata('gro_status', $this->input->post('gro_status'));
        }

        // if All status
        if ($this->input->post('submit') && $this->input->post('gro_status') == '') {
            $this->session->set_userdata('gro_status', '');
        }


        // Keep pagination for filter
        if ($this->session->userdata('gro_status') != '') {
            $this->db->where('gro_status', $this->session->userdata('gro_status'));
        }

        $this->db->limit($num_row, $from_row);
        return $this->db->get(TABLE_PREFIX . 'groups');
    }

    function countAllGroups() {

        if ($this->input->post('gro_name') != '') {
            $this->db->like('gro_name', $this->input->post('gro_name'));
        }
        // Keep pagination for filter
        if ($this->session->userdata('gro_status') != '') {
            $this->db->where('gro_status', $this->session->userdata('gro_status'));
        }

        $data = $this->db->get(TABLE_PREFIX . 'groups');
        return $data->num_rows();
    }

    /**
     * Add new group
     * @return true/false
     */
    function add() {
        $this->db->trans_start();
        $data = $this->input->post();
        $tasks = $data['tas_id'];
        unset($data['tas_id']);
        $this->db->set('gro_created', 'NOW()', false);
        // if checkbox is not checked
        if (empty($data['gro_status'])) {
            $this->db->set('gro_status', 0);
        } else {
            $this->db->set('gro_status', 1);
        }
        $this->db->insert(TABLE_PREFIX . 'groups', $data);
        $gro_id = $this->db->insert_id();
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        }
        else{
            $grotas = NULL;
            if(count($tasks) > 0){
                foreach ($tasks as $value) {
                    $grotas[] = array('grotas_groupid'=>$gro_id,'grotas_taskid'=>$value);
                }
                return $this->db->insert_batch(TABLE_PREFIX.'group_task', $grotas); 
            }
            return TRUE;
        }
        return FALSE;

        
    }

    /**
     * Edit a group
     * @return true/false
     */
    function update($id=0) {
        
        // Remove existing group_task
        $this->db->trans_start();
        $this->db->where('grotas_groupid',$id);
        $this->db->delete(TABLE_PREFIX.'group_task');
        $this->db->trans_complete();
        // update group
        if($this->db->trans_status()===TRUE){
            
            $this->db->trans_start();
            $data = $this->input->post();
            $tasks = $data['tas_id'];
            unset($data['tas_id']);
            $this->db->set('gro_created', 'NOW()', false);
            // if checkbox is not checked
            if (empty($data['gro_status'])) {
                $this->db->set('gro_status', 0);
            } else {
                $this->db->set('gro_status', 1);
            }
            $this->db->where('gro_id', $id);
            $this->db->update(TABLE_PREFIX . 'groups', $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                return FALSE;
            }
            else{
                $grotas = NULL;
                if(count($tasks) > 0){
                    foreach ($tasks as $value) {
                        $grotas[] = array('grotas_groupid'=>$id,'grotas_taskid'=>$value);
                    }
                    return $this->db->insert_batch(TABLE_PREFIX.'group_task', $grotas); 
                }
                return TRUE;
            }
            return FALSE;
        }
    }

    function getGroupById($id=0) {
        $this->db->where('gro_id', $id);
        return $this->db->get(TABLE_PREFIX . 'groups');
    }

    function deleteGroupById($id = null) {
        $this->db->where('gro_id', $id);
        return $this->db->delete(TABLE_PREFIX . 'groups');
    }

    function getAllGroups() {

        $this->db->where('gro_status', 1);
        return $this->db->get(TABLE_PREFIX . 'groups');
    }

    function findAllFunctions() {

        $this->db->order_by('mod_foldername', 'asc');
        $this->db->order_by('con_controllername', 'asc');
        $this->db->order_by('tas_name', 'asc');
        $this->db->from(TABLE_PREFIX . 'modules');
        $this->db->join(TABLE_PREFIX . 'controllers', 'mod_id=con_moduleid');
        $this->db->join(TABLE_PREFIX . 'tasks', 'con_id=tas_controllerid');
        return $this->db->get();
    }
    
    function getTaskByGroupId($id=0){
        $this->db->where('grotas_groupid',$id);
        return $this->db->get(TABLE_PREFIX.'group_task');
    }

}
