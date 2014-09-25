<?php $user_Group = $this->session->userdata('userGroup'); ?>
<div class="col-sm-3 col-md-2 sidebar">
    <div class="sidebar-head">
        <h1>Navigation</h1>
    </div>
    <ul class="nav nav-sidebar">
        <?php if ($user_Group == "Academic") { ?>
            <li class="sidebar-header">Student Management</li>
            <li class=""><a href="<?php echo site_url(); ?>students/registrations"><i class="glyphicon glyphicon-list"></i> Student List</a></li>
            <li class=""><a href="<?php echo site_url(); ?>students/registrations/add"><i class="glyphicon glyphicon-plus"></i> Student Registration</a></li>
            <li class=""><a href="<?php echo site_url(); ?>students/scores"><i class="glyphicon glyphicon-plus"></i> Score Management</a></li>
            <li class="divider"></li>
            <li class="sidebar-header">Class Management</li>
            <li class=""><a href="<?php echo site_url(); ?>classes/classes"><i class="glyphicon glyphicon-list"></i>Class list</a></li>
            <li class=""><a href="<?php echo site_url(); ?>classes/classes/add"><i class="glyphicon glyphicon-plus"></i>Add New Class</a></li>
            <li class="divider"></li>
            <li class="sidebar-header">Room Management</li>
            <li class=""><a href="<?php echo site_url(); ?>rooms/rooms/"><i class="glyphicon glyphicon-registration-mark"></i> Manage Rooms</a></li>
            <li class=""><a href="<?php echo site_url(); ?>rooms/roomtypes/"><i class="glyphicon glyphicon-tower"></i> Manage Room Types</a></li>
            <li class="divider"></li>
            <li class="sidebar-header">Subject Management</li>
            <li class=""><a href="<?php echo site_url(); ?>subjects/"><i class="glyphicon glyphicon-registration-mark"></i> Manage Subject</a></li>
            <li class=""><a href="<?php echo site_url(); ?>subjects/type/"><i class="glyphicon glyphicon-tower"></i> Manage Subject Types</a></li>
            <li class="divider"></li>
             <li class="sidebar-header">Teacher Management</li>
             <li class=""><a href="<?php echo site_url(); ?>staffs/lectures/"><i class="glyphicon glyphicon-list"></i> Manage Teacher</a></li>
              <li class=""><a href="<?php echo site_url(); ?>staffs/lectures/add"><i class="glyphicon glyphicon-plus"></i> Add teacher</a></li>
              <li class=""><a href="<?php echo site_url(); ?>teacher/teacher"><i class="glyphicon glyphicon-list"></i> Teacher record book</a></li>
            <li class="sidebar-header">Education Management</li>
            <li class=""><a href="<?php echo site_url(); ?>schedules/"><i class="glyphicon glyphicon-list"></i> Schedule classes</a></li>
        <?php } ?>
        <?php if ($user_Group == "HR") { ?>
            <li class="sidebar-header">Staff Management</li>
            <li class=""><a href="<?php echo site_url(); ?>staffs/staffs/"><i class="glyphicon glyphicon-list"></i> Manage Staffs</a></li>
            <li class=""><a href="<?php echo site_url(); ?>staffs/positions/"><i class="glyphicon glyphicon-list"></i> Manage Positions</a></li>
            <li class=""><a href="<?php echo site_url(); ?>staffs/jobtypes/"><i class="glyphicon glyphicon-list"></i> Manage Job Types</a></li>
            <li class=""><a href="<?php echo site_url(); ?>staffs/staffevaluation/"><i class="glyphicon glyphicon-list"></i> Manage Staff Evaluation</a></li>
            <li class="divider"></li>
        <?php } ?> 
        <?php if ($user_Group == "Admin") { ?>
            <li class="sidebar-header">User Management</li>
            <li class=""><a href="<?php echo site_url(); ?>users/permission"><i class="glyphicon glyphicon-lock"></i> Manage Permissions</a></li>
            <li class=""><a href="<?php echo site_url(); ?>users/groups"><i class="glyphicon glyphicon-th-large"></i> Manage Groups</a></li>
            <li class=""><a href="<?php echo site_url(); ?>users/accounts"><i class="glyphicon glyphicon-user"></i> Manage Users</a></li>
        <?php } ?>      
        <?php if ($user_Group == "Admin") { ?>
            <li class="divider"></li>
            <li class="sidebar-header">Payment Management</li>
            <li class=""><a href="<?php echo site_url(); ?>payments/students"><i class="glyphicon glyphicon-lock"></i> Manage Students Payment</a></li>
            <li class=""><a href="<?php echo site_url(); ?>payments/teachers"><i class="glyphicon glyphicon-th-large"></i> Manage Teachers Payment </a></li>
            <li class="divider"></li>  
            <?php } ?>      
    </ul>
</div>