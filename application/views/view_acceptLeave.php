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
                                <th>Date of Leave</th>
                                <th>Name</th>
                                <th>Signature ID no</th>
                                <th>Leave Type</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Date of Leave</th>
                                <th>Name</th>
                                <th>Signature ID no</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
<!--            <div class="col-xs-7">-->
<!--                <div class="box box-primary">-->
<!--                    <div class="box-header">-->
<!--                        <h3 class="box-title">Leave Form</h3>-->
<!--                    </div>-->
<!--                    <div class="box-body">-->
<!--                        <form action="--><?//= site_url('acceptController/inserts'); ?><!--" method="post">-->
<!---->
<!--                            --><?php //foreach ($res as $res1): ?>
<!--                            <p>-->
<!--                               <label> Leave ID : --><?php //echo $res1['leave_id'] ?><!-- .............    </label>-->
<!--                                <label class="header">  Signature ID : --><?php //echo $res1['emp_name'] ?><!--</label>-->
<!--                            </p>-->
<!--                            </br>-->
<!--                            <p>-->
<!--                                Leave Description : --><?php //echo $res1['leave_description'] ?>
<!--                            </p>-->
<!--                            </br>-->
<!--                            <p>-->
<!--                                Leave Type : --><?php //echo $res1['leave_type'] ?>
<!--                            </p>-->
<!--                            </br>-->
<!---->
<!--                             --><?php //endforeach; ?>
<!--                            </br>-->
<!--                            <div class="input-group">-->
<!--                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>-->
<!--                                <input type="text" class="form-control" name="txtName" placeholder="Name">-->
<!--                            </div>-->
<!--                            </br>-->
<!--                            <div class="col-xs-2">-->
<!--                            <input type="submit" name="btn_makLeave" button-->
<!--                                   class="btn btn-block btn-primary">Primary</button>-->
<!--                            </div>-->
<!--                            <img src="dist/img/user1-128x128.jpg" alt="User Image"/>-->
<!--                            <a class="users-list-name" href="#">Teacher</a>-->
<!--                            <span class="users-list-date">Today</span>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function () {

        function tableLoad() {
            var oTable = $('#acceptLeave-table').dataTable();  //Initialize the datatable
            $.ajax({
                url: '<?= site_url('acceptController/select'); ?>',
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
                            "<button type='button' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#conn'>more</button>"
                        ]);
                    } // End For

                },
                error: function (e) {
                    console.log(e.responseText);
                }
            });
        }

        $('#acceptLeave-table tbody').on('click', 'button', function () {
            var parentRow = $(this).parents('tr')[0];
            document.getElementById('leaveId').value = $('td:eq(0)', parentRow).html();
            document.getElementById('name').value = $('td:eq(1)', parentRow).html();
            document.getElementById('sigId').value = $('td:eq(2)', parentRow).html();
            document.getElementById('description_text').value = $('td:eq(4)', parentRow).html();
        });

        $('#accept').on('click',function () {
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

        $('#accept').submit(function () {

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
                                        <input type="text" class="form-control" name="name-txt" id="name" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Signature No:</label>
                                        <input type="text" class="form-control" name="signatureID-txt" id="sigId"
                                               disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Leave Type</label>
                                        <input type="text" class="form-control" name="leaveID-txt" id="leave-Type"
                                               disabled/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Leave option</label>
                                        <input type="text" class="form-control" name="signatureID-txt" id="leave-option"
                                               disabled/>
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
                            <button type="reset"  class="btn btn-danger">Reject</button>
                            <button type="submit" name="accept" id="accept" class="btn btn-success ">Accept</button>
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


