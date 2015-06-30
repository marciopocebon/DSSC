<script src="<?php echo base_url() ?>js/dobPicker.min.js" xmlns="http://www.w3.org/1999/html"></script>
<div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
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
        <div class="row" style="display:none">
            <form action="<?= site_url('studentController/prints'); ?>"" method="post">
            <div class="col-lg-12">
                <div class="box box-primary ">
                    <div class="box-header">
                        <h3 class="box-title">Enter Student Marks</h3>
                    </div>
                    <div class="box-footer text-black">
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- Progress bars -->
                                <div class="clearfix">
                                    <span class="pull-left">Enter Student ID </span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="txtIndexNo" class="form-control">
                                </div>
                            </div>
                            <!-- /.col -->

                                <div class="col-sm-4">
                                    <div class="clearfix">
                                        <span class="pull-left">Print Report</span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-bitbucket">Print</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- right col -->
                </div>
            </div>
            <!--            </form>-->
            </form>
        </div>
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->


