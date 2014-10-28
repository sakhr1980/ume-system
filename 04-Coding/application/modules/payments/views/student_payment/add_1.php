<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>payments/student_payment/add">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>payments/student_payment/index/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Save</button>
            <button type="reset" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-ban-circle"></i> Reset</button>
        </div>
        <div class="right">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Student Payments Record</h3>
                    </div>
                    <div class="panel-body">
                        <!--                        <div class="form-group">
                                                    <label for="tbl_students_stu_id" class="col-sm-3 control-label">Student ID</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="tbl_students_stu_id" placeholder="Student ID" name="" value="<?php echo set_value('tbl_students_stu_id'); ?>"  pattern=".{1,50}"  title="Allow enter from 1 to 50 characters">
                        <?php echo form_error('tbl_students_stu_id'); ?>
                                                    </div>
                                                </div>-->
                        <div class="form-group">
                            <label for="sp_stucla_stu_id" class="col-sm-3 control-label">Student Name</label>
                            <div class="col-sm-9">
                                <select name="sp_stucla_stu_id" required class="form-control" id="tbl_subjects_sub_id">
                                    <option value="">-----Student Name------</option>
                                    <?php
                                    foreach ($students->result_array() as $row) {

                                        echo '<option value="' . $row['stu_id'] . '" >' . $row['stu_en_firstname'] . " " . $row['stu_en_lastname'] . '</option>';
                                    }
//                                    foreach ($students as $key => $value) {
//                                        echo '<option value="' . $key . '" ' . set_select('stu_id', $key) . '>' . $value . '</option>';
//                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sp_stucla_cla_id" class="col-sm-3 control-label">Class</label>
                            <div class="col-sm-9">
                                <select name="sp_stucla_cla_id" required class="form-control" id="sp_stucla_cla_id">
                                    <option value="" >-----Class Name------</option>
                                    <?php
                                    foreach ($classes->result_array() as $row) {
                                        echo '<option value="' . $row['cla_id'] . '" >' . $row['cla_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sp_degree" required  class="col-sm-3 control-label">Degree</label>
                            <div class="col-sm-9">
                                <?php echo form_dropdown('degree', array('' => '-- All Degree --', '1' => 'AD', '2' => 'BB', '3' => 'MS'), "", 'class="form-control input-sm"') ?>
                                <?php echo form_error('sp_year'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sp_year" required  class="col-sm-3 control-label">Year</label>
                            <div class="col-sm-9">
                                <?php echo form_dropdown('sp_year', array('' => '-- All Year --', '1' => 'I', '2' => 'II', '3' => 'III', '4' => 'IV'), set_value('stucla_year_study', $this->session->userdata('stucla_year_study')), 'class="form-control input-sm"') ?>
                                <?php echo form_error('sp_year'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sp_amounce" class="col-sm-3 control-label">Amounce</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="sp_amounce" placeholder="Amounce ($)" name="sp_amounce" value="<?php echo set_value('sp_amounce'); ?>" required>
                                <?php echo form_error('sp_amounce'); ?>
                            </div>
                        </div>
                        <!--                        <div class="form-group">
                                                    <label for="sp_date_pay" class="col-sm-3 control-label">Date Pay</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group date" data-datepicker="true">
                                                            <input type="text" class="form-control" id="sp_date_pay" placeholder="yyyy-mm-dd" name="sp_date_pay" value="<?php echo set_value('sp_date_pay'); ?>" pattern=".{9,50}" title="Allow enter from 9 to 50 characters" required>
                                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                        <?php echo form_error('sp_date_pay'); ?>
                                                        </div>
                                                    </div>
                                                </div>-->
                        <div class="form-group">
                            <label for="spd_comment" class="col-sm-3 control-label">Comment</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="spd_comment" placeholder="Comment" name="spd_comment" ><?php echo set_value('spd_comment'); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sp_status" class="col-sm-3 control-label">Enable</label>
                            <div class="col-sm-9">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="sp_status" id="sp_status" value="1" <?php echo set_checkbox('sp_status', 1, TRUE); ?>> Check to enable this payments</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>