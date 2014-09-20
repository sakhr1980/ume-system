<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <a href="<?php echo site_url('teacher/add/'.$this->uri->segment(4)); ?>" class="btn btn-sm btn-warning">
			<i class="glyphicon glyphicon-plus-sign"></i> បង្កើត
		</a>
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>

<div class="content">
    <div class="filter">
        <form class="form-inline" role="form" method="post" action="<?php echo site_url('teacher/index'); ?>">
			<div class="form-group">
				<label class="sr-only" for="tbl_classes_cla_id">Teacher</label>
				<?php
					$data_dropdown = array('' => '  Teacher  ') + $staff;
					$selector = set_value('tbl_staff_sta_id');
					$extra = 'class="form-control input-sm required" id="tbl_staff_sta_id"';
					echo form_dropdown('tbl_staff_sta_id',$data_dropdown , $selector, $extra);
				?>
			</div>
			<div class="form-group">
				<label class="sr-only" for="cla_maj_id">Subject</label>
				<?php
					$data_dropdown = array('' => '  Subject  ') + $major;
					$selector = set_value('cla_maj_id');
					$extra = 'class="form-control input-sm"';
					echo form_dropdown('cla_maj_id',$data_dropdown, $selector, $extra); 
				?>
			</div>
			<div class="form-group">				
				<label class="sr-only" for="tbl_shift_shi_id">Class</label>
				<?php
					$data_dropdown = array('' => '  Class  ') + $class;
					$selector = set_value('tbl_classes_cla_id');
					$extra = 'class="form-control input-sm required" id="tbl_classes_cla_id"';
					echo form_dropdown('tbl_classes_cla_id',$data_dropdown , $selector, $extra);
				?>
			</div>			
			<div class="form-group">
				<label class="sr-only" for="cla_name">ឆ្នាំ</label>
				<?php
					$year = array(1=>'I',2=>'II',3=>'III',4=>'IV');
					$data_dropdown = array('' => '  Year  ') + $year;
					$selector = set_value('tea_year');
					$extra = 'class="form-control input-sm required" id="tea_year"';
					echo form_dropdown('tea_year',$data_dropdown , $selector, $extra);
				?>
			</div>
			<div class="form-group">
				<label class="sr-only" for="cla_name">ឆមាស</label>
				<?php
					$semester = array(1=>'I',2=>'II');
					$data_dropdown = array('' => '  Semester  ') + $semester;
					$selector = set_value('tea_semester');
					$extra = 'class="form-control input-sm required" id="tea_semester"';
					echo form_dropdown('tea_semester',$data_dropdown , $selector, $extra);
				?>
			</div>
			<div class="form-group">
				<label class="sr-only" for="cla_capacity">ឆ្នាំសិក្សា</label>
				<?php
					$data_input = array('name'=>'tea_academic_year',
						'id'=>'academic_year',
						'value'=>set_value('tea_academic_year'),
						'class'=>'form-control input-sm required',
						'placeholder'=>' Academic Year ');
					echo form_input($data_input);									
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
					<h3 class="panel-title">Teacher Record</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striked">
						<thead>
							<tr>
								<th>Teacher</th>
								<th>Subject</th>
								<th>Class</th>
								<th>Year</th>
								<th>Semester</th>
								<th>Academic Year</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach($data as $row):
						?>	
							<tr>
								<td><?php echo $row['sta_name']; ?></td>
								<td><?php echo $row['maj_name']; ?></td>
								<td><?php echo $row['cla_name']; ?></td>
								<td><?php echo $row['tea_year']; ?></td>
								<td><?php echo $row['tea_semester']; ?></td>
								<td><?php echo $row['tea_academic_year']; ?></td>
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

