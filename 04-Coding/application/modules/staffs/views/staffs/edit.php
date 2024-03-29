<?php
$data->result_array();
$data = $data->result_array[0];
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>staffs/staffs/edit/<?php
echo $data['sta_id'];
echo '/' . $this->uri->segment(5); // segment(5) for pagination
?>">
	<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<div class="left">
			<!--For icon: http://getbootstrap.com/components/-->
			<a href="<?php echo site_url(); ?>staffs/staffs/index/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
			<button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Update</button>
			<button type="reset" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-ban-circle"></i> Reset</button>
		</div>
		<div class="right">
			<h1><?php echo $title; ?></h1>
		</div>
	</div>
	<div class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Staff Profile</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label for="sta_card_id" class="col-sm-3 control-label">Card ID</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="sta_card_id" placeholder="Card ID" name="sta_card_id" value="<?php echo $data['sta_card_id']; ?>" readonly="readonly">
							</div>
						</div>
						<div class="form-group">
							<label for="sta_name" class="col-sm-3 control-label">Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="sta_name" placeholder="Name in latin" name="sta_name" value="<?php echo set_value('sta_name', $data['sta_name']); ?>"  pattern=".{2,50}" required title="Allow enter from 2 to 50 characters">
								<?php echo form_error('sta_name'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="sta_name_kh" class="col-sm-3 control-label">Name in Khmer</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="sta_name_kh" placeholder="Name in khmer" name="sta_name_kh" value="<?php echo set_value('sta_name_kh', $data['sta_name_kh']); ?>"  pattern=".{3,50}" required title="Allow enter from 3 to 50 characters">
								<?php echo form_error('sta_name_kh'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="sta_sex" class="col-sm-3 control-label">Sex</label>
							<div class="col-sm-9">
								<?php
								echo form_dropdown('sta_sex', array('m' => 'Male', 'f' => 'Female'), set_value('sta_sex', $data['sta_sex']), 'id="sta_sex" class="form-control"');
								?>
							</div>
						</div>
						<div class="form-group">
							<label for="sta_phone" class="col-sm-3 control-label">Mobile Phone</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="sta_phone" placeholder="Mobile Phone" name="sta_phone" value="<?php echo set_value('sta_phone', $data['sta_phone']); ?>"  pattern=".{9,30}" title="Allow enter from 9 to 30 characters">
								<?php echo form_error('sta_phone'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="sta_email" class="col-sm-3 control-label">Email</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="sta_email" placeholder="Email" name="sta_email" value="<?php echo set_value('sta_email', $data['sta_email']); ?>"  pattern=".{2,50}" title="Allow enter from 2 to 50 characters">
								<?php echo form_error('sta_email'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="sta_address" class="col-sm-3 control-label">Address</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="sta_address" id="sta_address" value="<?php echo set_value('sta_address', $data['sta_address']); ?>" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Staff Settings</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label for="sta_position" class="col-sm-3 control-label">Position</label>
							<div class="col-sm-9">
								<select name="sta_position" class="form-control" id="sta_position">
									<?php
									foreach ($positions as $key => $value) {
										if ($key == $data['sta_position']) {
											echo '<option value="' . $key . '" ' . set_select('sta_position', $key, TRUE) . '>' . $value . '</option>';
										} else {
											echo '<option value="' . $key . '" ' . set_select('sta_position', $key) . '>' . $value . '</option>';
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="sta_job_type" class="col-sm-3 control-label">Job type</label>
							<div class="col-sm-9">
								<select name="sta_job_type" class="form-control" id="sta_job_type">
									<?php
									foreach ($jobtypes as $key => $value) {
										if ($key == $data['sta_job_type']) {
											echo '<option value="' . $key . '" ' . set_select('sta_job_type', $key, TRUE) . '>' . $value . '</option>';
										} else {
											echo '<option value="' . $key . '" ' . set_select('sta_job_type', $key) . '>' . $value . '</option>';
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="sta_start_date" class="col-sm-3 control-label">Start Date</label>
							<div class="col-sm-9">
								<div class="input-group date" data-datepicker="true">
									<input type="text" class="form-control" id="sta_start_date" placeholder="yyyy-mm-dd" name="sta_start_date" value="<?php echo set_value('sta_start_date', date('Y-m-d', strtotime($data['sta_start_date']))); ?>"  pattern=".{9,50}" title="Allow enter from 9 to 50 characters">
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span>
									</span>
									<?php echo form_error('sta_start_date'); ?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="sta_status" class="col-sm-3 control-label">Enable</label>
							<div class="col-sm-9">
								<div class="checkbox">
									<label><input type="checkbox" name="sta_status" id="sta_status" value="1" <?php echo set_checkbox('sta_status', 1, ($data['sta_status'] == 1) ? TRUE : FALSE); ?>> Check to enable this staff</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>