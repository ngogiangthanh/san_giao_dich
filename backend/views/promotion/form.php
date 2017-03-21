<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-gift"></i>&nbsp;<?= PROMOTION_EDIT_TITLE ?></div>
    <div class="panel-body">
        <form id="product-form" class="form-horizontal" method="post" action="admin.php?controller=promotion&amp;action=edit" enctype="multipart/form-data" role="form">
            <input name="id" type="hidden" value="<?php echo $promotion ? $promotion['ID'] : '0'; ?>"/>
            <div class="form-group">
                <label for="name_promotion" class="col-sm-3 control-label"><?= PROMOTION_EDIT_NAME ?></label>
                <div class="col-sm-9">
                    <input name="name_promotion" type="text" value="<?= $promotion ? $promotion['NAME_PROMOTION'] : ''; ?>" class="form-control" id="name_promotion" placeholder="<?= PROMOTION_EDIT_NAME_PLACEHOLDER ?>" required=""/>
                </div>
            </div>
            <div class="form-group">
                <label for="summary" class="col-sm-3 control-label"><?= PROMOTION_EDIT_CONTENT ?></label>
                <div class="col-sm-9">
                    <textarea name="summary" rows=20 class="form-control" id="summary" placeholder="<?= PROMOTION_EDIT_CONTENT_PLACEHOLDER ?>" required=""/><?= $promotion ? $promotion['CONTENT_PROMOTION'] : ''; ?></textarea></div>
            </div>                  
            <div class="form-group">
                <label for="timestart" class="col-sm-3 control-label"><?= PROMOTION_EDIT_TIME_START ?></label>
                <div class="col-sm-9">
                    <input name="timestart" type="date" value="<?= $promotion ? $promotion['TIME_START'] : date("Y-m-d", time()); ?>" class="form-control" id="timestart" required="" min="<?php echo $promotion ? $promotion['TIME_START'] : date("Y-m-d", time()); ?>"/>
                </div>
            </div>    
            <div class="form-group">
                <label for="timeend" class="col-sm-3 control-label"><?= PROMOTION_EDIT_TIME_END ?></label>
                <div class="col-sm-9">
                    <input name="timeend" type="date" value="<?= $promotion ? $promotion['TIME_END'] : date("Y-m-d", time()); ?>" class="form-control" id="timeend" required="" min="<?php echo $promotion ? $promotion['TIME_END'] : date("Y-m-d", time()); ?>"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" id="btnsubmitpro" class="btn btn-primary"><?= $promotion ? PROMOTION_EDIT_BUTTON_EDIT : PROMOTION_EDIT_BUTTON_ADD; ?></button>
                    <a class="btn btn-warning" href="admin.php?controller=promotion"><?= PROMOTION_EDIT_BUTTON_BACK ?></a>
                </div>
            </div>
        </form>
    </div>
</div>