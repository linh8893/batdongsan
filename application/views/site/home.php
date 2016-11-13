<?php if(1) {?>
<section id="home-search-from">
    <form action="" data-slug="nha-dat-ban" method="post" id="form-search">
        <div class="container">
            <div class="row">
                <div  id="header-form-search">
                    <?php if(1){ ?>
                    <a href="#" class="active" id="groups_1" onclick="change_groups('1')">Bất động sản bán</a>
                    <a href="#" id="groups_2" onclick="change_groups('2')">Bất động sản cho thuê</a>
                    <?php }?>
                </div>
            </div>
            <!--End .row-->
        </div>
        <!--End .container--> 
        <div class="container" id="content-form-search">    
            <div class="row">
                <div class="col-sx-12 col-sm-6 col-md-2">
                    <div class="form-group">
                        <select class="form-control no-radius" name="groups_code" id="groups_code">
                                <?php
                                $input=array();
                                $input['where']=array('status'=>1,'type'=>1);
                                $groups=$this->M_groups->get_list($input);
                                echo '<option  value="" data-slug="" >-- Chọn loại nhà đất --</option>';
                                if(set_value("groups_type")==2){
                                    $input['where']=array('status'=>1,'type'=>2);
                                    $groups=$this->M_groups->get_list($input);
                                    foreach ($groups as $row){
                                        if(set_value("groups_code")==$row->slug){
                                            echo '<option selected data-slug="'.$row->slug.'"   value="'.$row->slug.'" >'.$row->title.'</option>';
                                        }else{
                                            echo '<option  data-slug="'.$row->slug.'" value="'.$row->slug.'" >'.$row->title.'</option>';
                                        }
                                    }
                                }
                                else{
                                    foreach ($groups as $row){
                                        if(set_value("groups_code")==$row->slug){
                                            echo '<option selected data-slug="'.$row->slug.'"  value="'.$row->slug.'" >'.$row->title.'</option>';
                                        }else{
                                            echo '<option data-slug="'.$row->slug.'"  value="'.$row->slug.'" >'.$row->title.'</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                    </div>
                </div>
                <!--End .col-3-->
                <div class="col-sx-12 col-sm-6 col-md-2">
                    <div class="form-group">
                        <select class="form-control no-radius" name="cities" id="cities" onchange="change_cities()">
                                <?php 
                                echo '<option  value="" data-slug="" >-- Chọn tỉnh / thành phố --</option>';
                                $input1=array();
                                $input1['where']=array('status'=>1);
                                $input1['order']=array('order_index','ASC');
                                $cities=$this->M_cities->get_list($input1);
                                foreach ($cities as $row){
                                    if(set_value('cities')==$row->code){
                                        echo '<option selected data-slug="'.$row->slug.'"  value="'.$row->code.'" >'.$row->name.'</option>';
                                    }
                                    else{
                                        echo '<option  data-slug="'.$row->slug.'"  value="'.$row->code.'" >'.$row->name.'</option>';
                                    }
                                }?>
                            </select>
                    </div>
                </div>
                <!--End .col-3-->
                <div class="col-sx-12 col-sm-6  col-md-2">
                    <div class="form-group">
                        <select class="form-control no-radius" name="districts" onchange="change_districts()" id="districts">
                                <?php 
                                echo '<option  value="" data-slug="" >-- Chọn quận / huyện --</option>';
                                if(set_value("cities")!=""){
                                    $input=array();
                                    $input['where']=array('cities_code'=>set_value("cities"));
                                    $input['order']=array('order_index','ASC');
                                    $districts=$this->M_districts->get_list($input);
                                    foreach ($districts as $row){
                                        if(set_value('districts')==$row->code){
                                            echo '<option selected data-slug="'.$row->slug.'"  value="'.$row->code.'" >'.$row->name.'</option>';
                                        }
                                        else{
                                            echo '<option  data-slug="'.$row->slug.'"  value="'.$row->code.'" >'.$row->name.'</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                    </div>
                </div>
                <!--End .col-3-->
                <div class="col-sx-12 col-sm-6 col-md-2">
                    <div class="form-group">
                        <select class="form-control no-radius" name="wards" id="wards" onchange="change_wards()">
                                <option value="" data-slug="">-- Chọn xã / phường --</option>
                                <?php 
                                if(set_value("districts")!=""){
                                    $input=array();
                                    $input['where']=array('districts_code'=>set_value("districts"));
                                     $input['order']=array('order_index','ASC');
                                    $wards=$this->M_wards->get_list($input);
                                    foreach ($wards as $row){
                                        if(set_value('wards')==$row->code){
                                            echo '<option selected data-slug="'.$row->slug.'" value="'.$row->code.'" >'.$row->name.'</option>';
                                        }
                                        else{
                                            echo '<option  data-slug="'.$row->slug.'"  value="'.$row->code.'" >'.$row->name.'</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                    </div>
                </div>
                <!--End .col-3-->
                <div class="col-sx-12 col-sm-6 col-md-2">
                    <div class="form-group">
                        <select class="form-control no-radius" name="streets" id="streets" onchange="change_streets()">
                                <option value="" data-slug="">-- Chọn đường / phố --</option>
                                <?php 
                                if(set_value("districts")!=""){
                                    $input=array();
                                    $input['where']=array('districts_code'=>set_value("districts"));
                                    $input['order']=array('order_index','ASC');
                                    $streets=$this->M_streets->get_list($input);
                                    foreach ($streets as $row){
                                        if(set_value('streets')==$row->code){
                                            echo '<option data-slug="'.$row->slug.'" selected  value="'.$row->code.'" >'.$row->name.'</option>';
                                        }
                                        else{
                                            echo '<option  data-slug="'.$row->slug.'"  value="'.$row->code.'" >'.$row->name.'</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                    </div>
                </div>
                <!--End .col-3-->
                <div class="col-sx-12 col-sm-6 col-md-2 search-hidden">
                    <div class="form-group">
                        <select class="form-control no-radius" name="projects" id="projects" onchange="change_projects()">
                                <option value="" data-slug="">-- Chọn dự án --</option>
                                <?php 
                                if(set_value("districts")!=""){
                                    $input=array();
                                    $input['where']=array('districts_code'=>set_value("districts"));
                                     $input['order']=array('order_index','ASC');
                                    $streets=$this->M_projects->get_list($input);
                                    foreach ($streets as $row){
                                        if(set_value('projects')==$row->code){
                                            echo '<option data-slug="'.$row->slug.'" selected  value="'.$row->code.'" >'.$row->name.'</option>';
                                        }
                                        else{
                                            echo '<option data-slug="'.$row->slug.'"   value="'.$row->code.'" >'.$row->name.'</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                    </div>
                </div>
                <!--End .col-3-->
            </div>
            <!--End .row-->
            <div class="row " >
                <div class="col-sx-12 col-sm-6 col-md-2 search-hidden">
                    <div class="form-group">
                         <select class="form-control no-radius" name="prices" id="prices" >
                                <option value="-1">-- Mức giá --</option>
                                <?php 
                                $input=array();
                                $input['where']=array('groups_type'=>1,'status'=>1);
                                 $input['order']=array('code','ASC');
                                $prices = $this->M_prices->get_list($input);
                                foreach ($prices as $row){
                                    if(set_value('prices')==$row->code){
                                        echo "<option  selected value='".$row->code."'>".$row->name."</option>";
                                    }else{
                                        echo "<option value='".$row->code."'>".$row->name."</option>";
                                    }
                                }
                                ?>
                            </select>
                    </div>
                </div>
                <!--End .col-3-->
                <div class="col-sx-12 col-sm-6 col-md-2 search-hidden">
                    <div class="form-group">
                        <select class="form-control no-radius" name="acreages" id="acreages" >
                                <option value="-1">-- Diện tích --</option>
                                <?php 
                                $input=array();
                                $input['where']=array('status'=>1);
                                 $input['order']=array('code','ASC');
                                $acreages = $this->M_acreages->get_list($input);
                                foreach ($acreages as $row){
                                    if(set_value('acreages')==$row->code){
                                        echo "<option  selected value='".$row->code."'>".$row->name."</option>";
                                    }else{
                                        echo "<option value='".$row->code."'>".$row->name."</option>";
                                    }
                                }
                                ?>
                            </select>
                    </div>
                </div>
                <!--End .col-3-->
                <div class="col-sx-12 col-sm-6 col-md-2 search-hidden">
                    <div class="form-group">
                        <select class="form-control"  name="room" id="room">
                            <option value="-1">--Số phòng--</option>
                            <option value="1">1+ phòng</option>
                            <option value="2">2+ phòng </option>
                            <option value="3">3+ phòng </option>
                            <option value="4">4+ phòng </option>
                        </select>
                    </div>
                </div>
                <!--End .col-3-->
                <div class="col-sx-12 col-sm-6 col-md-2 search-hidden">
                    <div class="form-group">
                         <select class="form-control no-radius" name="directions" id="directions" >
                                <option value="-1">--Chọn hướng--</option>
                                <?php 
                                $input=array();
                                $input['order']=array('code','asc');
                                $directions = $this->M_directions->get_list($input);
                                foreach ($directions as $row){
                                    if(set_value('directions')==$row->code){
                                        echo "<option  selected value='".$row->code."'>".$row->name."</option>";
                                    }else{
                                        echo "<option value='".$row->code."'>".$row->name."</option>";
                                    }

                                }
                                ?>
                            </select>
                    </div>
                </div>
                <!--End .col-3-->
                <div class="col-sx-12 col-sm-12 col-md-2">
                    <button id="btn-submit" onclick="submit_search()" class="btn"><i class="fa fa-search"></i> Tìm bất động sản</button>
                </div>
                <!--End .col-3-->
            </div>
            <!--End .row-->
        </div>
        <!--End .container-->
    </form>
</section>
<?php }?>
<!--End #page-list-->
<?php if(1){ ?>
<section id="page">
    <div class="container">
        <div class="row">
            <div class="col-md-4 hidden-sm hidden-xs" id="siderbar">
               <?php include_once 'inc/sidebar-new.php';?>
               <?php include_once 'inc/sidebar-hot.php';?>
            </div>
            <!--End col-md-4-->
            <div class="col-md-8" id="page-right">
                 <?php if(1){ ?>
                 <div class="page-header">
                    <h1>Tin bất động sản</h1>
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
                    if(count($list)<=0){
                        echo "<p>Chưa có tin bất động sản!</p>";
                    }
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
                            $slug=$row->groups_code;
                            if($address_slug!=""){
                                $slug.='-'.$address_slug;
                            }
                            if($row->thumbnail==""){
                                $row->thumbnail="thumbnail.png";
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
            </div>
                 <?php }?>
            <!--End .col-md-9-->
        </div>
        <!--End .row-->
    </div>
    <!--End .container-->
</section>
<!--End #page-list-->

<?php }?>