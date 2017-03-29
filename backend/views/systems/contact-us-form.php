<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="ionicons ion-edit"></i>&nbsp;Chỉnh sửa thông tin liên hệ</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="modal-body col-lg-12 well">
            <!-- Password input-->
            <div class="row">
                <div class="col-sm-12">

                    <form action="admin.php?controller=systems&action=contact-us-save" method="post">
                        <div class="row">
                            <div class="col-sm-6 embed-responsive embed-responsive-16by9 text-center form-group">
                                <iframe class="embed-responsive-item" id="map-show-id" height="500" 
                                        frameborder="0" style="border:0"
                                        src="https://www.google.com/maps/embed/v1/place?key=<?= $map_elements[0] ?>&q=<?= $map_elements[1] ?>" allowfullscreen>
                                </iframe>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for='apikey'>API key:</label>
                                <div class="input-group" title="API key"> 
                                    <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name='apikey' id="api-key-id" data-toggle="tooltip" placeholder="Nhập api key" value='<?= $map_elements[0] ?>' title="API key được tạo tại địa chỉ https://goo.gl/nNi4dL"/>
                                </div>
                                <label for='place'>Tên địa điểm:</label>
                                <div class="input-group" title="Tên địa điểm"> 
                                    <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="dia-diem" id="dia-diem-id" data-toggle="tooltip" placeholder="Nhập tên địa điểm" value="<?= $map_elements[1] ?>" title="Tên địa điểm của nhận dạng trên Google Maps">
                                    
                                    <div class="input-group-btn" title="Check on map">
                                        <button type="button" id='check-map-btn-id' class="btn btn-success"><i class="fa fa-map-marker"></i></button>
                                    </div>
                                </div>

                                <label>Địa chỉ/SĐT/Email liên hệ</label>
                                <textarea id="editor1" name="noi_dung_lh" rows="20" cols="80" required="">
                                    <?= $contact_info->THONG_TIN_TO_CHUC ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="row pull-right ">
                            <div class="col-sm-12 form-group">
                                <input type="hidden" value="<?=$map->ID?>" id="id_info_map" name="id_info_map">
                                <input type="hidden" value="<?=$contact_info->ID?>" id="id_info_contact" name="id_info_contact">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Lưu</button>		
                                <button type="button" class="btn btn-warning" onclick="location.href = 'admin.php?controller=systems&action=contact-us'"><i class="ionicons ion-android-sync"></i>&nbsp;Làm lại</button>	
                                <a href="admin.php?controller=systems" class="btn btn-default" data-dismiss="modal"><i class="fa fa-backward"></i>&nbsp;Quay lại</a>	
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>