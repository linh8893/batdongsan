<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập hệ thống - Pareto.vn</title>
            <!-- Bootstrap Core CSS -->
        <link href="<?=base_url();?>asset/admin/inc/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?=base_url();?>asset/admin/inc/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?=base_url();?>/asset/admin/css/login.css">
</head>
<body>
    <header>
        <nav id="login-nav">
            <div id="logo-img">
                <i class="fa fa-codepen"></i>
            </div>
            <div id="logo-title">
                <h1>HỆ QUẢN TRỊ NỘI DUNG WEBSITE </h1>
                <p>Xây dựng và Phát triển bởi <a href="#">MT-SOFT</a> </p>
            </div>
        </nav>
    </header>
    <div id="main">
        <?=$this->session->flashdata('msg_admin');?>
        <div id="login-form">
            <div class="login-header">
            </div>
            <div class="login-content">
                <form method="post">
                    <div class="row">
                        <span>Email</span>
                        <input type="email" name="email" value="<?=set_value('email');?>">
                        <div class="error"><?=form_error('email');?></div>
                    </div>
                    <div class="row">
                        <span>Mật khẩu</span>
                        <input type="password"  name="password">
                        <div class="error"><?=form_error('password');?></div>
                    </div>
                    <div class="row ">
                        <button type="submit">Đăng nhập</button>
                    </div>
                    
                </form>
            </div>
            <div class="login-footer">
            </div>
            <!--
            <div id="content">
                <div id="content-login">
                    
                </div>
            </div>
            -->
        </div>
    </div>
    <script src="<?=base_url();?>asset/admin/inc/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>asset/admin/inc/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
