<?php require('backend/views/common/header.php'); ?>
<body>
    <?php require('backend/views/common/navbar.php'); ?>
    <script type="text/javascript" src="public/js/jquery-1.10.0.min.js"></script>
    <script type="text/javascript" src="public/js/toastr.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-12 pull-left" id="sidebar" role="navigation">
                <?php require('backend/views/common/sidebar.php'); ?>
            </div>
            <div class="col-sm-9 col-xs-12 pull-right">
                <div class="row">
                    <!-- BEGIN CONTENT -->
                    <?php require('backend/views/user/detail.php'); ?>
                    <!-- END CONTENT -->
                </div>
            </div><!--/span-->            
        </div><!--/row-->
    </div><!--/.container-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebar .panel-heading').click(function() {
                $('#sidebar .list-group').toggleClass('hidden-xs');
                $('#sidebar .panel-heading b').toggleClass('glyphicon-plus-sign').toggleClass('glyphicon-minus-sign');
            });
            $('#btnsubmit').click(function() {
                if ($('#statusactive:checked').length != <?= $user['STATUS'] ?>)//php
                {
                    var i = $('#statusactive:checked').length;
                    location.href = "admin.php?controller=user&action=edit&type=save&check=" + i + "&uid=<?= $user['ID'] ?>";//PHP
                }
            });
        });
    </script>
</body>
</html>