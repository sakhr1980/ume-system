<form class="form-horizontal formValidator" role="form" method="post" action="<?php echo site_url(); ?>subjects/type/create">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>subjects/type/index" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
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
                        <h3 class="panel-title">Form Subject Type</h3>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label for="sub_typ_title" class="col-sm-2 control-label">Title *</label>
                            <div class="col-md-10">
                                <input type="text" value="" class="required" name="sub_typ_title"/>
                            </div>
                        </div>
						<div class="form-group">
							<label for="sub_typ_description" class="col-sm-2 control-label">Description *</label>
							<div class="col-md-10">
								<textarea id="sub_typ_description" class="required" name="sub_typ_description" cols="50" rows="5"></textarea>
							</div>
						</div>
                    <div class="form-group">
                        <label for="sub_typ_status" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <div class="checkbox">
                                <input type="checkbox" name="sub_typ_status" id="sub_typ_status" value="1"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>