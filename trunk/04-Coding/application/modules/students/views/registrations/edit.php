<?php
$data->result_array();
$payment->result_array();
$data = $data->result_array[0];
$payment = $payment->result_array[0];
$this->session->userdata('stu_class', $data['stucla_cla_id']);
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>students/registrations/edit/<?php
echo $data['stu_id'];
echo '/' . $this->uri->segment(5); // segment(5) for pagination
?>">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>students/registrations/index/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Update</button>
            <button type="reset" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-ban-circle"></i> Reset</button>
        </div>
        <div class="right">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
    <div class="content">

        <div class="panel panel-<?php echo DEFAULTS; ?>">
            <div class="panel-heading">
                <h3 class="panel-title">ឈ្មោះ Applicant Full Legal Name:</h3>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="stu_kh_lastname" class="col-sm-2 control-label">គោត្តនាម</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control input-sm" id="gro_name" placeholder="គោត្តនាម" name="stu_kh_lastname" value="<?php echo $data['stu_kh_firstname']; ?>"  pattern=".{2,50}"  title="Allow enter from 2 to 50 characters">
                                <?php echo form_error('stu_kh_lastname'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stu_en_lastname" class="col-sm-2 control-label">Surname</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control input-sm" id="gro_name" placeholder="Surname" name="stu_en_lastname" value="<?php echo $data['stu_en_lastname']; ?>"  pattern=".{2,50}" required title="Allow enter from 2 to 50 characters">
                                <?php echo form_error('stu_en_lastname'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="stu_kh_firstname" class="col-sm-2 control-label">នាម</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control input-sm" id="stu_kh_firstname" placeholder="នាម" name="stu_kh_firstname" value="<?php echo $data['stu_kh_lastname']; ?>"  title="Allow enter from 2 to 50 characters">
                                <?php echo form_error('stu_kh_firstname'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stu_en_firstname" class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control input-sm" id="stu_en_firstname" placeholder="First Name" name="stu_en_firstname" value="<?php echo $data['stu_en_firstname']; ?>" required title="Allow enter from 2 to 50 characters">
                                <?php echo form_error('stu_en_firstname'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-sm-6"><img id="image_preview" alt="Uploaded Image Preview Holder"/>&nbsp;</div>

                        </div> 
                        <div class="col-sm">
                            <input type="file" accept=".png, .gif, .jpg, .jpeg" class="form-control input-sm" id="stu_image" name="stu_image" value="<?php echo $data['stu_en_lastname']; ?>"  title="Allow enter from 2 to 50 characters" />
                        </div>
                        <?php echo form_error('stu_image'); ?>
                    </div>
                </div>

            </div>
        </div>



        <label><input type="radio"  name="stu_job" id="stu_job" value="មានការងារធ្វើ"<?php echo ($data['stu_job'] == "មានការងារធ្វើ") ? "checked=checked" : "" ?>  <?php echo set_radio('job', 1, ($data['stu_job'] > 0) ? TRUE : FALSE); ?> > មានការងារធ្វើ</label>&nbsp;&nbsp;
        <label><input type="radio" name="stu_job" id="" value="ជានិស្សិត"<?php echo ($data['stu_job'] == "ជានិស្សិត") ? "checked=checked" : "" ?>  <?php echo set_radio('job', 2, ($data['stu_job'] > 0) ? TRUE : FALSE); ?>> ជានិស្សិត</label>



        <div class="panel panel-<?php echo DEFAULTS; ?>">
            <div class="panel-heading">
                <h3 class="panel-title">I. កមរិតសញ្ញាប័ត្រ និងជំនាញ PROGRAM OF STUDY AND MAJOR</h3>
            </div>
            <div class="panel-body">
                <label><input type="radio" required="required" name="degree" value="MS" <?php echo ($data['stucla_degree'] == "MS") ? "checked=checked" : "" ?><?php echo set_radio('stucla_degree', 1, ($data['stucla_degree'] ==1) ? TRUE : FALSE); ?> > បរិញ្ញបត្រជាន់ខ្ពស់ Master Degree Program</label>&nbsp;&nbsp;
                <label><input type="radio" required="required" name="degree" value="BB" <?php echo ($data['stucla_degree'] == "BB") ? "checked=checked" : "" ?><?php echo set_radio('stucla_degree', 1, ($data['stucla_degree'] == 2) ? TRUE : FALSE); ?> > បរិញ្ញាបត្រ Bachelor Degree Program</label>
                <label><input type="radio" required="required" name="degree" value="AD" <?php echo ($data['stucla_degree'] == "AD") ? "checked=checked" : "" ?><?php echo set_radio('stucla_degree', 1, ($data['stucla_degree'] == 3) ? TRUE : FALSE); ?> > បរិញ្ញាបត្ររង Association Degree Program</label>
                <div class="divider"></div>
                <?php //Debug::dump($faculties); ?>
                <!--                <div class="row">
                                    <div class="col-md-12"><label>តើអ្នកជ្រើសរើសជំនាញមួយនា? For which graduate program are you applying?</label></div>
                <?php //foreach ($master->result_array() as $row) { ?>
                                        <div class="col-md-6">
                                            <label><input type="radio" name="major" value="<?php //echo $row['maj_id'];             ?>" <?php //echo set_radio('major', $row['maj_id'], FALSE);             ?>> <?php //echo $row['maj_name'];             ?></label>
                                        </div>
                <?php //} ?>
                                </div>-->
                <div class="form-group">
                    <label for="tbl_generation_gen_id" class="col-sm-2 control-label">Academic Year:</label>
                    <div class="col-md-2">
                        <select name="tbl_generation_gen_id" class="form-control gen_selected" id="sta_position">
                            <option value="'"'>-All Generation--</option>
                            <?php
                            foreach ( $generation as $key => $value) {
                                if ($key == $data['sta_position']) {
                                    echo '<option value="' . $key . '" ' . set_select('tbl_generation_gen_id', $key, TRUE) . '>' . $value . '</option>';
                                } else {
                                    echo '<option value="' . $key . '" ' . set_select('tbl_generation_gen_id', $key) . '>' . $value . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <?php // echo form_dropdown('tbl_generation_gen_id', array('' => '--All Generation--') + $generation, set_value('tbl_generation_gen_id', $this->session->userdata('tbl_generation_gen_id')), 'class="form-control input-sm gen_selected" required="required"') ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12"><strong>តើមហាវិទ្យល័យ និង ឯកទេសមួយណា ដែលអ្នកចង់ជ្រើសរើស?</strong></div>
                    <div class="col-md-12">
                        <?php
                        $kh_num = array('០', '១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩', '១០', '១១',);
                        if (count($faculties) > 0) {
                            $count = 0;
                            foreach ($faculties->result_array as $faculty) {
                                $count++;
                                ?>
                                <div class="panel panel-<?php echo DEFAULTS; ?>">
                                    <div class=" panel-heading">
                                        <h3 class="panel-title"><?php echo $kh_num[$count] . '-ម. ' . $faculty['fac_name']; ?></h3>
                                    </div>
                                    <div class="panel-body">

                                        <?php
                                        $m = $majors[$faculty['fac_id']];
                                        if ($m->num_rows() > 0) {
                                            foreach ($m->result_array() as $major) {
                                                ?>
                                                <div class="col-md-4">
                                                    <label><input type="radio" required="required"  name="major" id="maj_id_<?php echo $major['maj_id']; ?>" value="<?php echo $major['maj_id']; ?>"<?php echo ($data['maj_id'] == $major['maj_id']) ? "checked=checked" : "" ?>> <?php echo $major['maj_name']; ?></label>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            echo 'Empty';
                                        }
                                        ?>

                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            ?>
                            <div class="panel panel-<?php echo DEFAULTS; ?>">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Empty</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-4">
                                        Empty
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel panel-<?php echo DEFAULTS; ?>">
            <div class="panel-heading">
                <h3 class="panel-title">II. ជីវប្រវត្តិសង្ខេប PERSONAL INFORMATION</h3>
            </div>
            <div class="panel-body">

                <div class="col-md-4">
                    <label for="stu_dob" class="col-sm-12">ថ្ងៃខែឆ្នាំកំណើត DATE OF BIRTH</label>
                    <div class="col-sm-12">
                        <!--<input type="text" class="form-control input-sm" id="stu_dob" placeholder="" name="stu_dob" value="<?php echo $data['stu_dob']; ?>" />-->
                        <?php //  echo form_error('stu_dob'); ?>

                        <div class="input-group date" data-datepicker="true">
                            <input type="text" class="form-control" id="stu_dob" placeholder="yyyy-mm-dd" name="stu_dob" value="<?php echo $data['stu_dob']; ?>" >
                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            <?php echo form_error('stu_dob'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_pob" class="col-sm-12">ទីកន្លែងកំណើត PLACE OF BIRTH</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_dob" placeholder="" name="stu_pob" value="<?php echo $data['stu_pob']; ?>" />
                        <?php echo form_error('stu_pob'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_nationality" class="col-sm-12">NATIONALITY</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_nationality" placeholder="" name="stu_nationality" value="<?php echo $data['stu_nationality']; ?>" />
                        <?php echo form_error('stu_nationality'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_gender" class="col-sm-12">GENDER</label>
                    <div class="col-sm-12">
                        <label><input type="radio" name="stu_gender" value="Male" <?php echo ($data['stu_gender'] == "Male") ? "checked=checked" : "" ?> /> Male</label>
                        <label><input type="radio" name="stu_gender" value="Female" <?php echo ($data['stu_gender'] == "Female") ? "checked=checked" : "" ?>/> Female</label>
                        <!--<label><input type="radio" name="stu_gender" value="Others" <?php echo set_radio('stu_gender', 'Other', FALSE); ?> /> Others</label>-->
                        <?php echo form_error('stu_gender'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_marital_status" class="col-sm-12">MARITAL STATUS</label>
                    <div class="col-sm-12">
                        <label><input type="radio" name="stu_marital_status" value="Single" <?php echo ($data['stu_marital_status'] == "Single") ? "checked=checked" : "" ?> /> Single</label>
                        <label><input type="radio" name="stu_marital_status" value="Married" <?php echo ($data['stu_marital_status'] == "Married") ? "checked=checked" : "" ?> /> Married</label>
                        <label><input type="radio" name="stu_marital_status" value="Others"<?php echo ($data['stu_marital_status'] == "Others") ? "checked=checked" : "" ?> /> Others</label>
                        <?php echo form_error('stu_gender'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_tel" class="col-sm-12">PHONE NUMBER</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_tel" placeholder="" name="stu_tel" value="<?php echo $data['stu_tel']; ?>" />
                        <?php echo form_error('stu_tel'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_email" class="col-sm-12">EMAIL</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_email" placeholder="" name="stu_email" value="<?php echo $data['stu_email']; ?>" />
                        <?php echo form_error('stu_email'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_fax" class="col-sm-12">FAX</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_fax" placeholder="" name="stu_fax" value="<?php echo $data['stu_fax']; ?>" />
                        <?php echo form_error('stu_fax'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_current_address" class="col-sm-12">CURRENT ADDRESS</label>
                    <div class="col-sm-12">
                        <textarea class="form-control input-sm" id="stu_current_address" placeholder="Current Address" name="stu_current_address" value=""><?php echo $data['stu_fax']; ?></textarea>
                        <?php echo form_error('stu_fax'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-<?php echo DEFAULTS; ?>">
            <div class="panel-heading">
                <h3 class="panel-title">III. FAMILY / NEXT OF KIN INFORMATION</h3>
            </div>
            <div class="panel-body">

                <div class="col-md-6">
                    <label for="stu_father_name" class="col-sm-12">Father's Name</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_father_name" placeholder="" name="stu_father_name" value="<?php echo $data['stu_father_name']; ?>" />
                        <?php echo form_error('stu_father_name'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="stu_father_occupation" class="col-sm-12">Occupation</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_father_occupation" placeholder="" name="stu_father_occupation" value="<?php echo $data['stu_father_occupation']; ?>" />
                        <?php echo form_error('stu_father_occupation'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="stu_mother_name" class="col-sm-12">Mother's Name</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_mother_name" placeholder="" name="stu_mother_name" value="<?php echo $data['stu_mother_name']; ?>" />
                        <?php echo form_error('stu_mother_name'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="stu_mother_occupation" class="col-sm-12">Occupation</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_mother_occupation" placeholder="" name="stu_mother_occupation" value="<?php echo $data['stu_mother_occupation']; ?>" />
                        <?php echo form_error('stu_mother_occupation'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="stu_mother_tel" class="col-sm-12">Telephone</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_mother_tel" placeholder="" name="stu_mother_tel" value="<?php echo $data['stu_mother_tel']; ?>" />
                        <?php echo form_error('stu_mother_tel'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="stu_mother_email" class="col-sm-12">E-Mail</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_mother_email" placeholder="" name="stu_mother_email" value="<?php echo $data['stu_mother_email']; ?>" />
                        <?php echo form_error('stu_mother_email'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="stu_mother_faxl" class="col-sm-12">Fax</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_mother_faxl" placeholder="" name="stu_mother_faxl" value="<?php echo $data['stu_mother_faxl']; ?>" />
                        <?php echo form_error('stu_mother_faxl'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_father_current_address" class="col-sm-12">CURRENT ADDRESS</label>
                    <div class="col-sm-12">
                        <textarea class="form-control input-sm" id="stu_father_current_address" placeholder="Current Address" name="stu_father_current_address" value=""><?php echo $data['stu_father_current_address']; ?></textarea>
                        <?php echo form_error('stu_father_current_address'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-<?php echo DEFAULTS; ?>">
            <div class="click_colap panel-heading">
                <h3 class="panel-title">IV. RECORD OF SECONDARY/HIGH SCHOOL/TERTIARY STUDIES</h3>
            </div>
            <div class="colap panel-body">
                <div class="col-md-6">
                    <label for="stu_highschool_name" class="col-sm-12">Name of School/Institution/University</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_father_name" placeholder="" name="stu_highschool_name" value="<?php echo $data['stu_highschool_name']; ?>" />
                        <?php echo form_error('stu_highschool_name'); ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="stu_highschool_year" class="col-sm-12">Year</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_highschool_year" placeholder="" name="stu_highschool_year" value="<?php echo $data['stu_highschool_year']; ?>" />
                        <?php echo form_error('stu_highschool_year'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_highschool_degree" class="col-sm-12">Degree</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_highschool_degree" placeholder="" name="stu_highschool_degree" value="<?php echo $data['stu_highschool_degree']; ?>" />
                        <?php echo form_error('stu_highschool_degree'); ?>
                    </div>
                </div>
                <div class="col-md-12">&nbsp;<div class="divider"></div></div>
                <div class="col-md-12"><label class="col-sm-12">បានប្រឡងមធ្យមសិក្សាទុតិយភូមិ</label></div>
                <div class="col-md-4">
                    <label for="stu_highschool_bacii_province" class="col-sm-12">ខេត្តប្រឡង</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_highschool_bacii_province" placeholder="" name="stu_highschool_bacii_province" value="<?php echo $data['stu_highschool_bacii_province']; ?>" />
                        <?php echo form_error('stu_highschool_bacii_province'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_highschool_bacii_office" class="col-sm-12">មណ្ខលប្រឡង</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_highschool_bacii_office" placeholder="" name="stu_highschool_bacii_office" value="<?php echo $data['stu_highschool_bacii_office']; ?>" />
                        <?php echo form_error('stu_highschool_bacii_office'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_highschool_bacii_date" class="col-sm-12">កាលបរិច្ឆេទប្រឡង</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_highschool_bacii_date" placeholder="" name="stu_highschool_bacii_date" value="<?php echo $data['stu_highschool_bacii_date']; ?>" />
                        <?php echo form_error('stu_highschool_bacii_date'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_highschool_bacii_room" class="col-sm-12">បន្តប់ប្រលង</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_highschool_bacii_room" placeholder="" name="stu_highschool_bacii_room" value="<?php echo $data['stu_highschool_bacii_room']; ?>" />
                        <?php echo form_error('stu_highschool_bacii_room'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_highschool_bacii_table" class="col-sm-12">លេខតុ</label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control input-sm" id="stu_highschool_bacii_table" placeholder="" name="stu_highschool_bacii_table" value="<?php echo $data['stu_highschool_bacii_table']; ?>" />
                        <?php echo form_error('stu_highschool_bacii_table'); ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="panel panel-<?php echo DEFAULTS; ?>">
            <div class="click_colap panel-heading">
                <h3 class="panel-title">V. RELEVANT EMPLOYMENT EXPERIENCE</h3>
            </div>
            <div class="colap panel-body">

                <div class="col-md-4">
                    <label for="exp_date1" class="col-sm-12">Date of Employment From-To</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="exp_date1" placeholder="" name="exp_date[]" value="<?php // echo $data['exp_date[]'];   ?>" />
                        <?php echo form_error('exp_date[]'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="exp_shift0" class="col-sm-12">SHIFT</label>
                    <div class="col-sm-12">
                        <label><input type="radio" name="exp_shift[0]" value="Full Time" <?php echo set_radio('exp_shift[0]', 'Full Time', FALSE); ?>> ពេញម៉ោង Full Time</label>
                        <label><input type="radio" name="exp_shift[0]" value="Parth Time" <?php echo set_radio('majexp_shift[0]', 'Part Time', FALSE); ?>> មិនពេញម៉ោង Part Time</label>
                        <?php echo form_error('exp_date'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="exp_position1" class="col-sm-12">Position</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="exp_position1" placeholder="" name="exp_position[]" value="<?php // echo $data['exp_position'];   ?>" />
                        <?php echo form_error('exp_position[]'); ?>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="exp_employer_tel1" class="col-sm-12">Employer Telephone No</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="exp_employer_tel1" placeholder="" name="exp_employer_tel[]" value="<?php // echo $data['exp_employer_tel[]'];   ?>" />
                        <?php echo form_error('exp_employer_tel[]'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="exp_responsibility1" class="col-sm-12">CURRENT ADDRESS</label>
                    <div class="col-sm-12">
                        <textarea class="form-control input-sm" id="exp_responsibility1" placeholder="Current Address" name="exp_responsibility[]" value=""><?php // echo $data['exp_responsibility[]'];   ?></textarea>
                        <?php echo form_error('exp_responsibility[]'); ?>
                    </div>
                </div>

                <div class="col-md-12">&nbsp;<div class="divider"></div></div>

                <div class="col-md-4">
                    <label for="exp_date2" class="col-sm-12">Date of Employment From-To</label>
                    <!--                    <div class="col-sm-12">
                                            <input type="text" class="form-control input-sm" id="exp_date2" placeholder="" name="exp_date[]" value="<?php // echo $data['exp_date[]'];   ?>" />
                    <?php echo form_error('exp_date[]'); ?>
                                        </div>-->

                    <div class="col-sm-12 input-group date" data-datepicker="true">
                        <input type="text" class="form-control" id="exp_date2" placeholder="yyyy-mm-dd" name="exp_date[]" value="<?php // echo $data['exp_date[]'];   ?>" >
                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        <?php echo form_error('exp_date[]'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="exp_shift2" class="col-sm-12">SHIFT</label>
                    <div class="col-sm-12">
                        <label><input type="radio" name="exp_shift[1]" id="exp_shift" value="Full Time" <?php echo set_radio('exp_shift[1]', 'Full Time', FALSE); ?>> ពេញម៉ោង Full Time</label>
                        <label><input type="radio" name="exp_shift[1]" id="exp_shift" value="Parth Time" <?php echo set_radio('exp_shift[1]', 'Part Time', FALSE); ?>> មិនពេញម៉ោង Part Time</label>
                        <?php echo form_error('exp_shift[]'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="exp_position2" class="col-sm-12">Position</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="exp_position2" placeholder="" name="exp_position[]" value="<?php // echo $data['exp_position[]'];   ?>" />
                        <?php echo form_error('exp_position[]'); ?>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="exp_employer_tel2" class="col-sm-12">Employer Telephone No</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="exp_employer_tel2" placeholder="" name="exp_employer_tel[]" value="<?php // echo $data['exp_employer_tel[]'];   ?>" />
                        <?php echo form_error('exp_employer_tel[]'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="exp_responsibility2" class="col-sm-12">CURRENT ADDRESS</label>
                    <div class="col-sm-12">
                        <textarea class="form-control input-sm" id="exp_responsibility2" placeholder="Current Address" name="exp_responsibility[]" value=""><?php // echo $data['exp_responsibility[]'];   ?></textarea>
                        <?php echo form_error('exp_responsibility[]'); ?>
                    </div>
                </div>

                <div class="col-md-12">&nbsp;<div class="divider"></div></div>

            </div>
        </div>

        <div class="panel panel-<?php echo DEFAULTS; ?>">
            <div class="panel-heading">
                <h3 class="panel-title">ម៉ោងសិក្សា Study Time (Only for Bachelor and Association Degree)</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-3">
                    <label><input type="radio" required="required" name="shift" id="shift" value="1" <?php echo ($data['tbl_shift_shi_id'] == "1") ? "checked=checked" : "" ?>> MORNING</label>
                </div>
                <div class="col-md-3">
                    <label><input type="radio" required="required"  name="shift" id="shift" value="2" <?php echo ($data['tbl_shift_shi_id'] == "2") ? "checked=checked" : "" ?>> AFTERNOON</label>
                </div>
                <div class="col-md-3">
                    <label><input type="radio" name="shift" id="shift" value="3" <?php echo ($data['tbl_shift_shi_id'] == "3") ? "checked=checked" : "" ?>> EVENING</label>
                </div>
                <div class="col-md-3">
                    <label><input type="radio" name="shift" id="shift" value="4" <?php echo ($data['tbl_shift_shi_id'] == "4") ? "checked=checked" : "" ?>> WEEKEN</label>
                </div>
            </div>
        </div>
        <div class="panel panel-<?php echo DEFAULTS; ?>">
            <div class="panel-heading">
                <h3 class="panel-title">ថ្នាក់រៀន Class</h3>
            </div>
            <div class="col-md-3" >
                <br/>
                <a href="<?php echo site_url(); ?>classes/add/" class=" warning"><i class="glyphicon glyphicon-plus-sign"></i> New Class</a>
            </div>

            <div class="panel-body" id="classDisplay">
                <div class="col-md-3">
                    <label><input type="radio" value="<?php echo $data['cla_id']; ?>" checked='checked' id="class" name="class" required="required"><?php echo $data['cla_name']; ?></label>
                </div>
            </div>
        </div>

        <div class="panel panel-<?php echo DEFAULTS; ?>">
            <div class="panel-heading">
                <h3 class="panel-title">Class of Study</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-4">
                    <label for="stu_tel" class="col-sm-12">Year</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stucla_year_study" placeholder="" name="stucla_year_study" value="<?php echo $data['stucla_year_study']; ?>" />
                        <?php echo form_error('stucla_year_study'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-<?php echo DEFAULTS; ?>">
            <div class="panel-heading">
                <h3 class="panel-title">Study Fee</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-3">
                    <label><input type="radio" required="required" name="pay_type" class="pay_fee" id="pay_type1" value="1" <?php echo set_radio('spf_spt_id', 1, ($payment['spf_spt_id'] == 1) ? TRUE : FALSE); ?>> Pay Fee</label>
                </div>
                <div class="col-md-3">
                    <label><input type="radio" required="required"  name="pay_type"  class="pay_type" id="pay_type2" value="2" <?php echo set_radio('spf_spt_id', 1, ($payment['spf_spt_id'] == 2) ? TRUE : FALSE); ?>> UME Scholarship</label>
                </div>
                <div class="col-md-3"> 
                    <label><input type="radio" name="pay_type" id="pay_type3"  class="pay_type" value="3" <?php echo set_radio('spf_spt_id', 1, ($payment['spf_spt_id'] == 3) ? TRUE : FALSE); ?>> Partner Scholarship</label>
                </div>
                <div class="col-md-12">
                    <div class="col-md-3">&nbsp;</div>
                    <div class="col-md-3">
                        <label for="pm_discount_value" class="col-sm-12">Discount Value</label>
                        <div class="col-sm-9">
                            <input maxlength='3'   class="form-control input-sm numbersOnly " id="pm_discount_value" placeholder="Scholaship value %" name="pm_discount_value" required disabled="disabled" value="<?php echo set_value('pm_discount_value'); ?>"/>
                            <?php echo form_error('pm_discount_value'); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="pm_discount_period" class="col-sm-12">Discount Period</label>
                        <div class="col-sm-9">
                            <input maxlength='1' class="form-control input-sm numbersOnly " id="pm_discount_period" placeholder="Number of year" name="pm_discount_period" required  disabled="disabled" value="<?php echo set_value('pm_discount_period'); ?>" />
                            <?php echo form_error('pm_discount_period'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><br/><br/>
    <br/><br/>
</form> 
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(function() {
        $("#stu_image").change(function() {
            readURL(this);
        });

//        /===============Formvalidate number only===========
        $('.numbersOnly').keyup(function(e) {
            if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
                this.value = this.value.replace(/[^0-9\.]/g, '');
            }
            if (this.value > 100) {
                alert('You have entered more than 100 as input');
                this.value = "";
            }
        });
        $('.pay_fee').on('click', function(e) {
            $('.numbersOnly').prop('disabled', true);
        });
        $('.pay_type').on('click', function(e) {
            $('.numbersOnly').prop('disabled', false);
        });
    });
    var major = "";
    var shift = generation = "";
    $(function() {
//          $('input[name="major"]:checked').val();
//        $('input[name="major"]').click(function() {
//            major = this.value;
//        });
        $('input[name="shift"]').click(function() {
            shift = this.value;
            getClass();
        });
    });
    function getClass() {
        generation = $('.gen_selected option:selected').val();
        major = $('input[name="major"]').val();
//        alert("shift " + shift + " major: " +major + " gen: " + generation);return;
        var form_data = {
            reShift: shift,
            reGeneration: generation,
            reMajor: major
        };
        $.ajax({
            url: "<?php echo site_url(); ?>students/registrations/ajax_get_class",
            async: false,
            type: "POST",
            data: form_data,
            dataType: "html",
            success: function(data) {
                $('#classDisplay').html(data);
            }
        })

    }
    $('.colap').hide();
    $(function() {
        $('.click_colap').click(function() {
//            alert( $(this).children(".colap"));
            var colap = $(this).parent();
            colap.children(".panel-body").slideToggle();
        });
    });

</script>