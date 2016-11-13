<div class="row" id="page-header">
    <div class="col-md-6 col-lg-8 ">
        <h1><?=$title;?></h1>
    </div>
    <div class="col-md-6 col-lg-4">
        
        <a href="<?=base_url();?>admin/users" class="btn no-radius btn-success" title="Xem danh sách"><i class="fa fa-list"></i> Xem danh sách</a>
        
    </div>
    <!-- /.col-lg-12 -->
</div>
<!--End header-->
<form method="post">
    
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input class="form-control" name="full_name" value="<?=set_value('full_name');?>">
                    <div class="error"><?=form_error('full_name');?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?=set_value('email');?>">
                    <div class="error"><?=form_error('email');?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Điện thoại</label>
                    <input class="form-control" name="phone" value="<?=set_value('phone');?>">
                    <div class="error"><?=form_error('phone');?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" name="password" value="<?=set_value('password');?>">
                    <div class="error"><?=form_error('password');?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" name="password_again" value="<?=set_value('password_again');?>">
                    <div class="error"><?=form_error('password_again');?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Vai trò, quyền hạn</label>
                    <select class="form-control" name="role">
                        <?php
                        $input=array();
                        $input['where']=array('status'=>1);
                        $list_role=$this->M_roles->get_list($input);
                        foreach ($list_role as $row) { ?>
                            <option value="<?=$row->role;?>" <?=set_value('role')==$row->role?"selected":"";?> > <?=$row->name;?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="error"><?=form_error('role');?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Facebook</label>
                    <input type="text" class="form-control" name="facebook" value="<?=set_value('facebook');?>">
                    <div class="error"><?=form_error('facebook');?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Zalo</label>
                    <input class="form-control" name="zalo" value="<?=set_value('zalo');?>">
                    <div class="error"><?=form_error('zalo');?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Skype</label>
                    <input class="form-control" name="skype" value="<?=set_value('skype');?>">
                    <div class="error"><?=form_error('skype');?></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input class="form-control" name="address" value="<?=set_value('address');?>">
                    <div class="error"><?=form_error('address');?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 text-center">
        <div class="text-center">
            <?php $url_img=set_value('avatar')==""?base_url()."asset/public/images/avatar-default.png":set_value('avatar');?>
            <img src="<?=$url_img;?>" style="max-width: 150px; margin: 0 auto; cursor: pointer;" onclick="BrowseServer()" class="img-responsive img-circle" id="img-avatar" alt="Avatar">
            
        </div>
        <input type="hidden" class="form-control" id="avatar" name="avatar" value="<?=$url_img;?>">
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary no-radius"><i class="fa fa-save"></i> Lưu lại</button>
        </div>
    </div>
</div>
</form>
<script src="<?=base_url();?>asset/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
    function BrowseServer() {
        var finder = new CKFinder();
        finder.selectActionFunction = SetFileField;
        finder.popup();
    }
    function SetFileField(fileUrl) {
        var url_img=url_root+fileUrl;
        $("#img-avatar").attr("src",url_img);
        document.getElementById('avatar').value = url_img;
    }
</script>
