<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>users/controllers/add">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>users/functions/index/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-<?php echo DEFAULTS; ?>"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-sm btn-<?php echo WARNING; ?>"><i class="glyphicon glyphicon-ok-circle"></i> Save</button>
            <button type="reset" class="btn btn-sm btn-<?php echo DEFAULTS; ?>"><i class="glyphicon glyphicon-ban-circle"></i> Reset</button>
        </div>
        <div class="right">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
    <div class="content">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Form Create</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="con_name" class="col-sm-2 control-label">Controller Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="con_name" placeholder="Controller Name" name="con_name" value="<?php echo set_value('con_name'); ?>"  pattern=".{2,50}" required title="Allow enter from 2 to 50 characters">
                        <?php echo form_error('con_name'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="con_controllername" class="col-sm-2 control-label">Class name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="con_controllername" placeholder="Enter controller name" name="con_controllername" value="<?php echo set_value('con_controllername'); ?>"  pattern=".{2,50}" required title="Allow enter from 2 to 50 characters">
                        <?php echo form_error('con_controllername'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Modules</label>
                    <div class="col-sm-10">
                        <?php echo form_dropdown('con_moduleid',array(''=>'--Select--')+$modules,set_value('con_moduleid'),"class='form-control'"); ?>
                        <?php echo form_error('con_moduleid'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="con_description" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" name="con_description" id="con_description"><?php echo set_value('con_description'); ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>