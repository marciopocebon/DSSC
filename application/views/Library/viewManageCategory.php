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
            <section class="col-xs-6 ">
                <!-- Input addon -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Manage Category</h3>
                    </div>
                    <div class="box-body">
                        <table id="subjectList-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Subject</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
            </section>
            <!-- Middle col -->

            <section class="col-xs-6">
                <div class="box box-primary">
                    <div class="box-header">
                    </div>
                    <form name="subjectForm" id="subjectForm">
                        <div class="box-body">
                            <div class="form-group">
                                <label>New Subject Category : </label>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                    <input type="text" class="form-control" name="subject" id="subject"
                                           placeholder="Subject" required maxlength="300">
                                </div>
                            </div>
                            <div class="input-group-btn">
                                <button type="submit" name="btn_makLeave"
                                        class="btn btn-group-xs btn-success pull-right">Add
                                </button>
                            </div>
                        </div>
                    </form>
            </section>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
    $(document).ready(function () {
        function tableLoad() {
            var oTable = $('#subjectList-table').dataTable();
            $.ajax({
                url: '<?= site_url('libraryController/subjectList'); ?>',
                dataType: 'json',
                success: function (s) {
                    oTable.fnClearTable();
                    for (var i = 0; i < s.length; i++) {
                        oTable.fnAddData([
                            s[i][0],
//                            "<button type='button' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#conn'>Edit</button>",
                            "<button type='button' class='btn btn-danger btn-xs ' ><span><i class='fa fa-close '></i></span></button>"
                        ]);
                    }
                },
                error: function (e) {
                    console.log(e.responseText);
                }
            });
        }

        window.onload = tableLoad();

        $('#subjectForm').submit(function () {

            var form = $(this);
            form.children('button').prop('disabled', true);

            var faction = "<?= site_url('libraryController/addSubject'); ?>"
            var fdata = form.serialize();

            $.post(faction, fdata, function (rdata) {
                var json = $.parseJSON(rdata);
                if (json.isSuccessful) {
                    document.getElementById("subjectForm").reset();
                    tableLoad()
                } else {
                    $('#error').modal('show');
                }
                form.children('button').prop('disabled', false);
            });
            return false;
        });


        /*
         *on remove button click event
         */
        $('#subjectList-table tbody').on('click', 'button', function () {
            var parentRow = $(this).parents('tr')[0];
            var subject = $('td:eq(0)', parentRow).html();

            subjects={ "subject":subject};
            var subs = JSON.stringify(subjects);
            $('#tbSendTblDataToServer').val('JSON array to send to server: \n\n' + subs.replace(/},/g, "},\n"));

            $.ajax({
                type: "POST",
                url: "<?=site_url('libraryController/deleteSubjects') ?>",
                data: "subjects=" + subs,
                success: function (data) {
                    obj = JSON.parse(data);
                    if(obj.isSuccessful)
                    {
                        tableLoad();
                    }
                    else
                    {
                        alert("error");
                    }
                }
            });
        });
    });
</script>
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
                            <p>The Subject already in the database!</p>
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