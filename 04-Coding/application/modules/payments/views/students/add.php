<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>payments/students/add">
	<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<div class="left">
			<!--For icon: http://getbootstrap.com/components/-->
			<a href="<?php echo site_url(); ?>payments/students/index/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
			<button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Save</button>
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
						<h3 class="panel-title">Student Payments Record</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label for="tbl_students_stu_id" class="col-sm-3 control-label">Student ID</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="tbl_students_stu_id" placeholder="Student ID" name="tbl_students_stu_id" value="<?php echo set_value('tbl_students_stu_id'); ?>"  pattern=".{1,50}" required title="Allow enter from 1 to 50 characters">
								<?php echo form_error('tbl_students_stu_id'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="name_in_latin" class="col-sm-3 control-label">Name In Latin</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="student_name_in_latin" placeholder="Name In Latin" name="student_name_in_latin" value="" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="name_in_khmer" class="col-sm-3 control-label">Name In Khmer</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="name_in_khmer" placeholder="Name In Khmer" name="name_in_khmer" value="" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="stu_sex" class="col-sm-3 control-label">sex</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="stu_sex" placeholder="Sex" name="stu_sex" value="" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="tbl_majors_maj_id" class="col-sm-3 control-label">Major</label>
							<div class="col-sm-9">
								<select name="tbl_majors_maj_id" class="form-control" id="tbl_majors_maj_id">
									<?php
									foreach ($majors as $key => $value) {
										echo '<option value="' . $key . '" ' . set_select('tbl_majors_maj_id', $key) . '>' . $value . '</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="tbl_subjects_sub_id" class="col-sm-3 control-label">Subject</label>
							<div class="col-sm-9">
								<select name="tbl_subjects_sub_id" class="form-control" id="tbl_subjects_sub_id">
									<?php
									foreach ($subjects as $key => $value) {
										echo '<option value="' . $key . '" ' . set_select('tbl_subjects_sub_id', $key) . '>' . $value . '</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="sp_year" class="col-sm-3 control-label">Year</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="sp_year" placeholder="Year" name="sp_year" value="<?php echo set_value('sp_year'); ?>" required>
								<?php echo form_error('sp_year'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="sp_amounce" class="col-sm-3 control-label">Amounce</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="sp_amounce" placeholder="Amounce ($)" name="sp_amounce" value="<?php echo set_value('sp_amounce'); ?>" required>
								<?php echo form_error('sp_amounce'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="sp_date_pay" class="col-sm-3 control-label">Date Pay</label>
							<div class="col-sm-9">
								<div class="input-group date" data-datepicker="true">
									<input type="text" class="form-control" id="sp_date_pay" placeholder="yyyy-mm-dd" name="sp_date_pay" value="<?php echo set_value('sp_date_pay'); ?>" pattern=".{9,50}" title="Allow enter from 9 to 50 characters" required>
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span>
									</span>
									<?php echo form_error('sp_date_pay'); ?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="sp_status" class="col-sm-3 control-label">Enable</label>
							<div class="col-sm-9">
								<div class="checkbox">
									<label><input type="checkbox" name="sp_status" id="sp_status" value="1" <?php echo set_checkbox('sp_status', 1, TRUE); ?>> Check to enable this payments</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>