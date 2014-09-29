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
class Readpdf extends CI_Controller {

    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');

    function __construct() {
        parent::__construct();
        $this->load->model(array('readpdf/m_readpdf'));
    }

    /**
     * List classees
     */
    function index() {
        $this->data['title'] = 'Read PDF Online';
        $this->data['content'] = 'readpdf/index';
        $this->load->view(LAYOUT, $this->data);
    }
    
    function add() {
        
        $this->data['title'] = 'Add new ebook';
        $this->data['content'] = 'readpdf/add';
        
        
        $this->load->view(LAYOUT, $this->data);
    }
    function do_upload()
	{
		$config['upload_path'] = './../../images/books/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['overwrite'] = FALSE;

		$this->load->library('upload', $config);
                
                //$this->upload->do_upload("userfile");
		if (!$this->upload->do_upload('userfile'))
		{
                    
			echo $this->upload->display_errors();

		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
        }

}
