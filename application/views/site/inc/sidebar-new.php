<?php if(1){ ?>

<div class="row hidden-xs hidden-md">
                    <div class="col-md-12">
                        <div class="siderbar-box">
                            <div class="page-header">
                                <h2><i class="fa fa-link fa-spin fa-fw"></i> Tin mới đăng </h2>
                            </div>
                            <!--End .page-header-->
                             <div class="siderbar-list">
                                 <ul class="list-post">
                                 <?php
                                 $input=array();
                                 $date=strtotime("23:59 ".date('d-m-Y',time()));
                                 $input['where']=array('status'=>1,'public_time<='=>$date,'exp_time>='=>$date);
                                 $input['limit']=array(5,0);
                                 $input['order']=array('create_time','DESC');
                                 $list_nav_2=$this->M_productions->get_list($input);
                                 ?>
                                     <?php foreach ($list_nav_2 as $row) { 

                                        $address="";
                                        $address_slug="";
                                        if($row->projects_code!=0){
                                            $tmp=$this->M_projects->get_item_code($row->projects_code);
                                            $address=$tmp->type." ".$tmp->name;
                                            $address_slug=$tmp->slug;
                                        }else{
                                            if($row->streets_code!=0){
                                                $tmp=$this->M_streets->get_item_code($row->streets_code);
                                                $address=$tmp->type." ".$tmp->name;
                                                 $address_slug=$tmp->slug;
                                            }else{
                                                if($row->wards_code!=0){
                                                    $tmp=$this->M_wards->get_item_code($row->wards_code);
                                                    $address=$tmp->type." ".$tmp->name;
                                                     $address_slug=$tmp->slug;
                                                }
                                            }
                                        }
                                        $group=$this->M_groups->get_item_slug($row->groups_code);
                                        $district=$this->M_districts->get_item_code($row->districts_code);
                                        $city=$this->M_cities->get_item_code($row->cities_code);
                                        $unit=$this->M_units->get_item_code($row->units_code);
                                        $direction=$this->M_directions->get_item_code($row->directions_code);
                                        
                                        $price=$row->price." ".$unit->name;
                                        if($row->price==0 || $unit->code==1){
                                            $price="Thỏa thuận";
                                        }
                                        $slug=$group->slug;
                                        if($address_slug!=""){
                                            $slug.='-'.$address_slug;
                                        }
                                          if($row->thumbnail==""){
                                            $row->thumbnail="thumbnail.gif";
                                        }
                                        $url=base_url().$slug.'/'.$row->slug.'-msbds-'.$row->id.'.html';
                                        ?>
                                     <li>
                                         <a href="<?=$url;?>" class="title-bold"><?=$row->title;?></a>
                                         <div class="row">
                                             <div class="col-1 col-md-5">
                                                 <a href="#"><img src="<?=base_url();?>asset/public/upload/thumbnail/<?=$row->thumbnail;?>" alt="thumbnail bất động sản" class="thumbnail"></a>
                                             </div>
                                             <div class="col-2 col-md-7">
                                                
                                                 <p>Giá: <span class="text-blue"> <?=$price;?></span></p>
                                                 <p>Diện tích: <span class="text-blue"><?=$row->acreage;?> m<sup>2</sup></span></p>
                                                 <p>Khu vực: <span class="text-red"><?=$district->name;?> - <?=$city->name;?></span></p>
                                             </div>
                                         </div>
                                     </li>
                                     <?php }?>
                                 </ul>
                            </div>
                            <!--End .page-content-->
                        </div>
                    </div>
                </div>
                <!--End .siderbar-item-->
<?php }?>