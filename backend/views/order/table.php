<style type="text/css">
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
        width: auto;
    }
</style>

<form id="order_form" method="post" action="admin.php?controller=order" role="form">

    <div class="col-xs-12">

        <div class="form-group">
            <!-- Single button -->
            <div class="btn-group">
                <input id="search" name="search" type="text" class="form-control" style='width:300px' placeholder="<?= ORDER_TABLE_SEARCH ?>" value="<?= (isset($_GET['search'])) ? $_GET['search'] : "" ?>"/>
            </div>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th><?= ORDER_TABLE_ID ?></th>
                    <th><?= ORDER_TABLE_CUSTOMER_NAME ?></th>
                    <th><?= ORDER_TABLE_TIME_ORDER ?></th>
                    <th><?= ORDER_TABLE_STATUS ?></th>
                    <th><?= ORDER_TABLE_TASK ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $order['ID']; ?></td>
                        <td><?= $order['name']; ?></td>
                        <td><?= $order['TIME_ORDER']; ?></td>
                        <td><?= $status[$order['STATUS_ORDER']]; ?></td>
                        <td>
                            <a href="admin.php?controller=order&amp;action=view&amp;oid=<?= $order['ID']; ?>" class="text-success" title="view order"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;
                            <a href="admin.php?controller=order&amp;action=print&amp;oid=<?= $order['ID']; ?>" target="_blank" class="text-success" title="print page order"><i class="glyphicon glyphicon-print"></i></a>&nbsp;
                            <a href="#" onclick="if (confirm('<?= ORDER_TABLE_CONFIRM_DELETE ?>')) {
                                        location.href = 'admin.php?controller=order&amp;action=delete&amp;oid=<?= $order['ID']; ?>';
                                    }" class="text-danger" title="delete order"><i class="glyphicon glyphicon-remove"></i></a>
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
        toastr.success("<?= ORDER_TABLE_ALERT_DELETE_SUCCESS ?>");
    <?php
} else if (isset($_GET['statusdelete']) && $_GET['statusdelete'] == 'false') {
    ?>
        toastr.error("<?= ORDER_TABLE_ALERT_DELETE_FAILED ?>");
    <?php
}
?>
</script>