<div class="filter">
	<form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>students/scores/index">
		<input type="hidden" name="score_tab" value="subjects" />
		<div class="form-group">
			<label class="sr-only" for="tbl_generation_gen_id">Generation</label>
			<?php echo form_dropdown('tbl_generation_gen_id', array('' => '--Generation--') + $generations, set_value('tbl_generation_gen_id', $this->session->userdata('tbl_generation_gen_id')), 'class="form-control input-sm"'); ?>
		</div>
		<div class="form-group">
			<label class="sr-only" for="stu_sco_semester">Semester</label>
			<?php echo form_dropdown('stu_sco_semester', array('1' => 'Semester I', '2' => 'Semester II'), set_value('stu_sco_semester', $this->session->userdata('stu_sco_semester')), 'class="form-control input-sm"') ?>
		</div>
		<div class="form-group">
			<label class="sr-only" for="tbl_majors_maj_id">Major</label>
			<?php echo form_dropdown('tbl_majors_maj_id', array('' => '--Major--') + $majors, set_value('tbl_majors_maj_id', $this->session->userdata('tbl_majors_maj_id')), 'class="form-control input-sm"') ?>
		</div>
		<div class="form-group">
			<label class="sr-only" for="tbl_shift_shi_id">Shift</label>
			<?php echo form_dropdown('tbl_shift_shi_id', array('' => '--Shift--') + $shifts, set_value('tbl_shift_shi_id', $this->session->userdata('tbl_shift_shi_id')), 'class="form-control input-sm"') ?>
		</div>
		<div class="form-group">
			<label class="sr-only" for="tbl_classes_cla_id">Class</label>
			<?php echo form_dropdown('tbl_classes_cla_id', array('' => '--Class--') + $classes, set_value('tbl_classes_cla_id', $this->session->userdata('tbl_classes_cla_id')), 'class="form-control input-sm"') ?>
		</div>
		<div class="form-group">
			<label class="sr-only" for="stu_name">Student</label>
			<input type="text" class="form-control input-sm" id="stu_name" name="stu_name" value="<?php echo set_value('stu_name'); ?>" placeholder="Student">
		</div>
		<button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
	</form>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Student Result by Subjects</h3>
	</div>
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th><input type="checkbox" class="checkall" /></th>
					<th>Student</th>
					<th>Generation</th>
					<th>Semester</th>
					<th>Major</th>
					<th>Shift</th>
					<th>Class</th>
					<th>Att</th>
					<th>Qui/HW</th>
					<th>Mid/Ass</th>
					<th>Final</th>
					<th>Total</th>
					<th>Rank</th>
					<th>Mention</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($data_subject->num_rows() > 0) { ?>
					<?php foreach ($data_subject->result_array() as $row) { ?>

						<tr>
							<td><input type="checkbox" name="id[]" value="<?php $row['id'] ?>" class="checkid" /></td>
							<td><?php echo $row['student']; ?></td>
							<td><?php echo $row['generation']; ?></td>
							<td><?php echo $row['semester']; ?></td>
							<td><?php echo $row['major']; ?></td>
							<td><?php echo $row['shift']; ?></td>
							<td><?php echo $row['class']; ?></td>
							<td><?php echo $row['attendance']; ?></td>
							<td><?php echo $row['homework']; ?></td>
							<td><?php echo $row['midterm']; ?></td>
							<td><?php echo $row['final']; ?></td>
							<td><?php echo $row['total']; ?></td>
							<td><?php echo $row['rank']; ?></td>
							<td><?php echo $row['mention']; ?></td>
							<td>
								<a class="btn btn-default btn-xs" disabled="disabled" href="<?php echo base_url(); ?>students/scores/view/<?php
								echo $row['id'];
								echo '/' . $this->uri->segment(4);
								?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
								<a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>students/scores/edit/<?php
								echo $row['id'];
								echo '/' . $this->uri->segment(4);
								?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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