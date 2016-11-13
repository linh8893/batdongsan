
                <div class="row hidden-xs hidden-md">
                    <div class="col-md-12">
                        <div class="siderbar-box">
                            <div class="page-header">
                                <h2><i class="fa fa-link fa-spin fa-fw"></i> Bất động sản nổi bật</h2>
                            </div>
                            <!--End .page-header-->
                             <div class="siderbar-list">
                             <?php 
                             $list_nav_districts=$this->M_productions->get_list_nav_districts();
                             ?>
                                 <ul class="list-item">
                                     <?php foreach ($list_nav_districts as $row) {?>
                                     <li><a href=""><?=$row->name;?> </a></li>
                                     <?php }?>
                                 </ul>
                            </div>
                            <!--End .page-content-->
                        </div>
                    </div>
                </div>
                <!--End .siderbar-item-->
                