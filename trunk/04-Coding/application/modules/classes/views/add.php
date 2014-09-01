<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>classes/add">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>classes/index/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> ត្រលប់ក្រោយ</a>
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
                        <h3 class="panel-title">គ្រ​ប់គ្រង់ថ្នាក់</h3>
                    </div>
                    <div class="panel-body">
                                              
                        <div class="form-group">
                                     <label for="tbl_generation_gen_id" class="col-sm-3 control-label">ជំនាន់ / Generation:</label>             
                            <div class="col-md-5">
                                <?php echo form_dropdown('tbl_generation_gen_id', array('' => '--All Generation--') + $generation, set_value('tbl_generation_gen_id', $this->session->userdata('tbl_generation_gen_id')), 'class="form-control input-sm" required') ?>
                            </div>
                        </div>
                        
<!--
                        <div class="form-group">
                                     <label for="fac_id" class="col-sm-3 control-label">មហាវិទ្យាល័យ:</label>             
                            <div class="col-md-5">
                                <?php // echo form_dropdown('fac_id', array('' => '--All Faculty--') + $faculty, set_value('fac_id', $this->session->userdata('fac_id')), 'class="form-control input-sm" required') ?>
                            </div>
                        </div>-->
                        
                          <div class="form-group">
                             <label class="col-sm-3 control-label" for="cla_maj_id">សកលវិទ្យាល័យ / Major::</label>
                            <div class="col-md-5">
                               
                                <?php echo form_dropdown('cla_maj_id', array('' => '--All Major--') + $major, set_value('cla_maj_id', $this->session->userdata('cla_maj_id')), 'class="form-control input-sm" required') ?>
                            </div>
                              
                              </div>
                        
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="tbl_shift_shi_id">ម៉ោងសិក្សា / Shift:</label>
                                <div class="col-md-5">

                                    <?php echo form_dropdown('tbl_shift_shi_id', array('' => '--All Faculty--') + $shift, set_value('tbl_shift_shi_id', $this->session->userdata('tbl_shift_shi_id')), 'class="form-control input-sm" required') ?>
                                </div>
                            </div>
                        
                        
                        <div class="form-group">
                            <label for="cla_name" class="col-sm-3 control-label">ឈ្មោះថ្នាក់ / Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="class_name" placeholder="Classname" name="cla_name" value="<?php echo set_value('cla_name'); ?>"  pattern=".{3,50}"  title="Allow enter from 3 to 50 characters">
                                <?php echo form_error('cla_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cla_capacity" class="col-sm-3 control-label">ចំនួនសិស្សច្រើនបំផុត /Capacity</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="use_email" placeholder="cla_capacity" name="cla_capacity" value="<?php echo set_value('cla_capacity'); ?>" >
                                <?php echo form_error('cla_capacity'); ?>
                            </div>
                        </div>
                        <!--                        <div class="form-group">
                                                    <label for="use_pass" class="col-sm-2 control-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" id="use_pass" placeholder="Password" name="use_pass" value="<?php echo set_value('use_pass'); ?>"  pattern=".{6,50}" required title="Allow enter from 6 to 50 characters">
                        <?php echo form_error('use_pass'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="use_passc" class="col-sm-2 control-label">Confirm Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" id="use_passc" placeholder="Password" name="use_passc" value="<?php echo set_value('use_passc'); ?>"  pattern=".{6,50}" required title="Allow enter from 6 to 50 characters">
                        <?php echo form_error('use_passc'); ?>
                                                    </div>-->
                    </div>
                    <div class="form-group">
                        <label for="use_status" class="col-sm-3 control-label">ស្ថានភាព</label>
                        <div class="col-sm-9">
                            <div class="checkbox">
                                <label><input type="checkbox" name="cla_status" id="use_status" value="1" <?php echo set_checkbox('cla_status', 1, TRUE); ?>> ដាក់អោយដំណើរការថ្នាក់នេះ</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>