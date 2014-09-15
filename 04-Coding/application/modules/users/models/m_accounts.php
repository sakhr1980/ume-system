<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Accounts extends CI_Model {

    function signin() {

        $this->db->from(TABLE_PREFIX . 'users');
        $this->db->where('use_name', $this->input->post('username'));
        $this->db->where('use_pass', get_password($this->input->post('password')));
        $this->db->where('use_status', 1);
        $this->db->join(TABLE_PREFIX.'user_group','use_id=usegro_userid');
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            $data->result_array();
            $user = $data->result_array[0];
            unset($user['use_pass']);
            $this->session->set_userdata('user', $user);

            return TRUE;
        } else {
            return false;
        }
    }

    function findAllAccounts($num_row, $from_row) {
        $this->db->order_by('use_id', 'desc');

        if ($this->input->post('use_name') != '') {
            $this->db->like('use_name', $this->input->post('use_name'));
        }
        if ($this->input->post('use_email') != '') {
            $this->db->like('use_email', $this->input->post('use_email'));
        }

        // Keep pagination for filter status
        if ($this->input->post('use_status') != '') {
            $this->session->set_userdata('use_status', $this->input->post('use_status'));
        }
        if ($this->input->post('submit') && $this->input->post('use_status') == '') {
            $this->session->set_userdata('use_status', '');
        }
        if ($this->session->userdata('use_status') != '') {
            $this->db->where('use_status', $this->session->userdata('use_status'));
        }
        // Keep pagination for filter group
        if ($this->input->post('usegro_groupid') && $this->input->post('usegro_groupid') != '') {
            $this->session->set_userdata('usegro_groupid', $this->input->post('usegro_groupid'));
        }
        if ($this->input->post('submit') && $this->input->post('usegro_groupid') == '') {
            $this->session->set_userdata('usegro_groupid', '');
        }
        if ($this->session->userdata('usegro_groupid') && $this->session->userdata('usegro_groupid') != '') {
            $this->db->where('usegro_groupid', $this->session->userdata('usegro_groupid'));
        }
        //-----------------------

        $this->db->limit($num_row, $from_row);
        $this->db->from(TABLE_PREFIX . 'users');
        $this->db->join(TABLE_PREFIX . 'user_group', 'use_id=usegro_userid', 'left');
        $this->db->group_by('use_id');
        return $this->db->get();
    }

    function countAllAccounts() {

        // Keep pagination for filter status
        if ($this->input->post('use_status') != '') {
            $this->session->set_userdata('use_status', $this->input->post('use_status'));
        }
        if ($this->input->post('submit') && $this->input->post('use_status') == '') {
            $this->session->set_userdata('use_status', '');
        }
        if ($this->session->userdata('use_status') != '') {
            $this->db->where('use_status', $this->session->userdata('use_status'));
        }
        // Keep pagination for filter group
        if ($this->input->post('usegro_groupid') && $this->input->post('usegro_groupid') != '') {
            $this->session->set_userdata('usegro_groupid', $this->input->post('usegro_groupid'));
        }
        if ($this->input->post('submit') && $this->input->post('usegro_groupid') == '') {
            $this->session->set_userdata('usegro_groupid', '');
        }
        if ($this->session->userdata('usegro_groupid') && $this->session->userdata('usegro_groupid') != '') {
            $this->db->where('usegro_groupid', $this->session->userdata('usegro_groupid'));
        }
        //-----------------------

        $this->db->from(TABLE_PREFIX . 'users');
        $this->db->join(TABLE_PREFIX . 'user_group', 'use_id=usegro_userid', 'left');
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
        if (count($groups) > 0) {
            foreach ($groups as $gro_id) {
                $this->db->set('usegro_userid', $use_id);
                $this->db->set('usegro_groupid', $gro_id);
                $this->db->insert(TABLE_PREFIX . 'user_group');
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

        // Reset Group for user
        $user_id = $this->uri->segment(4);
        $this->db->where('usegro_userid', $user_id);
        $this->db->delete(TABLE_PREFIX . 'user_group');
        $group_batch = null;
        foreach ($data['groups'] as $group) {
            $group_batch[] = array(
                'usegro_groupid' => $group,
                'usegro_userid' => $this->uri->segment(4)
            );
        }
        $this->db->insert_batch(TABLE_PREFIX . 'user_group', $group_batch); 
        
        // Update user
        $this->db->where('use_id', $user_id);
        $this->db->set('use_modified', 'NOW()', false);
        if($data['use_pass']!='')
        $this->db->set('use_pass', get_password($data['use_pass']));
        // if checkbox is not checked
        if (empty($data['use_status'])) {
            $this->db->set('use_status', 0);
        }
        else{
            $this->db->set('use_status', 1);
        }
        return $this->db->update(TABLE_PREFIX . 'users');
    }

    function getAccountById($id) {
        $this->db->where('use_id', $id);
        return $this->db->get(TABLE_PREFIX . 'users');
    }

    function deleteAccountById($id = null) {
        $this->db->where('usegro_userid', $id);
        $this->db->delete(TABLE_PREFIX . 'user_group');
        $this->db->where('use_id', $id);
        return $this->db->delete(TABLE_PREFIX . 'users');
    }

    function getGroupByAccountId($id) {

        $this->db->where('usegro_userid', $id);
        $this->db->from(TABLE_PREFIX . 'groups');
        $this->db->join(TABLE_PREFIX . 'user_group', 'gro_id=usegro_groupid');
        return $this->db->get();
    }

    function changePassword() {

        $user = $this->session->userdata('user');
        $this->db->where('use_id', $user['use_id']);
        $this->db->where('use_pass', get_password($this->input->post('password_old')));

        $data = $this->db->get(TABLE_PREFIX . 'users');
        if ($data->num_rows() > 0) {
            $this->db->where('use_id', $user['use_id']);
            $this->db->where('use_pass', get_password($this->input->post('password_old')));
            $this->db->set('use_pass', get_password($this->input->post('use_pass')));
            $this->db->set('use_modified', "NOW()", false);
            return $this->db->update(TABLE_PREFIX . 'users');
        }
        return false;
    }

}
