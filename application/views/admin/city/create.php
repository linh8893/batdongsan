<div class="row" id="page-header">
    <div class="col-md-6 col-lg-8 ">
        <h1><?=$title;?></h1>
    </div>
    <div class="col-md-6 col-lg-4">
        
        <a href="<?=base_url();?>admin/cities" class="btn no-radius btn-success" title="Xem danh sách"><i class="fa fa-list"></i> Xem danh sách</a>
       
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
                <option <?=set_value('type')=="Tỉnh"?"selected":"";?>  value="Tỉnh" >Tỉnh</option>
                <option <?=set_value('type')=="Thành phố"?"selected":"";?>  value="Thành phố" >Thành phố</option>
            </select>
        </div>
    </div>  
    <div class="col-md-3">
        <div class="form-group">
                    <label>Tên tỉnh / thành phố</label>
                    <input class="form-control" name="name" id="name" onkeyup="javascript:create_slug('name','slug');" value="<?=set_value('name');?>" >
                    <div class="error"><?=form_error('name');?></div>
       </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>Tên rút gọn</label>
            <input class="form-control" name="slug"  id="slug" value="<?=set_value('slug');?>" >
            <div class="error"><?=form_error('slug');?></div>
       </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>Mã </label>
            <input class="form-control" name="code" value="<?=set_value('code');?>" >
            <div class="error"><?=form_error('code');?></div>
       </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>Thứ tự</label>
            <input class="form-control" name="order_index" value="<?=set_value('order_index')==""?$order_index:set_value('order_index');?>" >
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

