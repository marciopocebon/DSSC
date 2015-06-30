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

        <div class="row" style="display:none;">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Accepted Leaves</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
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
                            <tfoot>
                            <tr>
                                <th>Date of Leave</th>
                                <th>Name</th>
                                <th>Signature ID no</th>
                                <th>Leave Type</th>
                                <th>Leave Description</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->


