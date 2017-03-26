
<!-- /.col -->

<div class="col-md-6">
    <!-- USERS LIST -->
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Thành viên mới nhất</h3>

            <div class="box-tools pull-right">
                <span class="label label-danger"><?= count($userLastests) ?> thành viên mới</span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <ul class="users-list clearfix">
                <?php
                foreach ($userLastests as $userLastest) {
                    ?>
                    <li>
                        <img src="<?= $userLastest['URL_DAI_DIEN'] ?>" alt="User Image">
                        <a class="users-list-name" href="#"><?= $userLastest['HO_TEN'] ?></a>
                        <span class="users-list-date"><?= get_day_name($userLastest["THOI_DIEM_TAO"]) ?></span>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <!-- /.users-list -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <a href="admin.php?controller=users&action=list" class="uppercase">Xem tất cả</a>
        </div>
        <!-- /.box-footer -->
    </div>
    <!--/.box -->
</div>
<!-- /.col -->

<div class="col-md-6">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Danh sách thành viên</h3>
            <div class="box-tools pull-right">
                <span class="label label-success"><?= $userCount ?> thành viên</span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Họ tên</th>
                        <th>Tài khoản</th>
                        <th style="width: 40px">Trạng thái</th>
                    </tr>
                <thead>
                <tbody>

                    <?php
                    foreach ($userShorts as $userShort) {
                        ?>
                        <tr>
                            <td><?= $userShort['ID'] ?></td>
                            <td><?= html_entity_decode($userShort['HO_TEN']) ?></td>
                            <td><?= html_entity_decode($userShort['TAI_KHOAN']) ?></td>
                            <td>
                                <?= html_entity_decode($status[$userShort['TRANG_THAI']]) ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="box-footer text-center">
                            <a href="admin.php?controller=users&action=list" class="uppercase">Xem tất cả</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <?= $pagination ?>
        </div>
    </div>
    <!-- /.box -->
</div>