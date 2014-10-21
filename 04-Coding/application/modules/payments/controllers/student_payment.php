<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Manipulation of Student Payments
 *
 * @author OU Sophea  <ousopheal@gmail.com>
 */
class Student_payment extends Auth_Controller {

    /**
     * @var array
     */
    var $data = array('title' => null, 'content' => 'missing_view');

    /**
     * Constuctor
     */
    function __construct() {
        parent::__construct();
        $this->load->model(array('payments/m_student_payment','users/m_groups'));
    }

    /**
     * Students Payment
     * @author Vibol YOEUNG <ousphea@gmail.com>
     * @access public
     * @return void
     */
    function index() {
        $this->data['title'] = 'Manage Students Payment';
        $this->data['content'] = 'payments/student_payment/index';

        $this->form_validation->set_rules('stu_id', '', 'trim');
        $this->form_validation->set_rules('stu_name', '', 'trim');
        $this->form_validation->set_rules('stu_kh_name', '', 'trim');
        $this->form_validation->set_rules('sp_year', '', 'trim');
        $this->form_validation->set_rules('sp_status', '', 'trim');

        $this->form_validation->run();
        $this->data['studentPayments'] = $this->m_student_payment->findAllStudentPayments(PAGINGATION_PERPAGE, $this->uri->segment(4));
        pagination_config(base_url() . 'payments/student_payment/index', $this->m_student_payment->countAll(), PAGINGATION_PERPAGE);
        $this->load->view(LAYOUT, $this->data);
    }

    /**
     * Create Payments
     * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
     * @access public
     * @return void
     */
    function add() {
        $this->data['title'] = 'Add New Student Payments';
        $this->data['content'] = 'payments/student_payment/add';
        $id = $this->uri->segment(4);
        $this->data['data'] = $this->m_student_payment->getPaymentInfoById($id);
        $this->form_validation->set_rules('spd_amount','Payment amount', 'trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view(LAYOUT, $this->data);
        } else {
            if ($this->m_student_payment->add_paymentl()) {
                $this->session->set_flashdata('message', alert("Student Payment has been saved!", 'success'));
                redirect('payments/student_payment');
            } else {
                $this->session->set_flashdata('message', alert("Student Payment cannot be saved, please try again", 'danger'));
                redirect('payments/student_payment/add');
            }
        }
    }

    /**
     * Show student information
     * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
     * @access public
     * @return void
     */
    function showStudent() {
        $studentObject = $this->m_student_payment->findStudentByID($this->input->post('student_id'));
        $nameInLatin = '';
        $nameInKhmer = '';
        foreach ($studentObject->result() as $student) {
            $nameInLatin = $student->stu_en_firstname . ' ' . $student->stu_en_lastname;
            $nameInKhmer = $student->stu_kh_firstname . ' ' . $student->stu_kh_lastname;
            $gender = $student->stu_gender;
        }
        echo $nameInLatin . ' , ' . $nameInKhmer . ',' . $gender;
    }

    /**
     * Update Student Payment
     *
     * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
     * @param integer $id room id <segment(4)>
     * @access public
     * @return void
     */
    function edit($id = 0) {
        $this->data['title'] = 'Edit Student Payments';
        $this->data['content'] = 'payments/students/edit';
        $this->data['data'] = $this->m_student_payment->getStudentPaymentByID($id);

        $this->data['subjects'] = $this->m_global->getDataArray(TABLE_PREFIX . 'subject', 'sub_id', 'sub_name', 'sub_status');
        $this->data['majors'] = $this->m_global->getDataArray(TABLE_PREFIX . 'majors', 'maj_id', 'maj_name', 'maj_status');

        $this->form_validation->set_rules('tbl_students_stu_id', 'Student ID', 'required|trim|max_length[50]|min_length[1]|callback_uniqueExcept[' . TABLE_PREFIX . 'student_payments.tbl_students_stu_id]');
        $this->form_validation->set_rules('tbl_subjects_sub_id', 'Subject', 'required|trim|max_length[50]|min_length[1]');
        $this->form_validation->set_rules('tbl_majors_maj_id', 'Major', 'required|trim|max_length[3]|min_length[1]');
        $this->form_validation->set_rules('sp_year', 'Year', 'required|trim|max_length[4]|min_length[1]');
        $this->form_validation->set_rules('sp_date_pay', '', 'required|trim');
        $this->form_validation->set_rules('sp_status', '', 'trim');
        $this->form_validation->set_select('tbl_subjects_sub_id');
        $this->form_validation->set_select('tbl_majors_maj_id');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view(LAYOUT, $this->data);
        } else {
            if ($this->m_student_payment->update()) {
                $this->session->set_flashdata('message', alert("Student Payments has been updated!", 'success'));
                redirect('payments/students/index/' . $this->uri->segment(5));
            } else {
                $this->session->set_flashdata('message', alert("Student Payments cannot be updated, please try again", 'danger'));
                $s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
                redirect('payments/students/edit/' . $this->uri->segment(4) . $s5);
            }
        }
    }

    /**
     * Discard room
     *
     * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
     * @param integer $id room id <segment(4)>
     * @access public
     * @return void
     */
    function delete($id) {
        if ($this->m_student_payment->deleteStudentPaymentsByID($id)) {
            $this->session->set_flashdata('message', alert("Student Payments has been deleted!", 'success'));
            redirect('payments/students/index/' . $this->uri->segment(5));
        } else {
            $this->session->set_flashdata('message', alert("Student Payments cannot be deleted, please try again!", 'danger'));
            redirect('payments/students/index/' . $this->uri->segment(5));
        }
    }

    /**
     * View Student Payment Detial
     *
     * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
     * @param integer $id student payments id <segment(4)>
     * @access public
     * @return void
     */
    function view($id = null) {
        $this->data['title'] = 'View Student Payment';
        $this->data['content'] = 'payments/students/view';

        $this->data['data'] = $this->m_student_payment->getStudentPaymentByID($id);
        $this->load->view(LAYOUT, $this->data);
    }

}
