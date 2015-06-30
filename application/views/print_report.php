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
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Date of Leave</th>
                        <th>Name</th>
                        <th>Signature ID no</th>
                        <th>Leave Type</th>
                        <th>Leave Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($results as $result): ?>
                        <tr>
                            <td><?= $result['leave_date']; ?></td>
                            <td><?= $result['emp_name']; ?></td>
                            <td><?= $result['signature_id']; ?></td>
                            <td><?= $result['leave_type']; ?></td>
                            <td><?= $result['leave_description']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->

    </section><!-- /.content -->
</div><!-- ./wrapper -->
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>/bootstrap/dist/js/app.min.js" type="text/javascript"></script>
</body>
</html>