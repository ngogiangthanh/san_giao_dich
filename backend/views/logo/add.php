<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-bell"></i>&nbsp;<?=LOGO_UPDATE_TITLE?></div>
    <div class="panel-body">
        <form id="category-form" class="form-horizontal" method="post" action="admin.php?controller=logo&amp;action=edit" enctype="multipart/form-data" role="form">
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label"><?=LOGO_UPDATE_CHOOSE_LOGO?>:</label>
                <div class="col-sm-9">
                    <input name="img" type="file" class="form-control" id="img" accept="image/PNG" required=""/>
                   <?=LOGO_UPDATE_FORMAT_LOGO?>
                </div>
            </div>     
            <div class="form-group">
                <label for="logo" class="col-sm-3 control-label"><?=LOGO_UPDATE_CURRENT_LOGO?>:</label>
                <div class="col-sm-9" style="text-align: center">
                    <img src="./public/img/logo.png" alt="logo of company" title="logo of company" width="100%"/>
                </div>
            </div>  
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary"><?=LOGO_UPDATE_BUTTON_SAVE?></button>
                </div>
            </div>
        </form>
    </div>
</div>