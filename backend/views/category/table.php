<style type="text/css">
    .table th,
    .table td{
        text-align: center;
        vertical-align: middle;
        width: auto;
    }
</style>

<form id="category_form" method="post" action="admin.php?controller=category" role="form">

    <div class="col-xs-12">

        <div class="form-group pull-left">
            <!-- Single button -->
            <a href="admin.php?controller=category&amp;action=edit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;<?= CATEGORY_TABLE_BUTTON_ADD ?></a>
            <br/>
            <br/>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th><?= CATEGORY_TABLE_ID ?></th>
                    <th><?= CATEGORY_TABLE_NAME ?></th>
                    <th><?= CATEGORY_TABLE_TASK ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $category['ID']; ?></td>
                        <td><?= $category['NAME_CAT']; ?></td>
                        <td>
                            <a href="admin.php?controller=category&amp;action=edit&amp;cid=<?php echo $category['ID']; ?>" class="text-success" title="edit category"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;
                            <a href="#" onclick="if (confirm('<?= CATEGORY_TABLE_CONFIRM_DELETE ?>')) {
                                            location.href = 'admin.php?controller=category&amp;action=delete&amp;cid=<?php echo $category['ID']; ?>';
                                            return true;
                                        } else {
                                            return false;
                                        }" class="text-danger" title="delete category"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-right">
            <?php echo $pagination; ?>
        </div>	
    </div>
</form>
<script type="text/javascript">
    toastr.options.closeButton = true;
    toastr.options.newestOnTop = true;
<?php
if (isset($_GET['statusdelete']) && $_GET['statusdelete'] == 'true') {
    ?>
        toastr.success("<?= CATEGORY_TABLE_ALERT_DELETE_SUCCESS ?>");
    <?php
} else if (isset($_GET['statusdelete']) && $_GET['statusdelete'] == 'false') {
    ?>
        toastr.error("<?= CATEGORY_TABLE_ALERT_DELETE_FAILED ?>");
    <?php
}
if (isset($_GET['statusupdate']) && $_GET['statusupdate'] == 'true') {
    ?>
        toastr.success("<?= CATEGORY_TABLE_ALERT_UPDATE_SUCCESS ?>");
    <?php
} else if (isset($_GET['statusupdate']) && $_GET['statusupdate'] == 'false') {
    ?>
        toastr.error("<?= CATEGORY_TABLE_ALERT_UPDATE_FAILED ?>");
<?php }
?>
</script>