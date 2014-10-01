<style>
	.pointer{
		cursor:pointer;
	}
	.schedule{
		min-height:65px;
	}
</style>
<form class="form-horizontal" method="post" onsubmit="return false;" id="payment-form" action="<?php echo site_url('teacher/payment/ajaxSave'); ?>">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <a href="<?php echo site_url('teacher/payment/index/'.$this->uri->segment(4)); ?>" class="btn btn-sm btn-default">
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
		<div class="row">
			<div class="col-log-3 col-md-3">
				<label>Start Date</label>
				<?php
					$data_input = array('name'=>'start_date',
						'id'=>'start_date',
						'value'=>set_value('start_date'),
						'class'=>'form-control input-sm required',
						'placeholder'=>' Start Date ');
					echo form_input($data_input);									
				?>
			</div>
			<div class="col-log-3 col-md-3">
				<label>End Date</label>
				<?php
					$data_input = array('name'=>'end_date',
						'id'=>'end_date',
						'value'=>set_value('end_date'),
						'class'=>'form-control input-sm required',
						'placeholder'=>' End Date ');
					echo form_input($data_input);									
				?>
			</div>
			<div class="col-log-3 col-md-3">
				<label>Teacher</label>
				<?php
					$data_dropdown = array('' => '  Teacher  ');
					$selector = set_value('tbl_staff_sta_id');
					$extra = 'class="form-control input-sm required" id="tbl_staff_sta_id"';
					echo form_dropdown('tbl_staff_sta_id',$data_dropdown , $selector, $extra);
				?>
			</div>
			<div class="col-log-3 col-md-3">
				<label>Rate</label>
				<?php
					$data_input = array('name'=>'rate',
						'id'=>'rate',
						'value'=>set_value('rate'),
						'class'=>'form-control input-sm required',
						'placeholder'=>' Rate ');
					echo form_input($data_input);									
				?>
			</div>
		</div>
		<div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
				<div id="content_msg">
				</div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Teacher Payment</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striked" id="payment-table">
							<thead>
								<tr>
									<th>Subject</th>
									<th>Hours</th>
									<th>Total Amount</th>									
									<th>Year</th>
									<th>Shift</th>
									<th>Promotion</th>
								</tr>
							</thead>
							<tbody>								
							</tbody>
							<tfoot>
								<tr>
									<td>Total</td>
									<td><span id="span-total-hours"></span></td>
									<td><span id="span-total-amount"></span></td>
									<td colspan="3"></td>
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
		$(document).on('keyup','#rate',function(){
			var rate = $(this).val();
			var len = $('#payment-table tbody tr').length;
			var totalAmount = 0;
			for(ind=0; ind<len; ind++){
				var hours = parseFloat($('#span-hours-'+ind).html());
				var amount = (hours * rate);
				$('#span-amount-' + ind).html(amount);
				$('#hidden-amount-' + ind).val(amount);
				totalAmount += amount;
			}
			$('#span-total-amount').html(totalAmount);
		});
		function callDate(){
			$('#start_date,#end_date').datepicker({
				format: "yyyy-mm-dd",
				autoclose: true,
			});
		}
		
		callDate();
		
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
		
		$("#payment-form").submit(function(){
			if(valid()==0){
				var th = $(this); 
				$.ajax({
					type:'post',
					url:th.attr('action'),
					data:th.serialize(),
					dataType:'json',
					success:function(res){
						if(res.result=='ok'){
							window.location = "<?php echo site_url('teacher/payment');?>";
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
		
		$(document).on('change blur',"#start_date,#end_date",function(){
			var eleId = '#tbl_staff_sta_id';
			var sdate = $('#start_date').val();
			var edate = $('#end_date').val();
			if(sdate != '' & edate != ''){
				var th = $(this); 
				$.ajax({
					type:'post',
					url:"<?php echo site_url('teacher/payment/ajaxTeacher');?>",
					data:{start_date:sdate,end_date:edate},
					dataType:'json',
					success:function(res){
						console.log(res);
						$(eleId + ' [value!=""]').remove();
						var incr = 1;
						for(ind in res){
							var item = res[ind];
							$(eleId).get(0).options[incr] = new Option(item.sta_name, item.sta_id);
							incr++;
						}
					}
				});
			}else{
				$(eleId + ' [value!=""]').remove();
			}
			return false;
		});
		
		$(document).on('change',"#tbl_staff_sta_id",function(){
			var th = $(this);
			var id = th.val();
			var tbl = $('#payment-table tbody');
			var rate = $('#rate').val();
			if(id != ''){
				console.log(id);
				$.ajax({
					type:'post',
					url:"<?php echo site_url('teacher/payment/ajaxPayment');?>",
					data:{id:id},
					dataType:'json',
					success:function(res){
						tbl.html('');
						var totalHours = 0;
						for(ind in res){
							var row = res[ind];
							var hours = parseFloat(row.hours);
							totalHours += hours;
							var amount = (rate * hours);
							var year = row.tea_year;
							var semester = row.tea_semester;
							var pro = row.cla_promotion;
							var tr = '<tr valign="top">';
							tr += '<td>'+row.sub_name+'<input type="hidden" id="subject-'+ind+'" name="records['+ind+'][subject]" value="'+row.tbl_subject_sub_id+'"/></td>';			
							tr += '<td><span id="span-hours-'+ind+'">'+hours+'</span><input type="hidden" name="records['+ind+'][hours]" value="'+hours+'"/></td>';
							tr += '<td><span id="span-amount-'+ind+'">'+ amount +'</span><input type="hidden" id="hidden-amount-'+ind+'" name="records['+ind+'][amount]" value="'+amount+'"/></td>';							
							tr += '<td>'+year+'<input type="hidden" name="records['+ind+'][year]" value="'+ year +'"/></td>';							
							tr += '<td>'+row.shi_name+'<input type="hidden" name="records['+ind+'][shift]" value="'+row.shi_id+'"/></td>';
							tr += '<td>'+pro+'<input type="hidden" name="records['+ind+'][promotion]" value="'+pro+'"/></td>';
							tr += '</tr>';
							tbl.append(tr);
						}
						$('#span-total-hours').html(totalHours);
					}
				});
			}else{
				tbl.html('');
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
			$('#payment-table tbody').html('');
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