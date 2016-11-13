<div class="row" id="page-header">
    <div class="col-md-6 col-lg-8 ">
        <h1><?=$title;?></h1>
    </div>
    <div class="col-md-6 col-lg-4">
        
        <a href="<?=base_url();?>admin/prices" class="btn no-radius btn-success" title="Xem danh sách"><i class="fa fa-list"></i> Xem danh sách</a>
       
    </div>
    <!-- /.col-lg-12 -->
</div>
<!--End header-->
<form method="post">
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Tiêu đề</label>
            <input class="form-control" name="name" value="<?=set_value('name')==""?$item->name:set_value('name');?>">
            <div class="error"><?=form_error('name');?></div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="form-group">
            <label>Mã tìm kiếm</label>
            <input class="form-control" name="code" value="<?=set_value('code')==""?$item->code:set_value('code');?>">
            <div class="error"><?=form_error('code');?></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Loại bất động sản</label>
            <?php $groups_type=set_value('groups_type')==""?$item->groups_type:set_value('groups_type');?>
            <select class="form-control" name="groups_type" id="groups_type" onchange="change_groups_type_2()">
                <option value="1" <?=$groups_type==1?"selected":"";?> >Bất động sản bán</option>
                <option value="2" <?=$groups_type==2?"selected":"";?>>Bất động sản cho thuê </option>
            </select>
            <div class="error"><?=form_error('groups_type');?></div>
        </div>
    </div>
    
     <div class="col-md-3">
        <div class="form-group">
            <label>Giá trị nhỏ nhất</label>
            <input class="form-control" name="min_value" value="<?=set_value('min_value')==""?$item->min_value:set_value('min_value');?>">
            <div class="error"><?=form_error('min_value');?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Đơn vị</label>
            <?php $units_code=set_value('units_1')==""?$item->units_code_1:set_value('units_1');?>
             <select class="form-control no-radius" name="units_1" id="units">
                                            <option value="">--Chọn đơn vị--</option>
                                            <?php
                                               if($groups_type==2){
                                                   $input=array();
                                                   $input['where']=array('groups_type'=>2);
                                                   $units=$this->M_units->get_list($input);
                                                   foreach ($units as $row) {
                                                       if($units_code==$row->code){
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
                                                       if($units_code==$row->code){
                                                           echo '<option selected value="'.$row->code.'">'.$row->name.'</option>';
                                                       }else{
                                                           echo '<option value="'.$row->code.'">'.$row->name.'</option>';
                                                       }

                                                   }
                                               }
                                            ?>
                                        </select>
            <div class="error"><?=form_error('units_1');?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Giá trị lớn nhất</label>
            <input class="form-control" name="max_value" value="<?=set_value('max_value')==""?$item->max_value:set_value('max_value');?>">
            <div class="error"><?=form_error('max_value');?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Đơn vị</label>
            <?php $units_code_2=set_value('units_2')==""?$item->units_code_2:set_value('units_2');?>
             <select class="form-control no-radius" name="units_2" id="units_2">
                                            <option value="">--Chọn đơn vị--</option>
                                            <?php
                                               if($groups_type==2){
                                                   $input=array();
                                                   $input['where']=array('groups_type'=>2);
                                                   $units=$this->M_units->get_list($input);
                                                   foreach ($units as $row) {
                                                       if($units_code_2==$row->code){
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
                                                       if($units_code_2==$row->code){
                                                           echo '<option selected value="'.$row->code.'">'.$row->name.'</option>';
                                                       }else{
                                                           echo '<option value="'.$row->code.'">'.$row->name.'</option>';
                                                       }

                                                   }
                                               }
                                            ?>
                                        </select>
            <div class="error"><?=form_error('units_2');?></div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary no-radius"><i class="fa fa-save"></i> Lưu lại</button>
        </div>
    </div>
</div>
</form>