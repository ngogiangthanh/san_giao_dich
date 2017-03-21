<style type="text/css">
    .table th, .table td {
        text-align: center;
        width: auto;
        vertical-align: middle!important;
    }
</style>
<form id="promotion_form" method="post" action="admin.php?controller=promotion" role="form">

    <div class="col-xs-12">

        <div class="form-group">
            <!-- Single button -->
            <div class="btn-group">
                <input id="search" name="search" type="text" class="form-control" placeholder="<?= PROMOTION_TABLE_SEARCH ?>" style="width: 300px"  value="<?= (isset($_GET['search'])) ? $_GET['search'] : "" ?>"/>
            </div>

            <a href="admin.php?controller=promotion&amp;action=edit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;<?= PROMOTION_TABLE_BUTTON_ADD ?></a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th><?= PROMOTION_TABLE_ID ?></th>
                    <th><?= PROMOTION_TABLE_NAME ?></th>
                    <th><?= PROMOTION_TABLE_CONTENT ?></th>
                    <th><?= PROMOTION_TABLE_TIME_START ?></th>
                    <th><?= PROMOTION_TABLE_TIME_END ?></th>
                    <th><?= PROMOTION_TABLE_TASK ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($promotions as $promotion): ?>
                    <tr>
                        <td><?= $promotion['ID']; ?></td>
                        <td>
                            <?= $promotion['NAME_PROMOTION']; ?>
                        </td>
                        <td>
                            <?= $promotion['CONTENT_PROMOTION']; ?>
                        </td>
                        <td>
                            <?= $promotion['TIME_START']; ?>
                        </td>
                        <td>
                            <?= $promotion['TIME_END']; ?>
                        </td>
                        <td>
                            <a href="admin.php?controller=promotion&amp;action=view&pid=<?= $promotion['ID'] ?>" class="text-success"><i class="glyphicon glyphicon-search" title="view promotion"></i></a>&nbsp;
                            <a href="admin.php?controller=promotion&amp;action=edit&pid=<?= $promotion['ID'] ?>" class="text-success"><i class="glyphicon glyphicon-edit" title="edit promotion"></i></a>&nbsp;
                            <a href="#" onclick="if (confirm('<?= PROMOTION_TABLE_CONFIRM_DELETE ?>')) {
                                        location.href = 'admin.php?controller=promotion&amp;action=delete&amp;pid=<?= $promotion['ID']; ?>';
                                    }" class="text-danger" title="delete promotion"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-right">
            <?= $pagination; ?>
        </div>	
    </div>

</form>

<script type="text/javascript">
    toastr.options.closeButton = true;
    toastr.options.newestOnTop = true;
<?php
if (isset($_GET['statusdelete']) && $_GET['statusdelete'] == 'true') {
    ?>
        toastr.success("<?= PROMOTION_TABLE_ALERT_DELETE_SUCCESS ?>");
    <?php
} else if (isset($_GET['statusdelete']) && $_GET['statusdelete'] == 'false') {
    ?>
        toastr.error("<?= PROMOTION_TABLE_ALERT_DELETE_FAILED ?>");
    <?php
}
?>
</script>