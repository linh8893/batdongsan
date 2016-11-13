
                <div class="row hidden-xs hidden-md">
                    <div class="col-md-12">
                        <div class="siderbar-box">
                            <div class="page-header">
                                <h2><i class="fa fa-cube fa-spin fa-fw"></i> Lựa chọn</h2>
                            </div>
                            <!--End .page-header-->
                             <div class="siderbar-list">
                                 <ul class="list-item">
                                     <li><a href="<?=base_url();?>quan-ly-tin.html">Tin đã đăng</a></li>
                                     <li><a href="<?=base_url();?>thong-tin-tai-khoan.html">Thông tin tài khoản</a></li>
                                     <?php if($account['role']=='admin'){ ?>
                                        <li><a href="<?=base_url();?>admin"> Quản lý hệ thống</a></li>
                                        <?php
                                        } ;?>
                                     <li><a href="<?=base_url();?>dang-xuat.html">Đăng xuất</a></li>
                                 </ul>
                            </div>
                            <!--End .page-content-->
                        </div>
                    </div>
                </div>
                <!--End .siderbar-item-->
                