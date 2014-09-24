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
                                    <span class="glyphicon glyphicon-book"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>students/registrations" >
                                            <?php // echo "Total book <br/>" . $AllBooks; ?>
                                            Total student register today
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-ok"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>books/books" >
                                            <?php // echo "Available book <br />" . $availableBook; ?>
                                            Total student absent today
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-stats"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>report/report" >
                                            <?php // echo "Report <br />"  ?>
                                            Student payment today
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-stats"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>report/report" >
                                            <?php // echo "Report <br />"  ?>
                                            Exam status
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
                <h3 class="panel-title">Staff report</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bs-glyphicons">
                            <ul class="bs-glyphicons-list">
                                <li>
                                    <span class="glyphicon glyphicon-bold"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>borrows/borrows" >
                                            <?php // echo "Borrowed book <br/>" . $borrowNumber; ?>
                                            Total student working
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-warning-sign"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>borrows/borrows/index/late" >
                                            <?php // echo "Late return <br />" . $lateReturn; ?>
                                            Total staff absent today
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-check"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>borrows/borrows/index/dateline" >
                                            <?php // echo "Dateline return<br />" . $returnToday; ?>
                                            Next event
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
</div>

