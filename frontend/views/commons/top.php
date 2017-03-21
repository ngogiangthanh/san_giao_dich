<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i>&nbsp;<?= TOP_PHONE_NUMBER ?></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>&nbsp;<?= TOP_EMAIL ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="?content=home"><img src="./public/images/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="?content=register#"><i class="fa fa-user"></i> <?= TOP_REGISTER ?></a></li>
                            <li><a href="?content=login#"><i class="fa fa-lock"></i> <?= TOP_LOGIN ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="?content=home" class="active"><?= TOP_MENU_HOME ?></a></li>
                            <li class="dropdown"><a href="?content=idea"><?= TOP_MENU_IDEA ?><i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="?content=it-solution"><?= TOP_MENU_IDEA_IT ?></a></li>
                                    <li><a href="?content=business-solution"><?= TOP_MENU_IDEA_BUSINESS ?></a></li> 
                                    <li><a href="?content=food-technology"><?= TOP_MENU_IDEA_FOOD ?></a></li> 
                                </ul>
                            </li> 
                            <li><a href="?content=solution"><?= TOP_MENU_SOLUTION ?></a></li> 
                            <li><a href="?content=about-us"><?= TOP_MENU_ABOUT_US ?></a></li>
                            <li><a href="?content=contact"><?= TOP_MENU_CONTACT ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="<?= TOP_SEARCH ?>"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->