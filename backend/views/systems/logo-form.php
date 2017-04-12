<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="ionicons ion-edit"></i>&nbsp;Chỉnh sửa logo - banner</h3>
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

                    <form id="upload-image-logo" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-4 form-group text-center">
                                <label>
                                    <input id="logo-id" name="file" type="file" class="form-control file-loading-logo" title="Logo cho website" alt="logo website" accept="image/*" />
                                </label>
                            </div>
                            <div class="col-sm-8 form-group">
                                <label>Đường dẫn logo:</label>
                                <div class="input-group" title="Đường dẫn logo"> 
                                    <input type="text" class="form-control" name='url-logo' id="url-logo" value='<?= $logo->THONG_TIN_TO_CHUC ?>' readonly=""/>
                                    <span class="input-group-addon"><i class="fa fa-upload" aria-hidden="true"></i></span>

                                </div>
                            </div> 
                        </div>      
                    </form>
                    <form id="upload-image-banner" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-4 form-group text-center">
                                <label>
                                    <input id="banner-id" name="file" type="file" class="form-control file-loading-banner" title="Logo cho website" alt="logo website" accept="image/*" />
                                </label>
                            </div>
                            <div class="col-sm-8 form-group">
                                <label>Đường dẫn banner:</label>
                                <div class="input-group" title="Đường dẫn banner"> 
                                    <input type="text" class="form-control" name='url-banner' id="url-banner" value='<?= $banner->THONG_TIN_TO_CHUC ?>' readonly=""/>
                                    <span class="input-group-addon"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                </div>
                            </div>      
                        </div>
                    </form>
                    <div class="row pull-right ">
                        <div class="col-sm-12 form-group">
                            <input type="hidden" value="<?= $logo->ID ?>" id="id_info_logo" name="id_info_logo">
                            <input type="hidden" value="<?= $banner->ID ?>" id="id_info_banner" name="id_info_banner">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Lưu</button>		
                            <button type="button" class="btn btn-warning" onclick="location.href = 'admin.php?controller=systems&action=logo'"><i class="ionicons ion-android-sync"></i>&nbsp;Làm lại</button>	
                            <a href="admin.php?controller=systems" class="btn btn-default" data-dismiss="modal"><i class="fa fa-backward"></i>&nbsp;Quay lại</a>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>