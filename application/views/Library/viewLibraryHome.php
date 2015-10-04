<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Library
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
                        <a href=<?php echo base_url("libraryController/loadLibList"); ?>><span class="info-box-icon bg-red"><i
                                    class="glyphicon glyphicon-edit "></i></span></a>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">All Books</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </section>
                <section class="col-lg-6 connectedSortable">
                    <div class="info-box">
                        <a href=<?php echo base_url("libraryController/loadLibAdd"); ?>><span class="info-box-icon bg-yellow"><i
                                    class="fa fa-book"></i></span></a>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Add Books</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </section>
                <section class="col-lg-6 connectedSortable">
                    <div class="info-box">
                        <a href=<?php echo base_url("libraryController/loadLibDueBooks"); ?>><span class="info-box-icon bg-fuchsia"><i
                                    class="fa fa-align-center"></i></span></a>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Today Due Books</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </section>
                <section class="col-lg-6 connectedSortable">
                    <div class="info-box">
                        <a href=<?php echo base_url("libraryController/loadLibCategory"); ?>><span class="info-box-icon bg-white"><i
                                    class="fa fa-graduation-cap"></i></span></a>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Add New Book Categories</span>
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
                        <a href=<?php echo base_url("libraryController/loadLibBorrow"); ?>><span class="info-box-icon bg-purple"><i
                                    class="fa fa-arrow-right"></i></span></a>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Borrow Book</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </section>
                <section class="col-lg-6 connectedSortable">
                    <div class="info-box">
                        <a href=<?php echo base_url("libraryController/loadLibReturn"); ?>><span class="info-box-icon bg-aqua "><i
                                    class="fa fa-arrow-left"></i></span></a>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Return Book</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </section>
                <section class="col-lg-6 connectedSortable">
                    <div class="info-box">
                        <a href=<?php echo base_url("libraryController/loadLibLocation"); ?>><span class="info-box-icon bg-blue "><i
                                    class="fa fa-compass"></i></span></a>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">Change Book Location</span>
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
