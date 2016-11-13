<?php 
$setting=$this->M_settings->get_item_slug('setting');
?>
<html>
    <head>
        <!--Meta tag-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href="<?=base_url();?>favicon.png" rel="shortcut icon" />
        <title><?=$title;?></title>
        <!-- for Google -->
        <meta name="description" content="<?=$description;?>" />
        <meta name="author" content="batdongsanflan.com.vn">
        <!-- for Facebook -->          
        <meta property="og:locale" content="vi_VN" />
        <meta property="og:title" content="<?=$title;?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?=isset($image)?$image:base_url().'asset/images/logo-batdongsanflan.png';?>" />
        <meta property="og:url" content="<?=current_url();?>" />
        <meta property="og:description" content="<?=$description;?>" />
        <meta property="og:site_name" content="batdongsanflan.com.vn" />
        <meta name="keywords" content="<?=isset($keywords)?$keywords:$title;?>">
        <!--Css-->
        <link rel="stylesheet" href="<?=base_url();?>asset/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="<?=base_url();?>asset/font-awesome-4.6.3/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="<?=base_url();?>asset/css/custom.css"/>
       <script src='https://www.google.com/recaptcha/api.js'></script>
       
        <script type="text/javascript">
            var base_url = '<?=base_url();?>';
        </script>
    </head>
    <body>
        <header>
            <nav id="nav-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 hidden-sm hidden-xs">
                            <div id="nav-top-form">
                                <form class="form-inline" method="post" action="" id="tim-nhanh">
                                    <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Nhập từ khóa">
                                    <select class="form-control" id="the-loai">
                                        <option value="nha-dat-ban">Nhà đất bán</option>
                                        <option value="nha-dat-cho-thue">Nhà đất cho thuê</option>
                                    </select>
                                    <button onclick="tim_kiem()">Tìm kiếm</button>
                                </form>
                            </div>
                        </div>
                        <!--End .col-6-->
                        <div class="col-md-5">
                            <ul id="nav-top-right">
                                <li><a href="<?=base_url();?>dang-tin-bat-dong-san.html"><i class="fa fa-edit"></i> Đăng tin</a></li>
                                <?php if(empty($account)){ ?>
                                <li><a href="<?=base_url();?>dang-nhap.html"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
                                <li><a href="<?=base_url();?>dang-ky.html"><i class="fa fa-key"></i> Đăng ký</a></li>
                                <?php }else{?>
                                <li><a href="<?=base_url();?>quan-ly-tin.html"><i class="fa fa-user"> </i> <?=$account['full_name'];?></a></li>
                                <li><a href="<?=base_url();?>dang-xuat.html"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
                                <?php }?>
                            </ul>
                        </div>
                        <!--End .col-6-->
                    </div>
                </div>
            </nav>
            <!--End nav-->
            <div id="logo-banner">
                <div class="container">
                    <div  class="row">
                        <div class="col-md-3" id="logo">
                            <a href="<?=base_url();?>" title="Bất động sản"><img src="<?=base_url();?>asset/images/logo-batdongsanflan.png" alt="logo batdongsanflan" /></a>
                            <a href="javascript:toggle_menu();" id="toggle-menu"><i class="fa fa-navicon"></i></a>
                        </div>
                        <!--ERnd .col-3-->
                        <div class="col-md-9 hidden-sm hidden-xs text-right" id="banner">
                            <a href="<?=$setting->banner_link;?>"><img src="<?=$setting->banner;?>" alt="banner-batdongsanflan"></a>
                        </div>
                        <!--End .col-9-->
                    </div>
                    <!--End .row-->
                </div>
                <!--End .container-->
            </div>
            <!--End #logo-banner-->
            <div id="menu-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="menu">
                                <li><a href="<?=base_url();?>"> <i class="fa fa-home hidden-sm hidden-xs"></i> Trang chủ</a></li>

                                <li>
                                    <a href="<?=base_url();?>nha-dat-ban.html"> Nhà đất bán</a>
                                    <ul class="sub-menu">
                                    <?php
                                    $input=array();
                                    $input['where']=array('type'=>1);
                                        $groups_1=$this->M_groups->get_list($input);
                                        foreach ($groups_1 as $row) {
                                            ?>
                                            <li><a href="<?=base_url().$row->slug;?>.html"><i class="fa fa-caret-right"></i> <?=$row->title;?></a></li>
                                            <?php
                                        }
                                    ?>
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>nha-dat-cho-thue.html"> Nhà đất cho thuê</a>
                                    <ul class="sub-menu">
                                    <?php
                                    $input=array();
                                    $input['where']=array('type'=>2);
                                        $groups_2=$this->M_groups->get_list($input);
                                        foreach ($groups_2 as $row) {
                                            ?>
                                            <li><a href="<?=base_url().$row->slug;?>.html"><i class="fa fa-caret-right"></i> <?=$row->title;?></a></li>
                                            <?php
                                        }
                                    ?>  
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>cam-nang-tu-van.html"> Cẩm nang - tư vấn</a>
                                    <ul class="sub-menu">
                                    
                                    <li><a href="<?=base_url();?>loi-khuyen.html"><i class="fa fa-caret-right"></i> Lời khuyên</a></li>
                                    <li><a href="<?=base_url();?>tu-van-luat.html"><i class="fa fa-caret-right"></i> Tư vấn luật</a></li>

                                    </ul>
                                </li>
                                <li><a href="<?=base_url();?>tin-tuc-du-an.html"> Tin tức dự án</a></li>
                                <li><a href="<?=base_url();?>site-map.html"> Sơ đồ site</a></li>
                                <li><a href="<?=base_url();?>huong-dan-su-dung.html"> Hướng dẫn sử dụng</a></li>
                            </ul>
                        </div>
                        <!--End .col-12-->
                    </div>
                    <!--End .row-->
                </div>
                <!--End .container-->
            </div>
        </header>
        <!--End header-->