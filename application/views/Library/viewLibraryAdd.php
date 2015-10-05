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
                        <label>ISBN : </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-certificate "></i></span>
                            <input type="number" class="numbersOnly form-control" name="isbn" id="isbn"
                                   placeholder="ISBN" min="1" step="1" required maxlength="13">
                        </div>
                        </br>
                        <label>Title : </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                            <input type="text" class="form-control" name="title" id="title"
                                   placeholder="Title" required maxlength="100">
                        </div>
                        </br>
                        <label>Subject : </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-bookmark-o "></i></span>
                                <select class="form-control" name="subject" id="subject">
                                    <option>Select</option>
                                    <?php foreach ($results as $result): ?>
                                            <option><?= $result['subject_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                        </div>
                        </br>
                        <div class="form-group">
                            <label>Author : </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="author" id="author"
                                       placeholder="Author" required maxlength="100">
                            </div>
                        </div>
                        <div class="input-group-btn">
                            <button type="submit" name="btn_makLeave"
                                    class="btn btn-success btn-primary pull-right">Save
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
                        <label>Edition : </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-edit "></i></span>
                            <input type="number" class="numbersOnly form-control" name="edition" id="edition"
                                   required maxlength="3" min="0" step="1">
                        </div>
                        </br>
                        <div class="form-group">
                            <label>Publisher : </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-puzzle-piece "></i></span>
                                <input type="text" class="form-control" name="publisher" id="publisher"
                                       required maxlength="100">
                            </div>
                        </div>
                        </br>
                        <label>Copies : </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-copy"></i></span>
                                <input type="number" class="numbersOnly form-control" placeholder="Number of Copies" name="copies" id="copies"
                                       required maxlength="3" min="1" step="1">
                            </div>
                        </br>
                        <label>Shelf No : </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-table"></i></span>
                            <input type="number" class="numbersOnly form-control" name="shelfNo" id="shelfNo" placeholder="Shell No"
                                   required maxlength="2" min="1" step="1">
                        </div>
                    </div>
            </section>
            </form>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        jQuery('.numbersOnly').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });

        $('#addBooksForm').submit(function () {

            var form = $(this);
            form.children('button').prop('disabled', true);

            var faction = "<?= site_url('libraryController/addBooks'); ?>"
            var fdata = form.serialize();

            $.post(faction, fdata, function (rdata) {
                var json = $.parseJSON(rdata);
                if (json.isSuccessful) {
                    document.getElementById("addBooksForm").reset();
                    $('#success').modal('show');
                } else {
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
                            <p>The NEW Books has been added!</p>
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
                            <strong>Adding Book failed!!</strong>
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