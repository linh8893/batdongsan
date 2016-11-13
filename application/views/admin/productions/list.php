<form action="" method="post">
<div class="row" id="page-header">
    <div class="col-md-6 col-lg-8 ">
        <h1><?=$title;?></h1>
    </div>
     <div class="col-md-6 col-lg-4">

        <button type="submit" name="delete" class="btn btn-danger no-radius"><i class="fa fa-trash-o"></i> Xóa đã chọn</button>

    </div>
</div>
<!--End header-->
<div class="row">
    <div class="col-md-12">
        <div class="">
            <table class="table table-bordered table-condensed" id="datatable">
                <thead>
                    <tr>
                        <th style="width: 8%; text-align: center;">STT</th>
                        <th style="width: 40%;">Tiêu đề </th>
                        <th style="width: 15%;">Loại tin</th>
                        <th style="width: 12%;">Ngày đăng </th>
                        <th data-orderable="false"  style="width: 10%;">Trạng thái </th>
                        <th data-orderable="false"  style="width: 10%; text-align: center;"></th>
                         <th data-orderable="false" style="width: 5%; text-align: center;"><input type="checkbox" value="all"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; foreach ($list as $row) { $i++;?>
                    <tr id="item-<?=$row->id;?>">
                        <td style="text-align: center;" ><?=$i;?></td>
                        <td><a target="_blank" href="<?=base_url().$row->address_slug.'/'.$row->slug.'-msbds-'.$row->id;?>.html"><?=$row->title;?></a></td>
                        <td><?=$row->groups_type==1?"Bất động sản bán":"Bất động sản cho thuê";?></td>
                        <td class="text-center"><?=date('H:i',$row->create_time);?> <br><?=date('d-m-Y',$row->create_time);?></td>
                        <td class="text-center">
                            <a href="<?=base_url();?>admin/productions/switch_status/<?=$row->id;?>" class="btn <?=$row->status==1?'text-success':'text-danger';?>"><i class="fa fa-lightbulb-o fa"></i></a>
                        </td>
                        <td style="width: 10%; text-align: center;">
                            
                            <a href="javascript: confim_delete('<?=base_url();?>admin/productions/delete_item/<?=$row->id;?>');" class="btn text-danger"><i class="fa fa-trash-o"></i></a>
                        </td>
                        <td class="text-center"><input type="checkbox" class="form-control" name="item[]"  value="<?=$row->id;?>"></td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</form>