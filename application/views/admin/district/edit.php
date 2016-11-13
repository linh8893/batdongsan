<div class="row" id="page-header">
    <div class="col-md-6 col-lg-8 ">
        <h1><?=$title;?></h1>
    </div>
    <div class="col-md-6 col-lg-4">
        
        <a href="<?=base_url();?>admin/districts" class="btn no-radius btn-success" title="Xem danh sách"><i class="fa fa-list"></i> Xem danh sách</a>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!--End header-->
<form method="post">
<div class="row">
    <div class="col-md-3">    
        <div class="form-group">
            <label>Tiền tố</label>
            <select class="form-control" name="type">
                <?php $type=set_value('type')==""?$item->type:set_value('type');?>
                <option <?=$type=="Quận"?"selected":"";?>  value="Quận" >Quận</option>
                <option <?=$type=="Huyện"?"selected":"";?>  value="Huyện" >Huyện</option>
            </select>
        </div>
    </div>  
    <div class="col-md-3">
        <div class="form-group">
                    <label>Tên quận / huyện</label>
                    <input class="form-control" name="name" id="name" onkeyup="create_slug('name','slug');" value="<?=set_value('name')==""?$item->name:set_value('name');;?>" >
                    <div class="error"><?=form_error('name');?></div>
       </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
                    <label>Tên rút gọn</label>
                    <input class="form-control" name="slug" id="slug" value="<?=set_value('slug')==""?$item->slug:set_value('slug');?>" >
                    <div class="error"><?=form_error('slug');?></div>
       </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
                    <label>Mã</label>
                    <input class="form-control" name="code" value="<?=set_value('code')==""?$item->code:set_value('code');?>" >
                    <div class="error"><?=form_error('code');?></div>
       </div>
    </div>
    <div class="col-md-3">    
        <div class="form-group">
            <label>Tỉnh / Thành phố</label>
            <select class="form-control" name="cities_code">
                <option  value="" >--Chọn tỉnh / thành phố--</option>
                <?php 
                $cities_code=set_value('cities_code')==""?$item->cities_code:set_value('cities_code');
                foreach ($cities as $row) { ?>
                <option <?=$cities_code==$row->code?"selected":"";?>  value="<?=$row->code;?>" ><?=$row->name;?></option>
                <?php }?>
            </select>
        </div>
    </div>  
    <div class="col-md-3">
        <div class="form-group">
            <label>Thứ tự</label>
            <?php 
            $tmp_index=set_value('order_index')==""?$item->order_index:set_value('order_index');
            if($tmp_index=="" || $tmp_index==0){
                $tmp_index=$order_index;
            }
            ?>
            <input class="form-control" name="order_index" value="<?=$tmp_index;?>" >
            <div class="error"><?=form_error('order_index');?></div>
       </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary no-radius"><i class="fa fa-save"></i> Lưu lại</button>
        </div>
    </div>
</div>
</form>

