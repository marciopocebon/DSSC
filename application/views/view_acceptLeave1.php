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

            <form action="<?= site_url('acceptController/acceptLeave'); ?>" method="post" name="acceptForm">
                <section class="col-xs-6 ">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Leave Form</h3>
                        </div>
                        <div class="box-body">

                            <!-- Input addon -->
                            <?php foreach ($res as $result): ?>
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
                                       placeholder="Leave Description" required maxlength="100" value="<?php echo $result['signature_id'] ?>" disabled >
                            </div>
                            </br>
                             <label>Teacher Name</label>
                             <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="txtName"
                                       placeholder="Number" required maxlength="100" value="<?php echo $result['emp_name'] ?>" disabled >
                            </div>
                            </br>
                                <label>Leave Description</label>
                             <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                <input type="text" class="form-control" name="txtDescription"
                                       placeholder="Number" required maxlength="100" value="<?php echo $result['leave_description'] ?>"  disabled >
                            </div>
                            </br>
                                <label>Leave Date</label>
                                 <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                <input type="text" class="form-control" name="txtDate"
                                       placeholder="DD/MM/YYYY" required maxlength="100" value="<?php echo $result['leave_date'] ?>" disabled>
                            </div>
                            </br>
                             <?php endforeach; ?>

                        </div>
                    </div>
                </section>

                <section class="col-xs-6 ">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Leave Form</h3>
                        </div>
                        <div class="box-body">
                            <div class="btn-group">
                                <table>
                                    <tr>
                                        <td>
                                            <input type="submit" name="btn_accept" button
                                                    class="btn btn-block btn-success ">Accept
                                            </button>
                                        </td>
<!--                                        <td></td>-->
<!--                                        <td>-->
<!--                                            <button type="submit" name="btn_reject" button-->
<!--                                                    class="btn btn-block btn-danger ">Reject-->
<!--                                            </button>-->
<!--                                        </td>-->
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
            <!-- /.row (main row) -->

            <div>
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->
