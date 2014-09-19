<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>users/module/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create Module</a>
        <a href="<?php echo site_url(); ?>users/controllers/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create Controller</a>
        <a href="<?php echo site_url(); ?>users/functions/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create Function</a>
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="filter">
        <form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>users/functions/index">
            <div class="form-group">
                <label class="sr-only" for="tas_functionname">Function</label>
                <input type="text" class="form-control input-sm" id="tas_functionname" name="tas_functionname" value="<?php echo set_value('tas_functionname',($this->session->userdata('tas_functionname')!='')?$this->session->userdata('tas_functionname'):''); ?>" placeholder="Function name">
            </div>
            <div class="form-group">
                <label class="sr-only" for="mod_id">Module</label>
                <?php echo form_dropdown('mod_id', array(''=>'--All Module--')+$modules, set_value('mod_id', ($this->session->userdata('mod_id'))?$this->session->userdata('mod_id'):''), 'class="form-control input-sm"') ?>
            </div>
            <div class="form-group">
                <label class="sr-only" for="con_id">Controller</label>
                <?php echo form_dropdown('con_id', array(''=>'--All Controller--')+$controllers, set_value('con_id', ($this->session->userdata('con_id'))?$this->session->userdata('con_id'):''), 'class="form-control input-sm"') ?>
            </div>
            
            <div class="form-group">
                <label class="sr-only" for="tas_status">Status</label>
                <?php echo form_dropdown('tas_status', array(''=>'-- All Status --','1'=>'Enabled', '0'=>'Desabled'), set_value('tas_status', ($this->session->userdata('tas_status')!='')?$this->session->userdata('tas_status'):''), 'class="form-control input-sm"') ?>
            </div>
            <button type="submit" class="btn btn-<?php echo PRIMARY; ?> btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
        </form>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">User Account List</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <tr>
                    <th>Module</th>
                    <th>Controller</th>
                    <th>Function</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Modified</th>
                </tr>
                <?php if ($data->num_rows() > 0) { ?>
                    <?php foreach ($data->result_array() as $row) { ?>

                        <tr>
                            <td>
                                <?php echo $row['mod_foldername']; ?>
                                [<a href="<?php echo base_url(); ?>users/module/edit/<?php echo $row['mod_id']; echo '/'.$this->uri->segment(4); ?>">Edit</a>]
                            </td>
                            <td>
                                <?php echo $row['con_controllername']; ?>
                                [<a href="<?php echo base_url(); ?>users/controllers/edit/<?php echo $row['con_id']; echo '/'.$this->uri->segment(4); ?>">Edit</a>]
                            </td>
                            <td><?php echo $row['tas_functionname']; ?></td>
                            <td><?php echo status_string($row['tas_status']); ?></td>
                            <td><?php echo get_date_string($row['tas_created']); ?></td>
                            <td><?php echo get_date_string($row['tas_modified']); ?></td>
                        </tr>

                    <?php } ?>
            <?php } else { ?>
                    <tr><td colspan="6">Empty</td></tr>
        <?php } ?>
            </table>
        </div>
    </div>
    <?php echo $this->pagination->create_links(); ?>
</div>

