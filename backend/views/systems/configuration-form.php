<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-cogs"></i>&nbsp;Cấu hình kết nối CSDL</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="col-sm-12">
            <form class="form-horizontal">
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="time-zone">Time zone/Múi giờ:</label>  
                    <div class="col-md-8">
                            <select id="selectbasic" name="selectbasic" class="form-control">
                                <?php
                                foreach( $time_zones as $key=>$val){
                                    ?>
                                <option value="<?=$key?>" <?=($configs[0]== $key) ? "selected" : ""?>><?=$val?></option>
                                <?php
                                }
                                ?>
                          </select>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="host-name">Host name/IP:</label>  
                    <div class="col-md-8">
                        <input id="host-name" name="host-name" type="text" placeholder="Nhập host name" class="form-control input-md" required="" value='<?=$configs[1]?>'>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="database-name">Database's name:</label>  
                    <div class="col-md-8">
                        <input id="database-name" name="database-name" type="text" placeholder="Nhập tên CSDL" class="form-control input-md" required="" value='<?=$configs[4]?>'>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="database-user">Database's User:</label>  
                    <div class="col-md-8">
                        <input id="database-user" name="database-user" type="text" placeholder="Nhập người dùng CSDL" class="form-control input-md" required="" value='<?=$configs[2]?>'>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="database-password">Database's password:</label>  
                    <div class="col-md-8">
                        <input id="atabase-password" name="atabase-password" type="password" placeholder="Nhập mật khẩu CSDL" class="form-control input-md" required="" value='<?=(strlen($configs[3])==0) ? "**********" : ""?>'>
                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="save-btn"></label>
                    <div class="col-md-8">
                        <button type="submit" id="save-btn" name="save-btn" class="btn btn-success">Lưu</button>
                        <button type="reset" id="reset-button" name="reset-button" class="btn btn-warning">Làm lại</button>    
                        <a href="admin.php?controller=systems" class="btn btn-default"><i class="fa fa-backward"></i>&nbsp;Quay lại</a>	
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- /.box -->