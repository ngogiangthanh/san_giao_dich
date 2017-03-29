<div class="box">
    <div class="box-header">
        <h3 class="box-title">Danh sách thành viên</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="col-sm-3 col-md-6 col-lg-3 pull-left">
            <div class="input-group">
                <a href="admin.php?controller=users&action=add" class="form-control btn btn-primary btn-primary"><span class="glyphicon glyphicon-plus-sign" title="Thêm thành viên"></span> Thêm thành viên</a>  
            </div>
        </div>
        <div class="col-sm-3 col-md-6 box-header clearfix"></div>
        <div class="col-sm-6 col-md-6 col-lg-3  pull-right">
            <div class="input-group">
                <input type="text" class="form-control" value="<?= $search ?>" id="search-term-input" placeholder="Nhập từ khóa" title="Nhập từ khóa tìm kiếm"/>
                <div class="input-group-btn">
                    <?php
                    if ($search != "") {
                        ?> 
                        <a class="btn btn-default" href='admin.php?controller=users&action=list' title="Xóa thông tin tìm kiếm"><i class="glyphicon glyphicon-remove"></i></a>
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

        <div class="box-header clearfix"></div>
        <table class="table table-bordered table-striped table-hover table-condensed table-responsive">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Họ tên</th>
                    <th class="text-center">Tài khoản</th>
                    <th class="text-center">Thời điểm tạo</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                foreach ($userShorts as $userShort) {
                    ?>
                    <tr>
                        <td><?= $userShort->ID ?></td>
                        <td><?= html_entity_decode($userShort->HO_TEN) ?></td>
                        <td><?= html_entity_decode($userShort->TAI_KHOAN) ?></td>
                        <td>
                            <?= html_entity_decode(date_format(date_create($userShort->THOI_DIEM_TAO), "h:i A | d/m/Y")) ?>
                        </td>
                        <td>
                            <?= html_entity_decode($status[$userShort->TRANG_THAI]) ?>
                        </td>
                        <td class=" text-center">
                            <a href="#" class="btn btn-xs btn-success" data-toggle="modal" data-target="#Show-User" onclick="loadEditForm(getARow('<?= $userShort->ID ?>'))"><span class="glyphicon glyphicon-edit"></span> </a>
                            <a href="#" onclick='$("#delete-confirm-btn").attr("href", "admin.php?controller=users&action=delete&tk=<?= $userShort->TAI_KHOAN ?>&id=<?= $userShort->ID ?>")' data-toggle="modal" data-target="#delete-confirm" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> </a>
                        </td>

                    </tr>
                    <?php
                }
                ?>
            </tbody>
            <?php
            if ($userCount == 0) {
                ?>
                <tfoot>
                    <tr>
                        <th colspan="6" class="text-center">Không có thành viên</th>
                    </tr>
                </tfoot>
                <?php
            }
            ?>
        </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
        <?= $pagination ?>
    </div>
</div>
<!-- /.box -->

<div class="modal" id="Show-User" tabindex="-1" role="dialog" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body col-lg-12 well">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Đóng">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <!-- Password input-->
                <div class="row">
                    <div class="col-sm-12">

                        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <label for="inputAvatar" class="col-sm-4 control-label text-center">
                                    <input id="avatar-2" name="file" type="file" class="form-control file-loading profile-user-img img-responsive img-circle" title="Ảnh đại diện thành viên" alt="User profile picture" accept="image/jpg, image/jpeg, image/png" />
                                </label>
                                <div class="col-sm-8 form-group">
                                    <span class="help-block text-black"><i class="glyphicon glyphicon-time" title="Thời điểm tạo"></i>&nbsp;Thời điểm tạo: <label id="thoi-diem-tao"></label></span>  
                                    <span class="help-block text-black"><i class="glyphicon glyphicon-user" title="Nhóm quyền thành viên"></i>&nbsp;Nhóm quyền: <label id="nhom-quyen"></label></span>  
                                    <span class="help-block text-black"><i class="glyphicon glyphicon-picture" title="Ảnh đại diện"></i>&nbsp;<label id="url-dai-dien"></label></span>  
                                </div>
                            </div>
                        </form>
                        <form action="admin.php?controller=users&action=update" method="post">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Họ tên:</label>
                                    <input type="hidden" name='id_user' id="id-user" value=""/>
                                    <input type="hidden" name='id_url_avatar_temp' id="id-url-avatar-temp" value=""/>
                                    <div class="input-group" title="Họ tên thành viên">
                                        <span class="input-group-addon"><i class="fa fa-user-secret" aria-hidden="true"></i></span>
                                        <input type="text" placeholder="Nhập họ tên" class="form-control" name='hoten' id="ho-ten"/>
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Tài khoản</label>
                                    <div class="input-group" title="Tài khoản"> 
                                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input type="text"  class="form-control" readonly="" name='taikhoan' id="tai-khoan">
                                    </div>
                                </div>
                            </div>	
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Ngày sinh:</label>
                                    <div class="input-group" title="Ngày sinh thành viên"> 
                                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        <input type="date" class="form-control" name="ngaysinh" id="ngay-sinh" placeholder="Nhập ngày sinh" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="control-label" for="gioitinh">Giới tính:</label>
                                    <div class="input-group" title="Giới tính thành viên"> 
                                        <span class="input-group-addon"><i class="fa fa-male" aria-hidden="true"></i></span>
                                        <select id="gioi-tinh" name="gioitinh" class="form-control">
                                            <option value="1">Nam</option>
                                            <option value="2">Nữ</option>
                                            <option value="3">Không xác định</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Email:</label>
                                    <div class="input-group" title="Email thành viên"> 
                                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                        <input type="email" placeholder="Nhập email" class="form-control" name='email' id="email-id">
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>SĐT</label>
                                    <div class="input-group" title="Số điện thoại thành viên"> 
                                        <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                        <input type="tel" class="form-control" placeholder="Nhập số điện thoại" name='sdt' id="so-dien-thoai">
                                    </div>
                                </div>
                            </div>	

                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Mật khẩu:</label>
                                    <div class="input-group" title="Mật khẩu thành viên"> 
                                        <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="matkhau" id="mat-khau" placeholder="Nhập mật khẩu" value="">
                                        <div class="input-group-btn" title="Hiện mật khẩu">
                                            <button class="btn btn-default" type="button" id="btn-show-password" onclick="showPassword()"><i class="ionicons ion-android-lock"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="control-label" for="trangthai">Trạng thái:</label>
                                    <div class="input-group" title="Trạng thái thành viên"> 
                                        <span class="input-group-addon"><i class="fa fa-quote-left" aria-hidden="true"></i></span>
                                        <select id="trang-thai-id" name="trangthai" class="form-control">
                                            <option value="1">Hoạt động</option>
                                            <option value="2">Đã khóa</option>
                                            <option value="3">Chờ kích hoạt</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Địa chỉ</label>
                                    <textarea placeholder="Nhập địa chỉ" rows="2"  name="diachi" class="form-control" title="Địa chỉ thành viên" id="dia-chi-id"></textarea>
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Câu nói</label>
                                    <textarea placeholder="Nhập câu nói" rows="2" title="Câu nói thành viên" name="caunoi" class="form-control" id="cau-noi-id"></textarea>
                                </div>	
                            </div>

                            <div class="row pull-right">
                                <div class="col-sm-12 ">
                                    <button type="submit" class="btn btn-success">Lưu</button>		
                                    <button type="button" class="btn btn-warning" onclick="loadEditForm(getARow($('#id-user').val()))">Làm lại</button>	
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>	
                                </div>
                            </div>

                        </form> 		
                    </div>
                </div>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal modal-warning " id="delete-confirm" tabindex="-1" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">[Cảnh báo] Xác nhận</h4>
            </div>
            <div class="modal-body">
                <p>Xác nhận xóa thành viên?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                <a href='#' id='delete-confirm-btn' class="btn btn-outline">Xác nhận</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type='text/javascript'>
<?php
$js_array = json_encode($userShorts);
echo "var userShorts = " . $js_array . ";\n";
?>
    var roles = ["", "Thành viên", "Quản lý"];

    function showPassword() {
        var str = $("#mat-khau").attr("type");
        if (str === "password") {
            $("#mat-khau").prop("type", "text");
            $("#btn-show-password").empty();
            $("#btn-show-password").append("<i class='ionicons ion-android-unlock'></i>");
        } else if (str === "text") {
            $("#mat-khau").prop("type", "password");
            $("#btn-show-password").empty();
            $("#btn-show-password").append("<i class='ionicons ion-android-lock'></i>");
        }
    }

    function loadEditForm(dataRow) {

        $("#id-url-avatar-temp").val(dataRow['URL_DAI_DIEN']);
        $("#id-user").val(dataRow['ID']);
        $("#avatar-id").attr("src", dataRow['URL_DAI_DIEN']);
        $("#thoi-diem-tao").html($.datepicker.formatDate('dd/mm/yy', new Date(dataRow['THOI_DIEM_TAO'])));
        $("#url-dai-dien").html(dataRow['URL_DAI_DIEN']);
        $("#nhom-quyen").html(roles[parseInt(dataRow['QUYEN_HAN'])]);
        $("#ho-ten").val(dataRow['HO_TEN']);
        $("#ngay-sinh").val(dataRow['NGAY_SINH']);
        $("#gioi-tinh").val(dataRow['GIOI_TINH']).change();
        $("#email-id").val(dataRow['EMAIL']);
        $("#so-dien-thoai").val(dataRow['SDT']);
        $("#tai-khoan").val(dataRow['TAI_KHOAN']);
        $("#mat-khau").val(dataRow['MAT_KHAU_GOC']);
        $("#trang-thai-id").val(dataRow['TRANG_THAI']).change();
        $("#cau-noi-id").val(dataRow['CAU_NOI']);
        $("#dia-chi-id").val(dataRow['DIA_CHI']);
        $("#button-id").prop("disabled", true);
    }
    function getARow(id) {
        var dt_size = userShorts.length;
        var row = null;
        for (var i = 0, j = dt_size; i < j; i++) {
            if (userShorts[i]['ID'] === id) {
                row = userShorts[i];
                break;
            }
        }

        return row;
    }
</script>