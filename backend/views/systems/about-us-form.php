
<div class="box box-default">
    <div class="box-header">
        <h3 class="box-title"><i class="ionicons ion-edit"></i>&nbsp;Chỉnh sửa thông tin giới thiệu về Sàn giao dịch
        </h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
        </div>
        <!-- /. tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body pad">
        <form action="admin.php?controller=systems&action=about-us-save" method="post">
            <div class="row">
                <div class="col-sm-12 form-group">
                    <textarea id="editor1" name="noi_dung" rows="20" cols="80" required=""><?=$about_us->THONG_TIN_TO_CHUC?>
                </textarea>
                    <input type="hidden" value="<?=$about_us->ID?>" id="id_info" name="id_info">
            </div>
            </div>

            <div class="row pull-right ">
                <div class="col-sm-12 form-group">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Lưu</button>		
                    <button type="button" class="btn btn-warning" onclick="location.href='admin.php?controller=systems&action=about-us'"><i class="ionicons ion-android-sync"></i>&nbsp;Làm lại</button>	
                    <a href="admin.php?controller=systems" class="btn btn-default"><i class="fa fa-backward"></i>&nbsp;Quay lại</a>	
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.box -->