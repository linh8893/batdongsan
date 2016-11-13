<section id="page">
    <div class="container">
        <div class="row">
            <div class="col-md-4 hidden-sm hidden-xs" id="siderbar">
               <?php include_once 'inc/sidebar-user.php';?>

            </div>
            <!--End col-md-4-->
            <div class="col-md-8" id="page-right">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="well well-title no-radius">
                        <h1>Đăng tin rao bán, cho thuê nhà đất</h1>
    Quý vị nhập thông tin nhà đất cần bán hoặc cho thuê vào các mục dưới đây
                    </div>
                    <div class="page-header">
                        <h2><i class="fa fa-plus-circle"></i> Thông tin cơ bản</h2>
                    </div>
                    <!--End .page-header-->
                    <div class="page-content">
                        <div class="alert alert-success no-radius">
                            <p>
                            Ngoài các trường bắt buộc, KH nên điền đầy đủ thông tin tại các trường khác :
                            </p>
                            <p><i class="fa fa-hand-o-right"></i> Phường/xã</p>
                            <p><i class="fa fa-hand-o-right"></i> Đường phố/ dự án</p>
                            <p><i class="fa fa-hand-o-right"></i> Giá/ diện tích</p>
                            <p> Để tin rao của bạn thêm độ tin cậy và hiển thị trên mọi kết quả tìm kiếm.</p>
                        </div> 
                        <div class="error"><?=form_error('cities');?></div>
                        <div class="error"><?=form_error('districts');?></div>
                        <div class="error"><?=form_error('groups_code');?></div>
                         <div class="error"><?=form_error('wards');?></div>
                         <div class="error"><?=form_error('streets');?></div>
                         <div class="error"><?=form_error('projects');?></div>
                         <div class="error"><?=form_error('price');?></div>
                         <div class="error"><?=form_error('acreage');?></div>
                         <div class="error"><?=form_error('address');?></div>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                <?php $groups_type=set_value('groups_type')==""?$item->groups_type:set_value('groups_type');?>
                                    <label class="control-label col-sm-2" for="email">Loại tin: </label>
                                    <div class="col-sm-10">
                                        <label class="radio-inline">
                                            <input type="radio" value="1" <?=$groups_type==1?"checked":"";?> checked onchange="change_groups_type()" name="groups_type"> Bất động sản bán
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" value="2" <?=$groups_type==2?"checked":"";?> onchange="change_groups_type()" name="groups_type"> Bất động sản cho thuê
                                        </label>
                                    </div>
                                    <div class="error"><?=form_error('groups_type');?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Nhóm tin: </label>
                                    <div class="col-sm-4">

                                    <?php echo $groups_type;?>
                                        <select class="form-control no-radius" name="groups_code" id="groups_code">
                                            <?php
                                            $groups_code=set_value("groups_code")==""?$item->groups_code:set_value("groups_code");

                                            $input=array();
                                            $input['where']=array('status'=>1,'type'=>1);
                                            $groups=$this->M_groups->get_list($input);
                                            echo '<option  value="" >-- Chọn loại nhà đất --</option>';
                                            if($groups_type==2){
                                                $input['where']=array('status'=>1,'type'=>2);
                                                $groups=$this->M_groups->get_list($input);
                                                foreach ($groups as $row){
                                                    if($groups_code==$row->slug){
                                                        echo '<option selected  value="'.$row->slug.'" >'.$row->title.'</option>';
                                                    }else{
                                                        echo '<option  value="'.$row->slug.'" >'.$row->title.'</option>';
                                                    }
                                                }
                                            }
                                            else{
                                                foreach ($groups as $row){
                                                    if($groups_code==$row->slug){
                                                        echo '<option selected  value="'.$row->slug.'" >'.$row->title.'</option>';
                                                    }else{
                                                        echo '<option  value="'.$row->slug.'" >'.$row->title.'</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Vị trí:  </label>
                                    <div class="col-sm-4">
                                        <select class="form-control no-radius" name="cities" id="cities" onchange="change_cities()">
                                            <?php 
                                            echo '<option  value="" >-- Chọn tỉnh / thành phố --</option>';
                                            $cities=$this->M_cities->get_list();
                                            foreach ($cities as $row){
                                                if(set_value('cities')==$row->code){
                                                    echo '<option selected  value="'.$row->code.'" >'.$row->name.'</option>';
                                                }
                                                else{
                                                    echo '<option   value="'.$row->code.'" >'.$row->name.'</option>';
                                                }
                                            }?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                       <select class="form-control no-radius" name="districts" onchange="change_districts()" id="districts">
                                            <?php 
                                            echo '<option  value="" >-- Chọn quận / huyện --</option>';
                                            if(set_value("cities")!=""){
                                                $input=array();
                                                $input['where']=array('cities_code'=>set_value("cities"));
                                                $districts=$this->M_districts->get_list($input);
                                                foreach ($districts as $row){
                                                    if(set_value('districts')==$row->code){
                                                        echo '<option selected  value="'.$row->code.'" >'.$row->name.'</option>';
                                                    }
                                                    else{
                                                        echo '<option   value="'.$row->code.'" >'.$row->name.'</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <select class="form-control no-radius" name="wards" id="wards" onchange="change_wards()">
                                            <option value="">-- Chọn xã / phường --</option>
                                            <?php 
                                            if(set_value("districts")!=""){
                                                $input=array();
                                                $input['where']=array('districts_code'=>set_value("districts"));
                                                $wards=$this->M_wards->get_list($input);
                                                foreach ($wards as $row){
                                                    if(set_value('wards')==$row->code){
                                                        echo '<option selected  value="'.$row->code.'" >'.$row->name.'</option>';
                                                    }
                                                    else{
                                                        echo '<option   value="'.$row->code.'" >'.$row->name.'</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <select class="form-control no-radius" name="streets" id="streets" onchange="change_streets()">
                                            <option value="">-- Chọn đường / phố --</option>
                                            <?php 
                                            if(set_value("districts")!=""){
                                                $input=array();
                                                $input['where']=array('districts_code'=>set_value("districts"));
                                                $streets=$this->M_streets->get_list($input);
                                                foreach ($streets as $row){
                                                    if(set_value('streets')==$row->code){
                                                        echo '<option selected  value="'.$row->code.'" >'.$row->name.'</option>';
                                                    }
                                                    else{
                                                        echo '<option   value="'.$row->code.'" >'.$row->name.'</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <select class="form-control no-radius" name="projects" id="projects" onchange="change_projects()">
                                            <option value="">-- Chọn dự án --</option>
                                            <?php 
                                            if(set_value("districts")!=""){
                                                $input=array();
                                                $input['where']=array('districts_code'=>set_value("districts"));
                                                $streets=$this->M_projects->get_list($input);
                                                foreach ($streets as $row){
                                                    if(set_value('projects')==$row->code){
                                                        echo '<option selected  value="'.$row->code.'" >'.$row->name.'</option>';
                                                    }
                                                    else{
                                                        echo '<option   value="'.$row->code.'" >'.$row->name.'</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End row-->
                         <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Giá: </label>
                                    <div class="col-sm-2">
                                        <input type="text" name="price" value="<?=set_value('price');?>" class="form-control no-radius">
                                    </div>
                                    <label class="control-label col-sm-1 label-right" for="email">Đơn vị: </label>
                                    <div class="col-sm-3">
                                        <select class="form-control no-radius" name="units" id="units">
                                            <option value="">--Chọn đơn vị--</option>
                                            <?php
                                               if(set_value("groups_type")==2){
                                                   $input=array();
                                                   $input['where']=array('groups_type'=>2);
                                                   $units=$this->M_units->get_list($input);
                                                   foreach ($units as $row) {
                                                       if(set_value("units")==$row->code){
                                                           echo '<option selected value="'.$row->code.'">'.$row->name.'</option>';
                                                       }else{
                                                           echo '<option value="'.$row->code.'">'.$row->name.'</option>';
                                                       }

                                                   }
                                               }else{
                                                   $input=array();
                                                   $input['where']=array('groups_type'=>1);
                                                   $units=$this->M_units->get_list($input);
                                                   foreach ($units as $row) {
                                                       if(set_value("units")==$row->code){
                                                           echo '<option selected value="'.$row->code.'">'.$row->name.'</option>';
                                                       }else{
                                                           echo '<option value="'.$row->code.'">'.$row->name.'</option>';
                                                       }

                                                   }
                                               }
                                            ?>
                                        </select>
                                    </div>
                                   <label class="control-label col-sm-1 label-right" for="email">Diện tích </label>
                                    <div class="col-sm-2">
                                        <input type="text" name="acreage" value="<?=set_value('acreage');?>" class="form-control no-radius">
                                    </div>
                                   <label class="control-label col-sm-1" for="email"> m <sup>2</sup> </label>
                                </div>
                            </div>
                        </div>
                        <!--End row-->
                         <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Địa chỉ </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control no-radius" name="address" id="address"   value="<?=set_value('address');?>"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!--End page-content-->
                    <div class="page-header">
                         <h2><i class="fa fa-plus-circle"></i> Thông tin khác</h2>
                    </div>
                    <div class="page-content">
                        <div class="alert alert-success no-radius">
                            Qúy khách vui lòng nhập đầy đủ các thông tin khác trong mục này để tin rao của bạn thêm độ tin cậy.
                        </div>
                        <div class="error"><?=form_error('frontside');?></div>
                        <div class="error"><?=form_error('backside');?></div>
                        <div class="error"><?=form_error('directions');?></div>
                        <div class="error"><?=form_error('floor');?></div>
                        <div class="error"><?=form_error('room');?></div>
                        <div class="error"><?=form_error('toilet');?></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Mặt trước (m) </label>
                                    <div class="col-sm-2">
                                        <input class="form-control no-radius" type="text" value="<?=set_value('frontside');?>" name="frontside">
                                    </div>
                                    <label class="control-label col-sm-2 label-right" for="email">Đường trước nhà (m) </label>
                                    <div class="col-sm-2">
                                        <input class="form-control no-radius" type="text" value="<?=set_value('backside');?>" name="backside">
                                    </div>
                                    <label class="control-label col-sm-1 label-right" for="email">Hướng nhà </label>
                                    <div class="col-sm-3">
                                        <select class="form-control no-radius" name="directions" >
                                            <option value="">--Chọn hướng--</option>
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
                            </div>
                        </div>
                        <!--End row-->
                         <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Số phòng </label>
                                    <div class="col-sm-2">
                                        <input class="form-control no-radius" type="text" name="room" value="<?=set_value('room');?>">
                                    </div>
                                    <label class="control-label col-sm-2 label-right" for="email"  >Số tầng </label>
                                    <div class="col-sm-2">
                                        <input class="form-control no-radius" type="text" value="<?=set_value('floor');?>" name="floor">
                                    </div>
                                    <label class="control-label col-sm-1 label-right" for="email" >Số toilet</label>
                                    <div class="col-sm-3">
                                        <input class="form-control no-radius" type="text" value="<?=set_value('toilet');?>" name="toilet">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End row-->
                    </div>
                    <div class="page-header">
                         <h2><i class="fa fa-plus-circle"></i> Mô tả chi tiết</h2>
                    </div>
                    <div class="page-content">
                        <div class="alert alert-success no-radius">
                            <p>Qúy khách vui lòng nhập nội dung, giới thiệu cụ thể và chính xác nhất về BĐS muốn rao bán/ cho thuê. Ví dụ: </p>
                            <p><i class="fa fa-hand-o-right"></i> Đặc điểm: gần chợ, gần trường học,....</p>
                            <p><i class="fa fa-hand-o-right"></i> Địa chỉ chính xác nhất của BĐS. Vd: Số 58, Vũ Trọng Phụng, Thanh Xuân, Hà Nội </p>
                            <p><i class="fa fa-hand-o-right"></i> Diện tích- Giá- Dự án- Số phòng ngủ(nếu có). </p>
                            <p>QK nhập chữ in thường, <b>KHÔNG</b> nhập chữ in hoa.</p>
                        </div>
                        <div class="error"><?=form_error('title');?></div>
                        <div class="error"><?=form_error('content');?></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Tiêu đề</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control no-radius" name="title" id="title"  value="<?=set_value('title');?>" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Nội dung mô tả </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control no-radius" name="content" rows="5"><?=set_value('content');?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Ngày đăng </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control no-radius" id="datepicker-1" value="<?=set_value('public_time');?>" name="public_time">
                                    </div>
                                    <label class="control-label col-sm-2" for="email" >Ngày hết hạn </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control no-radius" id="datepicker-2"  value="<?=set_value('exp_time');?>" name="exp_time">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End row-->
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label col-sm-12" for="email">Hình ảnh mô tả <i class="text-red"> (Tối đa 4 hình)</i> </label>
                                </div>
                            </div>
                        </div>
                        <!--End row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="file" accept="image/*" value="<?=set_value('image_1');?>" name="image_1"  class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                     <div class="col-sm-12">
                                        <input type="file" accept="image/*" value="<?=set_value('image_2');?>" name="image_2"  class="form-control" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">           
                                     <div class="col-sm-6">
                                        <input type="file" accept="image/*" value="<?=set_value('image_3');?>" name="image_3"  class="form-control" >
                                    </div>
                                     <div class="col-sm-6">
                                         <input type="file" accept="image/*" value="<?=set_value('image_4');?>" name="image_4"  class="form-control" >
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!--End row-->
                    </div>
                    <div class="page-header">
                         <h2><i class="fa fa-plus-circle"></i> Thông tin liên hệ</h2>
                    </div>
                    
                    <div class="page-content">
                        <div class="error"><?=form_error('author_email');?></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Họ và tên </label>
                                    <div class="col-sm-10">
                                        
                                        <input type="text" name="author_name" value="<?=set_value('author_name');?>" class="form-control no-radius">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                   
                                
                                    <label class="control-label col-sm-2" for="email">Địa chỉ </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control no-radius" name="author_address" value="<?=set_value('author_address');?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    
                                    <label class="control-label col-sm-2" for="email">Số di động </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control no-radius" name="author_phone"  value="<?=set_value('author_phone')?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                   
                                    <label class="control-label col-sm-2" for="email">Email </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="author_email" class="form-control no-radius" value="<?=set_value('author_email');?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End row-->
                    </div>
                    <div class="page-content">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary no-radius"> <i class="fa fa-send-o"></i> Lưu lại</button>
                                <button type="reset" class="btn btn-default no-radius"> <i class="fa fa-remove"></i> Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--End .col-md-9-->
        </div>
        <!--End .row-->
    </div>
    <!--End .container-->
</section>
<!--End #page-list-->
