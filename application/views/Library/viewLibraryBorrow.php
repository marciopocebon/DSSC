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
            <form id="borrowForm" accept-charset="utf-8">
                <section class="col-xs-6 ">
                    <!-- Input addon -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Book Detail Form</h3>
                        </div>
                        <div class="box-body">
                            <label>Student ID : </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-child "></i></span>
                                <input type="number" class="numbersOnly form-control" name="studentID" id="studentID"
                                       placeholder="ID" min="0" step="1" >
                            </div>
                            </br>
                            <label>ISBN : </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-certificate "></i></span>
                                <input type="number" class="numbersOnly form-control" name="isbn" id="isbn"
                                       placeholder="ISBN" required maxlength="60" min="0" step="1">
                            </div>
                            </br>
                            <label>Issue Date : </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                <input type="text" class="form-control" name="issueDate" id="issueDate"
                                       placeholder="DD/MM/YYYY">
                            </div>
                            </br>
                            <label>Due Date : </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                <input type="text" class="form-control" name="dueDate" id="dueDate"
                                       placeholder="DD/MM/YYYY">
                            </div>
                            </br>
                            <label>Number of Days : </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-bookmark-o "></i></span>
                                <input type="text" class="form-control" name="noOfDays" id="noOfDays" readonly>
                            </div>
                            </br>
                            <div class="input-group-btn">
                                <button type="submit" name="borrowBtn"
                                        class="btn btn-group-xs btn-success pull-right">Borrow Book
                                </button>
                            </div>
                        </div>
                </section>
                </form>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
    $(function() {
        var dateToday = new Date();
        $( "#issueDate" ).datepicker({
            defaultDate: "",
            changeMonth: true,
            numberOfMonths: 1,
            minDate: dateToday,
            onClose: function( selectedDate ) {
                $( "#dueDate" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#dueDate" ).datepicker({
            defaultDate: "",
            changeMonth: true,
            numberOfMonths: 1,
            onClose: function( selectedDate ) {
                $( "#issueDate" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    });

    document.getElementById("dueDate").onchange = function() {dateCount()};

    function dateCount() {
        var from= document.getElementById('issueDate').value;
        var to= document.getElementById('dueDate').value;

        dates={ "from":from , "to":to};
        var days = JSON.stringify(dates);

        $('#tbSendTblDataToServer').val('JSON array to send to server: \n\n' + days.replace(/},/g, "},\n"));

        $.ajax({
            type: "POST",
            url: "<?=site_url('libraryController/dateCounter') ?>",
            data: "days=" + days,
            success: function (data) {
                obj = JSON.parse(data);
                $('#noOfDays').val(obj.message);
            }
        });
        event.stopPropagation();
    }

    $(document).ready(function () {
        jQuery('.numbersOnly').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });

        $('#borrowForm').submit(function () {

            var form = $(this);
            form.children('button').prop('disabled', true);

            var faction = "<?= site_url('libraryController/borrowBooks'); ?>"
            var fdata = form.serialize();

            $.post(faction, fdata, function (rdata) {
                var json = $.parseJSON(rdata);
                if (json.isSuccessful) {
                    document.getElementById("borrowForm").reset();
                    $('#success').modal('show');
                } else {
                    document.getElementById("borrowForm").reset();
                    $('#error').modal('show');
                }
                form.children('button').prop('disabled', false);
            });
            return false;
        });
        $('.content').fadeIn(400);
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
                            <p>The book has been reserved !</p>
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
<div class="example-modal">
    <div class="modal modal-danger" id="error" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Error</h4>
                </div>
                <form id="editLeave" accept-charset="utf-8">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <strong>Cannot Borrow!!</strong>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    </div>
            </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>