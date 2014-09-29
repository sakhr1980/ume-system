<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>readpdf/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        <!--<a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>-->
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Book List</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <tr>
                    <th><input type="checkbox" class="checkall" /></th>
                    <th>File name</th>
                    <th>មហារិទ្យាល័យ</th>
<!--                    <th>Created</th>
                    <th>Modified</th>-->
                    <th>Action</th>
                </tr>

                <?php if ($data->num_rows() > 0) { ?>
                    <?php foreach ($data->result_array() as $row) { ?>
                    <?php } ?>
<?php } else { ?>
                    <tr><td colspan="7">Empty</td></tr>
    <?php } ?>
            </table>
        </div>
    </div>
<?php echo $this->pagination->create_links(); ?>
</div>

