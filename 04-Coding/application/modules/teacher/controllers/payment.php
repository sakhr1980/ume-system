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
class Payment extends CI_Controller {
    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');

    function __construct() {
        parent::__construct();
        $this->load->model(array('teacher/m_payment'));
    }

    /**
     * List classees
     */
    function index() {
        $this->data['title'] = 'Payment';
        $this->data['content'] = 'teacher/payment';
        
		$this->data['staff'] = $this->m_payment->getStaff();
		$this->data['class'] = $this->m_global->getDataArray(TABLE_PREFIX . 'classes', 'cla_id', 'cla_name', 'cla_status');
        $this->data['subject'] = $this->m_global->getDataArray(TABLE_PREFIX . 'subject', 'sub_id', 'sub_name', 'sub_status');
		
		$this->data['data'] = $this->m_payment->findAllPayment(PAGINGATION_PERPAGE, $this->uri->segment(4));
		
		$num = $this->m_payment->countAllPayment();
		pagination_config(site_url('payment/index'),$num , PAGINGATION_PERPAGE);
		
		$this->load->view(LAYOUT, $this->data);
    }
	
    /**
     * Add new user account
     */
    function add() {
        $this->data['title'] = 'New teacher payment';
        $this->data['content'] = 'teacher/add-payment';
		$this->data['staff'] = $this->m_payment->getStaff();
		$this->data['subject'] = $this->m_global->getDataArray(TABLE_PREFIX . 'subject', 'sub_id', 'sub_name', 'sub_status');
		$this->data['class'] = $this->m_global->getDataArray(TABLE_PREFIX . 'classes', 'cla_id', 'cla_name', 'cla_status');
		$this->load->view(LAYOUT, $this->data);        
    }
	
	function ajaxSave(){
		$res = $this->m_payment->save();
		echo json_encode($res);
	}
	
	function ajaxTeacher(){
		$res = $this->m_payment->getTeacher();
		echo json_encode($res);
	}
	
	function ajaxPayment(){
		$res = $this->m_payment->getPayment();
		echo json_encode($res);
	}
	
    // view a payment
	function view($id = 0) {
		$this->data['title'] = 'View Payment';
		$this->data['content'] = 'teacher/view-payment';

		$this->data['data'] = $this->m_payment->getPaymentBy($id);
		$this->load->view(LAYOUT, $this->data);
	}
	
	function do_print($id=0){
		$this->m_payment->to_excel($id);
	}
	
	function do_print3($id=0){
		//$this->m_payment->to_excel($id);
		$this->load->library('parser');
		$data['data'] = $this->m_payment->getPaymentBy($id);
		$filename = 'testing';
		header('Content-Disposition: attachment; filename='.$filename.'.xls');
		header('Content-type: APPLICATION/force-download');
		header('Content-Transfer-Encoding: binary');
		header('Pragma: public');
		print "\xEF\xBB\xBF"; // UTF-8 BOM
		echo $this->parser->parse('payment-xls', $data, true);
	}
	
	function do_print2($id=0){
		$data['title'] = 'Teacher Payment';
		$data['data'] = $this->m_payment->getPaymentBy($id);
		$this->load->view('teacher/print-payment',$data);
	}
	
	function delete($id=0){
		$this->m_payment->update($id);
		redirect('teacher/payment');
	}

}

