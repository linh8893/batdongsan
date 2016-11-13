<form action="" method="post">
<div class="row" id="page-header">
    <div class="col-md-6 col-lg-8 ">
        <h1><?=$title;?></h1>
    </div>
    <div class="col-md-6 col-lg-4">
        
        <a href="<?=base_url();?>admin/wards/create" class="btn no-radius btn-primary" title="Thêm mới"><i class="fa fa-plus-circle"></i> Thêm mới</a>
       
        <button type="submit" name="delete" class="btn btn-danger no-radius"><i class="fa fa-trash-o"></i> Xóa</button>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!--End header-->
<div class="row">
    <div class="col-md-12">
        <div class="">
            <table class="table table-bordered table-condensed" id="datatable">
                <thead>
                    <tr>
                        <th style="width: 8%; text-align: center;">STT</th>
                        <th style="width: 22%;">Phường/ xã / thị trấn </th>
                        <th style="width: 10%;">Cấp </th>
                        <th style="width: 10%; text-align: center;">Mã </th>
                        <th style="width: 20%;">Quận / Huyện</th>
                        <th style="width: 10%;">Thứ thự </th>
                        <th data-orderable="false" style="width: 10%; text-align: center;">Trạng thái</th>
                        <th data-orderable="false" style="width: 10%; text-align: center;"></th>
                         <th data-orderable="false" style="width: 5%; text-align: center;"><input type="checkbox" value="all"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; foreach ($list as $row) { $i++;?>
                    <tr id="item-<?=$row->id;?>">
                        <td style="text-align: center;" ><?=$i;?></td>
                        <td><?=$row->name;?></td>
                        <td><?=$row->type;?></td>
                        <td class="text-center"><?=$row->code;?></td>
                        <td><?php
                        $city=$this->M_cities->get_item_code($row->cities_code);
                        $district=$this->M_districts->get_item_code($row->districts_code);
                        if(!$city || !$district){
                            echo "Chưa xác định";
                        }else{
                            echo $district->name.', '.$city->name;
                        }
                        ?>
                        </td>
                        <td class="text-center"><?=$row->order_index;?></td>
                        <td class="text-center">
                            <a href="<?=base_url();?>admin/wards/switch_status/<?=$row->id;?>" class="btn <?=$row->status==1?'text-success':'text-danger';?>"><i class="fa fa-lightbulb-o fa"></i></a>
                        </td>
                        <td style="width: 10%; text-align: center;">
                            <a href="<?=base_url();?>admin/wards/edit/<?=$row->id;?>" class="btn text-primary"><i class="fa fa-edit"></i></a>
                            <a href="javascript: confim_delete('<?=base_url();?>admin/wards/delete_item/<?=$row->id;?>');" class="btn text-danger"><i class="fa fa-trash-o"></i></a>
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