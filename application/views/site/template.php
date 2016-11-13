<html>
    <head>
        <title><?=$title;?></title>
        <link href="favicon.png" rel="shortcut icon" />
        <meta name="description" content="<?=$description;?>" />
        
        <link rel="stylesheet" href="<?=base_url();?>asset/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?=base_url();?>asset/font-awesome-4.6.3/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="<?=base_url();?>asset/css/custom.css"/>
    </head>
    <body>
        <header>
            <nav id="nav-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 hidden-sm hidden-xs">
                            <div id="nav-top-form">
                                <form class="form-inline" method="get">
                                    <input type="text" class="form-control" placeholder="Nhập từ khóa">
                                    <select class="form-control">
                                        <option>Nhà đất bán</option>
                                    </select>
                                    <button>Tìm kiếm</button>
                                </form>
                            </div>
                        </div>
                        <!--End .col-6-->
                        <div class="col-md-5">
                            <ul id="nav-top-right">
                                <li><a href="#"><i class="fa fa-edit"></i> Đăng tin</a></li>
                                <li><a href="#"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
                                <li><a href="#"><i class="fa fa-key"></i> Đăng ký</a></li>
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
                            <a href="#" id="toggle-menu"><i class="fa fa-navicon"></i></a>
                        </div>
                        <!--ERnd .col-3-->
                        <div class="col-md-9 hidden-sm hidden-xs text-right" id="banner">
                            <a href="#"><img src="<?=base_url();?>asset/images/banner-batdongsanflan-4.png" alt="banner-batdongsanflan"></a>
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
                                <li><a href="#"> <i class="fa fa-home hidden-sm hidden-xs"></i> Trang chủ</a></li>
                                <li>
                                    <a href="#"> Nhà đất bán</a>
                                    <ul class="sub-menu">
                                        <li><a href="#"><i class="fa fa-caret-right"></i> Bán căn hộ chung cư</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"></i> Bán căn hộ chung cư</a></li>
                                        <li>
                                            <a href="#"><i class="fa fa-caret-right"></i> Bán căn hộ chung cư</a>
                                            <ul class="sub-menu-end">
                                                <li><a href="#"> Bán căn hộ chung cư</a></li>
                                                <li><a href="#"> Bán căn hộ chung cư</a></li>
                                                <li><a href="#"> Bán căn hộ chung cư</a></li>
                                                <li><a href="#"> Bán căn hộ chung cư</a></li>
                                               
                                            </ul>
                                        
                                        </li>
                                        <li><a href="#"><i class="fa fa-caret-right"></i> Bán căn hộ chung cư</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"></i> Bán căn hộ chung cư</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"></i> Bán căn hộ chung cư</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"> Nhà đất cho thuê</a></li>
                                <li><a href="#"> Cẩm nang - tư vấn</a></li>
                                <li><a href="#"> Danh mục nhà đất</a></li>
                                <li><a href="#"> Hướng dẫn sử dụng</a></li>
                                
                                <li class="menu-extend" id="li-dang-tin"><a href="#"> Đăng tin</a></li>
                                <li class="menu-extend" id="li-dang-nhap"><a href="#"> Đăng nhập</a></li>
                                <li class="menu-extend" id="li-dang-ky"><a href="#"> Đăng ký</a></li>
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
        <div id="main">
            <section id="home-search-from">
                <form action="" method="post">
                    <div class="container">
                        <div class="row">
                            <div  id="header-form-search">
                                <a href="#" class="active">Bất động sản bán</a>
                                <a href="#">Bất động sả cho thuê</a>
                            </div>
                        </div>
                        <!--End .row-->
                    </div>
                    <!--End .container--> 
                    <div class="container" id="content-form-search">    
                        <div class="row">
                            <div class="col-sx-12 col-sm-6 col-md-2">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>--Chọn loại nhà đất--</option>
                                        <option>Bán trang trại, Khu nghỉ dưỡng</option>
                                    </select>
                                </div>
                            </div>
                            <!--End .col-3-->
                            <div class="col-sx-12 col-sm-6 col-md-2">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>--Tỉnh / Thành phố--</option>
                                        <option>Bán trang trại, Khu nghỉ dưỡng</option>
                                    </select>
                                </div>
                            </div>
                            <!--End .col-3-->
                            <div class="col-sx-12 col-sm-6  col-md-2">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>--Quận / Huyện--</option>
                                    </select>
                                </div>
                            </div>
                            <!--End .col-3-->
                            <div class="col-sx-12 col-sm-6 col-md-2">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>--Phường / Xã--</option>
                                    </select>
                                </div>
                            </div>
                            <!--End .col-3-->
                            <div class="col-sx-12 col-sm-6 col-md-2">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>--Đường phố--</option>
                                    </select>
                                </div>
                            </div>
                            <!--End .col-3-->
                            <div class="col-sx-12 col-sm-6 col-md-2 search-hidden">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>--Diện tích--</option>
                                    </select>
                                </div>
                            </div>
                            <!--End .col-3-->
                        </div>
                        <!--End .row-->
                        <div class="row " >
                            <div class="col-sx-12 col-sm-6 col-md-2 search-hidden">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>--Mức giá--</option>
                                        <option>Bán trang trại, Khu nghỉ dưỡng</option>
                                    </select>
                                </div>
                            </div>
                            <!--End .col-3-->
                            <div class="col-sx-12 col-sm-6 col-md-2 search-hidden">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>--Dự án--</option>
                                        <option>Bán trang trại, Khu nghỉ dưỡng</option>
                                    </select>
                                </div>
                            </div>
                            <!--End .col-3-->
                            <div class="col-sx-12 col-sm-6 col-md-2 search-hidden">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>--Phòng ngủ--</option>
                                    </select>
                                </div>
                            </div>
                            <!--End .col-3-->
                            <div class="col-sx-12 col-sm-6 col-md-2 search-hidden">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>--Hướng nhà--</option>
                                    </select>
                                </div>
                            </div>
                            <!--End .col-3-->
                            <div class="col-sx-12 col-sm-12 col-md-2">
                                <button id="btn-submit" class="btn"><i class="fa fa-search"></i> Tìm bất động sản</button>
                            </div>
                            <!--End .col-3-->
                        </div>
                        <!--End .row-->
                    </div>
                    <!--End .container-->
                </form>
            </section>
            <section id="page">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 hidden-sm hidden-xs" id="siderbar">
                            <div class="row siderbar-box">
                                <div class="col-md-12">
                                    <div class="page-header">
                                        <h2><i class="fa fa-home"></i> Nhà đất bán</h2>
                                    </div>
                                    <!--End .page-header-->
                                     <div class="siderbar-list">
                                         <ul class="list-area">
                                             <?php for($i=0;$i<8;$i++){ ?>
                                             <li><a href=""> Hồ Chí Minh <span>(123.456)</span></a></li>
                                             <li><a href=""> Hà Nội <span>(123.456)</span></a></li>
                                             <li><a href=""> Hải Phòng <span>(123.456)</span></a></li>
                                             <li><a href=""> Đà Nẵng <span>(123.456)</span></a></li>
                                             <?php }?>
                                         </ul>
                                    </div>
                                    <!--End .page-content-->
                                </div>
                            </div>
                            <!--End .nav-left-item-->
                            <div class="row siderbar-box hidden-xs hidden-md">
                                <div class="col-md-12">
                                    <div class="page-header">
                                        <h2><i class="fa fa-link fa-spin fa-fw"></i> Bất động sản nổi bật</h2>
                                    </div>
                                    <!--End .page-header-->
                                     <div class="siderbar-list">
                                         <ul class="list-item">
                                             <?php for($i=0;$i<4;$i++){ ?>
                                             <li><a href=""> Bán nhà mặt tiền tại Quận 1 </a></li>
                                             <li><a href=""> Bán nhà mặt tiền tại Quận 2 </a></li>
                                             <li><a href=""> Bán nhà mặt tiền tại Quận 3 </a></li>
                                             <li><a href=""> Bán nhà mặt tiền tại Quận 4 </a></li>
                                             <?php }?>
                                         </ul>
                                    </div>
                                    <!--End .page-content-->
                                </div>
                            </div>
                            <!--End .siderbar-item-->
                            <div class="row siderbar-box hidden-xs hidden-md">
                                <div class="col-md-12">
                                    <div class="page-header">
                                        <h2><i class="fa fa-link fa-spin fa-fw"></i> Bất động sản nổi bật</h2>
                                    </div>
                                    <!--End .page-header-->
                                     <div class="siderbar-list">
                                         <ul class="list-post">
                                             <?php for($i=0;$i<5;$i++){ ?>
                                             <li>
                                                 <a href="#" class="title-bold">Bán nhà mặt phố tại quận Hà Đông</a>
                                                 <div class="row">
                                                     <div class="col-1 col-md-5">
                                                         <a href="#"><img src="<?=base_url();?>asset/images/item-bds-<?=$i+1;?>.jpg" alt="thumbnail bất động sản" class="thumbnail"></a>
                                                     </div>
                                                     <div class="col-2 col-md-7">
                                                         <p>Giá: <span class="text-blue"> 100 triệu</span></p>
                                                         <p>Diện tích: <span class="text-blue">123 m<sup>2</sup></span></p>
                                                         <p>Khu vực: <span class="text-red">Quận Ba Đình - Hà Nội</span></p>
                                                     </div>
                                                 </div>
                                             </li>
                                             <?php }?>
                                         </ul>
                                    </div>
                                    <!--End .page-content-->
                                </div>
                            </div>
                            <!--End .siderbar-item-->
                        </div>
                        <!--End col-md-4-->
                        <div class="col-md-9" id="page-right">
                             <div class="page-header">
                                <h1>Tin bất động sản</h1>
                            </div>
                            <!--End .page-header-->
                            <div class="page-content">
                                <?php for($i=0;$i<10;$i++){ ?>
                                <div class="row list-item">
                                    <div class="col-xs-12 list-item-title-xs hidden-sm hidden-md hidden-lg">
                                        <h4 class="list-item-title"><a href="#">Bán Nhà Hẻm Xe Hơi Quận 10, Lý Thái Tổ P9 DT 5.9x11 Giá 4.5 Tỷ</a></h4>
                                    </div>
                                    <div class="col-xs-4 col-sm-3 col-md-3 list-item-thumbnail" >
                                        <a href="#"><img src="<?=base_url();?>asset/images/item-bds-<?=$i+1;?>.jpg" alt="thumbnail bất động sản" class="img-thumbnail"></a>
                                    </div>
                                    <div class="col-xs-8 col-sm-9 col-md-9 list-item-content">  
                                        <h4 class="list-item-title hidden-xs"><a href="#">Bán Nhà Hẻm Xe Hơi Quận 10, Lý Thái Tổ P9 DT 5.9x11 Giá 4.5 Tỷ</a></h4>
                                        <p class="list-item-time"><span style="width:100px; display: inline-block;" class="hidden-xs">Ngày đăng </span><i class="fa fa-calendar text-success hidden-sm hidden-lg hidden-md"></i> <b style="font-style: italic;">18-07-2016</b></p>
                                        <p class="list-item-dien-tich"><span style="width:100px; display: inline-block;" class="hidden-xs">Mức giá </span><i class="fa fa-dollar text-success hidden-sm hidden-lg hidden-md"></i> <b style="font-style: italic;">4.5 tỷ</b></p>
                                        <p class="list-item-muc-gia"><span style="width:100px; display: inline-block;" class="hidden-xs">Diện tích </span><i class="fa fa-cube text-success hidden-sm hidden-lg hidden-md"></i> <b style="font-style: italic;">64.9 m<sup>2</sup></b></p>
                                        <p class="list-item-dia-diem"><span style="width:100px; display: inline-block;" class="hidden-xs">Địa điểm </span><i class="fa fa-map-marker text-success hidden-sm hidden-lg hidden-md"></i> <b style="font-style: italic;" class="text-red">Quận 19 - Hồ Chí Minh</b>
                                        </p>
                                        

                                    </div>
                                    <div class="col-md-12">
                                        <hr class="soften" />
                                    </div>
                                </div>
                                <!--End #list-item-->
                                <?php }?>
                            </div>
                            <!--End .page-content-->
                            <div class="pagination-lp">
                                <ul>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">Trang đầu</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--End .col-md-9-->
                    </div>
                    <!--End .row-->
                </div>
                <!--End .container-->
            </section>
            <!--End #page-list-->
        </div>
        <!--End #main-->
        <footer>
            <div id="company-info">
                <div class="container">
                    <div class="row">
                        <div class="hidden-xs hidden-sm col-md-3">
                            <div class="logo-footer">
                                <img src="<?=base_url();?>asset/images/logo-footer-batdongsanflan.png" alt="logo-footer-batdongsanflan">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                           <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                           <g:plusone></g:plusone>
                           <p>Email: contact@batdongsanflan.com.vn</p>
                           <p>Điện thoại: 01234566789 | Skype: batdongsaflan | Yahoo: batdongsanflan</p>
                           <p>Tầng 17 tòa nhà BIG C Hồ Gươm, Hà Đông, Hà Nội</p>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div id="footer-extend">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p><i class="fa fa-copyright"></i> 2016 <span class="hidden-sm hidden-xs">Copyright by  batdongsanflan.com.vn </span>. Design by <a href="">MT-SOFT</a> </p>
                        </div>
                        <div class="col-md-6 hidden-sm hidden-xs">
                            <ul>
                                <li><a href="#">Liên kết website</a></li>
                                <li><a href="#">Liên kết website</a></li>
                                <li><a href="#">Liên kết website</a></li>
                                <li><a href="#">Liên kết website</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--End footer-->
        
        <!--Jquery-->
        <script src="<?=base_url();?>asset/js/jquery.js"></script>
        <script type="text/javascript" src="<?=base_url();?>asset/js/bootstrap.min.js"></script>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
        <script type="text/javascript" src="<?=base_url();?>asset/js/script.js"></script>
    </body>
</html>
