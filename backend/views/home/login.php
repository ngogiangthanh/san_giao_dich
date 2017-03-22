<?php require('backend/views/common/header.php'); ?>

<body>
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <a class="navbar-brand" href=""><i
                    class="glyphicon glyphicon-th-large"></i>&nbsp;&nbsp;<?= LOGIN_TITLE ?></a>
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="row">
                <!-- BEGIN CONTENT -->
                <div id="login">
                    <div class="container">
                        <div class="panel panel-default">
                            <div class="panel-heading ">
                                <h4>
                                    <i class="glyphicon glyphicon-cog"></i>&nbsp;&nbsp;<?= LOGIN_TITLE ?>
                                </h4>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="login.html" class="form-signin"
                                      role="form" onsubmit="">
                                    <div class="form-group">
                                        <input name="username" type="text"
                                               class="form-control input-lg"
                                               placeholder="<?= LOGIN_USERNAME_PLACEHOLDER ?>" required="" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password"
                                               class="form-control input-lg" placeholder="<?= LOGIN_PASSWORD_PLACEHOLDER ?>"
                                               required="">
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block" type="submit"><?= LOGIN_SUBMIT_BUTTON ?></button>
                                </form>
                            </div>
                        </div>
                        <!-- /container -->
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
</div>
<!--/.container-->
<script type="text/javascript" src="public/js/jquery-1.10.0.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="public/js/toastr.js"></script>
</body>
</html>