<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="<?php echo base_url('libraryController');?>">
                    <i class="fa fa-home"></i>
                    <span>Library Home</span>
                </a>
            </li>
            <li class="header">BOOKS</li>
            <li>
                <a href="<?php echo base_url('libraryController/loadLibList');?>">
                    <i class="glyphicon glyphicon-edit "></i> <span>All Books</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('libraryController/loadLibAdd');?>">
                    <i class="fa fa-book "></i> <span>Add Books
                    </span>
                </a>
            </li>
            <li class="header">BOOK LEND</li>
            <li>
                <a href="<?php echo base_url('libraryController/loadLibBorrow');?>">
                    <i class="fa fa-arrow-right "></i> <span>Borrow Book
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('libraryController/loadLibReturn');?>">
                    <i class="fa fa-arrow-left "></i> <span>Return Book
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('libraryController/loadLibDueBooks');?>">
                    <i class="fa fa-align-center"></i> <span>Today Due Books
                    </span>
                </a>
            </li>
<!--            <li>-->
<!--                <a href="--><?php //echo base_url('libraryController/loadLibReturn');?><!--">-->
<!--                    <i class="fa fa-table"></i> <span>View Borrow Details-->
<!--                    </span>-->
<!--                </a>-->
<!--            </li>-->
            <li class="header">SETTINGS</li>
            <li>
                <a href="<?php echo base_url('libraryController/loadLibCategory');?>">
                    <i class="fa fa-graduation-cap"></i> <span>Add New Book Categories
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('libraryController/loadLibLocation');?>">
                    <i class="fa fa-compass "></i> <span>Change Book Location
                    </span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>