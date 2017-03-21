<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-th-list"></i>&nbsp;<?= PRODUCT_EDIT_TITLE ?></div>
    <div class="panel-body">
        <form id="product-form" class="form-horizontal" method="post" action="admin.php?controller=product&amp;action=save" enctype="multipart/form-data" role="form">
            <input name="id" type="hidden" value="<?php echo $product ? $product['ID'] : '0'; ?>"/>
            <div class="form-group">
                <label for="id_cat" class="col-sm-3 control-label"><?= PRODUCT_EDIT_CATEGORY ?></label>
                <div class="col-sm-9">
                    <select name="id_cat" class="form-control">
                        <?php
                        foreach ($categories as $category) {
                            $selected = '';
                            if ($product && ($product['ID_CAT'] == $category['ID']))
                                $selected = 'selected=""';
                            echo '<option value="' . $category['ID'] . '" ' . $selected . '>' . $category['NAME_CAT'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="id_unit" class="col-sm-3 control-label"><?= PRODUCT_EDIT_UNIT ?></label>
                <div class="col-sm-9">
                    <select name="id_unit" class="form-control">
                        <?php
                        foreach ($units as $unit) {
                            $selected = '';
                            if ($product && ($product['ID_UNIT'] == $unit['ID']))
                                $selected = 'selected=""';
                            echo '<option value="' . $unit['ID'] . '" ' . $selected . '>' . $unit['UNIT_NAME'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label"><?= PRODUCT_EDIT_NAME ?></label>
                <div class="col-sm-9">
                    <input name="name" type="text" value="<?php echo $product ? $product['NAME_PRO'] : ''; ?>" class="form-control" id="name" placeholder="<?= PRODUCT_EDIT_NAME_PLACEHOLDER ?>" pattern="[^!@#$%\^\*\\/]+" required=""/>
                </div>
            </div>
            <div class="form-group" >
                <label for="summary" class="col-sm-3 control-label"><?= PRODUCT_EDIT_CONTENT ?></label>
                <div class="col-sm-9" >
                    <textarea name="summary" rows=20 class="form-control" id="summary" placeholder="<?= PRODUCT_EDIT_CONTENT_PLACEHOLDER ?>" required=""/><?php echo $product ? $product['INFO_PRO'] : ''; ?></textarea>
                </div>
            </div>                               
            <div class="form-group">
                <label for="price_vnd" class="col-sm-3 control-label"><?= PRODUCT_EDIT_PRICE_VND ?></label>
                <div class="col-sm-9">
                    <input name="price_vnd" type="text" value="<?php echo $product ? $product['PRICE_VND'] : 0; ?>" class="form-control" id="price" placeholder="0" pattern="[0-9\.,]+" required=""/>
                </div>
            </div>                     
            <div class="form-group">
                <label for="price_usd" class="col-sm-3 control-label"><?= PRODUCT_EDIT_PRICE_USD ?></label>
                <div class="col-sm-9">
                    <input name="price_usd" type="text" value="<?php echo $product ? $product['PRICE_USD'] : 0; ?>" class="form-control" id="price" placeholder="0" pattern="[0-9\.,]+" required=""/>
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="col-sm-3 control-label"><?= PRODUCT_EDIT_IMAGE ?></label>
                <div class="col-sm-9">
                    <input name="img" type="file" class="form-control" id="img" accept="image/*"/>
                    <?php
                    if ($product && is_file($product['THUMB'])) {
                        echo '<image src="' . $product['THUMB'] . '?time=' . time() . '" style="max-width:200px;" />';
                    }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="pdf" class="col-sm-3 control-label"><?= PRODUCT_EDIT_PDF ?></label>
                <div class="col-sm-9">
                    <input name="pdf" type="file" class="form-control" id="pdf" accept="application/pdf"/>&nbsp;<?= PRODUCT_EDIT_PDF_TIPS ?><br/>
                    <?php
                    if ($product && is_file($product['URL_PDF'])) {
                        echo "<a href='" . $product['URL_PDF'] . "' target='_blank'>" . PRODUCT_EDIT_PDF_DOWNLOAD . "</a>";
                    }
                    ?>
                </div>
            </div>
            <?php
            if (count($promotions) > 0) {
                ?>
                <div class="form-group">
                    <label for="promotion" class="col-sm-3 control-label"><?= PRODUCT_EDIT_PROMOTION ?></label>
                    <div class="col-sm-9"> 
                        <input name="id_current_promotion" type="hidden" value="<?= isset($current_promotion) ? $current_promotion['ID'] : 0; ?>"/>
                        <select name="id_promotion" id="id_promotion" class="form-control">
                            <option value="choose"><?= PRODUCT_EDIT_PROMOTION_DEFAULT ?></option>
                            <?php
                            foreach ($promotions as $promotion) {
                                $selected = '';
                                if (isset($current_promotion['ID_PROMOTION']) && $current_promotion['ID_PROMOTION'] == $promotion['ID']) {
                                    $selected = 'selected=""';
                                }
                                echo '<option value="' . $promotion['ID'] . '" ' . $selected . '>' . $promotion['NAME_PROMOTION'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>        
                <div class="form-group" id="tilegiam" style="<?= isset($current_promotion['PRICE_OFF']) ? "display: block" : "display: none"; ?>">
                    <label for="price_off" class="col-sm-3 control-label"><?= PRODUCT_EDIT_PRICE_OFF ?></label>
                    <div class="col-sm-9">
                        <input name="price_off" type="number" value="<?= isset($current_promotion['PRICE_OFF']) ? $current_promotion['PRICE_OFF'] : 0; ?>" class="form-control" id="price_off" placeholder="0" max="1" step="0.01" required=""/>
                    </div>
                </div>  
                <?php
            }
            ?>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" id="btnsubmitproduct" class="btn btn-primary"><?= $product ? PRODUCT_EDIT_BUTTON_EDIT : PRODUCT_EDIT_BUTTON_ADD; ?></button>
                    <a class="btn btn-warning" href="admin.php?controller=product"><?= PRODUCT_EDIT_BUTTON_BACK ?></a>
                </div>
            </div>
        </form>
    </div>
</div>