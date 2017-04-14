<div class="col-md-3">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Thư mục</h3>

            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="admin.php?controller=contacts"><i class="fa fa-inbox"></i> Xem tất cả <span class="label label-success pull-right"><?= $contactCountAll ?></span></a></li>
                <li><a href="admin.php?controller=contacts&status=spam"><i class="fa fa-filter"></i> Spam <span class="label label-warning pull-right"><?= $contactSpamCount ?></span></a>
                </li>
                <li><a href="admin.php?controller=contacts&status=trash"><i class="fa fa-trash-o"></i> Thùng rác <span class="label label-danger pull-right"><?= $contactTrashCount ?></span></a></li>
            </ul>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /. box -->
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Trạng thái liên hệ</h3>

            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="admin.php?controller=contacts&important=yes"><i class="fa fa-circle-o text-blue"></i> Quan trọng</a></li>
                <li><a href="admin.php?controller=contacts&status=wait"><i class="fa fa-circle-o text-yellow"></i> Chờ xử lý</a></li>
                <li><a href="admin.php?controller=contacts&status=responded"><i class="fa fa-circle-o text-orange"></i> Đã phản hồi</a></li>
                <li><a href="admin.php?controller=contacts&status=suspend"><i class="fa fa-circle-o text-red"></i> Treo</a></li>
            </ul>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


<div class="col-md-9">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Danh sách các liên hệ</h3>

            <div class="col-sm-6 col-md-6 col-lg-3   pull-right">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm nội dung" value="<?= $search ?>" id="search-term-input" >
                    <div class="input-group-btn">

                        <?php
                        if ($search != "") {
                            ?> 
                            <a class="btn btn-default" href='admin.php?controller=contacts' title="Xóa thông tin tìm kiếm"><i class="glyphicon glyphicon-remove"></i></a>

                            <?php
                        } else {
                            ?>
                            <button class="btn btn-default" type="button" id="search-term-btn" title="Tìm kiếm"><i class="glyphicon glyphicon-search"></i></button>
                            <?php
                        }
                        ?>
                    </div>

                </div>

            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">

            <?php if ($contactCount > 0) { ?>

                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                    </div>
                    <!-- /.btn-group -->
                    <button type="button" class="btn btn-default btn-sm" onclick="location.reload();"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                        <?= $pagination ?>
                        <!-- /.btn-group -->
                    </div>
                </div>

                <?php
            }
            ?>
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                    <tbody>
                        <?php
                        foreach ($contacts as $contact) {
                            ?>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td class="mailbox-star"><a href="#"><i class="fa fa-star<?= $contact->QUAN_TRONG ? "" : "-o" ?> text-yellow"></i></a></td>
                                <td class="mailbox-name"><a href="admin.php?controller=contacts&action=view"><?= $contact->DA_XEM ? "<b>" . $contact->HO_TEN . "</b>" : $contact->HO_TEN ?></a></td>
                                <td class="mailbox-subject"><?= $contact->DA_XEM ? "<b>" . $contact->TIEU_DE . "</b>" : $contact->TIEU_DE ?>
                                </td>
                                <td class="mailbox-date"><?= get_day_name($contact->THOI_DIEM_CAP_NHAT) ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>

                    <?php if ($contactCount == 0) { ?>

                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-center">
                                    Không có liên hệ nào
                                </td>
                            </tr>
                        </tfoot>
                        <?php }
                    ?>
                </table>
                <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer no-padding">

            <?php if ($contactCount > 0) { ?>

                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                    </div>
                    <!-- /.btn-group -->
                    <button type="button" class="btn btn-default btn-sm" onclick="location.reload();"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                        <?= $pagination ?>
                        <!-- /.btn-group -->
                    </div>
                    <!-- /.pull-right -->
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <!-- /. box -->
</div>
