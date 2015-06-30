
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            DSSC
            <small>Management</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="das"  style="display:none">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
                <section class="col-lg-6 connectedSortable">
                    <div class="info-box">
                        <a href=<?php echo base_url("site/viewLeave");?>><span class="info-box-icon bg-red"><i class="fa fa-group "></i></span></a>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Leave Management</span>
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
                        <a href=<?php echo base_url("site/StudentMarks");?>><span class="info-box-icon bg-purple"><i class="fa fa-file-text-o"></i></span></a>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Student Management</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </section>

            </section>
            <!-- right col -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
$(document).ready(function() {
$('.das').fadeIn(400);
});
</script>
