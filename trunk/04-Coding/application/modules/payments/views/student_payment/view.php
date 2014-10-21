<?php
$data->result_array();
$data = $data->result_array[0];
?>
<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
	<div class="left">
		<!--For icon: http://getbootstrap.com/components/-->
		<a href="<?php echo site_url(); ?>payments/students/index/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
		<a href="<?php echo site_url(); ?>payments/students/add/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
		<a href="<?php echo site_url(); ?>payments/students/edit/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Edit</a>
	</div>
	<div class="right">
		<h1><?php echo $title; ?></h1>
	</div>
</div>
<div class="content">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">View Student Payments</h3>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Student ID</dt>
				<dd><?php echo $data['tbl_students_stu_id']; ?></dd>
				<dt>Student In Latin</dt>
				<dd><?php echo $data['stu_en_firstname'] . ' ' . $data['stu_en_lastname']; ?></dd>
				<dt>Student In Khmer</dt>
				<dd><?php echo $data['stu_kh_firstname'] . ' ' . $data['stu_kh_lastname']; ?></dd>
				<dt>Sex</dt>
				<dd><?php echo $data['stu_gender']?></dd>
				<dt>Major</dt>
				<dt>Subject</dt>
				<dd><?php echo $data['sub_name']?></dd>
				<dt>Year</dt>
				<dd><?php echo $data['sp_year']; ?></dd>
				<dt>Amounce</dt>
				<dd><?php echo $data['sp_amounce']; ?></dd>
				<dt>Status</dt>
				<dd><?php echo status_string($data['sp_status']); ?></dd>
			</dl>
		</div>
	</div>
</div>