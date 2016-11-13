<style>
    
    #img-banner{
        max-height: 100px;
        cursor: pointer;
    }
</style>
<div class="row" id="page-header">
    <div class="col-md-6 col-lg-8 ">
        <h1><?=$title;?></h1>
    </div>
    <div class="col-md-6 col-lg-4">

    </div>
    <!-- /.col-lg-12 -->
</div>
<!--End header-->
<form method="post">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Địa chỉ</label>
            <input class="form-control" name="address" value="<?=set_value('address')==""?$item->address:set_value('address');?>">
            <div class="error"><?=form_error('address');?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" name="email" value="<?=set_value('email')==""?$item->email:set_value('email');?>">
            <div class="error"><?=form_error('email');?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Điện thoại</label>
            <input class="form-control" name="phone" value="<?=set_value('phone')==""?$item->phone:set_value('phone');?>">
            <div class="error"><?=form_error('phone');?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Skype</label>
            <input class="form-control" name="skype" value="<?=set_value('skype')==""?$item->skype:set_value('skype');?>">
            <div class="error"><?=form_error('skype');?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Facebook</label>
            <input class="form-control" name="facebook" value="<?=set_value('facebook')==""?$item->facebook:set_value('facebook');?>">
            <div class="error"><?=form_error('facebook');?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Zalo</label>
            <input class="form-control" name="zalo" value="<?=set_value('zalo')==""?$item->zalo:set_value('zalo');?>">
            <div class="error"><?=form_error('zalo');?></div>
        </div>
    </div>
    <div class="col-md-12">
        <?php $banner=set_value('banner')==""?$item->banner:set_value('banner'); ?>
        
        <div class="form-group">
            <label>Bannner</label>
            <img src="<?=$banner;?>" alt="Thumbnail" class="thumbnail img-thumbnail" onclick="BrowseServer();" id="img-banner">
             <input type="hidden" name="banner" id="banner" value="<?=$banner;?>" class="form-control" />
             <label>Bannner link</label>
            <input type="text" name="banner_link" id="banner_link" value="<?=set_value('banner_link')==""?$item->banner_link:set_value('banner_link');?>" class="form-control" placeholder="Nhập liên kết banner" />
            <div class="error"><?=form_error('banner');?></div>
            <div class="error"><?=form_error('banner_link');?></div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary no-radius"><i class="fa fa-save"></i> Lưu lại</button>
        </div>
    </div>
</div>
</form>
<script src="<?=base_url();?>asset/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
    function BrowseServer() {
        var finder = new CKFinder();
        finder.selectActionFunction = SetFileField;
        finder.popup();
    }
    function SetFileField(fileUrl) {
        var url_img=url_root+fileUrl;
        //var url_img=fileUrl;
        $("#img-banner").attr("src",url_img);
        document.getElementById('banner').value = url_img;
    }
</script>