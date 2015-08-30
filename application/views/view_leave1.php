<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Leave
            <small>Management</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row" style="display: none">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
                <?php if($this->session->userdata('role')=="l") {?>
                <section class="col-lg-6 connectedSortable">
                    <div class="info-box">
                        <a href=<?php echo base_url("site/viewMaLeave");?>><span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span></a>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Make a leave</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </section>
                <?php } elseif($this->session->userdata('role')=="p") {?>
                <section class="col-lg-6 connectedSortable">
                    <div class="info-box">
                        <a href=<?php echo base_url("site/viewAccept");?>> <span class="info-box-icon bg-black"><i class="fa fa-check-square-o"></i></span></a>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Accept leave</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </section>
                <?php }  ?>
                <section class="col-lg-6 connectedSortable">
                    <div class="info-box">
                        <a href=<?php echo base_url("site/viewEditLeave");?>><span class="info-box-icon bg-blue"><i class="fa fa-edit"></i></span></a>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Edit Leave</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </section>
                <section class="col-lg-6 connectedSortable">
                    <div class="info-box">
                        <a href=<?php echo base_url("site/viewMonthlyLeave");?>><span class="info-box-icon bg-yellow-active"><i class="fa fa-file-text-o"></i></span></a>
                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Monthly Report</span>
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
                        <a href=<?php echo base_url("site/viewAccList_Leave");?>><span class="info-box-icon bg-green"><i class="fa fa-list"></i></span></a>
                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Approved List</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </section>
                <section class="col-lg-6 connectedSortable">
                    <div class="info-box">
                        <a href=<?php echo base_url("acceptListController/viewLeaveRejectList");?>><span class="info-box-icon bg-red "><i class="fa fa-list"></i></span></a>
                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Rejected List</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </section>
                <section class="col-lg-6 connectedSortable">
                    <div class="info-box">
                        <a href=<?php echo base_url("site/printing");?>><span class="info-box-icon bg-purple"><i class="fa fa-file-text-o"></i></span></a>
                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Daily Report</span>
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
