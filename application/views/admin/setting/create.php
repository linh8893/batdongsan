<div class="row" id="page-header">
    <div class="col-md-6 col-lg-8 ">
        <h1><?=$title;?></h1>
    </div>
    <div class="col-md-6 col-lg-4">
        
        <a href="<?=base_url();?>admin/settings" class="btn no-radius btn-success" title="Xem danh sách"><i class="fa fa-list"></i> Xem danh sách</a>
        
    </div>
    <!-- /.col-lg-12 -->
</div>
<!--End header-->
<form method="post">
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Tên thuộc tính</label>
            <input class="form-control" name="name" value="<?=set_value('name');?>">
            <div class="error"><?=form_error('name');?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Tên rút gọn</label>
            <input class="form-control" name="slug" value="<?=set_value('slug');?>">
            <div class="error"><?=form_error('slug');?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Giá trị</label>
            <input class="form-control" name="value" value="<?=set_value('value');?>">
            <div class="error"><?=form_error('value');?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Trạng thái</label>
            <select class="form-control" name="status">
                <option value="1" <?=set_value('status')==1?"selected":"";?> > Hoạt động</option>
                <option value="-1" <?=set_value('status')==-1?"selected":"";?> > Không hoạt động</option>
            </select>
            <div class="error"><?=form_error('status');?></div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary no-radius"><i class="fa fa-save"></i> Lưu lại</button>
        </div>
    </div>
</div>
</form>