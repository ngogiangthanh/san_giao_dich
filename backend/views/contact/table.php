<style type="text/css">
    .table th, .table td {
        text-align: center;
        vertical-align: middle !important;
        width: auto;
    }
    /*    .table th:nth-child(4), .table td:nth-child(4) {
            text-align: left;
            width: auto;
        }*/
</style>
<form id="contact_form" method="post" action="admin.php?controller=contact" role="form">
    <div class="col-xs-12">
        <div class="form-group">
            <!-- Single button -->
            <div class="btn-group">
                <input id="search" name="search" type="text" class="form-control" placeholder="<?= CONTACT_TABLE_SEARCH ?>" style="width: 300px"  value="<?= (isset($_GET['search'])) ? $_GET['search'] : "" ?>"/>
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th><?= CONTACT_TABLE_ID ?></th>
                    <th><?= CONTACT_TABLE_NAME ?></th>
                    <th><?= CONTACT_TABLE_CONTENT ?></th>
                    <th><?= CONTACT_TABLE_EMAIL ?></th>
                    <th><?= CONTACT_TABLE_STATUS ?></th>
                    <th><?= CONTACT_TABLE_TASK ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($contacts as $contact):
                    ?>
                    <tr>
                        <td><?= $contact['ID']; ?></td>
                        <td>
                            <?= $contact['NAME']; ?>
                        </td>
                        <td>
                            <?= $contact['CONTACT']; ?>
                        </td>
                        <td>
                            <?= $contact['EMAIL']; ?>
                        </td>
                        <td>
                            <?= $status[$contact['STATUS']]; ?>
                        </td>
                        <td>
                            <a href="admin.php?controller=contact&amp;action=respone&amp;cid=<?= $contact['ID']; ?>" class="text-success" title="respone contact"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;
                            <a href="#" onclick="if (confirm('<?= CONTACT_TABLE_CONFIRM_DELETE ?>')) {
                                            location.href = 'admin.php?controller=contact&amp;action=delete&amp;cid=<?= $contact['ID']; ?>';
                                        }" class="text-danger" title="delete contact"><i class="glyphicon glyphicon-remove"></i></a>
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
        toastr.success("<?= CONTACT_TABLE_ALERT_DELETE_SUCCESS ?>");
    <?php
} else if (isset($_GET['statusdelete']) && $_GET['statusdelete'] == 'false') {
    ?>
        toastr.error("<?= CONTACT_TABLE_ALERT_DELETE_FAILED ?>");
    <?php
}
?>
</script>