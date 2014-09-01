<style>
	.pointer{
		cursor:pointer;
	}
</style>
<form class="form-horizontal" method="post" action="<?php echo site_url('schedules/edit'); ?>">
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
					?>
                    <div class="panel-body">
                        <div class="row form-group">                                        
                            <div class="col-lg-4 col-md-4">
								<label for="fac_id">ឈ្មោះ</label> 
								<?php
									$data = array('name'=>'sch_title',
										'id'=>'sch_title',
										'value'=>set_value('sch_title',$header->sch_title),
										'class'=>'form-control input-sm',
										'placeholder'=>'ឈ្មោះ');
									echo form_input($data);
									echo form_error('sch_title');
								?>
                            </div>
							<div class="col-lg-4 col-md-4">
								<label for="tbl_majors_maj_id">សកលវិទ្យាល័យ</label>
								<?php
									$data_dropdown_value = array('' => '  សកលវិទ្យាល័យ  ') + $major;
									$selector = set_value('tbl_majors_maj_id',$header->tbl_majors_maj_id);
									$extra = 'class="form-control input-sm" id="tbl_majors_maj_id"';
									echo form_dropdown('tbl_majors_maj_id',$data_dropdown_value , $selector, $extra);
									echo form_error('tbl_majors_maj_id');
								?>								
                            </div>
							<div class="col-lg-4 col-md-4">
								<label for="tbl_shift_shi_id">ម៉ោងសិក្សា</label>
								<?php
									$data_dropdown_value = array('' => '  ម៉ោងសិក្សា  ') + $shift;
									$selector = set_value('tbl_shift_shi_id',$header->tbl_shift_shi_id);
									$extra = 'class="form-control input-sm" id="tbl_shift_shi_id"';
									echo form_dropdown('tbl_shift_shi_id',$data_dropdown_value , $selector, $extra);
									echo form_error('tbl_shift_shi_id');
								?>
							</div>
                        </div>
                        
                        <div class="row form-group">
							<div class="col-lg-4 col-md-4">
								<label for="cla_name">ឆ្នាំ</label>
                                <?php 
									$data_dropdown_value = array(''=>'  ឆ្នាំ  ','1'=>'I','2'=>'II','3'=>'III','4'=>'IV');
									$selected = set_value('sch_year_number',$header->sch_year_number);
									$extra = 'class="form-control input-sm" id="sch_year_number"';
									echo form_dropdown('sch_year_number',$data_dropdown_value,$selected,$extra);
									echo form_error('sch_year_number');
								?>
							</div>
							<div class="col-lg-4 col-md-4">
								<label for="cla_name">ឆមាស</label>
								<?php 
									$data_dropdown_value = array(''=>'  ឆមាស  ','1'=>'I','2'=>'II');
									$selected = set_value('sch_semester',$header->sch_semester);
									$extra = 'class="form-control input-sm" id="sch_semester"';
									echo form_dropdown('sch_semester',$data_dropdown_value,$selected,$extra);
									echo form_error('sch_semester');
								?>
							</div>
							<div class="col-lg-4 col-md-4">
								<label for="cla_capacity">ឆ្នាំសិក្សា</label>
								<?php
									$data = array('name'=>'sch_academic_year',
										'id'=>'sch_academic_year',
										'value'=>set_value('sch_academic_year',$header->sch_academic_year),
										'class'=>'form-control input-sm',
										'placeholder'=>'ឆ្នាំសិក្សា');
									echo form_input($data);
									echo form_error('sch_academic_year');
								?>
							</div>
						</div>
						
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="20%">Time of Study</th>
									<th>Monday</th>
									<th>Tuesday</th>
									<th>Wednesday</th>
									<th>Thursday</th>
									<th>Friday</th>
								</tr>
							</thead>
							<tbody>
								<?php
								for($ind=1;$ind<4;$ind++){
								?>
								<tr>
									<td><input type="text" class="form-control" name="times[<?php echo $ind;?>]"/></td>
									<?php
										for($j=1;$j<=5;$j++){
											$id = $ind.'_'.$j;
									?>
									<td>
										<input type="hidden" id="<?php echo 'Teacher_'.$id;?>" class="form-control" name="sections[<?php echo $ind;?>][<?php echo $j;?>][teacher]" value=""/>
										<input type="hidden" id="<?php echo 'Room_'.$id;?>" class="form-control" name="sections[<?php echo $ind;?>][<?php echo $j;?>][room]" value=""/>
										<input type="hidden" id="<?php echo 'Subject_'.$id;?>" class="form-control" name="sections[<?php echo $ind;?>][<?php echo $j;?>][subject]" value=""/>										
										<button type="button" data-label="Teacher" data-id="<?php echo $id;?>" data-day="<?php echo $j;?>" class="btn btn-default btn-xs btn-block myModal">Teacher</button>										
										<button type="button" data-label="Room" data-id="<?php echo $id;?>" data-day="<?php echo $j;?>" class="btn btn-default btn-xs btn-block myModal">Room</button>										
										<button type="button" data-label="Subject" data-id="<?php echo $id;?>" data-day="<?php echo $j;?>" class="btn btn-default btn-xs btn-block myModal">Subject</button>
									</td>
									<?php } ?>									
								</tr>
								<?php } ?>
							</tbody>
						</table>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
	$(document).ready(function(){
		$(document).on('click','.btn-xs.btn-block.myModal',function(){
			obj = $(this);
			btn_html = obj.html(); 
			btn = obj.attr('data-label');
			btn_id = obj.attr('data-id');
			day = obj.attr('data-day');
			title = $('#sch_title').val();
			major = $('#tbl_majors_maj_id').val();
			shift = $('#tbl_shift_shi_id').val();
			year = $('#sch_year_number').val();
			semester = $('#sch_semester').val();
			academic = $('#sch_academic_year').val();
			trs_id = '';
			if(title!='' && major!='' && shift!='' &&
				year != '' && academic != '' && semester != ''){
				var fn = 'ajax' + btn;
				var url = '<?php echo site_url('schedules/');?>/' + fn;
				var dataString = {title:title,major:major,shift:shift,year:year,semester:semester,academic:academic,day:day};
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
			console.log(trs_id);
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