<?php require('backend/views/commons/header.php'); ?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="admin.php"><b><i class="fa fa-users"></i>&nbsp;Quản trị hệ thống</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <form action="admin.php?controller=home&action=login" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Nhập tài khoản">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password"  class="form-control" placeholder="Nhập mật khẩu">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="glyphicon glyphicon-log-in"></i>&nbsp;Đăng nhập</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 2.2.3 -->
    <script src="./backend/public/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="./backend/public/bootstrap/js/bootstrap.min.js"></script>
    <script src="./public/js/toastr.js" type="text/javascript"></script>
    <script type="text/javascript">
        toastr.options.closeButton = true;
        toastr.options.newestOnTop = true;
        <?php
        $message_error = show_message("error");
        $message_warning = show_message("warning");
        if ($message_error != NULL) {
            ?>
                    toastr.error("<?= $message_error ?>");
            <?php
        }
        if ($message_warning != NULL) {
            ?>
                    toastr.warning("<?= $message_warning ?>");
            <?php
        }
        ?>
    </script>
</body>
</html>