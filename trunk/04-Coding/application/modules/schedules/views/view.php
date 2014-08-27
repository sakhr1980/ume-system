<?php
$data->result_array();
$data = $data->result_array[0];
?>
<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
	<div class="left">
		<!--For icon: http://getbootstrap.com/components/-->
		<a href="<?php echo site_url(); ?>classes/index/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
		<a href="<?php echo site_url(); ?>classes/add/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
		<a href="<?php echo site_url(); ?>classes/edit/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Edit</a>
	</div>
	<div class="right">
		<h1><?php echo $title; ?></h1>
	</div>
</div>
<div class="content">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">View Class</h3>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Name</dt>
				<dd><?php echo $data['cla_name']; ?></dd>
				<dt>Capacity</dt>
				<dd><?php echo $data['cla_capacity']; ?></dd>
				<dt>Major</dt>
				<dd><?php echo $data['maj_name']; ?></dd>
				<dt>Shift</dt>
				<dd><?php echo $data['shi_name']; ?></dd>
				<dt>Status</dt>
				<dd><?php echo status_string($data['cla_status']); ?></dd>
				<dt>Created</dt>
				<dd><i class="glyphicon glyphicon-calendar"></i> <?php echo get_date_string($data['cla_create_date']); ?></dd>
				<dt>Modified</dt>
				<dd><i class="glyphicon glyphicon-calendar"></i> <?php echo get_date_string($data['cla_modified_date']); ?></dd>
			</dl>
		</div>
	</div>
</div>