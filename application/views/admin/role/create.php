<div class="row" id="page-header">
    <div class="col-md-6 col-lg-8 ">
        <h1><?=$title;?></h1>
    </div>
    <div class="col-md-6 col-lg-4">
        
        <a href="<?=base_url();?>admin/roles" class="btn no-radius btn-success" title="Xem danh sách"><i class="fa fa-list"></i> Xem danh sách</a>
       
    </div>
    <!-- /.col-lg-12 -->
</div>
<!--End header-->
<form method="post">
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Tên vai trò & quyền hạn</label>
            <input class="form-control" name="name" value="<?=set_value('name');?>">
            <div class="error"><?=form_error('name');?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Tên rút gọn</label>
            <input class="form-control" name="role" value="<?=set_value('role');?>">
            <div class="error"><?=form_error('role');?></div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary no-radius"><i class="fa fa-save"></i> Lưu lại</button>
        </div>
    </div>
</div>
</form>