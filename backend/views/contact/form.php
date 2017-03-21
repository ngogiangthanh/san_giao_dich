<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-repeat"></i>&nbsp;<?= CONTACT_RESPONE_TITLE ?> </div>

    <div class="panel-body">
        <form id="product-form" class="form-horizontal" method="post" action="admin.php?controller=contact&amp;action=send" enctype="multipart/form-data" role="form">
            <input name="id" type="hidden" value="<?= $contact ? $contact['ID'] : '0'; ?>"/>
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label"><?= CONTACT_RESPONE_TOPIC ?></label>
                <div class="col-sm-9">
                    <input name="title" type="text" class="form-control" id="title" readonly="" value="<?= CONTACT_RESPONE_TOPIC_CONTENT ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label"><?= CONTACT_RESPONE_EMAIL ?></label>
                <div class="col-sm-9">
                    <input name="email" type="email" value="<?= $contact['EMAIL']; ?>" class="form-control" id="email" required="" placeholder="<?= CONTACT_RESPONE_EMAIL_PLACEHOLDER ?>"/>
                </div>
            </div>                               
            <div class="form-group">
                <label for="contact" class="col-sm-3 control-label"><?= CONTACT_RESPONE_CONTENT_OF_CONTACT ?></label>
                <div class="col-sm-9">
                    <textarea name="contact" rows=15 class="form-control" id="contact" readonly=""/><?= $contact ? $contact['CONTACT'] : ''; ?></textarea>
                </div>
            </div>                         
            <div class="form-group">
                <label for="respone" class="col-sm-3 control-label"><?= CONTACT_RESPONE_CONTENT_OF_RESPONE ?></label>
                <div class="col-sm-9">
                    <textarea name="respone" rows=15 class="form-control" id="respone" placeholder="<?= CONTACT_RESPONE_CONTENT_OF_RESPONE_PLACEHOLDER ?>" required=""/><?= $contact ? $contact['RESPONE'] : ''; ?></textarea>
                </div>
            </div>      
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary"><?= CONTACT_RESPONE_BUTTON_SEND ?></button>
                    <a class="btn btn-warning" href="admin.php?controller=contact"><?= CONTACT_RESPONE_BUTTON_BACK ?></a>
                </div>
            </div>
        </form>
    </div>
</div>