<div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
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
        <div class="row" style="display: none;">
            <!-- Left col -->
            <form action="<?= site_url('site/inserts'); ?>" method="post">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Leave Form</h3>
                    </div>
                    <div class="box-body">
                        <section class="col-md-4 ">
                            <!-- Input addon -->

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="text" class="form-control" name="txtSignatureNo" value=""
                                       placeholder="Signature no">
                            </div>
                            </br>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="text" name="txtDescription" class="form-control" placeholder="Leave Reason">
                            </div>
                            </br>
                            <div class="form-group" >
                                <label>Select Leve type</label>
                                <select class="form-control" name="selectType">
                                    <option>half day</option>
                                    <option>short leave</option>
                                    <option>full leave</option>
                                </select>
                            </div>
                            </br>
                            <script type="text/javascript">
                                $(function () {
                                    //Datemask dd/mm/yyyy
                                    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                                    //Datemask2 mm/dd/yyyy
                                    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                                    //Money Euro
                                    $("[data-mask]").inputmask();
                                });
                            </script>
                            <div class="box-body">
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="txtDate" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>
                            <!--box body-->
                        </section>
                        <!-- Middle col -->

                        <section class="col-lg-4 connectedSortable">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="text" class="form-control" name="txtName" placeholder="Name">
                            </div>
                            </br>
                            <input type="submit" name="btn_makLeave" button class="btn btn-block btn-primary">Primary</button>
                        </section>

                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-4 connectedSortable">

                        </section>
                    </div>
                    <!-- right col -->
                </div>
            </form>
            <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->


