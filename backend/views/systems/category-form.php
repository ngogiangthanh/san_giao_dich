<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-list"></i>&nbsp;Danh sách chuyên mục con</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="col-sm-3 col-md-6 col-lg-3 pull-left">
            <div class="input-group">
                <a href="#" data-toggle="modal" data-target="#Add-Category"  class="form-control btn btn-primary btn-primary"><span class="glyphicon glyphicon-plus-sign" title="Thêm chuyên mục"></span> Thêm chuyên mục</a>  
            </div>
        </div>
        <div class="col-sm-3 col-md-6 box-header clearfix"></div>

        <div class="box-header clearfix"></div>
        <table class="table table-bordered table-striped table-hover table-condensed table-responsive">
            <thead>
                <tr>
                    <th class="text-center visible-lg visible-md"><i class="fa fa-key"></i>&nbsp;STT</th>
                    <th class="text-center col-xs-4 col-sm-4"><i class="fa fa-credit-card"></i>&nbsp;Tên chuyên mục</th>
                    <th class="text-center col-xs-4 col-sm-4"><i class="fa fa-comment-o"></i>&nbsp;Mô tả chuyên mục</th>
                    <th class="text-center visible-lg visible-md"><i class="fa fa-picture-o"></i>&nbsp;Hình ảnh</th>
                    <th class="text-center visible-lg visible-md"><i class="fa fa-link"></i>&nbsp;URL</th>
                    <th class="text-center col-xs-2 col-sm-2"><i class="fa fa-star-half-o"></i>&nbsp;Ẩn/Hiện</th>
                    <th class="text-center col-xs-2 col-sm-2"><i class="fa fa-magic"></i>&nbsp;Thao tác</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $i = 0;
                foreach ($Categories as $Category) {
                    $i++;
                    ?>
                    <tr>
                        <td class="visible-lg visible-md"><?= $Category->THU_TU ?></td>
                        <td class="col-xs-4 col-sm-4"><?= html_entity_decode($Category->TEN_LINH_VUC) ?></td>
                        <td class="col-xs-4 col-sm-4"><?= html_entity_decode($Category->MO_TA_LINH_VUC) ?></td>
                        <td class="visible-lg visible-md">
                            <img src="<?= $Category->URL_THUMNAIL ?>" alt="" title="" width="100px"/>
                        </td>
                        <td class="visible-lg visible-md">
                            <?= $Category->URL_MENU ?>
                        </td>
                        <td class="col-xs-2 col-sm-2">
                            <?= $status[$Category->HIEN_THI] ?>
                        </td>
                        <td class="text-center col-xs-2 col-sm-2" >
                            <?php
                            if ($i != 1) {
                                ?>
                                <a href="#" class="btn btn-xs btn-success"><i class="fa fa-arrow-up"></i></a>
                                <?php
                            }
                            if ($i != $CategoryCount) {
                                ?>
                                <a href="#" class="btn btn-xs btn-success"><i class="fa fa-arrow-down"></i></a>
                                <?php
                            }
                            ?>
                        </td>

                    </tr>
                    <?php
                }
                ?>
            </tbody>
            <?php
            if ($CategoryCount == 0) {
                ?>
                <tfoot>
                    <tr>
                        <th colspan="6" class="text-center">Không có chuyên mục</th>
                    </tr>
                </tfoot>
                <?php
            }
            ?>
        </table>
    </div>
</div>
<!-- /.box -->
<style type="text/css">
    .table > tbody > tr > td {
        vertical-align: middle;
    }
</style>


<div class="modal" id="Add-Category" tabindex="-1" role="dialog" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
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
                        <form class="form-horizontal">
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="ten-chuyen-muc">Tên chuyên mục</label>  
                                <div class="col-md-8">
                                    <input id="ten-chuyen-muc" name="ten-chuyen-muc" type="text" placeholder="Nhập tên chuyên mục" class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="mo-ta-chuyen-muc">Mô tả chuyên mục</label>
                                <div class="col-md-8">                     
                                    <textarea class="form-control" id="mo-ta-chuyen-muc" name="mo-ta-chuyen-muc"></textarea>
                                </div>
                            </div>

                            <!-- Appended Input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="hinh-anh">Hình ảnh</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input id="hinh-anh" name="hinh-anh" class="form-control" placeholder="URL thumnail" type="text" readonly="">
                                        <span class="input-group-addon">Upload</span>
                                    </div>

                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="url-menu">Đường dẫn menu</label>  
                                <div class="col-md-8">
                                    <input id="url-menu" name="url-menu" type="text" placeholder="Nhập mô tả đường dẫn" class="form-control input-md" required="">
                                </div>
                            </div>

                            <!-- Multiple Checkboxes -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="trang-thai">Trạng thái</label>
                                <div class="col-md-8">
                                    <div class="checkbox-inline">
                                        <label for="trang-thai-0">
                                            <input type="checkbox" name="trang-thai" id="trang-thai-0" value="1">
                                            Hiện
                                        </label>
                                    </div>
                                    <div class="checkbox-inline">
                                        <label for="trang-thai-1">
                                            <input type="checkbox" name="trang-thai" id="trang-thai-1" value="0" checked="">
                                            Ẩn
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Button (Double) -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="save-btn"></label>
                                <div class="col-md-8">
                                    <button type="submit" id="save-btn" name="save-btn" class="btn btn-success">Lưu</button>
                                    <button type="reset" id="reset-button" name="reset-button" class="btn btn-warning">Làm lại</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Đóng</button>
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