<form role="form" method="post" action="<?php echo site_url(); ?>attendants/students/add">
<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>attendants/students/index/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
        <button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Save</button>
        <button type="reset" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-ban-circle"></i> Reset</button>
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="filter form-inline">
        <div class="form-group">
            <label class="sr-only" for="class">Class</label>
            <?php echo form_dropdown('class', array('' => '--Class--')+$classes, set_value('class', ''), 'class="form-control input-sm"') ?>
        </div>
        <div class="form-group">
            <label class="sr-only" for="year">Year</label>
            <?php echo form_dropdown('year', array('' => '--Year--',1=>1,2=>2,3=>3,4=>4,5=>5,6=>6), set_value('year', ''), 'class="form-control input-sm"') ?>
        </div>
        <div class="form-group">
            <label class="sr-only" for="semester">Semester</label>
            <?php echo form_dropdown('semester', array('' => '--Semester --',1=>1,2=>2), set_value('semester', ''), 'class="form-control input-sm"') ?>
        </div>
        <div class="form-group">
            <label class="sr-only" for="academic_year">Academic Year</label>
            <?php echo form_dropdown('academic_year', array('' => '--Academic Year--'), set_value('academic_year', ''), 'class="form-control input-sm"') ?>
        </div>
        <button type="button" id="filter" class="btn btn-<?php echo PRIMARY; ?> btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Add new student attendants</h3>
        </div>
        <div class="panel-body">
                <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>Name[EN]</th>
                        <th>Name[KH]</th>
                        <th>Gender</th>
                        <th>Class</th>
                        <th>Attendant</th>
                        <th>Comment</th>
                    </tr>
                    <tr id="student_list">
                        <td colspan="7">Please filter to get student list</td>
                    </tr>
                </table>
            
        </div>
    </div>
</div>
</form>