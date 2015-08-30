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
                        <table id="acceptList-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Sig ID</th>
                                <th>Leave Type</th>
                                <th>Leave Option</th>
                                <th>Date From</th>
                                <th>Date To</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Sig ID</th>
                                <th>Leave Type</th>
                                <th>Leave Option</th>
                                <th>Date From</th>
                                <th>Date To</th>
                                <th>Description</th>
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
<script>
    $(document).ready(function() {

        var oTable = $('#acceptList-table').dataTable();  //Initialize the datatable
        $.ajax({
                url: '<?= site_url('acceptListController/populateTable'); ?>',
                dataType: 'json',
                success: function (s) {
                    console.log(s);
                    oTable.fnClearTable();
                    for (var i = 0; i < s.length; i++) {
                        oTable.fnAddData([
                            s[i][0],
                            s[i][1],
                            s[i][2],
                            s[i][3],
                            s[i][4],
                            s[i][5],
                            s[i][6],
                            s[i][7]
                        ]);

                    } // End For

                },
                error: function (e) {
                    console.log(e.responseText);
                }
            });

    });
</script>

