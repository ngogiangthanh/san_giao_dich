<style type="text/css">
    .table th, .table td {
        text-align: center;
        width: auto;
        vertical-align: middle!important;
    }
    #info td {
        text-align: left;
    }
</style>
<?php
$pointsuse = $order['CURRENT_POINTS']; //neu hoa don da dc xu ly truoc do lay point tai thoi diem do
if ($pointsuse == 0) {
    $pointsuse = $order['POINT']; // neu chua dc xu ly lay point tai thoi diem xu ly
}
?>
<div class="col-xs-12">	
    <h3><?= ORDER_PRINT_AVALON_WEBSITE ?></h3>
    <table id="info" class="table">
        <tr>
            <td><?= ORDER_PRINT_AVALON_NAME ?>: <?php echo $_SESSION['login'][3]; ?></td>
            <td><?= ORDER_PRINT_AVALON_ADDRESS ?>: 131D/5, Nguyễn Văn Cừ nối dài, Ninh Kiều, Tp Cần Thơ.</td>
        </tr>
        <tr>
            <td><?= ORDER_PRINT_AVALON_PHONE ?>: 09123456789</td>
            <td><?= ORDER_PRINT_AVALON_EMAIL ?>: inquiry@bluedolphin.com.vn</td>
        </tr>
    </table>
</div>

<div class="col-xs-12">	
    <h3><?= ORDER_VIEW_TITLE_CUSTOMER ?></h3>
    <table id="info" class="table">
        <tr>
            <td><?= ORDER_VIEW_FULLNAME_CUSTOMER ?>: <?= $order['NAME']; ?></td>
            <td><?= ORDER_VIEW_PHONE_CUSTOMER ?>: <?= $order['NUMBERPHONE']; ?></td>
        </tr>
        <tr>
            <td><?= ORDER_VIEW_ADDRESS_CUSTOMER ?>:<?= $order['ADDRESS']; ?></td>
            <td><?= ORDER_VIEW_STREET_CUSTOMER ?>: <?= $order['STREET']; ?></td>
        </tr>
        <tr>
            <td><?= ORDER_VIEW_DISTRICT_CUSTOMER ?>: <?= $order['DISTRICT']; ?></td>
            <td><?= ORDER_VIEW_PROVINCE_CUSTOMER ?>: <?= $order['PROVINCE']; ?></td>
        </tr>
        <tr>
            <td><?= ORDER_VIEW_TYPE_CUSTOMER ?>:
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
            <td><?= ORDER_PRINT_CUSTOMER_EMAIL ?>: <?= $order['EMAIL']; ?></td>
        </tr>
    </table>
</div>

<div class="col-xs-12">
    <h3><?= ORDER_VIEW_TITLE_ORDER ?>&nbsp;(<b><i><?= $status[$order['STATUS_ORDER']] ?></i></b>)</h3>
    <table id="order_detail" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="hidden-xs"><?= ORDER_VIEW_ORDER ?></th>
                <th><?= ORDER_VIEW_NAME ?></th>
                <th><?= ORDER_VIEW_AMOUNT ?></th>
                <th><?= ORDER_VIEW_PRICE ?></th>
                <th><?= ORDER_VIEW_PRICE_OFF ?></th>
                <th><?= ORDER_VIEW_PRICE_TOTAL ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
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
                    <td class="hidden-xs"><?= $stt ?></td>
                    <td>
                        <?= $product['NAME_PRO']; ?>
                    </td>
                    <td>
                        <?= $product['AMOUNT']; ?>
                    </td>
                    <td>
                        <?= $product[$currency]; ?>
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
                <td colspan="6" style='text-align: right'>
                    <?= ORDER_VIEW_TOTAL_PRICE ?>: <b><?php
                        $points = 0;
                        if ($currency == "PRICE_USD") {
                            $points = floor($order_total / 5);
                            echo number_format($order_total, 2, '.', '.') . " USD";
                        } else {
                            $points = floor($order_total / 100000);
                            echo number_format($order_total, 0, '.', ',') . " VND";
                        }
                        ?></b><br/>
                    <button onclick="window.print();
                            return false;" title='prints'><i class="glyphicon glyphicon-print"></i></button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<div class="col-xs-12 pull-left">
    <?= ORDER_VIEW_TIME_ORDER_CUSTOMER ?>: <?= $order['TIME_ORDER']; ?>.<br/>
<?= ORDER_VIEW_TIME_PROCESS_CUSTOMER ?>: <?= $order['TIME_PROCESS']; ?><br/>
</div>
<div class="col-xs-6 pull-right" style="text-align: center">
    <?php
    $now = getdate();
    $day = $now['mday'];
    $month = $now['mon'];
    $year = $now['year'];
    ?>
<?= ORDER_PRINT_PLACE ?>,&nbsp;<?= ORDER_PRINT_DAY ?>&nbsp;<?= $day ?>&nbsp;<?= ORDER_PRINT_MONTH ?>&nbsp;<?= $month ?>&nbsp;<?= ORDER_PRINT_YEAR ?>&nbsp;<?= $year ?><br/>
    .......................<br/>
    <i><?= ORDER_PRINT_INFO_SIGN ?></i>
    <br/>
    <br/>
    <br/>
    <br/>
    ........................
</div>