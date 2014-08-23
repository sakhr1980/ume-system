<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>subjects/add<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
	<div class="filter">
		<form class="form-inline" role="form" method="post" action="">
			<div class="form-group">
				<label class="sr-only" for="sub_title">Title</label>
				<input type="text" class="form-control input-sm" id="sub_title" name="sub_title" value="" placeholder="Title">
			</div>
			<div class="form-group">
				<label class="sr-only" for="sub_hour">Hour</label>
				<input type="text" class="form-control input-sm" id="sub_title" name="sub_hour" value="" placeholder="Hour">
			</div>
			<div class="form-group">
				<label class="sr-only" for="sub_typ_id">Subject Type</label>
				<select name="sub_typ_id" class="form-control  input-sm">
					<option value="">-- All Types --</option>
					<?php foreach ($getTypes->result_array() as $typ) {
						echo '<option value="'.$typ['sub_typ_id'].'">'.$typ['sub_typ_title'].'</option>';
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label class="sr-only" for="sta_status">Status</label>
				<?php echo form_dropdown('sub_status', array('' => '-- All Status --', '1' => 'Enabled', 2 => 'Disabled'), set_value('sub_status', $this->session->userdata('sta_status')), 'class="form-control input-sm"') ?>
			</div>
			<button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
		</form>
	</div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Subjects List</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <tr>
                    <th>Title</th>
					<th>Description</th>
					<th>Hour</th>
					<th>Subject Type</th>
					<th>Status</th>
                    <th>Action</th>
                </tr>
				<?php if ($listSubjects->num_rows() > 0) { ?>
                    <?php foreach ($listSubjects->result_array() as $sub) { ?>
                        <tr>
                            <td><?php echo $sub['sub_name']; ?></td>
							<td><?php echo $sub['sub_description'] ?></td>
							<td><?php echo $sub['sub_hours'] ?></td>
							<td><?php echo $sub['sub_typ_title']; ?></td>
							<td><?php
								if($sub['sub_status']) {
									echo 'Enabled';
								}else {
									echo 'Disabled';
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

