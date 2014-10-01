<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <a href="<?php echo site_url('teacher/payment/add/'.$this->uri->segment(4)); ?>" class="btn btn-sm btn-warning">
			<i class="glyphicon glyphicon-plus-sign"></i> បង្កើត
		</a>
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>

<div class="content">
    <div class="filter">
        <form class="form-inline" role="form" method="post" action="<?php echo site_url('teacher/payment/index'); ?>">
			<div class="form-group">
				<label class="sr-only" for="tbl_classes_cla_id">Teacher</label>
				<?php
					$data_dropdown = array('' => '  Teacher  ') + $staff;
					$selector = set_value('tbl_staff_sta_id');
					$extra = 'class="form-control input-sm required" id="tbl_staff_sta_id"';
					echo form_dropdown('tbl_staff_sta_id',$data_dropdown , $selector, $extra);
				?>
			</div>
			
            <button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
        </form>
    </div>
    
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div id="content_msg">
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Teacher Payment</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striked">
						<thead>
							<tr>
								<th>Teacher</th>
								<th>Sex</th>
								<th>Hours</th>
								<th>Rate</th>
								<th>Total Amount</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach($data as $row):
								$id = $row['pay_id'];
						?>	
							<tr>
								<td><?php echo $row['sta_name']; ?></td>
								<td><?php echo $row['sta_sex']=='m'?'Male':'Female'; ?></td>
								<td><?php echo $row['hours']; ?></td>
								<td><?php echo $row['rate']; ?></td>
								<td><?php echo ($row['hours'] * $row['rate']); ?></td>
								<td><?php echo $row['start_date']; ?></td>
								<td><?php echo $row['end_date']; ?></td>
								<td>
									<?php
										echo anchor(site_url("teacher/payment/view/$id"),'<i class="glyphicon glyphicon-eye-open"></i> View','class="btn btn-default btn-xs"');
										echo '&nbsp;';
										echo anchor(site_url("teacher/payment/do_print/$id"),'<i class="glyphicon glyphicon-print"></i> Print','class="btn btn-xs btn-warning" target="_blank"');
										echo '&nbsp;';
										echo anchor(site_url("teacher/payment/delete/$id"),'<i class="glyphicon glyphicon-remove-circle"></i> Delete','class="btn btn-default btn-xs" onclick="return confirm(\'Are you sure you want to delete this group?\')"');
										
									?>									
								</td>
							</tr>
						<?php
							endforeach;
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php echo $this->pagination->create_links(); ?>
</div>
<script>
	$(document).ready(function(){
		$(document).on('click','.schedule-delete',function(e){
			e.preventDefault();
			var th = $(this);
			var url = th.attr('href');
			var id = th.attr('id');
			$.get(url,function(response){
				if(response){					
					$('#panel'+id).remove();
				}
			});
		});
	});
</script>

