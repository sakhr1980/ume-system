<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>subjects/add<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
		<a href="<?php echo site_url(); ?>subjects/type<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-list"></i> Subject Type</a>
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
            <table class="table table-hover">
                <tr>
                    <th>Type</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Hour</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
				<?php if ($listSubjects->num_rows() > 0) { ?>
                    <?php foreach ($listSubjects->result_array() as $sub) { ?>
                        <tr>
                            <td><?php echo $sub['sub_typ_title']; ?></td>
                            <td><?php echo $sub['sub_name']; ?></td>
							<td><?php echo $sub['sub_hours'] ?></td>
							<td><?php echo $sub['sub_description'] ?></td>
                            <td><?php
								if($sub['sub_status']) {
									echo 'Active';
								}else {
									echo 'Deactive';
								}
								?>
							</td>

                            <td>
                        
                        <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>subjects/view/<?php echo $sub['sub_id']; ?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                        
                                <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>subjects/subjects/edit/<?php echo $sub['sub_id'];?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <a class="btn btn-danger btn-xs confirm-delete" href="<?php echo base_url(); ?>subjects/delete/<?php echo $sub['sub_id'];?>" title="Delete"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
                            
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

