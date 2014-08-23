<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>subjects/type/add" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        <!--<a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>-->
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Subjects List</h3>
        </div>
        <div class="panel-body">
			<?php echo validation_errors(); ?>
            <table class="table table-hover">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
				<?php if ($listTypes->num_rows() > 0) { ?>
                    <?php foreach ($listTypes->result_array() as $sub) { ?>
                        <tr>
                            <td><?php echo $sub['sub_typ_title']; ?></td>
                            <td><?php echo $sub['sub_typ_description']; ?></td>
                            <td><?php
								if($sub['sub_typ_status']) {
									echo 'Enabled';
								}else {
									echo 'Disabled';
								}
								?></td>
                            <td>

								<a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>subjects/type/view/<?php echo $sub['sub_typ_id']; ?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>

								<a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>subjects/type/edit/<?php echo $sub['sub_typ_id'];?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
								<a class="btn btn-danger btn-xs confirm-delete" href="<?php echo base_url(); ?>subjects/type/delete/<?php echo $sub['sub_typ_id'];?>" title="Delete"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
                            </td>
                        </tr>

                    <?php } ?>
<?php } else { ?>
                    <tr><td colspan="7">Empty</td></tr>
    <?php } ?>
            </table>
        </div>
    </div>
</div>

