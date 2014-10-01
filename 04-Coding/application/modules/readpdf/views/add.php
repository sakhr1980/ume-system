<?php echo $error; ?>
<!--<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>readpdf/do_upload">-->
    <?php echo form_open_multipart('readpdf/do_upload'); ?>
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>readpdf/index/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> ត្រលប់ក្រោយ</a>
            <button type="submit" value="upload" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Save</button>
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
                        <h3 class="panel-title">គ្រ​ប់គ្រង់ថ្នាក់</h3>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label for="tbl_read_id" class="col-sm-3 control-label">File Name</label>
                            
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="cla_maj_id">Upload::</label>
                            
                            <input type="file" name="userfile" size="20"/>
                          
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="use_status" class="col-sm-3 control-label">ស្ថានភាព</label>
                        <div class="col-sm-9">
                            <div class="checkbox">
                                <label><input type="checkbox" name="cla_status" id="use_status" value="1" <?php echo set_checkbox('cla_status', 1, TRUE); ?>> ដាក់អោយដំណើរការថ្នាក់នេះ</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>