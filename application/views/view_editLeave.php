
<link rel="stylesheet" href="<?php echo base_url()?>bootstrap/plugins/datatables/dataTables.bootstrap.css" />



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
                    <table id="leave_Edit_tbl" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Leave ID no</th>
                            <th>Employee Name</th>
                            <th>Signature ID no</th>
                            <th>Leave Type</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Leave ID no</th>
                            <th>User ID no</th>
                            <th>Signature ID no</th>
                            <th>Leave Type</th>
                            <th>Description</th>
                            <th></th>
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

<script type="text/javascript">

    $(document).ready(function() {

        var oTable = $('#leave_Edit_tbl').dataTable();  //Initialize the datatable
                $.ajax({
                    url: '<?= site_url('leaveEditController/dbSelect'); ?>',
                    dataType: 'json',
                    success: function(s){
                        console.log(s);
                        oTable.fnClearTable();
                        for(var i = 0; i < s.length; i++) {
                            oTable.fnAddData([
                                s[i][0],
                                s[i][1],
                                s[i][2],
                                s[i][3],
                                s[i][4],
                                "<button type='button' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#conn'>Edit</button>"
                            ]);
                        } // End For

                    },
                    error: function(e){
                        console.log(e.responseText);
                    }
                });


        $('#leave_Edit_tbl tbody').on( 'click', 'button', function () {
            var parentRow = $(this).parents('tr')[0];
            var shit=$('td:eq(0)',parentRow).html();

            document.getElementById('ns').value=shit;
            document.getElementById('nd').value=$('td:eq(1)',parentRow).html();;
            document.getElementById('nc').value=$('td:eq(2)',parentRow).html();;

        } );
        });


</script>

<div class="example-modal" >
    <div class="modal" id="conn" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Leave</h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control"  name="ns" id="ns"/>
                    <input type="text" class="form-control"  name="nd" id="nd"/>
                    <input type="text" class="form-control"  name="nc" id="nc"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div><!-- /.example-modal -->