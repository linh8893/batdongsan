            
<section id="page">
    <div class="container">
        <div class="row">
            <div class="col-md-8" id="page-right">
                 <div class="page-header">
                    <h1><?=$title;?></h1>
                </div>
                <!--End .page-header-->
                <div class="page-content">
                    <?php
                    $msg_post=$this->session->flashdata('msg_post');
                    if(empty($msg_post)==FALSE){ ?>
                    <div class="alert alert-<?=$msg_post['type'];?> no-radius">
                        <?=$msg_post['msg'];?> 
                     </div> 
                     <?php }?>
                    <?php 
                    if(count($list)==0){
                        echo "<p>Đang cập nhật dữ liệu!</p>";
                    }
                    foreach ($list as $row){ ?>
                    
                    <div class="row list-item">
                        <div class="col-xs-12 list-item-title-xs hidden-sm hidden-md hidden-lg">
                            <h4 class="list-item-title"><a href="<?=base_url().$row->categories_slug.'/'.$row->slug.'-msp-'.$row->id;?>.html"><?=$row->title;?></a></h4>
                        </div>
                        <div class="col-xs-4 col-sm-3 col-md-3 list-item-thumbnail" >
                            <a href="<?=base_url().$row->categories_slug.'/'.$row->slug.'-msp-'.$row->id;?>.html">
                            <img src="<?=$row->thumbnail;?>" alt="thumbnail bất động sản" class="img-thumbnail">
                            </a>
                        </div>
                        <div class="col-xs-8 col-sm-9 col-md-9 list-item-content"> 
                        <p class="list-item-time"><i class="fa fa-calendar text-success"></i> <b style="font-style: italic;"><?=date('d-m-Y',$row->create_time);?></b>
                        </p> 
                            <h4 class="list-item-title hidden-xs"><a href="<?=base_url().$row->categories_slug.'/'.$row->slug.'-msp-'.$row->id;?>.html"><?=$row->title;?></a></h4>
                            <p class="list-item-dia-diem">
                            <?=$row->description;?>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <hr class="soften" />
                        </div>
                    </div>
                    <!--End #list-item-->
                    <?php }
                    ?>
                </div>
                <!--End .page-content-->
                 <?php if(isset($pagination)){
                    echo $pagination;
                }
                ?>
            </div>
            <!--End .col-md-9-->
            <div class="col-md-4 hidden-sm hidden-xs" id="siderbar">
               <?php include_once 'inc/sidebar-search.php';?>
               <?php include_once 'inc/sidebar-chu-de.php';?>
            </div>
            <!--End col-md-4-->
        </div>
        <!--End .row-->
    </div>
    <!--End .container-->
</section>
<!--End #page-list-->