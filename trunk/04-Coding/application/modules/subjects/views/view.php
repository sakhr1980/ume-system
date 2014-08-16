<?php foreach ($listSubject->result_array() as $sub) {
	$id = $sub['sub_id'];
	$type = $sub['sub_typ_title'];
	$title = $sub['sub_name'];
	$hour = $sub['sub_hours'];
	$description = $sub['sub_description'];
	$status = $sub['sub_status'];
}
?>
<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>subjects" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
        <a href="<?php echo site_url(); ?>subjects/add" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        <a href="<?php echo site_url(); ?>subjects/edit/<?php echo $id; ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Edit</a>
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">View Subject</h3>
        </div>
        <div class="panel-body">
            <dl class="dl-horizontal">
				<dt>Type</dt>
				<dd><?php echo $type; ?></dd>
                <dt>Title</dt>
                <dd><?php echo $title; ?></dd>
                <dt>Hour</dt>
                <dd><?php echo $hour; ?></dd>
                <dt>Description</dt>
                <dd><?php echo $description;?></dd>
				<dt>Status</dt>
				<dd><?php
					if($status) {
						echo 'Active';
					}else {
						echo 'Deactive';
					}
					?>
				</dd>
            </dl>
        </div>
    </div>
</div>

