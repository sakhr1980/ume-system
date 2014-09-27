<?php
$mods = array();
$cons = array();
$tass = array();
foreach ($functions->result_array() as $row) {
    $mods[$row['mod_id']] = array(
        'mod_id'=>$row['mod_id'],
        'mod_name'=>$row['mod_name'],
        'mod_foldername'=>$row['mod_foldername'],
        'mod_status'=>$row['mod_status'],
        'mod_created'=>$row['mod_created'],
        'mod_modified'=>$row['mod_modified'],
        'mod_description'=>$row['mod_description']
    );
    if($row['con_moduleid']!='')
    $cons[$row['con_moduleid']][$row['con_id']] = array(
        'con_id'=>$row['con_id'],
        'con_name'=>$row['con_name'],
        'con_controllername'=>$row['con_controllername'],
        'con_description'=>$row['con_description'],
        'con_created'=>$row['con_created'],
        'con_modified'=>$row['con_created'],
        'con_moduleid'=>$row['con_moduleid'],
        'con_status'=>$row['con_status']
    );
    if($row['tas_controllerid']!='')
    $tass[$row['tas_controllerid']][$row['tas_id']] = array(
        'tas_id'=>$row['tas_id'],
        'mod_id'=>$row['mod_id'],
        'con_id'=>$row['con_id'],
        'tas_name'=>$row['tas_name'],
        'tas_functionname'=>$row['tas_functionname'],
        'tas_status'=>$row['tas_status'],
        'tas_created'=>$row['tas_created'],
        'tas_modified'=>$row['tas_modified'],
        'tas_description'=>$row['tas_description']
    );
    
}
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>users/groups/add">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>users/groups/index/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-<?php echo DEFAULTS; ?>"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-sm btn-<?php echo WARNING; ?>"><i class="glyphicon glyphicon-ok-circle"></i> Save</button>
            <button type="reset" class="btn btn-sm btn-<?php echo DEFAULTS; ?>"><i class="glyphicon glyphicon-ban-circle"></i> Reset</button>
        </div>
        <div class="right">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-5">
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Form Create</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="gro_name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="gro_name" placeholder="Group Name" name="gro_name" value="<?php echo set_value('gro_name'); ?>"  pattern=".{2,50}" required title="Allow enter from 2 to 50 characters">
                                <?php echo form_error('gro_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gro_status" class="col-sm-2 control-label">Enable</label>
                            <div class="col-sm-10">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="gro_status" id="gro_status" value="1" <?php echo set_checkbox('gro_status', 1, TRUE); ?>> Check to enable this group</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gro_description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" name="gro_description" id="gro_description"><?php echo set_value('gro_description'); ?></textarea>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            
            <div class="col-md-7">
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Set permission to this group</h3>
                    </div>
                    <div class="panel-body">
                        <p>Check the functions below to allow the permission for this group</p>
                        <a href="#" onclick="jQuery('#table-tree').treetable('expandAll'); return false;"><b>Expand all</b></a> | 
                        <a href="#" onclick="jQuery('#table-tree').treetable('collapseAll'); return false;"><b>Collapse all</b></a>
                        <table id="table-tree">
                            <thead>
                                <tr>
                                    <th>module/controller/function</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <!--Loop for modules-->
                            <?php foreach ($mods as $mod): ?>
                                <tr data-tt-id="<?php echo $mod['mod_id']; ?>">
                                  <td><?php echo $mod['mod_foldername']; ?></td>
                                  <td><?php echo $mod['mod_name']; ?></td>
                                  <td><?php echo $mod['mod_description']; ?></td>
                                </tr>
                                <!--Loop controller-->
                                <?php if(!empty($cons[$mod['mod_id']])){ ?>
                                    <?php foreach ($cons[$mod['mod_id']] as $con): ?>
                                        <tr data-tt-id="<?php echo $con['con_moduleid'].'-'.$con['con_id']; ?>" data-tt-parent-id="<?php echo $con['con_moduleid']; ?>">
                                          <td><?php echo $con['con_controllername']; ?></td>
                                          <td><?php echo $con['con_name']; ?></td>
                                          <td><?php echo $con['con_description']; ?></td>
                                        </tr>
                                        <!--Loop for functions-->
                                        <?php if(!empty($tass[$con['con_id']])){ ?>
                                            <?php foreach ($tass[$con['con_id']] as $tas): ?>
                                                <tr data-tt-id="<?php echo $tas['mod_id'].'-'.$tas['con_id'].'-'.$tas['tas_id']; ?>" data-tt-parent-id="<?php echo $tas['mod_id'].'-'.$tas['con_id']; ?>">
                                                  <td>
                                                      <label>
                                                          
                                                        <input type="checkbox" name="tas_id[]" value="<?php echo $tas['tas_id']; ?>" <?php echo set_checkbox('tas_id[]', $tas['tas_id'], FALSE); ?>>
                                                        <?php echo $tas['tas_functionname']; ?>
                                                      </label>
                                                  </td>
                                                  <td><?php echo $tas['tas_name']; ?></td>
                                                  <td><?php echo $tas['tas_description']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php } ?>
                                    <?php endforeach; ?>

                                <?php } ?>  
                            <?php endforeach; ?>
                          </table>

                    </div>
                </div>

            </div>
        
        </div>
    </div>
</form>
<link href="<?php echo base_url(); ?>dist/plugins/treetable/css/jquery.treetable.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>dist/plugins/treetable/css/jquery.treetable.theme.default.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>dist/plugins/treetable/js/jquery.treetable.js"></script>
<script type="text/javascript">
    $(function(){
        $("#table-tree, #example-basic").treetable({ expandable: true });
        $("#table-tree tbody").on("mousedown", "tr", function() {
            $(".selected").not(this).removeClass("selected");
            $(this).toggleClass("selected");
        });
    });
</script>