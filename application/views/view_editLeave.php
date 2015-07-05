
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
        <div class="row" style="display:none">
            <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Select Leave forms</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Leave ID no</th>
                            <th>Employee Name</th>
                            <th>Signature ID no</th>
                            <th>Leave Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
<!--                        --><?php //foreach($result as $result): ?>
<!--                        <tr>-->
<!--                            <td>--><?//=$result['leave_id']; ?><!--</td>-->
<!--                            <td>--><?//=$result['emp_name']; ?><!--</td>-->
<!--                            <td>--><?//=$result['signature_id']; ?><!--</td>-->
<!--                            <td>--><?//=$result['leave_type']; ?><!--</td>-->
<!--                            <td>--><?//=$result['leave_description']; ?><!--</td>-->
<!--                            <td>-->
                                <a href="<?php echo base_url('index.php/leaveEditController/tableLink?index=')  ?>"><i
                                        class="btn btn-xs btn-warning">Edit</i> </a></td>
<!--                        </tr>-->
<!--                        --><?php //endforeach; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Leave ID no</th>
                            <th>User ID no</th>
                            <th>Signature ID no</th>
                            <th>Leave Type</th>
                            <th>Description</th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">

    $(document).ready(function() {

        //$('#jsontable').dataTable( {
        //     "ajax": 'arrays.txt'
        // } );

        var oTable = $('#example1').dataTable();  //Initialize the datatable


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
                                s[i][4]
                            ]);
                        } // End For

                    },
                    error: function(e){
                        console.log(e.responseText);
                    }
                });
            }
        });


</script>