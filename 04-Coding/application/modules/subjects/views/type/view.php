<?php foreach ($listTypes->result_array() as $typ) {
	$id = $typ['sub_typ_id'];
	$title = $typ['sub_typ_title'];
	$description = $typ['sub_typ_description'];
	$status = $typ['sub_typ_status'];
}
?>
<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
	<div class="left">
		<!--For icon: http://getbootstrap.com/components/-->
		<a href="<?php echo site_url(); ?>subjects/type" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
		<a href="<?php echo site_url(); ?>subjects/type/add" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
		<a href="<?php echo site_url(); ?>subjects/type/edit/<?php echo $id; ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Edit</a>
	</div>
	<div class="right">
		<h1><?php echo $title; ?></h1>
	</div>
</div>
<div class="content">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">View Subject Type</h3>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Title</dt>
				<dd><?php echo $title; ?></dd>
				<dt>Description</dt>
				<dd><?php echo $description;?></dd>
				<dt>Status</dt>
				<dd><?php
						if($status) {
							echo 'Enabled';
						}else {
							echo 'Disabled';
						}
					?></dd>
			</dl>
		</div>
	</div>
</div>

