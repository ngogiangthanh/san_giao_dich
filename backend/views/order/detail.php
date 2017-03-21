<style type="text/css">
    .table th, .table td {
        text-align: center;
        width: auto;
        vertical-align: middle!important;
    }
</style>

<div class="col-xs-12">
    <h3><?= ORDER_VIEW_TITLE_ORDER ?>&nbsp;(<b><i><?= $status[$order['STATUS_ORDER']] ?></i></b>)</h3>
    <form action="admin.php?controller=order&action=update" method="post" id="frmsaveorderprocess">
        <table id="order_detail" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="hidden-xs"><?= ORDER_VIEW_ORDER ?></th>
                    <th class="hidden-xs"><?= ORDER_VIEW_IMAGE ?></th>
                    <th><?= ORDER_VIEW_NAME ?></th>
                    <th><?= ORDER_VIEW_AMOUNT ?></th>
                    <th><?= ORDER_VIEW_PRICE ?></th>
                    <th><?= ORDER_VIEW_PRICE_OFF ?></th>
                    <th><?= ORDER_VIEW_PRICE_TOTAL ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $pointsuse = $order['CURRENT_POINTS']; //neu hoa don da dc xu ly truoc do lay point tai thoi diem do
                if ($pointsuse == 0) {
                    $pointsuse = $order['POINT']; // neu chua dc xu ly lay point tai thoi diem xu ly
                }
                $stt = 0;
                $order_total = 0;
                $currency = "PRICE_VND";
                $currencyUnit = "VND";
                if ($order['PRICE_SET'] == "USD") {
                    $currency = "PRICE_USD";
                    $currencyUnit = "USD";
                }
                foreach ($order_detail as $product):
                    $stt++;
                    ?>
                    <tr>
                        <td class="hidden-xs"><?php echo $stt; ?></td>
                        <td class="hidden-xs">
                            <?php
                            $image = $product['THUMB'];
                            if (is_file($image)) {
                                echo '<image src="' . $image . '" style="max-width:50px; max-height:50px;" />';
                            }
                            ?>
                        </td>
                        <td>
                            <a href="admin.php?controller=product&amp;action=edit&amp;pid=<?php echo $product['ID']; ?>"><?php echo $product['NAME_PRO']; ?></a>
                        </td>
                        <td>
                            <?php echo $product['AMOUNT']; ?>
                        </td>
                        <td>
                            <?php echo $product[$currency]; ?>
                        </td>
                        <td>
                            <?php
                            $promotion_product = get_product_have_promotion($product['ID'], date("Y-m-d", strtotime($order['TIME_ORDER'])));
                            $percent = 0;
                            if ($pointsuse >= 300) {
                                $percent = 0.07;
                            } else if ($pointsuse >= 200) {
                                $percent = 0.05;
                            } else if ($pointsuse >= 100) {
                                $percent = 0.03;
                            }
                            if (count($promotion_product) > 0) {
                                if ($promotion_product['PRICE_OFF'] >= $percent) {
                                    $percent = $promotion_product['PRICE_OFF'];
                                }
                            }
                            echo ($percent * 100) . "%";
                            ?>
                        </td>
                        <td>
                            <?php
                            $current_price = (preg_replace('/,/', '', $product[$currency]) - $percent * preg_replace('/,/', '', $product[$currency])) * $product['AMOUNT'];
                            $order_total += $current_price;
                            if ($currency == "PRICE_USD") {
                                echo number_format($current_price, 2, '.', '.');
                            } else {
                                echo number_format($current_price, 0, '.', ',');
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7" style='text-align: right'>
                        <?= ORDER_VIEW_TOTAL_PRICE ?>:&nbsp;<b><?php
                            $points = 0;
                            if ($currency == "PRICE_USD") {
                                $points = floor($order_total / 5);
                                echo number_format($order_total, 2, '.', '.') . " USD";
                            } else {
                                $points = floor($order_total / 100000);
                                echo number_format($order_total, 0, '.', ',') . " VND";
                            }
                            ?></b><br/>
                        <a href="admin.php?controller=order&amp;action=print&amp;oid=<?php echo $order['ID']; ?>" target="_blank" class="text-success" title="print page order"><i class="glyphicon glyphicon-print"></i></a>&nbsp;
                    </td>
                </tr>
            </tfoot>
        </table>
        <input type='hidden' name='oid' value='<?= $order['ID'] ?>'/>
        <input type='hidden' name='uid' value='<?= $order['ID_CUSTOMER'] ?>'/>
        <input type='hidden' name='typeprocess' id='typeprocess' value=''/>
        <input type='hidden' name='points' value='<?= $points ?>'/>
        <input type='hidden' name='totalpoints' value='<?= $order['POINT'] ?>'/>
        <input type='hidden' name='statusorder' value='<?= $order['STATUS_ORDER'] ?>'/>
    </form>
</div>

<style type="text/css">
    #info td {
        text-align: left;
    }
</style>

<div class="col-xs-12">	
    <h3><?= ORDER_VIEW_TITLE_CUSTOMER ?></h3>

    <table id="info" class="table">
        <tr>
            <td><?= ORDER_VIEW_FULLNAME_CUSTOMER ?>:</td>
            <td><?php echo $order['NAME']; ?></td>
        </tr>
        <tr>
            <td><?= ORDER_VIEW_PHONE_CUSTOMER ?>:</td>
            <td><?php echo $order['NUMBERPHONE']; ?></td>
        </tr>
        <tr>
            <td><?= ORDER_VIEW_TIME_ORDER_CUSTOMER ?>:</td>
            <td><?php echo $order['TIME_ORDER']; ?></td>
        </tr>
        <tr>
            <td><?= ORDER_VIEW_TIME_PROCESS_CUSTOMER ?>:</td>
            <td><?php echo $order['TIME_PROCESS']; ?></td>
        </tr>
        <tr>
            <td><?= ORDER_VIEW_ADDRESS_CUSTOMER ?>:</td>
            <td><?php echo $order['ADDRESS']; ?></td>
        </tr>
        <tr>
            <td><?= ORDER_VIEW_STREET_CUSTOMER ?>:</td>
            <td><?php echo $order['STREET']; ?></td>
        </tr>
        <tr>
            <td><?= ORDER_VIEW_DISTRICT_CUSTOMER ?>:</td>
            <td><?php echo $order['DISTRICT']; ?></td>
        </tr>
        <tr>
            <td><?= ORDER_VIEW_PROVINCE_CUSTOMER ?>:</td>
            <td><?php echo $order['PROVINCE']; ?></td>
        </tr>
        <tr>
            <td><?= ORDER_VIEW_TYPE_CUSTOMER ?>:</td>
            <td>
                <?php
                if ($pointsuse >= 300) {
                    echo CUSTOMER_TYPE_GOLD;
                } else if ($pointsuse >= 200) {
                    echo CUSTOMER_TYPE_SLIVER;
                } else if ($pointsuse >= 100) {
                    echo CUSTOMER_TYPE_BROZONE;
                } else {
                    echo CUSTOMER_TYPE_NEWBIE;
                }
                ?>
            </td>
        </tr>
    </table>
    <div class="form-group">
        <button name="btnsuccess" onclick="$('#typeprocess').val('sucess');
                $('#frmsaveorderprocess').submit();" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i>&nbsp;<?= ORDER_VIEW_BUTTON_SUCCESS ?></button>
        <button name="btnfailed" onclick="$('#typeprocess').val('destroy');
                $('#frmsaveorderprocess').submit()" class="btn btn-danger" ><i class="glyphicon glyphicon-remove"></i>&nbsp;<?= ORDER_VIEW_BUTTON_DESTROY ?></button>
        <a href="admin.php?controller=order" class="btn btn-warning">&nbsp;<?= ORDER_VIEW_BUTTON_BACK ?></a>
    </div>
</div>

<script type="text/javascript">
    toastr.options.closeButton = true;
    toastr.options.newestOnTop = true;
<?php
if (isset($_GET['statusupdate']) && $_GET['statusupdate'] == 'true') {
    ?>
        toastr.success("<?= ORDER_VIEW_UPDATE_ORDER_SUCCESS ?>");
    <?php
} else if (isset($_GET['statusupdate']) && $_GET['statusupdate'] == 'false') {
    ?>
        toastr.error("<?= ORDER_VIEW_UPDATE_ORDER_FAILED ?>");
    <?php
}
?>
</script>