<?php
$data->result_array();
$data = $data->result_array[0];
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>payments/student_payment/add">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>payments/student_payment/index" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
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
                        <div class="form-group">
                            <label for="stu_name" class="col-sm-3 control-label">Student Name</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="spd_sp_id" value="<?php echo $data['sp_id']; ?>" />
                                <input type="text" disabled="disabled" class="form-control" id="stu_name" placeholder="" name="" value="<?php echo $data['stu_en_firstname'] . " " . $data['stu_en_lastname']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cla_name" class="col-sm-3 control-label">Class</label>
                            <div class="col-sm-9">
                                <input type="text"  disabled="disabled"  class="form-control" id="cla_name" placeholder="" name="cla_name" value="<?php echo $data['cla_name']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cla_degree" required  class="col-sm-3 control-label">Degree</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="cla_degree"  disabled="disabled"  placeholder="" name="cla_degree" value="<?php echo $data['cla_degree']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sp_year" required  class="col-sm-3 control-label">Year</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="sp_year"  disabled="disabled"  placeholder="" name="sp_year" value="<?php echo $data['sp_year']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="spd_amount" class="col-sm-3 control-label">Amounce</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="sp_amounce" placeholder="Amounce ($)" name="spd_amount" value="<?php echo set_value('spd_amount'); ?>" required>
                                <?php echo form_error('sp_amounce'); ?>
                            </div>
                </div>
            </div>
            <div class="form-group">
                <label for="spd_comment" class="col-sm-3 control-label">Comment</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="spd_comment" placeholder="Comment" name="spd_comment" ><?php echo set_value('spd_comment'); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="spd_status" class="col-sm-3 control-label">Enable</label>
                <div class="col-sm-9">
                    <div class="checkbox">
                        <label><input type="checkbox" name="spd_status" id="spd_status" value="1" <?php echo set_checkbox('spd_status', 1, TRUE); ?>> Check to enable this payments</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>