<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
	<div class="left">
		<!--For icon: http://getbootstrap.com/components/-->
		<a href="<?php echo site_url(); ?>rooms/rooms/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
		<!--<a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>-->
	</div>
	<div class="right">
		<h1><?php echo $title; ?></h1>
	</div>
</div>
<div class="content">
	<div class="filter">
		<form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>rooms/rooms/index">
			<div class="form-group">
				<label class="sr-only" for="rom_name">Name</label>
				<input type="text" class="form-control input-sm" id="rom_name" name="rom_name" value="<?php echo set_value('rom_name'); ?>" placeholder="Name">
			</div>
			<div class="form-group">
				<label class="sr-only" for="rom_building">Building</label>
				<input type="text" class="form-control input-sm" id="rom_building" name="rom_building" value="<?php echo set_value('rom_building'); ?>" placeholder="Building">
			</div>
			<div class="form-group">
				<label class="sr-only" for="rom_floor">Floor</label>
				<input type="text" class="form-control input-sm" id="rom_floor" name="rom_floor" value="<?php echo set_value('rom_floor'); ?>" placeholder="Floor">
			</div>
			<div class="form-group">
				<label class="sr-only" for="tbl_room_type_rom_typ_id">Room Type</label>
				<select name="tbl_room_type_rom_typ_id" class="form-control input-sm" id="tbl_room_type_rom_typ_id">
					<option value="">--All Type--</option>
					<?php
					foreach ($types as $key => $value) {
						echo '<option value="' . $key . '" ' . set_select('tbl_room_type_rom_typ_id', $key) . '>' . $value . '</option>';
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label class="sr-only" for="rom_status">Status</label>
				<?php echo form_dropdown('rom_status', array('' => '-- All Status --', '1' => 'Enabled', '0' => 'Disabled'), set_value('rom_status', $this->session->userdata('rom_status')), 'class="form-control input-sm"') ?>
			</div>
			<button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
		</form>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Room List</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th><input type="checkbox" class="checkall" /></th>
						<th>Name</th>
						<th>Building</th>
						<th>Floor</th>
						<th>Amount of People</th>
						<th>Room Type</th>
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
								<td><input type="checkbox" name="id[]" value="<?php $row['rom_id'] ?>" class="checkid" /></td>
								<td><?php echo $row['rom_name']; ?></td>
								<td><?php echo $row['rom_building']; ?></td>
								<td><?php echo $row['rom_floor']; ?></td>
								<td><?php echo $row['rom_available_people']; ?></td>
								<td><?php echo $row['rom_typ_name']; ?></td>
								<td><?php echo status_string($row['rom_status']); ?></td>
								<td><?php echo get_date_string($row['rom_created']); ?></td>
								<td><?php echo get_date_string($row['rom_modified']); ?></td>
								<td>
									<a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>rooms/rooms/view/<?php
									echo $row['rom_id'];
									echo '/' . $this->uri->segment(4);
									?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
									<a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>rooms/rooms/edit/<?php
									echo $row['rom_id'];
									echo '/' . $this->uri->segment(4);
									?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
									<a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>rooms/rooms/delete/<?php
									echo $row['rom_id'];
									echo '/' . $this->uri->segment(4);
									?>" title="Delete" onclick="return confirm('Are you sure you want to delete this staff record? This staff record will be deleted permanently.');"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
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