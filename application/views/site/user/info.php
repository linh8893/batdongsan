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
    #form-login h2{
        font-size: 14px;
        font-weight: bold;
        display: inline-block;
        
        margin-top: 0;
        text-transform: uppercase;
    }
    .form-horizontal .control-label{
        text-align: left;
    }
</style>
<section id="page">
<div class="container">
    <div class="row" >
            <div class="col-md-3 hidden-sm hidden-xs" id="siderbar">
               <?php include_once 'inc/sidebar-user.php';?>
            </div>
            <!--End col-md-4-->
        <div class="col-md-8 " id="form-login">
            <form class="form-horizontal" method="post">
                <div class="row" id="login-header">
                    <div class="hidden-sm hidden-xs  col-md-4" id="logo-login">
                        <img src="<?=base_url();?>asset/images/register.png">
                    </div>
                    <div class="col-md-8" id="title-login">
                        <h1>Thông tin thành viên</h1>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                <?=$this->session->flashdata('msg_admin');?>
                    <div class="col-md-6" id="login-left">
                        <h2><i class="fa fa-plus-circle"></i> Thông tin cá nhân</h2>
                        <div class="form-group">
                            <label class="control-label col-sm-3 " for="email">Họ và tên</label>
                            <div class="col-sm-9">
                              <input class="form-control no-radius" name="full_name" value="<?=set_value('full_name')==""?$item->full_name:set_value('full_name');?>">
                    <div class="error"><?=form_error('full_name');?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 " for="email">Email:</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control no-radius" name="email" value="<?=set_value('email')==""?$item->email:set_value('email');?>">
                    <div class="error"><?=form_error('email');?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 " for="email">Điện thoại:</label>
                            <div class="col-sm-9">
                              <input class="form-control no-radius" name="phone" value="<?=set_value('phone')==""?$item->phone:set_value('phone');?>">
                    <div class="error"><?=form_error('phone');?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 " for="email">Mật khẩu:</label>
                            <div class="col-sm-9">
                               <input type="password" class="form-control no-radius" name="password" value="<?=set_value('password')==""?$item->password:set_value('password');?>">
                    <div class="error"><?=form_error('password');?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 " for="email">Nhập lại MK:</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control no-radius" name="password_again" value="<?=set_value('password_again')==""?$item->password:set_value('password_again');?>">
                    <div class="error"><?=form_error('password_again');?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 " for="email">Địa chỉ:</label>
                            <div class="col-sm-9">
                              <input class="form-control no-radius" name="address" value="<?=set_value('address')==""?$item->address:set_value('address');?>">
                    <div class="error"><?=form_error('address');?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" id="login-right">
                        <h2><i class="fa fa-plus-circle"></i> Mạng xã hội</h2>
                        <div class="form-group">
                            <label class="control-label col-sm-3 " for="email">Zalo:</label>
                            <div class="col-sm-9">
                              <input class="form-control no-radius" name="zalo" value="<?=set_value('zalo')==""?$item->zalo:set_value('zalo');?>">
                    <div class="error"><?=form_error('zalo');?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 " for="email">Facebook:</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control no-radius" name="facebook" value="<?=set_value('facebook')==""?$item->facebook:set_value('facebook');?>">
                    <div class="error"><?=form_error('facebook');?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 " for="email">Skype:</label>
                            <div class="col-sm-9">
                               <input class="form-control no-radius" name="skype" value="<?=set_value('skype')==""?$item->skype:set_value('skype');?>">
                                <div class="error"><?=form_error('skype');?></div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <button type="submit" class="btn btn-primary no-radius"><i class="fa fa-user-plus"></i> Đăng ký</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</section>