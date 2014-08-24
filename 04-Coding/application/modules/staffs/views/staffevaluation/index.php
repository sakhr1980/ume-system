<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
	<div class="left">
		<!--For icon: http://getbootstrap.com/components/-->
		<a href="<?php echo site_url(); ?>staffs/staffevaluation/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
		<!--<a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>-->
	</div>
	<div class="right">
		<h1><?php echo $title; ?></h1>
	</div>
</div>
<div class="content">
	<div class="filter">
		<form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>staffs/staffevaluation/index">
			<div class="form-group">
				<label class="sr-only" for="sta_name">Staff Name</label>
				<input type="text" class="form-control input-sm" id="sta_name" name="sta_name" autocomplete="off" value="<?php echo set_value('sta_name'); ?>" placeholder="Staff Name">
			</div>
			<button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
		</form>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Staffs Evaluation List</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th><input type="checkbox" class="checkall" /></th>
						<th>Staff Name</th>
						<th>Total A</th>
						<th>Total B</th>
						<th>Total C</th>
						<th>Total D</th>
						<th>Total E</th>
						<th>Created</th>
						<th>Modified</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($data->num_rows() > 0) { ?>
						<?php foreach ($data->result_array() as $row) { ?>

							<tr>
								<td><input type="checkbox" name="id[]" value="<?php $row['sta_eva_id'] ?>" class="checkid" /></td>
								<td><?php echo $row['sta_name']; ?></td>
								<td><?php echo $row['total_a']; ?></td>
								<td><?php echo $row['total_b']; ?></td>
								<td><?php echo $row['total_c']; ?></td>
								<td><?php echo $row['total_d']; ?></td>
								<td><?php echo $row['total_e']; ?></td>
								<td><?php echo get_date_string($row['sta_eva_created']); ?></td>
								<td><?php echo get_date_string($row['sta_eva_modified']); ?></td>
								<td>
									<a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>staffs/staffevaluation/view/<?php
									echo $row['sta_eva_id'];
									echo '/' . $this->uri->segment(4);
									?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
									<a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>staffs/staffevaluation/edit/<?php
									echo $row['sta_eva_id'];
									echo '/' . $this->uri->segment(4);
									?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
									<a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>staffs/staffevaluation/delete/<?php
									echo $row['sta_eva_id'];
									echo '/' . $this->uri->segment(4);
									?>" title="Delete" onclick="return confirm('Are you sure you want to delete this staff record? This position record will be deleted permanently.');"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
								</td>
							</tr>

						<?php } ?>
					<?php } else { ?>
						<tr><td colspan="10">Empty</td></tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php echo $this->pagination->create_links(); ?>
</div>