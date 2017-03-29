<?php require('backend/views/commons/header.php'); ?>
<link href="./backend/public/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
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
                    <li><a href="admin.php?controller=users">Trang quản lý thành viên</a></li>
                    <li class="active">Thêm mới thành viên</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 pull-right">
                        <!-- BEGIN CONTENT -->
                        <?php require('backend/views/users/form.php'); ?>
                        <!-- END CONTENT -->
                    </div>

                </div>
            </section>
        </div>

        <?php require('backend/views/commons/footer.php'); ?>
        <?php require('backend/views/commons/sidebar.php'); ?>
    </div>
    <div class="control-sidebar-bg"></div>

    <?php require('backend/views/commons/js.php'); ?>
    <script src="./backend/public/fileinput/js/fileinput.js" type="text/javascript"></script>
    <script type="text/javascript">
        toastr.options.closeButton = true;
        toastr.options.newestOnTop = true;
        $(document).ready(
                function () {
                    var btnCust = '';
                    $("#avatar-2").fileinput({
                        overwriteInitial: true,
                        maxFileSize: 5000,
                        showClose: true,
                        showCaption: false,
                        showBrowse: false,
                        showRemove: false,
                        showUpload: false,
                        browseOnZoneClick: true,
                        removeLabel: '',
                        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                        removeTitle: 'Cancel or reset changes',
                        elErrorContainer: '#kv-avatar-errors-2',
                        msgErrorClass: 'alert alert-block alert-danger',
                        defaultPreviewContent: '<img src="./uploads/images/avatar/default.png" class="profile-user-img img-responsive img-circle" alt="User profile picture" id="avatar-id" width="100px" height="100px"/>',
                        layoutTemplates: {main2: '{preview} ' + btnCust + ' {remove} {browse}'},
                        allowedFileExtensions: ["jpg", "png", "jpeg"]
                    });
                    
                    $(".fileinput-remove").click(function () {
                        $("#avatar-id").attr("src", "./uploads/images/avatar/default.png");
                        $("#button-id").prop("disabled", true);
                    });
                });

        function showPassword() {
            var str = $("#mat-khau").attr("type");
            if (str === "password") {
                $("#mat-khau").prop("type", "text");
                $("#btn-show-password").empty();
                $("#btn-show-password").append("<i class='ionicons ion-android-unlock'></i>");
            } else if (str === "text") {
                $("#mat-khau").prop("type", "password");
                $("#btn-show-password").empty();
                $("#btn-show-password").append("<i class='ionicons ion-android-lock'></i>");
            }
        }
        <?php
        $message_error = show_message("error");
        $message_success = show_message("success");
        if ($message_error != NULL) {
            ?>
                    toastr.error("<?= $message_error ?>");
            <?php
        }
        if ($message_success != NULL) {
            ?>
                    toastr.success("<?= $message_success ?>");
            <?php
        }
        ?>

    </script>
</body>
</html>