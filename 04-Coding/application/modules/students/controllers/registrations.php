<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registrations
 *
 * @author sochy.choeun
 */
class Registrations extends CI_Controller {

//put your code here
    var $data = array('title' => null, 'content' => 'missing_view');

    function __construct() {
        parent::__construct();
        $this->load->model(array('students/m_registrations')); 
    }

    /**
     * List user group
     */
    function index() {

        $this->data['title'] = 'Student Registration List';
        $this->data['content'] = 'students/registrations/index';

        $this->form_validation->set_rules('gen_id', '', 'trim');
        $this->form_validation->set_rules('fac_id', '', 'trim');
        $this->form_validation->set_rules('cla_id', '', 'trim');
        $this->form_validation->set_rules('maj_id', '', 'trim');
         $this->form_validation->set_rules('stucla_degree', '', 'trim');
        $this->form_validation->set_rules('stucla_year_study', '', 'trim');
        $this->form_validation->set_rules('stu_en_firstname', '', 'trim');
        $this->form_validation->set_rules('stu_en_lastname', '', 'trim');


        $this->form_validation->run();
        $this->data['generation'] = $this->m_global->getDataArray(TABLE_PREFIX . 'generation', 'gen_id', 'gen_title', 'gen_status');
        $this->data['arrayClasses'] = $this->m_global->getDataArray(TABLE_PREFIX . 'classes', 'cla_id', 'cla_name', 'cla_status');
        $this->data['arrayMajor'] = $this->m_global->getDataArray(TABLE_PREFIX . 'majors', 'maj_id', 'maj_name', 'maj_status');
        $this->data['arrayFaculties'] = $this->m_global->getDataArray(TABLE_PREFIX . 'faculties', 'fac_id', 'fac_name', 'fac_status');
        $this->data['data'] = $this->m_registrations->findAllRegistrations(PAGINGATION_PERPAGE, $this->uri->segment(4));
        $this->data['lastQuery'] = $this->session->userdata('lastQuery');
        pagination_config(base_url() . 'students/registrations/index', $this->m_registrations->countAllRegistrations(), PAGINGATION_PERPAGE);

        $this->load->view(LAYOUT, $this->data);
    }

    /**
     * Add new user group
     */
    function add() {
        $this->data['title'] = 'Student registration';
        $this->data['content'] = 'students/registrations/add';
        $this->form_validation->set_rules('stu_kh_lastname', 'គោត្តនាម', 'required]');
          $this->form_validation->set_rules('class', 'Class must selected..!', 'required]');
//        $this->form_validation->set_rules('pm_discount_value',"Discount Value", 'required|max_length[3]');
        
        if ($this->form_validation->run() == FALSE) {
//            $this->data['master'] = $this->m_registrations->getMajorByMasterId(6);
//            $this->data['bachelor_economic'] = $this->m_registrations->getMajorByMasterId(1);
//            $this->data['bachelor_art'] = $this->m_registrations->getMajorByMasterId(2);
//            $this->data['bachelor_agriculture'] = $this->m_registrations->getMajorByMasterId(5);
//            $this->data['bachelor_it'] = $this->m_registrations->getMajorByMasterId(3);
//            $this->data['bachelor_law'] = $this->m_registrations->getMajorByMasterId(4);
            
            
            $majors = NULL;
            $faculties = $this->m_registrations->getFaculties();
            $this->data['generation'] = $this->m_global->getDataArray(TABLE_PREFIX . 'generation', 'gen_id', 'gen_title', 'gen_status');
//Debug::dump($faculties->result_array());die();
            foreach ($faculties->result_array() as $row) {
                $majors[$row['fac_id']] = $this->m_registrations->getMajorByMasterId($row['fac_id']);
            }
            $this->data['faculties'] = $faculties;
            $this->data['majors'] = $majors;
            $this->load->view(LAYOUT, $this->data);
        } else { 
//            echo "good validation";exit();
            if ($this->m_registrations->add()) {
                $this->session->set_flashdata('message', alert("Student registration has been saved!", 'success'));
                redirect('students/registrations');
            } else {
                $this->session->set_flashdata('message', alert("Student registration cannot be added, please try again", 'danger'));
                redirect('students/registrations/add');
            }
        }
    }

    function edit() {

        $this->data['title'] = 'Edit Group';
        $this->data['content'] = 'students/registrations/edit';
        $this->data['data'] = $this->m_registrations->getStudentById($this->uri->segment(4));
//         $this->data['class'] = $this->m_registrations->getUdateClassById(,$this->uri->segment(4));

        $this->data['data'] = $this->m_registrations->getStudentById($this->uri->segment(4));
        $majors = NULL;
        $faculties = $this->m_registrations->getFaculties();
//Debug::dump($faculties->result_array());die();
        foreach ($faculties->result_array() as $row) {
            $majors[$row['fac_id']] = $this->m_registrations->getMajorByMasterId($row['fac_id']);
        }
        $this->data['faculties'] = $faculties;
        $this->data['majors'] = $majors;
//        $this->form_validation->set_rules('stu_card_id', '', 'trim');
        $this->form_validation->set_rules('stu_en_firstname', '', 'trim');
        $this->form_validation->set_rules('stu_en_lastname', '', 'trim');
        $this->form_validation->set_rules('stu_kh_firstname', '', 'trim');
        $this->form_validation->set_rules('stu_kh_lastname', '', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view(LAYOUT, $this->data);
        } else {

            if ($this->m_registrations->update()) {
                $this->session->set_flashdata('message', alert("Student registration has been updated!", 'success'));
                redirect('students/registrations/index/' . $this->uri->segment(5));
            } else {
                $this->session->set_flashdata('message', alert("Student registration cannot be updated, please try again", 'danger'));
                $s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
                redirect('students/registrations/edit/' . $this->uri->segment(4) . $s5);
            }
        }
    }

    function upgrade() {
        if ($this->input->post('stu_id')) {
            $array_id = $this->input->post('stu_id');
            if ($this->m_registrations->upgradeClass()) {
                $this->session->set_flashdata('message', alert("Student  has been upgrade!", 'success'));
                redirect('students/registrations/index/' . $this->uri->segment(5));
            } else {
                $this->session->set_flashdata('message', alert("Student cannot be upgrade, please try again!", 'danger'));
                redirect('students/registrations/index/' . $this->uri->segment(5));
            }
        } else {
            redirect('students/registrations/index');
        }
    }

// $id = segment(4)
    function delete($id) {
        if ($this->m_registrations->deleteStudentById($id)) {
            $this->session->set_flashdata('message', alert("Student  has been deleted!", 'success'));
            redirect('students/registrations/index/' . $this->uri->segment(5));
        } else {
            $this->session->set_flashdata('message', alert("Student cannot be deleted, please try again!", 'danger'));
            redirect('students/registrations/index/' . $this->uri->segment(5));
        }
    }

    function view($id = null) {

        $this->data['title'] = 'View Student';
        $this->data['content'] = 'students/registrations/view';

        $this->data['data'] = $this->m_registrations->getStudentById($id);
        $this->load->view(LAYOUT, $this->data);
    }

    function print_card($id = null) {

        $this->data['title'] = 'Print Student ID Card';
        $this->data['content'] = 'students/registrations/print_card';

        $this->form_validation->set_rules('gen_id', '', 'trim');
        $this->form_validation->set_rules('cla_id', '', 'trim');
        $this->form_validation->set_rules('stu_en_firstname', '', 'trim');
        $this->form_validation->set_rules('stu_en_lastname', '', 'trim');
        $this->form_validation->run();

        $this->data['generation'] = $this->m_global->getDataArray(TABLE_PREFIX . 'generation', 'gen_id', 'gen_title', 'gen_status');
        $this->data['arrayClasses'] = $this->m_global->getDataArray(TABLE_PREFIX . 'classes', 'cla_id', 'cla_name', 'cla_status');
        $this->data['studentNumber'] = "";
//         $this->data['data']=array();
        if ($this->form_validation->run() == TRUE) {
            $this->data['data'] = $this->m_registrations->findAllRegistrations(PAGINGATION_PERPAGE, $this->uri->segment(4));
            $this->data['studentNumber'] = $this->m_registrations->countAllRegistrations();
        }
        $this->load->view(LAYOUT, $this->data);
    }

//====================== validation
    /**
     * 
     * @param type $str
     * @return boolean
     */
    function uniqueExcept($str, $table_field) {
// $f1[0] : table name
// $f1[1] : field to insert
// $tf[1] : field id
        $tf = explode(',', $table_field);
        $f1 = explode('.', $tf[0]);
        $this->db->where($f1[1], $str);
        $this->db->where($tf[1] . " !=", $this->uri->segment(4));
        $data = $this->db->get($f1[0]);
        if ($data->num_rows() > 0) {
            $this->form_validation->set_message('uniqueExcept', '%s already exist, please another one');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    // Fucntion to export to csv file with any selected query
    public function exportcsv() {
        $result = $this->m_registrations->exportcsv();
//        echo $this->session->userdata('lastQuery2');        exit();
        if (query_to_csv($result, TRUE, 'Student-List-' . date('Y-m-d', time()) . '.csv')) {
            redirect('students/registrations/index');
        }
    }

    function ajax_get_class() {
//       $shift = 1;
//        $generation =1;
//        $major =4;
// $data = $this->input->post();

        $shift = $this->input->post('reShift');
        $generation = $this->input->post('reGeneration');
        $major = $this->input->post('reMajor');

        $class_data = $this->m_registrations->getClassById($shift, $generation, $major);
//        echo $class_data;
        $stu_card_id = $major['maj_abbriviation'];
        if ($class_data->num_rows() > 0) {
            echo ' <input type="hidden" id="stu_card_id" name="stu_card_id" value="' . $stu_card_id . '" >';
//            echo ' <input type="hidden" id="acadamic_year_id" name="acadamic_year_id" value="' . $generation . '" >';
            foreach ($class_data->result_array() as $class) {
                echo '
                    <div class="col-md-3" >
                    <label><input type="radio"  required="required" name="class" id="cla_name" value="' . $class["cla_id"] . '" > ' . $class["cla_name"] . ' (' . $class["studnetNumber"] . ')' . '</label>
                </div> ';
            }
        } else {
            
            echo '<div class="col-md-3" >
                    <label><input type="radio"  required="required" /><span class="error"> Don\'t have class for your selected major and shift...!</span></label>
                </div>';
        }
    }

}
