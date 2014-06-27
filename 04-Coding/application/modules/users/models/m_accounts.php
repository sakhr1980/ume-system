<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Accounts extends CI_Model {

    function findAllAccounts($num_row, $from_row) {
        $this->db->order_by('use_id', 'desc');

        if ($this->input->post('use_name') != '') {
            $this->db->like('use_name', $this->input->post('use_name'));
        }
        if ($this->input->post('use_email') != '') {
            $this->db->like('use_email', $this->input->post('use_email'));
        }
        
        // Keep pagination for filter status
        if($this->input->post('use_status')!=''){
            $this->session->set_userdata('use_status', $this->input->post('use_status'));
        }
        if($this->input->post('submit') && $this->input->post('use_status')==''){
            $this->session->set_userdata('use_status', '');
        }
        if ($this->session->userdata('use_status') != '') {
            $this->db->where('use_status', $this->session->userdata('use_status'));
        }
        // Keep pagination for filter group
        if($this->input->post('tbl_groups_gro_id') && $this->input->post('tbl_groups_gro_id')!=''){
            $this->session->set_userdata('tbl_groups_gro_id', $this->input->post('tbl_groups_gro_id'));
        }
        if($this->input->post('submit') && $this->input->post('tbl_groups_gro_id')==''){
            $this->session->set_userdata('tbl_groups_gro_id', '');
        }
        if ($this->session->userdata('tbl_groups_gro_id') && $this->session->userdata('tbl_groups_gro_id') != '') {
            $this->db->where('tbl_groups_gro_id', $this->session->userdata('tbl_groups_gro_id'));
        }
        //-----------------------

        $this->db->limit($num_row, $from_row);
        $this->db->from(TABLE_PREFIX . 'users');
        $this->db->join(TABLE_PREFIX.'user_group','use_id=tbl_users_use_id','left');
        $this->db->group_by('use_id');
        return $this->db->get();
    }

    function countAllAccounts() {

        // Keep pagination for filter status
        if($this->input->post('use_status')!=''){
            $this->session->set_userdata('use_status', $this->input->post('use_status'));
        }
        if($this->input->post('submit') && $this->input->post('use_status')==''){
            $this->session->set_userdata('use_status', '');
        }
        if ($this->session->userdata('use_status') != '') {
            $this->db->where('use_status', $this->session->userdata('use_status'));
        }
        // Keep pagination for filter group
        if($this->input->post('tbl_groups_gro_id') && $this->input->post('tbl_groups_gro_id')!=''){
            $this->session->set_userdata('tbl_groups_gro_id', $this->input->post('tbl_groups_gro_id'));
        }
        if($this->input->post('submit') && $this->input->post('tbl_groups_gro_id')==''){
            $this->session->set_userdata('tbl_groups_gro_id', '');
        }
        if ($this->session->userdata('tbl_groups_gro_id') && $this->session->userdata('tbl_groups_gro_id') != '') {
            $this->db->where('tbl_groups_gro_id', $this->session->userdata('tbl_groups_gro_id'));
        }
        //-----------------------
 
        $this->db->from(TABLE_PREFIX . 'users');
        $this->db->join(TABLE_PREFIX.'user_group','use_id=tbl_users_use_id','left');
        $this->db->group_by('use_id');
        $data = $this->db->get();
        return $data->num_rows();
    }

    /**
     * Add new group
     * @return true/false
     */
    function add() {
        $data = $this->input->post();
        $groups = $data['groups'];
        unset($data['use_passc']);
        unset($data['groups']);
        $data['use_pass'] = get_password($data['use_pass']);
        $this->db->set('use_created', 'NOW()', false);
        $result = $this->db->insert(TABLE_PREFIX . 'users', $data);
        
        $use_id = $this->db->insert_id();
        if(count($groups) > 0){
            foreach ($groups as $gro_id) {
                $this->db->set('tbl_users_use_id', $use_id);
                $this->db->set('tbl_groups_gro_id', $gro_id);
                $this->db->insert(TABLE_PREFIX.'user_group');
            }
        }
        return $result;
    }

    /**
     * Edit a group
     * @return true/false
     */
    function update() {
        $data = $this->input->post();
        $this->db->where('use_id', $this->uri->segment(4));
        $this->db->set('use_modified', 'NOW()', false);
        // if checkbox is not checked
        if (empty($data['use_status'])) {
            $this->db->set('use_status', 0);
        }
        return $this->db->update(TABLE_PREFIX . 'users', $data);
    }

    function getGroupById($id) {
        $this->db->where('use_id', $id);
        return $this->db->get(TABLE_PREFIX . 'users');
    }

    function deleteGroupById($id = null) {
        $this->db->where('use_id', $id);
        return $this->db->delete(TABLE_PREFIX . 'users');
    }

}
