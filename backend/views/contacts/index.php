<?php require('backend/views/commons/header.php'); ?>
<!-- iCheck -->
<link rel="stylesheet" href="backend/public/plugins/iCheck/flat/blue.css">
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
                    <li class="active">Trang quản lý các liên hệ</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 pull-right">
                        <div class="row">
                            <!-- BEGIN CONTENT -->
                            <?php require('backend/views/contacts/table.php'); ?>
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
    <!-- iCheck -->
    <script src="backend/public/plugins/iCheck/icheck.min.js"></script>

    <script>
        $(function () {
            //Enable iCheck plugin for checkboxes
            //iCheck for checkbox and radio inputs
            $('.mailbox-messages input[type="checkbox"]').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });

            //Enable check and uncheck all functionality
            $(".checkbox-toggle").click(function () {
                var clicks = $(this).data('clicks');
                if (clicks) {
                    //Uncheck all checkboxes
                    $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
                    $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
                } else {
                    //Check all checkboxes
                    $(".mailbox-messages input[type='checkbox']").iCheck("check");
                    $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
                }
                $(this).data("clicks", !clicks);
            });

            //Handle starring for glyphicon and font awesome
            $(".mailbox-star").click(function (e) {
                e.preventDefault();
                //detect type
                var $this = $(this).find("a > i");
                var glyph = $this.hasClass("glyphicon");
                var fa = $this.hasClass("fa");

                //Switch states
                if (glyph) {
                    $this.toggleClass("glyphicon-star");
                    $this.toggleClass("glyphicon-star-empty");
                }

                if (fa) {
                    $this.toggleClass("fa-star");
                    $this.toggleClass("fa-star-o");
                }
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

        });

        function refreshURL() {
            var key = $.trim($("#search-term-input").val());
            if (key.length > 0) {
                location.href = '<?= $actual_link ?>' + '&search=' + key;
            } else {
                location.href = '<?= $actual_link ?>';
            }
        }

        toastr.options.closeButton = true;
        toastr.options.newestOnTop = true;
        
        function makeImportant(id, val) {
            var formData = new FormData();
            formData.append('id', id);
            formData.append('val', val);
            $.ajax({
                url: "admin.php?controller=contacts&action=update-important", // Url to which the request is send
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
                    } else if (data.result === 'false')
                        toastr.error(data.message);
                }
            });
        }

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