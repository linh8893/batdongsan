<?php 

defined("BASEPATH") OR exit("NO ACCESS");

class Productions extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        
    }
    public function post(){
        $account=$this->session->userdata('account');
        $data_search=array(
            'groups_type'=>0,
            'groups_slug'=>"",
            'groups_id'=>0,
            'group_title'=>'',
            'cities_code'=>0,
            'districts_code'=>0,
            'wards_code'=>0,
            'streets_code'=>0,
            'projects_code'=>0,
            'so_phong'=>-1,
            'muc_gia'=>-1,
            'dien_tich'=>-1,
            'huong'=>-1,
            'address'=>""
        );
        $msg_post=array();
        $this->form_validation->set_rules('groups_type','Loại bất động sản','required|xss_clean');
        $this->form_validation->set_rules('groups_code','Nhóm bất động sản','required|xss_clean'); 
        $this->form_validation->set_rules('cities','Tỉnh/ Thành phố','required|xss_clean');
        $this->form_validation->set_rules('districts','Quận / Huyện','required|xss_clean');
        
        $this->form_validation->set_rules('title','Tiêu đề','required|xss_clean');
       
        $this->form_validation->set_rules('units','Đơn vị','required|xss_clean');
        
        $this->form_validation->set_rules('content','Nội dung','required|xss_clean');
        
        $this->form_validation->set_rules('frontside','Mặt tiền','numeric|xss_clean');
        $this->form_validation->set_rules('backside','Mặt sau','numeric|xss_clean');
        $this->form_validation->set_rules('floor','Số tầng','numeric|xss_clean');
        $this->form_validation->set_rules('room','Số phòng','numeric|xss_clean');
        $this->form_validation->set_rules('toilet','Số toilet','numeric|xss_clean');
        
        $this->form_validation->set_rules('author_name','Họ và tên','required|xss_clean');
        $this->form_validation->set_rules('author_email','Email','required|xss_clean');
        $this->form_validation->set_rules('author_phone','Điện thoại','required|xss_clean');
        $this->form_validation->set_rules('author_address','Địa chỉ người đăng','required|xss_clean');
        $captcha_status="";

        if($this->form_validation->run()){
            $site_key_post    = isset($_POST['g-recaptcha-response'])?$_POST['g-recaptcha-response']:'';
            $check_captcha=false;
            /*
            if($site_key_post!=""){
                if($this->check_captcha($site_key_post)==true){
                    */
            if(1){
                if(1){
                    $groups_type=$this->input->post("groups_type");
                    $groups_code=$this->input->post('groups_code');
                    $cities_code=$this->input->post('cities');
                    $districts_code=$this->input->post('districts');
                    $wards_code=$this->input->post('wards');
                    $projects_code=$this->input->post('projects');
                    $streets_code=$this->input->post('streets');
                    $content=trim($this->input->post("content"));
                    $title=trim($this->input->post("title"));
                    $price=$this->input->post('price');
                    $units_code=$this->input->post('units');
                    $acreage=$this->input->post('acreage');
                    $directions_code=$this->input->post('directions');
                    $room=$this->input->post('room');
                    $frontside=$this->input->post('frontside');
                    $backside=$this->input->post('backside');
                    $toilet=$this->input->post('toilet');
                    $floor=$this->input->post('floor');
                    $address=$this->input->post('address');
                    $public_time=$this->input->post('public_time');
                    $exp_time=$this->input->post('exp_time');
                    $path="asset/public/upload/";

                    $author_address=$this->input->post('author_address');
                    $author_email=$this->input->post('author_email');
                    $author_phone=$this->input->post('author_phone');
                    $author_name=$this->input->post('author_name');
                    
                    
                    $unit=$this->M_units->get_item_code($units_code);
                    $gia_tri=0;
                    if($unit!=false){
                        $gia_tri=$price*$unit->he_so;
                        if($unit->he_nhan!=0){
                            $gia_tri*=$acreage;
                        }
                    }
                    $image=$_FILES;
                    $address_slug="";
                    $address_title="";
                    if($projects_code!=0){
                        $tmp1=$this->M_projects->get_item_code($projects_code);
                        $address_slug=$tmp1->slug;
                        $address_title=" tại ".$tmp1->type.' '.$tmp1->name;
                    }else{
                        if($streets_code!=0){
                            $tmp1=$this->M_streets->get_item_code($streets_code);
                            $address_slug=$tmp1->slug;
                             $address_title=" tại ".$tmp1->type.' '.$tmp1->name;
                        }else{
                            if($wards_code!=0){
                                $tmp1=$this->M_wards->get_item_code($wards_code);
                                 $address_slug=$tmp1->slug;
                                  $address_title=" tại ".$tmp1->type.' '.$tmp1->name;
                            }
                        }
                    }
                    if($address_slug==""){
                        $district=$this->M_districts->get_item_code($districts_code);
                        $address_slug=$district->slug;
                        $address_title=" tại ".$district->type.' '.$district->name;
                    }
                    $group=$this->M_groups->get_item_slug($groups_code);
                    $address_slug=$group->slug.'-'.$address_slug;
                    $address_title=$group->title.' '.$address_title;
                    $tmp=array(
                            //Thoong tin co ban
                            'groups_type'=>$groups_type,
                            'groups_code'=>$groups_code,
                            'cities_code'=>$cities_code,
                            'districts_code'=>$districts_code,
                            'wards_code'=>$wards_code,
                            'projects_code'=>$projects_code,
                            'streets_code'=>$streets_code,
                            'address'=>  trim($address),
                            'address_slug'=>$address_slug,
                            'address_title'=>$address_title,
                            //Thoong tin mo ta
                            
                            'price'=>trim($price),
                            'gia_tri'=>$gia_tri,
                            'units_code'=>trim($units_code),
                            'acreage'=>  trim($acreage),
                            'directions_code'=>$directions_code,
                            'room'=>trim($room),
                            'frontside'=>trim($frontside),
                            'backside'=>trim($backside),
                            'toilet'=>trim($toilet),
                            'floor'=>trim($floor),
                            //Thong tin bai viet
                            'title'=>$title,
                            'slug'=>$this->__to_slug($title),
                            'content'=>trim($content),

                            'create_time'=>time(),
                            'update_time'=>time(),
                            'public_time'=>strtotime($public_time),
                            'exp_time'=>strtotime($exp_time),
                            //Author
                            'author_address'=>$author_address,
                            'author_phone'=>$author_phone,
                            'author_name'=>$author_name,
                            'author_email'=>$author_email,
                            'author_id'=>empty($account)?'0':$account['id'],
                            //
                            'status'=>1,
                    );
                    $production_id=$this->M_productions->create($tmp);
                    $thumbnail="";
                    if($production_id!=FALSE){
                        if(isset($_FILES)){
                            $num=count($_FILES);
                            $j=0;
                            for($i=1;$i<=$num;$i++){
                                if($_FILES['image_'.$i]['error']!=0){
                                    continue;
                                }
                                $j++;
                                if($_FILES['image_'.$i]['type'] === "image/jpeg" || $_FILES['image_'.$i]['type']=== "image/png" || $_FILES['image_'.$i]['type'] === "image/gif"){
                                    $name="anh_bat_dong_san_".$j."_".time();
                                    switch ($_FILES['image_'.$i]['type']){
                                        case "image/jpeg":
                                            $name.=".jpeg";
                                            break;
                                        case "image/png":
                                            $name.=".png";
                                            break;
                                        case "image/gif":
                                            $name.=".gif";
                                            break;
                                    }
                                    $tmp_image=array(
                                        'name'=>$name,
                                        'create_time'=>time(),
                                        'size'=>$_FILES['image_'.$i]['size'],
                                        'vi_tri'=>$j,
                                        'production_id'=>$production_id
                                    );
                                    if(move_uploaded_file($_FILES['image_'.$i]['tmp_name'],$path.$name)){
                                        $this->M_images->create($tmp_image);
                                        if($thumbnail==""){
                                            $this->resize($name,$path);
                                            $thumbnail=$name;
                                        }
                                    }
                                }
                            }
                        }
                        if($thumbnail==""){
                            $thumbnail="thumbnail.gif";
                        }
                        $this->M_productions->update($production_id,array('thumbnail'=>$thumbnail));
                        $msg_post=array(
                            'type'=>'success',
                            'msg'=>'<strong><i class="fa fa-check"></i> Thành công! </strong> Chúc mừng bạn đã đăng tin thành công. Mã tin của bạn là: <b style="color: red;">'.$production_id."</b>",
                        );
                        $this->session->set_flashdata('msg_post',$msg_post);
                        redirect(base_url());
                    }
                    else{

                        $msg_post=array(
                            'type'=>'danger',
                            'msg'=>'<strong><i class="fa fa-remove"></i>  Không thành công! </strong> Bạn vui lòng kiểm tra lại các thông báo lỗi và khắc phục.',
                        );
                        $this->session->set_flashdata('msg_post',$msg_post);
                    } 
                    //end if
                }else{
                    $captcha_status="Sai mã captcha";
                }
            }else{
                $captcha_status="Bạn chưa nhập mã captcha";
            }
            
        }
        $seo=$this->M_seo->get_item_slug('dang-tin');
        $data=array(
            'title'=>$seo->title,
            'description'=>$seo->description,
            'keywords'=>$seo->keywords,
            'image'=>$seo->image,
            'page'=>'production-new',
            'data_search'=>$data_search,
            'captcha_status'=>$captcha_status
        );
        $this->load->view("site/master-page",$data);
    }
    public function view($id=0){
        $item=$this->M_productions->get_item($id);
        if(!$item){
            redirect(base_url().'khong-tim-thay-tin.html');
        }
        $view=$item->view+1;
        $groups=$this->M_groups->get_item_slug($item->groups_code);
        $price=$this->M_prices->get_item_rule(array('min_value<='=>$item->price,'max_value>='=>$item->price));
        
        $data_search=array(
            'groups_type'=>$item->groups_type,
            'groups_slug'=>$item->groups_code,
            'groups_id'=>$groups->id,
            'group_title'=>$groups->title,
            'cities_code'=>$item->cities_code,
            'districts_code'=>$item->districts_code,
            'wards_code'=>$item->wards_code,
            'streets_code'=>$item->streets_code,
            'projects_code'=>$item->projects_code,
            'so_phong'=>$item->room,
            'muc_gia'=>0,
            'dien_tich'=>$item->acreage,
            'huong'=>$item->directions_code,
            'address'=>""
        );
        $this->M_productions->update($id,array('view'=>$view));

        $address = $this->get_infor_from_address($item->address);
        $lat= $address->results[0]->geometry->location->lat;
        $lng=$address->results[0]->geometry->location->lng;

        $data=array(
            'title'=>$item->title,
            'description'=>$item->title,
            'keyword'=>$item->title,
            'image'=>base_url().'asset/public/upload/'.$item->thumbnail,

            'page'=>'production-view',
            'item'=>$item,
            'data_search'=>$data_search,
            'lat'=>$lat,
            'lng'=>$lng,
        );
        $this->load->view("site/master-page",$data);
    }
    
    public function search($str="",$muc_gia=-1,$so_phong=-1,$dien_tich=-1,$huong=-1,$page=1){
       
        $data_search=array(
            'groups_type'=>0,
            'groups_slug'=>"",
            'groups_id'=>0,
            'group_title'=>'',
            'cities_code'=>0,
            'districts_code'=>0,
            'wards_code'=>0,
            'streets_code'=>0,
            'projects_code'=>0,
            'so_phong'=>$so_phong,
            'muc_gia'=>$muc_gia,
            'dien_tich'=>$dien_tich,
            'huong'=>$huong,
            'address'=>""
        );
        $link=base_url().$str;
        if($muc_gia!=-1 || $so_phong!=-1 || $dien_tich!=-1 || $huong !=-1){
             $link.="/".$muc_gia."/".$so_phong."/".$dien_tich."/".$huong;
        }
        $url=$str;
        $tmp_str="nha-dat-ban";
        $address="";
        $tieu_chi="";
        $date=strtotime("23:59 ".date('d-m-Y',time()));
        $query="select *from productions where status=1 and public_time <= ".$date." and exp_time >=".$date;
        /*Tiêu chí tìm kiếm: <span class='value-search'></span>*/
        if(strpos($url,$tmp_str)!==false){
            $start=strpos($url,$tmp_str);
            $start=$start+strlen($tmp_str);
            $url=substr($url,$start,strlen($url)-strlen($tmp_str));
            $data_search['groups_type']=1;
            $data_search['groups_title']="Nhà đất bán";
            $address="Nhà đất bán";
            $tieu_chi="Tiêu chí: <span class='value-search'>Nhà đất bán</span>";
            $query.=" and groups_type=1";
        }
        $tmp_str="nha-dat-cho-thue";
        if(strpos($url,$tmp_str)!==false){
            $start=strpos($url,$tmp_str);
            $start=$start+strlen($tmp_str);
            $url=substr($url,$start,strlen($url)-strlen($tmp_str));
            $data_search['groups_type']=2;
            $data_search['groups_title']="Nhà đất cho thuê";
            $address="Nhà đất cho thuê";
            $tieu_chi="Tiêu chí: <span class='value-search'>Nhà đất cho thuê</span>";
             $query.=" and groups_type=2";
        }
        if($url!=""){
            $groups=$this->M_groups->get_list();
            foreach($groups as $row){
                $start=strpos($url,$row->slug);
                if ($start!== false){
                    $start=$start+strlen($row->slug);
                    $url=substr($url,$start,strlen($url)-strlen($row->slug));
                    $data_search['groups_type']=$row->type;
                    $data_search['groups_slug']=$row->slug;
                    $data_search['groups_title']=$row->title;
                    $data_search['groups_id']=$row->id;
                    $address.=$row->title;
                    $tieu_chi="Tiêu chí: <span class='value-search'>".$row->title."</span>";
                    $query.=" and groups_code='".$row->slug."'";
                    break;

                }
            }
        }
        //Neeus con duogn dan thi phan giai tiep
        if($url!=""){
            $list=$this->M_projects->get_list();
            $flag=0;
            foreach($list as $row){
                if(strpos( $url,$row->slug) !== false) {
                   $data_search['projects_slug']=$row->slug;
                   $data_search['projects_code']=$row->code;
                    $data_search['cities_code']=$row->cities_code;
                    $data_search['districts_code']=$row->districts_code;
                    $city=$this->M_cities->get_item_rule(array('code'=>$row->cities_code));
                    $data_search['cities_name']=$city->type." ".$city->name;

                     $district=$this->M_districts->get_item_rule(array('code'=>$row->districts_code));
                    $data_search['districts_name']=$district->type." ".$district->name;
                    $address.=" tại ".$row->name;
                    $tieu_chi.=". Tỉnh/TP: <span class='value-search'>".$city->name."</span>";
                    $tieu_chi.=". Quận/Huyện: <span class='value-search'>".$district->name."</span>";
                    $tieu_chi.=". Dự án: <span class='value-search'>".$row->name."</span>";
                     $query.=" and projects_code=".$row->code;
                   $flag=1;
                   break;
                }
            }
            if($flag!=1){
                $list=$this->M_streets->get_list();
                foreach($list as $row){
                    if(strpos( $url,$row->slug) !== false) {
                       $data_search['streets_slug']=$row->slug;
                       $data_search['streets_code']=$row->code;
                       $data_search['cities_code']=$row->code;
                       $city=$this->M_cities->get_item_rule(array('code'=>$row->cities_code));
                    $data_search['cities_name']=$city->type." ".$city->name;
                     $district=$this->M_districts->get_item_rule(array('code'=>$row->districts_code));
                    $data_search['districts_name']=$district->type." ".$district->name;
                       $address.=" tại ".$row->type." ".$row->name;
                       $tieu_chi.=". Tỉnh/TP: <span class='value-search'>".$city->name."</span>";
                    $tieu_chi.=". Quận/Huyện: <span class='value-search'>".$district->name."</span>";
                    $tieu_chi.=". Đường/Phố: <span class='value-search'>".$row->name."</span>";
                     $query.=" and streets_code=".$row->code;
                       $flag=1;
                       break;
                    }
                }
            }
            if($flag!=1){
                $list=$this->M_wards->get_list();
                foreach($list as $row){
                    if(strpos( $url,$row->slug) !== false) {
                       $data_search['wards_slug']=$row->slug;
                       $data_search['wards_code']=$row->code;
                       $data_search['cities_code']=$row->code;
                       $city=$this->M_cities->get_item_rule(array('code'=>$row->cities_code));
                    $data_search['cities_name']=$city->type." ".$city->name;

                     $district=$this->M_districts->get_item_rule(array('code'=>$row->districts_code));
                    $data_search['districts_name']=$district->type." ".$district->name;

                       $address.=" tại ".$row->type." ".$row->name;
                       $tieu_chi.=". Tỉnh/TP: <span class='value-search'>".$city->name."</span>";
                    $tieu_chi.=". Quận/Huyện: <span class='value-search'>".$district->name."</span>";
                    $tieu_chi.=". Phường/Xã: <span class='value-search'>".$row->name."</span>";
                     $query.=" and wards_code=".$row->code;
                       $flag=1;
                       break;
                    }
                }
            }
            if($flag!=1){
                $list=$this->M_districts->get_list();
                foreach($list as $row){
                    if(strpos( $url,$row->slug) !== false) {
                       $data_search['districts_slug']=$row->slug;
                       $data_search['districts_code']=$row->code;

                       $city=$this->M_cities->get_item_rule(array('code'=>$row->cities_code));
                    $data_search['cities_name']=$city->type." ".$city->name;
                    $data_search['districts_name']=$row->type.' '.$row->name;
                       $address.=" tại ".$row->type." ".$row->name;
                       $tieu_chi.=". Tỉnh/TP: <span class='value-search'>".$city->name."</span>";
                    $tieu_chi.=". Quận/Huyện: <span class='value-search'>".$row->name."</span>";
                     $query.=" and districts_code=".$row->code;
                       $flag=1;
                       break;
                    }
                }
            }
            if($flag!=1){
                $list=$this->M_cities->get_list();
                foreach($list as $row){
                    if(strpos( $url,$row->slug) !== false) {
                       $data_search['cities_slug']=$row->slug;
                       $data_search['cities_code']=$row->code;
                       $address.=" tại ".$row->type." ".$row->name;
                       $tieu_chi.=". Tỉnh/TP: <span class='value-search'>".$row->name."</span>";
                        $query.=" and cities_code=".$row->code;
                       $flag=1;
                       break;
                    }
                }
            }
        }
        if($so_phong>0){
             $tieu_chi.=". Số phòng: <span class='value-search'>".$so_phong." phòng </span>";
             $query.=" and room>=".$so_phong;
        }
        if($dien_tich>0){
            $tmp_d=$this->M_acreages->get_item_rule(array('code'=>$dien_tich));
             $tieu_chi.=". Diện tích: <span class='value-search'>".$tmp_d->name." </span>";
             //$query.=" and acreage >=".$dien_tich;
             $query.=" and acreage>=".$tmp_d->min_value." and acreage <=".$tmp_d->max_value;
        }
        if($muc_gia>0){
            $tmp_d=$this->M_prices->get_item_rule(array('code'=>$muc_gia));
             $tieu_chi.=". Mức giá: <span class='value-search'>".$tmp_d->name." </span>";
             if($tmp_d->min_price!=0 || $tmp_d->max_value!=0){
                 $query.=" and gia_tri >=".$tmp_d->min_price." and gia_tri <=".$tmp_d->max_price;
             }
        }
        if($huong>0){
            $tmp_d=$this->M_directions->get_item_rule(array('code'=>$huong));
             $tieu_chi.=". Hướng: <span class='value-search'>".$tmp_d->name." </span>";
             $query.=" and directions_code=".$tmp_d->code;
        }
         //phan trang

        $limit=20;
        $total=$this->M_productions->get_total_query($query);
        $total_page=ceil($total/$limit);
        $start=($page-1)*$limit;
       
        $query.=" order by public_time desc limit ".$start.",".$limit;
        $data_search['address']=$address;
        
        $list=$this->M_productions->select_query($query);
        $tieu_chi.=". Có <span class='value-search'>".$total." bất động sản</span>  được tìm thấy";
        if($total_page>1){
            $tieu_chi.=". Trang <span class='value-search'>".$page." </span>"; 
        }
        $data=array(
            'title'=>$address,
            'description'=>$address,
            'keyword'=>$address,
            'list'=>$list,
            'page'=>'production-search',
            'tieu_chi'=>$tieu_chi,
            'data_search'=>$data_search,
            'pagination'=>$this->phan_trang($link,$total_page,$page)
        );
        $this->load->view('site/master-page',$data);
    }
    public function site_map(){
         $data_search=array(
            'groups_type'=>0,
            'groups_slug'=>"",
            'groups_id'=>0,
            'group_title'=>'',
            'cities_code'=>0,
            'districts_code'=>0,
            'wards_code'=>0,
            'streets_code'=>0,
            'projects_code'=>0,
            'so_phong'=>-1,
            'muc_gia'=>-1,
            'dien_tich'=>-1,
            'huong'=>-1,
            'address'=>""
        );
        $seo=$this->M_seo->get_item_slug('site-map');
        $data=array(
            'title'=>$seo->title,
            'description'=>$seo->description,
            'keywords'=>$seo->keywords,
            'image'=>$seo->image,
            'page'=>'site-map',
            'data_search'=>$data_search,
        );
        $this->load->view("site/master-page",$data);
    }
    public function tim_kiem($str="",$page=1){
     
        $data_search=array(
            'groups_type'=>0,
            'groups_slug'=>"",
            'groups_id'=>0,
            'group_title'=>'',
            'cities_code'=>0,
            'districts_code'=>0,
            'wards_code'=>0,
            'streets_code'=>0,
            'projects_code'=>0,
            'so_phong'=>-1,
            'muc_gia'=>-1,
            'dien_tich'=>-1,
            'huong'=>-1,
            'address'=>""
        );
        $link=base_url().$str;
        $url=$str;
        $tmp_str="nha-dat-ban";
        $address="";
        $tieu_chi="";
        $date=strtotime("23:59 ".date('d-m-Y',time()));
        $keyword=isset($_GET['keyword'])?$_GET['keyword']:'';
        $like="";
      
        $query="select *from productions where status=1 and public_time <= ".$date." and exp_time >=".$date;
        /*Tiêu chí tìm kiếm: <span class='value-search'></span>*/
        if(strpos($url,$tmp_str)!==false){
            $start=strpos($url,$tmp_str);
            $start=$start+strlen($tmp_str);
            $url=substr($url,$start,strlen($url)-strlen($tmp_str));
            $data_search['groups_type']=1;
            $data_search['groups_title']="Nhà đất bán";
            $address="Nhà đất bán";
            $tieu_chi="Tiêu chí: <span class='value-search'>Nhà đất bán</span>";
            $query.=" and groups_type=1";
        }
        $tmp_str="nha-dat-cho-thue";

        if(strpos($url,$tmp_str)!==false){
            $start=strpos($url,$tmp_str);
            $start=$start+strlen($tmp_str);
            $url=substr($url,$start,strlen($url)-strlen($tmp_str));
            $data_search['groups_type']=2;
            $data_search['groups_title']="Nhà đất cho thuê";
            $address="Nhà đất cho thuê";
            $tieu_chi="Tiêu chí: <span class='value-search'>Nhà đất cho thuê</span>";
             $query.=" and groups_type=2";
        }
        if($url!=""){
            $groups=$this->M_groups->get_list();
            foreach($groups as $row){
                $start=strpos($url,$row->slug);
                if ($start!== false){
                    $start=$start+strlen($row->slug);
                    $url=substr($url,$start,strlen($url)-strlen($row->slug));
                    $data_search['groups_type']=$row->type;
                    $data_search['groups_slug']=$row->slug;
                    $data_search['groups_title']=$row->title;
                    $data_search['groups_id']=$row->id;
                    $address.=$row->title;
                    $tieu_chi="Tiêu chí: <span class='value-search'>".$row->title."</span>";
                    $query.=" and groups_code='".$row->slug."'";
                    break;
                }
            }
        }
        if($keyword!=""){
            $like= " and (title like '%{$keyword}%' or content  like '%{$keyword}%' ) ";
            $tieu_chi.=". Từ khóa : <span class='value-search'>".$keyword." </span>";
        }
        
        //Neeus con duogn dan thi phan giai tiep
        if($url!=""){
            $list=$this->M_projects->get_list();
            $flag=0;
            foreach($list as $row){
                if(strpos( $url,$row->slug) !== false) {
                   $data_search['projects_slug']=$row->slug;
                   $data_search['projects_code']=$row->code;
                    $data_search['cities_code']=$row->cities_code;
                    $data_search['districts_code']=$row->districts_code;
                    $city=$this->M_cities->get_item_rule(array('code'=>$row->cities_code));
                    $data_search['cities_name']=$city->type." ".$city->name;

                     $district=$this->M_districts->get_item_rule(array('code'=>$row->districts_code));
                    $data_search['districts_name']=$district->type." ".$district->name;
                    $address.=" tại ".$row->name;
                    $tieu_chi.=". Tỉnh/TP: <span class='value-search'>".$city->name."</span>";
                    $tieu_chi.=". Quận/Huyện: <span class='value-search'>".$district->name."</span>";
                    $tieu_chi.=". Dự án: <span class='value-search'>".$row->name."</span>";
                     $query.=" and projects_code=".$row->code;
                   $flag=1;
                   break;
                }
            }
            if($flag!=1){
                $list=$this->M_streets->get_list();
                foreach($list as $row){
                    if(strpos( $url,$row->slug) !== false) {
                       $data_search['streets_slug']=$row->slug;
                       $data_search['streets_code']=$row->code;
                       $data_search['cities_code']=$row->code;
                       $city=$this->M_cities->get_item_rule(array('code'=>$row->cities_code));
                    $data_search['cities_name']=$city->type." ".$city->name;
                     $district=$this->M_districts->get_item_rule(array('code'=>$row->districts_code));
                    $data_search['districts_name']=$district->type." ".$district->name;
                       $address.=" tại ".$row->type." ".$row->name;
                       $tieu_chi.=". Tỉnh/TP: <span class='value-search'>".$city->name."</span>";
                    $tieu_chi.=". Quận/Huyện: <span class='value-search'>".$district->name."</span>";
                    $tieu_chi.=". Đường/Phố: <span class='value-search'>".$row->name."</span>";
                     $query.=" and streets_code=".$row->code;
                       $flag=1;
                       break;
                    }
                }
            }
            if($flag!=1){
                $list=$this->M_wards->get_list();
                foreach($list as $row){
                    if(strpos( $url,$row->slug) !== false) {
                       $data_search['wards_slug']=$row->slug;
                       $data_search['wards_code']=$row->code;
                       $data_search['cities_code']=$row->code;
                       $city=$this->M_cities->get_item_rule(array('code'=>$row->cities_code));
                    $data_search['cities_name']=$city->type." ".$city->name;

                     $district=$this->M_districts->get_item_rule(array('code'=>$row->districts_code));
                    $data_search['districts_name']=$district->type." ".$district->name;

                       $address.=" tại ".$row->type." ".$row->name;
                       $tieu_chi.=". Tỉnh/TP: <span class='value-search'>".$city->name."</span>";
                    $tieu_chi.=". Quận/Huyện: <span class='value-search'>".$district->name."</span>";
                    $tieu_chi.=". Phường/Xã: <span class='value-search'>".$row->name."</span>";
                     $query.=" and wards_code=".$row->code;
                       $flag=1;
                       break;
                    }
                }
            }
            if($flag!=1){
                $list=$this->M_districts->get_list();
                foreach($list as $row){
                    if(strpos( $url,$row->slug) !== false) {
                       $data_search['districts_slug']=$row->slug;
                       $data_search['districts_code']=$row->code;

                       $city=$this->M_cities->get_item_rule(array('code'=>$row->cities_code));
                    $data_search['cities_name']=$city->type." ".$city->name;
                    $data_search['districts_name']=$row->type.' '.$row->name;
                       $address.=" tại ".$row->type." ".$row->name;
                       $tieu_chi.=". Tỉnh/TP: <span class='value-search'>".$city->name."</span>";
                    $tieu_chi.=". Quận/Huyện: <span class='value-search'>".$row->name."</span>";
                     $query.=" and districts_code=".$row->code;
                       $flag=1;
                       break;
                    }
                }
            }
            if($flag!=1){
                $list=$this->M_cities->get_list();
                foreach($list as $row){
                    if(strpos( $url,$row->slug) !== false) {
                       $data_search['cities_slug']=$row->slug;
                       $data_search['cities_code']=$row->code;
                       $address.=" tại ".$row->type." ".$row->name;
                       $tieu_chi.=". Tỉnh/TP: <span class='value-search'>".$row->name."</span>";
                        $query.=" and cities_code=".$row->code;
                       $flag=1;
                       break;
                    }
                }
            }
        }
        $query.=$like;
         //phan trang
        $limit=20;
        $total=$this->M_productions->get_total_query($query);
        $total_page=ceil($total/$limit);
        $start=($page-1)*$limit;
        $query.=" order by public_time desc limit ".$start.",".$limit;
        $data_search['address']=$address;
        $list=$this->M_productions->select_query($query);
        $tieu_chi.=". Có <span class='value-search'>".$total." bất động sản</span>  được tìm thấy";
        if($total_page>1){
            $tieu_chi.=". Trang <span class='value-search'>".$page." </span>"; 
        }
        $data=array(
            'title'=>$address,
            'description'=>$address,
            'list'=>$list,
            'page'=>'production-search',
            'tieu_chi'=>$tieu_chi,
            'data_search'=>$data_search,
            'pagination'=>$this->phan_trang($link,$total_page,$page)
        );
        $this->load->view('site/master-page',$data);
    }
    /*
    public function delete($id=0){

        if(!$this->_check_login()){
           $this->_msg_admin("warning", "Bạn cần đăng nhập để truy cập");
           redirect(base_url());
        }
        $item=$this->M_productions->get_item($id);
        if(!$item){
            $this->_msg_admin("warning", "Không tìm thấy tin");
        }else{
            if($this->check_user_production($id)){
                if($this->M_productions->delete($id)){
                    $this->M_images->del_rule(array('production_id'=>$id));
                    $this->_msg_admin("success", "Xóa thành công");
                }else{
                     $this->_msg_admin("danger", "Xóa không thành công");
                }
            }else{
                $this->_msg_admin("danger", "Bạn không có quyền xóa tin này");
            }
           
        }
         redirect(base_url()."quan-ly-tin.html");
    }
     * 
     */
    public function check_user_production($id=0){
        if(!$this->_check_login()){
           return false;
        }
         $item=$this->M_productions->get_item($id);
         $account=$this->session->userdata('account');
         if($account['id']!=$item->author_id){
            return false;
         }
         return true;

    }
    public function error_404(){
        $data=array(
            'title'=>"Không tìm thấy tin nào phù hợp với yêu cầu",
            'description'=>"Không tìm thấy tin nào phù hợp với yêu cầu",
            'page'=>'post-404',
        );
        $this->load->view("site/master-page",$data);
    }
    function get_infor_from_address($address = null) {
            $prepAddr = str_replace(' ', '+', $this->stripUnicode($address));
            $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
            $output = json_decode($geocode);
            return $output;
          }
    function stripUnicode($str){
            if (!$str){return false;}
            $unicode = array(
              'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
              'd'=>'đ|Đ',
              'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
              'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
              'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
              'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
              'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ'
            );
            foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
            return $str;
        }
   

}