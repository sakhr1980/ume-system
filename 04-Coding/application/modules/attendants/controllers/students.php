<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of studnets
 *
 * @author sochy
 */
class Students extends CI_Controller{
    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');
    public function __construct(){
        parent::__construct();
        $this->load->model(array('m_attendant'));
        
    }
    
    /**
     * Access defult module
     */
    public function index(){
        redirect('attendants/students/lists');
    }
    
    /**
     * List attendants
     */
    public function lists(){
        $this->data['title'] = 'Manage student attendant';
        $this->data['content'] = 'attendants/students/index';
        
        $this->data['academic_year'] = $this->m_attendant->getGeneration();
        $this->data['attendants'] = $this->m_attendant->getAttendants();
        
        $this->load->view(LAYOUT, $this->data);
    }
    
    /**
     * Add student attendants 
     */
    public function add(){
        if($this->input->post()){
            if($this->m_attendant->addAttendant()){
                $this->session->set_flashdata('message', alert("Attendant have been added", 'success'));
                redirect('attendants/students');
            }
            else{
                $this->session->set_flashdata('message', alert("Add attendant have been fail, please try again", 'danger'));
                redirect('attendants/students/add');
            }
        }
        else{
            $this->data['title'] = 'Add student attendant';
            $this->data['content'] = 'attendants/students/add';

            $this->data['academic_year'] = $this->m_attendant->getGeneration();
            $this->load->view(LAYOUT, $this->data);
        }
    }
    
    /**
     * Ajax requst
     */
    public function get_class(){
       
        $classess = $this->m_attendant->getClasses($this->input->post('gen_id'));
        $html = '<option value="">--Select Class--</option>';
        if(count($classess) > 0){
            foreach ($classess as $key => $value) {
                $html .= '<option value="'.$key.'">'.$value.'</option>';
            }
        }
        echo $html;
    }
    
    /**
     * Respond ajax request
     */
    public function get_student_list(){
        
        $this->data['students'] = $this->m_attendant->getStudentsByClassId($this->input->post('cla_id'));
        $this->load->view('attendants/students/get_student_list', $this->data);
    }
}
