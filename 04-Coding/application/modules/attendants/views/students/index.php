<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>attendants/students/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        <!--<a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>-->
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="filter">
        <form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>users/accounts/index">
            <div class="form-group">
                <label class="sr-only" for="class">Class</label>
                <?php echo form_dropdown('class', array(''=>'--Class--'), set_value('class', ''), 'class="form-control input-sm"') ?>
            </div>
            <div class="form-group">
                <label class="sr-only" for="year">Year</label>
                <?php echo form_dropdown('year', array(''=>'--Year--'), set_value('year', ''), 'class="form-control input-sm"') ?>
            </div>
            <div class="form-group">
                <label class="sr-only" for="semester">Semester</label>
                <?php echo form_dropdown('semester', array(''=>'--Semester --'), set_value('semester', ''), 'class="form-control input-sm"') ?>
            </div>
            <div class="form-group">
                <label class="sr-only" for="academic_year">Academic Year</label>
                <?php echo form_dropdown('academic_year', array(''=>'--Academic Year--'), set_value('academic_year', ''), 'class="form-control input-sm"') ?>
            </div>
            <button type="button" class="btn btn-<?php echo PRIMARY; ?> btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
        </form>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Student Attendant List</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <tr>
                    <!--<th><input type="checkbox" class="checkall" /></th>-->
                    <th>Class</th>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Academic year</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>users/accounts/view/" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                        <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>users/accounts/edit/" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>users/accounts/delete/" title="Delete" onclick="return confirm('Are you sure you want to delete this user account? This user account will be deleted permanently.');"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php //echo $this->pagination->create_links(); ?>
</div>

