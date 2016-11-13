<?php

$address="";
$address_slug="";
if($item->projects_code!=0){
    $tmp=$this->M_projects->get_item_code($item->projects_code);
    $address=$tmp->type." ".$tmp->name;
    $address_slug=$tmp->slug;
}else{
    if($item->streets_code!=0){
        $tmp=$this->M_streets->get_item_code($item->streets_code);
        $address=$tmp->type." ".$tmp->name;
         $address_slug=$tmp->slug;
    }else{
        if($item->wards_code!=0){
            $tmp=$this->M_wards->get_item_code($item->wards_code);
            $address=$tmp->type." ".$tmp->name;
             $address_slug=$tmp->slug;
        }
    }
}
$group=$this->M_groups->get_item_slug($item->groups_code);
$district=$this->M_districts->get_item_code($item->districts_code);
$city=$this->M_cities->get_item_code($item->cities_code);
$unit=$this->M_units->get_item_code($item->units_code);
$direction_1=$this->M_directions->get_item_code($item->directions_code);
$price=$item->price." ".$unit->name;
if($item->price==0 || $unit->code==1){
    $price="Thỏa thuận";
}
$slug=$group->slug;
if($address_slug!=""){
    $slug.='-'.$address_slug;
}
$url=base_url().$slug.'/'.$item->slug.'-msbds-'.$item->id.'.html';
?>
<section id="page">
    <div class="container">
        <div class="row">
            <div class="col-md-4 hidden-sm hidden-xs" id="siderbar">
                <?php include_once 'inc/sidebar-search.php';?>
                <?php include_once 'inc/sidebar-new.php';?>
                <?php include_once 'inc/sidebar-new.php';?>
            </div>
            <!--End col-md-4-->
            <div class="col-md-8" id="page-right">
                    <!--End .page-header-->
                    <div class="post-header">
                        <div class="post-title">
                            <h1><?=$title;?></h1>
                        </div>
                        <div class="post-extend-link">
                            <a class="facebook" style="background-color: #3b5998;" href="https://www.facebook.com/sharer/sharer.php?u=<?=$url;?>" target="_blank" title="Chia sẻ Facebook"><i class="fa fa-facebook"></i></a>
                            <a class="google" style="background-color: #D5452E;" href="https://plus.google.com/share?url=<?=$url;?>" target="_blank" title="Chia sẻ Google"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                    <div class="page-content">
                        <p><b>Vị trí: </b>
                        <b style="color: #6898D0;"><?=$address;?> </b>
                        </p>
                        <p><b>Giá: </b><b style="color: #6898D0;"><?=$price;?></b></p>
                        <p style="margin-bottom: 0;"><b>Diện tích: </b><b style="color: #6898D0;"><?=$item->acreage;?> m<sup>2</sup></b></p>
                        <p style="white-space: pre-line;">
                            <?=$item->content;?>
                        </p>
                         
                    </div>
                    <?php 
                        $input=array();
                        $input['where']=array('production_id'=>$item->id);
                        $images=$this->M_images->get_list($input); 
                        if(count($images)>0){
                        ?>
                    <div class="page-header">
                        <h2><i class="fa fa-plus-circle"></i> Hình ảnh</h2>
                    </div>
                    <div class="page-content">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                            <?php 
                            $i=0;
                            foreach ($images as $row) {
                                
                                                    ?>
                                                    <li data-target="#myCarousel" data-slide-to="<?=$i;?>" class="<?=$i==0?'active':'';?>"></li>
                                                    <?php
                                                    $i++;
                                                } ?>
                              
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                            <?php $j=0; foreach ($images as $row) { 
                                                    ?>
                                                    <div class="item <?=$j==0?'active':'';?>">
                                <img src="<?=base_url();?>asset/public/upload/<?=$row->name;?>" alt="Chania" width="460" height="345">
                              </div>
                                                    <?php
                                                    $j++;
                                                } ?>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                              <span class="sr-only">Trước</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                              <span class="sr-only">Sau</span>
                            </a>
                        </div>
                    </div>
                    <?php }?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="page-header">
                                <h2><i class="fa fa-plus-circle"></i> Thông tin bất động sản</h2>
                            </div>
                            <div class="page-content">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td style="width: 40%;">Mã số</td>
                                            <td style="width: 70%;"><b style="color: #0286D0;"><?=$item->id;?><b></td>
                                        </tr>
                                        <?php if($item->frontside>0){ ?>
                                        <tr>
                                            <td>Mặt tiền</td>
                                            <td><?=$item->frontside;?> m</td>
                                        </tr>
                                        <?php }?>
                                        <?php if($item->frontside>0){ ?>
                                        <tr>
                                            <td>Đường vào</td>
                                            <td><?=$item->backside;?> m</td>
                                        </tr>
                                        <?php }?>
                                        <?php if($item->floor>0){ ?>
                                        <tr>
                                            <td>Số tầng</td>
                                            <td><?=$item->floor;?> </td>
                                        </tr>
                                        <?php }?>
                                        <?php if($item->room>0){ ?>
                                        <tr>
                                            <td>Số phòng</td>
                                            <td><?=$item->room;?> </td>
                                        </tr>
                                        <?php }?>
                                        <?php if($item->toilet>0){ ?>
                                        <tr>
                                            <td>Số toilet</td>
                                            <td><?=$item->toilet;?> </td>
                                        </tr>
                                        <?php }?>
                                        
                                        <tr>
                                            <td>Hướng nhà</td>
                                            <td>
                                            <?php
                                                if(!$direction_1){
                                                    echo "Không xác định";
                                                }else{
                                                    echo $direction_1->name;
                                                }
                                                ?>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ngày đăng tin</td>
                                            <td><?=date('d-m-Y',$item->public_time);?></td>
                                        </tr>
                                        <tr>
                                            <td>Ngày hết hạn</td>
                                            <td><?=date('d-m-Y',$item->exp_time);?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="page-header">
                                <h2><i class="fa fa-plus-circle"></i> Thông tin liên hệ</h2>
                            </div>
                            <div class="page-content">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td style="width: 40%;">Tên liên lạc</td>
                                            <td style="width: 70%;"><?=$item->author_name;?></td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td><?=$item->author_address;?></td>
                                        </tr>
                                        <tr>
                                            <td>Điện thoại</td>
                                            <td><?=$item->author_phone;?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?=$item->author_email;?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End .row-->
                    
            </div>
            <!--End .col-md-9-->
        </div>
        <!--End .item-->
    </div>
    <!--End .container-->
</section>
<!--End #page-list-->
