<style>
#table-productions thead{
    background-color: #0286D0;
    color: white;
}

#table-productions tr td{
    vertical-align: middle;
}
.text-blue{
    color: #6ABD47;
}
</style>
<?php 
$bds_id = isset($_GET['bds_id'])?$_GET['bds_id']:'';
$start_date= isset($_GET['start_date'])?$_GET['start_date']:"";
$end_date = isset($_GET['end_date'])?$_GET['end_date']:"";
$status = isset($_GET['status'])?$_GET['status']:'';
?>
<section id="page">
    <div class="container">
        <div class="row">
            <div class="col-md-3 hidden-sm hidden-xs" id="siderbar">
               <?php include_once 'inc/sidebar-user.php';?>
            </div>
            <!--End col-md-4-->
            <div class="col-md-9" id="page-right">
                 <div class="page-header">
                    <h1>Quản lý tin đã đăng</h1>
                </div>
                <!--End .page-header-->
                <div class="page-content">
                <form method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Mã tin</label>
                                <input type="text" value="<?=$bds_id;?>" name="bds_id" class="form-control no-radius">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Từ ngày</label>
                                <input type="text" id="datepicker-1" name="start_date"  value="<?=$start_date;?>" class="form-control no-radius">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> Đến ngày</label>
                                <input type="text"  id="datepicker-2" value="<?=$end_date;?>" name="end_date" class="form-control no-radius">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control no-radius">
                                    <option value="">Chọn trạng thái</option>
                                    <option <?=$status=="hien-thi"?"selected":"";?> value="hien-thi"> Đang hiển thị </option>
                                    <option <?=$status=="bi-tat"?"selected":"";?> value="bi-tat"> Đang bị tắt</option>
                                    <option <?=$status=="het-han"?"selected":"";?> value="het-han"> Đã hết hạn</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button style="margin-top: 22px;" type="submit" class="btn btn-primary no-radius"><i class="fa fa-search"></i> Tìm kiếm</button>
                            </div>
                        </div>
                    </div>
                    <!--End roww-->
                </form>
                 <?=$this->session->flashdata('msg_admin');?>
                 <div class="well no-radius">
                     Có <b class="text-red"><?=$total;?></b> tin bất động sản.
                 </div>
                 <div class="table-responsive">
                    <table class="table table-bordered table-condensed" id="table-productions">
                        <thead>
                            <tr >
                                <th class="text-center"  style="width: 10%;">Mã tin</th>
                                <th class="text-center"  style="width: 40%;">Tiêu đề</th>
                                <th class="text-center" style="width: 15%;">Ngày đăng</th>
                                <th class="text-center" style="width: 15%;">Ngày hết hạn</th>
                                <th class="text-center" style="width: 25%;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                        <?php foreach ($list as $row){ 
                            ?>
                        <tr>
                                <td class="text-center" >
                                <b><?=$row->id;?></b> <br>
                                <?php 
                                     switch ($row->status) {
                                        case 1:
                                            echo "Hiển thị";
                                             break;
                                        case -1:
                                            echo "<b class='text-red'>Tin bị tắt</b>";
                                             break;
                                     }
                                     ?>
                                </td>
                                 <td >
                                <a target="_blank" href="<?=base_url().$row->address_slug.'/'.$row->slug.'-msbds-'.$row->id;?>.html"><?=$row->title;?></a>
                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-xs-4"><a href='<?=base_url().$row->address_slug.'/'.$row->slug.'-msbds-'.$row->id;?>.html' class="text-success" ><i class="fa fa-search-plus"></i> Xem</a></div>
                                        <div class="col-xs-4"><a href='<?=base_url();?>chinh-sua-tin-ms<?=$row->id;?>.html' class="text-warning" ><i class="fa fa-edit"></i> Sửa</a></div>
                                        <div class="col-xs-4"><a href='<?=base_url();?>xoa-tin-ms<?=$row->id;?>.html' class="text-red" ><i class="fa fa-trash-o"></i> Xóa</a></div>
                                    </div>
                                </td>
                                <td  class="text-center"><?=date('d-m-Y',$row->public_time);?></td>
                                <td  class="text-center"><?=date('d-m-Y',$row->exp_time);?></td>
                                <td class="text-center">
                                     <a style="margin: 0 5px;"  href="<?=base_url();?>dang-lai-ms<?=$row->id;?>.html" class="text-primary"><i class="fa  fa-level-up "></i> Đăng lại </a>
                                     <a style="margin: 0 5px;"  href="<?=base_url();?>dang-moi-ms<?=$row->id;?>.html" class="text-primary">
                                     <i class="fa fa-send-o"></i> Đăng mới
                                     </a>
                                </td>  
                            </tr>
                        <?php
                            
                        }?>
                            
                        </tbody>
                    </table>
                    </div>
                </div>
                <!--End .page-content-->
                <?php if(isset($pagination)){
                    echo $pagination;
                } ?>
            </div>
            <!--End .col-md-9-->
        </div>
        <!--End .row-->
    </div>
    <!--End .container-->
</section>
<!--End #page-list-->