<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controllers
 *
 * @author sochy
 */
class controllers extends Auth_Controller {
    //put your code here
    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');

    function __construct() {
        parent::__construct();
        $this->load->model(array('users/m_controller'));
    }
    /**
     * Add new user controllers
     */
    function add($pagination='') {
        $this->data['title'] = 'Add new controller';
        $this->data['content'] = 'users/controllers/add';

        $this->form_validation->set_rules('con_name', 'Module name', 'required|max_length[50]|min_length[2]');
        $this->form_validation->set_rules('con_controllername', 'Folder name', 'required|max_length[50]|min_length[2]|is_unique['.TABLE_PREFIX.'controllers.con_controllername]');
        $this->form_validation->set_rules('con_moduleid', 'Module', 'trim|required');
          $this->form_validation->set_rules('con_status', 'Status', 'trim');  
        if ($this->form_validation->run() == FALSE) {
            $this->data['modules'] = $this->m_global->getDataArray(TABLE_PREFIX.'modules','mod_id','mod_foldername');
            $this->load->view(LAYOUT, $this->data);
        } else {

            
            if ($this->m_controller->add()) {
                $this->session->set_flashdata('message', alert("User controllers has been saved!", 'success'));
                redirect('users/functions/'.$pagination);
            } else {
                $this->session->set_flashdata('message', alert("User controllers cannot be added, please try again", 'danger'));
                redirect('users/controllers/add/'.$pagination);
            }
        }
    }
    
    
    function edit() {

        $this->data['title'] = 'Edit Controller';
        $this->data['content'] = 'users/controllers/edit';
        

        $this->form_validation->set_rules('con_name', 'Controller name', 'required|max_length[50]|min_length[2]');
        $this->form_validation->set_rules('con_controllername', 'Class name', 'required|max_length[50]|min_length[2]|callback_uniqueExcept['.TABLE_PREFIX.'controllers.con_controllername.con_id]');
        $this->form_validation->set_rules('con_moduleid', 'Module', 'trim|required');
        $this->form_validation->set_rules('con_status', 'Status', 'trim');    
        
        if ($this->form_validation->run() == FALSE) {
            $this->data['data'] = $this->m_controller->getControllerById($this->uri->segment(4));
            $this->data['modules'] = $this->m_global->getDataArray(TABLE_PREFIX.'modules','mod_id','mod_foldername');
            $this->load->view(LAYOUT, $this->data);
        } else {
            // keep pagination
            $s5=($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
            if ($this->m_controller->update()) {
                $this->session->set_flashdata('message', alert("Controller has been updated!", 'success'));
                redirect('users/functions/index' . $s5);
            } else {
                $this->session->set_flashdata('message', alert("Controller cannot be updated, please try again", 'danger'));
                redirect('users/controllers/edit/' . $this->uri->segment(4) . $s5);
            }
        }
    }
    
    
    function ajaxGetControllerByModuleIdForDropdown(){
        $data = $this->m_controller->getControllerByModuleId($this->input->post('mod_id'));
        $dropdownList = '<option value="">--Select--</option>';
        if($data->num_rows() > 0){
            foreach ($data->result_array() as $row) {
                $dropdownList .='<option value="'.$row['con_id'].'">'.$row['con_controllername'].'</option>';
            }
        }
        echo $dropdownList;
    }
    
    
    function delete($id = 0, $pagination = '') {
        if ($id != 0) {
            if ($this->m_controller->deleteControllerById($id)) {
                $this->session->set_flashdata('message', alert("Controller has been deleted.", 'success'));
                redirect('users/functions/index/' . $pagination);
            }
        } else {
            $this->session->set_flashdata('message', alert("Controller cannot be deleted, please try again", 'danger'));
            redirect('users/functions/index/' .$pagination);
        }
    }
    
    
    /**
     * Validation
     * @param type $str
     * @return boolean
     * @param usage callback_uniqueExcept[tablename.fieldname.field_primary_key]
     */
    function uniqueExcept($str, $table_field) {

        $param = explode('.', $table_field);
        $this->db->where($param[1], $str);
        $this->db->where($param[2] . " !=", $this->uri->segment(4));
        $data = $this->db->get($param[0]);
        if ($data->num_rows() > 0) {
            $this->form_validation->set_message('uniqueExcept', '%s already exist, please another one');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
