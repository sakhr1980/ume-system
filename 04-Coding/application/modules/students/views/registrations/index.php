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
    <div class="filter student_form">
        <form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>students/registrations/index">
            <div class="form-group">
                <label class="sr-only" for="stu_name">Student Name</label>
                <div class="form-group">
                    <select name="gen_id" class="form-control" id="gen_id">
                        <option value="">--All generation--</option>
                        <?php
                        foreach ($generation as $key => $value) {
                            echo '<option value="' . $key . '" ' . set_select('gen_id', $key) . '>' . $value . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="cla_id" class="form-control" id="cla_id">
                        <option value="">--All classes--</option>
                        <?php
                        foreach ($arrayClasses as $key => $value) {
                            echo '<option value="' . $key . '" ' . set_select('cla_id', $key) . '>' . $value . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="fac_id" class="form-control" id="fac_id">
                        <option value="">--All Faculties--</option>
                        <?php
                        foreach ($arrayFaculties as $key => $value) {
                            echo '<option value="' . $key . '" ' . set_select('fac_id', $key) . '>' . $value . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <select name="maj_id" class="form-control" id="maj_id">
                        <option value="">--All major--</option>
                        <?php
                        foreach ($arrayMajor as $key => $value) {
                            echo '<option value="' . $key . '" ' . set_select('maj_id', $key) . '>' . $value . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class=" input-sm" id="stu_en_firstname" name="stu_en_firstname" value="<?php echo set_value('stu_en_firstname'); ?>" placeholder=" Student First Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-sm" id="stu_en_lastname" name="stu_en_lastname" value="<?php echo set_value('stu_en_lastname'); ?>" placeholder=" Student Last Name">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-<?php echo PRIMARY; ?> btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
                    <a class="btn btn-<?php echo DEFAULTS; ?> btn-xs" href="<?php echo base_url(); ?>students/registrations/print_card/" title="Pint Card"><i class="glyphicon glyphicon-print"></i> Print Card</a>
                </div>
            </div>
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
                    <th>ID Card</th>
                    <th>En Name</th>
                    <th>Khmer Name</th>
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
                            <td><?php echo $row['stu_card_id'] ?></td>
                            <td><?php echo $row['stu_en_lastname'] . ' ' . $row['stu_en_firstname'] ?></td>
                            <td><?php $row['stu_kh_lastname'] . ' ' . $row['stu_kh_firstname']; ?></td>
                                    <!--<td><?php echo ($row['stu_status'] == 1) ? "Enabled" : "Disabled"; ?></td>-->
                            <td><?php echo $row['stu_gender']; ?></td>
                            <td><?php echo $row['cla_name']; ?></td>
                            <td><?php echo $row['maj_name']; ?></td>
                            <td><?php echo $row['stu_email']; ?></td>

                            <td>
                                <a class="btn btn-<?php echo DEFAULTS; ?> btn-xs" href="<?php echo base_url(); ?>students/registrations/view/<?php
                                echo $row['stu_id'];
                                echo '/' . $this->uri->segment(4);
                                ?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                <a class="btn btn-<?php echo DEFAULTS; ?> btn-xs" href="<?php echo base_url(); ?>students/registrations/edit/<?php
                                echo $row['stu_id'];
                                echo '/' . $this->uri->segment(4);
                                ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                <a class="btn btn-<?php echo DANGER; ?> btn-xs" href="<?php echo base_url(); ?>students/registrations/delete/<?php
                                echo $row['stu_id'];
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

