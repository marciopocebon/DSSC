<script src="<?php echo base_url() ?>js/dobPicker.min.js"></script>

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
        <div class="row"  style="display: none;">
                        <form action="<?= site_url('studentController/StudentSearch'); ?>" method="post">
            <div class="col-lg-12">
                <div class="box box-primary ">
                    <div class="box-header">
                        <h3 class="box-title">Enter Student Marks</h3>
                    </div>
                    <div class="box-footer text-black">
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- Progress bars -->
                                <div class="clearfix">
                                    <span class="pull-left">Enter Index No</span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="txtIndexNo" class="form-control"></select>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="clearfix">
                                    <span class="pull-left">Search Student</span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="search"  class="btn btn-primary" value="Search">
                                </div>
                            </div>
<!--                            <div class="col-sm-4">-->
<!--                                <div class="clearfix">-->
<!--                                    <span class="pull-left">Select Class</span>-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <select class="form-control" name="select_grade">-->
<!--                                        <option>A</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                    </div>
                    <!-- right col -->
                </div>
            </div>
                        </form>
        </div>
        <?php if (isset($_REQUEST['search'])) { ?>
        <div class="row"  style="display: none;">
            <div class="col-lg-12">
                <div class="box ">
                    <div class="box-header">
                        <h3 class="box-title">Student List in Class</h3>
                    </div>
                    <div class="box-body table-bordered ">
                        <table class="table table-responsive">
                            <tr>
                                <th>Index No</th>
                                <th>Student Name</th>
                                <th>Subject</th>
                                <th>Term 1</th>
                                <th>Term 2</th>
                                <th>Term 3</th>
                            </tr
                            <tr>
                                <?php foreach ($results as $result): ?>
                            <tr>
                                <td><?= $result['Index_No']; ?></td>
                                <td><?= $result['name']; ?></td>
                                <td><?= $result['subject_name']; ?></td>
                                <td><?= $result['term1']; ?></td>
                                <td><?= $result['term2']; ?></td>
                                <td><?= $result['term3']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->


