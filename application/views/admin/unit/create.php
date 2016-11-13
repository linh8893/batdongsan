<div class="row" id="page-header">
    <div class="col-md-6 col-lg-8 ">
        <h1><?=$title;?></h1>
    </div>
    <div class="col-md-6 col-lg-4">
        
        <a href="<?=base_url();?>admin/units" class="btn no-radius btn-success" title="Xem danh sách"><i class="fa fa-list"></i> Xem danh sách</a>
       
    </div>
    <!-- /.col-lg-12 -->
</div>
<!--End header-->

<form method="post">
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Tên đơn vị</label>
            <input class="form-control" name="name" value="<?=set_value('name');?>">
            <div class="error"><?=form_error('name');?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Số thứ tự</label>
            <input class="form-control" name="code" value="<?=set_value('code');?>">
            <div class="error"><?=form_error('code');?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Hệ số / triệu </label>
            <input class="form-control" name="he_so" value="<?=set_value('he_so');?>">
            <div class="error"><?=form_error('he_so');?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Hệ nhân</label>
            <select name="he_nhan"  class="form-control">
                <option <?=set_value('he_nhan')==0?'selected':'';?> value="0">Không</option>
                <option <?=set_value('he_nhan')==1?'selected':'';?> value="1">Có </option>
            </select>
            <div class="error"><?=form_error('he_nhan');?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Áp dụng với</label>
            <select name="groups_type" class="form-control">
                <option value="1">Bất động sản bán</option>
                <option value="2">Bất động cho thuê</option>
            </select>
            <div class="error"><?=form_error('groups_type');?></div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary no-radius"><i class="fa fa-save"></i> Lưu lại</button>
        </div>
    </div>
</div>
</form>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success">
            Đơn vị chuẩn là Triệu <br>
            Hệ số / triệu là tỷ lệ 1 đơn vị / triệu. Ví dụ tỷ = 1000/triệu =1000; đơn vị trăm = 0.0001/triệu = 0.0001<br>
            Hệ nhân áp dụng cho những đơn vị tính theo đơn vị diện tích. Có 2 giá trị là "Có" hoặc "Không". "Có" áp dụng cho những đơn vị tính kèm theo diện tích và "Không" áp dụng cho đơn vị không kèm diện tích.

        </div>
    </div>
</div>