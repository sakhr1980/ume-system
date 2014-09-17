<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(!function_exists('rememberFilter')){
    function rememberFilter($fields = NULL, $db) {
        if ($fields != NULL) {
            $ci = & get_instance();
            $ci->load->library(array('session'));
            
            
            foreach ($fields as $field) {
                if ($ci->input->post($field) != '') {
                    $ci->session->set_userdata($field, $ci->input->post($field));
                }
                if ($ci->input->post('submit') && $ci->input->post($field) == '') {
                    $ci->session->set_userdata($field, '');
                }
                if ($ci->session->userdata($field) != '') {
                    $db->where($field, $ci->session->userdata($field));
                }
            }
        }
    }
}
