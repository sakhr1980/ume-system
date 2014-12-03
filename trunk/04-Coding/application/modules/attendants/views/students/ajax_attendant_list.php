<?php if($attendants->num_rows() >0){ ?>
    <?php foreach($attendants->result() as $row){ ?>
    <tr>
        <td><?php echo date('d M, Y', strtotime($row->att_date)); ?></td>
        <td><?php echo $row->gen_title; ?></td>
        <td><?php echo $row->cla_name; ?></td>
        <td>
            <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>attendants/students/view/<?php echo $row->att_id; ?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
            <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>attendants/students/edit/<?php echo $row->att_id; ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>attendants/students/delete/<?php echo $row->att_id; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this user account? This user account will be deleted permanently.');"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
        </td>
    </tr>
    <?php } ?>
<?php }else{ ?>
<tr>
    <td colspan="5">No data found</td>
</tr>
<?php } ?>