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
class controllers extends CI_Controller {
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
    function add() {
        $this->data['title'] = 'Add new controller';
        $this->data['content'] = 'users/controllers/add';

        $this->form_validation->set_rules('con_name', 'Module name', 'required|max_length[50]|min_length[2]');
        $this->form_validation->set_rules('con_controllername', 'Folder name', 'required|max_length[50]|min_length[2]|is_unique['.TABLE_PREFIX.'controllers.con_controllername]');
        $this->form_validation->set_rules('con_moduleid', 'Module', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['modules'] = $this->m_global->getDataArray(TABLE_PREFIX.'modules','mod_id','mod_foldername','mod_status',1);
            $this->load->view(LAYOUT, $this->data);
        } else {

            
            if ($this->m_controller->add()) {
                $this->session->set_flashdata('message', alert("User controllers has been saved!", 'success'));
                redirect('users/functions');
            } else {
                $this->session->set_flashdata('message', alert("User controllers cannot be added, please try again", 'danger'));
                redirect('users/controllers/add');
            }
        }
    }
}
