<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-th-list"></i>&nbsp;<?= CATEGORY_FORM_TITLE ?></div>
    <div class="panel-body">
        <form id="category-form" class="form-horizontal" method="post" action="admin.php?controller=category&amp;action=edit" enctype="multipart/form-data" role="form">
            <input name="id" type="hidden" value="<?= $category ? $category['ID'] : '0'; ?>"/>
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label"><?= CATEGORY_FORM_NAME ?></label>
                <div class="col-sm-9">
                    <input name="name" type="text" value="<?= $category ? $category['NAME_CAT'] : ''; ?>" class="form-control" id="name" placeholder="<?= CATEGORY_FORM_NAME_PLACEHOLDER ?>" required=""/>
                </div>
            </div>     
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary"><?= $category ? CATEGORY_FORM_BUTTON_SUBMIT_EDIT : CATEGORY_FORM_BUTTON_SUBMIT_ADD; ?></button>
                    <a class="btn btn-warning" href="admin.php?controller=category"><?= CATEGORY_FORM_BUTTON_BACK ?></a>
                </div>
            </div>
        </form>
    </div>
</div>