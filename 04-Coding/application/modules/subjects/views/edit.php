<?php foreach ($listSubjects->result_array() as $sub) {
	$id = $sub['sub_id'];
	$title = $sub['sub_name'];
	$hour = $sub['sub_hours'];
	$description = $sub['sub_description'];
	$status = $sub['sub_status'];
}
?>
<form class="form-horizontal formValidator" role="form" method="post" action="<?php echo site_url(); ?>subjects/update">
	<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<div class="left">
			<!--For icon: http://getbootstrap.com/components/-->
			<a href="<?php echo site_url(); ?>subjects" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
			<button type="submit" name="btn_update" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Update</button>
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
						<h3 class="panel-title">Form Subject</h3>
					</div>
					<div class="panel-body">
						<input type="hidden" value="<?php echo $id;?>" name="sub_id"/>
						<div class="form-group">
							<label for="sub_typ_id" class="col-sm-2 control-label">Type</label>
							<div class="col-md-10">
								<select name="sub_typ_id">
									<?php foreach ($getTypes->result_array() as $typ) {
										echo '<option value="'.$typ['sub_typ_id'].'">'.$typ['sub_typ_title'].'</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="sub_title" class="col-sm-2 control-label">Title *</label>
							<div class="col-md-10">
								<input type="text" class="required" value="<?php echo $title;?>" name="sub_name"/>
							</div>
						</div>
						<div class="form-group">
							<label for="sub_hours" class="col-sm-2 control-label">Hour *</label>
							<div class="col-md-10">
								<input type="text" class="requiredNum" value="<?php echo $hour;?>" id="sub_hours" name="sub_hours"/>
							</div>
						</div>
						<div class="form-group">
							<label for="sub_description" class="col-sm-2 control-label">Description *</label>
							<div class="col-md-10">
								<textarea id="sub_description" class="required" name="sub_description" cols="50" rows="5"><?php echo $description;?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="sub_status" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-10">
								<div class="checkbox">
									<input type="checkbox" name="sub_status" id="sub_status" value="1" <?php echo set_checkbox($status, 1, ($status==1)?TRUE:FALSE); ?>/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>