<style>
    #form-login{
        border: 5px solid #58BDF6;
    }
    #login-header{
        height: 100px;
        border-bottom: 2px solid #ccc;
    }
    #logo-login{
        text-align: right;
    }
    #logo-login img{
        height: 80px;
        margin-top: 10px;
        width: auto;
    }
    #title-login h1{
        font-size: 20px;
        text-transform: uppercase;
        margin-top: 40px;
        font-weight: bold;
    }
    #login-left{
        border-right: 1px dotted #ccc;
    }
</style>
<div class="container">
    <div class="row" style="margin: 30px auto;">
        <div class="col-md-8 col-md-offset-2" id="form-login">
            <form class="form-horizontal" method="post">
                <div class="row" id="login-header">
                    <div class="hidden-sm hidden-xs col-md-4" id="logo-login">
                        <img src="<?=base_url();?>asset/images/login.png">
                    </div>
                    <div class="col-md-8" id="title-login">
                            <h1>THÀNH VIÊN ĐĂNG NHẬP</h1>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <?=$this->session->flashdata('msg_admin');?>
                    </div>
                    <div class="col-md-6" id="login-left">
                        <div class="form-group">
                            <label class="control-label col-sm-3 " for="email">Email:</label>
                            <div class="col-sm-9">
                              <input type="email" value="<?=set_value('email');?>" class="form-control no-radius" name="email" id="email" placeholder="Nhập email ...">
                               <div class="error"><?=form_error('email');?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 " for="email">Mật khẩu:</label>
                            <div class="col-sm-9">
                              <input type="password" value="<?=set_value('password');?>" class="form-control no-radius" name="password" id="email" placeholder="Nhập mật khẩu ...">
                               <div class="error"><?=form_error('password');?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <button class="btn btn-primary no-radius" type="submit" name="submit" value="Đăng nhập"><i class="fa fa-sign-in"></i> Đăng nhập</button>
                            </div>
                            <label class="control-label col-sm-5" style="margin-top: 5px;">
                                <a href="<?=base_url();?>quen-mat-khau.html">Quên mật khẩu?</a>
                            </label>
                            
                        </div>
                    </div>
                    <div class="col-md-6" id="login-right">
                        <p>Nếu bạn chưa có tài khoản vui lòng chọn đăng ký!</p>
                        <a href="<?=base_url();?>dang-ky.html" class="btn btn-success no-radius"> <i class="fa fa-edit"></i> Đăng ký</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>