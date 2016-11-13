<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Phạm Văn Lỉnh 8-2016">
    <title><?=$title;?></title>
    <link href="<?=base_url();?>/asset/admin/images/favicon.gif" rel="shortcut icon" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url();?>asset/admin/inc/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url();?>asset/admin/inc/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url();?>asset/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?=base_url();?>asset/admin/inc/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url();?>asset/admin/inc/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
    <!-- DataTables CSS -->
    
    <link href="<?=base_url();?>asset/admin/inc/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    
    <?php if(isset($style)){echo $style;} ?>
    <link href="<?=base_url();?>asset/admin/css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        var base_url="<?=base_url();?>";
        var url_root="http://localhost/";
    </script>
</head>

<body>
    <?php $account=$this->session->userdata('account');?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">CMS QUẢN TRỊ HỆ THỐNG</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url('admin/dashboard');?>"><i class="fa fa-codepen"></i> QUẢN TRỊ HỆ THỐNG</a>  
                <a href="javascript:toggle_sidebar();" class="navbar-brand hidden-sm hidden-xs"><i class="fa fa-navicon"></i></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li><a target="_blank" href="<?=base_url();?>"><i class="fa fa-desktop"></i> Xem site</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?=$account['full_name'];?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?=base_url();?>admin/users/edit/<?=$account['id'];?>"><i class="fa fa-edit fa-fw"></i> Thông tin tài khoản</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?=base_url();?>admin/login/sign_out"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar " role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search text-center">
                            
                            <img id="logo-admin" src="<?=base_url()."asset/admin/images/logo.png";?>">
                        </li>
                        <li>
                            <a href="<?=base_url('admin/dashboard');?>"><i class="fa fa-dashboard fa-fw"></i> Tổng quan hệ thống</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-cubes fa-fw"></i> Tin bất động sản<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=base_url();?>admin/productions"> Danh sách tin mới đăng </a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>admin/groups"> Nhóm tin</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Quản lý bài viết<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=base_url();?>admin/posts"> Danh sách bài viết </a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>admin/posts/create"> Thêm bài viết</a>
                                </li>
                                 <li>
                                    <a href="<?=base_url();?>admin/categories"> Chuyên mục</a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>admin/categories/create"> Thêm chuyên mục</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Quản lý người dùng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=base_url();?>admin/users"> Tất cả người dùng</a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>admin/users/create">Thêm mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-gavel fa-fw"></i> Vai trò & Quyền hạn<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=base_url();?>admin/roles"> Tất cả vai trò & quyền hạn</a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>admin/roles/create"> Thêm mới </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-map-marker fa-fw"></i> Dữ liệu địa chính<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=base_url();?>admin/cities"> Tỉnh / Thành phố </a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>admin/districts"> Quận / Huyện </a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>admin/wards"> Phường / Xã</a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>admin/streets"> Đường / Phố</a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>admin/projects"> Dự án</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-globe fa-fw"></i> Dữ liệu dùng chung <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    
                                </li>
                                <li>
                                    <a href="<?=base_url();?>admin/units"> Đơn vị </a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>admin/directions"> Hướng nhà </a>
                                </li>
                                
                                <li>
                                    <a href="<?=base_url();?>admin/acreages"> Diện tích </a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>admin/prices"> Mức giá </a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?=base_url();?>admin/seo"><i class="fa fa-line-chart fa-fw"></i> SEO page </a>
                        </li>
                        <li>
                            <a href="<?=base_url();?>admin/settings"><i class="fa fa-cogs  fa-fw"></i> Cấu hình chung </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper" >
            <div class="row"> 
                <?=$this->session->flashdata('msg_admin');?>
            </div>
           <?php require_once ($template.".php");?>
           <?php 
            $msg_local=$this->session->flashdata('msg_local');
            if(!empty($msg_local)) { ?>
            <div class="row">
                <div class="alert alert-info">
                    <strong>Chú ý!</strong> <?=$this->session->flashdata('msg_local');?>.
                </div>
            </div>
            <?php }?>
          <!--Chèn row content-->
        </div>
        <!-- /#page-wrapper -->
        <footer>
            <span><i class=" fa fa-copyright"></i> 2016 - Bản quyền thuộc về <a href="http://minhthanhsoft.com"><i class="fa fa-codepen"></i> Minh Thành Software</a></span>
        </footer>
    </div>
    <!-- Modal -->
    <div id="modal-remove" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Xác nhận thao tác</h4>
          </div>
          <div class="modal-body">
            <p>Bạn có đồng ý thực hiện thao tác này</p>
          </div>
          <div class="modal-footer">
                <a id="btn-action" href="#" class="btn btn-primary no-radius" ><i class="fa fa-save"></i> Thực hiện</a>
                <button type="button" class="btn btn-danger no-radius" data-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
          </div>
        </div>

      </div>
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?=base_url();?>asset/admin/inc/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>asset/admin/inc/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url();?>asset/admin/inc/metisMenu/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="<?=base_url();?>asset/admin/inc/raphael/raphael.min.js"></script>
    <script src="<?=base_url();?>asset/admin/inc/morrisjs/morris.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url();?>asset/admin/dist/js/sb-admin-2.js"></script>
    <!-- DataTables JavaScript -->
    
    <script src="<?=base_url();?>asset/admin/inc/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>asset/admin/inc/datatables-plugins/dataTables.bootstrap.min.js"></script>
    
    <?php if(isset($script)){echo $script;} ?>
    <script src="<?=base_url();?>asset/admin/js/script.js"></script>
    <script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            responsive: false
        });
    });
    </script>
</body>
</html>
