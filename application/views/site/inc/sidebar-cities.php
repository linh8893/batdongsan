
 <div class="row">
                    <div class="col-md-12">
                        <div class="siderbar-box">
                            <div class="page-header">
                                <h2><i class="fa fa-home"></i> Nhà đất bán</h2>
                            </div>
                            <!--End .page-header-->
                             <div class="siderbar-list">
                             <?php 
                             $input=array();
                             $input['where']=array('groups_type'=>1,'status'=>1);
                             $list_nav=$this->M_productions->get_list_nav_cities();
                            if(count($list_nav)==0){
                                echo "<br> <p>Dữ liệu đang cập nhật!</p>";
                            }
                             ?>
                                 <ul class="list-area">
                                     <?php foreach ($list_nav as $row) {
                                    ?>
                                     <li><a href="<?=base_url();?>nha-dat-ban-<?=$row->slug;?>.html"> <?=$row->name;?> <span>(<?=$row->count_bds;?>)</span></a></li>
                                     <?php }?>
                                 </ul>
                            </div>
                            <!--End .page-content-->
                        </div>
                    </div>
                </div>
                <!--End .nav-left-item-->