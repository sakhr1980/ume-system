<?php if ($students->num_rows() > 0) { ?>
    <?php $i=1; foreach ($students->result() as $row){ ?>
        <tr>
            <td><?php echo $i++; echo form_hidden('studentid[]', $row->stu_id); ?></td>
            <td><?php echo $row->stu_en_lastname.' '.$row->stu_en_firstname; ?></td>
            <td><?php echo $row->stu_kh_lastname.' '.$row->stu_kh_firstname; ?></td>
            <td><?php echo $row->stu_gender; ?></td>
            <td><?php echo $row->cla_name; ?></td>
            <td><?php echo form_checkbox('attendant_'.$row->stu_id,1, true); ?></td>
            <td><?php echo form_textarea(array('name'=>'comment_'.$row->stu_id,'rows'=>1)); ?></td>
        </tr>
    <?php } ?>
<?php } else { ?>
    <tr>
        <td colspan="7">No class found, please try again</td>
    </tr>
<?php } ?>

