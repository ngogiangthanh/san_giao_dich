<style type="text/css">
    #info td {
        text-align: left;
    }
</style>
<div class="col-xs-12">	
    <h3><?= CUSTOMER_VIEW_TITLE_PROFILE ?></h3>
    <table id="info" class="table">
        <tr>
            <td><?= CUSTOMER_VIEW_USERNAME ?>:</td>
            <td><?= $user['USERNAME'] ?></td>
        </tr>
        <tr>
            <td><?= CUSTOMER_VIEW_FULLNAME ?>:</td>
            <td><?= $user['NAME'] ?></td>
        </tr>
        <tr>
            <td><?= CUSTOMER_VIEW_BIRTH ?>:</td>
            <td><?= $user['BIRTH'] ?></td>
        </tr>
        <tr>
            <td><?= CUSTOMER_VIEW_PHONE ?>:</td>
            <td><?= $user['NUMBERPHONE'] ?></td>
        </tr>
        <tr>
            <td><?= CUSTOMER_VIEW_ADDRESS ?>:</td>
            <td><?= $user['ADDRESS'] ?></td>
        </tr>
        <tr>
            <td><?= CUSTOMER_VIEW_STREET ?>:</td>
            <td><?= $user['STREET'] ?></td>
        </tr>
        <tr>
            <td><?= CUSTOMER_VIEW_DISTRICT ?>:</td>
            <td><?= $user['DISTRICT'] ?></td>
        </tr>
        <tr>
            <td><?= CUSTOMER_VIEW_PROVINCE ?>:</td>
            <td><?= $user['PROVINCE'] ?></td>
        </tr>
        <tr>
            <td><?= CUSTOMER_VIEW_EMAIL ?>:</td>
            <td><?= $user['EMAIL'] ?></td>
        </tr>
        <tr>
            <td><?= CUSTOMER_VIEW_TYPE ?>:</td>
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
        </tr>
        <tr>
            <td><?= CUSTOMER_VIEW_STATUS_ACTIVE ?>:</td>
            <td>
                <input type="checkbox" id="statusactive" name="statusactive" <?= ($user['STATUS'] == '1') ? "checked='checked'" : "" ?>/>
            </td>
        </tr>
        <tr>
            <td colspan="2"> 
                <input value="<?= CUSTOMER_VIEW_BUTTON_SAVE ?>" type="button" id="btnsubmit" class="btn btn-primary"/>
                <a href="admin.php?controller=user" class="btn btn-warning"><?= CUSTOMER_VIEW_BUTTON_BACK ?></a>
            </td>
        </tr>
    </table>
</div>
<div class="col-xs-12">
    <h3><?= CUSTOMER_VIEW_TITLE_ORDERS ?></h3>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="hidden-xs"><?= CUSTOMER_VIEW_ORDER ?></th>
                <th><?= CUSTOMER_VIEW_ID ?></th>
                <th><?= CUSTOMER_VIEW_TIME_ORDER ?></th>
                <th><?= CUSTOMER_VIEW_TIME_PROCESS ?></th>
                <th><?= CUSTOMER_VIEW_STATUS_ORDER ?></th>
                <th><?= CUSTOMER_VIEW_STATUS_TASK ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stt = 0;
            $success = 0;
            $cancell = 0;
            $waiting = 0;
            foreach ($orders_list as $order):
                $stt++;
                if ($order['STATUS_ORDER'] == 2) {
                    $cancell++;
                } else if ($order['STATUS_ORDER'] == 1) {
                    $success++;
                } else {
                    $waiting++;
                }
                ?>
                <tr>
                    <td class="hidden-xs"><?= $stt ?></td>
                    <td class="hidden-xs">
                        <?= $order['ID'] ?>
                    </td>
                    <td>
                        <?= $order['TIME_ORDER'] ?>
                    </td>
                    <td>
                        <?= $order['TIME_PROCESS'] ?>
                    </td>
                    <td>
                        <?= $statusorder[$order['STATUS_ORDER']] ?>
                    </td>
                    <td>
                        <a href="admin.php?controller=order&action=view&oid=<?= $order['ID'] ?>" target="_blank" class="text-success" title="view details order"><i class="glyphicon glyphicon-search"></i></a>&nbsp;
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">
                    - <?= CUSTOMER_VIEW_TOTAL_ORDER ?>: <?= $stt ?> <?= CUSTOMER_VIEW_UNIT_ORDER ?>.<br/>
                    - <?= ORDER_STATUS_SUCCESS ?>: <?= $success ?> <?= CUSTOMER_VIEW_UNIT_ORDER ?>. <br/>
                    - <?= ORDER_STATUS_DESTROY ?>: <?= $cancell ?> <?= CUSTOMER_VIEW_UNIT_ORDER ?>. <br/>
                    - <?= ORDER_STATUS_WAIT ?>: <?= $waiting ?> <?= CUSTOMER_VIEW_UNIT_ORDER ?>.
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<script type="text/javascript">
    toastr.options.closeButton = true;
    toastr.options.newestOnTop = true;
<?php
if (isset($_GET['statusupdate']) && $_GET['statusupdate'] == 'true') {
    ?>
        toastr.success("<?= CUSTOMER_VIEW_ALERT_UPDATE_SUCCESS ?>");
    <?php
} else if (isset($_GET['statusupdate']) && $_GET['statusupdate'] == 'false') {
    ?>
        toastr.error("<?= CUSTOMER_VIEW_ALERT_UPDATE_FAILED ?>");
<?php }
?>
</script>
