
<section class="col-lg-7">
    <!-- Chat box -->
    <div class="box box-success">
        <div class="box-header">
            <i class="fa fa-comments-o"></i>

            <h3 class="box-title">Gửi trả lời liên hệ</h3>

        </div>
        <div class="box-body chat" id="chat-box">
            <?php
            for ($i = 1; $i < $chat_length; $i++) {
                $element = explode("#@#", $chat_content[$i]);
                ?>
                <!-- chat item -->
                <div class="item">
                    <?php
                    if ($element[0] == $contact->ID_NGUOI_LIEN_HE | $element[0] == "null")
                    {
                        ?>

                    <img src="<?= $element[0] == "null" ? "./uploads/images/avatar/default.png" : $contact->URL_DAI_DIEN; ?>" width="128px" alt="user image" class="online">

                    <p class="message">
                        <a href="#" class="name">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?= get_day_name($element[2]) ?></small>
                        <?= $element[0] == "null" ? $contact->HO_TEN : $contact->HO_TEN_PHAN_HOI; ?>
                        </a>
                        <?= $element[1] ?>
                    </p>
                    <?php
                    }
                    else{
                        ?>
                    
                    <img src="<?=explode("++",$user_data[$element[0]])[1]?>" width="128px" alt="user image" class="online">

                    <p class="message">
                        <a href="#" class="name">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?= get_day_name($element[2]) ?></small>
                        <?= explode("++",$user_data[$element[0]])[0] ?>
                        </a>
                        <?= $element[1] ?>
                    </p>
                    
                    <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <!-- /.chat -->
        <div class="box-footer">
            <div class="input-group">
                <input class="form-control" placeholder="Type message...">

                <div class="input-group-btn">
                    <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box (chat box) -->
</section>
