<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
	<div class="left">
		<a href="<?php echo site_url(); ?>payments/students/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
	</div>
	<div class="right">
		<h1><?php echo $title; ?></h1>
	</div>
</div>
<div class="content">
	<div class="filter">
		<form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>payments/students/index">
			<div class="form-group">
				<label class="sr-only" for="stu_name">Student ID</label>
				<input type="text" class="form-control input-sm" id="stu_id" name="stu_id" value="<?php echo set_value('stu_id'); ?>" placeholder="Student ID">
			</div>
			<div class="form-group">
				<label class="sr-only" for="stu_name">Student Name</label>
				<input type="text" class="form-control input-sm" id="stu_name" name="stu_name" value="<?php echo set_value('stu_name'); ?>" placeholder="Student Name">
			</div>
			<div class="form-group">
				<label class="sr-only" for="stu_name">Student Khmer Name</label>
				<input type="text" class="form-control input-sm" id="stu_kh_name" name="stu_kh_name" value="<?php echo set_value('stu_kh_name'); ?>" placeholder="Student Khmer Name">
			</div>
			<div class="form-group">
				<label class="sr-only" for="sp_year">Year</label>
				<input type="text" class="form-control input-sm" id="sp_year" name="sp_year" value="<?php echo set_value('sp_year'); ?>" placeholder="Year">
			</div>
<!--			<div class="form-group">
				<label class="sr-only" for="sp_status">Status</label>
				<?php echo form_dropdown('sp_status', array('' => '-- All Status --', '1' => 'Enabled', '0' => 'Disabled'), set_value('sp_status', $this->session->userdata('sp_status')), 'class="form-control input-sm"') ?>
			</div>-->
			<button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
		</form>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Student Payments List</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th><input type="checkbox" class="checkall" /></th>
						<th>Student Name In Latin</th>
						<th>Student Name In Khmer</th>
						<th>Sex</th>
						<th>Major</th>
						<th>Subject</th>
						<th>Payment Date</th>
						<th>Year</th>
						<th>Amounce</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($studentPayments->num_rows() > 0) { ?>
						<?php foreach ($studentPayments->result_array() as $row) { ?>
							<tr>
								<td><input type="checkbox" name="id[]" value="<?php $row['sp_id'] ?>" class="checkid" /></td>
								<td><?php echo $row['stu_en_firstname'] . ' ' . $row['stu_en_lastname']; ?></td>
								<td><?php echo $row['stu_kh_firstname'] . ' ' . $row['stu_kh_lastname']; ?></td>
								<td><?php echo $row['stu_gender'] ?></td>
								<td><?php echo $row['maj_name'] ?></td>
								<td><?php echo $row['sub_name']; ?></td>
								<td><?php echo $row['sp_date_pay']; ?></td>
								<td><?php echo $row['sp_year']; ?></td>
								<td><?php echo '$ ' . $row['sp_amounce']; ?></td>
								<td><?php echo status_string($row['sp_status']); ?></td>
								<td>
									<a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>payments/students/view/<?php
									echo $row['sp_id'];
									echo '/' . $this->uri->segment(4);
									?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
									<a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>payments/students/edit/<?php
									echo $row['sp_id'];
									echo '/' . $this->uri->segment(4);
									?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
									<a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>payments/students/delete/<?php
									echo $row['sp_id'];
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