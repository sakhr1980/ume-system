<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>users/module/add">
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
                    <label for="mod_name" class="col-sm-2 control-label">Module Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mod_name" placeholder="Module Name" name="mod_name" value="<?php echo set_value('mod_name'); ?>"  pattern=".{2,50}" required title="Allow enter from 2 to 50 characters">
                        <?php echo form_error('mod_name'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mod_foldername" class="col-sm-2 control-label">Folder name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mod_foldername" placeholder="Enter folder name of module" name="mod_foldername" value="<?php echo set_value('mod_foldername'); ?>"  pattern=".{2,50}" required title="Allow enter from 2 to 50 characters">
                        <?php echo form_error('mod_foldername'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mod_status" class="col-sm-2 control-label">Enable</label>
                    <div class="col-sm-10">
                        <div class="checkbox">
                            <label><input type="checkbox" name="mod_status" id="mod_status" value="1" <?php echo set_checkbox('mod_status', 1, TRUE); ?>> Check to enable this group</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mod_description" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" name="mod_description" id="mod_description"><?php echo set_value('mod_description'); ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>