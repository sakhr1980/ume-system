<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>users/functions/add/<?php echo $this->uri->segment(4); ?>">
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
                    <label for="tas_name" class="col-sm-2 control-label">Task Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tas_name" placeholder="Task Name" name="tas_name" value="<?php echo set_value('tas_name'); ?>"  pattern=".{2,50}" required title="Allow enter from 2 to 50 characters">
                        <?php echo form_error('tas_name'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tas_functionname" class="col-sm-2 control-label">Function name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tas_functionname" placeholder="Enter function name" name="tas_functionname" value="<?php echo set_value('tas_functionname'); ?>"  pattern=".{2,50}" required title="Allow enter from 2 to 50 characters">
                        <?php echo form_error('tas_functionname'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Modules</label>
                    <div class="col-sm-10">
                        <?php echo form_dropdown('tas_moduleid',array(''=>'--Select--')+$modules,set_value('tas_moduleid'),"class='form-control'"); ?>
                        <?php echo form_error('tas_moduleid'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Controller</label>
                    <div class="col-sm-10">
                        <?php echo form_dropdown('tas_controllerid',array(''=>'--Select--')+$controllers,set_value('tas_controllerid'),"class='form-control'"); ?>
                        <?php echo form_error('tas_controllerid'); ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="tas_status" class="col-sm-2 control-label">Enable</label>
                    <div class="col-sm-10">
                        <div class="checkbox">
                            <label><input type="checkbox" name="tas_status" id="tas_status" value="1" <?php echo set_checkbox('tas_status', 1, TRUE); ?>> Check to enable this task</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tas_description" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" name="tas_description" id="tas_description"><?php echo set_value('tas_description'); ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(function(){
        $('[name="tas_moduleid"]').change(function(){
            var mod_id = $('[name="tas_moduleid"]').val();
            var con_id = $('[name="tas_controllerid"]');
            con_id.prop('disabled', true);
            $.ajax({
                url:"<?php echo base_url(); ?>users/controllers/ajaxGetControllerByModuleIdForDropdown",
                data:{mod_id:mod_id},
                dataType:'html',
                type:'POST'
                
            }).done(function(data){
                $('[name="tas_controllerid"]').html(data);
                con_id.prop('disabled', false);
            });
        });
    });
</script>