<?php
$data->result_array();
$data = $data->result_array[0];
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>staffs/staffevaluation/edit/<?php
echo $data['sta_eva_id'];
echo '/' . $this->uri->segment(5); // segment(5) for pagination
?>">
	<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<div class="left">
			<!--For icon: http://getbootstrap.com/components/-->
			<a href="<?php echo site_url(); ?>staffs/staffevaluation/index/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
			<button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Update</button>
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
						<h3 class="panel-title">Edit Position</h3>
					</div>
					<div class="panel-body">
                    	<?php echo validation_errors(); ?>
						<div class="form-group">
							<label for="sta_id" class="col-sm-2 control-label">Staff Name</label>
							<div class="col-sm-10">
                            	<?php echo form_dropdown('sta_id', $staffList, set_value('sta_id') ? set_value('sta_id') : $data['sta_id'], 'id="sta_id" class="form-control"'); ?>
							</div>
						</div>
                        <table class="evaluation">
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
                            	<td><?php echo form_input('sta_eva_ability_a', set_value('sta_eva_ability_a') ? set_value('sta_eva_ability_a') : $data['sta_eva_ability_a'], 'id="sta_eva_ability_a" class="form-control" autocomplete="off"'); ?></td>
                            	<td><?php echo form_input('sta_eva_ability_b', set_value('sta_eva_ability_b') ? set_value('sta_eva_ability_b') : $data['sta_eva_ability_b'], 'id="sta_eva_ability_b" class="form-control" autocomplete="off"'); ?></td>
                            	<td><?php echo form_input('sta_eva_ability_c', set_value('sta_eva_ability_c') ? set_value('sta_eva_ability_c') : $data['sta_eva_ability_c'], 'id="sta_eva_ability_c" class="form-control" autocomplete="off"'); ?></td>
                            	<td><?php echo form_input('sta_eva_ability_d', set_value('sta_eva_ability_d') ? set_value('sta_eva_ability_d') : $data['sta_eva_ability_d'], 'id="sta_eva_ability_d" class="form-control" autocomplete="off"'); ?></td>
                            	<td><?php echo form_input('sta_eva_ability_e', set_value('sta_eva_ability_e') ? set_value('sta_eva_ability_e') : $data['sta_eva_ability_e'], 'id="sta_eva_ability_e" class="form-control" autocomplete="off"'); ?></td>
                            </tr>
                        	<tr>
                            	<td>Characteristic</td>
                            	<td><?php echo form_input('sta_eva_characteristic_a', set_value('sta_eva_characteristic_a') ? set_value('sta_eva_characteristic_a') : $data['sta_eva_characteristic_a'], 'id="sta_eva_characteristic_a" class="form-control" autocomplete="off"'); ?></td>
                            	<td><?php echo form_input('sta_eva_characteristic_b', set_value('sta_eva_characteristic_b') ? set_value('sta_eva_characteristic_b') : $data['sta_eva_characteristic_b'], 'id="sta_eva_characteristic_b" class="form-control" autocomplete="off"'); ?></td>
                            	<td><?php echo form_input('sta_eva_characteristic_c', set_value('sta_eva_characteristic_c') ? set_value('sta_eva_characteristic_c') : $data['sta_eva_characteristic_c'], 'id="sta_eva_characteristic_c" class="form-control" autocomplete="off"'); ?></td>
                            	<td><?php echo form_input('sta_eva_characteristic_d', set_value('sta_eva_characteristic_d') ? set_value('sta_eva_characteristic_d') : $data['sta_eva_characteristic_d'], 'id="sta_eva_characteristic_d" class="form-control" autocomplete="off"'); ?></td>
                            	<td><?php echo form_input('sta_eva_characteristic_e', set_value('sta_eva_characteristic_e') ? set_value('sta_eva_characteristic_e') : $data['sta_eva_characteristic_e'], 'id="sta_eva_characteristic_e" class="form-control" autocomplete="off"'); ?></td>
                            </tr>
                        	<tr>
                            	<td>Attendant</td>
                            	<td><?php echo form_input('sta_eva_attendant_a', set_value('sta_eva_attendant_a') ? set_value('sta_eva_attendant_a') : $data['sta_eva_attendant_a'], 'id="sta_eva_attendant_a" class="form-control" autocomplete="off"'); ?></td>
                            	<td><?php echo form_input('sta_eva_attendant_b', set_value('sta_eva_attendant_b') ? set_value('sta_eva_attendant_b') : $data['sta_eva_attendant_b'], 'id="sta_eva_attendant_b" class="form-control" autocomplete="off"'); ?></td>
                            	<td><?php echo form_input('sta_eva_attendant_c', set_value('sta_eva_attendant_c') ? set_value('sta_eva_attendant_c') : $data['sta_eva_attendant_c'], 'id="sta_eva_attendant_c" class="form-control" autocomplete="off"'); ?></td>
                            	<td><?php echo form_input('sta_eva_attendant_d', set_value('sta_eva_attendant_d') ? set_value('sta_eva_attendant_d') : $data['sta_eva_attendant_d'], 'id="sta_eva_attendant_d" class="form-control" autocomplete="off"'); ?></td>
                            	<td><?php echo form_input('sta_eva_attendant_e', set_value('sta_eva_attendant_e') ? set_value('sta_eva_attendant_e') : $data['sta_eva_attendant_e'], 'id="sta_eva_attendant_e" class="form-control" autocomplete="off"'); ?></td>
                            </tr>
                        	<tr>
                            	<td>Course idea</td>
                            	<td><?php echo form_input('sta_eva_idea_a', set_value('sta_eva_idea_a') ? set_value('sta_eva_idea_a') : $data['sta_eva_idea_a'], 'id="sta_eva_idea_a" class="form-control" autocomplete="off"'); ?></td>
                            	<td><?php echo form_input('sta_eva_idea_b', set_value('sta_eva_idea_b') ? set_value('sta_eva_idea_b') : $data['sta_eva_idea_b'], 'id="sta_eva_idea_b" class="form-control" autocomplete="off"'); ?></td>
                            	<td><?php echo form_input('sta_eva_idea_c', set_value('sta_eva_idea_c') ? set_value('sta_eva_idea_c') : $data['sta_eva_idea_c'], 'id="sta_eva_idea_c" class="form-control" autocomplete="off"'); ?></td>
                            	<td><?php echo form_input('sta_eva_idea_d', set_value('sta_eva_idea_d') ? set_value('sta_eva_idea_d') : $data['sta_eva_idea_d'], 'id="sta_eva_idea_d" class="form-control" autocomplete="off"'); ?></td>
                            	<td><?php echo form_input('sta_eva_idea_e', set_value('sta_eva_idea_e') ? set_value('sta_eva_idea_e') : $data['sta_eva_idea_e'], 'id="sta_eva_idea_e" class="form-control" autocomplete="off"'); ?></td>
                            </tr>
                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
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