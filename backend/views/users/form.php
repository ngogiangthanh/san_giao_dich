<div class="box">
    <div class="box-header">
        <h3 class="box-title">Thêm thành viên</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="modal-body col-lg-12 well">
            <!-- Password input-->
            <div class="row">
                <div class="col-sm-12">
                    <form action="admin.php?controller=users&action=save" method="post"enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-4 form-group text-center">
                                <label for="inputAvatar">
                                    <input id="avatar-2" name="file" type="file" class="form-control file-loading profile-user-img img-responsive img-circle" title="Ảnh đại diện thành viên" alt="User profile picture" accept="image/jpg, image/jpeg, image/png" />
                                </label>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label>Tài khoản</label>
                                <div class="input-group" title="Tài khoản"> 
                                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input type="text"  class="form-control" name='taikhoan' id="tai-khoan">
                                </div>
                                <label>Mật khẩu:</label>
                                <div class="input-group" title="Mật khẩu thành viên"> 
                                    <span class="input-group-addon" onclick="$('#mat-khau').val(Math.random().toString(36).slice(-8));"><i class="fa fa-key" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="matkhau" id="mat-khau" placeholder="Nhập mật khẩu" value="">
                                    <div class="input-group-btn" title="Hiện mật khẩu">
                                        <button class="btn btn-default" type="button" id="btn-show-password" onclick="showPassword()"><i class="ionicons ion-android-lock"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label class="control-label" for="trangthai">Trạng thái:</label>
                                <div class="input-group" title="Trạng thái thành viên"> 
                                    <span class="input-group-addon"><i class="fa fa-quote-left" aria-hidden="true"></i></span>
                                    <select id="trang-thai-id" name="trangthai" class="form-control">
                                        <option value="1">Hoạt động</option>
                                        <option value="2">Đã khóa</option>
                                        <option value="3">Chờ kích hoạt</option>
                                    </select>
                                </div>

                                <label>Email:</label>
                                <div class="input-group" title="Email thành viên"> 
                                    <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                    <input type="email" placeholder="Nhập email" class="form-control" name='email' id="email-id">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Họ tên:</label>
                                <input type="hidden" name='id_user' id="id-user" value=""/>
                                <input type="hidden" name='id_url_avatar_temp' id="id-url-avatar-temp" value=""/>
                                <div class="input-group" title="Họ tên thành viên">
                                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input type="text" placeholder="Nhập họ tên" class="form-control" name='hoten' id="ho-ten"/>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Số điện thoại</label>
                                <div class="input-group" title="Số điện thoại thành viên"> 
                                    <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                    <input type="tel" class="form-control" placeholder="Nhập số điện thoại" name='sdt' id="so-dien-thoai">
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
                                <button type="reset" class="btn btn-warning">Làm lại</button>		
                                <a href="admin.php?controller=users&action=list" class="btn btn-info">Danh sách</a>	
                            </div>
                        </div>	
                    </form> 		
                </div>
            </div>
        </div>
    </div>
</div>