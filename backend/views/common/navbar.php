<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="admin.php"><i class="glyphicon glyphicon-th-large"></i>&nbsp;<?= NAVBAR_HOME_TITLE_ ?></a>
        </div>

        <?php if (isset($_SESSION['login']) && $_SESSION['login'][11] == 1) {
            ?>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" style="font-size: 15px">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= NAVBAR_STAFF ?>,&nbsp; <?php echo $_SESSION['login'][3]; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="admin.php?controller=user&amp;action=info"><i class="glyphicon glyphicon-user"></i>&nbsp;<?= NAVBAR_PROFILE ?></a></li>
                            <li class="divider"></li>
                            <li><a href="#" onclick="if (confirm('<?= NAVBAR_ALERT_LOGOUT ?>')) {
                                        location.href = 'admin.php?controller=home&amp;action=logout';
                                        return true;
                                    } else {
                                        return false;
                                    }"><i class="glyphicon glyphicon-off"></i>&nbsp;<?= NAVBAR_LOGOUT ?></a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
            <?php
        }
        ?>
    </div><!-- /.container-fluid -->
</nav>
<style type="text/css">
    .dropdown-menu>li>a:hover {
        color: #000;
        font-weight: normal;
        font-size: 14px;
    }
    .dropdown-menu>li>a {
        color: #000;
    }
</style>