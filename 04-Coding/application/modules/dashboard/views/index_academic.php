<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Academic Report</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bs-glyphicons">
                            <ul class="bs-glyphicons-list">
                                <li>
                                    <span class="glyphicon glyphicon-user"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>students/registrations" >
                                            <?php // echo "Total book <br/>" . $AllBooks; ?>
                                            Total student register today
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>schedules/schedules" >
                                            <?php // echo "Available book <br />" . $availableBook; ?>
                                            Schedules Classes
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-file"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>subjects/subjects" >
                                            <?php // echo "Report <br />"  ?>
                                             Subjects View
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-registration-mark"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>rooms/rooms" >
                                            <?php // echo "Report <br />"  ?>
                                            Room status
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Teacher report</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bs-glyphicons">
                            <ul class="bs-glyphicons-list">
                                <li>
                                    <span class="glyphicon glyphicon-user"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>teachers/teachers" >
                                            <?php // echo "Borrowed book <br/>" . $borrowNumber; ?>
                                            Teacher on working
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-subtitles"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>classes/classes" >
                                            <?php // echo "Late return <br />" . $lateReturn; ?>
                                           Classes list student on working
                                        </a>
                                    </span>
                                </li>
<!--                                <li>
                                    <span class="glyphicon glyphicon-check"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>borrows/borrows/index/dateline" >
                                            <?php // echo "Dateline return<br />" . $returnToday; ?>
                                            Next event
                                        </a>
                                    </span>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

