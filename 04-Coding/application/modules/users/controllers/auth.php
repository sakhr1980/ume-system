<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users
 *
 * @author sochy.choeun
 */
class Auth extends CI_Controller {

	//put your code here
	var $data = array('title' => null, 'content' => 'missing_view');

	function __construct() {
		parent::__construct();
		$this->load->model(array('users/m_accounts', 'users/m_groups'));
	}

	function index() {
		$this->data['title'] = 'No permission';
		$this->data['content'] = 'users/auth/index';
		$this->load->view(LAYOUT, $this->data);
	}

	function signin() {
		// redirect if logged in
		if ($this->session->userdata('user')) {
			return redirect('dashboard/panel');
			exit();
		}
		$this->data['title'] = "Sign In";
		if ($this->input->post()) {
			if ($this->m_accounts->signin()) {
				redirect('dashboard/panel');
			} else {
				$this->session->set_flashdata('message', alert("Invalid Username or Password, try again", 'danger'));
				redirect('users/auth/signin');
			}
		} else {
			$this->load->view('users/auth/signin', $this->data);
		}
	}

	function signout() {
		$this->session->sess_destroy();
		get_cookie('ci_last_tab') ? delete_cookie('ci_last_tab') : NULL;
		redirect('users/auth/signin');
	}

}
