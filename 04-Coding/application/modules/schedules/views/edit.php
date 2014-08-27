<?php
$data->result_array();
$data = $data->result_array[0];
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>classes/edit/<?php
echo $data['cla_id'];
echo '/' . $this->uri->segment(5); // segment(5) for pagination
?>">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>classes/index/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Update</button>
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
                        <h3 class="panel-title">Edit From</h3>
                    </div>
                    <div class="panel-body">
<!--                        <div class="form-group">
                            <label for="fac_id" class="col-sm-2 control-label">មហាវិទ្យាល័យ:</label>             
                            <div class="col-md-5">
                                <?php echo form_dropdown('fac_id', array('' => '--All Faculty--') + $faculty, set_value('fac_id', $this->session->userdata('fac_id')), 'class="form-control input-sm" required') ?>
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="cla_maj_id">សកលវិទ្យាល័យ:</label>
                            <div class="col-md-5">

                                <?php echo form_dropdown('cla_maj_id', array('' => '--All Major--') + $major, set_value('cla_maj_id', $this->session->userdata('cla_maj_id')), 'class="form-control input-sm" required') ?>
                            </div>

                        </div>
                        <div class="form-group">
                                <label class="col-sm-2 control-label" for="tbl_shift_shi_id">ម៉ោងសិក្សា:</label>
                                <div class="col-md-5">

                                    <?php echo form_dropdown('tbl_shift_shi_id', array('' => '--All Faculty--') + $shift, set_value('tbl_shift_shi_id', $this->session->userdata('tbl_shift_shi_id')), 'class="form-control input-sm" required') ?>
                                </div>
                            </div>
                        <div class="form-group">
                            <label for="cla_name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="sta_name" placeholder="Name in latin" name="cla_name" value="<?php echo set_value('cla_name', $data['cla_name']); ?>"  pattern=".{2,50}" required title="Allow enter from 2 to 50 characters">
                                <?php echo form_error('cla_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cla_capacity" class="col-sm-2 control-label">Capacity</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="cla_capacity" placeholder="Capacity" name="cla_capacity" value="<?php echo set_value('cla_capacity', $data['cla_capacity']); ?>"  pattern=".{0,3}" required title="Allow enter from 1 to 99 characters">
                                <?php echo form_error('cla_capacity'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="sta_status" class="col-sm-2 control-label">Enable</label>
                            <div class="col-sm-6">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="cla_status" id="sta_status" value="1" <?php echo set_checkbox('cla_status', 1, ($data['cla_status'] == 1) ? TRUE : FALSE); ?>> Check to enable this class</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>