<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Student_payment extends CI_Model {

    /**
     * Select all student payment
     * @param integer $num_row
     * @param integer $from_row
     *
     * @return array
     */
    function findAllStudentPayments($num_row, $from_row) {

        $this->db->select("*,sum(spd_amount) as paid_fee");
        $this->db->from(TABLE_PREFIX . 'student_payments sp');
        $this->db->join(TABLE_PREFIX . 'students s', 's.stu_id = sp.sp_stu_id');
        $this->db->join(TABLE_PREFIX . 'classes cl', 'cl.cla_id = sp.sp_cla_id');
        $this->db->join(TABLE_PREFIX . 'stu_payment_detail pd', 'sp.sp_id= pd.spd_sp_id','left');
        $this->db->join(TABLE_PREFIX . 'shift sh', 'cl.tbl_shift_shi_id = sh.shi_id');
        $this->db->join(TABLE_PREFIX . 'generation ge', 'cl.tbl_generation_gen_id = ge.gen_id');
        $this->db->join(TABLE_PREFIX . 'majors ma', 'ma.maj_id = cl.cla_maj_id');
        $this->db->join(TABLE_PREFIX . 'faculties fa', 'ma.maj_fac_id = fa.fac_id');
        $this->db->group_by('pd.spd_sp_id');
        $this->db->limit($num_row, $from_row);

        $this->db->order_by('stu_id');
        if ($this->input->post('stu_id') != '') {
            $this->db->like('sp_stu_id', $this->input->post('stu_id'));
        }
        if ($this->input->post('stu_name') != '') {
            $this->db->like('stu_en_firstname', $this->input->post('stu_name'));
            $this->db->or_like('stu_en_lastname', $this->input->post('stu_name'));
        }
        if ($this->input->post('stu_kh_name') != '') {
            $this->db->like('stu_kh_firstname', $this->input->post('stu_kh_name'));
            $this->db->or_like('stu_kh_lastname', $this->input->post('stu_kh_name'));
        }
        if ($this->input->post('sp_year') != '') {
            $this->db->like('sp_year', $this->input->post('sp_year'));
        }
//        else {
//            $this->db->like('sp.sp_year', 1);
//        }

        // Keep pagination for filter status
//        if ($this->input->post('sp_status') != '') {
//            $this->session->set_userdata('sp_status', $this->input->post('sp_status'));
//        }
//        if ($this->input->post('submit') && $this->input->post('sp_status') == '') {
//            $this->session->set_userdata('sp_status', '');
//        }
//        if ($this->session->userdata('sp_status') != '') {
//            $this->db->where('sp_status', $this->session->userdata('sp_status'));
//        }
        return $this->db->get();
    }

    function getPaymentInfoById($id){
//        $this->db->select("*,sum('pd.spd_amountd')");
        $this->db->select("*,sum(spd_amount) as paid_fee");
        $this->db->from(TABLE_PREFIX . 'student_payments sp');
        $this->db->join(TABLE_PREFIX . 'students s', 's.stu_id = sp.sp_stu_id');
        $this->db->join(TABLE_PREFIX . 'classes cl', 'cl.cla_id = sp.sp_cla_id');
        $this->db->join(TABLE_PREFIX . 'stu_payment_detail pd', 'sp.sp_id= pd.spd_sp_id','left');
        $this->db->join(TABLE_PREFIX . 'shift sh', 'cl.tbl_shift_shi_id = sh.shi_id');
        $this->db->join(TABLE_PREFIX . 'generation ge', 'cl.tbl_generation_gen_id = ge.gen_id');
        $this->db->join(TABLE_PREFIX . 'majors ma', 'ma.maj_id = cl.cla_maj_id');
        $this->db->join(TABLE_PREFIX . 'faculties fa', 'ma.maj_fac_id = fa.fac_id');
        $this->db->where('sp_id', $id);
//        $this->db->group_by('pd.spd_sp_id');
        return $this->db->get();
    }
    /**
     * Count all student payments record
     *
     * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
     * @access public
     * @return integer
     */
    function countAll() {

        // Keep pagination for filter status
        if ($this->input->post('sp_status') != '') {
            $this->session->set_userdata('sp_status', $this->input->post('sp_status'));
        }
        if ($this->input->post('submit') && $this->input->post('sp_status') == '') {
            $this->session->set_userdata('sp_status', '');
        }
        if ($this->session->userdata('sp_status') != '') {
            $this->db->where('sp_status', $this->session->userdata('sp_status'));
        }
        $this->db->order_by('stu_id');
        if ($this->input->post('stu_id') != '') {
            $this->db->like('sp_stu_id', $this->input->post('stu_id'));
        }
        if ($this->input->post('stu_name') != '') {
            $this->db->like('stu_en_firstname', $this->input->post('stu_name'));
            $this->db->or_like('stu_en_lastname', $this->input->post('stu_name'));
        }
        if ($this->input->post('stu_kh_name') != '') {
            $this->db->like('stu_kh_firstname', $this->input->post('stu_kh_name'));
            $this->db->or_like('stu_kh_lastname', $this->input->post('stu_kh_name'));
        }
        if ($this->input->post('sp_year') != '') {
            $this->db->like('sp_year', $this->input->post('sp_year'));
        } else {
            $this->db->like('sp_year', 1);
        }

//        $this->db->select('*');
        $this->db->select("*,sum(spd_amount) as paid_fee");
        $this->db->from(TABLE_PREFIX . 'student_payments sp');
        $this->db->join(TABLE_PREFIX . 'students s', 's.stu_id = sp.sp_stu_id');
        $this->db->join(TABLE_PREFIX . 'classes cl', 'cl.cla_id = sp.sp_cla_id');
        $this->db->join(TABLE_PREFIX . 'stu_payment_detail pd', 'sp.sp_id= pd.spd_sp_id','left');
        $this->db->join(TABLE_PREFIX . 'shift sh', 'cl.tbl_shift_shi_id = sh.shi_id');
        $this->db->join(TABLE_PREFIX . 'generation ge', 'cl.tbl_generation_gen_id = ge.gen_id');
        $this->db->join(TABLE_PREFIX . 'majors ma', 'ma.maj_id = cl.cla_maj_id');
        $this->db->join(TABLE_PREFIX . 'faculties fa', 'ma.maj_fac_id = fa.fac_id');
        $this->db->group_by('pd.spd_sp_id');
        $data = $this->db->get();
        return $data->num_rows();
    }
function add_paymentl(){
    $data = $this->input->post();
    $this->db->set('spd_cdate', 'NOW()', false);
     $result = $this->db->insert(TABLE_PREFIX . 'stu_payment_detail', $data);
     return $result;
}
    /**
     * Create student Payments
     *
     * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
     * @access public
     * @return boolean
     */
    function add() {
//        $data = array(
//            'tbl_students_stu_id' => $this->input->post('tbl_students_stu_id'),
//            'tbl_subjects_sub_id' => $this->input->post('tbl_subjects_sub_id'),
//            'tbl_majors_maj_id' => $this->input->post('tbl_majors_maj_id'),
//            'sp_year' => $this->input->post('sp_year'),
//            'sp_date_pay' => $this->input->post('sp_date_pay'),
//            'sp_amounce' => $this->input->post('sp_amounce'),
//            'sp_status' => $this->input->post('sp_status')
//        );
        $data = $this->input->post();
        $year = $data['sp_year'];
        unset($data['sp_amounce']);
        unset($data['spd_comment']);


        $fee = 0;
        $descount = 0; // === get descound 30% for any scholarship
//         $data['spd_comment'];
//        ============Student payment type==================
        $this->db->select("st.stu_spt_id,spt.*");
        $this->db->from(TABLE_PREFIX . 'students st');
        $this->db->join(TABLE_PREFIX . 'student_payment_type spt', 'st.stu_spt_id = spt.spt_id');
        $this->db->where('st.stu_id', $data['sp_stucla_stu_id']); //====Get selete of student id==========
        $stu_info = $this->db->get(); //======get student info and scholarship type 100%, 30%,...
        if ($stu_info->num_rows() > 0) {
            foreach ($stu_info->result_array() as $row) {
                $numberOfYear = $row['spt_number_of_year']; //=========Get number of year get scholarship ===========
                $payYear = $data['sp_year']; //======Year of Payment 
                if ($payYear <= $numberOfYear) {
                    $descount = $row['spt_descount_percentage']; // === get descound 30% for any scholarship
                } else {
                    $descount = 0;
                }
            }
        } else {
            echo "Can not find student payment infomation...!";
            exit();
        }


        $data['gen_id'] = 3; //////Sample data only
//        ==============Payment fee============
//        $this->db->select("st.stu_spt_id,spt.*");
        $this->db->from(TABLE_PREFIX . 'classes cl');
        $this->db->join(TABLE_PREFIX . 'majors ma', 'cl.cla_maj_id = ma.maj_id');
        $this->db->join(TABLE_PREFIX . 'major_fee maf', 'maf.maf_maj_id = ma.maj_id');
        $this->db->where('maf_academic_year', $data['gen_id']);   // ==========Whare seleted academic year=======
        $this->db->where('maf_year_number', $data['sp_year']);   // ==========Whare seleted year number=======
        $this->db->where('cl.cla_id', $data['sp_stucla_cla_id']);  // ==========Whare seleted class===
        $fee_info = $this->db->get(); //=====Get school free for each year==========
        if ($fee_info->num_rows() > 0) {
            foreach ($fee_info->result_array() as $row) {
                $fee = $row['maf_price'];
            }
        } else {
            echo "Can not find class payment infomation...!";
            exit();
        }

        $total_fee = $fee - ($fee * 0.01 * $descount);

        echo " Fee = " . $fee;
        echo " Discount = " . $descount;
        echo " total = " . $total_fee;
        exit();

        $userid = $this->session->userdata('user');
        $this->db->set('tbl_users_id', $userid['use_id']);
//         $this->db->set('sta_modified', 'NOW()', false);
        $result = $this->db->insert(TABLE_PREFIX . 'student_payments', $data);
        return $result;
    }

    /**
     * Update room
     *
     * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
     * @access public
     * @return boolean
     */
    function update() {
        $data = array(
            'tbl_students_stu_id' => $this->input->post('tbl_students_stu_id'),
            'tbl_subjects_sub_id' => $this->input->post('tbl_subjects_sub_id'),
            'tbl_majors_maj_id' => $this->input->post('tbl_majors_maj_id'),
            'sp_year' => $this->input->post('sp_year'),
            'sp_date_pay' => $this->input->post('sp_date_pay'),
            'sp_amounce' => $this->input->post('sp_amounce'),
            'sp_status' => $this->input->post('sp_status')
        );
        $this->db->where('sp_id', $this->uri->segment(4));
        return $this->db->update(TABLE_PREFIX . 'student_payments', $data);
    }

    /**
     * Discard room
     *
     * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
     * @param integer $id student id
     * @access public
     * @return boolean
     */
    function deleteStudentPaymentsByID($id = null) {
        $this->db->where('sp_id', $id);
        return $this->db->delete(TABLE_PREFIX . 'student_payments');
    }

    /**
     * Select student by id
     * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
     * @access public
     * @return object
     */
    function findStudentByID($id) {
        $this->db->select('stu_en_firstname, stu_en_lastname, stu_kh_firstname, stu_kh_lastname, stu_gender');
        $this->db->where('stu_id', $id);
        $this->db->from(TABLE_PREFIX . 'students');
        return $this->db->get();
    }

    /**
     * Select student payments by id
     *
     * @author Vibol YOEUNG <yoeung.vibol@gmail.com>
     * @param integer $id sp_id
     * @access public
     * @return array
     */
    function getStudentPaymentByID($id) {
        $this->db->select('sp_id, tbl_students_stu_id, tbl_subjects_sub_id, tbl_majors_maj_id, sp_date_pay, sp_amounce,sp_year, sp_status, stu_kh_firstname, stu_kh_lastname,stu_gender, stu_en_firstname, stu_en_lastname, sub_id, sub_name, maj_id, maj_name');
        $this->db->from(TABLE_PREFIX . 'student_payments');
        $this->db->join(TABLE_PREFIX . 'students', 'tbl_students_stu_id = stu_id');
        $this->db->join(TABLE_PREFIX . 'subject', 'sub_id = tbl_subjects_sub_id');
        $this->db->join(TABLE_PREFIX . 'majors', 'maj_id = tbl_majors_maj_id ');
        $this->db->order_by('sp_id', 'desc');
        $this->db->where('sp_id', $id);
        return $this->db->get();
    }

    function getStudentName() {
        $this->db->select('st.stu_en_firstname,st.stu_en_lastname,st.stu_id,st.stu_card_id,');
        $this->db->from(TABLE_PREFIX . 'students st');
        $this->db->join(TABLE_PREFIX . 'student_class sc', 'st.stu_id = stucla_stu_id ');
        $this->db->where('sc.stucla_status', 1);
        return $this->db->get();
    }

    function getClassName() {
        $this->db->select('cl.cla_id,cla_name');
        $this->db->from(TABLE_PREFIX . 'classes cl');
        $this->db->join(TABLE_PREFIX . 'student_class sc', 'cl.cla_id = stucla_cla_id ');
        $this->db->where('cl.cla_status', 1);
        $this->db->group_by('stucla_cla_id');
        return $this->db->get();
    }

}
