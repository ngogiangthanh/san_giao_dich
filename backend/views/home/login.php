<?php require('backend/views/common/header.php'); ?>

<body>
    <?php require('backend/views/common/navbar.php'); ?>
    <script type="text/javascript" src="public/js/jquery-1.10.0.min.js"></script>
    <script src="public/js/toastr.js" type="text/javascript"></script>
    <br/>
    <div class="col-sm-3 col-sm-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading "><h4><i class="glyphicon glyphicon-cog"></i>&nbsp;<?= LOGIN_TITLE ?></h4></div>
            <div class="panel-body">
                <form method="post" action="admin.php?controller=home&action=login" class="form-signin" role="form">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control input-lg" placeholder="<?= LOGIN_USERNAME_PLACEHOLDER ?>" required="" autofocus>
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control input-lg" placeholder="<?= LOGIN_PASSWORD_PLACEHOLDER ?>" required="">
                    </div>            
                    <button class="btn btn-lg btn-primary btn-block" type="submit"><?= LOGIN_SUBMIT_BUTTON ?></button>
                </form>
            </div>
        </div> <!-- /container -->
    </div>
    <script type="text/javascript">
        toastr.options.closeButton = true;
        toastr.options.newestOnTop = true;
<?php if (isset($_GET['statuslogin']) && $_GET ['statuslogin'] == 'false') : ?>
            toastr.error("<?= LOGIN_ALERT_LOGIN_FAILED ?>");
<?php
endif;
if (isset($_GET['statuspassword']) && $_GET ['statuspassword'] == 'true') :
    ?>
            toastr.success("<?= LOGIN_ALERT_PASSWORD_CHANGED ?>");
<?php endif; ?>
    </script>
</body>
</html>