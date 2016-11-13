<div class="row" id="page-header">
    <div class="col-md-6 col-lg-8 ">
        <h1><?=$title;?></h1>
    </div>
    <div class="col-md-6 col-lg-4">
        
        <a href="<?=base_url();?>admin/directions" class="btn no-radius btn-success" title="Xem danh sách"><i class="fa fa-list"></i> Xem danh sách</a>
       
    </div>
    <!-- /.col-lg-12 -->
</div>
<!--End header-->
<form method="post">
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Tên hướng</label>
            <input class="form-control" name="name" value="<?=set_value('name')==""?$item->name:set_value('name');?>">
            <div class="error"><?=form_error('name');?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Số thứ tự</label>
            <input class="form-control" name="code" value="<?=set_value('code')==""?$item->code:set_value('code');?>">
            <div class="error"><?=form_error('code');?></div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary no-radius"><i class="fa fa-save"></i> Lưu lại</button>
        </div>
    </div>
</div>
</form>