<link rel="stylesheet" href="<?php echo base_url()?>bootstrap/plugins/datatables/dataTables.bootstrap.css" />
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
                        <table id="leave_accept_tbl" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date of Leave</th>
                                <th>Name</th>
                                <th>Signature ID no</th>
                                <th>Leave Type</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
<!--                            --><?php //foreach ($results as $result): ?>
<!--                                <tr>-->
<!--                                    <td>--><?//= $result['leave_date']; ?><!--</td>-->
<!--                                    <td>--><?//= $result['emp_name']; ?><!--</td>-->
<!--                                    <td>--><?//= $result['signature_id']; ?><!--</td>-->
<!--                                    <td>--><?//= $result['leave_type']; ?><!--</td>-->
<!--                                    <td>-->
<!--                                        <a href="--><?php //echo base_url('index.php/acceptController/tableLink?index=') . $result['leave_id']; ?><!--"><i-->
<!--                                                class="btn btn-xs btn-warning">More</i> </a></td>-->
<!---->
<!--                                </tr>-->
<!--                            --><?php //endforeach; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Date of Leave</th>
                                <th>Name</th>
                                <th>Signature ID no</th>
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
    $(document).ready(function() {

        //$('#jsontable').dataTable( {
        //     "ajax": 'arrays.txt'
        // } );

        var oTable = $('#leave_accept_tbl').dataTable();  //Initialize the datatable


        var user = $(this).attr('id');
        if(user != '')
        {
            $.ajax({
                url: '<?= site_url('leaveEditController/dbSelect'); ?>',
                dataType: 'json',
                success: function(s){
                    console.log(s);
                    oTable.fnClearTable();
                    for(var i = 0; i < s.length; i++) {
                        oTable.fnAddData([
                            s[i][0],
                            s[i][1],
                            s[i][2],
                            s[i][3],
                            "<button type='button' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#conn'>Accept</button>"
                        ]);

                    } // End For

                },
                error: function(e){
                    console.log(e.responseText);
                }
            });
        }

        $('#leave_accept_tbl tbody').on( 'click', 'button', function () {
            var parentRow = $(this).parents('tr')[0];
            var shit=$('td:eq(0)',parentRow).html();

            document.getElementById('ns').value=shit;
            document.getElementById('nd').value=$('td:eq(1)',parentRow).html();;
            document.getElementById('nc').value=$('td:eq(2)',parentRow).html();;

        } );
    });

    $(function () {
//        $( "#datepicker" ).datepicker();
        $("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd");
    });
</script>

<div class="example-modal" >
    <div class="modal" id="conn" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Accept Leave</h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control"  name="ns" id="ns"/>
                    <input type="text" class="form-control"  name="nd" id="nd"/>
                    <input type="text" class="form-control"  name="nc" id="nc"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div><!-- /.example-modal -->


