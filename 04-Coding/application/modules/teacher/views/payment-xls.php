<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">

        <title><?php echo $title; ?></title>
		<style type="text/css" media="print">
			@page { 
				size: A4 landscape;
				margin:0.5cm;
			}
			header nav, footer {
				display: none;
			}
		</style>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>templates/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>templates/bootstrap/css/bootstrap-datepicker.css" rel="stylesheet">
    </head>

    <body>        
        <div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-lg-12 col-md-12">
					<div style="margin-top:10px;">
						<div class="pull-left">
							<div style="width:280px;text-align:center;">
							<br>
							<img src="<?php echo base_url(); ?>images/logo.png" alt="" width="70"/><br>
							សាខាសាកលវិទ្យាល័យគ្រប់គ្រង និងសេដ្ឋកិច្ច<br>
							ខេត្តកំពង់ចាម
							</div>
						</div>
						<div class="pull-right">
							<div style="width:200px;text-align:center;">
								<p>
									ព្រះរាជាណាចក្រកម្ពុជា<br>
									ជាតិ សាសនា ព្រះមហាក្សត្រ
								</p>
							</div>
						</div>
					</div>
					<div style="clear:both; padding:10px 0;">
						<h3 style="text-align:center;">Account Payable of Teacher</h3>
					</div>
				</div>
			</div>
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12 main content">
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
			<div class="row">
				<div class="pull-left">
					<div style="width:350px;">						
						<p style="text-align:center;">
							<br>
							បានឃើញ និងឯកភាព<br>
							អ្នកយល់ព្រម
						</p>
					</div>
				</div>
				<div class="pull-right">
					<div style="width:260px; text-align:center;">
						<p>
							កំពង់ចាម,ថ្ងៃទី.........ខែ...............ឆ្នាំ២០១៤<br>
							អ្នកទទួល
						</p>
					</div>
				</div>								
			</div>
			<div style="clear:both;">&nbsp;</div>
        </div>


    </body>
</html>

<script>
	setTimeout(function(){
		window.print();
		window.close();
	},50);
</script>

