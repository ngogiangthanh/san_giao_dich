<?php require('backend/views/commons/header.php'); ?>
<?php
header('Access-Control-Allow-Origin: https://www.google.com/maps/embed');
?>
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="./backend/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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
                    <li><a href="admin.php?controller=systems"> Quản lý hệ thống</a></li>
                    <li class="active">Trang chỉnh sửa thông tin liên hệ</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 pull-right">
                        <!-- BEGIN CONTENT -->
                        <?php require('backend/views/systems/contact-us-form.php'); ?>
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
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="./backend/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script type="text/javascript">
        toastr.options.closeButton = true;
        toastr.options.newestOnTop = true;
        $(document).ready(
                function () {
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.plugins.add('imageuploader', {
                        init: function (editor) {
                            editor.config.filebrowserBrowseUrl = './libraries/imageuploader/imgbrowser.php';
                        }
                    });


                    CKEDITOR.replace('editor1', {
                        extraPlugins: 'imageuploader',
                        height: 250
                    });
                    $("#check-map-btn-id").on("click",function (e) {
                        e.preventDefault();
                        $('#map-show-id').attr('src', "https://www.google.com/maps/embed/v1/place?key="+$("#api-key-id").val()+"&q="+$("#dia-diem-id").val());
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