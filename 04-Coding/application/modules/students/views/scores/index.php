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
	<ul class="nav nav-tabs" role="tablist" id="scoreTab">
		<li class="active"><a href="#subjects" role="tab" data-toggle="tab">Subjects</a></li>
		<li><a href="#semester1" role="tab" data-toggle="tab">First Semester</a></li>
		<li><a href="#semester2" role="tab" data-toggle="tab">Second Semester</a></li>
		<li><a href="#final" role="tab" data-toggle="tab">Final</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="subjects">
			<?php $this->load->view('students/scores/subjects'); ?>
		</div>
		<div class="tab-pane" id="semester1">
			<?php //$this->load->view('students/scores/first-semester'); ?>
		</div>
		<div class="tab-pane" id="semester2">
			<?php //$this->load->view('students/scores/second-semester'); ?>
		</div>
		<div class="tab-pane" id="final">
			<?php //$this->load->view('students/scores/final'); ?>
		</div>
	</div>
	<?php echo $this->pagination->create_links(); ?>
</div>