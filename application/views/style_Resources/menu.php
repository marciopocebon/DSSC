<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="<?php echo base_url('site/viewLeave');?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Leave Home</span>
                </a>
            </li>
            <?php if($this->session->userdata('role')=="p") {?>
            <li>
                <a href="<?php echo base_url('site/viewAccept');?>">
                    <i class="fa fa-check-square-o"></i> <span>Accept Leave Request</span>
                    <small class="label pull-right bg-red">3</small>
                </a>
            </li>

            <?php } elseif($this->session->userdata('role')=="l") {?>
            <li>
                <a href="<?php echo base_url('site/viewMaLeave');?>">
                    <i class="fa fa-star"></i> <span>Make A Leave</span>
                </a>
            </li>
            <?php }  ?>

            <li>
                <a href="<?php echo base_url('site/viewEditLeave');?>">
                    <i class="fa fa-edit"></i>
                    <span>Edit Leave Request</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('site/viewMonthlyLeave');?>">
                    <i class="fa fa-file-text-o"></i> <span>Monthly Report</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('site/printing');?>">
                    <i class="fa fa-file-text-o"></i> <span>Daily Leave Report</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('site/viewAccList_Leave');?>">
                    <i class="fa fa-list"></i> <span>Accepted Leave List</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>