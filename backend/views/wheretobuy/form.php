<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-road"></i>&nbsp;<?= BRANCH_FORM_TITLE ?></div>
    <div class="panel-body">
        <form id="category-form" class="form-horizontal" method="post" action="admin.php?controller=wheretobuy&amp;action=save" enctype="multipart/form-data" role="form">
            <input name="id" type="hidden" value="<?= $branch ? $branch['ID'] : '0'; ?>"/>
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label"><?= BRANCH_FORM_NAME ?></label>
                <div class="col-sm-9">
                    <input name="name" type="text" value="<?= $branch ? $branch['NAME_BRANCH'] : ''; ?>" class="form-control" id="name" placeholder="<?= BRANCH_FORM_NAME_PLACEHOLDER ?>" required=""/>
                </div>
            </div>     
            <div class="form-group">
                <label for="summary" class="col-sm-3 control-label"><?= BRANCH_FORM_DESCRIPTE ?></label>
                <div class="col-sm-9">
                    <textarea name="summary" rows=20 class="form-control" id="summary" placeholder="<?= BRANCH_FORM_DESCRIPTE_PLACEHOLDER ?>" required=""/><?= $branch ? $branch['DESCRIPTE_BRANCH'] : ''; ?></textarea></div>
            </div> 
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary"><?= $branch ? BRANCH_FORM_BUTTON_SUBMIT_EDIT : BRANCH_FORM_BUTTON_SUBMIT_ADD; ?></button>
                    <a class="btn btn-warning" href="admin.php?controller=wheretobuy"><?= BRANCH_FORM_BUTTON_BACK ?></a>
                </div>
            </div>
        </form>
    </div>
</div>