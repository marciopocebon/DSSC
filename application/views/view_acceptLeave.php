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

        <div class="row" style="display: none;">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Leave Request list</h3>

                        <div class="box-tools">
                            <div class="input-group">
                                <form action="<?= site_url('acceptController/dateSearch'); ?>" method="post">
                                    <input type="text" name="table_search" id="datepicker"
                                           class="form-control input-sm pull-right" style="width: 150px;"
                                           placeholder="Search"/>

                                    <div class="input-group-btn">
                                        <input type="submit" button class="btn btn-sm btn-default " name="search"><i
                                            class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="acceptLeave-table" class="table table-bordered table-striped">
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
                                <th></th>
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
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->
<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script>
    $(document).ready(function () {

        /*
         *loading database values to table using dataTable
         */
        function tableLoad() {
            var oTable = $('#acceptLeave-table').dataTable();  //Initialize the datatable
            $.ajax({
                url: '<?= site_url('acceptController/select'); ?>',
                dataType: 'json',
                success: function (s) {
//                    console.log(s);
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
                            "<button type='button' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#conn'>more</button>"
                        ]);
                    } // End For

                },
                error: function (e) {
                    console.log(e.responseText);
                }
            });
        }

        /*
        *on more button click event
        *load table data values to modal text box
        */
        $('#acceptLeave-table tbody').on('click', 'button', function () {
            var parentRow = $(this).parents('tr')[0];
            document.getElementById('leaveId').value = $('td:eq(0)', parentRow).html();
            document.getElementById('name').value = $('td:eq(1)', parentRow).html();
            document.getElementById('sigId').value = $('td:eq(2)', parentRow).html();
            document.getElementById('leave_Type').value = $('td:eq(3)', parentRow).html();
            document.getElementById('leave_option').value = $('td:eq(4)', parentRow).html();
            document.getElementById('fromDate').value = $('td:eq(5)', parentRow).html();
            document.getElementById('toDate').value = $('td:eq(6)', parentRow).html();
            document.getElementById('description_text').value = $('td:eq(7)', parentRow).html();
        });


        //loading table data on page loading
        window.onload = tableLoad;

        /*
         * Reject leave on click javascript
         * send leave id to acceptController rejectLeave function
         */
        $('#reject').click(function () {
            var leaveId = document.getElementById('leaveId').value;


            var leaveID = JSON.stringify(leaveId);
            $('#tbSendTblDataToServer').val('JSON array to send to server: \n\n' + leaveID.replace(/},/g, "},\n"));

            $.ajax({
                type: "POST",
                url: "<?=site_url('acceptController/rejectLeave') ?>",
                data: "leaveID=" + leaveID,
                success: function (data) {
                    obj = JSON.parse(data);
                    if(obj.isSuccessful)
                    {
                        $('#conn').modal('toggle');
                        tableLoad();
                    }
                }
            });
        });

        /*
          * Accept leave on click javascript
          * send leave id to acceptController acceptLeave function
        */
        $('#accept').click(function () {
            var leaveId = document.getElementById('leaveId').value;
            var sigID = document.getElementById('sigId').value;
            var leaveType = document.getElementById('leave_Type').value;
            var fromDate = document.getElementById('fromDate').value;
            var toDate = document.getElementById('toDate').value;

            leaveAccept={ "leaveID":leaveId, "sigID":sigID,"leaveType":leaveType,"fromDate":fromDate , "toDate":toDate};
            var leaveAccepts = JSON.stringify(leaveAccept);
            $('#tbSendTblDataToServer').val('JSON array to send to server: \n\n' + leaveAccepts.replace(/},/g, "},\n"));

            $.ajax({
                type: "POST",
                url: "<?=site_url('acceptController/acceptLeave') ?>",
                data: "leaveAccepts=" + leaveAccepts,
                success: function (data) {
                    obj = JSON.parse(data);
                    if(obj.isSuccessful)
                    {
                        $('#conn').modal('toggle');
                        tableLoad();
                    }
                }
            });
        });
    });

    $(function () {
        $("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd");
    });
</script>

<div class="example-modal">
    <div class="modal" id="conn" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Accept Leave</h4>
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
                                        <input type="text" class="form-control" name="name_txt" id="name" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Signature No:</label>
                                        <input type="text" class="form-control" name="signatureID_txt" id="sigId"
                                               readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Leave Type</label>
                                        <input type="text" class="form-control" name="leaveType_txt" id="leave_Type"
                                               readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Leave option</label>
                                        <input type="text" class="form-control" name="leave_option" id="leave_option"
                                               readonly/>
                                    </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Leave Date</label>
                                        <input type="text" class="form-control" name="fromDate" id="fromDate"
                                               readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">To</label>
                                        <input type="text" class="form-control" name="toDate" id="toDate"
                                               readonly/>
                                    </div>
                                    </div>
                                </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Leave Description:</label>
                                <textarea class="form-control" name="description_txt" id="description_text" readonly="readonly"></textarea>

                            </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" name="reject" id="reject" class="btn btn-danger">Reject</button>

                            <button type="button" name="accept" id="accept" class="btn btn-success ">Accept</button>
                        </div>
                </form>
            </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
    <!-- /.example-modal -->


