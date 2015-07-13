<script src="<?php echo base_url() ?>js/dobPicker.min.js" xmlns="http://www.w3.org/1999/html"></script>

<div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Student
            <small>Management</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row" style="display: none;">
                        <form action="<?= site_url('studentController/StudentMarkSearch'); ?>" method="post">
            <div class="col-lg-12">
                <div class="box box-primary ">
                    <div class="box-header">
                        <h3 class="box-title">Enter Student Marks</h3>
                    </div>
                    <div class="box-footer text-black">
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="clearfix">
                                    <span class="pull-left">Select Grade</span>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="select_grade">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="clearfix">
                                    <span class="pull-left">Select Class</span>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="select_class">
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>D</option>
                                        <option>E</option>
                                        <option>F</option>
                                    </select>
                                </div>
                            </div>
                                <div class="col-sm-4">
                                    <div class="clearfix">
                                        <span class="pull-left">Select to proceed</span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="Enter" class="btn btn-primary">Select</button>
                                    </div>
                                </div>
                            <div class="col-sm-4">
                                <div class="clearfix">
                                    <span class="pull-left">Select Subject</span>
                                </div>
                                </hr>
                                <div class="form-group">
                                    <select class="form-control" name="select_subject" id="select_subject">
                                        <option value="1">Math</option>
                                        <option value="2">Science</option>
                                        <option value="3">Social Studies</option>
                                        <option value="4">Esthetic</option>
                                        <option value="5">English</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="clearfix">
                                    <span class="pull-left">Select Term</span>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="select_term" id="selectTerm">
                                        <option>Term1</option>
                                        <option>Term2</option>
                                        <option>Term3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right col -->
                </div>
            </div>
                        </form>
            <?php if (isset($_REQUEST['Enter'])) { ?>
            <div class="col-lg-12">
                <div class="box ">
                    <div class="box-header">
                        <h3 class="box-title">Student List in Class</h3>
                    </div>
                    <div class="box-body table-bordered">
                        <table class="table table-hover" id="table">
                            <tr>
                                <th>Index No</th>
                                <th>Student Name</th>
                                <th>Marks</th>
                            </tr>

                                <?php foreach ($results as $result): ?>
                            <tr>
                                <td><?= $result['Index_No']; ?></td>
                                <td><?= $result['name']; ?></td>
                                <td><input type="text" name="txtMarks" class="form-control"></td>
                               <td><input type="button" name="OK" class="ok" value="Save"/></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
            <?php }?>

        </div>
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<!--<script src="--><?php //base_url('js/jquery.json-2.4.min.js');?><!--"></script>-->
<script>

    $(document).ready(function() {
    $('.ok').on('click', function (e) {
        var select  = document.getElementById("select_subject");
        var subject = select.options[select.selectedIndex].value;
        var selects  = document.getElementById("selectTerm");
        var term = selects.options[selects.selectedIndex].text;
        var parentRow = $(this).parents('tr')[0];
        var TableData;
        TableData={
            "IndexNo" : $('td:eq(0)',parentRow).html()
            , "Marks" :$('input[name="txtMarks"]', parentRow).val()
            , "Subject": subject
            , "term":term
        };
        sendTblDataToServer(TableData);
        e.preventDefault();
        $(this).parent().parent().remove();
    });


    function sendTblDataToServer(dats)
    {
        var TableData = JSON.stringify(dats);

        $('#tbSendTblDataToServer').val('JSON array to send to server: \n\n' + TableData.replace(/},/g, "},\n"));

        $.ajax({
            type: "POST",
            url: "<?=site_url('studentController/insertMarks'); ?>",
            data: "pTableData=" + TableData,
            success: function (data) {
                //alert('This was sent back: ' + data);
            }
        });

    }
        });

</script>
