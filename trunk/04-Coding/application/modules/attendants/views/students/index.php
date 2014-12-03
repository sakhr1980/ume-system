<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>attendants/students/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        <!--<a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>-->
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="filter">
        <form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>attendants/students/index">
            <div class="form-group">
                <label class="sr-only" for="academic_year">Academic Year</label>
                <?php echo form_dropdown('academic_year', array('' => '--Academic Year--')+$academic_year, set_value('academic_year', ''), 'class="form-control input-sm"') ?>
            </div>
            <div class="form-group">
                <label class="sr-only" for="class">Class</label>
                <?php echo form_dropdown('class', array('' => '--Class--'), set_value('class', ''), 'class="form-control input-sm"') ?>
            </div>
            <button id="student-filter" type="button" class="btn btn-<?php echo PRIMARY; ?> btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
        </form>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Student Attendant List</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Academic year</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="student_list">
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
                </tbody>
            </table>
        </div>
    </div>
    <?php //echo $this->pagination->create_links(); ?>
</div>
<script type="text/javascript">
    $(function(){
        $("[name='academic_year']").change(function(){
            $("[name='class']").html("<option>Loading...</option>");
            var request = $.ajax({
                url: "<?php echo base_url(); ?>attendants/students/get_class",
                type: "POST",
                data: { gen_id : $("[name='academic_year']").val() },
                dataType: "html"
            });
            // Ajax done
            request.done(function(result) {
              $("[name='class']").html(result);
              // request attendant list
              $('#student-filter').click(function() {
                    getStudentList();
              });
            });
            // Ajax faile
            request.fail(function( jqXHR, textStatus ) {
                $("[name='class']").html("<option>Class cannot select, please change Academin Year again.</option>");
            });
        });
        
        // get Ajax list attendant
        function getStudentList() {
            $("#student_list").html('<tr><td colspan="7">Loading...</td></tr>');
            var request = $.ajax({
                url: "<?php echo base_url(); ?>attendants/students/ajax_attendant_list",
                type: "POST",
                data: {cla_id: $("[name='class']").val()},
                dataType: "html"
            });
            // Ajax done
            request.done(function(result) {
                $("#student_list").html(result);
                // if has student
                if($('[name="studentid[]"]').length > 0){
                    $('#save').removeAttr( "disabled" );
                }
                else{
                    $('#save').attr('disabled','disabled');
                }
                
            });

            // Ajax faile
            request.fail(function(jqXHR, textStatus) {
                $('#save').attr('disabled','disabled');
                $("#student_list").html('<tr><td colspan="7">Respond fail, please try again.</td></tr>');
            });
        }
    });
</script>
