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
        <div class="row" style="display:none;">
            <!-- Left col -->
            <form id="formLeave" accept-charset="utf-8">

                <section class="col-xs-6 ">
                    <!-- Input addon -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Leave Form</h3>
                        </div>
                        <div class="box-body">

                            <label>Signature No</label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                <input type="number" class="form-control" name="txtSignatureNo" id="sigID"
                                       placeholder="Number" required maxlength="3">
                            </div>
                            </br>
                            <label>Name</label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="txtName" id="empName"
                                       placeholder="Name" required maxlength="100">
                            </div>
                            </br>

                            <label>Leave Reason</label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                <textarea class="form-control" rows="5" id="leave_reason" name="txtDescription"
                                          placeholder="Leave Reason"></textarea>
                            </div>
                            </br>
                            <div class="input-group-btn">
                                <button type="submit" name="btn_makLeave"
                                        class="btn btn-group-xs btn-primary">Make a leave
                                </button>
                            </div>

                            <div class="input-group-btn">
                                <button  type="reset"
                                        class="btn btn-group-xs btn-default">Reset
                                </button>
                            </div>
                        </div>
                </section>
                <!-- Middle col -->

                <section class="col-xs-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Leave Form</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Select Leave type</label>
                                <select class="form-control" name="select_leave_Type">
                                    <option>Casual Leave</option>
                                    <option>Duty Leave</option>
                                    <option>Sick leave</option>
                                    <option>Paid leave</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Leave option</label>
                                <select class="form-control" name="selectType" id="selectType">
                                    <option>Half day</option>
                                    <option>Short leave</option>
                                    <option value="FullDay">Full leave</option>
                                </select>
                            </div>
                            <label>Select Leave Date</label>

                            <div class="box-body">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    <input type="date" placeholder="DD/MM/YYYY" name="txtDate" class="form-control"
                                          />
                                </div>
                                <!-- /.input group -->
                            </div>
                            </br>


                            <div id="toDatediv" style="display: none">
                                <label>To</label>
                                <div class="box-body">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="date" placeholder="DD/MM/YYYY" name="txtToDate" class="form-control"
                                               />
                                    </div>
                            </div>
                            </div>
                        </div>
                </section>
                <!-- /.Left col -->
            </form>

        </div>

        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#formLeave').submit(function () {

            var form = $(this);
            form.children('button').prop('disabled', true);
            $('#success').hide();
            $('#error').hide();

            var faction = "<?= site_url('site/inserts'); ?>"
            var fdata = form.serialize();

            $.post(faction, fdata, function (rdata) {

                var json = $.parseJSON(rdata);

                if (json.isSuccessful) {
                    $('#successMessage').html(json.message);
                    document.getElementById("formLeave").reset();
                    $('#conn').modal('show');

                } else {
                    $('#errorMessage').html(json.message);
                    $('#error').show();
                }

                form.children('button').prop('disabled', false);
            });

            return false;
        });

        $('.content').fadeIn(400);
    });

    //Bind keypress event to textbox
    $('#sigID').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            signatureID={ "empID":$(this).val()};
            var emID = JSON.stringify(signatureID);

            $('#tbSendTblDataToServer').val('JSON array to send to server: \n\n' + emID.replace(/},/g, "},\n"));

            $.ajax({
                type: "POST",
                url: "<?=site_url('leaveEditController/searchSigID') ?>",
                data: "empID=" + emID,
                success: function (data) {
                    obj = JSON.parse(data);
                    $('#empName').val(obj.message);
                }
            });
        }
        //Stop the event from propogation to other handlers
        //If this line will be removed, then keypress event handler attached
        //at document level will also be triggered
        event.stopPropagation();
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#selectType").change(function () {
            if ($(this).val() == "FullDay") {
                $("#toDatediv").show();
            } else {
                $("#toDatediv").hide();
            }
        });
    });
</script>
<div class="example-modal">
    <div class="modal modal-success" id="conn" role="dialog">
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
                        <p>The leave request is successful!</p>
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





