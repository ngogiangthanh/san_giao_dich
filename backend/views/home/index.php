<?php require('backend/views/commons/header.php'); ?>
<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
        <?php require('backend/views/commons/main-header.php'); ?>
        <?php require('backend/views/commons/aside.php'); ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                   <i class="fa fa-dashboard">&nbsp;</i>Bảng điều khiển 
                    <small><?=ADMINISTRATOR_VERSION?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="admin.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li class="active">Bảng điều khiển</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 pull-right">
                        <div class="row">
                            <!-- BEGIN CONTENT -->
                            <?php require('backend/views/home/menu.php'); ?>
                            <!-- END CONTENT -->
                        </div>
                    </div>

                </div>
            </section>
        </div>

        <?php require('backend/views/commons/footer.php'); ?>
        <?php require('backend/views/commons/sidebar.php'); ?>
    </div>
    <div class="control-sidebar-bg"></div>

    <?php require('backend/views/commons/js.php'); ?>

    <script type="text/javascript">
        toastr.options.closeButton = true;
        toastr.options.newestOnTop = true;
        <?php
        $message_success = show_message("success");
        if ($message_success != NULL) {
            ?>
                    toastr.success("<?= $message_success ?>");
            <?php
        }
        ?>
    </script>
</body>
</html>