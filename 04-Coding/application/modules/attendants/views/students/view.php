
<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>attendants/students/index/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php if ($attendants->num_rows() > 0) { ?>
                <?php foreach ($attendants->result() as $row) { ?>
                    <h3 class="panel-title">Attendant</h3>
                
            <?php break; }  ?>
            <?php } else { ?>
                    <h3 class="panel-title">View student attendants</h3>
            <?php } ?>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name[EN]</th>
                            <th>Name[KH]</th>
                            <th>Gender</th>
                            <th>Class</th>
                            <th>Attendant</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody id="student_list">
                        <?php 
                        $attended=0;
                        ?>
                        <?php if ($attendants->num_rows() > 0) { ?>
                            <?php $i = 1; foreach ($attendants->result() as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; echo form_hidden('studentid[]', $row->stu_id); ?></td>
                                    <td><?php echo $row->stu_en_lastname . ' ' . $row->stu_en_firstname; ?></td>
                                    <td><?php echo $row->stu_kh_lastname . ' ' . $row->stu_kh_firstname; ?></td>
                                    <td><?php echo $row->stu_gender; ?></td>
                                    <td><?php echo $row->cla_name; ?></td>
                                    <td><?php echo form_checkbox(array('name' => 'attendant_' . $row->stu_id, 'value' => 1, 'checked' => ($row->atd_attendant == 1) ? true : false, 'disabled' => TRUE)); ?></td>
                                    <td><?php echo $row->atd_comment; ?></td>
                                </tr>
                                
                                <?php
                                if($row->atd_attendant==1) $attended++;
                                ?>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="7">No class found, please try again</td>
                            </tr>
                        <?php } ?>
                    </tbody>
            </table>
                <ul style="list-style: none;">
                    <li><b>Attended: <?php echo $attended; ?></b></li>
                    <li><b>Absented: <?php echo $attendants->num_rows() - $attended; ?></b></li>
                    <li><b>Total: <?php echo $attendants->num_rows(); ?></b></li>
                </ul>
        </div>
    </div>
</div>