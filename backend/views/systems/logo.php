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
                    <small><?= ADMINISTRATOR_VERSION ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="admin.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li><a href="admin.php?controller=systems"> Quản lý hệ thống</a></li>
                    <li class="active">Trang chỉnh sửa logo - banner</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 pull-right">
                        <!-- BEGIN CONTENT -->
                        <?php require('backend/views/systems/logo-form.php'); ?>
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
    <script src="./backend/public/fileinput/js/fileinput_no_circle.js" type="text/javascript"></script>
    <script src="./backend/public/fileinput/js/fileinput_no_circle_1.js" type="text/javascript"></script>
    <script type="text/javascript">
        toastr.options.closeButton = true;
        toastr.options.newestOnTop = true;
        $(document).ready(
                function () {
                    var btnCust_banner = '<button type="submit" class="btn btn-default" title="Add picture" ' +
                            ' id="btn-banner-id">' +
                            '<i class="glyphicon glyphicon-floppy-disk"></i>' +
                            '</button>';
                    var btnCust_logo = '<button type="submit" class="btn btn-default" title="Add picture" ' +
                            ' id="btn-logo-id">' +
                            '<i class="glyphicon glyphicon-floppy-disk"></i>' +
                            '</button>';
                    $("#logo-id").fileinput({
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
                        defaultPreviewContent: '<img src="<?= $logo->THONG_TIN_TO_CHUC ?>" alt="Logo picture" id="logo-id"/>',
                        layoutTemplates: {main2: '{preview} ' + btnCust_logo + ' {remove} {browse}'},
                        allowedFileExtensions: ["ico"]
                    });

                    $("#banner-id").fileinput1({
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
                        defaultPreviewContent: '<img src="<?= $banner->THONG_TIN_TO_CHUC ?>" alt="Banner picture" id="banner-id" width="100px"/>',
                        layoutTemplates: {main2: '{preview} ' + btnCust_banner + ' {remove} {browse}'},
                        allowedFileExtensions: ["jpg", "png", "jpeg"]
                    });

                    $("#btn-logo-id").prop("disabled", true);
                    $("#btn-logo-id").hide();
                    $("#btn-banner-id").prop("disabled", true);
                    $("#btn-banner-id").hide();

                    $("#upload-image-logo").on('submit', (function (e) {
                        e.preventDefault();
                        var formData = new FormData(this);
                        formData.append('id', $("#id_info_logo").val());
                        $.ajax({
                            url: "admin.php?controller=systems&action=logo-save", // Url to which the request is send
                            type: "POST", // Type of request to be send, called as method
                            data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                            contentType: false, // The content type used when sending data to the server.
                            cache: false, // To unable request pages to be cached
                            processData: false, // To send DOMDocument or non processed data file it is set to false
                            success: function (data)   // A function to be called if request succeeds
                            {
                                data = JSON.parse(data);
                                if (data.result === 'true') {
                                    toastr.success(data.message);
                                    $("#url-logo").val(data.url);
                                    $("#btn-logo-id").prop("disabled", true);
                                    $("#btn-logo-id").hide();
                                } else if (data.result === 'false')
                                    toastr.error(data.message);
                            }
                        });
                    }));
                    
                    $("#upload-image-banner").on('submit', (function (e) {
                        e.preventDefault();
                        var formData = new FormData(this);
                        formData.append('id', $("#id_info_banner").val());
                        $.ajax({
                            url: "admin.php?controller=systems&action=banner-save", // Url to which the request is send
                            type: "POST", // Type of request to be send, called as method
                            data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                            contentType: false, // The content type used when sending data to the server.
                            cache: false, // To unable request pages to be cached
                            processData: false, // To send DOMDocument or non processed data file it is set to false
                            success: function (data)   // A function to be called if request succeeds
                            {
                                data = JSON.parse(data);
                                if (data.result === 'true') {
                                    toastr.success(data.message);
                                    $("#url-banner").val(data.url);
                                    $("#btn-banner-id").prop("disabled", true);
                                    $("#btn-banner-id").hide();
                                } else if (data.result === 'false')
                                    toastr.error(data.message);
                            }
                        });
                    }));

                    $(".fileinput-remove").click(function () {
                        $("#logo-id").attr("src", "<?= $logo->THONG_TIN_TO_CHUC ?>");
                        $("#btn-logo-id").prop("disabled", true);
                        $("#btn-logo-id").hide();
                    });


                    $(".fileinput1-remove").click(function () {
                        $("#banner-id").attr("src", "<?= $banner->THONG_TIN_TO_CHUC ?>");
                        $("#btn-banner-id").prop("disabled", true);
                        $("#btn-banner-id").hide();
                    });
                });

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