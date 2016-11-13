 <div class="row">
                    <div class="col-md-12">
                        <div class="siderbar-box">
                            <div class="page-header">
                                <h2><i class="fa fa-star"></i> CHỦ ĐỀ ĐƯỢC QUAN TÂM</h2>
                            </div>
                            <!--End .page-header-->
                             <div class="siderbar-list">
                             <?php 
                             $input=array();
                             $input['where']=array('status'=>1,'group'=>'chu-de');

                             $list_chu_de=$this->M_categories->get_list($input);
                            
                             ?>
                                 <ul class="list-area">
                                     <?php foreach ($list_chu_de as $row) {
                                         # code...
                                    ?>
                                     <li><a href="<?=base_url().'chu-de/'.$row->slug.'.html';?>"> <?=$row->title;?></a></li>
                                     <?php }?>
                                 </ul>
                            </div>
                            <!--End .page-content-->
                        </div>
                    </div>
                </div>
                <!--End .nav-left-item-->