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

        <div class="row" style="display:none;">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Change Book Location</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="booksList-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ISBN</th>
                                <th>Book Name</th>
                                <th>Subject</th>
                                <th>Author</th>
                                <th>Edition</th>
                                <th>Publisher</th>
                                <th>Copies Available</th>
                                <th>Total Copies</th>
                                <th>Shelf No</th>
<!--                                <th>Action</th>-->
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
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

        var oTable = $('#booksList-table').dataTable();  //Initialize the datatable
        $.ajax({
            url: '<?= site_url('libraryController/booksList'); ?>',
            dataType: 'json',
            success: function (s) {
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
                        s[i][7],
                        s[i][8],
//                        "<button type='button' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#conn'>more</button>"
                    ]);

                } // End For

            },
            error: function (e) {
                console.log(e.responseText);
            }
        });

    });
</script>

