<?php
$data->result_array();
$data = $data->result_array[0];
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>students/scores/edit/<?php
echo $data['stu_sco_id'];
echo '/' . $this->uri->segment(5); // segment(5) for pagination
?>">
		  <?php echo form_hidden('stu_sco_semester', $data['stu_sco_semester']); ?>
	<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<div class="left">
			<!--For icon: http://getbootstrap.com/components/-->
			<a href="<?php echo site_url(); ?>students/scores/index/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
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
						<h3 class="panel-title">Input Score for <strong><?php echo $data['student']; ?></strong> - Semester <?php echo $data['stu_sco_semester']; ?></h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label for="rom_building" class="col-sm-3 control-label">Attendance (10%)</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="stu_sco_attendance" placeholder="0.00" name="stu_sco_attendance" value="<?php echo set_value('stu_sco_attendance', $data['stu_sco_attendance']); ?>"  pattern=".{1,5}" required title="Allow enter from 1 to 5 character(s)">
								<?php echo form_error('stu_sco_attendance'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="stu_sco_homework" class="col-sm-3 control-label">Homework/Quiz (15%)</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="rom_floor" placeholder="0.00" name="stu_sco_homework" value="<?php echo set_value('stu_sco_homework', $data['stu_sco_homework']); ?>"  pattern=".{1,5}" required title="Allow enter from 1 to 5 character(s)">
								<?php echo form_error('stu_sco_homework'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="stu_sco_midterm_exam" class="col-sm-3 control-label">Midterm/Assignment (25%)</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="stu_sco_midterm_exam" placeholder="0.00" name="stu_sco_midterm_exam" value="<?php echo set_value('stu_sco_midterm_exam', $data['stu_sco_midterm_exam']); ?>"  pattern=".{1,5}" required title="Allow enter from 1 to 5 character(s)">
								<?php echo form_error('stu_sco_midterm_exam'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="stu_sco_final_exam" class="col-sm-3 control-label">Final Exam (50%)</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="stu_sco_final_exam" placeholder="0.00" name="stu_sco_final_exam" value="<?php echo set_value('stu_sco_final_exam', $data['stu_sco_final_exam']); ?>"  pattern=".{1,5}" required title="Allow enter from 1 to 5 character(s)">
								<?php echo form_error('stu_sco_final_exam'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>