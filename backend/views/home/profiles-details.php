
<div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?= $_SESSION["login"]["URL_DAI_DIEN"] ?>" alt="User profile picture">

            <h3 class="profile-username text-center"><?= $_SESSION["login"]["HO_TEN"] ?></h3>

            <p class="text-muted text-center">Quản trị viên: <?= $_SESSION["login"]["TAI_KHOAN"] ?></p>
            <p class="text-muted text-center"><i class="fa fa-quote-left"></i><?= $_SESSION['login']['CAU_NOI'] ?><i class="fa fa-quote-right"></i></p>
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Ngày sinh:&nbsp;</b> <a class="pull-right"><?= date_format(date_create($_SESSION["login"]["NGAY_SINH"]), "d/m/Y") ?></a>
                </li>
                <li class="list-group-item">
                    <b>Giới tính:&nbsp;</b> <a class="pull-right"><?= $gender[$_SESSION["login"]["GIOI_TINH"]] ?></a>
                </li>
                <li class="list-group-item">
                    <b>Ngày tạo:&nbsp;</b> <a class="pull-right"><?= date_format(date_create($_SESSION["login"]["THOI_DIEM_TAO"]), "H:i:s d/m/Y") ?></a>
                </li>
                <li class="list-group-item">
                    <b>Trạng thái:&nbsp;</b> <a class="pull-right"><?= $status[$_SESSION["login"]["TRANG_THAI"]] ?></a>
                </li>
            </ul>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Thông tin liên lạc</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <strong><i class="fa fa-envelope-o"></i> Email</strong>

            <p class="text-muted">
                <?= $_SESSION["login"]["EMAIL"] ?>
            </p>

            <hr>

            <strong><i class="fa fa-phone"></i> Số điện thoại</strong>

            <p class="text-muted"><?= $_SESSION["login"]["SDT"] ?></p>

            <hr>

            <strong><i class="fa fa-home"></i> Địa chỉ</strong>

            <p>
                <?= $_SESSION["login"]["DIA_CHI"] ?>
            </p>

            <hr>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->
<div class="col-md-9">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#settings" data-toggle="tab">Cập nhật thông tin</a></li>
        </ul>
        <div class="tab-content">

            <div class="active tab-pane" id="settings">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="inputAvatar" class="col-sm-2 control-label">Ảnh đại diện:</label>

                        <div class="col-sm-10">

                            <div class="input-group">
                                <input type="text" class="form-control" id="inputAvatar" name="avatar" aria-describedby="basic-addon-avatar" value="<?= $_SESSION['login']['URL_DAI_DIEN'] ?>" readonly/>
                                <span class="input-group-addon" id="basic-addon-avatar"  data-toggle="modal" data-target="#upload_avatar" >Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputHoTen" class="col-sm-2 control-label">Họ tên:</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputHoTen" name="hoTen" value="<?= $_SESSION['login']['HO_TEN'] ?>" placeholder="Nhập họ tên">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNgaySinh" class="col-sm-2 control-label">Ngày sinh:</label>

                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputNgaySinh" name="ngaySinh" placeholder="Nhập ngày sinh" value="<?= $_SESSION['login']['NGAY_SINH'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inputGioiTinh">Giới tính:</label>
                        <div class="col-md-10">
                            <div class="radio">
                                <label for="inputGioiTinh-0">
                                    <input type="radio" name="gioiTinh" id="inputGioiTinh-0" value="1" <?= $_SESSION['login']['GIOI_TINH'] == 1 ? "checked='checked'" : "" ?> >
                                    Nam
                                </label>
                            </div>
                            <div class="radio">
                                <label for="inputGioiTinh-1">
                                    <input type="radio" name="gioiTinh" id="inputGioiTinh-1" value="2" <?= $_SESSION['login']['GIOI_TINH'] == 2 ? "checked='checked'" : "" ?> >
                                    Nữ
                                </label>
                            </div>
                            <div class="radio">
                                <label for="inputGioiTinh-2">
                                    <input type="radio" name="gioiTinh" id="inputGioiTinh-2" value="3" <?= $_SESSION['login']['GIOI_TINH'] == 3 ? "checked='checked'" : "" ?> >
                                    Không xác định
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email:</label>

                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" name="email" value="<?= $_SESSION['login']['EMAIL'] ?>" placeholder="Nhập email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSDT" class="col-sm-2 control-label">Số điện thoại:</label>

                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="inputSDT" name="sdt" value="<?= $_SESSION['login']['SDT'] ?>" placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDiaChi" class="col-sm-2 control-label">Địa chỉ:</label>

                        <div class="col-sm-10">
                            <textarea class="form-control" id="inputDiaChi" name="diaChi" placeholder="Nhập địa chỉ"><?= $_SESSION['login']['DIA_CHI'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#change_password" >Đổi mật khẩu</button>
                            <button type="reset" class="btn btn-default">Làm lại</button>
                        </div>
                    </div>

                    <form class="form-horizontal">
                        <div class="modal" id="change_password" tabindex="-1" role="dialog" data-backdrop="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Đổi mật khẩu</h4>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Password input-->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="inputOldPassword">Mật khẩu hiện tại:</label>
                                            <div class="col-md-4">
                                                <input id="inputOldPassword" name="inputOldPassword" type="password" placeholder="Nhập mật khẩu hiện tại" class="form-control input-md" required="">

                                            </div>
                                        </div>

                                        <!-- Password input-->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="inputNewPassword">Mật khẩu mới:</label>
                                            <div class="col-md-4">
                                                <input id="inputNewPassword" name="inputNewPassword" type="password" placeholder="Nhập mật khẩu mới" class="form-control input-md" required="">

                                            </div>
                                        </div>

                                        <!-- Password input-->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="inputConfirmPassword">Xác nhận mật khẩu:</label>
                                            <div class="col-md-4">
                                                <input id="inputConfirmPassword" name="inputConfirmPassword" type="password" placeholder="Nhập lại mật khẩu" class="form-control input-md" required="">

                                            </div>
                                        </div>

                                        <!-- Button (Double) -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="btnSave"></label>
                                            <div class="col-md-8">
                                                <button type="submit" id="btnSave" name="btnSave" class="btn btn-success">Tải lên</button>
                                                <button type="reset" id="btnClear" name="btnClear" class="btn btn-default">Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </form>
                    <!-- /.modal -->

                    <form class="form-horizontal">
                        <div class="modal" id="upload_avatar" tabindex="-1" role="dialog" data-backdrop="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Cập nhật ảnh đại diện</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="fileAvatar">Chọn ảnh:</label>
                                            <div class="col-md-4">
                                                <input id="fileAvatar" name="fileAvatar" class="input-file" type="file">
                                            </div>
                                        </div>

                                        <!-- Button (Double) -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="btnSaveAvatar"></label>
                                            <div class="col-md-8">
                                                <button type="submit" id="btnSaveAvatar" name="btnSaveAvatar" class="btn btn-success">Tải lên</button>
                                                <button type="reset" id="btnClearAvatar" name="btnClearAvatar" class="btn btn-default">Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </form>
                    <!-- /.modal -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->