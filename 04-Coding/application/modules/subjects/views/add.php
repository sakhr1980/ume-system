<form class="form-horizontal formValidator" role="form" method="post" action="<?php echo site_url(); ?>subjects/create">
	<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<div class="left">
			<!--For icon: http://getbootstrap.com/components/-->
			<a href="<?php echo site_url(); ?>subjects" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
			<button type="submit" name="btn_save" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Save</button>
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
								<input type="text" value="" name="sub_name" class="required"/>
							</div>
						</div>
						<div class="form-group">
							<label for="sub_hours" class="col-sm-2 control-label">Hour *</label>
							<div class="col-md-10">
								<input type="text" value="" id="sub_hours" name="sub_hours" class="requiredNum"/>
							</div>
						</div>
						<div class="form-group">
							<label for="sub_description" class="col-sm-2 control-label">Description *</label>
							<div class="col-md-10">
								<textarea id="sub_description" class="required" name="sub_description" cols="50" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="sub_status" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-10">
								<div class="checkbox">
									<input type="checkbox" name="sub_status" id="sub_status" value="1"/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>