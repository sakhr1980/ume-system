<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>classes/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        <!--<a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>-->
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">


    <div class="filter">
        <form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>classes/classes/index">
            <div class="form-group">
                <label class="sr-only" for="cla_name">Class Name</label>
                <input type="text" class="form-control input-sm" id="cla_name" name="cla_name" value="<?php echo set_value('cla_name'); ?>" placeholder="Class name">
            </div>
           
            <button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
        </form>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Classes List</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <tr>
                    <th><input type="checkbox" class="checkall" /></th>
                    <th>ឈ្មោះថ្នាក់ </th>
                    <th>ចំនួនសិស្ស</th>
                    <th>ពេលសិស្សា</th>
                    <th>មហារិទ្យាល័យ</th>
                    <th>សន្ថាភា</th>
<!--                    <th>Created</th>
                    <th>Modified</th>-->
                    <th>Action</th>
                </tr>

                <?php if ($data->num_rows() > 0) { ?>
                    <?php foreach ($data->result_array() as $row) { ?>
                        <tr>
                            <td><input type="checkbox" name="id[]" value="<?php $row['cla_id'] ?>" class="checkid" /></td>
                            <td><?php echo $row['cla_name']; ?></td>
                            <td><?php echo $row['cla_capacity']; ?></td>
                            <td><?php echo $row['shi_name'] ?></td>
                            <td><?php echo $row['maj_name'] ?></td>
                            <td><?php echo status_string($row['cla_status']); ?></td>

                            <td>
<!--                                <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>classes/view/<?php echo $row['cla_id'];
                echo '/' . $this->uri->segment(4);
                        ?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>-->
                        
                        <a class="btn btn-default btn-xs"  href="<?php echo base_url(); ?>classes/view/<?php echo $row['cla_id'];
                echo '/' . $this->uri->segment(4);
                        ?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                        
                                <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>classes/edit/<?php echo $row['cla_id'];
                           echo '/' . $this->uri->segment(4);
                           ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
<!--                                <a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>classes/delete/<?php echo $row['cla_id'];
                           echo '/' . $this->uri->segment(4);
                           ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this user account? This user account will be deleted permanently.');"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
                            -->
                            <a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>classes/delete/<?php echo $row['cla_id'];
                           echo '/' . $this->uri->segment(4);
                           ?>" title="Delete"  onclick="return confirm('Are you sure you want to delete this class? This class record will be deleted permanently.')"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
                            
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

