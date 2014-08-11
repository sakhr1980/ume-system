<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
	<div class="left">
		<!--For icon: http://getbootstrap.com/components/-->
		<a href="<?php echo site_url(); ?>staffs/positions/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
		<!--<a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>-->
	</div>
	<div class="right">
		<h1><?php echo $title; ?></h1>
	</div>
</div>
<div class="content">
	<div class="filter">
		<form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>staffs/positions/index">
			<div class="form-group">
				<label class="sr-only" for="pos_title_en">Title in Latin</label>
				<input type="text" class="form-control input-sm" id="pos_title_en" name="pos_title_en" value="<?php echo set_value('pos_title_en'); ?>" placeholder="Title in Latin">
			</div>
			<div class="form-group">
				<label class="sr-only" for="pos_title_kh">Title in Khmer</label>
				<input type="text" class="form-control input-sm" id="pos_title_kh" name="pos_title_kh" value="<?php echo set_value('pos_title_kh'); ?>" placeholder="Title in Khmer">
			</div>
			<div class="form-group">
				<label class="sr-only" for="pos_status">Status</label>
				<?php echo form_dropdown('pos_status', array('' => '-- All Status --', '1' => 'Enabled', '0' => 'Disabled'), set_value('pos_status', $this->session->userdata('pos_status')), 'class="form-control input-sm"') ?>
			</div>
			<button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
		</form>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Position List</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th><input type="checkbox" class="checkall" /></th>
						<th>Title in Latin</th>
						<th>Title in Khmer</th>
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
								<td><input type="checkbox" name="id[]" value="<?php $row['pos_id'] ?>" class="checkid" /></td>
								<td><?php echo $row['pos_title_en']; ?></td>
								<td><?php echo $row['pos_title_kh']; ?></td>
								<td><?php echo status_string($row['pos_status']); ?></td>
								<td><?php echo get_date_string($row['pos_created']); ?></td>
								<td><?php echo get_date_string($row['pos_modified']); ?></td>
								<td>
									<a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>staffs/positions/view/<?php
									echo $row['pos_id'];
									echo '/' . $this->uri->segment(4);
									?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
									<a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>staffs/positions/edit/<?php
									echo $row['pos_id'];
									echo '/' . $this->uri->segment(4);
									?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
									<a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>staffs/positions/delete/<?php
									echo $row['pos_id'];
									echo '/' . $this->uri->segment(4);
									?>" title="Delete" onclick="return confirm('Are you sure you want to delete this staff record? This position record will be deleted permanently.');"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
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