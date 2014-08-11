<?php
$data->result_array();
$data = $data->result_array[0];
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>rooms/rooms/edit/<?php
echo $data['rom_id'];
echo '/' . $this->uri->segment(5); // segment(5) for pagination
?>">
	<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<div class="left">
			<!--For icon: http://getbootstrap.com/components/-->
			<a href="<?php echo site_url(); ?>rooms/rooms/index/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
			<button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Update</button>
			<button type="reset" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-ban-circle"></i> Reset</button>
		</div>
		<div class="right">
			<h1><?php echo $title; ?></h1>
		</div>
	</div>
	<div class="content">
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Edit Room</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label for="rom_name" class="col-sm-3 control-label">Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="rom_name" placeholder="Name" name="rom_name" value="<?php echo set_value('rom_name', $data['rom_name']); ?>" required pattern=".{2,50}" title="Allow enter from 2 to 50 characters">
								<?php echo form_error('rom_name'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="rom_building" class="col-sm-3 control-label">Building</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="rom_building" placeholder="Building" name="rom_building" value="<?php echo set_value('rom_building', $data['rom_building']); ?>"  pattern=".{1,50}" required title="Allow enter from 1 to 50 characters">
								<?php echo form_error('rom_building'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="rom_floor" class="col-sm-3 control-label">Floor</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="rom_floor" placeholder="Floor" name="rom_floor" value="<?php echo set_value('rom_floor', $data['rom_floor']); ?>"  pattern=".{1,3}" required title="Allow enter from 1 to 3 characters">
								<?php echo form_error('rom_floor'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="rom_available_people" class="col-sm-3 control-label">Amount of People</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="rom_available_people" placeholder="Email" name="rom_available_people" value="<?php echo set_value('rom_available_people', $data['rom_available_people']); ?>"  pattern=".{1,4}" required title="Allow enter from 1 to 4 characters">
								<?php echo form_error('rom_available_people'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="tbl_room_type_rom_typ_id" class="col-sm-3 control-label">Room Type</label>
							<div class="col-sm-9">
								<select name="tbl_room_type_rom_typ_id" class="form-control" id="tbl_room_type_rom_typ_id">
									<?php
									foreach ($types as $key => $value) {
										if ($key == $data['tbl_room_type_rom_typ_id']) {
											echo '<option value="' . $key . '" ' . set_select('tbl_room_type_rom_typ_id', $key, TRUE) . '>' . $value . '</option>';
										} else {
											echo '<option value="' . $key . '" ' . set_select('tbl_room_type_rom_typ_id', $key) . '>' . $value . '</option>';
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="rom_status" class="col-sm-3 control-label">Enable</label>
							<div class="col-sm-9">
								<div class="checkbox">
									<label><input type="checkbox" name="rom_status" id="rom_status" value="1" <?php echo set_checkbox('rom_status', 1, ($data['rom_status'] == 1) ? TRUE : FALSE); ?>> Check to enable this room</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>