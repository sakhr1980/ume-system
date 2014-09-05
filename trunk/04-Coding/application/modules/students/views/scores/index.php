<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
	<div class="left">
		<!--For icon: http://getbootstrap.com/components/-->
		<a href="<?php echo site_url(); ?>students/scores/refresh/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
		<!--<a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>-->
	</div>
	<div class="right">
		<h1><?php echo $title; ?></h1>
	</div>
</div>
<div class="content">
	<div class="filter">
		<form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>students/scores/index">
			<div class="form-group">
				<label class="sr-only" for="tbl_generation_gen_id">Generation</label>
				<?php echo form_dropdown('tbl_generation_gen_id', array('' => '--Generation--') + $generations, set_value('tbl_generation_gen_id', $this->session->userdata('tbl_generation_gen_id')), 'class="form-control input-sm"') ?>
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
				<input type="text" class="form-control input-sm" id="stu_name" name="stu_name" value="<?php echo set_value('stu_name', $this->session->userdata('tbl_students_stu_id')); ?>" placeholder="Student">
			</div>
			<button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
		</form>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Student Score Result</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th><input type="checkbox" class="checkall" /></th>
						<th>Student</th>
						<th>Generation</th>
						<th>Major</th>
						<th>Shift</th>
						<th>Class</th>
						<th>Att</th>
						<th>Qui/HW</th>
						<th>Mid/Ass</th>
						<th>Final</th>
						<th>Average</th>
						<th>Rank</th>
						<th>Mention</th>
						<th>GPA</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($data->num_rows() > 0) { ?>
						<?php foreach ($data->result_array() as $row) { ?>

							<tr>
								<td><input type="checkbox" name="id[]" value="<?php $row['id'] ?>" class="checkid" /></td>
								<td><?php echo $row['student']; ?></td>
								<td><?php echo $row['generation']; ?></td>
								<td><?php echo $row['major']; ?></td>
								<td><?php echo $row['shift']; ?></td>
								<td><?php echo $row['class']; ?></td>
								<td><?php echo $row['attendance']; ?></td>
								<td><?php echo $row['homework']; ?></td>
								<td><?php echo $row['midterm']; ?></td>
								<td><?php echo $row['final']; ?></td>
								<td><?php echo $row['average']; ?></td>
								<td><?php echo $row['rank']; ?></td>
								<td><?php echo $row['mention']; ?></td>
								<td><?php echo $row['gpa']; ?></td>
								<td>
									<a class="btn btn-default btn-xs" disabled="disabled" href="<?php echo base_url(); ?>students/scores/view/<?php
									echo $row['id'];
									echo '/' . $this->uri->segment(4);
									?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
									<a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>students/scores/edit/<?php
									echo $row['id'];
									echo '/' . $this->uri->segment(4);
									?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
									<a class="btn btn-danger btn-xs" disabled="disabled" href="<?php echo base_url(); ?>students/scores/delete/<?php
									echo $row['id'];
									echo '/' . $this->uri->segment(4);
									?>" title="Delete" onclick="return confirm('Are you sure you want to delete this score record? This score record will be deleted permanently.');"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
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