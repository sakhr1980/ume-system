<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <a href="<?php echo site_url('schedules/add/'.$this->uri->segment(4)); ?>" class="btn btn-sm btn-warning">
			<i class="glyphicon glyphicon-plus-sign"></i> បង្កើត
		</a>
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>

<div class="content">
    <div class="filter">
        <form class="form-inline" role="form" method="post" action="<?php echo site_url('schedules/index'); ?>">
            <?php
				echo set_value('tbl_classes_cla_id');
			?>
            <div class="form-group">
                <label class="sr-only" for="tbl_classes_cla_id">ថ្នាក់</label>
                <?php
                $data_dropdown = array('' => '  ថ្នាក់  ') + $class;
                $selector = set_value('tbl_classes_cla_id');
                $extra = 'class="form-control input-sm"';
                echo form_dropdown('tbl_classes_cla_id', $data_dropdown, $selector, $extra);
                ?>
            </div>
			<div class="form-group">
				<label class="sr-only" for="cla_maj_id">សកលវិទ្យាល័យ </label>
				<?php
					$data_dropdown = array('' => '  សកលវិទ្យាល័យ  ') + $major;
					$selector = set_value('cla_maj_id');
					$extra = 'class="form-control input-sm"';
					echo form_dropdown('cla_maj_id',$data_dropdown, $selector, $extra); 
				?>
			</div>
			<div class="form-group">				
				<label class="sr-only" for="tbl_shift_shi_id">ម៉ោងសិក្សា</label>
				<?php
					$data_dropdown = array('' => '  ម៉ោងសិក្សា  ') + $shift;
					$selector = set_value('tbl_shift_shi_id');
					$extra = 'class="form-control input-sm"';
					echo form_dropdown('tbl_shift_shi_id',$data_dropdown , $selector, $extra) 
				?>
			</div>			
			<div class="form-group">
				<label class="sr-only" for="cla_name">ឆ្នាំ</label>
				<?php 
					$data_dropdown_value = array(''=>'  ឆ្នាំ  ','1'=>'I','2'=>'II','3'=>'III','4'=>'IV');
					$selected = set_value('sch_year_number');
					$extra = 'class="form-control input-sm"';
					echo form_dropdown('sch_year_number',$data_dropdown_value,$selected,$extra); 
				?>
			</div>
			<div class="form-group">
				<label class="sr-only" for="cla_name">ឆមាស</label>
				<?php 
					$data_dropdown = array(''=>'  ឆមាស  ','1'=>'I','2'=>'II');
					$selected = set_value('sch_semester');
					$extra = 'class="form-control input-sm"';
					echo form_dropdown('sch_semester',$data_dropdown,$selected,$extra);
				?>
			</div>
			<div class="form-group">
				<label class="sr-only" for="cla_capacity">ឆ្នាំសិក្សា</label>
				<?php
					$data_input = array('name'=>'sch_academic_year','value'=>'','class'=>'form-control input-sm','placeholder'=>'ឆ្នាំសិក្សា');
					echo form_input($data_input);
				?>
			</div>
            <button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
        </form>
    </div>
    <div>		
	<?php
		$comma = ', ';
		foreach($data as $item):
			$header = $item['header'];
			$sch_id = $header['sch_id'];
	?>
			<div class="panel panel-default" id="panel<?php echo $sch_id;?>">
                <div class="panel-body">
					<div class="btn-group">
						<button type="button" class="btn btn-default" data-toggle="dropdown">
						  Print
						  <span class="caret"></span>
						  <span class="sr-only">Toggle Dropdown</span>
					   </button>
					   <ul class="dropdown-menu" role="menu">
						  <li><a href="<?php echo site_url('schedules/do_print/'.$sch_id); ?>" target="_blank">Print</a></li>
						  <li><a href="<?php echo site_url('schedules/do_print'); ?>" target="_blank">Print All</a></li>
					   </ul>
					<?php						
						echo anchor(site_url('schedules/edit/'.$sch_id),'Edit','class="btn btn-default"');
						echo anchor(site_url('schedules/delete/'.$sch_id),'Delete',"class='btn btn-default schedule-delete' id='$sch_id'");
					?>
					</div>
	<?php
			if($header):
				echo '<div style="text-align:center;font-size:15px;">';
					preg_match('/weeken/',strtolower($header['shi_name']),$res);
					echo (count($res)>0?'Schedule for Saturday to Sunday Class':'Schedule for Monday to Friday Class').br();
					echo 'ឆ្នាំ '.$header['sch_year_number'].$comma;
					echo 'ឆមាស '.$header['sch_semester'].$comma;
					echo 'ជំនាន់ '.$header['gen_title'].$comma;
					echo 'វេន '.$header['shi_name'];
					echo " (".$header['cla_name'].")".br();
					echo $header['maj_name'].br();
					echo 'ឆ្នាំសិក្សា::'.$header['sch_academic_year'].br(2);
				echo '</div>';				
			endif;
			$body = $item['body'];
			if($body):
				$times = $body['times'];
				$sections = $body['sections'];
				$num = 0;
				foreach($times as $indd=>$tim){
					$section = $sections[$indd];
					$num = count($section);
					break;
				}
	?>
				<table class="table table-bordered">
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
						</tr>
					</thead>
					<tbody>
						
						<?php
						foreach($times as $ind=>$time):
						?>
						<tr>
							<td><?php echo $time; ?></td>
						<?php
							foreach($sections[$ind] as $col):
						?>
							<td>
							<?php
								echo $col['subject'].br();
								echo ($col['teacher']?'Tec: ':'').$col['teacher'].br();
								echo ($col['room']?'រៀនបន្ទប់: ':'').$col['room'];								
							?>
							</td>
						<?php
							endforeach;
						?>
						</tr>
						<?php
						endforeach;
						?>
						
					</tbody>
				</table> 
	<?php
			endif;
	?>
				</div>
			</div>
	<?php
		endforeach;
	?>
	</div>
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

