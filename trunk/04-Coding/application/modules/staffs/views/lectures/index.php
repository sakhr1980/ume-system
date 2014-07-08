<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
	<div class="left">
		<!--For icon: http://getbootstrap.com/components/-->
		<a href="<?php echo site_url(); ?>staffs/lectures/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
		<!--<a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>-->
	</div>
	<div class="right">
		<h1><?php echo $title; ?></h1>
	</div>
</div>
<div class="content">
	<div class="filter">
		<form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>staffs/lectures/index">
			<div class="form-group">
				<label class="sr-only" for="sta_card_id">Card ID</label>
				<input type="text" class="form-control input-sm" id="sta_card_id" name="sta_card_id" value="<?php echo set_value('sta_card_id'); ?>" placeholder="Card ID">
			</div>
			<div class="form-group">
				<label class="sr-only" for="sta_name">Name in Latin</label>
				<input type="text" class="form-control input-sm" id="sta_name" name="sta_name" value="<?php echo set_value('sta_name'); ?>" placeholder="Name in latin">
			</div>
			<div class="form-group">
				<label class="sr-only" for="sta_name_kh">Name in Khmer</label>
				<input type="text" class="form-control input-sm" id="sta_name_kh" name="sta_name_kh" value="<?php echo set_value('sta_name_kh'); ?>" placeholder="Name in khmer">
			</div>
			<div class="form-group">
				<label class="sr-only" for="sta_sex">Sex</label>
				<?php echo form_dropdown('sta_sex', array('' => '-- All Sex --', 'm' => 'Male', 'f' => 'Female'), set_value('sta_sex', $this->session->userdata('sta_sex')), 'class="form-control input-sm"') ?>
			</div>
			<div class="form-group">
				<label class="sr-only" for="sta_status">Status</label>
				<?php echo form_dropdown('sta_status', array('' => '-- All Status --', '1' => 'Enabled', '0' => 'Disabled'), set_value('sta_status', $this->session->userdata('sta_status')), 'class="form-control input-sm"') ?>
			</div>
			<button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
		</form>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Teacher List</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th><input type="checkbox" class="checkall" /></th>
						<th>Card ID</th>
						<th>Name in Latin</th>
						<th>Name in Khmer</th>
						<th>Position</th>
						<th>Email</th>
						<th>Sex</th>
						<th>Status</th>
						<th>Created</th>
						<th>Modified</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($data->num_rows() > 0) { ?>
						<?php foreach ($data->result_array() as $row) { ?>

							<tr>
								<td><input type="checkbox" name="id[]" value="<?php $row['sta_id'] ?>" class="checkid" /></td>
								<td><?php echo $row['sta_card_id']; ?></td>
								<td><?php echo $row['sta_name']; ?></td>
								<td><?php echo $row['sta_name_kh']; ?></td>
								<td><?php echo $row['sta_position']; ?></td>
								<td><?php echo $row['sta_email']; ?></td>
								<td><?php echo strtoupper($row['sta_sex']); ?></td>
								<td><?php echo status_string($row['sta_status']); ?></td>
								<td><?php echo get_date_string($row['sta_created']); ?></td>
								<td><?php echo get_date_string($row['sta_modified']); ?></td>
								<td>
									<a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>staffs/lectures/view/<?php
									echo $row['sta_id'];
									echo '/' . $this->uri->segment(4);
									?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
									<a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>staffs/lectures/edit/<?php
									echo $row['sta_id'];
									echo '/' . $this->uri->segment(4);
									?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
									<a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>staffs/lectures/delete/<?php
									echo $row['sta_id'];
									echo '/' . $this->uri->segment(4);
									?>" title="Delete" onclick="return confirm('Are you sure you want to delete this lecture record? This staff record will be deleted permanently.');"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
								</td>
							</tr>

						<?php } ?>
					<?php } else { ?>
						<tr><td colspan="7">Empty</td></tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php echo $this->pagination->create_links(); ?>
</div>