
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $_SESSION['login']['URL_DAI_DIEN'] ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $_SESSION['login']['HO_TEN'] ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Tìm kiếm...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <li class="treeview">
                <a href="admin.php?controller=ideas">
                    <i class="fa fa-info"></i> <span>Quản lý ý tưởng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin.php?controller=ideas&action=list"><i class="fa fa-list"></i>&nbsp;Danh sách ý tưởng</a></li>
                    <li><a href="admin.php?controller=ideas&action=add"><i class="fa fa-plus"></i>&nbsp;Thêm mới ý tưởng</a></li>
                    <li><a href="admin.php?controller=ideas&action=report"><i class="fa fa-area-chart"></i>&nbsp;Lập thống kê - báo cáo</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="admin.php?controller=solutions">
                    <i class="fa fa-question-circle"></i>
                    <span>Quản lý vấn đề</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin.php?controller=solutions&action=list"><i class="fa fa-list"></i>&nbsp;Danh sách vấn đề</a></li>
                    <li><a href="admin.php?controller=solutions&action=add"><i class="fa fa-plus"></i>&nbsp;Thêm mới vấn đề</a></li>
                    <li><a href="admin.php?controller=solutions&action=report"><i class="fa fa-area-chart"></i>&nbsp;Lập thống kê - báo cáo</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="admin.php?controller=contacts">
                    <i class="fa fa-phone-square"></i> <span>Quản lý liên hệ</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin.php?controller=contacts&action=list"><i class="fa fa-list"></i>&nbsp;Danh sách liên hệ</a></li>
                    <li><a href="admin.php?controller=contacts&action=report"><i class="fa fa-area-chart"></i>&nbsp;Lập thống kê - báo cáo</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="admin.php?controller=users">
                    <i class="fa fa-user"></i>
                    <span>Quản lý thành viên</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin.php?controller=users&action=list"><i class="fa fa-list"></i>&nbsp;Danh sách thành viên</a></li>
                    <li><a href="admin.php?controller=users&action=add"><i class="fa fa-plus"></i>&nbsp;Thêm mới thành viên</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="admin.php?controller=systems">
                    <i class="fa fa-laptop"></i>
                    <span>Quản lý hệ thống</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin.php?controller=systems&action=about-us"><i class="fa fa-info-circle"></i>&nbsp;Thông tin giới thiệu</a></li>
                    <li><a href="admin.php?controller=users&action=contact-us"><i class="fa fa-phone"></i>&nbsp;Thông tin liên hệ</a></li>
                    <li><a href="admin.php?controller=users&action=logo"><i class="fa fa-send"></i>&nbsp;Thông tin logo - banner</a></li>
                    <li><a href="admin.php?controller=users&action=category"><i class="fa fa-info"></i>&nbsp;Menu chuyên mục ý tưởng</a></li>
                    <li><a href="admin.php?controller=users&action=configuration"><i class="fa fa-windows"></i>&nbsp;Cấu hình hệ thống</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>