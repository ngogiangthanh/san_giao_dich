<style type="text/css">
    .table th, .table td {
        text-align: center;
        vertical-align: middle!important;
        width: auto;
    }
</style>
<form id="promotion_form" method="post" action="admin.php?controller=user" role="form">

    <div class="col-xs-12">

        <div class="form-group">
            <!-- Single button -->
            <div class="btn-group">
                <input id="search" name="search" type="text" class="form-control"  placeholder="<?= CUSTOMER_TABLE_SEARCH ?>" style="width: 300px" value="<?= (isset($_GET['search'])) ? $_GET['search'] : "" ?>"/>
            </div>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th><?= CUSTOMER_TABLE_ID ?></th>
                    <th><?= CUSTOMER_TABLE_USERNAME ?></th>
                    <th><?= CUSTOMER_TABLE_NAME ?></th>
                    <th><?= CUSTOMER_TABLE_TYPE ?></th>
                    <th><?= CUSTOMER_TABLE_TASK ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['ID']; ?></td>
                        <td>
                            <?= $user['USERNAME']; ?>
                        </td>
                        <td>
                            <?= $user['NAME']; ?>
                        </td>
                        <td>
                            <?php
                            if ($user['POINT'] >= 300) {
                                echo CUSTOMER_TYPE_GOLD;
                            } else if ($user['POINT'] >= 200) {
                                echo CUSTOMER_TYPE_SLIVER;
                            } else if ($user['POINT'] >= 100) {
                                echo CUSTOMER_TYPE_BROZONE;
                            } else {
                                echo CUSTOMER_TYPE_NEWBIE;
                            }
                            ?>
                        </td>
                        <td> 
                            <a href="admin.php?controller=user&amp;action=view&amp;uid=<?= $user['ID'] ?>" class="text-success" title="view customer"><i class="glyphicon glyphicon-search"></i></a>&nbsp;
                            <a href="#" onclick="if (confirm('<?= CUSTOMER_TABLE_CONFIRM_TASK_DELETE ?>')) {
                                            location.href = 'admin.php?controller=user&amp;action=delete&amp;uid=<?= $user['ID']; ?>';
                                        }" class="text-danger" title="delete customer"><i class="glyphicon glyphicon-remove"></i></a>
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
        toastr.success("<?= CUSTOMER_TABLE_ALERT_DELETE_SUCCESS ?>");
    <?php
} else if (isset($_GET['statusdelete']) && $_GET['statusdelete'] == 'false') {
    ?>
        toastr.error("<?= CUSTOMER_TABLE_ALERT_DELETE_FAILED ?>");
    <?php
}
?>
</script>