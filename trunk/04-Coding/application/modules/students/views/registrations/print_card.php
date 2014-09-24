<script type="text/javascript" src="<?php echo base_url(); ?>templates/jquery.print-card.js"></script>
<script type="text/javascript">
    $(function() {
        $(".print").attr("href", "javascript:void( 0 )").click(function() {

            $(".printable").print();
            return(false);
        });
    });

</script>
<style type="text/css">
    .id_card_en{
        background: url(http://system.ume.lan/images/id_card/id-card-student-en.png)  center no-repeat;
    }
    .id_card_kh{
        background: url(http://system.ume.lan/images/id_card/id-card-student-kh.png) center no-repeat;
    }
    .id_card_en,.id_card_kh {
        width: 345px;
        height:500px;
        border: solid 1px;
    }
    .card_info,.card_name,.card_id{
        font-weight: bold;
        font-size:12px;

    }
    .card_name{
        font-size: 22px;
        height: 40px;
    }
    .card_id{
        color: red;
        font-size: 15px;
        /*height: 97px;*/
        padding: 6px 0 0 43px;
        /*padding: 0 0 0 43px;*/
        /*vertical-align: bottom;*/
    }
    .card_info{
        color: #0257F2;
        line-height: 21px;
        padding: 7px 0 23px 70px;
        /*padding: 65px 0 0 70px;*/
        /*vertical-align: top;*/
    }
    .b_info{
        height: 115px;
    }
    .top_info{
        height: 110px;
        color: red;
    }
    .id_card_kh .card_info {
        line-height: 25px;
        padding: 43px 0 37px 47px;

    }
    .id_card_kh .card_id{
        padding: 14px 0 0 60px;
    }

    .td_1{
        width: 172px;
    }
</style>
<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
         <a href="<?php echo site_url(); ?>students/registrations<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a><span style="padding:0 20px;"></span>
            </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="filter">
         <form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>students/registrations/print_card">
             <div class="form-group">
                <label class="sr-only" for="stu_name">Student Name</label>
                <div class="form-group">
                    <select name="gen_id" class="form-control" id="gen_id">
                        <option value="">--All generation--</option>
                        <?php
                        foreach ($generation as $key => $value) {
                            echo '<option value="' . $key . '" ' . set_select('gen_id', $key) . '>' . $value . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="cla_id" class="form-control" id="cla_id">
                        <option value="">--All classes--</option>
                        <?php
                        foreach ($arrayClasses as $key => $value) {
                            echo '<option value="' . $key . '" ' . set_select('cla_id', $key) . '>' . $value . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-sm" id="stu_en_firstname" name="stu_en_firstname" value="<?php echo set_value('stu_en_firstname'); ?>" placeholder=" Student First Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-sm" id="stu_en_lastname" name="stu_en_lastname" value="<?php echo set_value('stu_en_lastname'); ?>" placeholder=" Student Last Name">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-<?php echo PRIMARY; ?> btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
                    <!--<a href="" onclick="return false;"  class=" print btn-sm btn-default"><i class="glyphicon glyphicon-print"></i> Print</a>-->
<a href="" onclick="return false;" class="print btn btn-sm btn-success "><i class="glyphicon glyphicon-print"></i> Print </a>                  
<!--<a class="btn btn-<?php echo DEFAULTS; ?> btn-xs" href="<?php echo base_url(); ?>students/registrations/print_card/" title="Pint Card"><i class="glyphicon glyphicon-print"></i> Print Card</a>-->
                </div>
            </div>
        </form>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Print Student ID Card</h3>
            <?php
            echo "Number of record found : " . $studentNumber;
            ?>
        </div>
        <div class="panel-body printable">
<!--            <table>
                
                <tr>
                    <td>
                        <div class="id_card_en print_card"><br />
                            <img class="id_card_en_img"  src="<?php echo base_url(); ?>images/id_card/id-card-student-en.png" title="UME" /> 
                            <div class="stu_id">M-EN-1-001</div><br />
                            <div class="stu_name">Chea Bora</div><br />
                            <div class="stu_info">
                                <div class="stu_study_year">II</div>
                                <div class="stu_gen">II</div>
                                <div class="stu_year">2014-2015</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="id_card_kh print_card "> <br/>
                            <img class="id_card_kh_img"   src="<?php echo base_url(); ?>images/id_card/id-card-student-kh.png" title="UME" /> 
                            <div class="stu_id">M-EN-1-001</div><br />
                            <div class="stu_name">ជា បូរ៉ា</div> <br />
                            <div class="stu_info">
                                <div class="stu_study_year">II</div>
                                <div class="stu_gen">II</div>
                                <div class="stu_year">2014-2015</div>
                            </div>
                        </div>
                    </td>
                </tr>  

            </table>-->
            <table cellspacing="0" cellpadding="0">
                <?php if (isset($data) && $data->num_rows() > 0) { ?>
                    <?php foreach ($data->result_array() as $row) { ?>
                        <tr> 
                            <td>
                                <table cellspacing="0" cellpadding="0"  class="id_card_en">
                                    <tr><td class="top_info"  colspan="2">&nbsp;</td></tr>
                                    <tr> <td class="td_1" rowspan="4">&nbsp;</td><td class="card_id"><?php echo $row['stu_card_id'] ?></td></tr>
                                    <tr> <td  class="card_name"><?php echo $row['stu_en_firstname'] . " " . $row['stu_en_lastname'] ?></td> </tr>
                                    <tr><td  class="card_info">
                                            <table>
                                                <tr> <td><?php echo $row['cla_generation_number'] ?></td></tr>
                                                <tr> <td>II</td></tr>
                                                <tr><td><?php echo $row['gen_title'] ?></td></tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr><td class="b_info"  colspan="2">&nbsp;</td></tr>
                                </table>

                            </td>
                            <td>
                                <table class=" id_card_kh" cellspacing="0" cellpadding="0">
                                    <tr><td class="top_info"  colspan="2">&nbsp;</td></tr>
                                    <tr> <td rowspan="4" class="td_1">&nbsp;</td><td class="card_id"><?php echo $row['stu_card_id'] ?></td></tr>
                                    <tr> <td  class="card_name"><?php echo $row['stu_kh_firstname'] . " " . $row['stu_kh_lastname'] ?></td> </tr>
                                     <!--<tr><td class="top_info">&nbsp;</td></tr>-->
                                    <tr>
                                        <td  class="card_info">
                                            <table>
                                                <tr> <td>II</td></tr>
                                                <tr> <td>II</td></tr>
                                                <tr><td>2014-2015</td></tr>

                                            </table>
                                        </td>
                                    </tr>
                                    <tr><td class="b_info" colspan="2">&nbsp;</td></tr>
                                </table>
                            </td>
                        </tr>
                    <?php }
                } else {
                    ?>
                    <tr><td colspan="7">Empty</td></tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<!--===============Print function ======================--> 
<!--<script src="<?php echo base_url(); ?>templates/jQuery.print.js"></script>-->
<!--<script type='text/javascript'>
    $(function() {
        $(".print").on('click', function() {
            $("#printable").print({
                globalStyles: true, // Use Global styles
                mediaPrint: true, // Add link with attrbute media=print
                iframe: true, //Print in a hidden iframe
                noPrintSelector: ".avoid-this", // Don't print this
            });
        });
    });
</script>-->
<!--================End print======================-->