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
            <form id="addBooksForm" accept-charset="utf-8">
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
                                <input type="number" class="form-control" name="studentID" id="studentID"
                                       placeholder="ID" >
                            </div>
                            </br>
                            <label>ISBN : </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-certificate "></i></span>
                                <input type="number" class="form-control" name="isbn" id="isbn"
                                       placeholder="ISBN" required maxlength="60">
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
                                <button type="submit" name="btn_makLeave"
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
        $( "#issueDate" ).datepicker({
            defaultDate: "",
            changeMonth: true,
            numberOfMonths: 1,
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
</script>