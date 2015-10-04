<link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plugins/datatables/dataTables.bootstrap.css"/>


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
                    </div>
                    <!-- /.box-header -->
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

<script type="text/javascript">

    $(document).ready(function () {

        function tableLoad() {
            var oTable = $('#leave_Edit_tbl').dataTable();  //Initialize the datatable
            $.ajax({
                url: '<?= site_url('leaveEditController/dbSelect'); ?>',
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
                            "<button type='button' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#conn'>Edit</button>"
                        ]);
                    } // End For

                },
                error: function (e) {
                    console.log(e.responseText);
                }
            });
        }



        $('#leave_Edit_tbl tbody').on('click', 'button', function () {
            var parentRow = $(this).parents('tr')[0];

            document.getElementById('leaveId').value = $('td:eq(0)', parentRow).html();
            document.getElementById('name').value = $('td:eq(1)', parentRow).html();
            document.getElementById('sigId').value = $('td:eq(2)', parentRow).html();
            document.getElementById('description_text').value = $('td:eq(4)', parentRow).html();

        });

        $('#editLeave').submit(function () {

            var form = $(this);
            form.children('button').prop('disabled', true);


            var faction = "<?= site_url('leaveEditController/leaveEdit'); ?>"
            var fdata = form.serialize();

            $.post(faction, fdata, function (rdata) {

                var json = $.parseJSON(rdata);

                if (json.isSuccessful) {
                    $('#successMessage').html(json.message);
                    $('#conn').modal('hide');
                    tableLoad();
                } else {
                    $('#errorMessage').html(json.message);
                }
                form.children('button').prop('disabled', false);
            });
            return false;
        });
        window.onload = tableLoad;
    });


</script>

<div class="example-modal">
    <div class="modal" id="conn" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Leave</h4>
                </div>
                <form id="editLeave" accept-charset="utf-8">
                    <div class="modal-body">
                        <div class="container-fluid">

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Leave ID:</label>
                                <input type="text" class="form-control" name="leaveID_txt" id="leaveId" readonly="readonly"/>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Name:</label>
                                        <input type="text" class="form-control" name="name-txt" id="name" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Singnature No:</label>
                                        <input type="text" class="form-control" name="signatureID-txt" id="sigId"
                                               disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Leave type</label>
                                        <select class="form-control" name="select_leave_Type">
                                            <option>Casual Leave</option>
                                            <option>Duty Leave</option>
                                            <option>Sick leave</option>
                                            <option>Paid leave</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Leave type</label>
                                        <select class="form-control" name="select_leave_Type">
                                            <option>Casual Leave</option>
                                            <option>Duty Leave</option>
                                            <option>Sick leave</option>
                                            <option>Paid leave</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Leave Description:</label>
                                <textarea class="form-control" name="description_txt" id="description_text" ></textarea>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="reset" class="btn btn-danger ">Remove</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
    <!-- /.example-modal -->