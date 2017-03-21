<style type="text/css">
    .table th, 
    .table td {
        text-align: center;
        vertical-align: middle;
        width: auto;
    }
</style>

<form id="unit_form" method="post" action="admin.php?controller=unit" role="form">

    <div class="col-xs-12">

        <div class="form-group pull-left">
            <!-- Single button -->
            <a href="admin.php?controller=unit&amp;action=edit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;<?= UNIT_TABLE_BUTTON_ADD ?></a>
            <br/>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th><?= UNIT_TABLE_ID ?></th>
                    <th><?= UNIT_TABLE_NAME ?></th>
                    <th><?= UNIT_TABLE_TASK ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $category['ID']; ?></td>
                        <td><?= $category['UNIT_NAME']; ?></td>
                        <td>
                            <a href="admin.php?controller=unit&amp;action=edit&amp;cid=<?= $category['ID']; ?>" class="text-success" title="edit unit"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;
                            <a href="#" onclick="if (confirm('<?= UNIT_TABLE_CONFIRM_DELETE ?>')) {
                                            location.href = 'admin.php?controller=unit&amp;action=delete&amp;cid=<?= $category['ID']; ?>';
                                        }" class="text-danger" title="delete unit"><i class="glyphicon glyphicon-remove"></i></a>
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
        toastr.success("<?= UNIT_TABLE_ALERT_DELETE_SUCCESS ?>");
    <?php
} else if (isset($_GET['statusdelete']) && $_GET['statusdelete'] == 'false') {
    ?>
        toastr.error("<?= UNIT_TABLE_ALERT_DELETE_FAILED ?>");
    <?php
}
if (isset($_GET['statusupdate']) && $_GET['statusupdate'] == 'true') {
    ?>
        toastr.success("<?= UNIT_TABLE_ALERT_UPDATE_SUCCESS ?>");
    <?php
} else if (isset($_GET['statusupdate']) && $_GET['statusupdate'] == 'false') {
    ?>
        toastr.error("<?= UNIT_TABLE_ALERT_UPDATE_FAILED ?>");
<?php }
?>
</script>