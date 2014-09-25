<?php
$mods = array();
$cons = array();
$tass = array();
foreach ($data->result_array() as $row) {
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

//do_dump($mods); echo '<hr />';
//do_dump($cons); echo '<hr />';
//do_dump($tass); echo '<hr />';
//die();
?>

<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>users/module/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create Module</a>
        <a href="<?php echo site_url(); ?>users/controllers/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create Controller</a>
        <a href="<?php echo site_url(); ?>users/functions/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create Function</a>
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="filter">
        <form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>users/functions/index">
            <div class="form-group">
                <label class="sr-only" for="tas_functionname">Function</label>
                <input type="text" class="form-control input-sm" id="tas_functionname" name="tas_functionname" value="<?php echo set_value('tas_functionname',($this->session->userdata('tas_functionname')!='')?$this->session->userdata('tas_functionname'):''); ?>" placeholder="Function name">
            </div>
            <div class="form-group">
                <label class="sr-only" for="mod_id">Module</label>
                <?php echo form_dropdown('mod_id', array(''=>'--All Module--')+$modules, set_value('mod_id', ($this->session->userdata('mod_id'))?$this->session->userdata('mod_id'):''), 'class="form-control input-sm"') ?>
            </div>
            <div class="form-group">
                <label class="sr-only" for="con_id">Controller</label>
                <?php echo form_dropdown('con_id', array(''=>'--All Controller--')+$controllers, set_value('con_id', ($this->session->userdata('con_id'))?$this->session->userdata('con_id'):''), 'class="form-control input-sm"') ?>
            </div>
            
            <div class="form-group">
                <label class="sr-only" for="tas_status">Status</label>
                <?php echo form_dropdown('tas_status', array(''=>'-- All Status --','1'=>'Enabled', '0'=>'Desabled'), set_value('tas_status', ($this->session->userdata('tas_status')!='')?$this->session->userdata('tas_status'):''), 'class="form-control input-sm"') ?>
            </div>
            <button type="submit" class="btn btn-<?php echo PRIMARY; ?> btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
        </form>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Manage module</h3>
        </div>
        <div class="panel-body">
            <table id="table-tree">
                <thead>
                    <tr>
                        <th>module/controller/function</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Modified</th>
                    </tr>
                </thead>
                <!--Loop for modules-->
                <?php foreach ($mods as $mod): ?>
                    <tr data-tt-id="<?php echo $mod['mod_id']; ?>">
                      <td>
                          <?php echo $mod['mod_foldername']; ?>
                          [<a href="<?php echo base_url(); ?>users/module/edit/<?php echo $mod['mod_id']; echo '/'.$this->uri->segment(4); ?>">Edit</a>]
                          [<a href="<?php echo base_url(); ?>users/module/delete/<?php echo $mod['mod_id']; echo '/'.$this->uri->segment(4); ?>" onclick="return confirm('Are you want to delete this module? All controller will be lose. It is not affected to file.')">Delete</a>]
                      </td>
                      <td><?php echo $mod['mod_name']; ?></td>
                      <td><?php echo status_string($mod['mod_status']); ?></td>
                      <td><?php echo get_date_string($row['mod_created']); ?></td>
                      <td><?php echo get_date_string($row['mod_modified']); ?></td>
                    </tr>
                    <!--Loop controller-->
                    <?php if(!empty($cons[$mod['mod_id']])){ ?>
                        <?php foreach ($cons[$mod['mod_id']] as $con): ?>
                            <tr data-tt-id="<?php echo $con['con_moduleid'].'-'.$con['con_id']; ?>" data-tt-parent-id="<?php echo $con['con_moduleid']; ?>">
                              <td>
                                  <?php echo $con['con_controllername']; ?>
                                  [<a href="<?php echo base_url(); ?>users/controllers/edit/<?php echo $con['con_id']; echo '/'.$this->uri->segment(4); ?>">Edit</a>]
                                  [<a href="<?php echo base_url(); ?>users/controllers/delete/<?php echo $con['con_id']; echo '/'.$this->uri->segment(4); ?>" onclick="return confirm('Are you want to delete this Controller? All functions will be lose. It is affected to file.')">Delete</a>]
                              </td>
                              <td><?php echo $con['con_name']; ?></td>
                              <td><?php echo status_string($con['con_status']); ?></td>
                              <td><?php echo get_date_string($con['con_created']); ?></td>
                              <td><?php echo get_date_string($con['con_modified']); ?></td>
                            </tr>
                            <!--Loop for functions-->
                            <?php if(!empty($tass[$con['con_id']])){ ?>
                                <?php foreach ($tass[$con['con_id']] as $tas): ?>
                                    <tr data-tt-id="<?php echo $tas['mod_id'].'-'.$tas['con_id'].'-'.$tas['tas_id']; ?>" data-tt-parent-id="<?php echo $tas['mod_id'].'-'.$tas['con_id']; ?>">
                                      <td>
                                          <?php echo $tas['tas_functionname']; ?>
                                          [<a href="<?php echo base_url(); ?>users/functions/edit/<?php echo $tas['tas_id']; echo '/'.$this->uri->segment(4); ?>">Edit</a>]
                                          [<a href="<?php echo base_url(); ?>users/functions/delete/<?php echo $tas['tas_id']; echo '/'.$this->uri->segment(4); ?>" onclick="return confirm('Are you want to delete this task (Function)?')">Delete</a>]
                                      </td>
                                      <td><?php echo $tas['tas_name']; ?></td>
                                      <td><?php echo status_string($tas['tas_status']); ?></td>
                                      <td><?php echo get_date_string($tas['tas_created']); ?></td>
                                      <td><?php echo get_date_string($tas['tas_modified']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } ?>
                        <?php endforeach; ?>
                        
                    <?php } ?>  
                <?php endforeach; ?>
              </table>
            
            
        </div>
    </div>
    <?php echo $this->pagination->create_links(); ?>
</div>

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

