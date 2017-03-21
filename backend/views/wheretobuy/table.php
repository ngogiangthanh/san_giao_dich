<style type="text/css">
    .table th, .table td {
        text-align: center;
        width: auto;
        vertical-align: middle!important;
    }
</style>

<form id="product_form" method="post" action="admin.php?controller=wheretobuy" role="form">

    <div class="col-xs-12">

        <div class="form-group">
            <!-- Single button -->
            <div class="btn-group">
                <input id="search" name="search" type="text" class="form-control" placeholder="<?= BRANCH_TABLE_SEARCH ?>" style="width: 300px" value="<?= (isset($_GET['search'])) ? $_GET['search'] : ""; ?>"/>
            </div>
            <a href="admin.php?controller=wheretobuy&amp;action=edit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;<?= BRANCH_TABLE_ADD ?></a><br/>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th><?= BRANCH_TABLE_ID ?></th>
                    <th><?= BRANCH_TABLE_NAME ?></th>
                    <th><?= BRANCH_TABLE_TASKS ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($branches as $branch): ?>
                    <tr>
                        <td><?php echo $branch['ID']; ?></td>
                        <td>
                            <?=$branch['NAME_BRANCH'];?>
                        </td>
                        <td>
                            <a href="admin.php?controller=wheretobuy&amp;action=edit&amp;bid=<?php echo $branch['ID']; ?>" class="text-success" title="edit branch"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;
                            <a href="#" onclick="if (confirm('<?= BRANCH_TABLE_CONFIRM_DELETE ?>')) {
                                        location.href = 'admin.php?controller=wheretobuy&amp;action=delete&amp;bid=<?php echo $branch['ID']; ?>';
                                    }" class="text-danger" title="delete branch"><i class="glyphicon glyphicon-remove"></i></a>
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
        toastr.success("<?= BRANCH_TABLE_ALERT_DELETE_SUCCESS ?>");
    <?php
} else if (isset($_GET['statusdelete']) && $_GET['statusdelete'] == 'false') {
    ?>
        toastr.error("<?= BRANCH_TABLE_ALERT_DELETE_FAILED ?>");
    <?php
}
?>
</script>