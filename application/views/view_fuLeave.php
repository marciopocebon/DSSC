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

                            <label>Signature No : </label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                <input type="number" class="form-control" name="txtSignatureNo" id="sigID"
                                       placeholder="Number" required maxlength="3">
                            </div>
                            </br>
                            <label>Name : </label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="txtName" id="empName"
                                       placeholder="Name" required maxlength="100">
                            </div>
                            </br>
                            <label>Leave Reason : </label>

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
<!--                            <h3 class="box-title">Leave Form</h3>-->
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Select Leave type : </label>
                                <select class="form-control" name="select_leave_Type" id="select_leave_Type">
                                    <option>Casual</option>
                                    <option>Duty</option>
                                    <option>Sick</option>
                                    <option>Paid</option>
                                </select>
                            </div>
                            <label>Total Leave Count : </label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="leaveCount" id="leaveCount" readonly
                                        required maxlength="3">
                            </div>
                            </br>
                            <div class="form-group">
                                <label>Select Leave option : </label>
                                <select class="form-control" name="selectType" id="selectType">
                                    <option>Half day</option>
                                    <option>Short leave</option>
                                    <option value="FullDay">Full leave</option>
                                </select>
                            </div>
                            <label>Select Leave Date : </label>
                            <div class="box-body">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    <input type="text" placeholder="DD/MM/YYYY" name="txtDate" id="from" class="form-control"
                                          />
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div id="toDatediv" style="display: none">
                                <label>To : </label>
                                <div class="box-body">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" placeholder="DD/MM/YYYY" name="txtToDate" id="to" class="form-control"
                                               />
                                    </div>
                                </div>
                            </div>
                            <label>No of Working Days : </label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="workingDays" id="workingDays"  readonly
                                       required maxlength="3">

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

            var faction = "<?= site_url('leaveController/inserts'); ?>"
            var fdata = form.serialize();

            $.post(faction, fdata, function (rdata) {

                var json = $.parseJSON(rdata);

                if (json.isSuccessful) {
//                    $('#successMessage').html(json.message);
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
        //check if it is the enter key pressed
        if(keycode == '13'){
            signatureID={ "empID":$(this).val()};
            var emID = JSON.stringify(signatureID);

            $('#tbSendTblDataToServer').val('JSON array to send to server: \n\n' + emID.replace(/},/g, "},\n"));

            $.ajax({
                type: "POST",
                url: "<?=site_url('leaveController/searchSigID') ?>",
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

    document.getElementById("to").onchange = function() {dateCount()};

    function dateCount() {
        var from= document.getElementById('from').value;
        var to= document.getElementById('to').value;

        dates={ "from":from , "to":to};
        var days = JSON.stringify(dates);

        $('#tbSendTblDataToServer').val('JSON array to send to server: \n\n' + days.replace(/},/g, "},\n"));

        $.ajax({
            type: "POST",
            url: "<?=site_url('leaveController/dateCounter') ?>",
            data: "days=" + days,
            success: function (data) {
                obj = JSON.parse(data);
                $('#workingDays').val(obj.message);
            }
        });
        //Stop the event from propogation to other handlers
        //If this line will be removed, then keypress event handler attached
        //at document level will also be triggered
        event.stopPropagation();
    }
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

    $(function () {
        $("#select_leave_Type").change(function () {
            var lType="";
            if ($(this).val() == "Casual") {
                lType="c";
            } else if ($(this).val() == "Duty") {
                lType="d";
            }else if ($(this).val() == "Sick") {
                lType="s";
            }else if ($(this).val() == "Paid") {
                lType="p";
            }
            var signatureNo = document.getElementById("sigID").value;
            leave={ "leaveType":lType , "signatureNo":signatureNo};
            var leaveType = JSON.stringify(leave);

            $('#tbSendTblDataToServer').val('JSON array to send to server: \n\n' + leaveType.replace(/},/g, "},\n"));

            $.ajax({
                type: "POST",
                url: "<?=site_url('leaveController/getLeaveCount') ?>",
                data: "leaveType=" + leaveType,
                success: function (data) {
                    obj = JSON.parse(data);
                    $('#leaveCount').val(obj.message);
                }
            });
        });
    });


</script>
<script>
    $(function() {
        $( "#from" ).datepicker({
            defaultDate: "",
            changeMonth: true,
            numberOfMonths: 1,
            onClose: function( selectedDate ) {
                $( "#to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#to" ).datepicker({
            defaultDate: "",
            changeMonth: true,
            numberOfMonths: 1,
            onClose: function( selectedDate ) {
                $( "#from" ).datepicker( "option", "maxDate", selectedDate );
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





