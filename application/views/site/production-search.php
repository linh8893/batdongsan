<style>
#page .page-header#title-search h1{
    /* color: white; */
    background-color: white;
    color:#333333;
    padding-left: 0px; 
    padding-right: 15px;
}
#description{
    margin-bottom: 20px;
    font-size: 13px;
    font-weight: bold;
}
#description h3{
    margin: 0;
    line-height: 1.5em;
    font-size: 13px;
    font-weight: bold;
}
.value-search{
    color: #e94a02;
}
</style>
            <section id="page">
    <div class="container">
        <div class="row">
            <div class="col-md-4 hidden-sm hidden-xs" id="siderbar">
                <?php if(1){ ?>
               <?php include_once 'inc/sidebar-search.php';?>
               <?php include_once 'inc/sidebar-hot.php';?>
                <?php }?>
            </div>
            <!--End col-md-4-->
            <div class="col-md-8" id="page-right">
                 <div class="page-header" id="title-search">
                    <h1><?=$title;?></h1>
                </div>
                <!--End .page-header-->
                <div class="page-content">
                   <div  id="description">
                       <p><?=$tieu_chi;?></p>
                   </div>
                    <?php
                    $msg_post=$this->session->flashdata('msg_post');
                    if(empty($msg_post)==FALSE){ ?>
                    <div class="alert alert-<?=$msg_post['type'];?> no-radius">
                        <?=$msg_post['msg'];?> 
                     </div> 
                     <?php }?>
                    <?php 
                        foreach ($list as $row){
                            $address="";
                            $address_slug="";
                            if($row->projects_code!=0){
                                $tmp=$this->M_projects->get_item_code($row->projects_code);
                                $address=$tmp->type." ".$tmp->name;
                                $address_slug=$tmp->slug;
                            }else{
                                if($row->streets_code!=0){
                                    $tmp=$this->M_streets->get_item_code($row->streets_code);
                                    $address=$tmp->type." ".$tmp->name;
                                     $address_slug=$tmp->slug;
                                }else{
                                    if($row->wards_code!=0){
                                        $tmp=$this->M_wards->get_item_code($row->wards_code);
                                        $address=$tmp->type." ".$tmp->name;
                                         $address_slug=$tmp->slug;
                                    }
                                }
                            }
                            $group=$this->M_groups->get_item_slug($row->groups_code);
                            $district=$this->M_districts->get_item_code($row->districts_code);
                            $city=$this->M_cities->get_item_code($row->cities_code);
                            $unit=$this->M_units->get_item_code($row->units_code);
                            $direction=$this->M_directions->get_item_code($row->directions_code);
                            $price=$row->price." ".$unit->name;
                            if($row->price==0 || $unit->code==1){
                                $price="Thỏa thuận";
                            }
                            $slug=$group->slug;
                            if($row->thumbnail==""){
                                $row->thumbnail="thumbnail.png";
                            }
                            if($address_slug!=""){
                                $slug.='-'.$address_slug;
                            }
                        ?>
                    <div class="row list-item">
                        <div class="col-xs-12 list-item-title-xs hidden-sm hidden-md hidden-lg">
                            <h4 class="list-item-title"><a href="<?=base_url().$slug.'/'.$row->slug.'-msbds-'.$row->id;?>.html"><?=$row->title;?></a></h4>
                        </div>
                        <div class="col-xs-4 col-sm-3 col-md-3 list-item-thumbnail" >
                            <a href="<?=base_url().$slug.'/'.$row->slug.'-msbds-'.$row->id;?>.html"><img src="<?=base_url();?>asset/public/upload/thumbnail/<?=$row->thumbnail;?>" alt="thumbnail bất động sản" class="img-thumbnail"></a>
                        </div>
                        <div class="col-xs-8 col-sm-9 col-md-9 list-item-content">  
                            <h4 class="list-item-title hidden-xs"><a href="<?=base_url().$slug.'/'.$row->slug.'-msbds-'.$row->id;?>.html"><?=$row->title;?></a></h4>
                            <p class="list-item-time"><span style="width:100px; display: inline-block;" class="hidden-xs">Ngày đăng </span><i class="fa fa-calendar text-success hidden-sm hidden-lg hidden-md"></i> <b style="font-style: italic;"><?=date('d-m-Y',$row->public_time);?></b></p>
                            <p class="list-item-dien-tich"><span style="width:100px; display: inline-block;" class="hidden-xs">Mức giá </span><i class="fa fa-dollar text-success hidden-sm hidden-lg hidden-md"></i> <b style="font-style: italic;"><?=$price;?></b></p>
                            <p class="list-item-muc-gia"><span style="width:100px; display: inline-block;" class="hidden-xs">Diện tích </span><i class="fa fa-cube text-success hidden-sm hidden-lg hidden-md"></i> <b style="font-style: italic;"><?=$row->acreage;?> m<sup>2</sup></b></p>
                            <p class="list-item-dia-diem"><span style="width:100px; display: inline-block;" class="hidden-xs">Địa điểm </span><i class="fa fa-map-marker text-success hidden-sm hidden-lg hidden-md"></i> <b style="font-style: italic;" class="text-red"><?=$district->name;?> - <?=$city->name;?></b>
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
                <?php if(isset($pagination)){
                    echo $pagination;
                }?>
            </div>
            <!--End .col-md-9-->
        </div>
        <!--End .row-->
    </div>
    <!--End .container-->
</section>
<!--End #page-list-->