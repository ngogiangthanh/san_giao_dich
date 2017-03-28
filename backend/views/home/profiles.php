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
                    Bảng điều khiển 
                    <small>v1.0</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="admin.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li class="active">Hồ sơ cá nhân</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 pull-right">
                        <!-- BEGIN CONTENT -->
                        <?php require('backend/views/home/profiles-details.php'); ?>
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
        var btnCust = '<button type="button" class="btn btn-default" title="Add picture" ' +
                ' id="button-id">' +
                '<i class="glyphicon glyphicon-floppy-disk"></i>' +
                '</button>';
        $("#avatar-2").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            showBrowse: false,
            browseOnZoneClick: true,
            removeLabel: '',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-2',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="<?= $_SESSION["login"]["URL_DAI_DIEN"] ?>" class="profile-user-img img-responsive img-circle" alt="User profile picture" id="avatar_id">',
            layoutTemplates: {main2: '{preview} ' + btnCust + ' {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });

        $(document).ready(function (e) {
            $('#button-id').click(function () {
                $('#uploadimage').submit();
            });
            $("#uploadimage").on('submit', (function (e) {
                e.preventDefault();
                $("#message").empty();
                $('#loading').show();
                $.ajax({
                    url: "admin.php?controller=home&action=upload", // Url to which the request is send
                    type: "POST", // Type of request to be send, called as method
                    data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false, // To send DOMDocument or non processed data file it is set to false
                    success: function (data)   // A function to be called if request succeeds
                    {
                        $('#loading').hide();
                        $("#message").html(data);
                    }
                });
            }));
        });
    </script>
</body>
</html>