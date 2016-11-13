<style>
#search-box .page-header h2.active,#search-box .page-header h2:hover{
  border-bottom: 2px solid #0286D0;
  display: block;
}
#search-box .page-header a{
  text-decoration: none;
}
#search-box .page-header h2:after{
  background-color: transparent;
}
</style>
<?php if(1){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="siderbar-box" id="search-box">
        <form action="" data-slug="nha-dat-ban" method="post" id="form-search">
            <div class="page-header">

                <div class="row">
                         <div class="col-md-6 ">
                         <h2 class="<?php if($data_search['groups_type']==1){echo 'active';} ?>" id="h2-1">
                         <a href="#"  id="groups_1" onclick="change_groups('1')"><i class="fa fa-search"></i> Bất động sản bán</a>
                         </h2>
                         </div>
                         <div class="col-md-6 ">
                         <h2 id="h2-2" class="<?php if($data_search['groups_type']==2){echo 'active';} ?>">
                         <a href="#" id="groups_2" onclick="change_groups('2')"><i class="fa fa-search"></i> BĐS cho thuê</a>
                         </h2>
                         </div>

                </div>
            </div>
            <!--End .page-header-->
            <div class="siderbar-search" style="margin-top: 10px;">
                 
                     <div class="row">
                         <div class="col-md-6 col-one">
                             <div class="form-group">
                                <select class="form-control no-radius" name="groups_code" id="groups_code">
                                            <?php
                                            $input=array();

                                            $groups_type=set_value("groups_type")==""?$data_search['groups_type']:set_value("groups_type");
                                            $input['where']=array('status'=>1,'type'=>1);
                                             $input['order']=array('order_index','ASC');
                                            $groups=$this->M_groups->get_list($input);
                                            echo '<option data-slug=""  value="" >-- Chọn loại nhà đất --</option>';

                                            if($groups_type==2){
                                                $input['where']=array('status'=>1,'type'=>2);
                                                 $input['order']=array('order_index','ASC');
                                                $groups=$this->M_groups->get_list($input);
                                                foreach ($groups as $row){
                                                    if($data_search['groups_slug']==$row->slug){
                                                        echo '<option selected data-slug="'.$row->slug.'"  value="'.$row->slug.'" >'.$row->title.'</option>';
                                                    }else{
                                                        echo '<option data-slug="'.$row->slug.'" value="'.$row->slug.'" >'.$row->title.'</option>';
                                                    }
                                                }
                                            }
                                            else{
                                                foreach ($groups as $row){
                                                    if($data_search['groups_slug']==$row->slug){
                                                        echo '<option data-slug="'.$row->slug.'" selected  value="'.$row->slug.'" >'.$row->title.'</option>';
                                                    }else{
                                                        echo '<option data-slug="'.$row->slug.'"  value="'.$row->slug.'" >'.$row->title.'</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                             </div>
                         </div>
                          <div class="col-md-6 col-two">
                              <div class="form-group">
                                <select class="form-control no-radius" name="cities" id="cities" onchange="change_cities()">
                                            <?php 
                                            echo '<option data-slug=""  value="" >-- Chọn tỉnh / thành phố --</option>';
                                               $input1=array();
                                          $input1['where']=array('status'=>1);
                                          $input1['order']=array('order_index','ASC');

                                            $cities=$this->M_cities->get_list($input1);
                                            $cities_code=set_value('cities')==""?$data_search['cities_code']:set_value('cities');
                                            foreach ($cities as $row){
                                                if($cities_code==$row->code){
                                                    echo '<option selected data-slug="'.$row->slug.'"  value="'.$row->code.'" >'.$row->name.'</option>';
                                                }
                                                else{
                                                    echo '<option  data-slug="'.$row->slug.'" value="'.$row->code.'" >'.$row->name.'</option>';
                                                }
                                            }?>
                                        </select>
                              </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6 col-one">
                             <div class="form-group">
                               <select class="form-control no-radius" name="districts" onchange="change_districts()" id="districts">
                                            <?php 
                                            echo '<option data-slug="" value="" >-- Chọn quận / huyện --</option>';
                                            $districts_code=set_value('districts')==""?$data_search['districts_code']:set_value('districts');
                                            if($cities_code!=""){
                                                $input=array();
                                                $input['where']=array('cities_code'=>$cities_code,'status'=>1);
                                                $input['order']=array('order_index','ASC');
                                                $districts=$this->M_districts->get_list($input);
                                                foreach ($districts as $row){
                                                    if($districts_code==$row->code){
                                                        echo '<option data-slug="'.$row->slug.'" selected  value="'.$row->code.'" >'.$row->name.'</option>';
                                                    }
                                                    else{
                                                        echo '<option data-slug="'.$row->slug.'"  value="'.$row->code.'" >'.$row->name.'</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                             </div>
                         </div>
                          <div class="col-md-6 col-two">
                              <div class="form-group">
                                <select class="form-control no-radius" name="wards" id="wards" onchange="change_wards()">
                                            <option data-slug="" value="">-- Chọn xã / phường --</option>
                                            <?php 
                                            $wards_code=set_value('wards')==""?$data_search['wards_code']:set_value('wards');
                                            if($districts_code!=""){
                                                $input=array();
                                                $input['where']=array('districts_code'=>$districts_code,'status'=>1);
                                                $input['order']=array('order_index','ASC');
                                                $wards=$this->M_wards->get_list($input);
                                                foreach ($wards as $row){
                                                    if($wards_code==$row->code){
                                                        echo '<option data-slug="'.$row->slug.'" selected  value="'.$row->code.'" >'.$row->name.'</option>';
                                                    }
                                                    else{
                                                        echo '<option data-slug="'.$row->slug.'"  value="'.$row->code.'" >'.$row->name.'</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                              </div>
                         </div>
                     </div>
                    <div class="row">
                         <div class="col-md-6 col-one">
                             <div class="form-group">
                                <select class="form-control no-radius" name="streets" id="streets" onchange="change_streets()">
                                            <option data-slug="" value="">-- Chọn đường / phố --</option>
                                            <?php 
                                            $streets_code=set_value('streets')==""?$data_search['streets_code']:set_value('streets');
                                            if($districts_code!=""){
                                                $input=array();
                                                $input['where']=array('districts_code'=>$districts_code,'status'=>1);
                                                $input['order']=array('order_index','ASC');
                                                $streets=$this->M_streets->get_list($input);
                                                foreach ($streets as $row){
                                                    if($streets_code==$row->code){
                                                        echo '<option data-slug="'.$row->slug.'" selected  value="'.$row->code.'" >'.$row->name.'</option>';
                                                    }
                                                    else{
                                                        echo '<option  data-slug="'.$row->slug.'" value="'.$row->code.'" >'.$row->name.'</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                             </div>
                         </div>
                          <div class="col-md-6 col-two">
                              <div class="form-group">
                                <select class="form-control no-radius" name="projects" id="projects" onchange="change_projects()">
                                            <option data-slug="" value="">-- Chọn dự án --</option>
                                            <?php 
                                            $projects_code=set_value('projects')==""?$data_search['projects_code']:set_value('projects');
                                            if($districts_code!=""){
                                                $input=array();
                                                $input['where']=array('districts_code'=>$districts_code,'status'=>1);
                                                $input['order']=array('order_index','ASC');
                                                $projects=$this->M_projects->get_list($input);
                                                foreach ($projects as $row){
                                                    if($projects_code==$row->code){
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
                     </div>
                     <div class="row">
                         <div class="col-md-6 col-one">
                             <div class="form-group">
                                <select class="form-control no-radius" name="prices" id="prices" >
                                            <option value="-1">-- Mức giá --</option>
                                            <?php 
                                            $input=array();
                                            $price=set_value('prices')==""?$data_search['muc_gia']:set_value('prices');
                                            $input['where']=array('groups_type'=>1,'status'=>1);
                                             $input['order']=array('code','ASC');
                                            $prices = $this->M_prices->get_list($input);
                                            foreach ($prices as $row){
                                                if($price==$row->code){
                                                    echo "<option  selected value='".$row->code."'>".$row->name."</option>";
                                                }else{
                                                    echo "<option value='".$row->code."'>".$row->name."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                             </div>
                         </div>
                          <div class="col-md-6 col-two">
                              <div class="form-group">
                                <select class="form-control no-radius" name="acreages" id="acreages">
                                            <option value="-1">-- Diện tích --</option>
                                            <?php 
                                            $input=array();
                                             $dien_tich=set_value('acreages')==""?$data_search['dien_tich']:set_value('acreages');
                                            $input['where']=array('status'=>1);
                                             $input['order']=array('code','ASC');
                                            $acreages = $this->M_acreages->get_list($input);
                                            foreach ($acreages as $row){
                                                if($dien_tich==$row->code){
                                                    echo "<option  selected value='".$row->code."'>".$row->name."</option>";
                                                }else{
                                                    echo "<option value='".$row->code."'>".$row->name."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                              </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6 col-one">

                             <div class="form-group">
                             <?php  $so_phong=set_value('room')==""?$data_search['so_phong']:set_value('room');
                             
                             ?>
                                <select class="form-control no-radius"  name="room" id="room">
                                  <option value="-1">--Số phòng--</option>

                                  <option value="1" <?=$so_phong==1?"selected":"";?> >1+ phòng</option>
                                  <option value="2" <?=$so_phong==2?"selected":"";?> >2+ phòng </option>
                                  <option value="3" <?=$so_phong==3?"selected":"";?> >3+ phòng </option>
                                  <option value="4" <?=$so_phong==4?"selected":"";?> >4+ phòng </option>
                              </select>
                             </div>
                         </div>
                          <div class="col-md-6 col-two">
                              <div class="form-group">
                                <select class="form-control no-radius" name="directions" id="directions">
                                            <option value="-1">--Chọn hướng--</option>
                                            <?php 
                                             $huong=set_value('directions')==""?$data_search['huong']:set_value('directions');

                                            $input=array();
                                            $input['order']=array('code','asc');
                                            $directions = $this->M_directions->get_list($input);
                                            foreach ($directions as $row){
                                                if($huong==$row->code){
                                                    echo "<option  selected value='".$row->code."'>".$row->name."</option>";
                                                }else{
                                                    echo "<option value='".$row->code."'>".$row->name."</option>";
                                                }

                                            }
                                            ?>
                                        </select>
                              </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <button onclick="submit_search()" class="btn no-radius" id="btn-submit-2"><i class="fa fa-search"></i> Tìm kiếm</button>
                         </div>
                     </div>
                 
            </div>
            </form>
        </div>
        <!--End .page-content-->
        
    </div>
</div>
<!--End .nav-left-item-->
<?php }?>