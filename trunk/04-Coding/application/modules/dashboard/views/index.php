<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
<!--    <div class="left">
        For icon: http://getbootstrap.com/components/
        <a href="<?php echo site_url(); ?>users/accounts/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        <a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>
    </div>-->
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content dashboard">
    <div class="row">
        <div class="col-xs-6 col-md-3">
          <a href="<?php echo base_url(); ?>students/registrations" class="thumbnail">
              <img src="<?php echo base_url(); ?>images/student.png" alt="Manage Student">
              <h3>Student</h3>
          </a>
        </div>
        
        <div class="col-xs-6 col-md-3">
          <a href="<?php echo base_url(); ?>staffs/lectures/" class="thumbnail">
              <img src="<?php echo base_url(); ?>images/teacher.png" alt="Manage teacher">
              <h3>Teacher</h3>
          </a>
        </div>
        
        <div class="col-xs-6 col-md-3">
          <a href="<?php echo base_url(); ?>" class="thumbnail">
              <img src="<?php echo base_url(); ?>images/class.png" alt="Manage class">
              <h3>Class</h3>
          </a>
        </div>
        
        <div class="col-xs-6 col-md-3">
          <a href="<?php echo base_url(); ?>subjects" class="thumbnail">
              <img src="<?php echo base_url(); ?>images/subject.png" alt="Manage subject">
              <h3>Subject</h3>
          </a>
        </div>
        
        
    </div>
</div>

