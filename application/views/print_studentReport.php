<html>
<head>
    <meta charset="UTF-8">
    <title>DSSC | Report</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url()?>/bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url()?>/bootstrap/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />


</head>
<body onload="window.print();" >
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">

            <div class="col-xs-12">
                <h2 class="page-header">
                    <img src="<?php echo base_url() ?>/bootstrap/dsimg.jpg" alt="..." class='margin' /> D. S. Senanayake College
                    <small class="pull-right">Date: <?php echo (new \DateTime())->format('Y-m-d');?></small>
                </h2>
            </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">

                <address>
                    <strong>D. S. Senanayake College</strong><br>
                    62 R G Senanayake Mawatha<br>
                    Colombo<br>

                </address>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-3"></div>
                <div class="col-xs-7">
                    <h1 >Student Annual Report</h1>
                </div>
<!--                <div class="col-xs-2"></div>-->
<!--                <div class="col-xs-12">-->
<!--                    --><?php //foreach ($student as $students): ?>
<!--                        <h3>Student Name     : --><?php //$students['name']; ?><!--</h3>-->
<!--                        <h3>Student Index No :--><?php //$students['Index_No']; ?><!-- </h3>-->
<!--                    --><?php //endforeach; ?>
<!--                </div>-->
<!--            </div>-->
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Subject Name</th>
                        <th>Term 1</th>
                        <th>Term 2</th>
                        <th>Term 3</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $term1=0; $term2=0; $term3=0;
                    ?>
                    <?php foreach ($results as $result): ?>
                        <tr>
                            <td><?= $result['subject_name']; ?></td>
                            <td><?= $result['term1']; ?></td>
                            <td><?= $result['term2']; ?></td>
                            <td><?= $result['term3']; ?></td>

                            <?php $term1=$result['term1']+$term1; ?>
                            <?php $term2=$result['term2']+$term2; ?>
                            <?php $term3=$result['term3']+$term3; ?>
                        </tr>
                    <?php endforeach; ?>
                        <tr>
                            <td><b>Total</b></td>
                            <td><?=$term1?></td>
                            <td><?=$term2?></td>
                            <td><?= $term3?></td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- /.col -->
                <div class="col-xs-12">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6" id="rightCol">
                        <div class="timeline-item">


                            <h3 class="timeline-header">...................................</h3>

                            <div class="timeline-body">
                                Signature
                            </div>

                            <div class='timeline-footer'>

                            </div>
                        </div>
                    </div>
                </div>
        </div><!-- /.row -->

    </section><!-- /.content -->
</div><!-- ./wrapper -->
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>/bootstrap/dist/js/app.min.js" type="text/javascript"></script>
</body>
</html>