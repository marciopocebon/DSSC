<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Student
            <small>Management</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row" style="display: none;">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
                <section class="col-lg-6 connectedSortable">
                    <div class="info-box">
                        <a href=<?php echo base_url("studentController/viewStudent_enterMarks"); ?>><span class="info-box-icon bg-red"><i
                                    class="glyphicon glyphicon-edit "></i></span></a>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Add Marks</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </section>
                <section class="col-lg-6 connectedSortable">
                    <div class="info-box">
                        <a href=<?php echo base_url("studentController/StudentSearch"); ?>><span class="info-box-icon bg-yellow"><i
                                    class="fa fa-male"></i></span></a>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Search Students</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </section>

            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">
                <section class="col-lg-6 connectedSortable">
                    <div class="info-box">
                        <a href=<?php echo base_url("studentController/viewStudentReport"); ?>><span class="info-box-icon bg-purple"><i
                                    class="fa fa-print"></i></span></a>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Print Student Report</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </section>

            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->
