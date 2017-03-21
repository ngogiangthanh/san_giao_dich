<style type="text/css">
    .table th, .table td {
        text-align: center;
        width: auto;
        vertical-align: middle!important;
    }
</style>

<form id="product_form" method="post" action="admin.php?controller=product" role="form">

    <div class="col-xs-12">

        <div class="form-group">
            <!-- Single button -->
            <div class="btn-group">
                <input id="search" name="search" type="text" class="form-control" placeholder="<?= PRODUCT_TABLE_SEARCH ?>" style="width: 300px" value="<?= (isset($_GET['search'])) ? $_GET['search'] : ""; ?>"/>
            </div>
            <a href="admin.php?controller=product&amp;action=edit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;<?= PRODUCT_TABLE_BUTTON_ADD ?></a><br/>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th><?= PRODUCT_TABLE_ID ?></th>
                    <th><?= PRODUCT_TABLE_PICTURE ?></th>
                    <th><?= PRODUCT_TABLE_NAME ?></th>
                    <th><?= PRODUCT_TABLE_TYPE ?></th>
                    <th><?= PRODUCT_TABLE_VND ?></th>
                    <th><?= PRODUCT_TABLE_USD ?></th>
                    <th><?= PRODUCT_TABLE_TASK ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['ID']; ?></td>
                        <td>
                            <?php
                            $image = $product['THUMB'];
                            if (is_file($image)) {
                                echo '<image src="' . $image . '?time=' . time() . '" style="max-width:50px; max-height:50px;" />';
                            }
                            ?>
                        </td>
                        <td>
                            <?php echo $product['NAME_PRO']; ?>
                        </td>
                        <td>
                            <?php echo $product['NAME_CAT']; ?>
                        </td>
                        <td>
                            <?php echo $product['PRICE_VND']; ?>
                        </td>
                        <td>
                            <?php echo $product['PRICE_USD']; ?>
                        </td>
                        <td>
                            <a href="admin.php?controller=product&amp;action=edit&amp;pid=<?php echo $product['ID']; ?>" class="text-success" title="edit product"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;
                            <a href="#" onclick="if (confirm('<?= PRODUCT_TABLE_CONFIRM_DELETE ?>')) {
                                        location.href = 'admin.php?controller=product&amp;action=delete&amp;pid=<?php echo $product['ID']; ?>';
                                    }" class="text-danger" title="delete product"><i class="glyphicon glyphicon-remove"></i></a>
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
        toastr.success("<?= PRODUCT_TABLE_ALERT_DELETE_SUCCESS ?>");
    <?php
} else if (isset($_GET['statusdelete']) && $_GET['statusdelete'] == 'false') {
    ?>
        toastr.error("<?= PRODUCT_TABLE_ALERT_DELETE_FAILED ?>");
    <?php
}
?>
</script>