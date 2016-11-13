 <div class="row">
                    <div class="col-md-12">
                        <div class="siderbar-box">
                            <div class="page-header">
                                <h2><i class="fa fa-star"></i> Bài viết  cùng chủ để</h2>
                            </div>
                            <!--End .page-header-->
                             <div class="siderbar-list">
                                 <ul class="list-area">
                                     <?php foreach ($list_bai as $row) {
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