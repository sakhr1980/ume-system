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
			<?php
				echo anchor(site_url('teacher/payment/index'),'<i class="glyphicon glyphicon-arrow-left"></i> ត្រលប់ក្រោយ','class="btn btn-sm btn-default"');
				echo '&nbsp;';
				echo anchor(site_url('teacher/payment/do_print/'.$this->uri->segment(4)),'<i class="glyphicon glyphicon-print"></i> Print','class="btn btn-sm btn-warning" target="_blank"');
			?>
        </div>
        <div class="right">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
    <div class="content">
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
									<th>No</th>
									<th>Name of Lecture</th>
									<th>Sex</th>
									<th>Subject</th>
									<th>Hours</th>
									<th>Rate</th>
									<th>Total Amount</th>									
									<th>Year</th>
									<th>Shift</th>
									<th>Promotion</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$ind = 0;
								$total_amount = 0;
								$total_hours = 0;
								$total_rate = 0;
								foreach($data as $row):
									$ind++;
									$hours = $row['hours'];
									$rate = $row['rate'];
									$amount = $hours * $rate;
									$total_hours += $hours;
									$total_amount += $amount;
									$total_rate = $rate;
							?>
								<tr>
									<td><?php echo $ind; ?></td>
									<td><?php echo $row['sta_name'];?></td>
									<td><?php echo $row['sta_sex']=='m'?'Male':'Female';?></td>
									<td><?php echo $row['sub_name'];?></td>
									<td><?php echo $hours; ?></td>
									<td>$<?php echo $rate; ?></td>
									<td>$<?php echo $amount;?></td>
									<td><?php echo $row['year'];?></td>
									<td><?php echo $row['shi_name'];?></td>
									<td><?php echo $row['promotion'];?></td>
								</tr>
							<?php
								endforeach;
							?>
							</tbody>
							<tfoot>
								<tr>
									<th colspan="4" style="text-align:center;">Total Hours</td>
									<th><?php echo $total_hours; ?></th>
									<th>$<?php echo $total_rate; ?></th>
									<th>$<?php echo $total_amount; ?></th>
									<th colspan="3"></th>
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