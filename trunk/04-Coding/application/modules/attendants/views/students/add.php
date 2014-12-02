<form role="form" method="post" action="<?php echo site_url(); ?>attendants/students/add">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>attendants/students/index/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Save</button>
            <button type="reset" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-ban-circle"></i> Reset</button>
        </div>
        <div class="right">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
    <div class="content">
        <div class="filter form-inline">
            <div class="form-group">
                <label class="sr-only" for="academic_year">Academic Year</label>
                <?php echo form_dropdown('academic_year', array('' => '--Academic Year--')+$academic_year, set_value('academic_year', ''), 'class="form-control input-sm"') ?>
            </div>
            <div class="form-group">
                <label class="sr-only" for="class">Class</label>
                <?php echo form_dropdown('class', array('' => '--Class--'), set_value('class', ''), 'class="form-control input-sm"') ?>
            </div>
            <button type="button" id="student-filter" class="btn btn-<?php echo PRIMARY; ?> btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add new student attendants</h3>
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
                        <tr>
                            <td colspan="7">Please filter to get student list</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</form>
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
              $('#student-filter').click(function(){
                  getStudentList();
              });
            });
            // Ajax faile
            request.fail(function( jqXHR, textStatus ) {
                $("[name='class']").html("<option>Class cannot select, please change Academin Year again.</option>");
            });
        });
        
        function getStudentList(){
            $("#student_list").html('<tr><td colspan="7">Loading...</td></tr>');
            var request = $.ajax({
                url: "<?php echo base_url(); ?>attendants/students/get_student_list",
                type: "POST",
                data: { cla_id : $("[name='class']").val() },
                dataType: "html"
            });
            // Ajax done
            request.done(function(result) {
              $("#student_list").html(result);
              
            });
            
            // Ajax faile
            request.fail(function( jqXHR, textStatus ) {
                $("#student_list").html('<tr><td colspan="7">Respond fail, please try again.</td></tr>');
            });
        }
    });
</script>