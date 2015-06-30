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
            <form action="<?= site_url('leaveEditController/leaveEdit'); ?>" method="post">

                <section class="col-xs-6 ">
                    <!-- Input addon -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Leave Edit Form</h3>
                        </div>
                        <div class="box-body">
                            <?php foreach ($result as $result): ?>
                            <label>Leave ID</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                <input type="text" class="form-control" name="txtLeaveID"
                                       placeholder="Leave Description" required maxlength="100" value="<?php echo $result['leave_id'] ?>" >
                            </div>
                            </br>
                             <label>Signature ID</label>
                             <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                <input type="text" class="form-control" name="txtSignatureID"
                                       placeholder="Signature ID" required maxlength="3" value="<?php echo $result['signature_id'] ?>"  disabled >
                            </div>
                            </br>
                             <label>Teacher Name</label>
                             <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="txtName"
                                       placeholder="Teacher Name" required maxlength="100" value="<?php echo $result['emp_name'] ?>"  disabled >
                            </div>
                            </br>
                                <label>Leave Description</label>
                             <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                <input type="text" class="form-control" name="txtDescription"
                                       placeholder="Leave Description" required maxlength="100" value="<?php echo $result['leave_description'] ?>" >
                            </div>
                            </br>
                                 <label>Leave Date</label>
                             <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control" name="txtDate"
                                       placeholder="DD/MM/YYYY" required maxlength="50" value=" <?php echo $result['leave_date'] ?>"   disabled>
                            </div>
                            </br>
                             <?php endforeach; ?>
                            <input type="submit" name="btn_makLeave" value="Update leave"
                                   class="btn btn-block btn-primary">
                        </div>
                </section>
                <!-- Middle col -->
            </form>

            <section class="col-xs-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Leave Form</h3>
                    </div>
                    <div class="box-body">

                    </div>
            </section>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

