<?php foreach ($listTypes->result_array() as $sub) {
	$id = $sub['sub_typ_id'];
	$title = $sub['sub_typ_title'];
	$description = $sub['sub_typ_description'];
	$status = $sub['sub_typ_status'];
}
?>
<form class="form-horizontal formValidator" role="form" method="post" action="<?php echo site_url(); ?>subjects/type/update">
	<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<div class="left">
			<!--For icon: http://getbootstrap.com/components/-->
			<a href="<?php echo site_url(); ?>subjects/type/index" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
			<button type="submit" name="btn_update" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Update</button>
			<a class="btn btn-danger btn-sm confirm-delete" href="<?php echo base_url(); ?>subjects/type/delete/<?php echo $sub['sub_typ_id'];?>" title="Delete"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
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
						<h3 class="panel-title">Form Subject Type</h3>
					</div>
					<div class="panel-body">

						<div class="form-group">
							<label for="sub_typ_title" class="col-sm-2 control-label">Title *</label>
							<div class="col-md-10">
								<input type="hidden" value="<?php echo $id;?>" name="sub_typ_id"/>
								<input type="text" value="<?php echo $title; ?>" class="required" name="sub_typ_title"/>
							</div>
						</div>
						<div class="form-group">
							<label for="sub_typ_description" class="col-sm-2 control-label">Description *</label>
							<div class="col-md-10">
								<textarea id="sub_typ_description" class="required" name="sub_typ_description" cols="50" rows="5"><?php echo $description;?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="sub_typ_status" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-10">
								<div class="checkbox">
									<input type="checkbox" name="sub_typ_status" id="sub_typ_status" value="1" <?php echo set_checkbox($status, 1, ($status==1)?TRUE:FALSE); ?>/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>