


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
        <div class="row" style="display:none">
            <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Select Leave forms</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Leave ID no</th>
                            <th>Employee Name</th>
                            <th>Signature ID no</th>
                            <th>Leave Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($result as $result): ?>
                        <tr>
                            <td><?=$result['leave_id']; ?></td>
                            <td><?=$result['emp_name']; ?></td>
                            <td><?=$result['signature_id']; ?></td>
                            <td><?=$result['leave_type']; ?></td>
                            <td><?=$result['leave_description']; ?></td>
                            <td>
                                <a href="<?php echo base_url('index.php/leaveEditController/tableLink?index=') . $result['leave_id']; ?>"><i
                                        class="btn btn-xs btn-warning">Edit</i> </a></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Leave ID no</th>
                            <th>User ID no</th>
                            <th>Signature ID no</th>
                            <th>Leave Type</th>
                            <th>Description</th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function() {
        $('.row').fadeIn(400);
    });
</script>