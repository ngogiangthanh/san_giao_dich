<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-th-list"></i>&nbsp;<?= UNIT_EDIT_TITLE ?></div>
    <div class="panel-body">
        <form id="category-form" class="form-horizontal" method="post" action="admin.php?controller=unit&amp;action=edit" enctype="multipart/form-data" role="form">
            <input name="id" type="hidden" value="<?php echo $unit ? $unit['ID'] : '0'; ?>"/>
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label"><?= UNIT_EDIT_NAME ?></label>
                <div class="col-sm-9">
                    <input name="name" type="text" value="<?php echo $unit ? $unit['UNIT_NAME'] : ''; ?>" class="form-control" id="name" placeholder="<?= UNIT_EDIT_NAME_PLACEHOLDER ?>" required=""/>
                </div>
            </div>     
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary"><?php echo $unit ? UNIT_EDIT_BUTTON_EDIT : UNIT_EDIT_BUTTON_ADD; ?></button>
                    <a class="btn btn-warning" href="admin.php?controller=unit"><?= UNIT_EDIT_BUTTON_BACK ?></a>
                </div>
            </div>
        </form>
    </div>
</div>