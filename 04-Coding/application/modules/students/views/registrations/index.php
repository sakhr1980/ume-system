<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>students/registrations/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-<?php echo WARNING; ?>"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="filter">
        <form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>students/registrations/index">
            <div class="form-group">
                <label class="sr-only" for="stu_name">Student Name</label>
                <input type="text" class="form-control input-sm" id="stu_name" name="stu_en_firstname" value="<?php echo set_value('stu_en_firstname'); ?>" placeholder=" Student First Name">
                <input type="text" class="form-control input-sm" id="stu_name" name="stu_en_lastname" value="<?php echo set_value('stu_en_lastname'); ?>" placeholder=" Student Last Name">
                <input type="text" class="form-control input-sm" id="stu_name" name="cla_name" value="<?php echo set_value('cla_name'); ?>" placeholder=" Class Name">
            </div>
<!--            <div class="form-group">
                <label class="sr-only" for="stu_status">Status</label>
                <?php // echo form_dropdown('stu_status', array('' => '-- All Status --', '1' => 'Enabled', '0' => 'Desabled'), set_value('stu_status', $this->session->userdata('stu_status')), 'class="form-control input-sm"') ?>
            </div>-->
            <button type="submit" class="btn btn-<?php echo PRIMARY; ?> btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
        </form>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Group List</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <tr>
                    <th><input type="checkbox" class="checkall" /></th>
                    <th>Name</th>
                    <!--<th>Status</th>-->
                    <th>ភេទ / Gander</th>
                    <th>ថ្នាក់ /Class</th>
                    <th>មុខជំនាញ់ / Major</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                <?php if ($data->num_rows() > 0) { ?>
                    <?php foreach ($data->result_array() as $row) { ?>

                        <tr>
                            <td><input type="checkbox" name="id[]" value="<?php $row['stu_id'] ?>" class="checkid" /></td>
                            <td><?php echo $row['stu_en_lastname'] . ' ' . $row['stu_en_firstname'] . ' - ' . $row['stu_kh_lastname'] . ' ' . $row['stu_kh_firstname']; ?></td>
                                    <!--<td><?php echo ($row['stu_status'] == 1) ? "Enabled" : "Disabled"; ?></td>-->
                            <td><?php echo $row['stu_gender']; ?></td>
                            <td><?php echo $row['cla_name']; ?></td>
                            <td><?php echo $row['maj_name']; ?></td>
                            <td><?php echo $row['stu_email']; ?></td>
                            
                            <td>
                                <a class="btn btn-<?php echo DEFAULTS; ?> btn-xs" href="<?php echo base_url(); ?>students/registrations/view/<?php echo $row['stu_id'];
                echo '/' . $this->uri->segment(4);
                        ?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                <a class="btn btn-<?php echo DEFAULTS; ?> btn-xs" href="<?php echo base_url(); ?>students/registrations/edit/<?php echo $row['stu_id'];
                           echo '/' . $this->uri->segment(4);
                           ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                <a class="btn btn-<?php echo DANGER; ?> btn-xs" href="<?php echo base_url(); ?>students/registrations/delete/<?php echo $row['stu_id'];
                           echo '/' . $this->uri->segment(4);
                           ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this group? This group will be deleted permanently.');"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
                            </td>
                        </tr>

                    <?php } ?>
<?php } else { ?>
                    <tr><td colspan="7">Empty</td></tr>
    <?php } ?>
            </table>
        </div>
    </div>
<?php echo $this->pagination->create_links(); ?>
</div>

