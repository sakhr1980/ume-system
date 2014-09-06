<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>users/accounts/add">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>users/accounts/index/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Save</button>
            <button type="reset" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-ban-circle"></i> Reset</button>
        </div>
        <div class="right">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
    <div class="content">

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">User account</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="use_name" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="use_name" placeholder="Username" name="use_name" value="<?php echo set_value('use_name'); ?>"  pattern=".{3,50}"  title="Allow enter from 3 to 50 characters">
                                <?php echo form_error('use_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="use_email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="use_email" placeholder="Email" name="use_email" value="<?php echo set_value('use_email'); ?>"  pattern=".{6,50}" required title="Allow enter from 6 to 50 characters">
                                <?php echo form_error('use_email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
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
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="use_status" class="col-sm-2 control-label">Enable</label>
                            <div class="col-sm-10">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="use_status" id="use_status" value="1" <?php echo set_checkbox('use_status', 1, TRUE); ?>> Check to enable this user account</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Select user groups (optional)</h3>
                    </div>
                    <div class="panel-body">
                        <?php foreach ($groups as $key=>$value) { ?>
                        <div class="checkbox">
                            <label><input type="checkbox" name="groups[]" value="<?php echo $key; ?>" <?php echo set_checkbox('groups[]', $key, FALSE); ?>><?php echo $value; ?></label>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>