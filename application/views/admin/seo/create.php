<div class="row" id="page-header">
    <div class="col-md-6 col-lg-8 ">
        <h1><?=$title;?></h1>
    </div>
    <div class="col-md-6 col-lg-4">
        <a href="<?=base_url();?>admin/seo" class="btn no-radius btn-success" title="Xem danh sách"><i class="fa fa-list"></i> Xem danh sách</a>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!--End header-->
<form method="post">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-radius">
            <div class="panel-heading no-radius">
                <i class="fa fa-edit"></i> Meta Page
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label> Tiêu đề page</label>
                    <input class="form-control" name="title" id="title"  value="<?=set_value('title');?>" >
                    <div class="error"><?=form_error('title');?></div>
                </div>
                <div class="form-group">
                    <label>Slug page</label>
                    <input class="form-control" id="slug" name=slug value="<?=set_value('slug');?>" placeholder="">
                    <div class="error"><?=form_error('slug');?></div>
                </div>
                <div class="form-group">
                    <label>Mô tả ngắn</label>
                    <textarea name="description" class="form-control" rows="5" placeholder=""><?=set_value('description');?></textarea>
                    <div class="error"><?=form_error('description');?></div>
                </div>
                <div class="form-group">
                    <label>Từ khóa tìm kiếm</label>
                    <textarea name="keywords" class="form-control" rows="2" placeholder=""><?=set_value('keywords');?></textarea>
                    <div class="error"><?=form_error('keywords');?></div>
                </div>
                <div class="form-group">
                <?php $url_img=set_value('thumbnail')==""?base_url()."asset/public/images/thumb-default.gif":set_value('thumbnail');?>
                <img src="<?=$url_img;?>" alt="Thumbnail" class="thumbnail img-thumbnail" onclick="BrowseServer();" id="img-thumbnail">
                <label>Url Image</label>
                <input type="text" name="thumbnail" id="thumbnail" value="<?=$url_img;?>" class="form-control" />
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



<script src="<?=base_url();?>asset/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
    function BrowseServer() {
        var finder = new CKFinder();
        finder.selectActionFunction = SetFileField;
        finder.popup();
    }
    function SetFileField(fileUrl) {
        var url_img=url_root+fileUrl;
        $("#img-thumbnail").attr("src",url_img);
        document.getElementById('thumbnail').value = url_img;
    }
</script>