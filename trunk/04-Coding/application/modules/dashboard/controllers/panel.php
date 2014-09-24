<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of panel
 *
 * @author sochy
 */
class panel extends CI_Controller {

    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');

    function __construct() {
        parent::__construct();
        $this->load->model(array('dashboard/m_panel'));
    }

    function index() {

        $this->data['title'] = 'Dashboard';
        $userGroup = $this->session->userdata('userGroup');

        switch ($userGroup) {
            case 'Manager':
//            $this->data['lateReturn'] = $this->m_panel->countAllBorrowLate();
//            $this->data['returnToday'] = $this->m_panel->countAllReturn();

                $this->data['content'] = 'dashboard/index_manager';
                break;
            case 'Academic':
                $this->data['content'] = 'dashboard/index_academic';
                break;
            case 'admin':
                $this->data['content'] = 'dashboard/index_admin';
                break;
            default:
              $this->data['content'] = 'dashboard/index';
                break;
        }

        $this->load->view(LAYOUT, $this->data);
    }

}
