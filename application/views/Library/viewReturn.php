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
        <div class="row" style="display: none;">
            <form id="returnForm">
                <section class="col-xs-6 ">
                    <!-- Input addon -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Book Return</h3>
                        </div>
                        <div class="box-body">

                            <label>Student ID : </label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-child "></i></span>
                                <input type="number" class="form-control" name="studentID" id="studentID"
                                       placeholder="Student ID">
                            </div>
                            </br>

                            <div class="input-group-btn">
                                <button type="button" id="return" name="return"
                                        class="btn btn-group-xs btn-primary pull-right">Return
                                </button>
                            </div>

                        </div>
                </section>
                <!-- Middle col -->

                <section class="col-xs-6">
                    <div class="box box-primary">
                        <div class="box-header">
                        </div>
                        <div class="box-body">
                            <div class="form-group">

                                <label>ISBN : </label>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-certificate "></i></span>
                                    <input type="number" class="form-control" name="isbn" id="isbn" readonly>
                                </div>
                                </br>
                                <label>Title : </label>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                    <input type="text" class="form-control" name="title" id="title" readonly>
                                </div>
                                </br>
                                <label>Issue Date : </label>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                    <input type="text" class="form-control" name="issueDate" id="issueDate" readonly>
                                </div>
                                </br>
                                <div class="form-group">
                                    <label>Due Date : </label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                        <input type="text" class="form-control" name="dueDate" id="dueDate" readonly>
                                    </div>
                                </div>
                                </br>
                                <label>Student Name : </label>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-table"></i></span>
                                    <input type="text" class="form-control" name="studentName" id="studentName"
                                           readonly>
                                </div>
                                </br>
                                <label>Over Due Dates : </label>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                    <input type="text" name="overDueDates" id="overDueDates" class="form-control"
                                           readonly/>
                                </div>

                            </div>
                </section>
            </form>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">
    $(document).ready(function () {

        $('#return').click(function () {
            var studentID = document.getElementById('studentID').value;
            var isbn = document.getElementById('isbn').value;
            returns = {"studentID": studentID, "isbn":isbn};
            var returns = JSON.stringify(returns);
            $('#tbSendTblDataToServer').val('JSON array to send to server: \n\n' + returns.replace(/},/g, "},\n"));

            $.ajax({
                type: "POST",
                url: "<?=site_url('libraryController/returnBook') ?>",
                data: "returns=" + returns,
                success: function (data) {
                    obj = JSON.parse(data);
                    if (obj.isSuccessful) {
                        document.getElementById("returnForm").reset();
                        $('#success').modal('show');
                    }
                }
            });
        });
    });

    $('#studentID').keypress(function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            studentID = {"studentID": $(this).val()};
            var stuID = JSON.stringify(studentID);

            $('#tbSendTblDataToServer').val('JSON array to send to server: \n\n' + stuID.replace(/},/g, "},\n"));

            $.ajax({
                type: "POST",
                url: "<?=site_url('libraryController/studentDueBooks') ?>",
                data: "studentID=" + stuID,
                success: function (data) {
                    obj = JSON.parse(data);
                    $('#isbn').val(obj.message[0][0]);
                    $('#title').val(obj.message[0][1]);
                    $('#issueDate').val(obj.message[0][2]);
                    $('#dueDate').val(obj.message[0][3]);
                    $('#studentName').val(obj.message[0][4]);
                    $('#overDueDates').val(obj.message[0][5]);
                }
            });
        }
        event.stopPropagation();
    });

</script>
<div class="example-modal">
    <div class="modal modal-success" id="success" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Success</h4>
                </div>
                <form id="editLeave" accept-charset="utf-8">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <p>The Book has been returned successfully!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success pull-left" data-dismiss="modal">Close</button>
                    </div>
            </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>