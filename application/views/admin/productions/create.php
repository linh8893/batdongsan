<form method="post" action="" class="form-horizonta"  enctype="multipart/form-data">
    <div class="row" id="page-header">
        <div class="col-md-6 col-lg-8 ">
            <h1><?=$title;?></h1>
        </div>
        <div class="col-md-6 col-lg-4">
            
            <button type="submit" class="btn btn-primary no-radius"><i class="fa fa-save"></i> Lưu lại</button>
            <a href="<?=base_url();?>admin/productions" class="btn no-radius btn-success" title="Xem danh sách"><i class="fa fa-list"></i> Xem danh sách</a>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!--End header-->
    <div class="row" style="font-size: 14px;">
        <div class="col-md-12">
            <div class="panel panel-primary no-radius" >
                <div class="panel-heading no-radius">
                    <i class="fa fa-edit"></i> Thông tin cơ bản
                </div>
                <div class="panel-body ">
                    <div class="error"><?=form_error('cities');?></div>
                    <div class="error"><?=form_error('districts');?></div>
                    <div class="error"><?=form_error('groups_code');?></div>
                     <div class="error"><?=form_error('wards');?></div>
                     <div class="error"><?=form_error('streets');?></div>
                     <div class="error"><?=form_error('projects');?></div>
                     <div class="error"><?=form_error('price');?></div>
                     <div class="error"><?=form_error('acreage');?></div>
                     <div class="error"><?=form_error('address');?></div>
                    <div class="row " >
                        <div class="col-md-6" >
                            <div class="form-group">
                                <label>Loại tin</label>
                                <label class="radio-inline">
                                    <input type="radio" value="1" <?=set_value('groups_type')==1?"checked":"";?> checked onchange ="change_groups_type()" name="groups_type"> Bất động sản bán
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="2" <?=set_value('groups_type')==2?"checked":"";?> onchange="change_groups_type()" name="groups_type"> Bất động sản cho thuê
                                </label>
                                <!--
                                <select class="form-control" name="groups_type" id="groups_type" onchange="changer_groups_type()">
                                    <option value="1">Bất động sản bán</option>
                                    <option value="2">Bất động cho thuê</option>
                                </select>
                                -->

                                <div class="error"><?=form_error('groups_type');?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nhóm tin</label>
                                <select class="form-control" name="groups_code" id="groups_code">
                                    <?php 
                                    echo '<option  value="" >--Chọn loại nhà đất--</option>';
                                    if(set_value("groups_type")==2){
                                        $input=array();
                                        $input['where']=array('status'=>1,'type'=>2);
                                        $groups=$this->M_groups->get_list($input);
                                        foreach ($groups as $row){
                                            if(set_value("groups_code")==$row->slug){
                                                echo '<option selected  value="'.$row->slug.'" >'.$row->title.'</option>';
                                            }else{
                                                echo '<option  value="'.$row->slug.'" >'.$row->title.'</option>';
                                            }
                                        }
                                    }
                                    else{
                                        foreach ($groups as $row){
                                            if(set_value("groups_code")==$row->slug){
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
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tỉnh / Thành phố</label>
                                <select class="form-control" name="cities" id="cities" onchange="change_cities()">
                                    <?php 
                                    echo '<option  value="" >--Chọn loại tỉnh / thành phố--</option>';
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
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Quận / Huyện</label>
                                <select class="form-control" name="districts" onchange="change_districts()" id="districts">
                                    <?php 
                                    echo '<option  value="" >--Chọn loại tỉnh / thành phố--</option>';
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label> Xã/Phường</label>
                                <select class="form-control" name="wards" id="wards">
                                    <option value="">--Chọn xã/phường--</option>
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
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Đường / Phố</label>
                                <select class="form-control" name="streets" id="streets">
                                    <option value="">--Chọn đường/phố --</option>
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Dự án</label>
                                <select class="form-control" name="projects" id="projects">
                                    <option value="">--Chọn dự án --</option>
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Giá </label>
                                <input type="text" name="price" value="<?=set_value('price');?>" class="form-control">
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Đơn vị</label>
                                <select class="form-control" name="units" id="units">
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
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Diện tích</label>
                                <input type="text" name="acreage" value="<?=set_value('acreage');?>" class="form-control">
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Địa chỉ </label>
                                <input class="form-control" name="address"   value="<?=set_value('address');?>" >
                                
                            </div>
                        </div>
                    </div>
                    <!--End row-->
                </div>
            </div>
            <div class="panel panel-primary no-radius" >
                <div class="panel-heading no-radius">
                    <i class="fa fa-edit"></i> Thông tin bổ xung
                </div>
                <div class="panel-body">
                    
                    <div class="error"><?=form_error('frontside');?></div>
                    <div class="error"><?=form_error('backside');?></div>
                    <div class="error"><?=form_error('directions');?></div>
                    <div class="error"><?=form_error('floor');?></div>
                    <div class="error"><?=form_error('room');?></div>
                    <div class="error"><?=form_error('toilet');?></div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Mặt tiền</label>
                                <input type="text" value="<?=set_value('frontside');?>" name="frontside" class="form-control">
                                
                            </div>

                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                <label>Mặt sau</label>
                                <input type="text" value="<?=set_value('backside');?>" name="backside" class="form-control">
                                
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                <label>Hướng nhà</label>
                                <select class="form-control" name="directions" >
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
                         <div class="col-md-3">
                            <div class="form-group">
                                <label>Số tầng</label>
                                <input type="text" value="<?=set_value('floor');?>" name="floor" class="form-control">
                                
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                <label>Số phòng</label>
                                <input type="text" name="room" value="<?=set_value('room');?>" class="form-control">
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Số toilet</label>
                                <input type="text" name="toilet" value="<?=set_value('toilet');?>" class="form-control">
                                
                            </div>
                        </div>
                    </div>
                </div>
             </div>
            <div class="panel panel-primary no-radius" >
                <div class="panel-heading no-radius">
                    <i class="fa fa-edit"></i> Thông tin mô tả
                </div>
                <div class="panel-body">
                    
                    <div class="form-group">
                        <label>Tiêu đề </label>
                        <input class="form-control" name="title" id="title"  onkeyup="create_slug('title','slug');" value="<?=set_value('title');?>" >
                        <div class="error"><?=form_error('title');?></div>
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề rút gọn</label>
                        <input class="form-control"  id="slug" name=slug value="<?=set_value('slug');?>" placeholder="">
                        <div class="error"><?=form_error('slug');?></div>
                    </div>
                    <div class="form-group">
                        <label>Mô tả ngắn</label>
                        <textarea name="description" class="form-control" rows="2" placeholder=""><?=set_value('description');?></textarea>
                        <div class="error"><?=form_error('description');?></div>
                    </div>
                    <div class="form-group">
                        <label>Từ khóa tìm kiếm</label>
                        <textarea name="keywords" class="form-control" rows="2" placeholder=""><?=set_value('keywords');?></textarea>
                        <div class="error"><?=form_error('keywords');?></div>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="content" class="form-control" rows="5" placeholder=""><?=set_value('content');?></textarea>
                        <div class="error"><?=form_error('content');?></div>
                    </div>
                    <div class="row" id="list-image">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>File ảnh 1</label>
                                <input  type="file" name="image_1" accept="image/*" value="<?=set_value('image_1');?>" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>File ảnh 2</label>
                                <input type="file" accept="image/*" value="<?=set_value('image_2');?>" name="image_2"  class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>File ảnh 3</label>
                                <input type="file" name="image_3" accept="image/*" value="<?=set_value('image_3');?>" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>File ảnh 4</label>
                                <input type="file" accept="image/*" value="<?=set_value('image_4');?>" name="image_4"  class="form-control" >
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--End panel-->
            <div class="panel panel-primary no-radius" >
                <div class="panel-heading no-radius">
                    <i class="fa fa-edit"></i> Thông tin liên hệ
                </div>
                <?php $user=$this->M_users->get_item($account['id']);?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <?php $name=set_value('author_name')==""?$user->full_name:set_value('author_name'); ?>
                                <input type="text" name="author_name" value="<?=$name;?>" class="form-control">
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                <label>Điện thoại</label>
                                 <?php $phone=set_value('author_phone')==""?$user->phone:set_value('author_phone'); ?>
                                <input type="text" name="author_phone" class="form-control" value="<?=$phone;?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email</label>
                                <?php 
                                
                                $email=set_value('author_email')==""?$user->email:set_value('author_email');
                                ?>
                                <input type="email" name="author_email" value="<?=$email;?>" class="form-control">
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <?php $address=set_value('author_address')==""?$user->address:set_value('author_address'); ?>
                                <input type="text" name="author_address" value="<?=$address;?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Facebook</label>
                                <?php $facebook=set_value('author_facebook')==""?$user->facebook:set_value('author_facebook'); ?>
                                <input type="text" name="author_facebook"  value="<?=$facebook;?>" class="form-control">
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label>Skype</label>
                                <?php $skype=set_value('author_skype')==""?$user->skype:set_value('author_skype'); ?>
                                <input type="text" name="author_skype" value="<?=$skype;?>" class="form-control">
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label>Yahoo</label>
                                <?php $yahoo=set_value('author_yahoo')==""?$user->yahoo:set_value('author_yahoo'); ?>
                                <input type="text" name="author_yahoo" value="<?=$yahoo;?>" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary no-radius"><i class="fa fa-save"></i> Lưu lại</button>
            </div>
        </div>
    </div>
</form>

