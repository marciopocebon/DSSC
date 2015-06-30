<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="<?php echo base_url('studentController/viewStudentHome');?>">
                    <i class="fa fa-home"></i>
                    <span>Student Home</span>
                </a>
            </li>

            <li>
                <a href="<?php echo base_url('studentController/viewStudent_enterMarks');?>">
                    <i class="glyphicon glyphicon-edit "></i> <span>Enter Marks</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('studentController/StudentSearch');?>">
                    <i class="fa fa-male"></i> <span>Search Students
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('studentController/viewStudentReport');?>">
                    <i class="fa fa-print"></i> <span>Print Report
                    </span>
                </a>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>