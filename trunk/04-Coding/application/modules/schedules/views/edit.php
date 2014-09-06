<style>
	.pointer{
		cursor:pointer;
	}
	.schedule{
		min-height:65px;
	}
</style>
<form class="form-horizontal" id="schedule-form" method="post" onsubmit="return false;" action="<?php echo site_url('schedules/ajaxUpdate/'.$data['header']->sch_id); ?>">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <a href="<?php echo site_url('schedules/index/'.$this->uri->segment(4)); ?>" class="btn btn-sm btn-default">
				<i class="glyphicon glyphicon-arrow-left"></i> ត្រលប់ក្រោយ
			</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> រក្សាទុក</button>
            <button type="reset" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-ban-circle"></i> កែឡើងវិញ</button>
        </div>
        <div class="right">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
    <div class="content">

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">កាលវិភាគ</h3>
                    </div>
					<?php
						$header = $data['header'];
						$body = $data['body'];
					?>
                    <div class="panel-body">
                        <div class="row form-group">                                        
                            <div class="col-lg-3 col-md-3">
								<label for="fac_id">ថ្នាក់</label> 
								<?php
									$data_dropdown = array('' => '   ថ្នាក់  ') + $class;
									$selector = set_value('tbl_classes_cla_id',$data['header']->tbl_classes_cla_id);
									$extra = 'class="form-control input-sm required" id="tbl_classes_cla_id"';
									echo form_dropdown('tbl_classes_cla_id',$data_dropdown , $selector, $extra);
									echo form_error('tbl_classes_cla_id');
								?>
                            </div>							
							<div class="col-lg-3 col-md-3">
								<label for="tbl_majors_maj_id">សកលវិទ្យាល័យ</label>
								<?php
									$data_dropdown_value = array('' => '  សកលវិទ្យាល័យ  ');
									$selector = set_value('tbl_majors_maj_id');
									$extra = 'class="form-control input-sm" id="tbl_majors_maj_id"';
									echo form_dropdown('tbl_majors_maj_id',$data_dropdown_value , $selector, $extra);
									echo form_error('tbl_majors_maj_id');
								?>								
                            </div>
							<div class="col-lg-3 col-md-3">
								<label for="tbl_majors_maj_id">ជំនាន់</label>
								<?php
									$data_dropdown_value = array('' => '  ជំនាន់  ');
									$selector = set_value('tbl_generation_gen_id');
									$extra = 'class="form-control input-sm" id="tbl_generation_gen_id"';
									echo form_dropdown('tbl_generation_gen_id',$data_dropdown_value , $selector, $extra);
								?>								
                            </div>
							<div class="col-lg-3 col-md-3">
								<label for="tbl_shift_shi_id">ម៉ោងសិក្សា</label>
								<?php
									$data_dropdown_value = array('' => '  ម៉ោងសិក្សា  ');
									$selector = set_value('tbl_shift_shi_id');
									$extra = 'class="form-control input-sm" id="tbl_shift_shi_id"';
									echo form_dropdown('tbl_shift_shi_id',$data_dropdown_value , $selector, $extra);
									echo form_error('tbl_shift_shi_id');
								?>
							</div>
                        </div>
                        
                        <div class="row form-group">							
							<div class="col-lg-3 col-md-3">
								<label for="cla_name">ឆ្នាំ</label>
                                <?php 
									$data_dropdown_value = array(''=>'  ឆ្នាំ  ','1'=>'I','2'=>'II','3'=>'III','4'=>'IV');
									$selected = set_value('sch_year_number',$data['header']->sch_year_number);
									$extra = 'class="form-control input-sm required" id="sch_year_number"';
									echo form_dropdown('sch_year_number',$data_dropdown_value,$selected,$extra);
									echo form_error('sch_year_number');
								?>
							</div>
							<div class="col-lg-3 col-md-3">
								<label for="cla_name">ឆមាស</label>
								<?php 
									$data_dropdown_value = array(''=>'  ឆមាស  ','1'=>'I','2'=>'II');
									$selected = set_value('sch_semester',$data['header']->sch_semester);
									$extra = 'class="form-control input-sm required" id="sch_semester"';
									echo form_dropdown('sch_semester',$data_dropdown_value,$selected,$extra);
									echo form_error('sch_semester');
								?>
							</div>
							<div class="col-lg-3 col-md-3">
								<label for="cla_capacity">ឆ្នាំសិក្សា</label>
								<?php
									$data_input = array('name'=>'sch_academic_year',
										'id'=>'sch_academic_year',
										'value'=>set_value('sch_academic_year',$data['header']->sch_academic_year),
										'class'=>'form-control input-sm required',
										'placeholder'=>'ឆ្នាំសិក្សា');
									echo form_input($data_input);									
								?>
							</div>
						</div>
						<?php
							$times = $body['times'];
							$sections = $body['sections'];
							$num = 0;
							foreach($times as $indd=>$time):
								$section = $sections[$indd];
								$num = count($section);
								break;
							endforeach;
						?>
						<table class="table table-bordered" id="timetable">
							<thead>
								<tr>
									<th width="20%">Time of Study</th>
									<?php if($num==2){ ?>
									<th>Saturday</th>
									<th>Sunday</th>
									<?php }else{ ?>
									<th>Monday</th>
									<th>Tuesday</th>
									<th>Wednesday</th>
									<th>Thursday</th>
									<th>Friday</th>
									<?php } ?>
									<th width="10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php								
								//print_r($sections);
								$index = 0;
								foreach($times as $ind=>$time):
									$index = $ind;
								?>
									<tr id="row_<?php echo $index; ?>">
										<td><input type="text" id="time_<?php echo $ind;?>" class="form-control required" value="<?php echo set_value('times[$ind]',$time);?>" name="times[<?php echo $ind;?>]"/></td>
										<?php
											$section = $sections[$ind];
											for($j=1;$j<=count($section);$j++){
												$id = $ind.'_'.$j;
												$tmp = $section[$j];
												$teacher = $tmp['teacher'];
												$tname = $tmp['teacher_name'];
												$room = $tmp['room'];
												$rname = $tmp['room_name'];
												$subject = $tmp['subject'];
												$sname = $tmp['subject_name'];
										?>
										<td>
											<input type="hidden" id="<?php echo 'Teacher_'.$id;?>" class="form-control" name="sections[<?php echo $ind;?>][<?php echo $j;?>][teacher]" value=""/>
											<input type="hidden" id="<?php echo 'Room_'.$id;?>" class="form-control" name="sections[<?php echo $ind;?>][<?php echo $j;?>][room]" value=""/>
											<input type="hidden" id="<?php echo 'Subject_'.$id;?>" class="form-control" name="sections[<?php echo $ind;?>][<?php echo $j;?>][subject]" value=""/>										
											<button type="button" data-label="Teacher" data-id="<?php echo $id;?>" data-day="<?php echo $j;?>" class="btn btn-default btn-xs btn-block myModal">
												<?php
													echo $tname==''?'Teacher':$tname;
												?>
											</button>										
											<button type="button" data-label="Room" data-id="<?php echo $id;?>" data-day="<?php echo $j;?>" class="btn btn-default btn-xs btn-block myModal">
												<?php
													echo $rname==''?'Room':$rname;
												?>
											</button>										
											<button type="button" data-label="Subject" data-id="<?php echo $id;?>" data-day="<?php echo $j;?>" class="btn btn-default btn-xs btn-block myModal">
												<?php
													echo $sname==''?'Subject':$sname;
												?>
											</button>
										</td>
										<?php } ?>	
										<td style="text-align:right;">
											<?php if($index>0){ ?>
											<button type="button" id="<?php echo $ind;?>" class="btn btn-default remove">Remove</button>
											<?php } ?>
										</td>
									</tr>
								<?php
									$index = $ind;
								endforeach;
								?>
							</tbody>
							<tfoot>
								<tr>									
									<td colspan='8' style="text-align:right;">
										<button type="button" class="btn btn-default" id="btnTimeTable">Add &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</button>
									</td>
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
	var index = '<?php echo $index;?>';
	var btn_id = '';
	var btn_html = '';
	var btn = '';
	var title = '';
	var major = '';
	var shift = '';
	var year = '';
	var academic = '';
	var semester = '';
	var trs_id = ''; //t->teacher,r->room,s->subject
	var trs_name = '';
	var obj = '';
	var isWeekend = false;
	var numRow = parseInt('<?php echo $num;?>');
	if(numRow==2) isWeekend = true;
	$(document).ready(function(){
		$(document).on('click','#btnTimeTable',function(){
			index++;
			var tt = $('#timetable tbody');
			var tr = '<tr id="row_'+index+'">';
			tr += '<td><input type="text" id="time_'+index+'" class="form-control required" name="times['+index+']"/></td>';
			var num = 6;
			if(isWeekend) num = 3;
			for(var sind= 1; sind<num; sind++){
				var id = index + '_' + sind;				
				tr += '<td>';
				tr += '	<input type="hidden" id="Teacher_'+id+'" class="form-control" name="sections['+index+']['+sind+'][teacher]" value=""/>';
				tr += '	<input type="hidden" id="Room_'+id+'" class="form-control" name="sections['+index+']['+sind+'][room]" value=""/>';
				tr += '	<input type="hidden" id="Subject_'+id+'" class="form-control" name="sections['+index+']['+sind+'][subject]" value=""/>';
				tr += '	<button type="button" data-label="Teacher" data-id="'+id+'" data-day="'+sind+'" class="btn btn-default btn-xs btn-block myModal">Teacher</button>';										
				tr += '	<button type="button" data-label="Room" data-id="'+id+'" data-day="'+sind+'" class="btn btn-default btn-xs btn-block myModal">Room</button>';										
				tr += ' <button type="button" data-label="Subject" data-id="'+id+'" data-day="'+sind+'" class="btn btn-default btn-xs btn-block myModal">Subject</button>';
				tr += '	</td>';
			}
			tr += '<td style="text-align:right;"><button type="button" id="'+index+'" class="btn btn-default remove">Remove</button></td>';
			tr += '</tr>';
			tt.append(tr);
		});
		
		$(document).on('click','.remove',function(){
			var id = $(this).attr('id');
			$('#timetable tbody tr#row_'+id).remove();	
		});
		
		$(document).on('click','.btn-xs.btn-block.myModal',function(){
			obj = $(this);
			btn_html = obj.html(); 
			btn = obj.attr('data-label');
			btn_id = obj.attr('data-id');
			var tmps = btn_id.split('_');
			var sday = obj.attr('data-day');
			var stime = $('#time_'+tmps[0]).val();
			var ssection = $('#timetable tbody tr#row_'+tmps[0]).index()+1;
			cla_id = $('#tbl_classes_cla_id').val();
			year = $('#sch_year_number').val();
			semester = $('#sch_semester').val();
			academic = $('#sch_academic_year').val();
			trs_id = '';
			
			$.each($('.required'),function(){
				var th = $(this);
				validateForm(th);
			});
			
			if(cla_id!='' && year != '' && academic != '' && semester != '' && ssection!='' && stime != ''){
				var fn = 'ajax' + btn;
				var url = '<?php echo site_url('schedules/');?>/' + fn;
				var dataString = {cla_id:cla_id,year:year,semester:semester,academic:academic,sday:sday,stime:stime,ssection:ssection};
				$.ajax({
					url:url,
					type:'post',
					data:dataString,
					dataType:'json',
					success:function(response){
						var res = '<div class="row">';
						res += '<div class="col col-lg-3 col-md-2">';
						res += '<div class="panel panel-primary pointer">';
						res += '<div class="schedule panel-body" data-id="">None</div>';
						res += '</div>';
						res += '</div>';
						for(ind in response){
							var data = response[ind];
							res += '<div class="col col-lg-3 col-md-3">';
							res += '<div class="panel panel-primary pointer">';
							res += '<div class="schedule panel-body" data-id="'+data.id+'">' + data.name + '</div>';
							res += '</div>';
							res += '</div>';
						}
						res += '</div>';
						$('#items').html(res);
						$('#myModalLabel').html(btn_html);
					}
				});				
				$('#myModal').modal('show');
			}else{
				//todo show message
			}
		});
		
		$(document).on('click','#btnSave',function(){
			var tmp_btn_id = btn + '_' + btn_id;
			$('#'+tmp_btn_id).val(trs_id);
			if(trs_id=='') 
				obj.html(btn);
			else
				obj.html(trs_name);
			$('#myModal').modal('hide')
		});
		$(document).on('click','.schedule',function(){
			var th = $(this);
			$('.schedule').removeClass('bg-primary');
			trs_id = th.attr('data-id');
			trs_name = th.html();
			th.addClass('bg-primary');
		});
		
		$(document).on('change','#tbl_classes_cla_id',function(){
			var th = $(this);
			var id = th.val();
			changeClassBy(id,$(this));
		});
		
		var id = '<?php echo $data['header']->tbl_classes_cla_id;?>';
		changeClassBy(id,'');
		
		function changeClassBy(id,pObj){
			if(id!=''){
				var url = "<?php echo site_url('schedules/ajaxClass/');?>/"+id;
				$.ajax({
					type:'get',
					url:url,
					dataType:'json',
					success:function(res){
						addOrRemoveSelect('#tbl_majors_maj_id',res.maj_id,res.maj_name);
						addOrRemoveSelect('#tbl_shift_shi_id',res.shi_id,res.shi_name);
						addOrRemoveSelect('#tbl_generation_gen_id',res.gen_id,res.gen_title);
						
						var th = '<tr>';
						th += '<th width="20%">Time of Study</th>';
						var match = res.shi_name.match(/weeken/gi);
						if(match!=null){
							isWeekend = true;
							th += '<th>Statuday</th>';
							th += '<th>Sunday</th>';
						}else{
							th += '<th>Monday</th>';
							th += '<th>Tuesday</th>';
							th += '<th>Wednesday</th>';
							th += '<th>Thursday</th>';
							th += '<th>Friday</th>';
						}
						th += '<th width="10%">Action</th>';
						th += '</tr>'
						$('#timetable thead').html(th);
						if(pObj!='')
							$('#timetable tbody').html('');
					}
				});
			}else{
				addOrRemoveSelect('#tbl_majors_maj_id','','');
				addOrRemoveSelect('#tbl_shift_shi_id','','');
				addOrRemoveSelect('#tbl_generation_gen_id','','');
				$('#timetable thead').html('');
			}
		}
		function addOrRemoveSelect(eleId,id,val){
			$(eleId+' [value!=""]').remove();
			if(id>0 && typeof(id)!='undifined'){
				$(eleId).get(0).options[1] = new Option(val, id);
				$(eleId).val(id);
			}	
		}
		
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
		
		$("#schedule-form").submit(function(){
			var clas = $('#tbl_classes_cla_id').val();
			var year = $('#sch_year_number').val();
			var semester = $('#sch_semester').val();
			var academic = $('#sch_academic_year').val();
			
			var cnt = 0;			
			$.each($('.required'),function(){
				var th = $(this);
				if(!validateForm(th)) cnt++;
			});
			
			if(clas!='' && year!='' && semester!='' && academic != '' && cnt==0){
				var th = $(this); 
				$.ajax({
					type:'post',
					url:th.attr('action'),
					data:th.serialize(),
					dataType:'json',
					success:function(res){
						if(res.result=='ok'){
							window.location = "<?php echo site_url('schedules');?>";
						}
					}
				});
			}
			return false;
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
				<button type="button" class="btn btn-primary" id="btnSave">Save changes</button>
			</div>
		</div>
	</div>
</div>
</form>