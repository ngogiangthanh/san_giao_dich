<?php require('backend/views/commons/header.php'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="./backend/public/plugins/datatables/dataTables.bootstrap.css">
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
                    <li class="active">Trang quản lý ý tưởng</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                            <!-- BEGIN CONTENT -->
                            <?php require('backend/views/ideas/table.php'); ?>
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
    <!-- DataTables -->
    <script src="./backend/public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="./backend/public/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
</body>
</html>