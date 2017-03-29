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
                    <li class="active">Danh sách thành viên</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 pull-right">
                        <!-- BEGIN CONTENT -->
                        <?php require('backend/views/users/table.php'); ?>
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
    <script src="./public/js/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        toastr.options.closeButton = true;
        toastr.options.newestOnTop = true;
        $(document).ready(
                function () {
                    var btnCust = '<button type="submit" class="btn btn-default" title="Add picture" ' +
                            ' id="button-id">' +
                            '<i class="glyphicon glyphicon-floppy-disk"></i>' +
                            '</button>';
                    $("#avatar-2").fileinput({
                        overwriteInitial: true,
                        maxFileSize: 5000,
                        showClose: true,
                        showCaption: false,
                        showBrowse: false,
                        showRemove: false,
                        showUpload: true,
                        browseOnZoneClick: true,
                        removeLabel: '',
                        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                        removeTitle: 'Cancel or reset changes',
                        elErrorContainer: '#kv-avatar-errors-2',
                        msgErrorClass: 'alert alert-block alert-danger',
                        defaultPreviewContent: '<img src="" class="profile-user-img img-responsive img-circle" alt="User profile picture" id="avatar-id" width="100px" height="100px"/>',
                        layoutTemplates: {main2: '{preview} ' + btnCust + ' {remove} {browse}'},
                        allowedFileExtensions: ["jpg", "png", "jpeg"],
                        indicatorNew: '<i class="glyphicon glyphicon-hand-down text-warning"></i>',
                        indicatorSuccess: '<i class="glyphicon glyphicon-ok-sign text-success"></i>',
                        indicatorError: '<i class="glyphicon glyphicon-exclamation-sign text-danger"></i>',
                        indicatorLoading: '<i class="glyphicon glyphicon-hand-up text-muted"></i>',
                        indicatorNewTitle: 'Not uploaded yet',
                        indicatorSuccessTitle: 'Uploaded',
                        indicatorErrorTitle: 'Upload Error',
                        indicatorLoadingTitle: 'Uploading ...'
                    });
                    $('#search-term-input').on('keydown', function (e) {
                        if (e.which === 13) {
                            e.preventDefault();
                            refreshURL();
                        }
                    });

                    $('#search-term-btn').click(function (e) {
                        e.preventDefault();
                        refreshURL();
                    });
                    

                    $(".fileinput-remove").click(function () {
                        $("#avatar-id").attr("src", $("#id-url-avatar-temp").val());
                        $("#button-id").prop("disabled", true);
                    });
                    
                    $("#uploadimage").on('submit', (function (e) {
                        e.preventDefault();
                        var formData = new FormData(this);
			formData.append('tai_khoan', $("#tai-khoan").val());
			formData.append('id', $("#id-user").val());
                        $.ajax({
                            url: "admin.php?controller=users&action=upload", // Url to which the request is send
                            type: "POST", // Type of request to be send, called as method
                            data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                            contentType: false, // The content type used when sending data to the server.
                            cache: false, // To unable request pages to be cached
                            processData: false, // To send DOMDocument or non processed data file it is set to false
                            success: function (data)   // A function to be called if request succeeds
                            {
                                data = JSON.parse(data);
                                if(data.result === 'true'){
                                    toastr.success(data.message);
                                    $("#url-dai-dien").html(data.url);
                                }
                                else if(data.result === 'false')
                                    toastr.error(data.message);
                            }
                        });
                    }));
                });
        function refreshURL() {
            var key = $.trim($("#search-term-input").val());
            if (key.length > 0) {
                location.href = 'admin.php?controller=users&action=list&search=' + key;
            } else {
                location.href = 'admin.php?controller=users&action=list';
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