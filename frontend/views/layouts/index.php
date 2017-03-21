<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= TITLE_HOME ?></title>
        <meta name="description" content="">
        <meta name="author" content="">

        <?php
        include_once './frontend/views/commons/header.php';
        ?> 
    </head>
    <!--/head-->

    <body>

        <?php
        include_once './frontend/views/commons/top.php';
        include_once './frontend/views/commons/slider.php';
        ?> 

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <?php
                        include_once './frontend/views/commons/left-sidebar.php';
                        ?> 
                    </div>
                    <div class="col-sm-9 padding-right">
                        <?php
                        include_once $content;
                        ?> 
                    </div>
                </div>
            </div>
        </section>


        <?php
        include_once './frontend/views/commons/footer.php';
        include_once './frontend/views/commons/javascripts.php';
        ?> 
    </body>
</html>