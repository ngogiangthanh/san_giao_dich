
<div class="left-sidebar">
    <h2><?= LEFT_SIDEBAR_CATEGORY ?></h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#ideas">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        <?= LEFT_SIDEBAR_CATEGORY_IDEA ?>
                    </a>
                </h4>
            </div>
            <div id="ideas" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul>
                        <li><a href="#"><?= LEFT_SIDEBAR_CATEGORY_IDEA_IT ?></a></li>
                        <li><a href="#"><?= LEFT_SIDEBAR_CATEGORY_IDEA_BUSINESS ?></a></li>
                        <li><a href="#"><?= LEFT_SIDEBAR_CATEGORY_IDEA_FOOD ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="#"><?= LEFT_SIDEBAR_CATEGORY_SOLUTION ?></a></h4>
            </div>
        </div>
    </div><!--/category-products-->

    <div class="brands_products"><!--brands_products-->
        <h2><?= LEFT_SIDEBAR_CATEGORY_TOP_KEYS ?></h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="#"> <span class="pull-right">(50)</span>Nông nghiệp công nghệ cao</a></li>
                <li><a href="#"> <span class="pull-right">(56)</span>Thương mại điện tử</a></li>
                <li><a href="#"> <span class="pull-right">(27)</span>Bản đồ thông minh</a></li>
                <li><a href="#"> <span class="pull-right">(32)</span>Thành phố thông minh</a></li>
            </ul>
        </div>
    </div><!--/brands_products-->

    <div class="shipping text-center"><!--advertising-->
        <img src="./public/images/home/qc.png" alt="" />
    </div><!--/advertising-->
    <br/>

</div>