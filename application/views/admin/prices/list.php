<div class="row" id="page-header">
    <div class="col-md-6 col-lg-8 ">
        <h1><?=$title;?></h1>
    </div>
    <div class="col-md-6 col-lg-4">
        
        <a href="<?=base_url();?>admin/prices/create" class="btn no-radius btn-primary" title="Thêm mới"><i class="fa fa-plus-circle"></i> Thêm mới</a>
        
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
                        <th style="width: 22%;">Tiêu đề</th>
                        <th style="width: 10%; ">Min</th>
                        <th style="width: 10%; ">Max</th>
                        <th style="width: 10%; ">Loại BDS</th>
                        <th style="width: 10%; ">Thứ tự</th>
                        <th style="width: 10%; text-align: center;">Trạng thái</th>
                        <th style="width: 10%; text-align: center;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; foreach ($list as $row) { $i++;?>
                    <tr id="item-<?=$row->id;?>">
                        <td style="text-align: center;" ><?=$i;?></td>
                        <td><?=$row->name;?></td>
                        <td >
                        <?=$row->min_value;?>
                             <?php 
                            $unit=$this->M_units->get_item_code($row->units_code_1);
                            if($unit!=false && $unit->he_so!=0){
                                echo $unit->name;
                            }
                        ?>
                        </td>
                        <td >
                        <?=$row->max_value;?>
                        <?php 
                            $unit=$this->M_units->get_item_code($row->units_code_2);
                            if($unit!=false && $unit->he_so!=0){
                                echo $unit->name;
                            }
                        ?>
                        </td>
                        <td ><?=$row->groups_type;?></td>
                        <td ><?=$row->code;?></td>
                        <td class="text-center">
                            <a href="<?=base_url();?>admin/prices/switch_status/<?=$row->id;?>" class="btn <?=$row->status==1?'text-success':'text-danger';?>"><i class="fa fa-lightbulb-o fa"></i></a>
                        </td>
                        <td style="width: 10%; text-align: center;">
                            <a href="<?=base_url();?>admin/prices/edit/<?=$row->id;?>" class="btn text-primary"><i class="fa fa-edit"></i></a>
                            <a href="javascript: confim_delete('<?=base_url();?>admin/prices/delete_item/<?=$row->id;?>');" class="btn text-danger"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>