<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <a href="#" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-cog"></i> Create</a>
        <a href="#" class="btn btn-sm btn-primary">Create</a>
        <a href="#" class="btn btn-sm btn-success">Create</a>
        <a href="#" class="btn btn-sm btn-warning">Create</a>
        <a href="#" class="btn btn-sm btn-danger">Create <span class="caret"></span></a>
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="clearfix"></div>
<div class="content">
    <div class="filter">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <div class="col-sm-2">
                    <input type="text" class="form-control input-sm" placeholder="Username">
                </div>
                <div class="col-sm-2">
                    <select class="form-control input-sm" name="role">
                        <option>Test</option>
                        <option>Test</option>
                        <option>Test</option>
                        <option>Test</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <input type="submit" class="btn btn-sm btn-primary" value="Filter">
                </div>
            </div>
        </form>
    </div>
    <table class="table table-hover">
        <tr>
            <th><input type="checkbox" class="checkall" /></th>
            <th>Header</th>
            <th>Header</th>
            <th>Header</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td><input type="checkbox" name="id[]" value="" class="checkid" /></td>
            <td>Data</td>
            <td>Data</td>
            <td>Data</td>
            <td>
                <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>" title="Delete"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
            </td>
        </tr>
        <tr>
            <td><input type="checkbox" name="id[]" value="" class="checkid" /></td>
            <td>Data</td>
            <td>Data</td>
            <td>Data</td>
            <td>
                <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>" title="Delete"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
            </td>
        </tr>
        <tr>
            <td><input type="checkbox" name="id[]" value="" class="checkid" /></td>
            <td>Data</td>
            <td>Data</td>
            <td>Data</td>
            <td>
                <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>" title="Delete"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
            </td>
        </tr>
    </table>
</div>