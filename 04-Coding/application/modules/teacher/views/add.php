<style>
	.pointer{
		cursor:pointer;
	}
	.schedule{
		min-height:65px;
	}
</style>
<form class="form-horizontal" method="post" onsubmit="return false;" id="teacher-form" action="<?php echo site_url('teacher/ajaxSave'); ?>">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <a href="<?php echo site_url('teacher/index/'.$this->uri->segment(4)); ?>" class="btn btn-sm btn-default">
				<i class="glyphicon glyphicon-arrow-left"></i> ត្រលប់ក្រោយ
			</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> រក្សាទុក</button>
            <button type="reset" class="btn btn-sm btn-default" id="btnReset"><i class="glyphicon glyphicon-ban-circle"></i> កែឡើងវិញ</button>
        </div>
        <div class="right">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
    <div class="content">
		<table class="table table-striked">
			<thead>
				<tr>
					<th>Teacher</th>
					<th>Subject</th>
					<th>Class</th>
					<th>Year</th>
					<th>Semester</th>
					<th colspan="2">Academic Year</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<input name="hidden_id" id="hidden_id" type="hidden" value="0"/>
						<?php
							$data_dropdown = array('' => '  Teacher  ') + $staff;
							$selector = set_value('tbl_staff_sta_id');
							$extra = 'class="form-control input-sm required" id="tbl_staff_sta_id"';
							echo form_dropdown('tbl_staff_sta_id',$data_dropdown , $selector, $extra);
						?>
					</td>
					<td>
						<?php
							$data_dropdown = array('' => '  Subject  ') + $subject;
							$selector = set_value('tbl_majors_maj_id');
							$extra = 'class="form-control input-sm required" id="tbl_majors_maj_id"';
							echo form_dropdown('tbl_majors_maj_id',$data_dropdown , $selector, $extra);
						?>
					</td>
					<td>
						<?php
							$data_dropdown = array('' => '  Class  ') + $class;
							$selector = set_value('tbl_classes_cla_id');
							$extra = 'class="form-control input-sm required" id="tbl_classes_cla_id"';
							echo form_dropdown('tbl_classes_cla_id',$data_dropdown , $selector, $extra);
						?>
					</td>
					<td>
						<?php
							$year = array(1=>'I',2=>'II',3=>'III',4=>'IV');
							$data_dropdown = array('' => '  Year  ') + $year;
							$selector = set_value('tea_year');
							$extra = 'class="form-control input-sm required" id="tea_year"';
							echo form_dropdown('tea_year',$data_dropdown , $selector, $extra);
						?>
					</td>
					<td>
						<?php
							$semester = array(1=>'I',2=>'II');
							$data_dropdown = array('' => '  Semester  ') + $semester;
							$selector = set_value('tea_semester');
							$extra = 'class="form-control input-sm required" id="tea_semester"';
							echo form_dropdown('tea_semester',$data_dropdown , $selector, $extra);
						?>
					</td>
					<td>
						<?php
							$data_input = array('name'=>'tea_academic_year',
								'id'=>'tea_academic_year',
								'value'=>set_value('tea_academic_year'),
								'class'=>'form-control input-sm required',
								'placeholder'=>' Academic Year ');
							echo form_input($data_input);									
						?>
					</td>
					<td>
						<button type="button" class="btn btn-primary btn-sm" value="submit" id="btnFilter" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
					</td>
				</tr>
			</tbody>
		</table>
        <div class="row">
            <div class="col-lg-12 col-md-12">
				<div id="content_msg">
				</div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Teacher Record</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striked" id="teacherrecord">
							<thead>
								<tr>
									<th>Date</th>
									<th>Time</th>
									<th>Description</th>
									<th>Total Student</th>
									<th>Total Absent</th>
									<th colspan="2">Other</th>
								</tr>
							</thead>
							<tbody>								
							</tbody>
							<tfoot>
								<tr>									
									<th colspan='7' style="text-align:right;">
										<button type="button" class="btn btn-success" id="btnTeacherRecord"><i class="glyphicon glyphicon-plus-sign"></i></button>
									</th>
								</tr>
							</tfoot>
						</table>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	var index = 0;
	$(document).ready(function(){
		$(document).on('click','#btnTeacherRecord',function(){
			if(valid()==0){
				index++;
				var tt = $('#teacherrecord tbody');
				var tr = '<tr valign="top" id="row_'+index+'">';
				tr += '<td><input type="text" class="form-control required datepicker" name="records['+index+'][date]"/></td>';			
				tr += '<td><input type="text" class="form-control" name="records['+index+'][time]"/></td>';
				tr += '<td><textarea class="form-control" name="records['+index+'][desc]"/></textarea></td>';
				tr += '<td><input type="text" class="form-control" name="records['+index+'][student]"/>';
				tr += '<td><input type="text" class="form-control" name="records['+index+'][absent]"/>';
				tr += '<td><textarea class="form-control" name="records['+index+'][other]"/></textarea></td>';
				tr += '<td style="text-align:right;"><button type="button" id="'+index+'" class="btn btn-warning remove"><i class="glyphicon glyphicon-minus-sign"></i></button></td>';
				tr += '</tr>';
				tt.append(tr);
				
				callDate();
			}
		});
		function callDate(){
			$('.datepicker').datepicker({
				format: "yyyy-mm-dd",
				autoclose: true,
			});
		}
		
		$(document).on('click','.remove',function(){
			var id = $(this).attr('id');
			$('#teacherrecord tbody tr#row_'+id).remove();	
		});				
		
		$(document).on('change blur keyup','.required',function(){
			var th = $(this);
			validateForm(th);
		});
		
		function validateForm(th){			
			var txt = th.val();
			if(txt==''){
				th.parent().addClass('has-error');
				return false;
			}else{
				th.parent().removeClass('has-error');
				return true;
			}
		}
		
		$("#teacher-form").submit(function(){
			if(valid()==0){
				var th = $(this); 
				$.ajax({
					type:'post',
					url:th.attr('action'),
					data:th.serialize(),
					dataType:'json',
					success:function(res){
						if(res.result=='ok'){
							window.location = "<?php echo site_url('teacher');?>";
						}
						
						if(res.result=='exists'){
							var claId = $('select#tbl_classes_cla_id').val();
							var claName =  $('select#tbl_classes_cla_id option[value='+claId+']').html();
							var msg = "The class " + claName + " is already exist!";
							alert(msg);
						}
					}
				});
			}
			return false;
		});
		
		$(document).on('click',"#btnFilter",function(){
			if(valid()==0){
				var th = $(this); 
				$.ajax({
					type:'post',
					url:"<?php echo site_url('teacher/ajaxFilter');?>",
					data:$('#teacher-form').serialize(),
					dataType:'json',
					success:function(res){
						var tt = $('#teacherrecord tbody');
						var tea_id = 0;
						for(ind in res){
							index++;
							var row = res[ind];
							tea_id = row.tbl_teacher_tea_id;
							
							var tr = '<tr valign="top" id="row_'+index+'">';
							tr += '<td><input type="text" class="form-control required datepicker" name="records['+index+'][date]" value="'+row.rec_date+'"/></td>';			
							tr += '<td><input type="text" class="form-control" name="records['+index+'][time]" value="'+row.rec_time+'"/></td>';
							tr += '<td><textarea class="form-control" name="records['+index+'][desc]">'+row.rec_desc+'</textarea></td>';
							tr += '<td><input type="text" class="form-control" name="records['+index+'][student]" value="'+row.rec_student+'"/>';
							tr += '<td><input type="text" class="form-control" name="records['+index+'][absent]" value="'+row.rec_absent+'"/>';
							tr += '<td><textarea class="form-control" name="records['+index+'][other]">'+row.rec_other+'</textarea></td>';
							tr += '<td style="text-align:right;"><button type="button" id="'+index+'" class="btn btn-warning remove"><i class="glyphicon glyphicon-minus-sign"></i></button></td>';
							tr += '</tr>';
							tt.append(tr);
							
						}
						callDate();
						$('#hidden_id').val(tea_id);
					}
				});
			}
			return false;
		});
		
		function valid(){
			var cnt = 0;			
			$.each($('.required'),function(){
				var th = $(this);
				if(!validateForm(th)) cnt++;
			});			
			return cnt;
		}
		
		$(document).on('click','#btnReset',function(){
			index = 0;
			$('input[type=hidden]').val(0);
			$('#teacherrecord tbody').html('');
		});
	});
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Modal title</h4>
			</div>
			<div class="modal-body">
				<div id="items">
					None
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
</form>