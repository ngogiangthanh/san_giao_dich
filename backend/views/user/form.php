<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-th-list"></i>&nbsp;<?= PROFILE_ADMIN_TITLE ?></div>
    <div class="panel-body">
        <form id="user-form" class="form-horizontal" method="post" action="admin.php?controller=user&action=info" enctype="multipart/form-data" role="form">
            <input name="id" type="hidden" value="<?= $_SESSION['login'][0] ?>"/>
            <div class="form-group">
                <label for="username" class="col-sm-3 control-label"><?= PROFILE_ADMIN_USERNAME ?></label>
                <div class="col-sm-9">
                    <input name="username" type="text" value="<?= $_SESSION['login'][1] ?>" class="form-control" readonly="readonly"/>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label"><?= PROFILE_ADMIN_PASSWORD ?></label>
                <div class="col-sm-9">
                    <input name="password" type="password" value="" class="form-control" id="password" placeholder="<?= PROFILE_ADMIN_PASSWORD_PLACEHOLDER ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label"><?= PROFILE_ADMIN_NAME ?></label>
                <div class="col-sm-9">
                    <input name="name" type="text" value="<?= $_SESSION['login'][3] ?>" class="form-control" id="name" placeholder="<?= PROFILE_ADMIN_NAME_PLACEHOLDER ?>" required=""/>
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-3 control-label"><?= PROFILE_ADMIN_ADDRESS ?></label>
                <div class="col-sm-9">
                    <input name="address" type="text" value="<?= $_SESSION['login'][6] ?>" class="form-control" id="address" placeholder="<?= PROFILE_ADMIN_ADDRESS_PLACEHOLDER ?>" required=""/>
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-sm-3 control-label"><?= PROFILE_ADMIN_PHONE ?></label>
                <div class="col-sm-9">
                    <input name="phone" type="text" value="<?= $_SESSION['login'][9] ?>" class="form-control" id="phone" placeholder="<?= PROFILE_ADMIN_PHONE_PLACEHOLDER ?>" pattern="[0-9]{10,15}" required=""/>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label"><?= PROFILE_ADMIN_EMAIL ?></label>
                <div class="col-sm-9">
                    <input name="email" type="email" value="<?= $_SESSION['login'][10] ?>" class="form-control" id="email" placeholder="<?= PROFILE_ADMIN_EMAIL_PLACEHOLDER ?>" required=""/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary"><?= PROFILE_ADMIN_BUTTON_UPDATE ?></button>
                    <a class="btn btn-warning" href="admin.php"><?= PROFILE_ADMIN_BUTTON_BACK ?></a>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    toastr.options.closeButton = true;
    toastr.options.newestOnTop = true;
<?php
if (isset($_GET['statusupdate']) && $_GET['statusupdate'] == 'true') {
    ?>
        toastr.success("<?= PROFILE_ADMIN_ALERT_UPDATE_SUCCESS ?>");
    <?php
} else if (isset($_GET['statusupdate']) && $_GET['statusupdate'] == 'false') {
    ?>
        toastr.error("<?= PROFILE_ADMIN_ALERT_UPDATE_FAILED ?>");
    <?php
}
?>
</script>