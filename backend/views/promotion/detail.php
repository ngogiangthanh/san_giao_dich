<style type="text/css">
    #info td {
        text-align: left;
    }
    #infopro th,td {
        text-align: center;
        vertical-align: middle !important;
        width: auto;
    }
</style>
<div class="col-xs-12">	
    <h3><?=PROMOTION_VIEW_TITLE_PRO?></h3>
    <table id="info" class="table">
        <tr>
            <td><?=PROMOTION_VIEW_ID_PRO?>:</td>
            <td><?= $promotion['ID'] ?></td>
        </tr>
        <tr>
            <td><?=PROMOTION_VIEW_NAME_PRO?>:</td>
            <td><?= $promotion['NAME_PROMOTION'] ?></td>
        </tr>
        <tr>
            <td><?=PROMOTION_VIEW_INFO_PRO?>:</td>
            <td><?= $promotion['CONTENT_PROMOTION'] ?></td>
        </tr>
        <tr>
            <td><?=PROMOTION_VIEW_TIME_START_PRO?>:</td>
            <td><?= date('d/m/Y', strtotime($promotion['TIME_START'])) ?></td>
        </tr>
        <tr>
            <td><?=PROMOTION_VIEW_TIME_END_PRO?>:</td>
            <td><?= date('d/m/Y', strtotime($promotion['TIME_END'])) ?></td>
        </tr>
    </table>
</div>
<div class="col-xs-12">
    <h3><?=PROMOTION_VIEW_TITLE_PRODUCT?></h3>
    <table id="infopro" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="hidden-xs"><?=PROMOTION_VIEW_ORDER_PRODUCT?></th>
                <th><?=PROMOTION_VIEW_ID_PRODUCT?></th>
                <th><?=PROMOTION_VIEW_IMAGE_PRODUCT?></th>
                <th><?=PROMOTION_VIEW_NAME_PRODUCT?></th>
                <th><?=PROMOTION_VIEW_FRICE_OFF_PRODUCT?></th>
                <th><?=PROMOTION_VIEW_TASK_PRODUCT?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stt = 0;
            foreach ($promotion_products_list as $promotion_product):
                $stt++;
                ?>
                <tr>
                    <td class="hidden-xs"><?= $stt ?></td>
                    <td class="hidden-xs">
                        <?= $promotion_product['ID_PRO'] ?>
                    </td>
                    <td>   
                        <img src="<?= $promotion_product['THUMB'] ?>" alt="image of product" title="image of product" width="100px"/>
                    </td>
                    <td>
                        <?= $promotion_product['NAME_PRO'] ?>
                    </td>
                    <td>
                        <?= $promotion_product['PRICE_OFF'] ?>
                    </td>
                    <td>
                        <a href="admin.php?controller=product&action=edit&pid=<?= $promotion_product['ID_PRO'] ?>" target="_blank" class="text-success" title="edit product"><i class="glyphicon glyphicon-edit"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" style="text-align: left">
                    - <?=PROMOTION_VIEW_TOTAL_PRODUCT?> <?= $stt ?> <?=PROMOTION_VIEW_UNIT_PRODUCT?>.<br/>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<div class="col-xs-12">
    <a class="btn btn-warning" href="admin.php?controller=promotion"><?= PROMOTION_VIEW_BUTTON_BACK ?></a>
    <br/>
    <br/>
</div>
