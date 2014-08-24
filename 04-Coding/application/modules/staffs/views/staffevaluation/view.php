<?php
$data->result_array();
$data = $data->result_array[0];
?>
<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
	<div class="left">
		<!--For icon: http://getbootstrap.com/components/-->
		<a href="<?php echo site_url(); ?>staffs/staffevaluation/index/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
		<a href="<?php echo site_url(); ?>staffs/staffevaluation/add/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
		<a href="<?php echo site_url(); ?>staffs/staffevaluation/edit/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Edit</a>
	</div>
	<div class="right">
		<h1><?php echo $title; ?></h1>
	</div>
</div>
<div class="content">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">View Evaluation</h3>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Staff Name</dt>
				<dd><?php echo $data['sta_name']; ?></dd>
                
				<dt>Created</dt>
				<dd><i class="glyphicon glyphicon-calendar"></i> <?php echo get_date_string($data['sta_eva_created']); ?></dd>

				<dt>Modified</dt>
				<dd><i class="glyphicon glyphicon-calendar"></i> <?php echo get_date_string($data['sta_eva_modified']); ?></dd>
            </dl>
            <table class="evaluation" width="100%">
                <tr>
                    <th>Result (%)</th>
                    <th>A (%)</th>
                    <th>B (%)</th>
                    <th>C (%)</th>
                    <th>D (%)</th>
                    <th>E (%)</th>
                </tr>
                <tr>
                    <td>Ability</td>
                    <td><?php echo $data['sta_eva_ability_a']; ?></td> 
                    <td><?php echo $data['sta_eva_ability_b']; ?></td> 
                    <td><?php echo $data['sta_eva_ability_c']; ?></td> 
                    <td><?php echo $data['sta_eva_ability_d']; ?></td> 
                    <td><?php echo $data['sta_eva_ability_e']; ?></td>                          
                </tr>
                <tr>
                    <td>Characteristic</td>
                    <td><?php echo $data['sta_eva_characteristic_a']; ?></td> 
                    <td><?php echo $data['sta_eva_characteristic_b']; ?></td> 
                    <td><?php echo $data['sta_eva_characteristic_c']; ?></td> 
                    <td><?php echo $data['sta_eva_characteristic_d']; ?></td> 
                    <td><?php echo $data['sta_eva_characteristic_e']; ?></td>                          
                </tr>
                <tr>
                    <td>Attendant</td>
                    <td><?php echo $data['sta_eva_attendant_a']; ?></td> 
                    <td><?php echo $data['sta_eva_attendant_b']; ?></td> 
                    <td><?php echo $data['sta_eva_attendant_c']; ?></td> 
                    <td><?php echo $data['sta_eva_attendant_d']; ?></td> 
                    <td><?php echo $data['sta_eva_attendant_e']; ?></td>                          
                </tr>
                <tr>
                    <td>Course Idea</td>
                    <td><?php echo $data['sta_eva_idea_a']; ?></td> 
                    <td><?php echo $data['sta_eva_idea_b']; ?></td> 
                    <td><?php echo $data['sta_eva_idea_c']; ?></td> 
                    <td><?php echo $data['sta_eva_idea_d']; ?></td> 
                    <td><?php echo $data['sta_eva_idea_e']; ?></td>                          
                </tr>
            </table>
		</div>
	</div>
</div>
<style type="text/css">
	table.evaluation tr td, table.evaluation tr th{
		padding: 5px;
		border: 1px solid #000;
	}
	
	table.evaluation tr th {
		text-align: center;
		height: 35px;
	}
</style>