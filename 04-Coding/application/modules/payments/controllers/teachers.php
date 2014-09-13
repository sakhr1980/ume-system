<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Manipulation of Teacher Payments
 *
 * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
 */
class Teachers extends CI_Controller {

	/**
	 * @var array
	 */
	var $data = array('title' => null, 'content' => 'missing_view');

	/**
	 * Constuctor
	 */
	function __construct() {
		parent::__construct();
		$this->load->model(array('payments/m_teachers'));
	}

}
