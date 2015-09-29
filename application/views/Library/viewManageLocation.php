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

        <div class="row" style="display:none;">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Change Book Location</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="booksList-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ISBN</th>
                                <th>Book Name</th>
                                <th>Subject</th>
                                <th>Author</th>
                                <th>Edition</th>
                                <th>Publisher</th>
                                <th>Copies Available</th>
                                <th>Total Copies</th>
                                <th>Shelf No</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
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
<script>
    $(document).ready(function() {

        function tableLoad() {
            var oTable = $('#booksList-table').dataTable();  //Initialize the datatable
            $.ajax({
                url: '<?= site_url('libraryController/booksList'); ?>',
                dataType: 'json',
                success: function (s) {
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
                            s[i][8],
                            "<button type='button' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#changeLocation'>Change</button>"
                        ]);
                    }
                },
                error: function (e) {
                    console.log(e.responseText);
                }
            });
        }

        window.onload=tableLoad();

        /*
         *on more button click event
         *load table data values to modal text box
         */
        $('#booksList-table tbody').on('click', 'button', function () {
            var parentRow = $(this).parents('tr')[0];
            document.getElementById('isbn').value = $('td:eq(0)', parentRow).html();
            document.getElementById('title').value = $('td:eq(1)', parentRow).html();
            document.getElementById('shelfNo').value = $('td:eq(8)', parentRow).html();

        });

        /*
         * Accept leave on click javascript
         * send leave id to acceptController acceptLeave function
         */
        $('#change').click(function () {
            var isbn = document.getElementById('isbn').value;
            var shelfNo = document.getElementById('shelfNo').value;

            changeLocation={ "isbn":isbn,"shelfNo":shelfNo};
            var changeLocation = JSON.stringify(changeLocation);
            $('#tbSendTblDataToServer').val('JSON array to send to server: \n\n' + changeLocation.replace(/},/g, "},\n"));

            $.ajax({
                type: "POST",
                url: "<?=site_url('libraryController/changeLocation') ?>",
                data: "changeLocation=" + changeLocation,
                success: function (data) {
                    obj = JSON.parse(data);
                    if(obj.isSuccessful)
                    {
                        $('#changeLocation').modal('toggle');
                        tableLoad();
                    }
                    else
                    {
                        $('#changeLocation').modal('toggle');
                        alert("error");
                    }
                }
            });
        });
    });
</script>
<div class="example-modal">
    <div class="modal" id="changeLocation" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Change Shelf</h4>
                </div>
                <form id="editLeave" accept-charset="utf-8">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">ISBN :</label>
                                <input type="text" class="form-control" name="isbn" id="isbn" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Title:</label>
                                <input type="text" class="form-control" name="title" id="title" readonly />
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Shelf No:</label>
                                <input type="text" class="form-control" name="shelfNo" id="shelfNo" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" name="change" id="change" class="btn btn-danger">Change</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
