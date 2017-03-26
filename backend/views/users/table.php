<div class="box">
    <div class="box-header">
        <h3 class="box-title">Danh sách thành viên</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Tài khoản(s)</th>
                    <th>Trạng thái</th>
                    <th>Thời điểm tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
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
                        <td>
                            <?= html_entity_decode(date_format(date_create($userShort['THOI_DIEM_TAO']), "H:i:s d/m/Y")) ?>
                        </td>
                        <td class=" text-center"><div class="btn-group">
                                <button type="button" class="btn btn-info">Thao tác</button>
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Sửa</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Xóa</a></li>
                                </ul>
                            </div>
                        </td>

                    </tr>
                    <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Tài khoản(s)</th>
                    <th>Trạng thái</th>
                    <th>Thời điểm tạo</th>
                    <th>Thao tác</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->