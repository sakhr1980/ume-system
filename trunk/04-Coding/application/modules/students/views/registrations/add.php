<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>students/registrations/add">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>students/registrations/index/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-<?php echo DEFAULTS; ?>"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-sm btn-<?php echo WARNING; ?>"><i class="glyphicon glyphicon-ok-circle"></i> Save</button>
            <button type="reset" class="btn btn-sm btn-<?php echo DEFAULTS; ?>"><i class="glyphicon glyphicon-ban-circle"></i> Reset</button>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stu_kh_lastname" class="col-sm-2 control-label">គោត្តនាម</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control input-sm" id="gro_name" placeholder="គោត្តនាម" name="stu_kh_lastname" value="<?php echo set_value('stu_kh_lastname'); ?>"  pattern=".{2,50}" required title="Allow enter from 2 to 50 characters">
                                <?php echo form_error('stu_kh_lastname'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stu_en_lastname" class="col-sm-2 control-label">Surname</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control input-sm" id="gro_name" placeholder="Surname" name="stu_en_lastname" value="<?php echo set_value('stu_en_lastname'); ?>"  pattern=".{2,50}" required title="Allow enter from 2 to 50 characters">
                                <?php echo form_error('stu_en_lastname'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stu_kh_firstname" class="col-sm-2 control-label">នាម</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control input-sm" id="gro_name" placeholder="នាម" name="stu_kh_firstname" value="<?php echo set_value('stu_kh_firstname'); ?>"  pattern=".{2,50}" required title="Allow enter from 2 to 50 characters">
                                <?php echo form_error('stu_kh_firstname'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stu_en_firstname" class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control input-sm" id="gro_name" placeholder="First Name" name="stu_en_firstname" value="<?php echo set_value('stu_en_firstname'); ?>"  pattern=".{2,50}" required title="Allow enter from 2 to 50 characters">
                                <?php echo form_error('stu_en_firstname'); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <label><input type="radio" name="job" id="gro_status" value="1" <?php echo set_radio('job', 1, FALSE); ?>> មានការងារធ្វើ</label>&nbsp;&nbsp;
        <label><input type="radio" name="job" id="gro_status" value="2" <?php echo set_radio('job', 2, FALSE); ?>> ជានិស្សិត</label>



        <div class="panel panel-<?php echo DEFAULTS; ?>">
            <div class="panel-heading">
                <h3 class="panel-title">I. កមរិតសញ្ញាប័ត្រ និងជំនាញ PROGRAM OF STUDY AND MAJOR</h3>
            </div>
            <div class="panel-body">
                <label><input type="radio" name="degree" value="1" <?php echo set_radio('degree', 1, FALSE); ?>> បរិញ្ញបត្រជាន់ខ្ពស់ Master Degree Program</label>&nbsp;&nbsp;
                <label><input type="radio" name="degree" value="2" <?php echo set_radio('degree', 2, FALSE); ?>> បរិញ្ញាបត្រ Bachelor Degree Program</label>
                <label><input type="radio" name="degree" value="3" <?php echo set_radio('degree', 3, FALSE); ?>> បរិញ្ញាបត្ររង Association Degree Program</label>
                <div class="divider"></div>

                <div class="row">
                    <div class="col-md-12"><label>តើអ្នកជ្រើសរើសជំនាញមួយនា? For which graduate program are you applying?</label></div>
                    <?php foreach ($master->result_array() as $row) { ?>
                        <div class="col-md-6">
                            <label><input type="radio" name="major" id="gro_status" value="<?php echo $row['mar_id']; ?>" <?php echo set_radio('major', $row['mar_id'], FALSE); ?>> <?php echo $row['mar_name']; ?></label>
                        </div>
                    <?php } ?>
                </div>

                <div class="row">
                    <div class="col-md-12"><strong>តើមហាវិទ្យល័យ និង ឯកទេសមួយណា ដែលអ្នកចង់ជ្រើសរើស?</strong></div>
                    <div class="col-md-12">

                        <div class="panel panel-<?php echo DEFAULTS; ?>">
                            <div class="panel-heading">
                                <h3 class="panel-title">១-ម. ក្រប់ក្រងពាណិជ្ជកម្ម និង ទេសចរណ៍</h3>
                            </div>
                            <div class="panel-body">
                                <?php foreach ($bachelor_economic->result_array() as $row) { ?>
                                    <div class="col-md-4">
                                        <label><input type="radio" name="major" id="gro_status" value="<?php echo $row['mar_id']; ?>" <?php echo set_radio('major', $row['mar_id'], FALSE); ?>> <?php echo $row['mar_name']; ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="panel panel-<?php echo DEFAULTS; ?>">
                            <div class="panel-heading">
                                <h3 class="panel-title">២-ម. សិល្បៈមនុស្សសាស្ត្រ និង ភារាបរទេស</h3>
                            </div>
                            <div class="panel-body">
                                <?php foreach ($bachelor_art->result_array() as $row) { ?>
                                    <div class="col-md-4">
                                        <label><input type="radio" name="major" id="gro_status" value="<?php echo $row['mar_id']; ?>" <?php echo set_radio('major', $row['mar_id'], FALSE); ?>> <?php echo $row['mar_name']; ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="panel panel-<?php echo DEFAULTS; ?>">
                            <div class="panel-heading">
                                <h3 class="panel-title">៣-ម. និតិសសាស្ត្រ និង សេដ្ឋកិច្ខ</h3>
                            </div>
                            <div class="panel-body">
                                <?php foreach ($bachelor_law->result_array() as $row) { ?>
                                    <div class="col-md-4">
                                        <label><input type="radio" name="major" id="gro_status" value="<?php echo $row['mar_id']; ?>" <?php echo set_radio('major', $row['mar_id'], FALSE); ?>> <?php echo $row['mar_name']; ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="panel panel-<?php echo DEFAULTS; ?>">
                            <div class="panel-heading">
                                <h3 class="panel-title">៤-ម. វិទ្យាសាស្ត្រ និង បច្ចេកវិទ្យា</h3>
                            </div>
                            <div class="panel-body">
                                <?php foreach ($bachelor_it->result_array() as $row) { ?>
                                    <div class="col-md-4">
                                        <label><input type="radio" name="major" id="gro_status" value="<?php echo $row['mar_id']; ?>" <?php echo set_radio('major', $row['mar_id'], FALSE); ?>> <?php echo $row['mar_name']; ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="panel panel-<?php echo DEFAULTS; ?>">
                            <div class="panel-heading">
                                <h3 class="panel-title">៥-ម. កសិកម្ម និង អភិវឌ្ឃន៍ជនបទ</h3>
                            </div>
                            <div class="panel-body">
                                <?php foreach ($bachelor_agriculture->result_array() as $row) { ?>
                                    <div class="col-md-4">
                                        <label><input type="radio" name="major" id="gro_status" value="<?php echo $row['mar_id']; ?>" <?php echo set_radio('major', $row['mar_id'], FALSE); ?>> <?php echo $row['mar_name']; ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>


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
                        <input type="text" class="form-control input-sm" id="stu_dob" placeholder="" name="stu_dob" value="<?php echo set_value('stu_dob'); ?>" />
                        <?php echo form_error('stu_dob'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_pob" class="col-sm-12">ទីកន្លែងកំណើត PLACE OF BIRTH</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_dob" placeholder="" name="stu_pob" value="<?php echo set_value('stu_pob'); ?>" />
                        <?php echo form_error('stu_pob'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_nationality" class="col-sm-12">NATIONALITY</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_nationality" placeholder="" name="stu_nationality" value="<?php echo set_value('stu_nationality'); ?>" />
                        <?php echo form_error('stu_nationality'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_gender" class="col-sm-12">GENDER</label>
                    <div class="col-sm-12">
                        <label><input type="radio" name="stu_gender" value="Male" <?php echo set_radio('stu_gender', 'Male', FALSE); ?> /> Male</label>
                        <label><input type="radio" name="stu_gender" value="Female" <?php echo set_radio('stu_gender', 'Female', FALSE); ?> /> Female</label>
                        <label><input type="radio" name="stu_gender" value="Others" <?php echo set_radio('stu_gender', 'Other', FALSE); ?> /> Others</label>
                        <?php echo form_error('stu_gender'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_marital_status" class="col-sm-12">MARITAL STATUS</label>
                    <div class="col-sm-12">
                        <label><input type="radio" name="stu_marital_status" value="Single" <?php echo set_radio('stu_marital_status', 'Single', FALSE); ?> /> Single</label>
                        <label><input type="radio" name="stu_marital_status" value="Married" <?php echo set_radio('stu_marital_status', 'Married', FALSE); ?> /> Married</label>
                        <label><input type="radio" name="stu_marital_status" value="Others" <?php echo set_radio('stu_marital_status', 'Other', FALSE); ?> /> Others</label>
                        <?php echo form_error('stu_gender'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_tel" class="col-sm-12">PHONE NUMBER</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_tel" placeholder="" name="stu_tel" value="<?php echo set_value('stu_tel'); ?>" />
                        <?php echo form_error('stu_tel'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_email" class="col-sm-12">EMAIL</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_email" placeholder="" name="stu_email" value="<?php echo set_value('stu_email'); ?>" />
                        <?php echo form_error('stu_email'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_fax" class="col-sm-12">FAX</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_fax" placeholder="" name="stu_fax" value="<?php echo set_value('stu_fax'); ?>" />
                        <?php echo form_error('stu_fax'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_current_address" class="col-sm-12">CURRENT ADDRESS</label>
                    <div class="col-sm-12">
                        <textarea class="form-control input-sm" id="stu_current_address" placeholder="Current Address" name="stu_current_address" value=""><?php echo set_value('stu_fax'); ?></textarea>
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
                        <input type="text" class="form-control input-sm" id="stu_father_name" placeholder="" name="stu_father_name" value="<?php echo set_value('stu_father_name'); ?>" />
                        <?php echo form_error('stu_father_name'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="stu_father_occupation" class="col-sm-12">Occupation</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_father_occupation" placeholder="" name="stu_father_occupation" value="<?php echo set_value('stu_father_occupation'); ?>" />
                        <?php echo form_error('stu_father_occupation'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="stu_mother_name" class="col-sm-12">Mother's Name</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_mother_name" placeholder="" name="stu_mother_name" value="<?php echo set_value('stu_mother_name'); ?>" />
                        <?php echo form_error('stu_mother_name'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="stu_mother_occupation" class="col-sm-12">Occupation</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_mother_occupation" placeholder="" name="stu_mother_occupation" value="<?php echo set_value('stu_mother_occupation'); ?>" />
                        <?php echo form_error('stu_mother_occupation'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="stu_mother_tel" class="col-sm-12">Telephone</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_mother_tel" placeholder="" name="stu_mother_tel" value="<?php echo set_value('stu_mother_tel'); ?>" />
                        <?php echo form_error('stu_mother_tel'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="stu_mother_email" class="col-sm-12">E-Mail</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_mother_email" placeholder="" name="stu_mother_email" value="<?php echo set_value('stu_mother_email'); ?>" />
                        <?php echo form_error('stu_mother_email'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="stu_mother_faxl" class="col-sm-12">Fax</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_mother_faxl" placeholder="" name="stu_mother_faxl" value="<?php echo set_value('stu_mother_faxl'); ?>" />
                        <?php echo form_error('stu_mother_faxl'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_father_current_address" class="col-sm-12">CURRENT ADDRESS</label>
                    <div class="col-sm-12">
                        <textarea class="form-control input-sm" id="stu_father_current_address" placeholder="Current Address" name="stu_father_current_address" value=""><?php echo set_value('stu_father_current_address'); ?></textarea>
                        <?php echo form_error('stu_father_current_address'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-<?php echo DEFAULTS; ?>">
            <div class="panel-heading">
                <h3 class="panel-title">IV. RECORD OF SECONDARY/HIGH SCHOOL/TERTIARY STUDIES</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <label for="stu_highschool_name" class="col-sm-12">Name of School/Institution/University</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_father_name" placeholder="" name="stu_highschool_name" value="<?php echo set_value('stu_highschool_name'); ?>" />
                        <?php echo form_error('stu_highschool_name'); ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="stu_highschool_year" class="col-sm-12">Year</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_highschool_year" placeholder="" name="stu_highschool_year" value="<?php echo set_value('stu_highschool_year'); ?>" />
                        <?php echo form_error('stu_highschool_year'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_highschool_degree" class="col-sm-12">Degree</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_highschool_degree" placeholder="" name="stu_highschool_degree" value="<?php echo set_value('stu_highschool_degree'); ?>" />
                        <?php echo form_error('stu_highschool_degree'); ?>
                    </div>
                </div>
                <div class="col-md-12">&nbsp;<div class="divider"></div></div>
                <div class="col-md-12"><label class="col-sm-12">បានប្រឡងមធ្យមសិក្សាទុតិយភូមិ</label></div>
                <div class="col-md-4">
                    <label for="stu_highschool_bacii_province" class="col-sm-12">ខេត្តប្រឡង</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_highschool_bacii_province" placeholder="" name="stu_highschool_bacii_province" value="<?php echo set_value('stu_highschool_bacii_province'); ?>" />
                        <?php echo form_error('stu_highschool_bacii_province'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_highschool_bacii_office" class="col-sm-12">មណ្ខលប្រឡង</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_highschool_bacii_office" placeholder="" name="stu_highschool_bacii_office" value="<?php echo set_value('stu_highschool_bacii_office'); ?>" />
                        <?php echo form_error('stu_highschool_bacii_office'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_highschool_bacii_date" class="col-sm-12">កាលបរិច្ឆេទប្រឡង</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_highschool_bacii_date" placeholder="" name="stu_highschool_bacii_date" value="<?php echo set_value('stu_highschool_bacii_date'); ?>" />
                        <?php echo form_error('stu_highschool_bacii_date'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_highschool_bacii_room" class="col-sm-12">បន្តប់ប្រលង</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_highschool_bacii_room" placeholder="" name="stu_highschool_bacii_room" value="<?php echo set_value('stu_highschool_bacii_room'); ?>" />
                        <?php echo form_error('stu_highschool_bacii_room'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="stu_highschool_bacii_table" class="col-sm-12">លេខតុ</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="stu_highschool_bacii_table" placeholder="" name="stu_highschool_bacii_table" value="<?php echo set_value('stu_highschool_bacii_table'); ?>" />
                        <?php echo form_error('stu_highschool_bacii_table'); ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="panel panel-<?php echo DEFAULTS; ?>">
            <div class="panel-heading">
                <h3 class="panel-title">V. RELEVANT EMPLOYMENT EXPERIENCE</h3>
            </div>
            <div class="panel-body">

                <div class="col-md-4">
                    <label for="exp_date1" class="col-sm-12">Date of Employment From-To</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="exp_date1" placeholder="" name="exp_date[]" value="<?php echo set_value('exp_date[]'); ?>" />
                        <?php echo form_error('exp_date[]'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="exp_shift1" class="col-sm-12">SHIFT</label>
                    <div class="col-sm-12">
                        <label><input type="radio" name="exp_shift1[]" value="Full Time" <?php echo set_radio('exp_shift1[]', 'Full Time', FALSE); ?>> ពេញម៉ោង Full Time</label>
                        <label><input type="radio" name="exp_shift1[]" value="Parth Time" <?php echo set_radio('majexp_shift1[]', 'Part Time', FALSE); ?>> ពេញម៉ោង Full Time</label>
                        <?php echo form_error('exp_date'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="exp_position1" class="col-sm-12">Position</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="exp_position1" placeholder="" name="exp_position[]" value="<?php echo set_value('exp_position[]'); ?>" />
                        <?php echo form_error('exp_position[]'); ?>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="exp_employer_tel1" class="col-sm-12">Employer Telephone No</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="exp_employer_tel1" placeholder="" name="exp_employer_tel[]" value="<?php echo set_value('exp_employer_tel[]'); ?>" />
                        <?php echo form_error('exp_employer_tel[]'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="exp_responsibility1" class="col-sm-12">CURRENT ADDRESS</label>
                    <div class="col-sm-12">
                        <textarea class="form-control input-sm" id="exp_responsibility1" placeholder="Current Address" name="exp_responsibility[]" value=""><?php echo set_value('exp_responsibility[]'); ?></textarea>
                        <?php echo form_error('exp_responsibility[]'); ?>
                    </div>
                </div>

                <div class="col-md-12">&nbsp;<div class="divider"></div></div>

                <div class="col-md-4">
                    <label for="exp_date2" class="col-sm-12">Date of Employment From-To</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="exp_date2" placeholder="" name="exp_date[]" value="<?php echo set_value('exp_date[]'); ?>" />
                        <?php echo form_error('exp_date[]'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="exp_shift2" class="col-sm-12">SHIFT</label>
                    <div class="col-sm-12">
                        <label><input type="radio" name="exp_shift2[]" id="exp_shift" value="Full Time" <?php echo set_radio('exp_shift2[]', 'Full Time', FALSE); ?>> ពេញម៉ោង Full Time</label>
                        <label><input type="radio" name="exp_shift2[]" id="exp_shift" value="Parth Time" <?php echo set_radio('exp_shift2[]', 'Part Time', FALSE); ?>> ពេញម៉ោង Full Time</label>
                        <?php echo form_error('exp_shift[]'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="exp_position2" class="col-sm-12">Position</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="exp_position2" placeholder="" name="exp_position[]" value="<?php echo set_value('exp_position[]'); ?>" />
                        <?php echo form_error('exp_position[]'); ?>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="exp_employer_tel2" class="col-sm-12">Employer Telephone No</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm" id="exp_employer_tel2" placeholder="" name="exp_employer_tel[]" value="<?php echo set_value('exp_employer_tel[]'); ?>" />
                        <?php echo form_error('exp_employer_tel[]'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="exp_responsibility2" class="col-sm-12">CURRENT ADDRESS</label>
                    <div class="col-sm-12">
                        <textarea class="form-control input-sm" id="exp_responsibility2" placeholder="Current Address" name="exp_responsibility[]" value=""><?php echo set_value('exp_responsibility[]'); ?></textarea>
                        <?php echo form_error('exp_responsibility[]'); ?>
                    </div>
                </div>

                <div class="col-md-12">&nbsp;<div class="divider"></div></div>

            </div>
        </div>

        <div class="panel panel-<?php echo DEFAULTS; ?>">
            <div class="panel-heading">
                <h3 class="panel-title">ម៉ោងសិក្សា Study Time (Only for Bachelor and Association Degree</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-3">
                    <label><input type="radio" name="shift" id="shift" value="Mornong" <?php echo set_radio('shift', 'Morning', FALSE); ?>> MORNING</label>
                </div>
                <div class="col-md-3">
                    <label><input type="radio" name="shift" id="shift" value="Afternoon" <?php echo set_radio('shift', 'Afternoon', FALSE); ?>> AFTERNOON</label>
                </div>
                <div class="col-md-3">
                    <label><input type="radio" name="shift" id="shift" value="Evening" <?php echo set_radio('shift', 'Evening', FALSE); ?>> EVENING</label>
                </div>
                <div class="col-md-3">
                    <label><input type="radio" name="shift" id="shift" value="Weeken" <?php echo set_radio('shift', 'Weeken', FALSE); ?>> WEEKEN</label>
                </div>
            </div>
        </div>



    </div>
</form>